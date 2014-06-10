<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik;

use Piwik\Plugin\Manager as PluginManager;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Console extends Application
{
    public function __construct()
    {
        parent::__construct();

        $option = new InputOption('piwik-domain',
            null,
            InputOption::VALUE_OPTIONAL,
            'Piwik URL (protocol and domain) eg. "http://piwik.example.org"'
        );

        $this->getDefinition()->addOption($option);
    }

    /**
     * @deprecated
     */
    public function init()
    {
        // TODO: remove
    }

    public function doRun(InputInterface $input, OutputInterface $output)
    {
        $this->initPiwikHost($input);
        $this->initConfig($output);
        try {
            self::initPlugins();
        } catch(\Exception $e) {
            // Piwik not installed yet, no config file?
        }

        Translate::reloadLanguage('en');

        $commands = $this->getAvailableCommands();

        foreach ($commands as $command) {

            if (!class_exists($command)) {
                Log::warning(sprintf('Cannot add command %s, class does not exist', $command));
            } elseif (!is_subclass_of($command, 'Piwik\Plugin\ConsoleCommand')) {
                Log::warning(sprintf('Cannot add command %s, class does not extend Piwik\Plugin\ConsoleCommand', $command));
            } else {
                $this->add(new $command);
            }
        }

        return parent::doRun($input, $output);
    }

    /**
     * Returns a list of available command classnames.
     *
     * @return string[]
     */
    private function getAvailableCommands()
    {
        $commands = $this->getDefaultPiwikCommands();

        $pluginNames = PluginManager::getInstance()->getLoadedPluginsName();
        foreach ($pluginNames as $pluginName) {
            $commands = array_merge($commands, $this->findCommandsInPlugin($pluginName));
        }

        /**
         * Triggered to filter / restrict console commands. Plugins that want to restrict commands
         * should subscribe to this event and remove commands from the existing list.
         *
         * **Example**
         *
         *     public function filterConsoleCommands(&$commands)
         *     {
         *         $key = array_search('Piwik\Plugins\MyPlugin\Commands\MyCommand', $commands);
         *         if (false !== $key) {
         *             unset($commands[$key]);
         *         }
         *     }
         *
         * @param array &$commands An array containing a list of command class names.
         */
        Piwik::postEvent('Console.filterCommands', array(&$commands));

        $commands = array_values(array_unique($commands));

        return $commands;
    }

    private function findCommandsInPlugin($pluginName)
    {
        $commands = array();

        $files = Filesystem::globr(PIWIK_INCLUDE_PATH . '/plugins/' . $pluginName .'/Commands', '*.php');

        foreach ($files as $file) {
            $klassName = sprintf('Piwik\\Plugins\\%s\\Commands\\%s', $pluginName, basename($file, '.php'));

            if (!class_exists($klassName) || !is_subclass_of($klassName, 'Piwik\\Plugin\\ConsoleCommand')) {
                continue;
            }

            $klass = new \ReflectionClass($klassName);

            if ($klass->isAbstract()) {
                continue;
            }

            $commands[] = $klassName;
        }

        return $commands;
    }

    protected function initPiwikHost(InputInterface $input)
    {
        $piwikHostname = $input->getParameterOption('--piwik-domain');
        $piwikHostname = UrlHelper::getHostFromUrl($piwikHostname);
        Url::setHost($piwikHostname);
    }

    protected function initConfig(OutputInterface $output)
    {
        $config = Config::getInstance();
        try {
            $config->checkLocalConfigFound();
            return $config;
        } catch (\Exception $e) {
            $output->writeln($e->getMessage() . "\n");
        }
    }

    public static function initPlugins()
    {
        Plugin\Manager::getInstance()->loadActivatedPlugins();
    }

    private function getDefaultPiwikCommands()
    {
        $commands = array(
            'Piwik\CliMulti\RequestCommand'
        );
        
        if (class_exists('Piwik\Plugins\EnterpriseAdmin\EnterpriseAdmin')) {
            $extra = new \Piwik\Plugins\EnterpriseAdmin\EnterpriseAdmin();
            $extra->addConsoleCommands($commands);
        }
        return $commands;
    }
}
