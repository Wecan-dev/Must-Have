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
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/src/js/dokan-blocks-editor-script.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/js/dokan-blocks-editor-script.js":
/*!*****************************************************!*\
  !*** ./assets/src/js/dokan-blocks-editor-script.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("(function (blocks, i18n, element, components) {\n  var el = element.createElement;\n  var Placeholder = components.Placeholder;\n  var Button = components.Button;\n  var TextControl = components.TextControl;\n  var __ = i18n.__;\n  var dokanShortcodes = window.dokan_shortcodes;\n\n  function getDokanIcon(svgProps) {\n    svgProps = svgProps || {};\n    svgProps.xmlns = 'http://www.w3.org/2000/svg';\n    svgProps.viewBox = '0 0 58 63';\n    var SVG = components.SVG;\n    var G = components.G;\n    var Path = components.Path;\n    var icon = el(SVG, svgProps, el(G, {\n      stroke: 'none',\n      strokeWidth: '1',\n      fill: 'none',\n      fillRule: 'evenodd'\n    }, el(G, {\n      fillRule: 'nonzero',\n      fill: '#9EA3A8'\n    }, el(Path, {\n      d: 'M5.33867702,3.0997123 C5.33867702,3.0997123 40.6568031,0.833255993 40.6568031,27.7724223 C40.6568031,54.7115885 31.3258879,60.1194199 23.1436827,61.8692575 C23.1436827,61.8692575 57.1718639,69.1185847 57.1718639,31.1804393 C57.1718639,-6.75770611 13.7656892,-1.28321423 5.33867702,3.0997123 Z'\n    }), el(Path, {\n      d: 'M34.0564282,48.9704547 C34.0564282,48.9704547 30.6479606,59.4444826 20.3472329,60.7776922 C10.0465051,62.1109017 8.12571122,57.1530286 0.941565611,57.4946635 C0.941565611,57.4946635 0.357794932,52.5784532 6.1578391,51.8868507 C11.9578833,51.1952482 22.8235504,52.5451229 30.0547743,48.5038314 C30.0547743,48.5038314 34.3294822,46.5206821 35.1674756,45.5624377 L34.0564282,48.9704547 Z'\n    }), el(Path, {\n      d: 'M4.80198462,4.99953596 L4.80198462,17.9733318 L4.80198462,17.9733318 L4.80198462,50.2869992 C5.1617776,50.2053136 5.52640847,50.1413326 5.89420073,50.0953503 C7.92701701,49.903571 9.97004544,49.8089979 12.0143772,49.8120433 C14.1423155,49.8120433 16.4679825,49.7370502 18.7936496,49.5454014 L18.7936496,34.3134818 C18.7936496,29.2472854 18.426439,24.0727656 18.7936496,19.0149018 C19.186126,15.9594324 21.459175,13.3479115 24.697266,12.232198 C27.2835811,11.3792548 30.1586431,11.546047 32.5970015,12.6904888 C20.9498348,5.04953132 7.86207285,4.89954524 4.80198462,4.99953596 Z'\n    }))));\n    return icon;\n  }\n\n  blocks.registerBlockType('dokan/shortcode', {\n    title: __('Dokan Shortcode', 'dokan'),\n    icon: getDokanIcon(),\n    category: 'dokan',\n    attributes: {\n      editMode: {\n        type: 'bool',\n        default: true\n      },\n      shortcode: {\n        type: 'string',\n        default: ''\n      }\n    },\n    example: {},\n    edit: function edit(props) {\n      var editMode = props.attributes.editMode;\n      var tableRow = '';\n      var bottomControls = '';\n\n      function insertShortCode(shortcode) {\n        props.setAttributes({\n          editMode: false,\n          shortcode: shortcode\n        });\n      }\n\n      ;\n\n      if (editMode) {\n        var shortcodes = Object.keys(dokanShortcodes);\n        tableRow = shortcodes.map(function (shortcode, i) {\n          var shortcodeTitle = dokanShortcodes[shortcode].title;\n          var shortcodeContent = dokanShortcodes[shortcode].content;\n          var titleProps = {\n            style: {\n              borderBottom: '1px solid #eee',\n              textAlign: 'left',\n              padding: '14px',\n              fontSize: '13px',\n              color: 'rgb(109, 109, 109)'\n            }\n          };\n          var contentProps = {\n            style: {\n              borderBottom: '1px solid #eee',\n              textAlign: 'right',\n              padding: '14px'\n            }\n          };\n\n          if (i === 0) {\n            titleProps.style.borderTop = '1px solid #eee';\n            contentProps.style.borderTop = '1px solid #eee';\n          }\n\n          return el('tr', {\n            key: shortcode\n          }, el('td', titleProps, shortcodeTitle), el('td', contentProps, el(Button, {\n            isSmall: true,\n            onClick: insertShortCode.bind(this, shortcodeContent)\n          }, __('Add Shortcode', 'dokan'))));\n        });\n      } else {\n        tableRow = el('tr', {}, el('td', {\n          style: {\n            padding: '14px 14px 6px'\n          }\n        }, el(TextControl, {\n          value: props.attributes.shortcode,\n          onChange: function onChange(shortcode) {\n            props.setAttributes({\n              shortcode: shortcode\n            });\n          }\n        })));\n        bottomControls = el(Button, {\n          isSmall: true,\n          onClick: function onClick() {\n            props.setAttributes({\n              editMode: true\n            });\n          }\n        }, __('Change Shortcode', 'dokan'));\n      }\n\n      var content = el(Placeholder, {\n        icon: getDokanIcon({\n          style: {\n            width: '20px',\n            height: '20px',\n            marginRight: '5px'\n          }\n        }),\n        label: __('Dokan Shortcode', 'dokan')\n      }, el('table', {\n        style: {\n          borderSpacing: 0,\n          width: '100%',\n          borderCollapse: 'separate',\n          margin: '0 0 10px',\n          backgroundColor: '#fbfbfb'\n        }\n      }, el('tbody', {}, tableRow)), el('div', {\n        style: {\n          textAlign: 'center'\n        }\n      }, bottomControls));\n      return content;\n    },\n    save: function save(props) {\n      return props.attributes.shortcode;\n    }\n  });\n})(window.wp.blocks, window.wp.i18n, window.wp.element, window.wp.components);\n\n//# sourceURL=webpack:///./assets/src/js/dokan-blocks-editor-script.js?");

/***/ })

/******/ });