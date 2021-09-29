require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    $(document).on('click', '#newCatalog', function (e) {
        document.getElementById("crearNuevoC").style.display="block";
    });

    $(document).on('click', '#elimi_catalogo', function(e){
        document.getElementById("ElimCatalogo").hidden=false;
    });
});