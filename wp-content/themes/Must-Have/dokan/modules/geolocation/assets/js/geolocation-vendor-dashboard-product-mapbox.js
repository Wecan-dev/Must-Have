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
/******/ 	return __webpack_require__(__webpack_require__.s = "./modules/geolocation/assets/src/js/vendor-dashboard-product-mapbox.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./modules/geolocation/assets/src/js/vendor-dashboard-product-mapbox.js":
/*!******************************************************************************!*\
  !*** ./modules/geolocation/assets/src/js/vendor-dashboard-product-mapbox.js ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("(function ($) {\n  if (!$('#dokan-geolocation-product-location').length) {\n    return;\n  }\n\n  function SearchButtonControl(mapId) {\n    this._mapId = mapId;\n  }\n\n  SearchButtonControl.prototype.onAdd = function (map) {\n    var self = this;\n    this._map = map;\n    var icon = document.createElement('i');\n    icon.className = 'fa fa-search';\n    var label = document.createTextNode('Search Map');\n    var button = document.createElement('button');\n    button.type = 'button'; // button.className = 'button';\n\n    button.appendChild(icon);\n    button.appendChild(label);\n    button.addEventListener('click', function (e) {\n      e.preventDefault();\n      var control = document.getElementById(self._mapId).getElementsByClassName('mapboxgl-ctrl-top-left')[0];\n      control.className = control.className + ' ' + 'show-geocoder';\n    });\n    var container = document.createElement('div');\n    container.className = 'mapboxgl-ctrl mapboxgl-ctrl-group dokan-mapboxgl-ctrl';\n    container.appendChild(button);\n    this._container = container;\n    return this._container;\n  };\n\n  SearchButtonControl.prototype.onRemove = function () {\n    this._container.parentNode.removeChild(this._container);\n\n    this._map = undefined;\n  };\n\n  var useStoreSettings = $('#_dokan_geolocation_use_store_settings');\n  var dokanMapbox, accessToken, mapboxId, latInput, lngInput, addressInput, dokanGeocoder, dokanMarker;\n  var location = {};\n  useStoreSettings.on('change', function () {\n    $('#dokan-geolocation-product-location-no-store-settings').toggleClass('dokan-hide');\n    $('#dokan-geolocation-product-location').toggleClass('dokan-hide');\n\n    if (!useStoreSettings.is(':checked') && !dokanMapbox) {\n      initMap();\n    }\n  });\n  var locateBtn = $('#dokan-geolocation-product-location').find('.locate-icon');\n\n  if (!navigator.geolocation) {\n    locateBtn.addClass('dokan-hide');\n  } else {\n    locateBtn.on('click', function () {\n      navigator.geolocation.getCurrentPosition(function (position) {\n        var lat = position.coords.latitude;\n        var lng = position.coords.longitude;\n        dokanMarker.setLngLat([lng, lat]);\n        dokanMapbox.setCenter([lng, lat]);\n        setLocation({\n          latitude: lat,\n          longitude: lng\n        });\n      });\n    });\n  }\n\n  if (!useStoreSettings.is(':checked')) {\n    initMap();\n  }\n\n  function initMap() {\n    mapboxId = 'dokan-geolocation-product-location-map';\n    accessToken = $('[name=\"_dokan_geolocation_mapbox_access_token\"]').val();\n    latInput = $('[name=\"_dokan_geolocation_product_dokan_geo_latitude\"]');\n    lngInput = $('[name=\"_dokan_geolocation_product_dokan_geo_longitude\"]');\n    addressInput = $('#_dokan_geolocation_product_location');\n    location = {\n      latitude: latInput.val(),\n      longitude: lngInput.val(),\n      address: addressInput.val(),\n      zoom: 12\n    };\n    mapboxgl.accessToken = accessToken;\n    dokanMapbox = new mapboxgl.Map({\n      container: mapboxId,\n      style: 'mapbox://styles/mapbox/streets-v10',\n      center: [location.longitude, location.latitude],\n      zoom: location.zoom\n    });\n    dokanMapbox.addControl(new mapboxgl.NavigationControl());\n    dokanMapbox.addControl(new SearchButtonControl(mapboxId), 'top-left');\n    dokanMapbox.on('load', function () {\n      dokanGeocoder = new MapboxGeocoder({\n        accessToken: mapboxgl.accessToken,\n        mapboxgl: mapboxgl,\n        zoom: dokanMapbox.getZoom(),\n        placeholder: 'Search Address',\n        marker: false,\n        reverseGeocode: true\n      });\n      dokanMapbox.addControl(dokanGeocoder, 'top-left');\n      dokanGeocoder.setInput(location.address);\n      dokanGeocoder.on('result', function (resultData) {\n        var result = resultData.result;\n        var lngLat = result.center;\n        var address = result.place_name;\n        dokanMarker.setLngLat(lngLat);\n        dokanMapbox.setCenter([lngLat[0], lngLat[1]]);\n        setLocation({\n          address: address,\n          latitude: lngLat[1],\n          longitude: lngLat[0]\n        });\n      });\n    });\n    dokanMarker = new mapboxgl.Marker({\n      draggable: true\n    }).setLngLat([location.longitude, location.latitude]).addTo(dokanMapbox).on('dragend', onMarkerDragEnd);\n  }\n\n  function onMarkerDragEnd() {\n    var urlOrigin = dokanGeocoder.geocoderService.client.origin;\n    var accessToken = dokanGeocoder.geocoderService.client.accessToken;\n    var lng = dokanMarker.getLngLat().wrap().lng;\n    var lat = dokanMarker.getLngLat().wrap().lat;\n    dokanMapbox.setCenter([lng, lat]);\n    setLocation({\n      latitude: lat,\n      longitude: lng\n    });\n    var url = urlOrigin + '/geocoding/v5/mapbox.places/' + lng + '%2C' + lat + '.json?access_token=' + accessToken + '&cachebuster=' + +new Date() + '&autocomplete=true';\n    dokanGeocoder._inputEl.disabled = true;\n    dokanGeocoder._loadingEl.style.display = 'block';\n    jQuery.ajax({\n      url: url,\n      method: 'get'\n    }).done(function (response) {\n      if (response.features) {\n        dokanGeocoder._typeahead.update(response.features);\n\n        $(dokanMapbox._controlContainer).find('.mapboxgl-ctrl-top-left').addClass('show-geocoder');\n      }\n    }).always(function () {\n      dokanGeocoder._inputEl.disabled = false;\n      dokanGeocoder._loadingEl.style.display = '';\n    });\n  }\n\n  function setLocation(newLocation) {\n    location = Object.assign(location, newLocation);\n    latInput.val(location.latitude);\n    lngInput.val(location.longitude);\n    addressInput.val(location.address);\n  }\n\n  $('#dokan-map-add').on('input', function (e) {\n    setLocation({\n      address: e.target.value\n    });\n  });\n})(jQuery);\n\n//# sourceURL=webpack:///./modules/geolocation/assets/src/js/vendor-dashboard-product-mapbox.js?");

/***/ })

/******/ });