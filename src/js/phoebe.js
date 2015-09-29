/**
 * Phoebe
 *
 * @author Hein Bekker <hein@netbek.co.za>
 * @copyright (c) 2015 Hein Bekker
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GPLv2
 */

(function (window, undefined) {

  var namespace = 'Phoebe';

  /**
   *
   * @param {String} str
   */
  function log(str) {
    if (window.phoebeConfig.get().core.debug) {
      console.log(str);
    }
  }

  /**
   *
   * @returns {PhoebeConfig}
   */
  function PhoebeConfig() {
    this.flags = {
      set: false
    };

    this.config = {
      core: {
        debug: false // {Boolean}
      }
    };
  }

  /**
   *
   * @returns {Boolean}
   */
  PhoebeConfig.prototype.isDependenciesLoaded = function () {
    return !!(window.Drupal && window.Drupal.settings && window.Drupal.settings.phoebe);
  };

  /**
   *
   * @param {Boolean} value
   * @returns {Boolean}
   */
  PhoebeConfig.prototype.isSet = function (value) {
    if (arguments.length > 0) {
      this.flags.set = value;
    }
    else {
      return this.flags.set;
    }
  };

  /**
   *
   * @param {Object} values
   */
  PhoebeConfig.prototype.set = function (values) {
    lodash.merge(this.config, values);
  };

  /**
   *
   * @returns {Object}
   */
  PhoebeConfig.prototype.get = function () {
    return this.config;
  };

  /**
   *
   * @returns {Phoebe}
   */
  function Phoebe() {
    this.flags = {
      init: false // {Boolean}
    };
  }

  /**
   *
   * @returns {Boolean}
   */
  Phoebe.prototype.isDependenciesLoaded = function () {
    return !!(window.phoebeConfig.isSet() && window.Drupal && window.FastClick && window.jQuery && window.rhea && window.rhea.icon);
  };

  /**
   *
   * @param {Promise}
   */
  Phoebe.prototype.init = function () {
    log(namespace + '.init()');

    if (this.flags.init) {
      return this.initDeferred.promise;
    }

    this.initDeferred = Q.defer();
    this.flags.init = true;

    // Render icons.
    rhea.icon.apply();

    // Init FastClick.
    FastClick.attach(document.body);

    this.initDeferred.resolve(true);

    return this.initDeferred.promise;
  };

  window.phoebe = new Phoebe();
  window.phoebeConfig = new PhoebeConfig();

})(window);
