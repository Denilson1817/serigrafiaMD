require('./bootstrap');

import Alpine from 'alpinejs';

Alpine.start();
window.Alpine = Alpine;
window.Swal = require('sweetalert2')

$(document).ready(function () {
    
    $(document).on('click', '#newCatalog', function (e) {
        document.getElementById("crearNuevoC").style.display="block";
    });

    $(document).on('click', '#elimi_catalogo', function(e){
        document.getElementById("ElimCatalogo").hidden=false;
    });

    $(document).on('click', '#bntEdit', function(e){
        document.getElementById("editDisenio").hidden=false;
    });
});