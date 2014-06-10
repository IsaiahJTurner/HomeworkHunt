<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik;

use Piwik\Plugin\Dependency;
use Piwik\Plugin\MetadataLoader;

/**
 * @see Piwik\Plugin\MetadataLoader
 */
require_once PIWIK_INCLUDE_PATH . '/core/Plugin/MetadataLoader.php';

/**
 * Base class of all Plugin Descriptor classes.
 * 
 * Any plugin that wants to add event observers to one of Piwik's {@hook # hooks},
 * or has special installation/uninstallation logic must implement this class.
 * Plugins that can specify everything they need to in the _plugin.json_ files,
 * such as themes, don't need to implement this class.
 *
 * Class implementations should be named after the plugin they are a part of
 * (eg, `class UserCountry extends Plugin`).
 * 
 * ### Plugin Metadata
 * 
 * In addition to providing a place for plugins to install/uninstall themselves
 * and add event observers, this class is also responsible for loading metadata
 * found in the plugin.json file.
 * 
 * The plugin.json file must exist in the root directory of a plugin. It can
 * contain the following information:
 * 
 * - **description**: An internationalized string description of what the plugin
 *                    does.
 * - **homepage**: The URL to the plugin's website.
 * - **authors**: A list of author arrays with keys for 'name', 'email' and 'homepage'
 * - **license**: The license the code uses (eg, GPL, MIT, etc.).
 * - **license_homepage**: URL to website describing the license used.
 * - **version**: The plugin version (eg, 1.0.1).
 * - **theme**: `true` or `false`. If `true`, the plugin will be treated as a theme.
 * 
 * ### Examples
 * 
 * **How to extend**
 * 
 *     use Piwik\Common;
 *     use Piwik\Plugin;
 *     use Piwik\Db;
 * 
 *     class MyPlugin extends Plugin
 *     {
 *         public function getListHooksRegistered()
 *         {
 *             return array(
 *                 'API.getReportMetadata' => 'getReportMetadata',
 *                 'Another.event'         => array(
 *                                                'function' => 'myOtherPluginFunction',
 *                                                'after'    => true // executes this callback after others
 *                                            )
 *             );
 *         }
 * 
 *         public function install()
 *         {
 *             Db::exec("CREATE TABLE " . Common::prefixTable('mytable') . "...");
 *         }
 * 
 *         public function uninstall()
 *         {
 *             Db::exec("DROP TABLE IF EXISTS " . Common::prefixTable('mytable'));
 *         }
 *         
 *         public function getReportMetadata(&$metadata)
 *         {
 *             // ...
 *         }
 *
 *         public function myOtherPluginFunction()
 *         {
 *             // ...
 *         }
 *     }
 * 
 * @api
 */
class Plugin
{
    /**
     * Name of this plugin.
     *
     * @var string
     */
    protected $pluginName;

    /**
     * Holds plugin metadata.
     *
     * @var array
     */
    private $pluginInformation;

    /**
     * Constructor.
     *
     * @param string|bool $pluginName A plugin name to force. If not supplied, it is set
     *                                to the last part of the class name.
     * @throws \Exception If plugin metadata is defined in both the getInformation() method
     *                    and the **plugin.json** file.
     */
    public function __construct($pluginName = false)
    {
        if (empty($pluginName)) {
            $pluginName = explode('\\', get_class($this));
            $pluginName = end($pluginName);
        }
        $this->pluginName = $pluginName;

        $metadataLoader = new MetadataLoader($pluginName);
        $this->pluginInformation = $metadataLoader->load();

        if ($this->hasDefinedPluginInformationInPluginClass() && $metadataLoader->hasPluginJson()) {
            throw new \Exception('Plugin ' . $pluginName . ' has defined the method getInformation() and as well as having a plugin.json file. Please delete the getInformation() method from the plugin class. Alternatively, you may delete the plugin directory from plugins/' . $pluginName);
        }
    }

    private function hasDefinedPluginInformationInPluginClass()
    {
        $myClassName = get_class();
        $pluginClassName = get_class($this);

        if ($pluginClassName == $myClassName) {
            // plugin has not defined its own class
            return false;
        }

        $foo = new \ReflectionMethod(get_class($this), 'getInformation');
        $declaringClass = $foo->getDeclaringClass()->getName();

        return $declaringClass != $myClassName;
    }

    /**
     * Returns plugin information, including:
     * 
     * - 'description' => string        // 1-2 sentence description of the plugin
     * - 'author' => string             // plugin author
     * - 'author_homepage' => string    // author homepage URL (or email "mailto:youremail@example.org")
     * - 'homepage' => string           // plugin homepage URL
     * - 'license' => string            // plugin license
     * - 'license_homepage' => string   // license homepage URL
     * - 'version' => string            // plugin version number; examples and 3rd party plugins must not use Version::VERSION; 3rd party plugins must increment the version number with each plugin release
     * - 'theme' => bool                // Whether this plugin is a theme (a theme is a plugin, but a plugin is not necessarily a theme)
     *
     * @return array
     * @deprecated
     */
    public function getInformation()
    {
        return $this->pluginInformation;
    }

    /**
     * Returns a list of hooks with associated event observers.
     * 
     * Derived classes should use this method to associate callbacks with events.
     *
     * @return array eg,
     * 
     *                   array(
     *                       'API.getReportMetadata' => 'myPluginFunction',
     *                       'Another.event'         => array(
     *                                                      'function' => 'myOtherPluginFunction',
     *                                                      'after'    => true // execute after callbacks w/o ordering
     *                                                  )
     *                       'Yet.Another.event'     => array(
     *                                                      'function' => 'myOtherPluginFunction',
     *                                                      'before'   => true // execute before callbacks w/o ordering
     *                                                  )
     *                   )
     */
    public function getListHooksRegistered()
    {
        return array();
    }

    /**
     * This method is executed after a plugin is loaded and translations are registered.
     * Useful for initialization code that uses translated strings.
     */
    public function postLoad()
    {
        return;
    }

    /**
     * Installs the plugin. Derived classes should implement this class if the plugin
     * needs to:
     * 
     * - create tables
     * - update existing tables
     * - etc.
     * 
     * @throws Exception if installation of fails for some reason.
     */
    public function install()
    {
        return;
    }

    /**
     * Uninstalls the plugins. Derived classes should implement this method if the changes
     * made in {@link install()} need to be undone during uninstallation.
     * 
     * In most cases, if you have an {@link install()} method, you should provide
     * an {@link uninstall()} method.
     * 
     * @throws \Exception if uninstallation of fails for some reason.
     */
    public function uninstall()
    {
        return;
    }

    /**
     * Executed every time the plugin is enabled.
     */
    public function activate()
    {
        return;
    }

    /**
     * Executed every time the plugin is disabled.
     */
    public function deactivate()
    {
        return;
    }

    /**
     * Returns the plugin version number.
     *
     * @return string
     */
    final public function getVersion()
    {
        $info = $this->getInformation();
        return $info['version'];
    }

    /**
     * Returns `true` if this plugin is a theme, `false` if otherwise.
     *
     * @return bool
     */
    public function isTheme()
    {
        $info = $this->getInformation();
        return !empty($info['theme']) && (bool)$info['theme'];
    }

    /**
     * Returns the plugin's base class name without the namespace,
     * e.g., `"UserCountry"` when the plugin class is `"Piwik\Plugins\UserCountry\UserCountry"`.
     *
     * @return string
     */
    final public function getPluginName()
    {
        return $this->pluginName;
    }

    /**
     * Detect whether there are any missing dependencies.
     *
     * @param null $piwikVersion Defaults to the current Piwik version
     * @return bool
     */
    public function hasMissingDependencies($piwikVersion = null)
    {
        $requirements = $this->getMissingDependencies($piwikVersion);

        return !empty($requirements);
    }

    public function getMissingDependencies($piwikVersion = null)
    {
        if (empty($this->pluginInformation['require'])) {
            return array();
        }

        $dependency = new Dependency();

        if (!is_null($piwikVersion)) {
            $dependency->setPiwikVersion($piwikVersion);
        }

        return $dependency->getMissingDependencies($this->pluginInformation['require']);
    }

    /**
     * Extracts the plugin name from a backtrace array. Returns `false` if we can't find one.
     *
     * @param array $backtrace The result of {@link debug_backtrace()} or
     *                         [Exception::getTrace()](http://www.php.net/manual/en/exception.gettrace.php).
     * @return string|false
     */
    public static function getPluginNameFromBacktrace($backtrace)
    {
        foreach ($backtrace as $tracepoint) {
            // try and discern the plugin name
            if (isset($tracepoint['class'])
                && preg_match("/Piwik\\\\Plugins\\\\([a-zA-Z_0-9]+)\\\\/", $tracepoint['class'], $matches)
            ) {
                return $matches[1];
            }
        }
        return false;
    }
}
