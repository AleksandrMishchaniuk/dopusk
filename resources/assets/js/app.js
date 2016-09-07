window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');
require('angular');

$( document ).ready(function() {
    console.log($.fn.tooltip.Constructor.VERSION);
});
