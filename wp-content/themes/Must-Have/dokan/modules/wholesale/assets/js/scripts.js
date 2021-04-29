/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./modules/wholesale/assets/src/js/scripts.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./modules/wholesale/assets/src/js/scripts.js":
/*!****************************************************!*\
  !*** ./modules/wholesale/assets/src/js/scripts.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval(";\n\n(function ($) {\n  var DokanWholesaleFrontend = {\n    init: function init() {\n      $('body').on('click', 'a#dokan-become-wholesale-customer-btn', this.makeWholesaleCustomer);\n      $(\"input[name=variation_id]\").on('change', this.triggerVariationWholesale);\n      $('.dokan-wholesale-options').on('change', '.wholesaleCheckbox', this.toggleWholesaleWrapper);\n      $('body').on('change', '.dokan-variation-wholesale .wholesaleCheckbox', this.toggleWholesaleVariationWrapper);\n    },\n    triggerVariationWholesale: function triggerVariationWholesale(e) {\n      e.preventDefault();\n      var variations = $(\".variations_form\").data(\"product_variations\");\n      var variation_id = $(\"input[name=variation_id]\").val();\n\n      for (var x = 0; x < variations.length; x++) {\n        if (variations[x].variation_id == variation_id) {\n          var variation = variations[x];\n\n          if (DokanWholesale.check_permission) {\n            if (variation._enable_wholesale == 'yes') {\n              var wholesale_string = DokanWholesale.variation_wholesale_string.wholesale_price + ': ' + '<strong>' + DokanWholesale.currency_symbol + variation._wholesale_price + '</strong>' + ' (' + DokanWholesale.variation_wholesale_string.minimum_quantity + ': ' + '<strong>' + variation._wholesale_quantity + '</strong>' + ')';\n              $('.single_variation').append('<div class=\"woocommerce-variation-wholesale\">' + wholesale_string + '</div>');\n            } else {\n              $('.single_variation').find('.woocommerce-variation-wholesale').remove();\n            }\n          }\n        }\n      }\n    },\n    makeWholesaleCustomer: function makeWholesaleCustomer(e) {\n      e.preventDefault();\n      var self = $(this),\n          url = dokan.rest.root + dokan.rest.version + '/wholesale/register',\n          data = {\n        id: self.data('id')\n      };\n      jQuery('.dokan-wholesale-migration-wrapper').block({\n        message: null,\n        overlayCSS: {\n          background: '#fff url(' + dokan.ajax_loader + ') no-repeat center',\n          opacity: 0.6\n        }\n      });\n      $.post(url, data, function (resp) {\n        if (resp.wholesale_status == 'active') {\n          self.closest('li').html('<div class=\"woocommerce-message\" style=\"margin-bottom:0px\">' + dokan.wholesale.activeStatusMessage + '</div>');\n        } else {\n          self.closest('li').html('<div class=\"woocommerce-info\" style=\"margin-bottom:0px\">' + dokan.wholesale.deactiveStatusMessage + '</div>');\n        }\n\n        jQuery('.dokan-wholesale-migration-wrapper').unblock();\n      });\n    },\n    toggleWholesaleWrapper: function toggleWholesaleWrapper() {\n      if ($(this).is(':checked')) {\n        $('.show_if_wholesale').slideDown('fast');\n      } else {\n        $('.show_if_wholesale').slideUp('fast');\n      }\n    },\n    toggleWholesaleVariationWrapper: function toggleWholesaleVariationWrapper() {\n      if ($(this).is(':checked')) {\n        $(this).closest('.dokan-variation-wholesale').find('.show_if_variation_wholesale').slideDown('fast');\n      } else {\n        $(this).closest('.dokan-variation-wholesale').find('.show_if_variation_wholesale').slideUp('fast');\n      }\n    }\n  };\n  $(document).ready(function () {\n    DokanWholesaleFrontend.init();\n  });\n})(jQuery);\n\n//# sourceURL=webpack:///./modules/wholesale/assets/src/js/scripts.js?");

/***/ })

/******/ });