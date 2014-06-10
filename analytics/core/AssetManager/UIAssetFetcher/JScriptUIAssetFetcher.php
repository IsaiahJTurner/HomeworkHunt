<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\AssetManager\UIAssetFetcher;

use Piwik\AssetManager\UIAssetFetcher;
use Piwik\Piwik;
use string;

class JScriptUIAssetFetcher extends UIAssetFetcher
{

    protected function retrieveFileLocations()
    {

        if(!empty($this->plugins)) {

            /**
             * Triggered when gathering the list of all JavaScript files needed by Piwik
             * and its plugins.
             *
             * Plugins that have their own JavaScript should use this event to make those
             * files load in the browser.
             *
             * JavaScript files should be placed within a **javascripts** subdirectory in your
             * plugin's root directory.
             *
             * _Note: While you are developing your plugin you should enable the config setting
             * `[Debug] disable_merged_assets` so JavaScript files will be reloaded immediately
             * after every change._
             *
             * **Example**
             *
             *     public function getJsFiles(&$jsFiles)
             *     {
             *         $jsFiles[] = "plugins/MyPlugin/javascripts/myfile.js";
             *         $jsFiles[] = "plugins/MyPlugin/javascripts/anotherone.js";
             *     }
             *
             * @param string[] $jsFiles The JavaScript files to load.
             */
             Piwik::postEvent('AssetManager.getJavaScriptFiles', array(&$this->fileLocations), null, $this->plugins);
        }

        $this->addThemeFiles();
    }

    protected function addThemeFiles()
    {
        $theme = $this->getTheme();
        if(!$theme) {
            return;
        }
        if(in_array($theme->getThemeName(), $this->plugins)) {

            $jsInThemes = $this->getTheme()->getJavaScriptFiles();

            if(!empty($jsInThemes)) {

                foreach($jsInThemes as $jsFile) {

                    $this->fileLocations[] = $jsFile;
                }
            }
        }
    }

    protected function getPriorityOrder()
    {
        return array(
            'libs/jquery/jquery.js',
            'libs/jquery/jquery-ui.js',
            'libs/jquery/jquery.browser.js',
            'libs/',
            'plugins/CoreHome/javascripts/require.js',
            'plugins/Zeitgeist/javascripts/piwikHelper.js',
            'plugins/Zeitgeist/javascripts/',
            'plugins/CoreHome/javascripts/uiControl.js',
            'plugins/CoreHome/javascripts/broadcast.js',
            'plugins/CoreHome/javascripts/', // load CoreHome JS before other plugins
            'plugins/',
            'tests/',
        );
    }
}
