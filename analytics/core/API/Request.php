<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\API;

use Exception;
use Piwik\Access;
use Piwik\Common;
use Piwik\DataTable;
use Piwik\Piwik;
use Piwik\PluginDeactivatedException;
use Piwik\SettingsServer;
use Piwik\Url;
use Piwik\UrlHelper;

/**
 * Dispatches API requests to the appropriate API method.
 * 
 * The Request class is used throughout Piwik to call API methods. The difference
 * between using Request and calling API methods directly is that Request
 * will do more after calling the API including: applying generic filters, applying queued filters,
 * and handling the **flat** and **label** query parameters.
 * 
 * Additionally, the Request class will **forward current query parameters** to the request
 * which is more convenient than calling {@link Piwik\Common::getRequestVar()} many times over.
 * 
 * In most cases, using a Request object to query the API is the correct approach.
 *
 * ### Post-processing
 * 
 * The return value of API methods undergo some extra processing before being returned by Request.
 * To learn more about what happens to API results, read [this](/guides/piwiks-web-api#extra-report-processing).
 *
 * ### Output Formats
 * 
 * The value returned by Request will be serialized to a certain format before being returned.
 * To see the list of supported output formats, read [this](/guides/piwiks-web-api#output-formats).
 * 
 * ### Examples
 * 
 * **Basic Usage**
 * 
 *     $request = new Request('method=UserSettings.getWideScreen&idSite=1&date=yesterday&period=week'
 *                          . '&format=xml&filter_limit=5&filter_offset=0')
 *     $result = $request->process();
 *     echo $result;
 * 
 * **Getting a unrendered DataTable**
 * 
 *     // use the convenience method 'processRequest'
 *     $dataTable = Request::processRequest('UserSettings.getWideScreen', array(
 *         'idSite' => 1,
 *         'date' => 'yesterday',
 *         'period' => 'week',
 *         'filter_limit' => 5,
 *         'filter_offset' => 0
 * 
 *         'format' => 'original', // this is the important bit
 *     ));
 *     echo "This DataTable has " . $dataTable->getRowsCount() . " rows.";
 *
 * @see http://piwik.org/docs/analytics-api
 * @api
 */
class Request
{
    protected $request = null;

    /**
     * Converts the supplied request string into an array of query paramater name/value
     * mappings. The current query parameters (everything in `$_GET` and `$_POST`) are
     * forwarded to request array before it is returned.
     *
     * @param string|array $request The base request string or array, eg,
     *                              `'module=UserSettings&action=getWidescreen'`.
     * @return array
     */
    static public function getRequestArrayFromString($request)
    {
        $defaultRequest = $_GET + $_POST;

        $requestRaw = self::getRequestParametersGET();
        if (!empty($requestRaw['segment'])) {
            $defaultRequest['segment'] = $requestRaw['segment'];
        }

        $requestArray = $defaultRequest;

        if (!is_null($request)) {
            if (is_array($request)) {
                $url = array();
                foreach ($request as $key => $value) {
                    $url[] = $key . "=" . $value;
                }
                $request = implode("&", $url);
            }

            $request = trim($request);
            $request = str_replace(array("\n", "\t"), '', $request);

            $requestParsed = UrlHelper::getArrayFromQueryString($request);
            $requestArray = $requestParsed + $defaultRequest;
        }

        foreach ($requestArray as &$element) {
            if (!is_array($element)) {
                $element = trim($element);
            }
        }
        return $requestArray;
    }

    /**
     * Constructor.
     *
     * @param string|array $request Query string that defines the API call (must at least contain a **method** parameter),
     *                              eg, `'method=UserSettings.getWideScreen&idSite=1&date=yesterday&period=week&format=xml'`
     *                              If a request is not provided, then we use the values in the `$_GET` and `$_POST`
     *                              superglobals.
     */
    public function __construct($request = null)
    {
        $this->request = self::getRequestArrayFromString($request);
        $this->sanitizeRequest();
    }

    /**
     * For backward compatibility: Piwik API still works if module=Referers,
     * we rewrite to correct renamed plugin: Referrers
     *
     * @param $module
     * @return string
     * @ignore
     */
    public static function renameModule($module)
    {
        $moduleToRedirect = array(
            'Referers'   => 'Referrers',
            'PDFReports' => 'ScheduledReports',
        );
        if (isset($moduleToRedirect[$module])) {
            return $moduleToRedirect[$module];
        }
        return $module;
    }

    /**
     * Make sure that the request contains no logical errors
     */
    private function sanitizeRequest()
    {
        // The label filter does not work with expanded=1 because the data table IDs have a different meaning
        // depending on whether the table has been loaded yet. expanded=1 causes all tables to be loaded, which
        // is why the label filter can't descend when a recursive label has been requested.
        // To fix this, we remove the expanded parameter if a label parameter is set.
        if (isset($this->request['label']) && !empty($this->request['label'])
            && isset($this->request['expanded']) && $this->request['expanded']
        ) {
            unset($this->request['expanded']);
        }
    }

    /**
     * Dispatches the API request to the appropriate API method and returns the result
     * after post-processing.
     * 
     * Post-processing includes:
     * 
     * - flattening if **flat** is 0
     * - running generic filters unless **disable_generic_filters** is set to 1
     * - URL decoding label column values
     * - running queued filters unless **disable_queued_filters** is set to 1
     * - removing columns based on the values of the **hideColumns** and **showColumns** query parameters
     * - filtering rows if the **label** query parameter is set
     * - converting the result to the appropriate format (ie, XML, JSON, etc.)
     * 
     * If `'original'` is supplied for the output format, the result is returned as a PHP
     * object.
     * 
     * @throws PluginDeactivatedException if the module plugin is not activated.
     * @throws Exception if the requested API method cannot be called, if required parameters for the
     *                   API method are missing or if the API method throws an exception and the **format**
     *                   query parameter is **original**.
     * @return DataTable|Map|string The data resulting from the API call.
     */
    public function process()
    {
        // read the format requested for the output data
        $outputFormat = strtolower(Common::getRequestVar('format', 'xml', 'string', $this->request));

        // create the response
        $response = new ResponseBuilder($outputFormat, $this->request);

        try {
            // read parameters
            $moduleMethod = Common::getRequestVar('method', null, 'string', $this->request);

            list($module, $method) = $this->extractModuleAndMethod($moduleMethod);

            $module = $this->renameModule($module);

            if (!\Piwik\Plugin\Manager::getInstance()->isPluginActivated($module)) {
                throw new PluginDeactivatedException($module);
            }
            $apiClassName = $this->getClassNameAPI($module);

            self::reloadAuthUsingTokenAuth($this->request);

            // call the method
            $returnedValue = Proxy::getInstance()->call($apiClassName, $method, $this->request);

            $toReturn = $response->getResponse($returnedValue, $module, $method);
        } catch (Exception $e) {
            $toReturn = $response->getResponseException($e);
        }
        return $toReturn;
    }

    /**
     * Returns the name of a plugin's API class by plugin name.
     * 
     * @param string $plugin The plugin name, eg, `'Referrers'`.
     * @return string The fully qualified API class name, eg, `'\Piwik\Plugins\Referrers\API'`.
     */
    static public function getClassNameAPI($plugin)
    {
        return sprintf('\Piwik\Plugins\%s\API', $plugin);
    }

    /**
     * If the token_auth is found in the $request parameter,
     * the current session will be authenticated using this token_auth.
     * It will overwrite the previous Auth object.
     *
     * @param array $request If null, uses the default request ($_GET)
     * @return void
     * @ignore
     */
    static public function reloadAuthUsingTokenAuth($request = null)
    {
        // if a token_auth is specified in the API request, we load the right permissions
        $token_auth = Common::getRequestVar('token_auth', '', 'string', $request);
        if ($token_auth) {

            /**
             * Triggered when authenticating an API request, but only if the **token_auth**
             * query parameter is found in the request.
             * 
             * Plugins that provide authentication capabilities should subscribe to this event
             * and make sure the global authentication object (the object returned by `Registry::get('auth')`)
             * is setup to use `$token_auth` when its `authenticate()` method is executed.
             * 
             * @param string $token_auth The value of the **token_auth** query parameter.
             */
            Piwik::postEvent('API.Request.authenticate', array($token_auth));
            Access::getInstance()->reloadAccess();
            SettingsServer::raiseMemoryLimitIfNecessary();
        }
    }

    /**
     * Returns array($class, $method) from the given string $class.$method
     *
     * @param string $parameter
     * @throws Exception
     * @return array
     */
    private function extractModuleAndMethod($parameter)
    {
        $a = explode('.', $parameter);
        if (count($a) != 2) {
            throw new Exception("The method name is invalid. Expected 'module.methodName'");
        }
        return $a;
    }

    /**
     * Helper method that processes an API request in one line using the variables in `$_GET`
     * and `$_POST`.
     *
     * @param string $method The API method to call, ie, `'Actions.getPageTitles'`.
     * @param array $paramOverride The parameter name-value pairs to use instead of what's
     *                             in `$_GET` & `$_POST`.
     * @return mixed The result of the API request. See {@link process()}.
     */
    public static function processRequest($method, $paramOverride = array())
    {
        $params = array();
        $params['format'] = 'original';
        $params['module'] = 'API';
        $params['method'] = $method;
        $params = $paramOverride + $params;

        // process request
        $request = new Request($params);
        return $request->process();
    }

    /**
     * Returns the original request parameters in the current query string as an array mapping
     * query parameter names with values. The result of this function will not be affected
     * by any modifications to `$_GET` and will not include parameters in `$_POST`.
     * 
     * @return array
     */
    public static function getRequestParametersGET()
    {
        if (empty($_SERVER['QUERY_STRING'])) {
            return array();
        }
        $GET = UrlHelper::getArrayFromQueryString($_SERVER['QUERY_STRING']);
        return $GET;
    }

    /**
     * Returns the URL for the current requested report w/o any filter parameters.
     *
     * @param string $module The API module.
     * @param string $action The API action.
     * @param array $queryParams Query parameter overrides.
     * @return string
     */
    public static function getBaseReportUrl($module, $action, $queryParams = array())
    {
        $params = array_merge($queryParams, array('module' => $module, 'action' => $action));
        return Request::getCurrentUrlWithoutGenericFilters($params);
    }

    /**
     * Returns the current URL without generic filter query parameters.
     *
     * @param array $params Query parameter values to override in the new URL.
     * @return string
     */
    public static function getCurrentUrlWithoutGenericFilters($params)
    {
        // unset all filter query params so the related report will show up in its default state,
        // unless the filter param was in $queryParams
        $genericFiltersInfo = DataTableGenericFilter::getGenericFiltersInformation();
        foreach ($genericFiltersInfo as $filter) {
            foreach ($filter[1] as $queryParamName => $queryParamInfo) {
                if (!isset($params[$queryParamName])) {
                    $params[$queryParamName] = null;
                }
            }
        }

        return Url::getCurrentQueryStringWithParametersModified($params);
    }

    /**
     * Returns whether the DataTable result will have to be expanded for the
     * current request before rendering.
     *
     * @return bool
     * @ignore
     */
    public static function shouldLoadExpanded()
    {
        // if filter_column_recursive & filter_pattern_recursive are supplied, and flat isn't supplied
        // we have to load all the child subtables.
        return Common::getRequestVar('filter_column_recursive', false) !== false
            && Common::getRequestVar('filter_pattern_recursive', false) !== false
            && !self::shouldLoadFlatten();
    }

    /**
     * @return bool
     */
    public static function shouldLoadFlatten()
    {
        return Common::getRequestVar('flat', false) == 1;
    }

    /**
     * Returns the segment query parameter from the original request, without modifications.
     * 
     * @return array|bool
     */
    static public function getRawSegmentFromRequest()
    {
        // we need the URL encoded segment parameter, we fetch it from _SERVER['QUERY_STRING'] instead of default URL decoded _GET
        $segmentRaw = false;
        $segment = Common::getRequestVar('segment', '', 'string');
        if (!empty($segment)) {
            $request = Request::getRequestParametersGET();
            if (!empty($request['segment'])) {
                $segmentRaw = $request['segment'];
            }
        }
        return $segmentRaw;
    }
}
