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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/img-preview.js":
/*!*************************************!*\
  !*** ./resources/js/img-preview.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("window.previewImage = function previewImage(obj) {\n  var fileReader = new FileReader();\n\n  fileReader.onload = function () {\n    var canvas = document.getElementById('preview');\n    var ctx = canvas.getContext('2d');\n    var image = new Image();\n    image.src = fileReader.result;\n\n    image.onload = function () {\n      canvas.width = image.width;\n      canvas.height = image.height;\n      ctx.drawImage(image, 0, 0);\n    };\n  };\n\n  fileReader.readAsDataURL(obj.files[0]);\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvaW1nLXByZXZpZXcuanM/NDExZiJdLCJuYW1lcyI6WyJ3aW5kb3ciLCJwcmV2aWV3SW1hZ2UiLCJvYmoiLCJmaWxlUmVhZGVyIiwiRmlsZVJlYWRlciIsIm9ubG9hZCIsImNhbnZhcyIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJjdHgiLCJnZXRDb250ZXh0IiwiaW1hZ2UiLCJJbWFnZSIsInNyYyIsInJlc3VsdCIsIndpZHRoIiwiaGVpZ2h0IiwiZHJhd0ltYWdlIiwicmVhZEFzRGF0YVVSTCIsImZpbGVzIl0sIm1hcHBpbmdzIjoiQUFBQUEsTUFBTSxDQUFDQyxZQUFQLEdBQXNCLFNBQVNBLFlBQVQsQ0FBc0JDLEdBQXRCLEVBQTRCO0FBQ2hELE1BQUlDLFVBQVUsR0FBRyxJQUFJQyxVQUFKLEVBQWpCOztBQUNBRCxZQUFVLENBQUNFLE1BQVgsR0FBcUIsWUFBVztBQUM5QixRQUFJQyxNQUFNLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBVCxDQUF3QixTQUF4QixDQUFiO0FBQ0EsUUFBSUMsR0FBRyxHQUFHSCxNQUFNLENBQUNJLFVBQVAsQ0FBa0IsSUFBbEIsQ0FBVjtBQUNBLFFBQUlDLEtBQUssR0FBRyxJQUFJQyxLQUFKLEVBQVo7QUFDQUQsU0FBSyxDQUFDRSxHQUFOLEdBQVlWLFVBQVUsQ0FBQ1csTUFBdkI7O0FBQ0FILFNBQUssQ0FBQ04sTUFBTixHQUFnQixZQUFZO0FBQzFCQyxZQUFNLENBQUNTLEtBQVAsR0FBZUosS0FBSyxDQUFDSSxLQUFyQjtBQUNBVCxZQUFNLENBQUNVLE1BQVAsR0FBZ0JMLEtBQUssQ0FBQ0ssTUFBdEI7QUFDQVAsU0FBRyxDQUFDUSxTQUFKLENBQWNOLEtBQWQsRUFBcUIsQ0FBckIsRUFBd0IsQ0FBeEI7QUFDRCxLQUpEO0FBS0MsR0FWSDs7QUFXRVIsWUFBVSxDQUFDZSxhQUFYLENBQXlCaEIsR0FBRyxDQUFDaUIsS0FBSixDQUFVLENBQVYsQ0FBekI7QUFDSCxDQWREIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2ltZy1wcmV2aWV3LmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsid2luZG93LnByZXZpZXdJbWFnZSA9IGZ1bmN0aW9uIHByZXZpZXdJbWFnZShvYmopICB7XG4gIHZhciBmaWxlUmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKTtcbiAgZmlsZVJlYWRlci5vbmxvYWQgPSAoZnVuY3Rpb24oKSB7XG4gICAgdmFyIGNhbnZhcyA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdwcmV2aWV3Jyk7XG4gICAgdmFyIGN0eCA9IGNhbnZhcy5nZXRDb250ZXh0KCcyZCcpO1xuICAgIHZhciBpbWFnZSA9IG5ldyBJbWFnZSgpO1xuICAgIGltYWdlLnNyYyA9IGZpbGVSZWFkZXIucmVzdWx0O1xuICAgIGltYWdlLm9ubG9hZCA9IChmdW5jdGlvbiAoKSB7XG4gICAgICBjYW52YXMud2lkdGggPSBpbWFnZS53aWR0aDtcbiAgICAgIGNhbnZhcy5oZWlnaHQgPSBpbWFnZS5oZWlnaHQ7XG4gICAgICBjdHguZHJhd0ltYWdlKGltYWdlLCAwLCAwKTtcbiAgICB9KTtcbiAgICB9KTtcbiAgICBmaWxlUmVhZGVyLnJlYWRBc0RhdGFVUkwob2JqLmZpbGVzWzBdKTtcbn1cbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/img-preview.js\n");

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/img-preview.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/pasutau/Projects/curry-app/resources/js/img-preview.js */"./resources/js/img-preview.js");


/***/ })

/******/ });