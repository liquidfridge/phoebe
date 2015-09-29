/**
 * Initialization
 *
 * @author Hein Bekker <hein@netbek.co.za>
 * @copyright (c) 2015 Hein Bekker
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GPLv2
 */

(function (window, undefined) {

  var intv = setInterval(function () {
    if (window.phoebe && window.phoebe.isDependenciesLoaded()) {
      clearInterval(intv);

      window.phoebe.init();
    }
  }, 20);

})(window);
