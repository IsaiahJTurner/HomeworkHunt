<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik;

use Exception;
use Piwik\Db\Adapter;
use Piwik\Db\Schema;
use Piwik\Db;
use Piwik\Plugin;
use Piwik\Plugins\SitesManager\API as APISitesManager;
use Piwik\Plugins\UsersManager\API as APIUsersManager;
use Piwik\Session;
use Piwik\Tracker;
use Piwik\View;

/**
 * @see core/Translate.php
 */
require_once PIWIK_INCLUDE_PATH . '/core/Translate.php';

/**
 * Main piwik helper class.
 * 
 * Contains helper methods for a variety of common tasks. Plugin developers are
 * encouraged to reuse these methods as much as possible.
 */
class Piwik
{
    /**
     * Piwik periods
     * @var array
     */
    public static $idPeriods = array(
        'day'   => 1,
        'week'  => 2,
        'month' => 3,
        'year'  => 4,
        'range' => 5,
    );

    /**
     * The idGoal query parameter value for the special 'abandoned carts' goal.
     * 
     * @api
     */
    const LABEL_ID_GOAL_IS_ECOMMERCE_CART = 'ecommerceAbandonedCart';

    /**
     * The idGoal query parameter value for the special 'ecommerce' goal.
     * 
     * @api
     */
    const LABEL_ID_GOAL_IS_ECOMMERCE_ORDER = 'ecommerceOrder';

    /**
     * Trigger E_USER_ERROR with optional message
     *
     * @param string $message
     */
    static public function error($message = '')
    {
        trigger_error($message, E_USER_ERROR);
    }

    /**
     * Display the message in a nice red font with a nice icon
     * ... and dies
     *
     * @param string $message
     */
    static public function exitWithErrorMessage($message)
    {
        if (!Common::isPhpCliMode()) {
            @header('Content-Type: text/html; charset=utf-8');
        }

        $output = "<style>a{color:red;}</style>\n" .
            "<div style='color:red;font-family:Georgia;font-size:120%'>" .
            "<p><img src='plugins/Zeitgeist/images/error_medium.png' style='vertical-align:middle; float:left;padding:20 20 20 20' />" .
            $message .
            "</p></div>";
        print($output);
        exit;
    }

    /**
     * Computes the division of i1 by i2. If either i1 or i2 are not number, or if i2 has a value of zero
     * we return 0 to avoid the division by zero.
     *
     * @param number $i1
     * @param number $i2
     * @return number The result of the division or zero
     */
    static public function secureDiv($i1, $i2)
    {
        if (is_numeric($i1) && is_numeric($i2) && floatval($i2) != 0) {
            return $i1 / $i2;
        }
        return 0;
    }

    /**
     * Safely compute a percentage.  Return 0 to avoid division by zero.
     *
     * @param number $dividend
     * @param number $divisor
     * @param int $precision
     * @return number
     */
    static public function getPercentageSafe($dividend, $divisor, $precision = 0)
    {
        if ($divisor == 0) {
            return 0;
        }
        return round(100 * $dividend / $divisor, $precision);
    }

    /**
     * Returns the Javascript code to be inserted on every page to track
     *
     * @param int $idSite
     * @param string $piwikUrl http://path/to/piwik/directory/
     * @return string
     */
    static public function getJavascriptCode($idSite, $piwikUrl, $mergeSubdomains = false, $groupPageTitlesByDomain = false,
                                             $mergeAliasUrls = false, $visitorCustomVariables = false, $pageCustomVariables = false,
                                             $customCampaignNameQueryParam = false, $customCampaignKeywordParam = false,
                                             $doNotTrack = false)
    {
        // changes made to this code should be mirrored in plugins/CoreAdminHome/javascripts/jsTrackingGenerator.js var generateJsCode
        $jsCode = file_get_contents(PIWIK_INCLUDE_PATH . "/plugins/Zeitgeist/templates/javascriptCode.tpl");
        $jsCode = htmlentities($jsCode);
        if(substr($piwikUrl, 0, 4) !== 'http') {
            $piwikUrl = 'http://' . $piwikUrl;
        }
        preg_match('~^(http|https)://(.*)$~D', $piwikUrl, $matches);
        $piwikUrl = rtrim(@$matches[2], "/");

        // Build optional parameters to be added to text
        $options = '';
        if ($groupPageTitlesByDomain) {
            $options .= '  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);' . PHP_EOL;
        }
        if ($mergeSubdomains || $mergeAliasUrls) {
            $options .= self::getJavascriptTagOptions($idSite, $mergeSubdomains, $mergeAliasUrls);
        }
        $maxCustomVars = Plugins\CustomVariables\CustomVariables::getMaxCustomVariables();
        if ($visitorCustomVariables) {
            $options .=  '  // you can set up to ' . $maxCustomVars . ' custom variables for each visitor' . PHP_EOL;
            $index = 1;
            foreach ($visitorCustomVariables as $visitorCustomVariable) {
                $options .=  '  _paq.push(["setCustomVariable", '.$index++.', "'.$visitorCustomVariable[0].'", "'.$visitorCustomVariable[1].'", "visit"]);' . PHP_EOL;
            }
        }
        if ($pageCustomVariables) {
            $options .=  '  // you can set up to ' . $maxCustomVars . ' custom variables for each action (page view, download, click, site search)' . PHP_EOL;
            $index = 1;
            foreach ($pageCustomVariables as $pageCustomVariable) {
                $options .=  '  _paq.push(["setCustomVariable", '.$index++.', "'.$pageCustomVariable[0].'", "'.$pageCustomVariable[1].'", "page"]);' . PHP_EOL;
            }
        }
        if ($customCampaignNameQueryParam) {
            $options .=  '  _paq.push(["setCampaignNameKey", "'.$customCampaignNameQueryParam.'"]);' . PHP_EOL;
        }
        if ($customCampaignKeywordParam) {
            $options .=  '  _paq.push(["setCampaignKeywordKey", "'.$customCampaignKeywordParam.'"]);' . PHP_EOL;
        }
        if ($doNotTrack) {
            $options .= '  _paq.push(["setDoNotTrack", true]);' . PHP_EOL;
        }

        $codeImpl = array(
            'idSite' => $idSite,
            'piwikUrl' => Common::sanitizeInputValue($piwikUrl),
            'options' => $options
        );
        $parameters = compact('mergeSubdomains', 'groupPageTitlesByDomain', 'mergeAliasUrls', 'visitorCustomVariables',
                              'pageCustomVariables', 'customCampaignNameQueryParam', 'customCampaignKeywordParam',
                              'doNotTrack');

        /**
         * Triggered when generating JavaScript tracking code server side. Plugins can use
         * this event to customise the JavaScript tracking code that is displayed to the
         * user.
         *
         * @param array &$codeImpl An array containing snippets of code that the event handler
         *                         can modify. Will contain the following elements:
         *
         *                         - **idSite**: The ID of the site being tracked.
         *                         - **piwikUrl**: The tracker URL to use.
         *                         - **options**: A string of JavaScript code that customises
         *                                        the JavaScript tracker.
         *
         *                         The **httpsPiwikUrl** element can be set if the HTTPS
         *                         domain is different from the normal domain.
         * @param array $parameters The parameters supplied to the `Piwik::getJavascriptCode()`.
         */
        self::postEvent('Piwik.getJavascriptCode', array(&$codeImpl, $parameters));

        if (!empty($codeImpl['httpsPiwikUrl'])) {
            $setTrackerUrl = 'var u=(("https:" == document.location.protocol) ? "https://{$httpsPiwikUrl}/" : '
                           . '"http://{$piwikUrl}/");';

            $codeImpl['httpsPiwikUrl'] = rtrim($codeImpl['httpsPiwikUrl'], "/");
        } else {
            $setTrackerUrl = 'var u=(("https:" == document.location.protocol) ? "https" : "http") + "://{$piwikUrl}/";';
        }
        $codeImpl = array('setTrackerUrl' => htmlentities($setTrackerUrl)) + $codeImpl;

        foreach ($codeImpl as $keyToReplace => $replaceWith) {
            $jsCode = str_replace('{$' . $keyToReplace . '}', $replaceWith, $jsCode);
        }
        return $jsCode;
    }

    /**
     * Generate a title for image tags
     *
     * @return string
     */
    static public function getRandomTitle()
    {
        static $titles = array(
            'Web analytics',
            'Open analytics platform',
            'Real Time Web Analytics',
            'Analytics',
            'Real Time Analytics',
            'Analytics in Real time',
            'Open Source Analytics',
            'Open Source Web Analytics',
            'Free Website Analytics',
            'Free Web Analytics',
            'Analytics Platform',
        );
        $id = abs(intval(md5(Url::getCurrentHost())));
        $title = $titles[$id % count($titles)];
        return $title;
    }

    /*
     * Access
     */

    /**
     * Returns the current user's email address.
     *
     * @return string
     * @api
     */
    static public function getCurrentUserEmail()
    {
        $user = APIUsersManager::getInstance()->getUser(Piwik::getCurrentUserLogin());
        return $user['email'];
    }

    /**
     * Get a list of all email addresses having Super User access.
     *
     * @return array
     */
    static public function getAllSuperUserAccessEmailAddresses()
    {
        $emails = array();

        try {
            $superUsers = APIUsersManager::getInstance()->getUsersHavingSuperUserAccess();
        } catch (\Exception $e) {
            return $emails;
        }

        foreach ($superUsers as $superUser) {
            $emails[$superUser['login']] = $superUser['email'];
        }

        return $emails;
    }

    /**
     * Returns the current user's username.
     *
     * @return string
     * @api
     */
    static public function getCurrentUserLogin()
    {
        return Access::getInstance()->getLogin();
    }

    /**
     * Returns the current user's token auth.
     *
     * @return string
     * @api
     */
    static public function getCurrentUserTokenAuth()
    {
        return Access::getInstance()->getTokenAuth();
    }

    /**
     * Returns `true` if the current user is either the Super User or the user specified by
     * `$theUser`.
     *
     * @param string $theUser A username.
     * @return bool
     * @api
     */
    static public function hasUserSuperUserAccessOrIsTheUser($theUser)
    {
        try {
            self::checkUserHasSuperUserAccessOrIsTheUser($theUser);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Check that the current user is either the specified user or the superuser.
     *
     * @param string $theUser A username.
     * @throws NoAccessException If the user is neither the Super User nor the user `$theUser`.
     * @api
     */
    static public function checkUserHasSuperUserAccessOrIsTheUser($theUser)
    {
        try {
            if (Piwik::getCurrentUserLogin() !== $theUser) {
                // or to the Super User
                Piwik::checkUserHasSuperUserAccess();
            }
        } catch (NoAccessException $e) {
            throw new NoAccessException(Piwik::translate('General_ExceptionCheckUserHasSuperUserAccessOrIsTheUser', array($theUser)));
        }
    }

    /**
     * Check whether the given user has superuser access.
     *
     * @param string $theUser A username.
     * @return bool
     * @api
     */
    static public function hasTheUserSuperUserAccess($theUser)
    {
        if (empty($theUser)) {
            return false;
        }

        if (Piwik::getCurrentUserLogin() === $theUser && Piwik::hasUserSuperUserAccess()) {
            return true;
        }

        try {
            $superUsers = APIUsersManager::getInstance()->getUsersHavingSuperUserAccess();
        } catch (\Exception $e) {
            return false;
        }

        foreach ($superUsers as $superUser) {
            if ($theUser === $superUser['login']) {
                return true;
            }
        }

        return false;
    }


    /**
     * Returns true if the current user has Super User access.
     *
     * @return bool
     * @api
     */
    static public function hasUserSuperUserAccess()
    {
        try {
            self::checkUserHasSuperUserAccess();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Returns true if the current user is the special **anonymous** user or not.
     *
     * @return bool
     * @api
     */
    static public function isUserIsAnonymous()
    {
        return Piwik::getCurrentUserLogin() == 'anonymous';
    }

    /**
     * Checks that the user is not the anonymous user.
     *
     * @throws NoAccessException if the current user is the anonymous user.
     * @api
     */
    static public function checkUserIsNotAnonymous()
    {
        if (Access::getInstance()->hasSuperUserAccess()) {
            return;
        }
        if (self::isUserIsAnonymous()) {
            throw new NoAccessException(Piwik::translate('General_YouMustBeLoggedIn'));
        }
    }

    /**
     * Helper method user to set the current as superuser.
     * This should be used with great care as this gives the user all permissions.
     *
     * @param bool $bool true to set current user as Super User
     */
    static public function setUserHasSuperUserAccess($bool = true)
    {
        Access::getInstance()->setSuperUserAccess($bool);
    }

    /**
     * Check that the current user has superuser access.
     *
     * @throws Exception if the current user is not the superuser.
     * @api
     */
    static public function checkUserHasSuperUserAccess()
    {
        Access::getInstance()->checkUserHasSuperUserAccess();
    }

    /**
     * Returns `true` if the user has admin access to the requested sites, `false` if otherwise.
     *
     * @param int|array $idSites The list of site IDs to check access for.
     * @return bool
     * @api
     */
    static public function isUserHasAdminAccess($idSites)
    {
        try {
            self::checkUserHasAdminAccess($idSites);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Checks that the current user has admin access to the requested list of sites.
     *
     * @param int|array $idSites One or more site IDs to check access for.
     * @throws Exception If user doesn't have admin access.
     * @api
     */
    static public function checkUserHasAdminAccess($idSites)
    {
        Access::getInstance()->checkUserHasAdminAccess($idSites);
    }

    /**
     * Returns `true` if the current user has admin access to at least one site.
     *
     * @return bool
     * @api
     */
    static public function isUserHasSomeAdminAccess()
    {
        try {
            self::checkUserHasSomeAdminAccess();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Checks that the current user has admin access to at least one site.
     *
     * @throws Exception if user doesn't have admin access to any site.
     * @api
     */
    static public function checkUserHasSomeAdminAccess()
    {
        Access::getInstance()->checkUserHasSomeAdminAccess();
    }

    /**
     * Returns `true` if the user has view access to the requested list of sites.
     *
     * @param int|array $idSites One or more site IDs to check access for.
     * @return bool
     * @api
     */
    static public function isUserHasViewAccess($idSites)
    {
        try {
            self::checkUserHasViewAccess($idSites);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Checks that the current user has view access to the requested list of sites
     *
     * @param int|array $idSites The list of site IDs to check access for.
     * @throws Exception if the current user does not have view access to every site in the list.
     * @api
     */
    static public function checkUserHasViewAccess($idSites)
    {
        Access::getInstance()->checkUserHasViewAccess($idSites);
    }

    /**
     * Returns `true` if the current user has view access to at least one site.
     *
     * @return bool
     * @api
     */
    static public function isUserHasSomeViewAccess()
    {
        try {
            self::checkUserHasSomeViewAccess();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Checks that the current user has view access to at least one site.
     *
     * @throws Exception if user doesn't have view access to any site.
     * @api
     */
    static public function checkUserHasSomeViewAccess()
    {
        Access::getInstance()->checkUserHasSomeViewAccess();
    }

    /*
     * Current module, action, plugin
     */

    /**
     * Returns the name of the Login plugin currently being used.
     * Must be used since it is not allowed to hardcode 'Login' in URLs
     * in case another Login plugin is being used.
     *
     * @return string
     */
    static public function getLoginPluginName()
    {
        return Registry::get('auth')->getName();
    }

    /**
     * Returns the plugin currently being used to display the page
     *
     * @return Plugin
     */
    static public function getCurrentPlugin()
    {
        return \Piwik\Plugin\Manager::getInstance()->getLoadedPlugin(Piwik::getModule());
    }

    /**
     * Returns the current module read from the URL (eg. 'API', 'UserSettings', etc.)
     *
     * @return string
     */
    static public function getModule()
    {
        return Common::getRequestVar('module', '', 'string');
    }

    /**
     * Returns the current action read from the URL
     *
     * @return string
     */
    static public function getAction()
    {
        return Common::getRequestVar('action', '', 'string');
    }

    /**
     * Helper method used in API function to introduce array elements in API parameters.
     * Array elements can be passed by comma separated values, or using the notation
     * array[]=value1&array[]=value2 in the URL.
     * This function will handle both cases and return the array.
     *
     * @param array|string $columns
     * @return array
     */
    static public function getArrayFromApiParameter($columns)
    {
        if (empty($columns)) {
            return array();
        }
        if (is_array($columns)) {
            return $columns;
        }
        $array = explode(',', $columns);
        $array = array_unique($array);
        return $array;
    }

    /**
     * Redirects the current request to a new module and action.
     *
     * @param string $newModule The target module, eg, `'UserCountry'`.
     * @param string $newAction The target controller action, eg, `'index'`.
     * @param array $parameters The query parameter values to modify before redirecting.
     * @api
     */
    static public function redirectToModule($newModule, $newAction = '', $parameters = array())
    {
        $newUrl = 'index.php' . Url::getCurrentQueryStringWithParametersModified(
                array('module' => $newModule, 'action' => $newAction)
                + $parameters
            );
        Url::redirectToUrl($newUrl);
    }

    /*
     * User input validation
     */

    /**
     * Returns `true` if supplied the email address is a valid.
     *
     * @param string $emailAddress
     * @return bool
     * @api
     */
    static public function isValidEmailString($emailAddress)
    {
        return (preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9_.-]+\.[a-zA-Z]{2,7}$/D', $emailAddress) > 0);
    }

    /**
     * Returns `true` if the login is valid.
     * 
     * _Warning: does not check if the login already exists! You must use UsersManager_API->userExists as well._
     *
     * @param string $userLogin
     * @throws Exception
     * @return bool
     */
    static public function checkValidLoginString($userLogin)
    {
        if (!SettingsPiwik::isUserCredentialsSanityCheckEnabled()
            && !empty($userLogin)
        ) {
            return;
        }
        $loginMinimumLength = 3;
        $loginMaximumLength = 100;
        $l = strlen($userLogin);
        if (!($l >= $loginMinimumLength
            && $l <= $loginMaximumLength
            && (preg_match('/^[A-Za-z0-9_.@+-]*$/D', $userLogin) > 0))
        ) {
            throw new Exception(Piwik::translate('UsersManager_ExceptionInvalidLoginFormat', array($loginMinimumLength, $loginMaximumLength)));
        }
    }

    /**
     * Utility function that checks if an object type is in a set of types.
     *
     * @param mixed $o
     * @param array $types List of class names that $o is expected to be one of.
     * @throws Exception if $o is not an instance of the types contained in $types.
     */
    static public function checkObjectTypeIs($o, $types)
    {
        foreach ($types as $type) {
            if ($o instanceof $type) {
                return;
            }
        }

        $oType = is_object($o) ? get_class($o) : gettype($o);
        throw new Exception("Invalid variable type '$oType', expected one of following: " . implode(', ', $types));
    }

    /**
     * Returns true if an array is an associative array, false if otherwise.
     *
     * This method determines if an array is associative by checking that the
     * first element's key is 0, and that each successive element's key is
     * one greater than the last.
     *
     * @param array $array
     * @return bool
     */
    static public function isAssociativeArray($array)
    {
        reset($array);
        if (!is_numeric(key($array))
            || key($array) != 0
        ) // first key must be 0
        {
            return true;
        }

        // check that each key is == next key - 1 w/o actually indexing the array
        while (true) {
            $current = key($array);

            next($array);
            $next = key($array);

            if ($next === null) {
                break;
            } else if ($current + 1 != $next) {
                return true;
            }
        }

        return false;
    }


    /**
     * Returns the class name of an object without its namespace.
     *
     * @param mixed|string $object
     * @return string
     */
    public static function getUnnamespacedClassName($object)
    {
        $className = is_string($object) ? $object : get_class($object);
        $parts = explode('\\', $className);
        return end($parts);
    }


    /**
     * Post an event to Piwik's event dispatcher which will execute the event's observers.
     *
     * @param string $eventName The event name.
     * @param array $params The parameter array to forward to observer callbacks.
     * @param bool $pending If true, plugins that are loaded after this event is fired will
     *                      have their observers for this event executed.
     * @param array|null $plugins The list of plugins to execute observers for. If null, all
     *                            plugin observers will be executed.
     * @api
     */
    public static function postEvent($eventName, $params = array(), $pending = false, $plugins = null)
    {
        EventDispatcher::getInstance()->postEvent($eventName, $params, $pending, $plugins);
    }

    /**
     * Register an observer to an event.
     * 
     * **_Note: Observers should normally be defined in plugin objects. It is unlikely that you will
     * need to use this function._**
     *
     * @param string $eventName The event name.
     * @param callable|array $function The observer.
     * @api
     */
    public static function addAction($eventName, $function)
    {
        EventDispatcher::getInstance()->addObserver($eventName, $function);
    }

    /**
     * Posts an event if we are currently running tests. Whether we are running tests is
     * determined by looking for the PIWIK_TEST_MODE constant.
     */
    public static function postTestEvent($eventName, $params = array(), $pending = false, $plugins = null)
    {
        if (defined('PIWIK_TEST_MODE')) {
            Piwik::postEvent($eventName, $params, $pending, $plugins);
        }
    }

    /**
     * Returns an internationalized string using a translation token. If a translation
     * cannot be found for the toke, the token is returned.
     *
     * @param string $translationId Translation ID, eg, `'General_Date'`.
     * @param array|string|int $args `sprintf` arguments to be applied to the internationalized
     *                               string.
     * @return string The translated string or `$translationId`.
     * @api
     */
    public static function translate($translationId, $args = array())
    {
        if (!is_array($args)) {
            $args = array($args);
        }

        if (strpos($translationId, "_") !== false) {
            list($plugin, $key) = explode("_", $translationId, 2);
            if (isset($GLOBALS['Piwik_translations'][$plugin]) && isset($GLOBALS['Piwik_translations'][$plugin][$key])) {
                $translationId = $GLOBALS['Piwik_translations'][$plugin][$key];
            }
        }
        if (count($args) == 0) {
            return $translationId;
        }
        return vsprintf($translationId, $args);
    }

    protected static function getJavascriptTagOptions($idSite, $mergeSubdomains, $mergeAliasUrls)
    {
        try {
            $websiteUrls = APISitesManager::getInstance()->getSiteUrlsFromId($idSite);
        } catch (\Exception $e) {
            return '';
        }
        // We need to parse_url to isolate hosts
        $websiteHosts = array();
        foreach ($websiteUrls as $site_url) {
            $referrerParsed = parse_url($site_url);
            $websiteHosts[] = $referrerParsed['host'];
        }
        $options = '';
        if ($mergeSubdomains && !empty($websiteHosts)) {
            $options .= '  _paq.push(["setCookieDomain", "*.' . $websiteHosts[0] . '"]);' . PHP_EOL;
        }
        if ($mergeAliasUrls && !empty($websiteHosts)) {
            $urls = '["*.' . implode('","*.', $websiteHosts) . '"]';
            $options .= '  _paq.push(["setDomains", ' . $urls . ']);' . PHP_EOL;
        }
        return $options;
    }
}
