/**
 * App config
 *
 * @author Hein Bekker <hein@netbek.co.za>
 * @copyright (c) 2015 Hein Bekker
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GPLv2
 */

(function (window, phoebeConfig, rhea, Drupal, undefined) {

  var intv = setInterval(function () {
    if (phoebeConfig.isDependenciesLoaded()) {
      clearInterval(intv);

      rhea.iconConfig.set({
        'colors': {
          'black': '#222',
          'light-sky': '#2FC5DA',
          'navy': '#0A2D50',
          'white': '#FFF'
        },
        'prefix': 'icon',
        'pngUrl': Drupal.settings.phoebe.url + '/img/icon/',
        'size': 256,
        'svg': 'use'
      });

      phoebeConfig.isSet(true);
    }
  }, 20);

})(window, window.phoebeConfig, window.rhea, window.Drupal);
