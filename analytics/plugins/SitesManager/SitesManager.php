<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\SitesManager;

use Piwik\Menu\MenuAdmin;
use Piwik\Piwik;

/**
 *
 */
class SitesManager extends \Piwik\Plugin
{
    const KEEP_URL_FRAGMENT_USE_DEFAULT = 0;
    const KEEP_URL_FRAGMENT_YES = 1;
    const KEEP_URL_FRAGMENT_NO = 2;

    /**
     * @see Piwik\Plugin::getListHooksRegistered
     */
    public function getListHooksRegistered()
    {
        return array(
            'AssetManager.getJavaScriptFiles'        => 'getJsFiles',
            'AssetManager.getStylesheetFiles'        => 'getStylesheetFiles',
            'Menu.Admin.addItems'                    => 'addMenu',
            'Tracker.Cache.getSiteAttributes'        => 'recordWebsiteDataInCache',
            'Translate.getClientSideTranslationKeys' => 'getClientSideTranslationKeys',
        );
    }

    function addMenu()
    {
        MenuAdmin::getInstance()->add('CoreAdminHome_MenuManage', 'SitesManager_Sites',
            array('module' => 'SitesManager', 'action' => 'index'),
            Piwik::isUserHasSomeAdminAccess(),
            $order = 1);
    }

    /**
     * Get CSS files
     */
    public function getStylesheetFiles(&$stylesheets)
    {
        $stylesheets[] = "plugins/SitesManager/stylesheets/SitesManager.less";
        $stylesheets[] = "plugins/Zeitgeist/stylesheets/base.less";
    }

    /**
     * Get JavaScript files
     */
    public function getJsFiles(&$jsFiles)
    {
        $jsFiles[] = "plugins/SitesManager/javascripts/SitesManager.js";
    }

    /**
     * Hooks when a website tracker cache is flushed (website updated, cache deleted, or empty cache)
     * Will record in the tracker config file all data needed for this website in Tracker.
     *
     * @param array $array
     * @param int $idSite
     * @return void
     */
    public function recordWebsiteDataInCache(&$array, $idSite)
    {
        $idSite = (int)$idSite;

        // add the 'hosts' entry in the website array
        $array['hosts'] = $this->getTrackerHosts($idSite);

        $website = API::getInstance()->getSiteFromId($idSite);
        $array['excluded_ips'] = $this->getTrackerExcludedIps($website);
        $array['excluded_parameters'] = self::getTrackerExcludedQueryParameters($website);
        $array['excluded_user_agents'] = self::getExcludedUserAgents($website);
        $array['keep_url_fragment'] = self::shouldKeepURLFragmentsFor($website);
        $array['sitesearch'] = $website['sitesearch'];
        $array['sitesearch_keyword_parameters'] = $this->getTrackerSearchKeywordParameters($website);
        $array['sitesearch_category_parameters'] = $this->getTrackerSearchCategoryParameters($website);
    }

    /**
     * Returns whether we should keep URL fragments for a specific site.
     *
     * @param array $site DB data for the site.
     * @return bool
     */
    private static function shouldKeepURLFragmentsFor($site)
    {
        if ($site['keep_url_fragment'] == self::KEEP_URL_FRAGMENT_YES) {
            return true;
        } else if ($site['keep_url_fragment'] == self::KEEP_URL_FRAGMENT_NO) {
            return false;
        }

        return API::getInstance()->getKeepURLFragmentsGlobal();
    }

    private function getTrackerSearchKeywordParameters($website)
    {
        $searchParameters = $website['sitesearch_keyword_parameters'];
        if (empty($searchParameters)) {
            $searchParameters = API::getInstance()->getSearchKeywordParametersGlobal();
        }
        return explode(",", $searchParameters);
    }

    private function getTrackerSearchCategoryParameters($website)
    {
        $searchParameters = $website['sitesearch_category_parameters'];
        if (empty($searchParameters)) {
            $searchParameters = API::getInstance()->getSearchCategoryParametersGlobal();
        }
        return explode(",", $searchParameters);
    }

    /**
     * Returns the array of excluded IPs to save in the config file
     *
     * @param array $website
     * @return array
     */
    private function getTrackerExcludedIps($website)
    {
        $excludedIps = $website['excluded_ips'];
        $globalExcludedIps = API::getInstance()->getExcludedIpsGlobal();

        $excludedIps .= ',' . $globalExcludedIps;

        $ipRanges = array();
        foreach (explode(',', $excludedIps) as $ip) {
            $ipRange = API::getInstance()->getIpsForRange($ip);
            if ($ipRange !== false) {
                $ipRanges[] = $ipRange;
            }
        }
        return $ipRanges;
    }

    /**
     * Returns the array of excluded user agent substrings for a site. Filters out
     * any garbage data & trims each entry.
     *
     * @param array $website The full set of information for a site.
     * @return array
     */
    private static function getExcludedUserAgents($website)
    {
        $excludedUserAgents = API::getInstance()->getExcludedUserAgentsGlobal();
        if (API::getInstance()->isSiteSpecificUserAgentExcludeEnabled()) {
            $excludedUserAgents .= ',' . $website['excluded_user_agents'];
        }
        return self::filterBlankFromCommaSepList($excludedUserAgents);
    }

    /**
     * Returns the array of URL query parameters to exclude from URLs
     *
     * @param array $website
     * @return array
     */
    public static function getTrackerExcludedQueryParameters($website)
    {
        $excludedQueryParameters = $website['excluded_parameters'];
        $globalExcludedQueryParameters = API::getInstance()->getExcludedQueryParametersGlobal();

        $excludedQueryParameters .= ',' . $globalExcludedQueryParameters;
        return self::filterBlankFromCommaSepList($excludedQueryParameters);
    }

    /**
     * Trims each element of a comma-separated list of strings, removes empty elements and
     * returns the result (as an array).
     *
     * @param string $parameters The unfiltered list.
     * @return array The filtered list of strings as an array.
     */
    static private function filterBlankFromCommaSepList($parameters)
    {
        $parameters = explode(',', $parameters);
        $parameters = array_filter($parameters, 'strlen');
        $parameters = array_unique($parameters);
        return $parameters;
    }

    /**
     * Returns the hosts alias URLs
     * @param int $idSite
     * @return array
     */
    private function getTrackerHosts($idSite)
    {
        $urls = API::getInstance()->getSiteUrlsFromId($idSite);
        $hosts = array();
        foreach ($urls as $url) {
            $url = parse_url($url);
            if (isset($url['host'])) {
                $hosts[] = $url['host'];
            }
        }
        return $hosts;
    }

    public function getClientSideTranslationKeys(&$translationKeys)
    {
        $translationKeys[] = "General_Save";
        $translationKeys[] = "General_OrCancel";
        $translationKeys[] = "SitesManager_OnlyOneSiteAtTime";
        $translationKeys[] = "SitesManager_DeleteConfirm";
    }
}
