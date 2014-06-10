<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Updates;

use Piwik\Common;
use Piwik\Updater;
use Piwik\Updates;

/**
 */
class Updates_0_4 extends Updates
{
    static function getSql()
    {
        return array(
            // 0.4 [1140]
            'UPDATE `' . Common::prefixTable('log_visit') . '`
				SET location_ip=location_ip+CAST(POW(2,32) AS UNSIGNED) WHERE location_ip < 0'                                                             => false,
            'ALTER TABLE `' . Common::prefixTable('log_visit') . '`
				CHANGE `location_ip` `location_ip` BIGINT UNSIGNED NOT NULL'              => false,
            'UPDATE `' . Common::prefixTable('logger_api_call') . '`
				SET caller_ip=caller_ip+CAST(POW(2,32) AS UNSIGNED) WHERE caller_ip < 0' => false,
            'ALTER TABLE `' . Common::prefixTable('logger_api_call') . '`
				CHANGE `caller_ip` `caller_ip` BIGINT UNSIGNED'                     => false,
        );
    }

    static function update()
    {
        Updater::updateDatabase(__FILE__, self::getSql());
    }
}
