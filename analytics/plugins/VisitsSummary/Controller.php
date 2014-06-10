<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\VisitsSummary;

use Piwik\API\Request;
use Piwik\Common;
use Piwik\DataTable;
use Piwik\DataTable\Row;
use Piwik\Piwik;
use Piwik\Plugins\Actions\API as APIActions;
use Piwik\Site;
use Piwik\View;

/**
 *
 */
class Controller extends \Piwik\Plugin\Controller
{
    public function index()
    {
        $view = new View('@VisitsSummary/index');
        $this->setPeriodVariablesView($view);
        $view->graphEvolutionVisitsSummary = $this->getEvolutionGraph(array(), array('nb_visits'));
        $this->setSparklinesAndNumbers($view);
        return $view->render();
    }

    public function getSparklines()
    {
        $view = new View('@VisitsSummary/getSparklines');
        $this->setPeriodVariablesView($view);
        $this->setSparklinesAndNumbers($view);
        return $view->render();
    }

    public function getEvolutionGraph(array $columns = array(), array $defaultColumns = array())
    {
        if (empty($columns)) {
            $columns = Common::getRequestVar('columns', false);
            if (false !== $columns) {
                $columns = Piwik::getArrayFromApiParameter($columns);
            }
        }

        $documentation = Piwik::translate('VisitsSummary_VisitsSummaryDocumentation') . '<br />'
            . Piwik::translate('General_BrokenDownReportDocumentation') . '<br /><br />'

            . '<b>' . Piwik::translate('General_ColumnNbVisits') . ':</b> '
            . Piwik::translate('General_ColumnNbVisitsDocumentation') . '<br />'

            . '<b>' . Piwik::translate('General_ColumnNbUniqVisitors') . ':</b> '
            . Piwik::translate('General_ColumnNbUniqVisitorsDocumentation') . '<br />'

            . '<b>' . Piwik::translate('General_ColumnNbActions') . ':</b> '
            . Piwik::translate('General_ColumnNbActionsDocumentation') . '<br />'

            . '<b>' . Piwik::translate('General_ColumnActionsPerVisit') . ':</b> '
            . Piwik::translate('General_ColumnActionsPerVisitDocumentation');

        $selectableColumns = array(
            // columns from VisitsSummary.get
            'nb_visits',
            'nb_uniq_visitors',
            'avg_time_on_site',
            'bounce_rate',
            'nb_actions_per_visit',
            'max_actions',
            'nb_visits_converted',
            // columns from Actions.get
            'nb_pageviews',
            'nb_uniq_pageviews',
            'nb_downloads',
            'nb_uniq_downloads',
            'nb_outlinks',
            'nb_uniq_outlinks',
            'avg_time_generation'
        );

        $idSite = Common::getRequestVar('idSite');
        $displaySiteSearch = Site::isSiteSearchEnabledFor($idSite);

        if ($displaySiteSearch) {
            $selectableColumns[] = 'nb_searches';
            $selectableColumns[] = 'nb_keywords';
        }

        $view = $this->getLastUnitGraphAcrossPlugins($this->pluginName, __FUNCTION__, $columns,
            $selectableColumns, $documentation);

        if (empty($view->config->columns_to_display) && !empty($defaultColumns)) {
            $view->config->columns_to_display = $defaultColumns;
        }

        return $this->renderView($view);
    }

    static public function getVisitsSummary()
    {
        $requestString = "method=VisitsSummary.get" .
            "&format=original" .
            // we disable filters for example "search for pattern", in the case this method is called
            // by a method that already calls the API with some generic filters applied
            "&disable_generic_filters=1";
        $request = new Request($requestString);
        $result = $request->process();
        return empty($result) ? new DataTable() : $result;
    }

    static public function getVisits()
    {
        $requestString = "method=VisitsSummary.getVisits" .
            "&format=original" .
            "&disable_generic_filters=1";
        $request = new Request($requestString);
        return $request->process();
    }

    protected function setSparklinesAndNumbers($view)
    {
        $view->urlSparklineNbVisits = $this->getUrlSparkline('getEvolutionGraph', array('columns' => $view->displayUniqueVisitors ? array('nb_visits', 'nb_uniq_visitors') : array('nb_visits')));
        $view->urlSparklineNbPageviews = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('nb_pageviews', 'nb_uniq_pageviews')));
        $view->urlSparklineNbDownloads = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('nb_downloads', 'nb_uniq_downloads')));
        $view->urlSparklineNbOutlinks = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('nb_outlinks', 'nb_uniq_outlinks')));
        $view->urlSparklineAvgVisitDuration = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('avg_time_on_site')));
        $view->urlSparklineMaxActions = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('max_actions')));
        $view->urlSparklineActionsPerVisit = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('nb_actions_per_visit')));
        $view->urlSparklineBounceRate = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('bounce_rate')));
        $view->urlSparklineAvgGenerationTime = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('avg_time_generation')));

        $idSite = Common::getRequestVar('idSite');
        $displaySiteSearch = Site::isSiteSearchEnabledFor($idSite);
        if ($displaySiteSearch) {
            $view->urlSparklineNbSearches = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('nb_searches', 'nb_keywords')));
        }
        $view->displaySiteSearch = $displaySiteSearch;

        $dataTableVisit = self::getVisitsSummary();
        $dataRow = $dataTableVisit->getRowsCount() == 0 ? new Row() : $dataTableVisit->getFirstRow();


        $view->nbUniqVisitors = (int)$dataRow->getColumn('nb_uniq_visitors');
        $nbVisits = (int)$dataRow->getColumn('nb_visits');
        $view->nbVisits = $nbVisits;

        $view->averageVisitDuration = $dataRow->getColumn('avg_time_on_site');
        $nbBouncedVisits = $dataRow->getColumn('bounce_count');
        $view->bounceRate = Piwik::getPercentageSafe($nbBouncedVisits, $nbVisits);
        $view->maxActions = (int)$dataRow->getColumn('max_actions');
        $view->nbActionsPerVisit = $dataRow->getColumn('nb_actions_per_visit');

        if(Common::isActionsPluginEnabled()) {
            $view->showActionsPluginReports = true;
            $dataTableActions = APIActions::getInstance()->get($idSite, Common::getRequestVar('period'), Common::getRequestVar('date'),
                \Piwik\API\Request::getRawSegmentFromRequest());
            $dataActionsRow =
                $dataTableActions->getRowsCount() == 0 ? new Row() : $dataTableActions->getFirstRow();

            $view->nbPageviews = (int)$dataActionsRow->getColumn('nb_pageviews');
            $view->nbUniquePageviews = (int)$dataActionsRow->getColumn('nb_uniq_pageviews');
            $view->nbDownloads = (int)$dataActionsRow->getColumn('nb_downloads');
            $view->nbUniqueDownloads = (int)$dataActionsRow->getColumn('nb_uniq_downloads');
            $view->nbOutlinks = (int)$dataActionsRow->getColumn('nb_outlinks');
            $view->nbUniqueOutlinks = (int)$dataActionsRow->getColumn('nb_uniq_outlinks');
            $view->averageGenerationTime = $dataActionsRow->getColumn('avg_time_generation');


            if ($displaySiteSearch) {
                $view->nbSearches = (int)$dataActionsRow->getColumn('nb_searches');
                $view->nbKeywords = (int)$dataActionsRow->getColumn('nb_keywords');
            }

            // backward compatibility:
            // show actions if the finer metrics are not archived
            $view->showOnlyActions = false;
            if ($dataActionsRow->getColumn('nb_pageviews')
                + $dataActionsRow->getColumn('nb_downloads')
                + $dataActionsRow->getColumn('nb_outlinks') == 0
                && $dataRow->getColumn('nb_actions') > 0
            ) {
                $view->showOnlyActions = true;
                $view->nbActions = $dataRow->getColumn('nb_actions');
                $view->urlSparklineNbActions = $this->getUrlSparkline('getEvolutionGraph', array('columns' => array('nb_actions')));
            }
        }

    }
}
