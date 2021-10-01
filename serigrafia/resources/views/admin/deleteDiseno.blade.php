@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz</h2>
    </div>
    <div class="titulo_cata">
        <h1 class="titulo-2">Catálogos</h1>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<center>
<form action="{{route('catalog.update')}}" method="post">
    @csrf
    <div class="w-full max-w-xs">
        <form class="bg-whtie shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <div class="mb-4, text-center">
            <label class="font-serif text-lg text-gray-800 text-center" for="username">
              ¿Estas seguro de eliminar este diseño?
            </label>
          </div>

          <div class="text-center">
            <img src="Catalogo.jpg">
          </div>

          <div class="mb-6, text-center">
            <label class="font-serif text-lg text-gray-800 text-center" for="password">
              Nombre del diseño
            </label>
            <p></p>
            <label class="font-serif text-lg text-gray-800 text-center">{{$catalog->Nombre}}</label>
          </div>

          <div class="mb-6, text-center">
                <input type="hidden" name="id_catalog" id="id_catalog" value="{{$catalog->id}}">
                <div class="col-span-6 md:col-span-3">
                    <label for="categoria">Categoría del diseño: </label>
                    <p> </p>
                    <label class="font-serif text-lg text-gray-800 text-center">{{$catalog->Categoria}}</label>
                </div>
          </div>            


          <div class="mb-4, text-center">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="motivo">
              ¿Cual es el motivo de la baja del diseño?
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="motivo" type="text" placeholder="Motivo...">
          </div>
          <div class="mb-6">
            <p class="text-red-500 text-xs italic"></p>
          </div>
          <div class="flex items-center justify-between">
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                </div>
              </div>
          </div>
          <div class="flex items-center justify-between">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="MotivoCatalogo.html">
               Enviaar
            </a>

            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{route('catalog.dashboard')}}">
              Cancelar
            </a>

          </div>
        </form>
      </div>  
</center>

@endsection