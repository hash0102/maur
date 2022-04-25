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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/jQueryCreateRanking.js":
/*!*********************************************!*\
  !*** ./resources/js/jQueryCreateRanking.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var num = 0;
$("#pg_team_select").on('change', function () {
  var pgTeamSelectId = $("#pg_team_select").val();

  if (pgTeamSelectId == "") {
    $('.pg_player2').hide();
  } else {
    $('.pg_player2').show();
    $.ajax({
      type: "get",
      url: "/ranking/create/pg/teams/" + pgTeamSelectId,
      dataType: "json"
    }).done(function (res) {
      //console.log(res);
      $('.pg_player_team3').empty();
      var select_tag = "\n         <option value = \"\">\u9078\u624B\u3092\u9078\u629E\u3057\u3066\u304F\u3060\u3055\u3044</option>\n         ";
      $(".pg_player_team3").html(select_tag);
      $.each(res.pg_player_select, function (index, value) {
        var pg_player_by_team = "\n         <option value=\"".concat(value.id, "\">").concat(value.first_name, " ").concat(value.last_name, "</option>\n         ");
        $(".pg_player_team3").append(pg_player_by_team);
      });
    }).fail(function (error) {// alert(error.statusText);
    });
  }
});
$("#pg_player_id").on('change', function () {
  var SelectId = $("#pg_player_id").val();
  $.ajax({
    type: "get",
    url: "/ranking/create/pg/players/" + SelectId,
    dataType: "json"
  }).done(function (res) {
    $.each(res.pg_player_select_by_id, function (index, value) {
      console.log(value);
      var pg_player_by_id = "\n         \n         <input type=\"hidden\" name=\"positions_array[]\" value=\"".concat(value.position, "\">\n         ");
      $(".pg_player_team3").append(pg_player_by_id);
    });
  }).fail(function (error) {// alert(error.statusText);
  });
});
$("#sg_team_select").on('change', function () {
  var sgTeamSelectId = $("#sg_team_select").val();

  if (sgTeamSelectId == "") {
    $('.sg_player2').hide();
  } else {
    $('.sg_player2').show();
    $.ajax({
      type: "get",
      url: "/ranking/create/sg/teams/" + sgTeamSelectId,
      dataType: "json"
    }).done(function (res) {
      $('.sg_player_team3').empty();
      var select_tag = "\n         <option value = \"\">\u9078\u624B\u3092\u9078\u629E\u3057\u3066\u304F\u3060\u3055\u3044</option>\n         ";
      $(".sg_player_team3").html(select_tag);
      $.each(res.sg_player_select, function (index, value) {
        var sg_player_by_team = "\n         \n         <option value=\"".concat(value.id, "\">").concat(value.first_name, " ").concat(value.last_name, "</option>\n         ");
        $(".sg_player_team3").append(sg_player_by_team);
      });
    }).fail(function (error) {// alert(error.statusText);
    });
  }
});
$("#sg_player_id").on('change', function () {
  var SelectId = $("#sg_player_id").val();
  $.ajax({
    type: "get",
    url: "/ranking/create/sg/players/" + SelectId,
    dataType: "json"
  }).done(function (res) {
    $.each(res.sg_player_select_by_id, function (index, value) {
      console.log(value);
      var sg_player_by_id = "\n         \n         <input type=\"hidden\" name=\"positions_array[]\" value=\"".concat(value.position, "\">\n         ");
      $(".sg_player_team3").append(sg_player_by_id);
    });
  }).fail(function (error) {// alert(error.statusText);
  });
});
$("#sf_team_select").on('change', function () {
  var sfTeamSelectId = $("#sf_team_select").val();

  if (sfTeamSelectId == "") {
    $('.sf_player2').hide();
  } else {
    $('.sf_player2').show();
    $.ajax({
      type: "get",
      url: "/ranking/create/sf/teams/" + sfTeamSelectId,
      dataType: "json"
    }).done(function (res) {
      $('.sf_player_team3').empty();
      var select_tag = "\n         <option value = \"\">\u9078\u624B\u3092\u9078\u629E\u3057\u3066\u304F\u3060\u3055\u3044</option>\n         ";
      $(".sf_player_team3").html(select_tag);
      $.each(res.sf_player_select, function (index, value) {
        var sf_player_by_team = "\n         \n         <option value=\"".concat(value.id, "\">").concat(value.first_name, " ").concat(value.last_name, "</option>\n         ");
        $(".sf_player_team3").append(sf_player_by_team);
      });
    }).fail(function (error) {// alert(error.statusText);
    });
  }
});
$("#sf_player_id").on('change', function () {
  var SelectId = $("#sf_player_id").val();
  $.ajax({
    type: "get",
    url: "/ranking/create/sf/players/" + SelectId,
    dataType: "json"
  }).done(function (res) {
    $.each(res.sf_player_select_by_id, function (index, value) {
      console.log(value);
      var sf_player_by_id = "\n         \n         <input type=\"hidden\" name=\"positions_array[]\" value=\"".concat(value.position, "\">\n         ");
      $(".sf_player_team3").append(sf_player_by_id);
    });
  }).fail(function (error) {// alert(error.statusText);
  });
});
$("#pf_team_select").on('change', function () {
  var pfTeamSelectId = $("#pf_team_select").val();

  if (pfTeamSelectId == "") {
    $('.pf_player2').hide();
  } else {
    $('.pf_player2').show();
    $.ajax({
      type: "get",
      url: "/ranking/create/pf/teams/" + pfTeamSelectId,
      dataType: "json"
    }).done(function (res) {
      $('.pf_player_team3').empty();
      var select_tag = "\n         <option value = \"\">\u9078\u624B\u3092\u9078\u629E\u3057\u3066\u304F\u3060\u3055\u3044</option>\n         ";
      $(".pf_player_team3").html(select_tag);
      $.each(res.pf_player_select, function (index, value) {
        var pf_player_by_team = "\n         \n         <option value=\"".concat(value.id, "\">").concat(value.first_name, " ").concat(value.last_name, "</option>\n         ");
        $(".pf_player_team3").append(pf_player_by_team);
      });
    }).fail(function (error) {// alert(error.statusText);
    });
  }
});
$("#pf_player_id").on('change', function () {
  var SelectId = $("#pf_player_id").val();
  $.ajax({
    type: "get",
    url: "/ranking/create/pf/players/" + SelectId,
    dataType: "json"
  }).done(function (res) {
    $.each(res.pf_player_select_by_id, function (index, value) {
      console.log(value);
      var pf_player_by_id = "\n         \n         <input type=\"hidden\" name=\"positions_array[]\" value=\"".concat(value.position, "\">\n         ");
      $(".pf_player_team3").append(pf_player_by_id);
    });
  }).fail(function (error) {// alert(error.statusText);
  });
});
$("#c_team_select").on('change', function () {
  var pfTeamSelectId = $("#c_team_select").val();

  if (pfTeamSelectId == "") {
    $('.c_player2').hide();
  } else {
    $('.c_player2').show();
    $.ajax({
      type: "get",
      url: "/ranking/create/c/teams/" + pfTeamSelectId,
      dataType: "json"
    }).done(function (res) {
      $('.c_player_team3').empty();
      var select_tag = "\n         <option value = \"\">\u9078\u624B\u3092\u9078\u629E\u3057\u3066\u304F\u3060\u3055\u3044</option>\n         ";
      $(".c_player_team3").html(select_tag);
      $.each(res.c_player_select, function (index, value) {
        var c_player_by_team = "\n         \n         <option value=\"".concat(value.id, "\">").concat(value.first_name, " ").concat(value.last_name, "</option>\n         ");
        $(".c_player_team3").append(c_player_by_team);
      });
    }).fail(function (error) {// alert(error.statusText);
    });
  }
});
$("#c_player_id").on('change', function () {
  var SelectId = $("#c_player_id").val();
  $.ajax({
    type: "get",
    url: "/ranking/create/c/players/" + SelectId,
    dataType: "json"
  }).done(function (res) {
    $.each(res.c_player_select_by_id, function (index, value) {
      console.log(value);
      var c_player_by_id = "\n         \n         <input type=\"hidden\" name=\"positions_array[]\" value=\"".concat(value.position, "\">\n         ");
      $(".c_player_team3").append(c_player_by_id);
    });
  }).fail(function (error) {// alert(error.statusText);
  });
});

/***/ }),

/***/ 7:
/*!***************************************************!*\
  !*** multi ./resources/js/jQueryCreateRanking.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/maur/resources/js/jQueryCreateRanking.js */"./resources/js/jQueryCreateRanking.js");


/***/ })

/******/ });