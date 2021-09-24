@section('content')

    <header class="interfaz_Principal">
        <h2 class="titulo-1">Serigrafía</h2>
        <h1 class="titulo-2">Catálogos</h1>
    </header class="interfaz_Principal">
    <div class="nuevo-catalogo">
        <img src="imagenes/photo-icon.png" alt="nuevo_catalogo" class="imagen-catalogo">
        <a href="javascript:crearNuevoCatalogo()" class="link_crear_catalogo">Nuevo catálogo</a>
    </div>
    <div class="crear_nuevo_catalogo" id="crearNuevoC">
        <header class="vent_crear_catalogo">
            <h3 class="etiq_ingresar">Ingresar Datos</h3>
            <a href="javascript:cerrarImgNueCat()" class="imagen_cerrar"><img src="error.png" alt="cerrar"></a>
            <!--<div class="imagen_cerrar"></div>-->
        </header>
        <form action="">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"><br>
            <label for="categoria">Categoría: </label>
            <input type="text" name="categoria" id="categoria"><br>
            <label for="foto">Foto: </label>
            <input type="file" name="foto" id="foto"><br>
            <input type="submit">
            
        </form>
    </div>
