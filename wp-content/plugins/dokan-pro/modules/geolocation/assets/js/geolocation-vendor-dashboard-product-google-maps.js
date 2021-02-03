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
/******/ 	return __webpack_require__(__webpack_require__.s = "./modules/geolocation/assets/src/js/vendor-dashboard-product-google-maps.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./modules/geolocation/assets/src/js/vendor-dashboard-product-google-maps.js":
/*!***********************************************************************************!*\
  !*** ./modules/geolocation/assets/src/js/vendor-dashboard-product-google-maps.js ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("(function ($) {\n  if (!$('#dokan-geolocation-product-location').length) {\n    return;\n  }\n\n  var gmap, marker, address, geocoder;\n\n  function initMap() {\n    var lat = $('[name=\"_dokan_geolocation_product_dokan_geo_latitude\"]').val(),\n        lng = $('[name=\"_dokan_geolocation_product_dokan_geo_longitude\"]').val(),\n        map_area = $('#dokan-geolocation-product-location-map');\n    address = $('#_dokan_geolocation_product_location');\n    var curpoint = new google.maps.LatLng(lat, lng);\n    gmap = new google.maps.Map(map_area.get(0), {\n      center: curpoint,\n      zoom: 13,\n      mapTypeId: google.maps.MapTypeId.ROADMAP\n    });\n    marker = new google.maps.Marker({\n      position: curpoint,\n      map: gmap,\n      draggable: true\n    });\n    geocoder = new google.maps.Geocoder();\n    var autocomplete = new google.maps.places.Autocomplete(address.get(0));\n    autocomplete.addListener('place_changed', function () {\n      var place = autocomplete.getPlace(),\n          location = place.geometry.location;\n      updateMap(location.lat(), location.lng(), place.formatted_address);\n    });\n    gmap.addListener('click', function (e) {\n      updateMap(e.latLng.lat(), e.latLng.lng());\n    });\n    marker.addListener('dragend', function (e) {\n      updateMap(e.latLng.lat(), e.latLng.lng());\n    });\n  }\n\n  function updateMap(lat, lng, formatted_address) {\n    $('[name=\"_dokan_geolocation_product_dokan_geo_latitude\"]').val(lat), $('[name=\"_dokan_geolocation_product_dokan_geo_longitude\"]').val(lng);\n    var curpoint = new google.maps.LatLng(lat, lng);\n    gmap.setCenter(curpoint);\n    marker.setPosition(curpoint);\n\n    if (!formatted_address) {\n      geocoder.geocode({\n        location: {\n          lat: lat,\n          lng: lng\n        }\n      }, function (results, status) {\n        if ('OK' === status) {\n          address.val(results[0].formatted_address);\n        }\n      });\n    }\n  }\n\n  $('#_dokan_geolocation_use_store_settings').on('change', function () {\n    $('#dokan-geolocation-product-location-no-store-settings').toggleClass('dokan-hide');\n    $('#dokan-geolocation-product-location').toggleClass('dokan-hide');\n  });\n  var locate_btn = $('#dokan-geolocation-product-location').find('.locate-icon');\n\n  if (!navigator.geolocation) {\n    locate_btn.addClass('dokan-hide');\n  } else {\n    locate_btn.on('click', function () {\n      navigator.geolocation.getCurrentPosition(function (position) {\n        updateMap(position.coords.latitude, position.coords.longitude);\n      });\n    });\n  }\n\n  initMap();\n})(jQuery);\n\n//# sourceURL=webpack:///./modules/geolocation/assets/src/js/vendor-dashboard-product-google-maps.js?");

/***/ })

/******/ });