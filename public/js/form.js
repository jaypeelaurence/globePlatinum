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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(4);


/***/ }),
/* 4 */
/***/ (function(module, exports) {

$(document).ready(function () {
	$("form").children('button').prop('disabled', true);
	$("form").children('button').addClass('disable');

	var $validMobileNUmber = 0;
	var $valid = 0;
	var $question7 = 0;
	var $question1 = 0;
	var $question2 = 0;

	$("input#mobileNumber").keypress(function (char) {
		var charCode = char.which ? char.which : char.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
		return true;
	});

	$('input#mobileNumber').change(function () {
		if ($(this).val().length == 7) {
			$validMobileNUmber = 1;

			$("div.error").remove();
		} else {
			$validMobileNUmber = 0;

			$("div#mobileNumber").append("<div class='error-display'>incorrect mobile number format.</div>");
		}
	});

	$("body").click(function (event) {
		$('input#question1').change(function () {
			$("form").children('button').addClass('disable');

			$valid = 0;
			$question1 = 0;
			$question2 = 0;

			$('div#question2').css('display', 'none');

			$('div#question3').css('display', 'none');
			$('div#question4').css('display', 'none');
			$('div#question6').css('display', 'none');

			$('input#question2').prop('checked', false);
			$('textarea#question3').val("");
			$('input#question4').prop('checked', false);
			$('textarea#question5').val("");
			$('input#question6').prop('checked', false);
			$('textarea#question7').val("");
			$('textarea#question7').prop('disabled', true);

			if ($(this).val() == "No") {
				$('div#question6').css('display', 'block');
			} else {
				$('div#question2').css('display', 'block');
				$('div#question3').css('display', 'block');
				$('div#question4').css('display', 'block');
			}
		});

		if ($(event.target).closest('div#YES').length == 1) {

			// console.log($(event.target).attr('id'));

			if ($(event.target).attr('id') == "question2") {
				$question1 = 1;
			}

			if ($(event.target).attr('id') == "question4") {
				$question2 = 1;
			}

			if ($question1 == 1 && $question2 == 1) {
				$valid = 1;
			}

			console.log($valid);
		}

		$('input#question6').click(function () {
			$question7 = 0;

			if ($(this).val() == "Others") {
				$('textarea#question7').prop('disabled', false);
			} else {
				$('textarea#question7').prop('disabled', true);
			}
		});

		$('textarea#question7').change(function () {
			$valid = 0;

			if ($(this).val().length >= 1) {
				$valid = 1;
			}
		});

		if ($validMobileNUmber == 1 && $valid == 1) {
			$("form").children('button').prop('disabled', false);
			$("form").children('button').removeClass('disable');
		} else {
			$("form").children('button').prop('disabled', true);
			$("form").children('button').addClass('disable');
		}
	});
});

/***/ })
/******/ ]);