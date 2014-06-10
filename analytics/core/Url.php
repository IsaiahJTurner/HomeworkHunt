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

/**
 * Provides URL related helper methods.
 * 
 * This class provides simple methods that can be used to parse and modify
 * the current URL. It is most useful when plugins need to redirect the current
 * request to a URL and when they need to link to other parts of Piwik in
 * HTML.
 * 
 * ### Examples
 * 
 * **Redirect to a different controller action**
 * 
 *     public function myControllerAction()
 *     {
 *         $url = Url::getCurrentQueryStringWithParametersModified(array(
 *             'module' => 'UserSettings',
 *             'action' => 'index'
 *         ));
 *         Url::redirectToUrl($url);
 *     }
 * 
 * **Link to a different controller action in a template**
 * 
 *     public function myControllerAction()
 *     {
 *         $url = Url::getCurrentQueryStringWithParametersModified(array(
 *             'module' => 'UserCountryMap',
 *             'action' => 'realtimeMap',
 *             'changeVisitAlpha' => 0,
 *             'removeOldVisits' => 0
 *         ));
 *         $view = new View("@MyPlugin/myPopup");
 *         $view->realtimeMapUrl = $url;
 *         return $view->render();
 *     }
 * 
 */
class Url
{
    /**
     * List of hosts that are never checked for validity.
     */
    private static $alwaysTrustedHosts = array('localhost', '127.0.0.1', '::1', '[::1]');

    /**
     * Returns the current URL.
     *
     * @return string eg, `"http://example.org/dir1/dir2/index.php?param1=value1&param2=value2"`
     * @api
     */
    static public function getCurrentUrl()
    {
        return self::getCurrentScheme() . '://'
        . self::getCurrentHost()
        . self::getCurrentScriptName()
        . self::getCurrentQueryString();
    }

    /**
     * Returns the current URL without the query string.
     * 
     * @param bool $checkTrustedHost Whether to do trusted host check. Should ALWAYS be true,
     *                               except in {@link Piwik\Plugin\Controller}.
     * @return string eg, `"http://example.org/dir1/dir2/index.php"` if the current URL is
     *                `"http://example.org/dir1/dir2/index.php?param1=value1&param2=value2"`.
     * @api
     */
    static public function getCurrentUrlWithoutQueryString($checkTrustedHost = true)
    {
        return self::getCurrentScheme() . '://'
        . self::getCurrentHost($default = 'unknown', $checkTrustedHost)
        . self::getCurrentScriptName();
    }

    /**
     * Returns the current URL without the query string and without the name of the file
     * being executed.
     *
     * @return string eg, `"http://example.org/dir1/dir2/"` if the current URL is
     *                `"http://example.org/dir1/dir2/index.php?param1=value1&param2=value2"`.
     * @api
     */
    static public function getCurrentUrlWithoutFileName()
    {
        return self::getCurrentScheme() . '://'
        . self::getCurrentHost()
        . self::getCurrentScriptPath();
    }

    /**
     * Returns the path to the script being executed. The script file name is not included.
     *
     * @return string eg, `"/dir1/dir2/"` if the current URL is
     *                `"http://example.org/dir1/dir2/index.php?param1=value1&param2=value2"`
     * @api
     */
    static public function getCurrentScriptPath()
    {
        $queryString = self::getCurrentScriptName();

        //add a fake letter case /test/test2/ returns /test which is not expected
        $urlDir = dirname($queryString . 'x');
        $urlDir = str_replace('\\', '/', $urlDir);
        // if we are in a subpath we add a trailing slash
        if (strlen($urlDir) > 1) {
            $urlDir .= '/';
        }
        return $urlDir;
    }

    /**
     * Returns the path to the script being executed. Includes the script file name.
     *
     * @return string eg, `"/dir1/dir2/index.php"` if the current URL is
     *                `"http://example.org/dir1/dir2/index.php?param1=value1&param2=value2"`
     * @api
     */
    static public function getCurrentScriptName()
    {
        $url = '';

        if (!empty($_SERVER['REQUEST_URI'])) {
            $url = $_SERVER['REQUEST_URI'];

            // strip http://host (Apache+Rails anomaly)
            if (preg_match('~^https?://[^/]+($|/.*)~D', $url, $matches)) {
                $url = $matches[1];
            }

            // strip parameters
            if (($pos = strpos($url, "?")) !== false) {
                $url = substr($url, 0, $pos);
            }

            // strip path_info
            if (isset($_SERVER['PATH_INFO'])) {
                $url = substr($url, 0, -strlen($_SERVER['PATH_INFO']));
            }
        }

        /**
         * SCRIPT_NAME is our fallback, though it may not be set correctly
         *
         * @see http://php.net/manual/en/reserved.variables.php
         */
        if (empty($url)) {
            if (isset($_SERVER['SCRIPT_NAME'])) {
                $url = $_SERVER['SCRIPT_NAME'];
            } elseif (isset($_SERVER['SCRIPT_FILENAME'])) {
                $url = $_SERVER['SCRIPT_FILENAME'];
            } elseif (isset($_SERVER['argv'])) {
                $url = $_SERVER['argv'][0];
            }
        }

        if (!isset($url[0]) || $url[0] !== '/') {
            $url = '/' . $url;
        }
        return $url;
    }

    /**
     * Returns the current URL's protocol.
     *
     * @return string `'https'` or `'http'`
     * @api
     */
    static public function getCurrentScheme()
    {
        try {
            $assume_secure_protocol = @Config::getInstance()->General['assume_secure_protocol'];
        } catch (Exception $e) {
            $assume_secure_protocol = false;
        }
        if ($assume_secure_protocol
            || (isset($_SERVER['HTTPS'])
                && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] === true))
            || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
        ) {
            return 'https';
        }
        return 'http';
    }

    /**
     * Validates the **Host** HTTP header (untrusted user input). Used to prevent Host header
     * attacks.
     *
     * @param string|bool $host Contents of Host: header from the HTTP request. If `false`, gets the
     *                          value from the request.
     * @return bool `true` if valid; `false` otherwise.
     */
    static public function isValidHost($host = false)
    {
        // only do trusted host check if it's enabled
        if (isset(Config::getInstance()->General['enable_trusted_host_check'])
            && Config::getInstance()->General['enable_trusted_host_check'] == 0
        ) {
            return true;
        }

        if ($host === false) {
            $host = @$_SERVER['HTTP_HOST'];
            if (empty($host)) // if no current host, assume valid
            {
                return true;
            }
        }
        // if host is in hardcoded whitelist, assume it's valid
        if (in_array($host, self::$alwaysTrustedHosts)) {
            return true;
        }

        $trustedHosts = self::getTrustedHosts();

        // if no trusted hosts, just assume it's valid
        if (empty($trustedHosts)) {
            self::saveTrustedHostnameInConfig($host);
            return true;
        }

        // Only punctuation we allow is '[', ']', ':', '.' and '-'
        $hostLength = strlen($host);
        if ($hostLength !== strcspn($host, '`~!@#$%^&*()_+={}\\|;"\'<>,?/ ')) {
            return false;
        }

        foreach ($trustedHosts as &$trustedHost) {
            $trustedHost = preg_quote($trustedHost);
        }
        $untrustedHost = Common::mb_strtolower($host);
        $untrustedHost = rtrim($untrustedHost, '.');

        $hostRegex = Common::mb_strtolower('/(^|.)' . implode('|', $trustedHosts) . '$/');

        $result = preg_match($hostRegex, $untrustedHost);
        return 0 !== $result;
    }

    /**
     * Records one host, or an array of hosts in the config file,
     * if user is Super User
     *
     * @static
     * @param $host string|array
     * @return bool
     */
    public static function saveTrustedHostnameInConfig($host)
    {
        if (Piwik::hasUserSuperUserAccess()
            && file_exists(Config::getLocalConfigPath())
        ) {
            $general = Config::getInstance()->General;
            if (!is_array($host)) {
                $host = array($host);
            }
            $host = array_filter($host);
            if (empty($host)) {
                return false;
            }
            $general['trusted_hosts'] = $host;
            Config::getInstance()->General = $general;
            Config::getInstance()->forceSave();
            return true;
        }
        return false;
    }

    /**
     * Returns the current host.
     *
     * @param bool $checkIfTrusted Whether to do trusted host check. Should ALWAYS be true,
     *                             except in Controller.
     * @return string|bool eg, `"demo.piwik.org"` or false if no host found.
     */
    static public function getHost($checkIfTrusted = true)
    {
        // HTTP/1.1 request
        if (isset($_SERVER['HTTP_HOST'])
            && strlen($host = $_SERVER['HTTP_HOST'])
            && (!$checkIfTrusted
                || self::isValidHost($host))
        ) {
            return $host;
        }

        // HTTP/1.0 request doesn't include Host: header
        if (isset($_SERVER['SERVER_ADDR'])) {
            return $_SERVER['SERVER_ADDR'];
        }

        return false;
    }

    /**
     * Sets the host. Useful for CLI scripts, eg. core:archive command
     * 
     * @param $host string
     */
    static public function setHost($host)
    {
        $_SERVER['HTTP_HOST'] = $host;
    }

    /**
     * Returns the current host.
     *
     * @param string $default Default value to return if host unknown
     * @param bool $checkTrustedHost Whether to do trusted host check. Should ALWAYS be true,
     *                               except in Controller.
     * @return string eg, `"example.org"` if the current URL is
     *                `"http://example.org/dir1/dir2/index.php?param1=value1&param2=value2"`
     * @api
     */
    static public function getCurrentHost($default = 'unknown', $checkTrustedHost = true)
    {
        $hostHeaders = array();

        $config = Config::getInstance()->General;
        if(isset($config['proxy_host_headers'])) {
            $hostHeaders = $config['proxy_host_headers'];
        }

        if (!is_array($hostHeaders)) {
            $hostHeaders = array();
        }

        $host = self::getHost($checkTrustedHost);
        $default = Common::sanitizeInputValue($host ? $host : $default);

        return IP::getNonProxyIpFromHeader($default, $hostHeaders);
    }

    /**
     * Returns the query string of the current URL.
     *
     * @return string eg, `"?param1=value1&param2=value2"` if the current URL is
     *                `"http://example.org/dir1/dir2/index.php?param1=value1&param2=value2"`
     * @api
     */
    static public function getCurrentQueryString()
    {
        $url = '';
        if (isset($_SERVER['QUERY_STRING'])
            && !empty($_SERVER['QUERY_STRING'])
        ) {
            $url .= "?" . $_SERVER['QUERY_STRING'];
        }
        return $url;
    }

    /**
     * Returns an array mapping query paramater names with query parameter values for
     * the current URL.
     *
     * @return array If current URL is `"http://example.org/dir1/dir2/index.php?param1=value1&param2=value2"`
     *               this will return:
     *               
     *                   array(
     *                       'param1' => string 'value1',
     *                       'param2' => string 'value2'
     *                   )
     * @api
     */
    static public function getArrayFromCurrentQueryString()
    {
        $queryString = self::getCurrentQueryString();
        $urlValues = UrlHelper::getArrayFromQueryString($queryString);
        return $urlValues;
    }

    /**
     * Modifies the current query string with the supplied parameters and returns
     * the result. Parameters in the current URL will be overwritten with values
     * in `$params` and parameters absent from the current URL but present in `$params`
     * will be added to the result.
     *
     * @param array $params set of parameters to modify/add in the current URL
     *                      eg, `array('param3' => 'value3')`
     * @return string eg, `"?param2=value2&param3=value3"`
     * @api
     */
    static function getCurrentQueryStringWithParametersModified($params)
    {
        $urlValues = self::getArrayFromCurrentQueryString();
        foreach ($params as $key => $value) {
            $urlValues[$key] = $value;
        }
        $query = self::getQueryStringFromParameters($urlValues);
        if (strlen($query) > 0) {
            return '?' . $query;
        }
        return '';
    }

    /**
     * Converts an array of parameters name => value mappings to a query
     * string.
     * 
     * @param array $parameters eg. `array('param1' => 10, 'param2' => array(1,2))`
     * @return string eg. `"param1=10&param2[]=1&param2[]=2"`
     * @api
     */
    static public function getQueryStringFromParameters($parameters)
    {
        $query = '';
        foreach ($parameters as $name => $value) {
            if (is_null($value) || $value === false) {
                continue;
            }
            if (is_array($value)) {
                foreach ($value as $theValue) {
                    $query .= $name . "[]=" . $theValue . "&";
                }
            } else {
                $query .= $name . "=" . $value . "&";
            }
        }
        $query = substr($query, 0, -1);
        return $query;
    }

    static public function getQueryStringFromUrl($url)
    {
        return parse_url($url, PHP_URL_QUERY);
    }

    /**
     * Redirects the user to the referrer. If no referrer exists, the user is redirected
     * to the current URL without query string.
     * 
     * @api
     */
    static public function redirectToReferrer()
    {
        $referrer = self::getReferrer();
        if ($referrer !== false) {
            self::redirectToUrl($referrer);
        }
        self::redirectToUrl(self::getCurrentUrlWithoutQueryString());
    }

    /**
     * Redirects the user to the specified URL.
     *
     * @param string $url
     * @api
     */
    static public function redirectToUrl($url)
    {
        // Close the session manually.
        // We should not have to call this because it was registered via register_shutdown_function,
        // but it is not always called fast enough
        Session::close();

        if (UrlHelper::isLookLikeUrl($url)
            || strpos($url, 'index.php') === 0
        ) {
            @header("Location: $url");
        } else {
            echo "Invalid URL to redirect to.";
        }

        if(Common::isPhpCliMode()) {
            die("If you were using a browser, Piwik would redirect you to this URL: $url \n\n");
        }
        exit;
    }

    /**
     * If the page is using HTTP, redirect to the same page over HTTPS
     */
    static public function redirectToHttps()
    {
        if(ProxyHttp::isHttps()) {
            return;
        }
        $url = self::getCurrentUrl();
        $url = str_replace("http://", "https://", $url);
        self::redirectToUrl($url);
    }

    /**
     * Returns the **HTTP_REFERER** `$_SERVER` variable, or `false` if not found.
     *
     * @return string|false
     * @api
     */
    static public function getReferrer()
    {
        if (!empty($_SERVER['HTTP_REFERER'])) {
            return $_SERVER['HTTP_REFERER'];
        }
        return false;
    }

    /**
     * Returns `true` if the URL points to something on the same host, `false` if otherwise.
     *
     * @param string $url
     * @return bool True if local; false otherwise.
     * @api
     */
    static public function isLocalUrl($url)
    {
        if (empty($url)) {
            return true;
        }

        // handle host name mangling
        $requestUri = isset($_SERVER['SCRIPT_URI']) ? $_SERVER['SCRIPT_URI'] : '';
        $parseRequest = @parse_url($requestUri);
        $hosts = array(self::getHost(), self::getCurrentHost());
        if (!empty($parseRequest['host'])) {
            $hosts[] = $parseRequest['host'];
        }

        // drop port numbers from hostnames and IP addresses
        $hosts = array_map(array('self', 'getHostSanitized'), $hosts);

        $disableHostCheck = Config::getInstance()->General['enable_trusted_host_check'] == 0;
        // compare scheme and host
        $parsedUrl = @parse_url($url);
        $host = IP::sanitizeIp(@$parsedUrl['host']);
        return !empty($host)
            && ($disableHostCheck || in_array($host, $hosts))
            && !empty($parsedUrl['scheme'])
            && in_array($parsedUrl['scheme'], array('http', 'https'));
    }

    public static function getTrustedHostsFromConfig()
    {
        $trustedHosts = @Config::getInstance()->General['trusted_hosts'];
        if (!is_array($trustedHosts)) {
            return array();
        }
        foreach ($trustedHosts as &$trustedHost) {
            // Case user wrote in the config, http://example.com/test instead of example.com
            if (UrlHelper::isLookLikeUrl($trustedHost)) {
                $trustedHost = parse_url($trustedHost, PHP_URL_HOST);
            }
        }
        return $trustedHosts;
    }

    public static function getTrustedHosts()
    {
        return self::getTrustedHostsFromConfig();
    }

    /**
     * Returns hostname, without port numbers
     *
     * @param $host
     * @return array
     */
    public static function getHostSanitized($host)
    {
        return IP::sanitizeIp($host);
    }
}
