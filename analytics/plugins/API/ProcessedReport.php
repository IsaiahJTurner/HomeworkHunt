<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\API;

use Exception;
use Piwik\API\Request;
use Piwik\Archive\DataTableFactory;
use Piwik\Common;
use Piwik\DataTable;
use Piwik\DataTable\Row;
use Piwik\DataTable\Simple;
use Piwik\Date;
use Piwik\Metrics;
use Piwik\MetricsFormatter;
use Piwik\Period;
use Piwik\Piwik;
use Piwik\Site;
use Piwik\Timer;
use Piwik\Url;

class ProcessedReport
{

    /**
     * Loads reports metadata, then return the requested one,
     * matching optional API parameters.
     */
    public function getMetadata($idSite, $apiModule, $apiAction, $apiParameters = array(), $language = false,
                                $period = false, $date = false, $hideMetricsDoc = false, $showSubtableReports = false)
    {
        $reportsMetadata = $this->getReportMetadata($idSite, $period, $date, $hideMetricsDoc, $showSubtableReports);

        foreach ($reportsMetadata as $report) {
            // See ArchiveProcessor/Aggregator.php - unique visitors are not processed for period != day
            if (($period && $period != 'day') && !($apiModule == 'VisitsSummary' && $apiAction == 'get')) {
                unset($report['metrics']['nb_uniq_visitors']);
            }
            if ($report['module'] == $apiModule
                && $report['action'] == $apiAction
            ) {
                // No custom parameters
                if (empty($apiParameters)
                    && empty($report['parameters'])
                ) {
                    return array($report);
                }
                if (empty($report['parameters'])) {
                    continue;
                }
                $diff = array_diff($report['parameters'], $apiParameters);
                if (empty($diff)) {
                    return array($report);
                }
            }
        }
        return false;
    }

    /**
     * Verfies whether the given report exists for the given site.
     *
     * @param int $idSite
     * @param string $apiMethodUniqueId  For example 'MultiSites_getAll'
     *
     * @return bool
     */
    public function isValidReportForSite($idSite, $apiMethodUniqueId)
    {
        $report = $this->getReportMetadataByUniqueId($idSite, $apiMethodUniqueId);

        return !empty($report);
    }

    /**
     * Verfies whether the given metric belongs to the given report.
     *
     * @param int $idSite
     * @param string $metric     For example 'nb_visits'
     * @param string $apiMethodUniqueId  For example 'MultiSites_getAll'
     *
     * @return bool
     */
    public function isValidMetricForReport($metric, $idSite, $apiMethodUniqueId)
    {
        $translation = $this->translateMetric($metric, $idSite, $apiMethodUniqueId);

        return !empty($translation);
    }

    public function getReportMetadataByUniqueId($idSite, $apiMethodUniqueId)
    {
        $metadata = $this->getReportMetadata(array($idSite));

        foreach ($metadata as $report) {
            if ($report['uniqueId'] == $apiMethodUniqueId) {
                return $report;
            }
        }
    }

    /**
     * Translates the given metric in case the report exists and in case the metric acutally belongs to the report.
     *
     * @param string $metric     For example 'nb_visits'
     * @param int    $idSite
     * @param string $apiMethodUniqueId  For example 'MultiSites_getAll'
     *
     * @return null|string
     */
    public function translateMetric($metric, $idSite, $apiMethodUniqueId)
    {
        $report = $this->getReportMetadataByUniqueId($idSite, $apiMethodUniqueId);

        if (empty($report)) {
            return;
        }

        $properties = array('metrics', 'processedMetrics', 'processedMetricsGoal');

        foreach ($properties as $prop) {
            if (!empty($report[$prop]) && is_array($report[$prop]) && array_key_exists($metric, $report[$prop])) {
                return $report[$prop][$metric];
            }
        }
    }

    /**
     * Triggers a hook to ask plugins for available Reports.
     * Returns metadata information about each report (category, name, dimension, metrics, etc.)
     *
     * @param string $idSites Comma separated list of website Ids
     * @param bool|string $period
     * @param bool|Date $date
     * @param bool $hideMetricsDoc
     * @param bool $showSubtableReports
     * @return array
     */
    public function getReportMetadata($idSites, $period = false, $date = false, $hideMetricsDoc = false, $showSubtableReports = false)
    {
        $idSites = Site::getIdSitesFromIdSitesString($idSites);
        if (!empty($idSites)) {
            Piwik::checkUserHasViewAccess($idSites);
        }

        $parameters = array('idSites' => $idSites, 'period' => $period, 'date' => $date);

        $availableReports = array();

        /**
         * Triggered when gathering metadata for all available reports.
         * 
         * Plugins that define new reports should use this event to make them available in via
         * the metadata API. By doing so, the report will become available in scheduled reports
         * as well as in the Piwik Mobile App. In fact, any third party app that uses the metadata
         * API will automatically have access to the new report.
         * 
         * @param string &$availableReports The list of available reports. Append to this list
         *                                  to make a report available.
         * 
         *                                  Every element of this array must contain the following
         *                                  information:
         * 
         *                                  - **category**: A translated string describing the report's category.
         *                                  - **name**: The translated display title of the report.
         *                                  - **module**: The plugin of the report.
         *                                  - **action**: The API method that serves the report.
         * 
         *                                  The following information is optional:
         * 
         *                                  - **dimension**: The report's [dimension](/guides/all-about-analytics-data#dimensions) if any.
         *                                  - **metrics**: An array mapping metric names with their display names.
         *                                  - **metricsDocumentation**: An array mapping metric names with their
         *                                                              translated documentation.
         *                                  - **processedMetrics**: The array of metrics in the report that are
         *                                                          calculated using existing metrics. Can be set to
         *                                                          `false` if the report contains no processed
         *                                                          metrics.
         *                                  - **order**: The order of the report in the list of reports
         *                                               with the same category.
         * 
         * @param array $parameters Contains the values of the sites and period we are
         *                          getting reports for. Some reports depend on this data.
         *                          For example, Goals reports depend on the site IDs being
         *                          requested. Contains the following information:
         * 
         *                          - **idSites**: The array of site IDs we are getting reports for.
         *                          - **period**: The period type, eg, `'day'`, `'week'`, `'month'`,
         *                                        `'year'`, `'range'`.
         *                          - **date**: A string date within the period or a date range, eg,
         *                                      `'2013-01-01'` or `'2012-01-01,2013-01-01'`.
         * 
         * TODO: put dimensions section in all about analytics data
         */
        Piwik::postEvent('API.getReportMetadata', array(&$availableReports, $parameters));
        foreach ($availableReports as &$availableReport) {
            if (!isset($availableReport['metrics'])) {
                $availableReport['metrics'] = Metrics::getDefaultMetrics();
            }
            if (!isset($availableReport['processedMetrics'])) {
                $availableReport['processedMetrics'] = Metrics::getDefaultProcessedMetrics();
            }

            if ($hideMetricsDoc) // remove metric documentation if it's not wanted
            {
                unset($availableReport['metricsDocumentation']);
            } else if (!isset($availableReport['metricsDocumentation'])) {
                // set metric documentation to default if it's not set
                $availableReport['metricsDocumentation'] = Metrics::getDefaultMetricsDocumentation();
            }
        }

        /**
         * Triggered after all available reports are collected.
         * 
         * This event can be used to modify the report metadata of reports in other plugins. You
         * could, for example, add custom metrics to every report or remove reports from the list
         * of available reports.
         * 
         * @param array &$availableReports List of all report metadata. Read the {@hook API.getReportMetadata}
         *                                 docs to see what this array contains.
         * @param array $parameters Contains the values of the sites and period we are
         *                          getting reports for. Some report depend on this data.
         *                          For example, Goals reports depend on the site IDs being
         *                          request. Contains the following information:
         * 
         *                          - **idSites**: The array of site IDs we are getting reports for.
         *                          - **period**: The period type, eg, `'day'`, `'week'`, `'month'`,
         *                                        `'year'`, `'range'`.
         *                          - **date**: A string date within the period or a date range, eg,
         *                                      `'2013-01-01'` or `'2012-01-01,2013-01-01'`.
         */
        Piwik::postEvent('API.getReportMetadata.end', array(&$availableReports, $parameters));

        // Sort results to ensure consistent order
        usort($availableReports, array($this, 'sort'));

        // Add the magic API.get report metadata aggregating all plugins API.get API calls automatically
        $this->addApiGetMetdata($availableReports);

        $knownMetrics = array_merge(Metrics::getDefaultMetrics(), Metrics::getDefaultProcessedMetrics());
        foreach ($availableReports as &$availableReport) {
            // Ensure all metrics have a translation
            $metrics = $availableReport['metrics'];
            $cleanedMetrics = array();
            foreach ($metrics as $metricId => $metricTranslation) {
                // When simply the column name was given, ie 'metric' => array( 'nb_visits' )
                // $metricTranslation is in this case nb_visits. We look for a known translation.
                if (is_numeric($metricId)
                    && isset($knownMetrics[$metricTranslation])
                ) {
                    $metricId = $metricTranslation;
                    $metricTranslation = $knownMetrics[$metricTranslation];
                }
                $cleanedMetrics[$metricId] = $metricTranslation;
            }
            $availableReport['metrics'] = $cleanedMetrics;

            // if hide/show columns specified, hide/show metrics & docs
            $availableReport['metrics'] = $this->hideShowMetrics($availableReport['metrics']);
            if (isset($availableReport['processedMetrics'])) {
                $availableReport['processedMetrics'] = $this->hideShowMetrics($availableReport['processedMetrics']);
            }
            if (isset($availableReport['metricsDocumentation'])) {
                $availableReport['metricsDocumentation'] =
                    $this->hideShowMetrics($availableReport['metricsDocumentation']);
            }

            // Remove array elements that are false (to clean up API output)
            foreach ($availableReport as $attributeName => $attributeValue) {
                if (empty($attributeValue)) {
                    unset($availableReport[$attributeName]);
                }
            }
            // when there are per goal metrics, don't display conversion_rate since it can differ from per goal sum
            if (isset($availableReport['metricsGoal'])) {
                unset($availableReport['processedMetrics']['conversion_rate']);
                unset($availableReport['metricsGoal']['conversion_rate']);
            }

            // Processing a uniqueId for each report,
            // can be used by UIs as a key to match a given report
            $uniqueId = $availableReport['module'] . '_' . $availableReport['action'];
            if (!empty($availableReport['parameters'])) {
                foreach ($availableReport['parameters'] as $key => $value) {
                    $uniqueId .= '_' . $key . '--' . $value;
                }
            }
            $availableReport['uniqueId'] = $uniqueId;

            // Order is used to order reports internally, but not meant to be used outside
            unset($availableReport['order']);
        }

        // remove subtable reports
        if (!$showSubtableReports) {
            foreach ($availableReports as $idx => $report) {
                if (isset($report['isSubtableReport']) && $report['isSubtableReport']) {
                    unset($availableReports[$idx]);
                }
            }
        }

        return array_values($availableReports); // make sure array has contiguous key values
    }

    /**
     * API metadata are sorted by category/name,
     * with a little tweak to replicate the standard Piwik category ordering
     *
     * @param string $a
     * @param string $b
     * @return int
     */
    private function sort($a, $b)
    {
        static $order = null;
        if (is_null($order)) {
            $order = array(
                Piwik::translate('General_MultiSitesSummary'),
                Piwik::translate('VisitsSummary_VisitsSummary'),
                Piwik::translate('Goals_Ecommerce'),
                Piwik::translate('General_Actions'),
                Piwik::translate('Events_Events'),
                Piwik::translate('Actions_SubmenuSitesearch'),
                Piwik::translate('Referrers_Referrers'),
                Piwik::translate('Goals_Goals'),
                Piwik::translate('General_Visitors'),
                Piwik::translate('DevicesDetection_DevicesDetection'),
                Piwik::translate('UserSettings_VisitorSettings'),
            );
        }
        return ($category = strcmp(array_search($a['category'], $order), array_search($b['category'], $order))) == 0
            ? (@$a['order'] < @$b['order'] ? -1 : 1)
            : $category;
    }

    /**
     * Add the metadata for the API.get report
     * In other plugins, this would hook on 'API.getReportMetadata'
     */
    private function addApiGetMetdata(&$availableReports)
    {
        $metadata = array(
            'category'             => Piwik::translate('General_API'),
            'name'                 => Piwik::translate('General_MainMetrics'),
            'module'               => 'API',
            'action'               => 'get',
            'metrics'              => array(),
            'processedMetrics'     => array(),
            'metricsDocumentation' => array(),
            'order'                => 1
        );

        $indexesToMerge = array('metrics', 'processedMetrics', 'metricsDocumentation');

        foreach ($availableReports as $report) {
            if ($report['action'] == 'get') {
                foreach ($indexesToMerge as $index) {
                    if (isset($report[$index])
                        && is_array($report[$index])
                    ) {
                        $metadata[$index] = array_merge($metadata[$index], $report[$index]);
                    }
                }
            }
        }

        $availableReports[] = $metadata;
    }

    public function getProcessedReport($idSite, $period, $date, $apiModule, $apiAction, $segment = false,
                                       $apiParameters = false, $idGoal = false, $language = false,
                                       $showTimer = true, $hideMetricsDoc = false, $idSubtable = false, $showRawMetrics = false)
    {
        $timer = new Timer();
        if (empty($apiParameters)) {
            $apiParameters = array();
        }
        if (!empty($idGoal)
            && empty($apiParameters['idGoal'])
        ) {
            $apiParameters['idGoal'] = $idGoal;
        }
        // Is this report found in the Metadata available reports?
        $reportMetadata = $this->getMetadata($idSite, $apiModule, $apiAction, $apiParameters, $language,
            $period, $date, $hideMetricsDoc, $showSubtableReports = true);
        if (empty($reportMetadata)) {
            throw new Exception("Requested report $apiModule.$apiAction for Website id=$idSite not found in the list of available reports. \n");
        }

        $reportMetadata = reset($reportMetadata);

        // Generate Api call URL passing custom parameters
        $parameters = array_merge($apiParameters, array(
                                                       'method'     => $apiModule . '.' . $apiAction,
                                                       'idSite'     => $idSite,
                                                       'period'     => $period,
                                                       'date'       => $date,
                                                       'format'     => 'original',
                                                       'serialize'  => '0',
                                                       'language'   => $language,
                                                       'idSubtable' => $idSubtable
                                                  ));

        if (isset($reportMetadata['processedMetrics'])) {
            $deleteRowsWithNoVisit = '1';
            if (!empty($reportMetadata['constantRowsCount'])) {
                $deleteRowsWithNoVisit = '0';
            }
            $parameters['filter_add_columns_when_show_all_columns'] = $deleteRowsWithNoVisit;
        }

        if (!empty($segment)) $parameters['segment'] = $segment;

        $url = Url::getQueryStringFromParameters($parameters);
        $request = new Request($url);
        try {
            /** @var DataTable */
            $dataTable = $request->process();
        } catch (Exception $e) {
            throw new Exception("API returned an error: " . $e->getMessage() . " at " . basename($e->getFile()) . ":" . $e->getLine() . "\n");
        }

        list($newReport, $columns, $rowsMetadata, $totals) = $this->handleTableReport($idSite, $dataTable, $reportMetadata, $showRawMetrics);

        foreach ($columns as $columnId => &$name) {
            $name = ucfirst($name);
        }
        $website = new Site($idSite);

        $period = Period\Factory::build($period, $date);
        $period = $period->getLocalizedLongString();

        $return = array(
            'website'        => $website->getName(),
            'prettyDate'     => $period,
            'metadata'       => $reportMetadata,
            'columns'        => $columns,
            'reportData'     => $newReport,
            'reportMetadata' => $rowsMetadata,
            'reportTotal'    => $totals
        );
        if ($showTimer) {
            $return['timerMillis'] = $timer->getTimeMs(0);
        }
        return $return;
    }

    /**
     * Enhance a $dataTable using metadata :
     *
     * - remove metrics based on $reportMetadata['metrics']
     * - add 0 valued metrics if $dataTable doesn't provide all $reportMetadata['metrics']
     * - format metric values to a 'human readable' format
     * - extract row metadata to a separate Simple|Set : $rowsMetadata
     * - translate metric names to a separate array : $columns
     *
     * @param int $idSite enables monetary value formatting based on site currency
     * @param \Piwik\DataTable\Map|\Piwik\DataTable\Simple $dataTable
     * @param array $reportMetadata
     * @param bool $showRawMetrics
     * @return array Simple|Set $newReport with human readable format & array $columns list of translated column names & Simple|Set $rowsMetadata
     */
    private function handleTableReport($idSite, $dataTable, &$reportMetadata, $showRawMetrics = false)
    {
        $hasDimension = isset($reportMetadata['dimension']);
        $columns = $reportMetadata['metrics'];

        if ($hasDimension) {
            $columns = array_merge(
                array('label' => $reportMetadata['dimension']),
                $columns
            );

            if (isset($reportMetadata['processedMetrics'])) {
                $processedMetricsAdded = Metrics::getDefaultProcessedMetrics();
                foreach ($processedMetricsAdded as $processedMetricId => $processedMetricTranslation) {
                    // this processed metric can be displayed for this report
                    if (isset($reportMetadata['processedMetrics'][$processedMetricId])) {
                        $columns[$processedMetricId] = $processedMetricTranslation;
                    }
                }
            }

            // Display the global Goal metrics
            if (isset($reportMetadata['metricsGoal'])) {
                $metricsGoalDisplay = array('revenue');
                // Add processed metrics to be displayed for this report
                foreach ($metricsGoalDisplay as $goalMetricId) {
                    if (isset($reportMetadata['metricsGoal'][$goalMetricId])) {
                        $columns[$goalMetricId] = $reportMetadata['metricsGoal'][$goalMetricId];
                    }
                }
            }
        }

        $columns = $this->hideShowMetrics($columns);
        $totals  = array();

        // $dataTable is an instance of Set when multiple periods requested
        if ($dataTable instanceof DataTable\Map) {
            // Need a new Set to store the 'human readable' values
            $newReport = new DataTable\Map();
            $newReport->setKeyName("prettyDate");

            // Need a new Set to store report metadata
            $rowsMetadata = new DataTable\Map();
            $rowsMetadata->setKeyName("prettyDate");

            // Process each Simple entry
            foreach ($dataTable->getDataTables() as $label => $simpleDataTable) {
                $this->removeEmptyColumns($columns, $reportMetadata, $simpleDataTable);

                list($enhancedSimpleDataTable, $rowMetadata) = $this->handleSimpleDataTable($idSite, $simpleDataTable, $columns, $hasDimension, $showRawMetrics);
                $enhancedSimpleDataTable->setAllTableMetadata($simpleDataTable->getAllTableMetadata());

                $period = $simpleDataTable->getMetadata(DataTableFactory::TABLE_METADATA_PERIOD_INDEX)->getLocalizedLongString();
                $newReport->addTable($enhancedSimpleDataTable, $period);
                $rowsMetadata->addTable($rowMetadata, $period);

                $totals = $this->aggregateReportTotalValues($simpleDataTable, $totals);
            }
        } else {
            $this->removeEmptyColumns($columns, $reportMetadata, $dataTable);
            list($newReport, $rowsMetadata) = $this->handleSimpleDataTable($idSite, $dataTable, $columns, $hasDimension, $showRawMetrics);

            $totals = $this->aggregateReportTotalValues($dataTable, $totals);
        }

        return array(
            $newReport,
            $columns,
            $rowsMetadata,
            $totals
        );
    }

    /**
     * Removes metrics from the list of columns and the report meta data if they are marked empty
     * in the data table meta data.
     */
    private function removeEmptyColumns(&$columns, &$reportMetadata, $dataTable)
    {
        $emptyColumns = $dataTable->getMetadata(DataTable::EMPTY_COLUMNS_METADATA_NAME);

        if (!is_array($emptyColumns)) {
            return;
        }

        $columns = $this->hideShowMetrics($columns, $emptyColumns);

        if (isset($reportMetadata['metrics'])) {
            $reportMetadata['metrics'] = $this->hideShowMetrics($reportMetadata['metrics'], $emptyColumns);
        }

        if (isset($reportMetadata['metricsDocumentation'])) {
            $reportMetadata['metricsDocumentation'] = $this->hideShowMetrics($reportMetadata['metricsDocumentation'], $emptyColumns);
        }
    }

    /**
     * Removes column names from an array based on the values in the hideColumns,
     * showColumns query parameters. This is a hack that provides the ColumnDelete
     * filter functionality in processed reports.
     *
     * @param array $columns List of metrics shown in a processed report.
     * @param array $emptyColumns Empty columns from the data table meta data.
     * @return array Filtered list of metrics.
     */
    private function hideShowMetrics($columns, $emptyColumns = array())
    {
        if (!is_array($columns)) {
            return $columns;
        }

        // remove columns if hideColumns query parameters exist
        $columnsToRemove = Common::getRequestVar('hideColumns', '');
        if ($columnsToRemove != '') {
            $columnsToRemove = explode(',', $columnsToRemove);
            foreach ($columnsToRemove as $name) {
                // if a column to remove is in the column list, remove it
                if (isset($columns[$name])) {
                    unset($columns[$name]);
                }
            }
        }

        // remove columns if showColumns query parameters exist
        $columnsToKeep = Common::getRequestVar('showColumns', '');
        if ($columnsToKeep != '') {
            $columnsToKeep = explode(',', $columnsToKeep);
            $columnsToKeep[] = 'label';

            foreach ($columns as $name => $ignore) {
                // if the current column should not be kept, remove it
                $idx = array_search($name, $columnsToKeep);
                if ($idx === false) // if $name is not in $columnsToKeep
                {
                    unset($columns[$name]);
                }
            }
        }

        // remove empty columns
        if (is_array($emptyColumns)) {
            foreach ($emptyColumns as $column) {
                if (isset($columns[$column])) {
                    unset($columns[$column]);
                }
            }
        }

        return $columns;
    }

    /**
     * Enhance $simpleDataTable using metadata :
     *
     * - remove metrics based on $reportMetadata['metrics']
     * - add 0 valued metrics if $simpleDataTable doesn't provide all $reportMetadata['metrics']
     * - format metric values to a 'human readable' format
     * - extract row metadata to a separate Simple $rowsMetadata
     *
     * @param int $idSite enables monetary value formatting based on site currency
     * @param Simple $simpleDataTable
     * @param array $metadataColumns
     * @param boolean $hasDimension
     * @param bool $returnRawMetrics If set to true, the original metrics will be returned
     *
     * @return array DataTable $enhancedDataTable filtered metrics with human readable format & Simple $rowsMetadata
     */
    private function handleSimpleDataTable($idSite, $simpleDataTable, $metadataColumns, $hasDimension, $returnRawMetrics = false)
    {
        // new DataTable to store metadata
        $rowsMetadata = new DataTable();

        // new DataTable to store 'human readable' values
        if ($hasDimension) {
            $enhancedDataTable = new DataTable();
        } else {
            $enhancedDataTable = new Simple();
        }

        foreach ($simpleDataTable->getRows() as $row) {
            $rowMetrics = $row->getColumns();

            // add missing metrics
            foreach ($metadataColumns as $id => $name) {
                if (!isset($rowMetrics[$id])) {
                    $row->setColumn($id, 0);
                    $rowMetrics[$id] = 0;
                }
            }

            $enhancedRow = new Row();
            $enhancedDataTable->addRow($enhancedRow);

            foreach ($rowMetrics as $columnName => $columnValue) {
                // filter metrics according to metadata definition
                if (isset($metadataColumns[$columnName])) {
                    // generate 'human readable' metric values

                    // if we handle MultiSites.getAll we do not always have the same idSite but different ones for
                    // each site, see http://dev.piwik.org/trac/ticket/5006
                    $idSiteForRow = $idSite;
                    if ($row->getMetadata('idsite') && is_numeric($row->getMetadata('idsite'))) {
                        $idSiteForRow = (int) $row->getMetadata('idsite');
                    }

                    $prettyValue = MetricsFormatter::getPrettyValue($idSiteForRow, $columnName, $columnValue, $htmlAllowed = false);
                    $enhancedRow->addColumn($columnName, $prettyValue);
                } // For example the Maps Widget requires the raw metrics to do advanced datavis
                elseif ($returnRawMetrics) {
                    if (!isset($columnValue)) {
                        $columnValue = 0;
                    }
                    $enhancedRow->addColumn($columnName, $columnValue);
                }
            }

            // If report has a dimension, extract metadata into a distinct DataTable
            if ($hasDimension) {
                $rowMetadata = $row->getMetadata();
                $idSubDataTable = $row->getIdSubDataTable();

                // Create a row metadata only if there are metadata to insert
                if (count($rowMetadata) > 0 || !is_null($idSubDataTable)) {
                    $metadataRow = new Row();
                    $rowsMetadata->addRow($metadataRow);

                    foreach ($rowMetadata as $metadataKey => $metadataValue) {
                        $metadataRow->addColumn($metadataKey, $metadataValue);
                    }

                    if (!is_null($idSubDataTable)) {
                        $metadataRow->addColumn('idsubdatatable', $idSubDataTable);
                    }
                }
            }
        }

        return array(
            $enhancedDataTable,
            $rowsMetadata
        );
    }

    private function aggregateReportTotalValues($simpleDataTable, $totals)
    {
        $metadataTotals = $simpleDataTable->getMetadata('totals');

        if (empty($metadataTotals)) {

            return $totals;
        }

        $simpleTotals = $this->hideShowMetrics($metadataTotals);

        foreach ($simpleTotals as $metric => $value) {
            if (!array_key_exists($metric, $totals)) {
                $totals[$metric] = $value;
            } else {
                $totals[$metric] += $value;
            }
        }

        return $totals;
    }
}
