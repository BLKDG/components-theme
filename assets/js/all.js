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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./components/footer/_footer.scss":
/*!****************************************!*\
  !*** ./components/footer/_footer.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/css-loader/index.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: Undefined variable.\n  ╷\n2 │     border-top: 1px solid $gray;\n  │                           ^^^^^\n  ╵\n  /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/components/footer/_footer.scss 2:24  root stylesheet\n    at runLoaders (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/webpack/lib/NormalModule.js:316:20)\n    at /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/loader-runner/lib/LoaderRunner.js:367:11\n    at /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/loader-runner/lib/LoaderRunner.js:233:18\n    at context.callback (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\n    at render (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass-loader/dist/index.js:73:7)\n    at Function.call$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:54337:16)\n    at _render_closure1.call$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:33509:12)\n    at _RootZone.runBinary$3$3 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:19817:18)\n    at _RootZone.runBinary$3 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:19821:19)\n    at _FutureListener.handleError$1 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18286:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18574:40)\n    at Object._Future__propagateToListeners (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3484:88)\n    at _Future._completeError$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18410:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:17809:12)\n    at Object._asyncRethrow (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3240:17)\n    at /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:10537:20\n    at _wrapJsFunctionForAsync_closure.$protected (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3263:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:17830:12)\n    at _awaitOnObject_closure0.call$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:17822:25)\n    at _RootZone.runBinary$3$3 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:19817:18)\n    at _RootZone.runBinary$3 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:19821:19)\n    at _FutureListener.handleError$1 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18286:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18574:40)\n    at Object._Future__propagateToListeners (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3484:88)\n    at _Future._completeError$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18410:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:17809:12)\n    at Object._asyncRethrow (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3240:17)\n    at /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:12240:20\n    at _wrapJsFunctionForAsync_closure.$protected (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3263:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:17830:12)\n    at _awaitOnObject_closure0.call$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:17822:25)\n    at _RootZone.runBinary$3$3 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:19817:18)\n    at _RootZone.runBinary$3 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:19821:19)\n    at _FutureListener.handleError$1 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18286:19)\n    at _Future__propagateToListeners_handleError.call$0 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18574:40)\n    at Object._Future__propagateToListeners (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3484:88)\n    at _Future._completeError$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:18410:9)\n    at _AsyncAwaitCompleter.completeError$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:17809:12)\n    at Object._asyncRethrow (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3240:17)\n    at /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:44928:20\n    at _wrapJsFunctionForAsync_closure.$protected (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:3263:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/sass/sass.dart.js:17830:12)");

/***/ }),

/***/ "./components/header/header.js":
/*!*************************************!*\
  !*** ./components/header/header.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

;

(function ($) {
  $(document).ready(function () {
    console.log('header.js loading to all.js');
    $('#mobile-menu').click(function () {
      $(this).toggleClass('open');
      $('.mobile-menu').fadeToggle();
      $('.utility-menu').fadeToggle();
    });
  });
  $(window).load(function () {});
  $(window).resize(function () {});
  /**
   * Optional Pinned Header
   */

  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();

    if (scroll > 84) {
      $('header').addClass('scroll');
    } else {
      $('header').removeClass('scroll');
    }
  });
})(jQuery);

/***/ }),

/***/ 0:
/*!****************************************************************************!*\
  !*** multi ./components/header/header.js ./components/footer/_footer.scss ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/components/header/header.js */"./components/header/header.js");
module.exports = __webpack_require__(/*! /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/components/footer/_footer.scss */"./components/footer/_footer.scss");


/***/ })

/******/ });