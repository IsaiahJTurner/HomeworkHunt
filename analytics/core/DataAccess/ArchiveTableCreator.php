<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\DataAccess;

use Exception;
use Piwik\Common;
use Piwik\Date;
use Piwik\Db;
use Piwik\DbHelper;

class ArchiveTableCreator
{
    const NUMERIC_TABLE = "numeric";

    const BLOB_TABLE = "blob";

    static public $tablesAlreadyInstalled = null;

    static public function getNumericTable(Date $date)
    {
        return self::getTable($date, self::NUMERIC_TABLE);
    }

    static public function getBlobTable(Date $date)
    {
        return self::getTable($date, self::BLOB_TABLE);
    }

    static protected function getTable(Date $date, $type)
    {
        $tableNamePrefix = "archive_" . $type;
        $tableName = $tableNamePrefix . "_" . $date->toString('Y_m');
        $tableName = Common::prefixTable($tableName);
        self::createArchiveTablesIfAbsent($tableName, $tableNamePrefix);
        return $tableName;
    }

    static protected function createArchiveTablesIfAbsent($tableName, $tableNamePrefix)
    {
        if (is_null(self::$tablesAlreadyInstalled)) {
            self::refreshTableList();
        }

        if (!in_array($tableName, self::$tablesAlreadyInstalled)) {
            $db  = Db::get();
            $sql = DbHelper::getTableCreateSql($tableNamePrefix);

            // replace table name template by real name
            $tableNamePrefix = Common::prefixTable($tableNamePrefix);
            $sql = str_replace($tableNamePrefix, $tableName, $sql);
            try {
                $db->query($sql);
            } catch (Exception $e) {
                // accept mysql error 1050: table already exists, throw otherwise
                if (!$db->isErrNo($e, '1050')) {
                    throw $e;
                }
            }
            self::$tablesAlreadyInstalled[] = $tableName;
        }
    }

    static public function clear()
    {
        self::$tablesAlreadyInstalled = null;
    }

    static public function refreshTableList($forceReload = false)
    {
        self::$tablesAlreadyInstalled = DbHelper::getTablesInstalled($forceReload);
    }

    /**
     * Returns all table names archive_*
     *
     * @return array
     */
    static public function getTablesArchivesInstalled()
    {
        if (is_null(self::$tablesAlreadyInstalled)) {
            self::refreshTableList();
        }

        $archiveTables = array();
        foreach (self::$tablesAlreadyInstalled as $table) {
            if (strpos($table, 'archive_numeric_') !== false
                || strpos($table, 'archive_blob_') !== false
            ) {
                $archiveTables[] = $table;
            }
        }
        return $archiveTables;
    }

    static public function getDateFromTableName($tableName)
    {
        $tableName = Common::unprefixTable($tableName);
        $date = str_replace(array('archive_numeric_', 'archive_blob_'), '', $tableName);
        return $date;
    }

    static public function getTypeFromTableName($tableName)
    {
        if (strpos($tableName, 'archive_numeric_') !== false) {
            return self::NUMERIC_TABLE;
        }
        if (strpos($tableName, 'archive_blob_') !== false) {
            return self::BLOB_TABLE;
        }
        return false;
    }
}
