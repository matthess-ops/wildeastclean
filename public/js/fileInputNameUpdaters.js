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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/views/overig/fileInputNameUpdaters.js":
/*!************************************************************!*\
  !*** ./resources/js/views/overig/fileInputNameUpdaters.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//there is an error in updateCarouselimageinputname when images with the same name are uploaded
// updates file input field value with the filename of the selected filename by the user
var updateFileInputValue = function updateFileInputValue(input, label) {
  try {
    document.getElementById(input).addEventListener("change", function () {
      var fileNameSplitted = document.getElementById(input).value.split("\\");
      var fileName = fileNameSplitted[fileNameSplitted.length - 1];
      document.getElementById(label).innerHTML = fileName;
    }, true);
  } catch (error) {
    console.log("input var with name " + input + " was not found");
  }
}; // update the carousel_images_input value with the selected filenames by the user


var updateCarouselImageInputName = function updateCarouselImageInputName() {
  try {
    document.getElementById("carousel_images").addEventListener("change", function () {
      var fileNames = document.getElementById("carousel_images").files;
      var newInnerhtml = "";

      for (var index = 0; index < fileNames.length; index++) {
        var fileName = fileNames[index].name;
        console.log(fileName);
        newInnerhtml = newInnerhtml + "," + fileName;
      }

      document.getElementById("carousel_images_label").innerHTML = newInnerhtml;
    }, true);
  } catch (error) {
    console.log("carousel image input is not found");
  }
};

updateCarouselImageInputName();
updateFileInputValue("main_image", "main_image_label");
updateFileInputValue("front_label_image", "front_label_image_label");
updateFileInputValue("user_uploaded_image", "user_uploaded_image_label");

/***/ }),

/***/ 2:
/*!******************************************************************!*\
  !*** multi ./resources/js/views/overig/fileInputNameUpdaters.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\mattt\Desktop\laravel oefenen\final_website_steentjes\theWildEast\resources\js\views\overig\fileInputNameUpdaters.js */"./resources/js/views/overig/fileInputNameUpdaters.js");


/***/ })

/******/ });