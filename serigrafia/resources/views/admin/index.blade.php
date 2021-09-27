@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía</h2>
    </div>
    <div class="titulo_cata">
        <h1 class="titulo-2">Catálogos</h1>
    </div>
</header>

<div class="crear_nuevo_catalogo w-full max-w-lg" id="crearNuevoC">
    <div class="flex flex-wrap -mx-3 mb-6 text-black">
        <div class="w-2/3">
            <h3 class="text-xl">Ingresar Datos</h3>
        </div>
        <div class="w-1/3">
            <button class="bg-transparent" onclick="document.getElementById('crearNuevoC').style.display='none';" class="imagen_cerrar"><img src="imagenes/error.png" alt="cerrar"></button class="bg-transparent">
        </div>
        <form action="{{route('catalog.store')}}" method="post">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6 ">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 label_nombre">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white input_nombre">
                </div><br>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 label_categoria">
                    <label for="categoria">Categoría: </label>
                    <input type="text" name="categoria" id="categoria" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white input_categoria">
                </div><br>
                <h3 class="w-full text-xl">Agregar un diseño</h3>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 label_foto">
                    <label for="foto">Foto: </label>
                    <input type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white input_foto">
                </div><br>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 label_textura">
                    <label for="textura">Textura: </label>
                    <input type="text" name="textura" id="textura" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                </div><br>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 label_color">
                    <label for="color">Color: </label>
                    <input type="color" name="color" id="color" class="appearance-none block w-full text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                </div><br>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 label_dimensionX">
                    <label for="dimension_x">Dimensión X </label>
                    <input type="number" name="dimension_x" id="dimension_x" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                </div><br>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0 label_dimensionY">
                    <label for="dimension_y">Dimensión Y </label>
                    <input type="number" name="dimension_y" id="dimension_y" accept=".png, .jpg, .jpeg" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                </div><br>
                <div class="botones_crear_cata">
                    <input type="submit" value="Aceptar" class="crear_cata_enviar">
                    <input type="button" value="Cancelar" class="crear_cata_cancelar" onclick="document.getElementById('crearNuevoC').style.display='none';">
                </div>
            </div>
        </form>
        <button class="bg-gray-800 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Button
        </button>
    </div>
</div>

<div class="w-full max-w-xs">
        <form class="bg-whtie shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <div class="mb-4, text-center">
            <label class="font-serif text-lg text-gray-800 text-center" for="username">
              ¿Estas seguro de eliminar este diseño?
            </label>
          </div>

          <div class="text-center">
            <img src="Ejemplo.png">
          </div>

          <div class="mb-6, text-center">
            <label class="font-serif text-lg text-gray-800 text-center" for="password">
              Nombre del diseño
            </label>            
          </div>
          <div class="flex items-center justify-between">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="MotivoDiseño.html">
              Aceptar
           </a>

           <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="Inicio.html">
             Cancelar
           </a>
          </div>
        </form>
      </div>  

<div class="flex flex-wrap -mx-3 p-3 mb-6 text-black">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <div class="nuevo-catalogo">
            <img src="imagenes/photo-icon.png" alt="nuevo_catalogo" class="imagen-catalogo">
            <button id="newCatalog" class="link_crear_catalogo">Nuevo catálogo</button>
        </div>
    </div>
    @foreach(App\Models\Catalogo::get() as $catalog)
    <div class="w-full max-w-sm md:w-1/3 p-3 mb-6 md:mb-0">
        <div class="rounded overflow-hidden shadow-lg">
            <img class="w-full" src="https://v1.tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$catalog->Nombre}}</div>
            </div>
            <div class="px-6 pt-4 pb-2">
                <div class="flex flex-wrap -mx-3 mb-6 text-black">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <a class="bg-gray-600 hover:bg-gray-700 text-white hover:text-black font-semibold py-2 px-4 rounded shadow" onclick="document.getElementById('PreguntaCatalogo').style.display='none';">
                            Eliminar
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <a class="bg-blue-600 hover:bg-blue-700 text-white hover:text-black font-semibold py-2 px-4 rounded shadow" href="{{route('catalog.edit', $catalog->id)}}">
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection