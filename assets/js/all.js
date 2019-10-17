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

/***/ "./assets/scss/styles.scss":
/*!*********************************!*\
  !*** ./assets/scss/styles.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/css-loader/index.js):\nModuleNotFoundError: Module not found: Error: Can't resolve '../vendor/font-awesome/web-fonts-with-css/vendor/font-awesome/web-fonts-with-css/webfonts/fa-brands-400.eot' in '/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/assets/scss'\n    at factory.create (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/webpack/lib/Compilation.js:925:10)\n    at factory (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/webpack/lib/NormalModuleFactory.js:401:22)\n    at resolver (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/webpack/lib/NormalModuleFactory.js:130:21)\n    at asyncLib.parallel (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/webpack/lib/NormalModuleFactory.js:224:22)\n    at /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/neo-async/async.js:2830:7\n    at /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/neo-async/async.js:6877:13\n    at normalResolver.resolve (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/webpack/lib/NormalModuleFactory.js:214:25)\n    at doResolve (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/Resolver.js:213:14)\n    at hook.callAsync (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/Resolver.js:285:5)\n    at _fn0 (eval at create (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at resolver.doResolve (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/UnsafeCachePlugin.js:44:7)\n    at hook.callAsync (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/Resolver.js:285:5)\n    at _fn0 (eval at create (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at hook.callAsync (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/Resolver.js:285:5)\n    at _fn0 (eval at create (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:27:1)\n    at resolver.doResolve (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/DescriptionFilePlugin.js:67:43)\n    at hook.callAsync (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/Resolver.js:285:5)\n    at _fn43 (eval at create (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:16:1)\n    at hook.callAsync (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/Resolver.js:285:5)\n    at _fn0 (eval at create (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:27:1)\n    at resolver.doResolve (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/DescriptionFilePlugin.js:67:43)\n    at hook.callAsync (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/Resolver.js:285:5)\n    at _fn1 (eval at create (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:16:1)\n    at hook.callAsync (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/Resolver.js:285:5)\n    at _fn0 (eval at create (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/tapable/lib/HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at fs.stat (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/DirectoryExistsPlugin.js:27:15)\n    at process.nextTick (/Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/node_modules/enhanced-resolve/lib/CachedInputFileSystem.js:85:15)\n    at process._tickCallback (internal/process/next_tick.js:61:11)");

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
/*!*********************************************************************!*\
  !*** multi ./components/header/header.js ./assets/scss/styles.scss ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/components/header/header.js */"./components/header/header.js");
module.exports = __webpack_require__(/*! /Users/tylershockey/WPprojects/components/wp-content/themes/components-theme/assets/scss/styles.scss */"./assets/scss/styles.scss");


/***/ })

/******/ });