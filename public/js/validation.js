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
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

$(function () {
    $('#send').on("click", validateAll);
    $('#name').on("change", validateName);
    $('#age').on("change", validateAge);
});

function validateAll(e) {

    e.preventDefault();
    var button = $('button');
    button.prop("disabled", true);

    var nombreCorrecto = validateName();
    var edadCorrecta = validateAge();

    if (nombreCorrecto && edadCorrecta) {
        $('#formulario').submit();
    }

    button.prop("disabled", false);
}

function validateName() {

    var regex = /[a-zA-Z]+/;
    var name = $('#name').val();
    var input = $('#name');
    var error = $('#errorName');

    if (!name.match(regex) || name === "" || name.length < 4) {
        error.removeClass("is-valid");
        input.removeClass("is-valid");
        error.html("El formato de nombre es incorrecto. Mínimo 4 caracteres").addClass("text-danger");
        input.addClass("is-invalid");
    } else {
        error.removeClass("text-danger");
        input.removeClass("is-invalid");
        error.html("");
        input.addClass("is-valid");
    }
}

function validateAge() {

    var edad = $('#age').val();
    var error = $('#errorAge');
    var regex = /[0-9]+/;

    if (edad.match(regex) >= 18) {
        error.html("");
        edad.addClass("valido");
    } else {
        edad.removeClass("valido");
        edad.addClass('error');
        edad.html("");
        error.html("No eres mayor de edad").addClass("bg-danger");
    }
}

function validateNick() {
    var regex = /[a-zA-Z]+/;
    var nick = $('#nick').val();
    var input = $('#nick');
    var error = $('#errorNick');

    if (!nick.match(regex) || nick === "" || nick.length < 4) {
        error.removeClass("is-valid");
        input.removeClass("is-valid");
        error.html("El formato de nombre es incorrecto. Mínimo 4 caracteres").addClass("text-danger");
        input.addClass("is-invalid");
    } else {
        error.removeClass("text-danger");
        input.removeClass("is-invalid");
        error.html("");
        input.addClass("is-valid");
    }
}

function validateEmail() {
    var email = $('#email');
    var error = $('#errorEmail');
}

/***/ })

/******/ });