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
/******/ 	return __webpack_require__(__webpack_require__.s = "./modules/single-product-multiple-vendor/assets/src/js/dokan-spmv-products-admin.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./modules/single-product-multiple-vendor/assets/src/js/dokan-spmv-products-admin.js":
/*!*******************************************************************************************!*\
  !*** ./modules/single-product-multiple-vendor/assets/src/js/dokan-spmv-products-admin.js ***!
  \*******************************************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _less_dokan_spmv_products_admin_less__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../less/dokan-spmv-products-admin.less */ \"./modules/single-product-multiple-vendor/assets/src/less/dokan-spmv-products-admin.less\");\n/* harmony import */ var _less_dokan_spmv_products_admin_less__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_less_dokan_spmv_products_admin_less__WEBPACK_IMPORTED_MODULE_0__);\n\n\n(function ($) {\n  $('#dokan-spmv-products-admin-assign-vendors').selectWoo({\n    minimumInputLength: 3,\n    closeOnSelect: false,\n    ajax: {\n      url: dokan_admin.ajaxurl,\n      dataType: 'json',\n      delay: 250,\n      data: function data(params) {\n        return {\n          action: 'dokan_spmv_products_admin_search_vendors',\n          _wpnonce: dokan_admin.nonce,\n          s: params.term,\n          product_id: dokan_admin.dokanSPMVAdmin.product_id\n        };\n      },\n      processResults: function processResults(data, params) {\n        params.page = params.page || 1;\n        return {\n          results: data.data.vendors,\n          pagination: {\n            more: false // (params.page * 30) < data.total_count\n\n          }\n        };\n      },\n      cache: true\n    },\n    language: {\n      errorLoading: function errorLoading() {\n        return dokan_admin.dokanSPMVAdmin.i18n.error_loading;\n      },\n      searching: function searching() {\n        return dokan_admin.dokanSPMVAdmin.i18n.searching + '...';\n      },\n      inputTooShort: function inputTooShort() {\n        return dokan_admin.dokanSPMVAdmin.i18n.input_too_short + '...';\n      }\n    },\n    escapeMarkup: function escapeMarkup(markup) {\n      return markup;\n    },\n    templateResult: function templateResult(vendor) {\n      if (vendor.loading) {\n        return vendor.text;\n      }\n\n      var markup = \"<div class='dokan-spmv-vendor-dropdown-results clearfix'>\" + \"<div class='dokan-spmv-vendor-dropdown-results__avatar'><img src='\" + vendor.avatar + \"' /></div>\" + \"<div class='dokan-spmv-vendor-dropdown-results__title'>\" + vendor.name + \"</div></div>\";\n      return markup;\n    },\n    templateSelection: function templateSelection(vendor) {\n      return vendor.name;\n    }\n  });\n  $('#dokan-spmv-products-admin-assign-vendors-btn').on('click', function (e) {\n    e.preventDefault();\n    var button = $(this);\n    var select = $('#dokan-spmv-products-admin-assign-vendors');\n    var vendors = select.selectWoo('val');\n\n    if (vendors && vendors.length) {\n      button.prop('disabled', true);\n      select.prop('disabled', true);\n      $.ajax({\n        url: dokan_admin.ajaxurl,\n        method: 'post',\n        dataType: 'json',\n        data: {\n          action: 'dokan_spmv_products_admin_assign_vendors',\n          _wpnonce: dokan_admin.nonce,\n          product_id: dokan_admin.dokanSPMVAdmin.product_id,\n          vendors: vendors\n        }\n      }).done(function (response) {\n        window.location.href = window.location.href;\n      }).always(function () {\n        button.prop('disabled', true);\n        select.prop('disabled', true);\n      });\n    }\n  });\n  $('#dokan-spmv-products-admin .delete-product').on('click', function (e) {\n    e.preventDefault();\n\n    if (confirm(dokan_admin.dokanSPMVAdmin.i18n.confirm_delete)) {\n      var product_id = $(this).data('product-id');\n      $.ajax({\n        url: dokan_admin.ajaxurl,\n        method: 'post',\n        dataType: 'json',\n        data: {\n          action: 'dokan_spmv_products_admin_delete_clone_product',\n          _wpnonce: dokan_admin.nonce,\n          product_id: product_id\n        }\n      }).done(function (response) {\n        window.location.href = window.location.href;\n      });\n    }\n  });\n})(jQuery);\n\n//# sourceURL=webpack:///./modules/single-product-multiple-vendor/assets/src/js/dokan-spmv-products-admin.js?");

/***/ }),

/***/ "./modules/single-product-multiple-vendor/assets/src/less/dokan-spmv-products-admin.less":
/*!***********************************************************************************************!*\
  !*** ./modules/single-product-multiple-vendor/assets/src/less/dokan-spmv-products-admin.less ***!
  \***********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./modules/single-product-multiple-vendor/assets/src/less/dokan-spmv-products-admin.less?");

/***/ })

/******/ });