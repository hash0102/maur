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

/***/ "./resources/js/jQuery.js":
/*!********************************!*\
  !*** ./resources/js/jQuery.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$("#team").on('change', function () {
  var teamId = $("#team").val();

  if (teamId == "") {
    $('.posts2').show();
    $('.paginate').show();
    $('.posts').hide();
  } else {
    $('.posts2').hide();
    $('.paginate').hide();
    $.ajax({
      type: "get",
      url: "teams/" + teamId,
      dataType: "json"
    }).done(function (res) {
      $.each(res, function (index, value) {
        $('.posts').empty();

        for (var i = 0; i < value.length; i++) {
          var user = "\n          <p>\u6295\u7A3F\u8005\uFF1A".concat(res.player_info[i].user.name, " </p>\n          <p>\u9078\u624B\u540D\uFF1A ").concat(res.player_info[i].player.first_name, " ").concat(res.player_info[i].player.last_name, "</p>\n          <p>\u30C1\u30FC\u30E0\uFF1A").concat(res.player_info[i].team.state_name, " ").concat(res.player_info[i].team.name, " </p>\n          <p>\u30DD\u30B8\u30B7\u30E7\u30F3: ").concat(res.player_info[i].player.position.name, " </p>\n          <p> \u30AA\u30D5\u30A7\u30F3\u30B9\u8A55\u4FA1\uFF1A").concat(res.player_info[i].offense_review, " </p>\n          <p> \u30C7\u30A3\u30D5\u30A7\u30F3\u30B9\u8A55\u4FA1\uFF1A").concat(res.player_info[i].defense_review, " </p>\n          <p> \u8A55\u4FA1\u7406\u7531\uFF1A").concat(res.player_info[i].content, " </p>\n          <p><img src = ").concat(res.player_info[i].player.image, " ></p>\n          <hr>\n          ");
          $(".posts").append(user);
        }
      });
    }).fail(function (error) {
      alert(error.statusText);
    });
  }
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/jQuery.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/maur/resources/js/jQuery.js */"./resources/js/jQuery.js");


/***/ })

/******/ });