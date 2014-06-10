<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\SEO;

use Piwik\Version;
use Piwik\WidgetsList;

/**
 */
class SEO extends \Piwik\Plugin
{
    /**
     * @see Piwik\Plugin::getInformation
     */
    public function getInformation()
    {
        return array(
            'description'      => 'This Plugin extracts and displays SEO metrics: Alexa web ranking, Google Pagerank, number of Indexed pages and backlinks of the currently selected website.',
            'authors'          => array(array('name' => 'Piwik', 'homepage' => 'http://piwik.org/')),
            'version'          => Version::VERSION,
            'license'          => 'GPL v3+',
            'license_homepage' => 'http://www.gnu.org/licenses/gpl.html'
        );
    }

    /**
     * @see Piwik\Plugin::getListHooksRegistered
     */
    public function getListHooksRegistered()
    {
        $hooks = array('WidgetsList.addWidgets' => 'addWidgets');
        return $hooks;
    }

    function addWidgets()
    {
        WidgetsList::add('SEO', 'SEO_SeoRankings', 'SEO', 'getRank');
    }
}
