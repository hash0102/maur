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
    $('.posts').show();
    $.ajax({
      type: "get",
      url: "/posts/teams/" + teamId,
      dataType: "json"
    }).done(function (res) {
      $('.posts').empty();

      if (res.player_info.data.length !== 0) {
        $.each(res.player_info.data, function (index, value) {
          if (value.user.team_id == null) {
            var notTeamUser = "\n                <p class=\"name\">\u9078\u624B\u540D\uFF1A ".concat(value.player.first_name, " ").concat(value.player.last_name, "</p>\n                <img src = ").concat(value.player.image, " class = 'player-image'>\n                <div class = \"contents\">\n                <p>\u30C1\u30FC\u30E0\uFF1A<img src =\"").concat(value.team.image, "\" class=\"team-image\"> ").concat(value.team.state_name, " ").concat(value.team.name, " </p>\n                <p>\u30DD\u30B8\u30B7\u30E7\u30F3: ").concat(value.player.position, " </p>\n                <div class=\"reviews\">\n                <p class=\"of-review\"> \u30AA\u30D5\u30A7\u30F3\u30B9\u8A55\u4FA1\uFF1A").concat(value.offense_review, " </p>\n                <p class=\"df-review\"> \u30C7\u30A3\u30D5\u30A7\u30F3\u30B9\u8A55\u4FA1\uFF1A").concat(value.defense_review, " </p>\n                </div>\n                </div>\n                <div class = \"reason\">\n                <p>\u8A55\u4FA1\u7406\u7531\uFF1A").concat(value.content, "</p>\n                </div>\n                <hr>\n                <div class=\"poster-content\">\n                <p class=\"poster\">\u6295\u7A3F\u8005\uFF1A<img src = \"").concat(value.user.image, "\"  class=\"user-image\">").concat(value.user.name, " </p>\n                <p>\u6295\u7A3F\u8005\u306E\u304A\u6C17\u306B\u5165\u308A\u306E\u30C1\u30FC\u30E0\uFF1A\u672A\u8A2D\u5B9A</p>\n                <p>\u3044\u3044\u306D\u6570\uFF1A").concat(value.likes_count, " \u3044\u3044\u306D</p>\n                <p>\u6295\u7A3F\u65E5\u4ED8\uFF1A").concat(value.created_at, "</p>\n                <a href=\"/posts/").concat(value.id, "\"class=\"posts_info\"><i class=\"fa-solid fa-angles-right\"></i>    \u6295\u7A3F\u8A73\u7D30</a>\n                <a href=\"/players/").concat(value.player_id, "\" class=\"players_info\"><i class=\"fa-solid fa-user\"></i>    \u9078\u624B\u8A73\u7D30</a>\n                <hr>");
            $(".posts").append(notTeamUser);
          } else {
            var user = "\n                <p class=\"name\">\u9078\u624B\u540D\uFF1A ".concat(value.player.first_name, " ").concat(value.player.last_name, "</p>\n                <img src = ").concat(value.player.image, " class = 'player-image'>\n                <div class = \"contents\">\n                <p>\u30C1\u30FC\u30E0\uFF1A<img src=\"").concat(value.team.image, "\" class=\"team-image\"> ").concat(value.team.state_name, " ").concat(value.team.name, " </p>\n                <p>\u30DD\u30B8\u30B7\u30E7\u30F3: ").concat(value.player.position, " </p>\n                <div class=\"reviews\">\n                <p class=\"of-review\"> \u30AA\u30D5\u30A7\u30F3\u30B9\u8A55\u4FA1\uFF1A").concat(value.offense_review, " </p>\n                <p class=\"df-review\"> \u30C7\u30A3\u30D5\u30A7\u30F3\u30B9\u8A55\u4FA1\uFF1A").concat(value.defense_review, " </p>\n                </div>\n                </div>\n                <div class = \"reason\">\n                <p>\u8A55\u4FA1\u7406\u7531\uFF1A").concat(value.content, "</p>\n                </div>\n                <hr>\n                <div class=\"poster-content\">\n                <p class=\"poster\">\u6295\u7A3F\u8005\uFF1A<img src = \"").concat(value.user.image, "\"  class=\"user-image\">").concat(value.user.name, " </p>\n                <p>\u6295\u7A3F\u8005\u306E\u304A\u6C17\u306B\u5165\u308A\u306E\u30C1\u30FC\u30E0\uFF1A<img src=\"").concat(value.user.team.image, "\"class=\"team-image\"> ").concat(value.user.team.state_name, " ").concat(value.user.team.name, "</p>\n                <p>\u3044\u3044\u306D\u6570\uFF1A").concat(value.likes_count, " \u3044\u3044\u306D</p>\n                <p>\u6295\u7A3F\u65E5\u4ED8\uFF1A").concat(value.created_at, "</p>\n                <a href=\"/posts/").concat(value.id, "\"class=\"posts_info\"><i class=\"fa-solid fa-angles-right\"></i>    \u6295\u7A3F\u8A73\u7D30</a>\n                <a href=\"/players/").concat(value.player_id, "\" class=\"players_info\"><i class=\"fa-solid fa-user\"></i>    \u9078\u624B\u8A73\u7D30</a>\n                </div>\n                <hr>");
            $(".posts").append(user);
          }
        });
      } else {
        var notUser = "\n            <p>\u73FE\u5728\u6295\u7A3F\u306F\u3054\u3056\u3044\u307E\u305B\u3093\u3002</p>\n            ";
        $(".posts").append(notUser);
      }
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