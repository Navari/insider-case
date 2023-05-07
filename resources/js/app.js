require('./bootstrap');
window.$ = window.jQuery = require('jquery');


$(document).ready(function () {
    if ($('#session-alert').length) {
        setTimeout(function () {
            $("#session-alert").fadeOut(2000);
        }, 3000);
    }
});
