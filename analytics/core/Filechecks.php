<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik;

class Filechecks
{
    /**
     * Check if this installation can be auto-updated.
     * For performance, we look for clues rather than an exhaustive test.
     *
     * @return bool
     */
    public static function canAutoUpdate()
    {
        if (!is_writable(PIWIK_INCLUDE_PATH . '/') ||
            !is_writable(PIWIK_DOCUMENT_ROOT . '/index.php') ||
            !is_writable(PIWIK_INCLUDE_PATH . '/core') ||
            !is_writable(PIWIK_USER_PATH . '/config/global.ini.php')
        ) {
            return false;
        }
        return true;
    }

    /**
     * Checks if directories are writable and create them if they do not exist.
     *
     * @param array $directoriesToCheck array of directories to check - if not given default Piwik directories that needs write permission are checked
     * @return array  directory name => true|false (is writable)
     */
    public static function checkDirectoriesWritable($directoriesToCheck)
    {
        $resultCheck = array();
        foreach ($directoriesToCheck as $directoryToCheck) {

            if (!preg_match('/^' . preg_quote(PIWIK_USER_PATH, '/') . '/', $directoryToCheck)) {
                $directoryToCheck = PIWIK_USER_PATH . $directoryToCheck;
            }

            if(strpos($directoryToCheck, '/tmp/') !== false) {
                $directoryToCheck = SettingsPiwik::rewriteTmpPathWithInstanceId($directoryToCheck);
            }

            Filesystem::mkdir($directoryToCheck);

            $directory = Filesystem::realpath($directoryToCheck);
            $resultCheck[$directory] = false;
            if ($directory !== false // realpath() returns FALSE on failure
                && is_writable($directoryToCheck)
            ) {
                $resultCheck[$directory] = true;
            }
        }
        return $resultCheck;
    }

    /**
     * Checks that the directories Piwik needs write access are actually writable
     * Displays a nice error page if permissions are missing on some directories
     *
     * @param array $directoriesToCheck Array of directory names to check
     */
    public static function dieIfDirectoriesNotWritable($directoriesToCheck = null)
    {
        $resultCheck = self::checkDirectoriesWritable($directoriesToCheck);
        if (array_search(false, $resultCheck) === false) {
            return;
        }

        $directoryList = '';
        foreach ($resultCheck as $dir => $bool) {
            $realpath = Filesystem::realpath($dir);
            if (!empty($realpath) && $bool === false) {
                $directoryList .= self::getMakeWritableCommand($realpath);
            }
        }

        // Also give the chown since the chmod is only 755
        if (!SettingsServer::isWindows()) {
            $realpath = Filesystem::realpath(PIWIK_INCLUDE_PATH . '/');
            $directoryList = "<code>chown -R www-data:www-data " . $realpath . "</code><br />" . $directoryList;
        }

        if(function_exists('shell_exec')) {
            $currentUser = trim(shell_exec('whoami'));
            if(!empty($currentUser)) {
                $optionalUserInfo = " (running as user '" . $currentUser . "')";
            }
        }

        $directoryMessage = "<p><b>Piwik couldn't write to some directories $optionalUserInfo</b>.</p>";
        $directoryMessage .= "<p>Try to Execute the following commands on your server, to allow Write access on these directories"
            . ":</p>"
            . "<blockquote>$directoryList</blockquote>"
            . "<p>If this doesn't work, you can try to create the directories with your FTP software, and set the CHMOD to 0755 (or 0777 if 0755 is not enough). To do so with your FTP software, right click on the directories then click permissions.</p>"
            . "<p>After applying the modifications, you can <a href='index.php'>refresh the page</a>.</p>"
            . "<p>If you need more help, try <a href='?module=Proxy&action=redirect&url=http://piwik.org'>Piwik.org</a>.</p>";

        Piwik_ExitWithMessage($directoryMessage, false, true);
    }

    /**
     * Get file integrity information (in PIWIK_INCLUDE_PATH).
     *
     * @return array(bool, string, ...) Return code (true/false), followed by zero or more error messages
     */
    public static function getFileIntegrityInformation()
    {
        $messages = array();
        $messages[] = true;

        $manifest = PIWIK_INCLUDE_PATH . '/config/manifest.inc.php';


        if (file_exists($manifest)) {
            require_once $manifest;
        }

        if (!class_exists('Piwik\\Manifest')) {
            $messages[] = Piwik::translate('General_WarningFileIntegrityNoManifest')
                        . ' '
                        . Piwik::translate('General_WarningFileIntegrityNoManifestDeployingFromGit');

            return $messages;
        }

        $files = \Piwik\Manifest::$files;

        $hasMd5file = function_exists('md5_file');
        $hasMd5 = function_exists('md5');
        foreach ($files as $path => $props) {
            $file = PIWIK_INCLUDE_PATH . '/' . $path;

            if (!file_exists($file) || !is_readable($file)) {
                $messages[] = Piwik::translate('General_ExceptionMissingFile', $file);
            } else if (filesize($file) != $props[0]) {
                if (!$hasMd5 || in_array(substr($path, -4), array('.gif', '.ico', '.jpg', '.png', '.swf'))) {
                    // files that contain binary data (e.g., images) must match the file size
                    $messages[] = Piwik::translate('General_ExceptionFilesizeMismatch', array($file, $props[0], filesize($file)));
                } else {
                    // convert end-of-line characters and re-test text files
                    $content = @file_get_contents($file);
                    $content = str_replace("\r\n", "\n", $content);
                    if ((strlen($content) != $props[0])
                        || (@md5($content) !== $props[1])
                    ) {
                        $messages[] = Piwik::translate('General_ExceptionFilesizeMismatch', array($file, $props[0], filesize($file)));
                    }
                }
            } else if ($hasMd5file && (@md5_file($file) !== $props[1])) {
                $messages[] = Piwik::translate('General_ExceptionFileIntegrity', $file);
            }
        }

        if (count($messages) > 1) {
            $messages[0] = false;
        }

        if (!$hasMd5file) {
            $messages[] = Piwik::translate('General_WarningFileIntegrityNoMd5file');
        }

        return $messages;
    }

    /**
     * Returns the help message when the auto update can't run because of missing permissions
     *
     * @return string
     */
    public static function getAutoUpdateMakeWritableMessage()
    {
        $realpath = Filesystem::realpath(PIWIK_INCLUDE_PATH . '/');
        $message = '';
        $message .= "<code>chown -R www-data:www-data " . $realpath . "</code><br />";
        $message .= "<code>chmod -R 0755 " . $realpath . "</code><br />";
        $message .= 'After you execute these commands (or change permissions via your FTP software), refresh the page and you should be able to use the "Automatic Update" feature.';
        return $message;
    }

    /**
     * Returns friendly error message explaining how to fix permissions
     *
     * @param string $path to the directory missing permissions
     * @return string  Error message
     */
    public static function getErrorMessageMissingPermissions($path)
    {
        $message = "Please check that the web server has enough permission to write to these files/directories:<br />";

        if (SettingsServer::isWindows()) {
            $message .= "On Windows, check that the folder is not read only and is writable.\n
						You can try to execute:<br />";
        } else {
            $message .= "For example, on a Linux server if your Apache httpd user
						is www-data, you can try to execute:<br />\n"
                . "<code>chown -R www-data:www-data " . $path . "</code><br />";
        }

        $message .= self::getMakeWritableCommand($path);

        return $message;
    }

    /**
     * Returns the help text displayed to suggest which command to run to give writable access to a file or directory
     *
     * @param string $realpath
     * @return string
     */
    private static function getMakeWritableCommand($realpath)
    {
        if (SettingsServer::isWindows()) {
            return "<code>cacls $realpath /t /g " . get_current_user() . ":f</code><br />\n";
        }
        return "<code>chmod -R 0755 $realpath</code><br />";
    }
}
