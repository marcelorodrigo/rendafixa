/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/calculadora.js":
/*!*************************************!*\
  !*** ./resources/js/calculadora.js ***!
  \*************************************/
/***/ (() => {

$().ready(function () {
  function savePreferences() {
    var preferences = {
      amount: $("#amount").val(),
      period: $("#period").val(),
      taxcdb: $("#cdb").val(),
      taxlci: $("#lci").val(),
      _token: $("input[name='_token']").val()
    };
    $.ajax({
      type: 'POST',
      url: window.location.protocol + "//" + window.location.host + '/preferences',
      data: preferences,
      error: function error(_jqXHR, _textStatus, errorThrown) {
        console.log('Error saving preferences:' + errorThrown);
      },
      async: true
    });
  }

  function getIndexPoupanca() {
    return parseFloat($("#poupanca").val()) / 100 + 1;
  }

  function getIndexCDB() {
    var taxa = parseFloat($("#cdb").val()) / 100;
    var di = parseFloat($("#di").val());
    return Math.pow(taxa * di / 100 + 1, 1 / 12);
  }

  function getIndexTDSELIC() {
    var selic = parseFloat($("#selic").val());
    return Math.pow(selic / 100 + 1, 1 / 12);
  }

  function getIndexLCI() {
    var taxa = parseFloat($("#lci").val()) / 100;
    var di = parseFloat($("#di").val());
    return Math.pow(taxa * di / 100 + 1, 1 / 12);
  }

  function getIndexDI() {
    return $("#di").val();
  }

  function getIndexSELIC() {
    return $("#selic").val();
  }

  function getIndexIR() {
    var periodo = $("#period").val();

    if (periodo <= 6) {
      return 22.5;
    } else if (periodo <= 12) {
      return 20;
    } else if (periodo <= 24) {
      return 17.5;
    } else {
      return 15;
    }
  }

  function getB3TaxOverInvestment(amount) {
    var amountNoTax = 10000;

    if (amount <= amountNoTax) {
      return 0;
    }

    var period = $("#period").val();
    var index = Math.ceil(period / 6) * (0.003 / 2);
    return (amount - amountNoTax) * index;
  }

  function jurosCompostos(valor, taxa, periodo) {
    return valor * Math.pow(taxa, periodo) - valor;
  }

  function showResults(save) {
    var investimento = $("#amount").val();
    var periodo = $("#period").val();
    var result_poupanca = jurosCompostos(investimento, getIndexPoupanca(), periodo);
    var result_cdb = jurosCompostos(investimento, getIndexCDB(), periodo);
    var index_ir = getIndexIR();
    var ir_cdb = result_cdb * (index_ir / 100);
    var result_lci = jurosCompostos(investimento, getIndexLCI(), periodo);
    var result_tdselic = jurosCompostos(investimento, getIndexTDSELIC(), periodo);
    var ir_tdselic = result_tdselic * (index_ir / 100);
    var b3_tdselic = getB3TaxOverInvestment(investimento);
    var liquido_tdselic = result_tdselic - ir_tdselic - b3_tdselic;
    changeBar('bar-poupanca', result_poupanca.toFixed(2));
    changeBar('bar-cdb', (result_cdb - ir_cdb).toFixed(2));
    changeBar('bar-lci', result_lci.toFixed(2));
    changeBar('bar-tdselic', liquido_tdselic.toFixed(2));
    $("#result-poupanca").find('span.liquido').html(result_poupanca.toFixed(2));
    var resultCDBElement = $("#result-cdb");
    resultCDBElement.find('span.total').html(result_cdb.toFixed(2));
    resultCDBElement.find('span.ir').html(ir_cdb.toFixed(2) + "  <span class='badge'>" + index_ir + "%</span>");
    resultCDBElement.find('span.liquido').html((result_cdb - ir_cdb).toFixed(2));
    $("#result-lci").find('span.liquido').html(result_lci.toFixed(2));
    var resultTDSelicElement = $("#result-tdselic");
    resultTDSelicElement.find('span.total').html(result_tdselic.toFixed(2));
    resultTDSelicElement.find('span.ir').html(ir_tdselic.toFixed(2) + "  <span class='badge'>" + index_ir + "%</span>");
    resultTDSelicElement.find('span.bvmf').html(b3_tdselic.toFixed(2));
    resultTDSelicElement.find('span.liquido').html(liquido_tdselic.toFixed(2));

    if (save) {
      savePreferences();
    }
  }

  function changeBar(bar, value) {
    var $bar = $('#' + bar);
    var percent = (value / $("#amount").val() * 100).toFixed(1);
    $bar.width(percent * 300 / $("#period").val());
    $bar.html(percent + '%');
  }

  showResults(false);
  $(".form-control").on('blur change', function () {
    showResults(true);
  });
});

/***/ }),

/***/ "./resources/css/bootstrap.min.css":
/*!*****************************************!*\
  !*** ./resources/css/bootstrap.min.css ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/bootstrap-theme.min.css":
/*!***********************************************!*\
  !*** ./resources/css/bootstrap-theme.min.css ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/rendafixa.css":
/*!*************************************!*\
  !*** ./resources/css/rendafixa.css ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/calculadora": 0,
/******/ 			"css/rendafixa": 0,
/******/ 			"css/bootstrap-theme.min": 0,
/******/ 			"css/bootstrap.min": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/rendafixa","css/bootstrap-theme.min","css/bootstrap.min"], () => (__webpack_require__("./resources/js/calculadora.js")))
/******/ 	__webpack_require__.O(undefined, ["css/rendafixa","css/bootstrap-theme.min","css/bootstrap.min"], () => (__webpack_require__("./resources/css/bootstrap.min.css")))
/******/ 	__webpack_require__.O(undefined, ["css/rendafixa","css/bootstrap-theme.min","css/bootstrap.min"], () => (__webpack_require__("./resources/css/bootstrap-theme.min.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/rendafixa","css/bootstrap-theme.min","css/bootstrap.min"], () => (__webpack_require__("./resources/css/rendafixa.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;