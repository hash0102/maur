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

/***/ "./resources/js/jQueryPlayer.js":
/*!**************************************!*\
  !*** ./resources/js/jQueryPlayer.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$("#teams").on('change', function () {
  var teamId = $("#teams").val();

  if (teamId == "") {
    $('.posts2').show();
    $('.paginate').show();
    $('.posts').hide();
  } else {
    $('.posts2').hide();
    $('.paginate').hide();
    $('.posts').show();
    $.ajax({
      type: "get",
      url: "players/teams/" + teamId,
      dataType: "json"
    }).done(function (res) {
      $('.posts').empty();
      $.each(res.players_info.data, function (index, value) {
        console.log(index);
        var players_content = "\n              <p> \u9078\u624B\u540D\uFF1A".concat(value.first_name, " ").concat(value.last_name, " </p>\n              <p>\u30C1\u30FC\u30E0\uFF1A").concat(value.team.state_name, " ").concat(value.team.name, " </p>\n              <p>\u30DD\u30B8\u30B7\u30E7\u30F3: ").concat(value.position.name, " </p>\n              <p>\u5E74\u9F62\uFF1A").concat(value.age, " \u6B73</p>\n              <p><img src = ").concat(value.image, " ></p>\n              <ul>\u4ECA\u30B7\u30FC\u30BA\u30F3\u306E\u30B9\u30BF\u30C3\u30C4</ul>\n              <li>PPG\uFF1A").concat(value.PPG, "</li>\n              <li>RPG\uFF1A").concat(value.RPG, "</li>\n              <li>APG\uFF1A").concat(value.APG, "</li>\n              <li>MPG\uFF1A").concat(value.MPG, " \u5206</li>\n              <li>FG\uFF1A").concat(value.FG, "\uFF05</li>\n              <li>3P\uFF1A").concat(value.three_point, "\uFF05</li>\n              <li>FT\uFF1A").concat(value.FT, "%</li>\n              <hr>\n              ");
        $('.posts').append(players_content);
      });
    }).fail(function (error) {
      alert(error.statusText);
    });
  }
});

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./resources/js/jQueryPlayer.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/maur/resources/js/jQueryPlayer.js */"./resources/js/jQueryPlayer.js");


/***/ })

/******/ });