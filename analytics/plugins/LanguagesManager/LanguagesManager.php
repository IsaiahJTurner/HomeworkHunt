<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 *
 */
namespace Piwik\Plugins\LanguagesManager;

use Exception;
use Piwik\Common;
use Piwik\Config;
use Piwik\Cookie;
use Piwik\Db;
use Piwik\DbHelper;
use Piwik\Menu\MenuTop;
use Piwik\Piwik;
use Piwik\SettingsPiwik;
use Piwik\Translate;
use Piwik\View;

/**
 *
 */
class LanguagesManager extends \Piwik\Plugin
{
    /**
     * @see Piwik\Plugin::getListHooksRegistered
     */
    public function getListHooksRegistered()
    {
        return array(
            'AssetManager.getStylesheetFiles' => 'getStylesheetFiles',
            'AssetManager.getJavaScriptFiles' => 'getJsFiles',
            'Menu.Top.addItems'               => 'showLanguagesSelector',
            'User.getLanguage'                => 'getLanguageToLoad',
            'UsersManager.deleteUser'         => 'deleteUserLanguage',
            'Template.topBar'                 => 'addLanguagesManagerToOtherTopBar',
            'Template.jsGlobalVariables'      => 'jsGlobalVariables'
        );
    }

    public function getStylesheetFiles(&$stylesheets)
    {
        $stylesheets[] = "plugins/Zeitgeist/stylesheets/base.less";
    }

    public function getJsFiles(&$jsFiles)
    {
        $jsFiles[] = "plugins/LanguagesManager/javascripts/languageSelector.js";
    }

    public function showLanguagesSelector()
    {
        if (Piwik::isUserIsAnonymous() || !SettingsPiwik::isPiwikInstalled()) {
            MenuTop::addEntry('LanguageSelector', $this->getLanguagesSelector(), true, $order = 30, true);
        }
    }

    /**
     * Adds the languages drop-down list to topbars other than the main one rendered
     * in CoreHome/templates/top_bar.twig. The 'other' topbars are on the Installation
     * and CoreUpdater screens.
     */
    public function addLanguagesManagerToOtherTopBar(&$str)
    {
        // piwik object & scripts aren't loaded in 'other' topbars
        $str .= "<script type='text/javascript'>if (!window.piwik) window.piwik={};</script>";
        $str .= "<script type='text/javascript' src='plugins/LanguagesManager/javascripts/languageSelector.js'></script>";
        $str .= $this->getLanguagesSelector();
    }

    /**
     * Adds the languages drop-down list to topbars other than the main one rendered
     * in CoreHome/templates/top_bar.twig. The 'other' topbars are on the Installation
     * and CoreUpdater screens.
     */
    public function jsGlobalVariables(&$str)
    {
        // piwik object & scripts aren't loaded in 'other' topbars
        $str .= "piwik.languageName = '" .  self::getLanguageNameForCurrentUser() . "';";
    }

    /**
     * Renders and returns the language selector HTML.
     *
     * @return string
     */
    private function getLanguagesSelector()
    {
        $view = new View("@LanguagesManager/getLanguagesSelector");
        $view->languages = API::getInstance()->getAvailableLanguageNames();
        $view->currentLanguageCode = self::getLanguageCodeForCurrentUser();
        return $view->render();
    }

    function getLanguageToLoad(&$language)
    {
        if (empty($language)) {
            $language = self::getLanguageCodeForCurrentUser();
        }
        if (!API::getInstance()->isLanguageAvailable($language)) {
            $language = Translate::getLanguageDefault();
        }
    }

    public function deleteUserLanguage($userLogin)
    {
        Db::query('DELETE FROM ' . Common::prefixTable('user_language') . ' WHERE login = ?', $userLogin);
    }

    /**
     * @throws Exception if non-recoverable error
     */
    public function install()
    {
        $userLanguage = "login VARCHAR( 100 ) NOT NULL ,
					     language VARCHAR( 10 ) NOT NULL ,
					     PRIMARY KEY ( login )";
        DbHelper::createTable('user_language', $userLanguage);
    }

    /**
     * @throws Exception if non-recoverable error
     */
    public function uninstall()
    {
        Db::dropTables(Common::prefixTable('user_language'));
    }

    /**
     * @return string Two letters language code, eg. "fr"
     */
    static public function getLanguageCodeForCurrentUser()
    {
        $languageCode = self::getLanguageFromPreferences();
        if (!API::getInstance()->isLanguageAvailable($languageCode)) {
            $languageCode = Common::extractLanguageCodeFromBrowserLanguage(Common::getBrowserLanguage(), API::getInstance()->getAvailableLanguages());
        }
        if (!API::getInstance()->isLanguageAvailable($languageCode)) {
            $languageCode = Translate::getLanguageDefault();
        }
        return $languageCode;
    }

    /**
     * @return string Full english language string, eg. "French"
     */
    static public function getLanguageNameForCurrentUser()
    {
        $languageCode = self::getLanguageCodeForCurrentUser();
        $languages = API::getInstance()->getAvailableLanguageNames();
        foreach ($languages as $language) {
            if ($language['code'] === $languageCode) {
                return $language['name'];
            }
        }
        return false;
    }

    /**
     * @return string|false if language preference could not be loaded
     */
    static protected function getLanguageFromPreferences()
    {
        if (($language = self::getLanguageForSession()) != null) {
            return $language;
        }

        try {
            $currentUser = Piwik::getCurrentUserLogin();
            return API::getInstance()->getLanguageForUser($currentUser);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Returns the language for the session
     *
     * @return string|null
     */
    static public function getLanguageForSession()
    {
        $cookieName = Config::getInstance()->General['language_cookie_name'];
        $cookie = new Cookie($cookieName);
        if ($cookie->isCookieFound()) {
            return $cookie->get('language');
        }
        return null;
    }

    /**
     * Set the language for the session
     *
     * @param string $languageCode ISO language code
     * @return bool
     */
    static public function setLanguageForSession($languageCode)
    {
        if (!API::getInstance()->isLanguageAvailable($languageCode)) {
            return false;
        }

        $cookieName = Config::getInstance()->General['language_cookie_name'];
        $cookie = new Cookie($cookieName, 0);
        $cookie->set('language', $languageCode);
        $cookie->save();
        return true;
    }
}
