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
/******/ 	return __webpack_require__(__webpack_require__.s = "./modules/geolocation/assets/src/js/store-lists-filters.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./modules/geolocation/assets/src/js/store-lists-filters.js":
/*!******************************************************************!*\
  !*** ./modules/geolocation/assets/src/js/store-lists-filters.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval(";\n\n(function ($) {\n  var geoLocationStoreLists = {\n    slider: null,\n    sliderValue: 0,\n    distance: 0,\n    init: function init() {\n      var self = geoLocationStoreLists;\n      this.slider = $('.store-lists-other-filter-wrap .dokan-geolocation-location-filters .dokan-range-slider');\n      this.sliderValue = this.slider.prev('.dokan-range-slider-value').find('span');\n      this.slider.on('input', this.setSliderValue);\n      this.slider.on('change', this.setDistance);\n      $('.store-lists-other-filter-wrap .dokan-geolocation-location-filters .location-address input').on('change', this.buildAddressQuery);\n      self.bindAddressInput();\n      $(' #dokan-store-listing-filter-wrap .dokan-geolocation-filters-loading').remove();\n    },\n    buildAddressQuery: function buildAddressQuery(event) {\n      var self = geoLocationStoreLists;\n      self.setParam('address', event.target.value);\n\n      if (!event.target.value) {\n        self.setParam('distance', '');\n        self.setParam('longitude', '');\n        self.setParam('latitude', '');\n      }\n    },\n    bindAddressInput: function bindAddressInput() {\n      if (window.google && google.maps) {\n        this.bindeGoogleMap();\n      } else if ($('[name=\"dokan_mapbox_access_token\"]').val()) {\n        this.bindMapbox();\n      }\n    },\n    bindeGoogleMap: function bindeGoogleMap() {\n      var self = geoLocationStoreLists;\n      var locationAddress = $('.location-address');\n      self.geocoder = new google.maps.Geocoder(); // Autocomplete location address\n\n      var address_input = locationAddress.find('input');\n      autocomplete = new google.maps.places.Autocomplete(address_input.get(0));\n      autocomplete.addListener('place_changed', function () {\n        var place = autocomplete.getPlace();\n\n        if (place) {\n          var location = place.geometry.location;\n          self.latitude = location.lat();\n          self.longitude = location.lng();\n          self.setAddress(place.formatted_address);\n        }\n      });\n      self.navigatorGetCurrentPosition(function () {\n        self.geocoder.geocode({\n          location: {\n            lat: self.latitude,\n            lng: self.longitude\n          }\n        }, function (results, status) {\n          var address = '';\n\n          if ('OK' === status) {\n            address = results[0].formatted_address;\n          }\n\n          self.setAddress(address);\n          address_input.val(address);\n        });\n      });\n    },\n    bindMapbox: function bindMapbox() {\n      var self = geoLocationStoreLists;\n      var locationAddress = $('.location-address');\n      var address_input = locationAddress.find('input');\n      var input = address_input.get(0);\n      var suggestions = new Suggestions(input, [], {\n        minLength: 3,\n        limit: 3,\n        hideOnBlur: false\n      });\n\n      suggestions.getItemValue = function (item) {\n        return item.place_name;\n      };\n\n      address_input.on('change', function () {\n        if (suggestions.selected) {\n          var location = suggestions.selected;\n          self.latitude = location.geometry.coordinates[1];\n          self.longitude = location.geometry.coordinates[0];\n          self.setAddress(location.place_name);\n        }\n      });\n\n      var address_search = _.debounce(function (search, text) {\n        if (search.cancel) {\n          search.cancel();\n        }\n\n        self.mapboxGetPlaces(text, function (features) {\n          suggestions.update(features);\n        });\n      }, 250);\n\n      address_input.on('input', function () {\n        var input_text = $(this).val();\n        address_search(address_search, input_text);\n      });\n      self.navigatorGetCurrentPosition(function () {\n        self.mapboxGetPlaces({\n          lng: self.longitude,\n          lat: self.latitude\n        }, function (features) {\n          if (features && features.length) {\n            var address = features[0].place_name;\n            self.setAddress(address);\n            address_input.val(address);\n          }\n        });\n      });\n    },\n    navigatorGetCurrentPosition: function navigatorGetCurrentPosition(callback) {\n      var self = geoLocationStoreLists;\n      var locationAddress = $('.location-address'),\n          locate_btn = locationAddress.find('.locate-icon'),\n          loader = locate_btn.next();\n\n      if (navigator.geolocation) {\n        locate_btn.removeClass('dokan-hide').on('click', function () {\n          locate_btn.addClass('dokan-hide');\n          loader.removeClass('dokan-hide');\n          navigator.geolocation.getCurrentPosition(function (position) {\n            locate_btn.removeClass('dokan-hide');\n            loader.addClass('dokan-hide');\n            self.latitude = position.coords.latitude, self.longitude = position.coords.longitude, callback();\n          });\n        });\n      }\n    },\n    mapboxGetPlaces: function mapboxGetPlaces(search, callback) {\n      if (!search) {\n        return;\n      }\n\n      var url_origin = 'https://api.mapbox.com';\n      var access_token = $('[name=\"dokan_mapbox_access_token\"]').val();\n\n      if (search.lng && search.lat) {\n        search = search.lng + '%2C' + search.lat;\n      }\n\n      var url = url_origin + '/geocoding/v5/mapbox.places/' + search + '.json?access_token=' + access_token + '&cachebuster=' + +new Date() + '&autocomplete=true';\n      $.ajax({\n        url: url,\n        method: 'get'\n      }).done(function (response) {\n        if (response.features && typeof callback === 'function') {\n          callback(response.features);\n        }\n      });\n    },\n    setAddress: function setAddress(address) {\n      var self = geoLocationStoreLists;\n      self.setParam('address', address);\n\n      if (!self.distance) {\n        var distance = 0,\n            slider_val = self.slider.val();\n\n        if (slider_val) {\n          distance = slider_val;\n        } else {\n          var min = parseInt(self.slider.attr('min'), 10),\n              max = parseInt(self.slider.attr('max'), 10);\n          distance = Math.ceil((min + max) / 2);\n        }\n\n        self.setParam('distance', distance);\n      }\n\n      self.setParam('latitude', self.latitude);\n      self.setParam('longitude', self.longitude);\n    },\n    setParam: function setParam(param, val) {\n      var self = geoLocationStoreLists;\n\n      if (val) {\n        dokan.storeLists.query[param] = val;\n      } else {\n        delete dokan.storeLists.query[param];\n      }\n    },\n    setSliderValue: function setSliderValue(event) {\n      var self = geoLocationStoreLists;\n      self.sliderValue.html(event.target.value);\n    },\n    setDistance: function setDistance(event) {\n      var self = geoLocationStoreLists;\n      self.setParam('distance', event.target.value);\n    }\n  };\n  geoLocationStoreLists.init();\n})(jQuery);\n\n//# sourceURL=webpack:///./modules/geolocation/assets/src/js/store-lists-filters.js?");

/***/ })

/******/ });