<?php
/**
 * Piwik - Open source web analytics
 * Piwik Proxy Hide URL
 *
 * @link http://piwik.org/faq/how-to/#faq_132
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

// -----
// Important: read the instructions in README.md or at:
// https://github.com/piwik/piwik/tree/master/misc/proxy-hide-piwik-url#piwik-proxy-hide-url
// -----

// Edit the line below, and replace http://your-piwik-domain.example.org/piwik/
// with your Piwik URL ending with a slash.
// This URL will never be revealed to visitors or search engines.
$PIWIK_URL = 'http://your-piwik-domain.example.org/piwik/';

// Edit the line below, and replace xyz by the token_auth for the user "UserTrackingAPI"
// which you created when you followed instructions above.
$TOKEN_AUTH = 'xyz';

// Maximum time, in seconds, to wait for the Piwik server to return the 1*1 GIF
$timeout = 5;


// DO NOT MODIFY BELOW
// ---------------------------
// 1) PIWIK.JS PROXY: No _GET parameter, we serve the JS file
if (empty($_GET)) {
    $modifiedSince = false;
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
        $modifiedSince = $_SERVER['HTTP_IF_MODIFIED_SINCE'];
        // strip any trailing data appended to header
        if (false !== ($semicolon = strpos($modifiedSince, ';'))) {
            $modifiedSince = strtotime(substr($modifiedSince, 0, $semicolon));
        }
    }
    // Re-download the piwik.js once a day maximum
    $lastModified = time() - 86400;

    // set HTTP response headers
    header('Vary: Accept-Encoding');

    // Returns 304 if not modified since
    if (!empty($modifiedSince) && $modifiedSince < $lastModified) {
        header(sprintf("%s 304 Not Modified", $_SERVER['SERVER_PROTOCOL']));
    } else {
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        @header('Content-Type: application/javascript; charset=UTF-8');
        if ($piwikJs = file_get_contents($PIWIK_URL . 'piwik.js')) {
            echo $piwikJs;
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . '505 Internal server error');
        }
    }
    exit;
}

@ini_set('magic_quotes_runtime', 0);

// 2) PIWIK.PHP PROXY: GET parameters found, this is a tracking request, we redirect it to Piwik
$url = sprintf("%spiwik.php?cip=%s&token_auth=%s&", $PIWIK_URL, @$_SERVER['REMOTE_ADDR'], $TOKEN_AUTH);
foreach ($_GET as $key => $value) {
    $url .= $key . '=' . urlencode($value) . '&';
}
header("Content-Type: image/gif");
$stream_options = array('http' => array(
    'user_agent' => @$_SERVER['HTTP_USER_AGENT'],
    'header'     => sprintf("Accept-Language: %s\r\n", @str_replace(array("\n", "\t", "\r"), "", $_SERVER['HTTP_ACCEPT_LANGUAGE'])),
    'timeout'    => $timeout
));
$ctx = stream_context_create($stream_options);
echo file_get_contents($url, 0, $ctx);
