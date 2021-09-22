require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function crearNuevoCatalogo(){
    document.getElementById("crearNuevoC").style.display="block";
}

function cerrarImgNueCat(){
    document.getElementById("crearNuevoC").style.display="none";
}