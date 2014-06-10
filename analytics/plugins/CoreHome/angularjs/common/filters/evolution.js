/*!
 * Piwik - Web Analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

angular.module('piwikApp.filter').filter('evolution', function() {

    function calculateEvolution(currentValue, pastValue)
    {
        pastValue    = parseInt(pastValue, 10);
        currentValue = parseInt(currentValue, 10) - pastValue;

        if (currentValue === 0 || isNaN(currentValue)) {
            evolution = 0;
        } else if (pastValue === 0 || isNaN(pastValue)) {
            evolution = 100;
        } else {
            evolution = (currentValue / pastValue) * 100;
        }

        return evolution;
    }

    function formatEvolution(evolution)
    {
        evolution = Math.round(evolution);

        if (evolution > 0) {
            evolution = '+' + evolution;
        }

        evolution += '%';

        return evolution;
    }

    return function(currentValue, pastValue) {
        var evolution = calculateEvolution(currentValue, pastValue);

        return formatEvolution(evolution);
    };
});
