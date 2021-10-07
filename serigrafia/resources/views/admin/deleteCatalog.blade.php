@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz</h2>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<center>
  <form action="{{route('catalog.enviarCatalog')}}" method="post">
    @csrf
          <div class="w-full max-w-xs">
            <form class="bg-whtie shadow-md rounded px-8 pt-6 pb-8 mb-4">
              <div class="mb-4, text-center">
                <label class="font-serif text-lg text-black-800 text-center">
                  ¿Estas seguro de eliminar este catálogo?
                </label>
              </div>

              <div class="text-center">
                <img src=https://www.serigrafiadf.com/wp-content/uploads/2017/11/Outsourcing-en-disen%CC%83os-de-playeras-parte-2-serigrafia-ink-works.png>
              </div>

              <div class="mb-6, text-center">
                  <label class="font-serif text-lg text-black-800 text-center">
                    Nombre del catálogo
                  </label>
                    <br>
                  <label class="font-serif text-lg text-blue-800 text-center">{{$catalog->Nombre}}</label>

              </div>

              <!--Inputs que se mandaran al request-->
              <input type="hidden" name="nombre" id="nombre" value="{{$catalog->Nombre}}" class="input_nombre">
              <input type="hidden" name="idcatalogo" id="idcatalogo" value="{{$catalog->id}}" class="input_idcatalogo">
              <input type="hidden" name="estado" id="estado" value = 0 class="input_estado">
              <input type="hidden" name="categoria" id="categoria" value="{{$catalog->Categoria}}" class="input_categoria">
              

              <div class="mb-6, text-center">
                    <div class="font-serif text-lg text-black-800">
                        <label for="categoria">Categoría del catalogo: </label>
                        <br>
                        <label class="font-serif text-lg text-blue-800 text-center">{{$catalog->Categoria}}</label>
                    </div>
              </div>            


              <div class="mb-4, text-center">
                <label class="block text-black-800 text-sm font-bold mb-2">
                  ¿Cual es el motivo de la baja del catálogo?
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="razon" id="razon">
              </div>

              <br>

              <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                  Enviar</button>
      
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{route('catalog.dashboard')}}">
                  Cancelar
                </a>
              </div>
            </form>
          </div>
  </form>
</center>
@endsection