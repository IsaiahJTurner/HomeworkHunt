<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Plugins\LanguagesManager\Commands;

use Piwik\Plugin\ConsoleCommand;
use Piwik\Plugins\LanguagesManager\API;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class LanguageCodes extends ConsoleCommand
{
    protected function configure()
    {
        $this->setName('translations:languagecodes')
             ->setDescription('Shows available language codes');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $languages = API::getInstance()->getAvailableLanguageNames();

        $languageCodes = array();
        foreach ($languages AS $languageInfo) {
            $languageCodes[] = $languageInfo['code'];
        }

        sort($languageCodes);

        $output->writeln("Currently available languages:");
        $output->writeln(implode("\n", $languageCodes));
    }
}
