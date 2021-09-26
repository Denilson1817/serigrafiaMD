require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    $(document).on('click', '#newCatalog', function (e) {
        document.getElementById("crearNuevoC").style.display="block";
    });
});