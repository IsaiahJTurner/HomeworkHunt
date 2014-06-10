<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\CoreHome;

use Exception;
use Piwik\API\Request;
use Piwik\Common;
use Piwik\Date;
use Piwik\FrontController;
use Piwik\Menu\MenuMain;
use Piwik\Notification\Manager as NotificationManager;
use Piwik\Piwik;
use Piwik\Plugins\CoreHome\DataTableRowAction\MultiRowEvolution;
use Piwik\Plugins\CoreHome\DataTableRowAction\RowEvolution;
use Piwik\Plugins\CorePluginsAdmin\MarketplaceApiClient;
use Piwik\Plugins\Dashboard\DashboardManagerControl;
use Piwik\Plugins\UsersManager\API;
use Piwik\Site;
use Piwik\UpdateCheck;
use Piwik\Url;
use Piwik\View;
use Piwik\ViewDataTable\Manager as ViewDataTableManager;

/**
 *
 */
class Controller extends \Piwik\Plugin\Controller
{
    function getDefaultAction()
    {
        return 'redirectToCoreHomeIndex';
    }

    function redirectToCoreHomeIndex()
    {
        $defaultReport = API::getInstance()->getUserPreference(Piwik::getCurrentUserLogin(), API::PREFERENCE_DEFAULT_REPORT);
        $module = 'CoreHome';
        $action = 'index';

        // User preference: default report to load is the All Websites dashboard
        if ($defaultReport == 'MultiSites'
            && \Piwik\Plugin\Manager::getInstance()->isPluginActivated('MultiSites')
        ) {
            $module = 'MultiSites';
        }
        if ($defaultReport == Piwik::getLoginPluginName()) {
            $module = Piwik::getLoginPluginName();
        }
        $idSite = Common::getRequestVar('idSite', false, 'int');
        parent::redirectToIndex($module, $action, $idSite);
    }

    public function showInContext()
    {
        $controllerName = Common::getRequestVar('moduleToLoad');
        $actionName = Common::getRequestVar('actionToLoad', 'index');
        if ($actionName == 'showInContext') {
            throw new Exception("Preventing infinite recursion...");
        }
        $view = $this->getDefaultIndexView();
        $view->content = FrontController::getInstance()->fetchDispatch($controllerName, $actionName);
        return $view->render();
    }

    public function markNotificationAsRead()
    {
        $notificationId = Common::getRequestVar('notificationId');
        NotificationManager::cancel($notificationId);
    }

    protected function getDefaultIndexView()
    {
        $view = new View('@CoreHome/getDefaultIndexView');
        $this->setGeneralVariablesView($view);
        $view->menu = MenuMain::getInstance()->getMenu();
        $view->dashboardSettingsControl = new DashboardManagerControl();
        $view->content = '';
        return $view;
    }

    protected function setDateTodayIfWebsiteCreatedToday()
    {
        $date = Common::getRequestVar('date', false);
        if ($date == 'today'
            || Common::getRequestVar('period', false) == 'range'
        ) {
            return;
        }
        $websiteId = Common::getRequestVar('idSite', false, 'int');
        if ($websiteId) {
            $website = new Site($websiteId);
            $datetimeCreationDate = $website->getCreationDate()->getDatetime();
            $creationDateLocalTimezone = Date::factory($datetimeCreationDate, $website->getTimezone())->toString('Y-m-d');
            $todayLocalTimezone = Date::factory('now', $website->getTimezone())->toString('Y-m-d');
            if ($creationDateLocalTimezone == $todayLocalTimezone) {
                Piwik::redirectToModule('CoreHome', 'index',
                    array('date'   => 'today',
                          'idSite' => $websiteId,
                          'period' => Common::getRequestVar('period'))
                );
            }
        }
    }

    public function index()
    {
        $this->setDateTodayIfWebsiteCreatedToday();
        $view = $this->getDefaultIndexView();
        return $view->render();
    }

    //  --------------------------------------------------------
    //  ROW EVOLUTION
    //  The following methods render the popover that shows the
    //  evolution of a singe or multiple rows in a data table
    //  --------------------------------------------------------

    /** Render the entire row evolution popover for a single row */
    public function getRowEvolutionPopover()
    {
        $rowEvolution = $this->makeRowEvolution($isMulti = false);
        $view = new View('@CoreHome/getRowEvolutionPopover');
        return $rowEvolution->renderPopover($this, $view);
    }

    /** Render the entire row evolution popover for multiple rows */
    public function getMultiRowEvolutionPopover()
    {
        $rowEvolution = $this->makeRowEvolution($isMulti = true);
        $view = new View('@CoreHome/getMultiRowEvolutionPopover');
        return $rowEvolution->renderPopover($this, $view);
    }

    /** Generic method to get an evolution graph or a sparkline for the row evolution popover */
    public function getRowEvolutionGraph($fetch = false, $rowEvolution = null)
    {
        if (empty($rowEvolution)) {
            $label = Common::getRequestVar('label', '', 'string');
            $isMultiRowEvolution = strpos($label, ',') !== false;

            $rowEvolution = $this->makeRowEvolution($isMultiRowEvolution, $graphType = 'graphEvolution');
            $rowEvolution->useAvailableMetrics();
        }

        $view = $rowEvolution->getRowEvolutionGraph();
        return $this->renderView($view);
    }

    /** Utility function. Creates a RowEvolution instance. */
    private function makeRowEvolution($isMultiRowEvolution, $graphType = null)
    {
        if ($isMultiRowEvolution) {
            return new MultiRowEvolution($this->idSite, $this->date, $graphType);
        } else {
            return new RowEvolution($this->idSite, $this->date, $graphType);
        }
    }

    /**
     * Forces a check for updates and re-renders the header message.
     *
     * This will check piwik.org at most once per 10s.
     */
    public function checkForUpdates()
    {
        Piwik::checkUserHasSomeAdminAccess();
        $this->checkTokenInUrl();

        // perform check (but only once every 10s)
        UpdateCheck::check($force = false, UpdateCheck::UI_CLICK_CHECK_INTERVAL);

        MarketplaceApiClient::clearAllCacheEntries();

        $view = new View('@CoreHome/checkForUpdates');
        $this->setGeneralVariablesView($view);
        return $view->render();
    }

    /**
     * Renders and echo's the in-app donate form w/ slider.
     */
    public function getDonateForm()
    {
        $view = new View('@CoreHome/getDonateForm');
        if (Common::getRequestVar('widget', false)
            && Piwik::hasUserSuperUserAccess()
        ) {
            $view->footerMessage = Piwik::translate('CoreHome_OnlyForSuperUserAccess');
        }
        return $view->render();
    }

    /**
     * Renders and echo's HTML that displays the Piwik promo video.
     */
    public function getPromoVideo()
    {
        $view = new View('@CoreHome/getPromoVideo');
        $view->shareText = Piwik::translate('CoreHome_SharePiwikShort');
        $view->shareTextLong = Piwik::translate('CoreHome_SharePiwikLong');
        $view->promoVideoUrl = 'http://www.youtube.com/watch?v=OslfF_EH81g';
        return $view->render();
    }

    /**
     * Redirects the user to a paypal so they can donate to Piwik.
     */
    public function redirectToPaypal()
    {
        $parameters = Request::getRequestArrayFromString($request = null);
        foreach ($parameters as $name => $param) {
            if ($name == 'idSite'
                || $name == 'module'
                || $name == 'action'
            ) {
                unset($parameters[$name]);
            }
        }

        $url = "https://www.paypal.com/cgi-bin/webscr?" . Url::getQueryStringFromParameters($parameters);

        Url::redirectToUrl($url);
        exit;
    }

    public function getSiteSelector()
    {
        return "<div piwik-siteselector class=\"sites_autocomplete\" switch-site-on-select=\"false\"></div>";
    }

    public function getPeriodSelector()
    {
        $view = new View("@CoreHome/_periodSelect");
        $this->setGeneralVariablesView($view);
        return $view->render();
    }

    public function saveViewDataTableParameters()
    {
        Piwik::checkUserIsNotAnonymous();
        $this->checkTokenInUrl();

        $reportId   = Common::getRequestVar('report_id', null, 'string');
        $parameters = (array) Common::getRequestVar('parameters', null, 'json');
        $login      = Piwik::getCurrentUserLogin();

        ViewDataTableManager::saveViewDataTableParameters($login, $reportId, $parameters);
    }
}
