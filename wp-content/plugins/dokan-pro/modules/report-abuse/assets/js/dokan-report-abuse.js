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
/******/ 	return __webpack_require__(__webpack_require__.s = "./modules/report-abuse/assets/src/js/frontend/main.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./modules/report-abuse/assets/src/js/frontend/main.js":
/*!*************************************************************!*\
  !*** ./modules/report-abuse/assets/src/js/frontend/main.js ***!
  \*************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"jquery\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n\ndokan.reportAbuse = {\n  button: null,\n  form_html: '',\n  flashMessage: '',\n  init: function init() {\n    var self = this;\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('.dokan-report-abuse-button').on('click', function (e) {\n      e.preventDefault();\n      self.button = this;\n\n      if (dokanReportAbuse.reported_by_logged_in_users_only === 'on' && !dokanReportAbuse.is_user_logged_in) {\n        return jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').trigger('dokan:login_form_popup:show');\n      }\n\n      self.getForm();\n    });\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').on('dokan:login_form_popup:fetching_form', function () {\n      self.showLoadingAnim();\n    });\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').on('dokan:login_form_popup:fetched_form', function () {\n      self.stopLoadingAnim();\n    });\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').on('dokan:login_form_popup:logged_in', function (e, response) {\n      dokanReportAbuse.is_user_logged_in = true;\n      dokanReportAbuse.nonce = response.data.dokan_report_abuse_nonce;\n      self.getForm();\n    });\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').on('submit', '#dokan-report-abuse-form-popup form', function (e) {\n      e.preventDefault();\n      self.submitForm(this);\n    });\n  },\n  showLoadingAnim: function showLoadingAnim() {\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()(this.button).addClass('working').children('i').removeClass('fa-flag').addClass('fa-spin fa-refresh');\n  },\n  stopLoadingAnim: function stopLoadingAnim() {\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()(this.button).removeClass('working').children('i').removeClass('fa-spin fa-refresh').addClass('fa-flag');\n  },\n  submittingForm: function submittingForm() {\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#dokan-report-abuse-form-popup fieldset').prop('disabled', true);\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#dokan-report-abuse-form-submit-btn').addClass('dokan-hide');\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#dokan-report-abuse-form-working-btn').removeClass('dokan-hide');\n  },\n  submittedForm: function submittedForm() {\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#dokan-report-abuse-form-popup fieldset').prop('disabled', false);\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#dokan-report-abuse-form-submit-btn').removeClass('dokan-hide');\n    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#dokan-report-abuse-form-working-btn').addClass('dokan-hide');\n  },\n  getForm: function getForm() {\n    var self = this;\n\n    if (self.form_html) {\n      self.showPopup();\n      return;\n    }\n\n    self.showLoadingAnim();\n    jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({\n      url: dokan.ajaxurl,\n      method: 'get',\n      dataType: 'json',\n      data: {\n        _wpnonce: dokanReportAbuse.nonce,\n        action: 'dokan_report_abuse_get_form'\n      }\n    }).done(function (response) {\n      self.form_html = response.data;\n      self.showPopup();\n    }).always(function () {\n      self.stopLoadingAnim();\n    });\n  },\n  showPopup: function showPopup() {\n    var self = this;\n    jquery__WEBPACK_IMPORTED_MODULE_0___default.a.magnificPopup.open({\n      items: {\n        src: self.form_html,\n        type: 'inline'\n      },\n      callbacks: {\n        afterClose: function afterClose() {\n          self.afterPopupClose();\n        }\n      }\n    });\n  },\n  afterPopupClose: function afterPopupClose() {\n    if (this.flashMessage) {\n      alert(this.flashMessage);\n      this.flashMessage = '';\n    }\n  },\n  submitForm: function submitForm(form) {\n    var self = this;\n    var form_data = jquery__WEBPACK_IMPORTED_MODULE_0___default()(form).serialize();\n    var error_section = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.dokan-popup-error', '#dokan-report-abuse-form-popup');\n    error_section.removeClass('has-error').text('');\n    self.submittingForm();\n    jquery__WEBPACK_IMPORTED_MODULE_0___default.a.ajax({\n      url: dokan.ajaxurl,\n      method: 'post',\n      dataType: 'json',\n      data: {\n        _wpnonce: dokanReportAbuse.nonce,\n        action: 'dokan_report_abuse_submit_form',\n        form_data: {\n          reason: jquery__WEBPACK_IMPORTED_MODULE_0___default()(form).find('[name=\"reason\"]:checked').val(),\n          product_id: dokanReportAbuse.product_id,\n          customer_name: jquery__WEBPACK_IMPORTED_MODULE_0___default()(form).find('[name=\"customer_name\"]').val(),\n          customer_email: jquery__WEBPACK_IMPORTED_MODULE_0___default()(form).find('[name=\"customer_email\"]').val(),\n          description: jquery__WEBPACK_IMPORTED_MODULE_0___default()(form).find('[name=\"description\"]').val()\n        }\n      }\n    }).done(function (response) {\n      self.flashMessage = response.data.message;\n      jquery__WEBPACK_IMPORTED_MODULE_0___default.a.magnificPopup.close();\n    }).always(function () {\n      self.submittedForm();\n    }).fail(function (jqXHR) {\n      if (jqXHR.responseJSON && jqXHR.responseJSON.data && jqXHR.responseJSON.data.message) {\n        error_section.addClass('has-error').text(jqXHR.responseJSON.data.message);\n      }\n    });\n  }\n};\ndokan.reportAbuse.init();\n\n//# sourceURL=webpack:///./modules/report-abuse/assets/src/js/frontend/main.js?");

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = jQuery;\n\n//# sourceURL=webpack:///external_%22jQuery%22?");

/***/ })

/******/ });