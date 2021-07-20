/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/stocks.js ***!
  \********************************/
$(document).ready(function () {
  if ($('#armeRadio').is(':checked')) {
    $('#armeDiv').show();
    $('#produitDiv').hide();
    $('#produitDiv option[value="default"]').prop('selected', true);
  } else {
    $('#produitDiv').show();
    $('#armeDiv').hide();
    $('#armeDiv option[value="default"]').prop('selected', true);
  }

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