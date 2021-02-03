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
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/src/js/dokan-pro-admin.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/js/dokan-pro-admin.js":
/*!******************************************!*\
  !*** ./assets/src/js/dokan-pro-admin.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval(";\n\n(function ($) {\n  var Dokan_Admin = {\n    init: function init() {\n      $('.dokan-modules').on('change', 'input.dokan-toggle-module', this.toggleModule);\n    },\n    toggleModule: function toggleModule(e) {\n      var self = $(this);\n\n      if (self.is(':checked')) {\n        // Enabled\n        var mesg = dokan_admin.activating,\n            data = {\n          action: 'dokan-toggle-module',\n          type: 'activate',\n          module: self.closest('li').data('module'),\n          nonce: dokan_admin.nonce\n        };\n      } else {\n        // Disbaled\n        var mesg = dokan_admin.deactivating,\n            data = {\n          action: 'dokan-toggle-module',\n          type: 'deactivate',\n          module: self.closest('li').data('module'),\n          nonce: dokan_admin.nonce\n        };\n      }\n\n      self.closest('.plugin-card').block({\n        message: mesg,\n        overlayCSS: {\n          background: '#222',\n          opacity: 0.7\n        },\n        css: {\n          fontSize: '19px',\n          color: '#fff',\n          border: 'none',\n          backgroundColor: 'none',\n          cursor: 'wait'\n        }\n      });\n      wp.ajax.send('dokan-toggle-module', {\n        data: data,\n        success: function success(response) {},\n        error: function error(_error) {\n          if (_error.error === 'plugin-exists') {\n            wp.ajax.send('dokan-toggle-module', {\n              data: data\n            });\n          }\n        },\n        complete: function complete(resp) {\n          $('.blockMsg').text(resp.data);\n          setTimeout(function () {\n            self.closest('.plugin-card').unblock();\n          }, 1000);\n        }\n      });\n    }\n  };\n  $(document).ready(function () {\n    Dokan_Admin.init();\n  });\n})(jQuery);\n\n//# sourceURL=webpack:///./assets/src/js/dokan-pro-admin.js?");

/***/ })

/******/ });