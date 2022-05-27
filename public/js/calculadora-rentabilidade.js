/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/calculadora-rentabilidade.js ***!
  \***************************************************/
var CalculadoraApp = angular.module('CalculadoraApp', []);
CalculadoraApp.controller('RentabilidadeController', function ($scope, $http) {
  $scope.valorInicial = 1000;
  $scope.valorFinal = 2000;
  $scope.prazo = 60;
  $scope.di = jQuery('#default-di').val();
  $scope.ir = true;
  $scope.result = {
    'ir': '0',
    'pre': '0',
    'pos': '0'
  };

  $scope.calculate = function () {
    var valorInicial = sanitizeFloat($scope.valorInicial);
    var valorFinal = sanitizeFloat($scope.valorFinal);
    var prazo = sanitizeInt($scope.prazo);
    var di = sanitizeFloat($scope.di);
    var faixaIr = 0;

    if ($scope.ir) {
      if (prazo < 6) {
        faixaIr = 22.5;
      } else if (prazo < 12) {
        faixaIr = 20;
      } else if (prazo < 24) {
        faixaIr = 17.5;
      } else {
        faixaIr = 15;
      }

      var valorFinal = valorInicial + (valorFinal - valorInicial) / (1 - faixaIr / 100);
    }

    var taxaMensal = math.pow(valorFinal / valorInicial, 1 / prazo);
    var taxaAnual = math.pow(taxaMensal, 12);
    var taxaAnualFull = (taxaAnual - 1) * 100;
    var taxaPosFull = taxaAnualFull / di * 100;
    $scope.result.valorBruto = math.format(valorFinal, {
      notation: 'fixed',
      precision: 2
    });
    $scope.result.pre = math.format(taxaAnualFull, {
      notation: 'fixed',
      precision: 2
    });
    $scope.result.pos = math.format(taxaPosFull, {
      notation: 'fixed',
      precision: 2
    });
    $scope.result.ir = faixaIr;
  };

  $scope.calculate();
});

function sanitizeFloat(value) {
  if (typeof value === 'string') {
    value = value.replace('.', '');
    value = value.replace(',', '.');
    value = parseFloat(value);
  }

  return value;
}

function sanitizeInt(value) {
  if (typeof value === 'string') {
    value = parseInt(value);
  }

  return value;
}
/******/ })()
;