/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/stocks.js ***!
  \********************************/
$(document).ready(function () {
  $('#produitDiv').hide();
  $('#armeRadio').click(function () {
    $('#armeDiv').show();
    $('#produitDiv').hide();
    $('#produitDiv option[value="default"]').prop('selected', true);
  });
  $('#produitRadio').click(function () {
    console.log('arme');
    $('#armeDiv').hide();
    $('#produitDiv').show();
    $('#armeDiv option[value="default"]').prop('selected', true);
  });
});
/******/ })()
;