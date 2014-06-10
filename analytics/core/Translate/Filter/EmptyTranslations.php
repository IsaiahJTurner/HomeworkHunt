<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Translate\Filter;


/**
 */
class EmptyTranslations extends FilterAbstract
{
    /**
     * Removes all empty translations
     *
     * @param array $translations
     *
     * @return array   filtered translations
     */
    public function filter($translations)
    {
        $translationsBefore = $translations;

        foreach ($translations AS $plugin => &$pluginTranslations) {

            $pluginTranslations = array_filter($pluginTranslations, function ($value) {
                return !empty($value) && '' != trim($value);
            });

            $diff = array_diff($translationsBefore[$plugin], $pluginTranslations);
            if (!empty($diff)) {
                $this->filteredData[$plugin] = $diff;
            }
        }

        // remove plugins without translations
        $translations = array_filter($translations, function ($value) {
            return !empty($value) && count($value);
        });

        return $translations;
    }
}
