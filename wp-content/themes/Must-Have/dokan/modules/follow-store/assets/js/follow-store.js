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
/******/ 	return __webpack_require__(__webpack_require__.s = "./modules/follow-store/assets/src/js/follow-store.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./modules/follow-store/assets/src/js/follow-store.js":
/*!************************************************************!*\
  !*** ./modules/follow-store/assets/src/js/follow-store.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _less_follow_store_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../less/follow-store.less */ \"./modules/follow-store/assets/src/less/follow-store.less\");\n/* harmony import */ var _less_follow_store_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_less_follow_store_less__WEBPACK_IMPORTED_MODULE_0__);\n\n\n(function ($) {\n  function follow_store(button, vendor_id, _wpnonce) {\n    button.toggleClass('dokan-follow-store-button-working');\n    $.ajax({\n      url: dokan.ajaxurl,\n      method: 'post',\n      dataType: 'json',\n      data: {\n        action: 'dokan_follow_store_toggle_status',\n        _nonce: _wpnonce || dokanFollowStore._nonce,\n        vendor_id: vendor_id\n      }\n    }).fail(function (e) {\n      var response = e.responseJSON.data.pop();\n      alert(response.message);\n    }).always(function () {\n      button.toggleClass('dokan-follow-store-button-working');\n    }).done(function (response) {\n      if (response.data && response.data.status) {\n        if (response.data.status === 'following') {\n          button.attr('data-status', 'following').children('.dokan-follow-store-button-label-current').html(dokanFollowStore.button_labels.following);\n        } else {\n          button.attr('data-status', '').children('.dokan-follow-store-button-label-current').html(dokanFollowStore.button_labels.follow);\n        }\n      }\n\n      $('body').trigger('dokan:follow_store:changed_follow_status', {\n        vendor_id: vendor_id,\n        button: button,\n        status: response.data.status\n      });\n    });\n  }\n\n  function get_current_status(vendor_id) {\n    $.ajax({\n      url: dokan.ajaxurl,\n      method: 'get',\n      dataType: 'json',\n      data: {\n        action: 'dokan_follow_store_get_current_status',\n        vendor_id: vendor_id\n      }\n    }).done(function (response) {\n      $('body').trigger('dokan:follow_store:current_status', {\n        vendor_id: vendor_id,\n        is_following: response.data.is_following,\n        nonce: response.data.nonce\n      });\n    });\n  }\n\n  $('.dokan-follow-store-button', 'body').on('click', function (e) {\n    e.preventDefault();\n    var button = $(this),\n        vendor_id = parseInt(button.data('vendor-id')),\n        is_logged_in = parseInt(button.data('is-logged-in'));\n\n    if (!is_logged_in) {\n      $('body').on('dokan:login_form_popup:fetching_form dokan:login_form_popup:fetched_form', function () {\n        button.toggleClass('dokan-follow-store-button-working');\n      });\n      $('body').on('dokan:login_form_popup:logged_in', function () {\n        get_current_status(vendor_id);\n      });\n      $('body').on('dokan:follow_store:current_status', function (e, data) {\n        if (!data.is_following) {\n          follow_store(button, vendor_id, data.nonce);\n        } else {\n          window.location.href = window.location.href;\n        }\n      });\n      $('body').on('dokan:follow_store:changed_follow_status', function () {\n        window.location.href = window.location.href;\n      });\n      $('body').trigger('dokan:login_form_popup:show');\n      return;\n    }\n\n    follow_store(button, vendor_id);\n  });\n})(jQuery);\n\n//# sourceURL=webpack:///./modules/follow-store/assets/src/js/follow-store.js?");

/***/ }),

/***/ "./modules/follow-store/assets/src/less/follow-store.less":
/*!****************************************************************!*\
  !*** ./modules/follow-store/assets/src/less/follow-store.less ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./modules/follow-store/assets/src/less/follow-store.less?");

/***/ })

/******/ });