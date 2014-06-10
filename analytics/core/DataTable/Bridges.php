<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

/**
 * This contains the bridge classes which were used prior to Piwik 2.0
 * The serialized reports contains these classes below, which were not using namespaces yet
 */
namespace {

    use Piwik\DataTable\Row;
    use Piwik\DataTable\Row\DataTableSummaryRow;

    class Piwik_DataTable_Row_DataTableSummary extends DataTableSummaryRow
    {
    }

    class Piwik_DataTable_Row extends Row
    {
    }

}

