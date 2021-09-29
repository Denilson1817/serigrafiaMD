@extends('layouts.app')
@section('content')
<div class="eliminar_Diseño_ w-full max-w-xs" id="ElimDiseño" hidden>
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
          <div class="mb-4, text-center">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="motivo">
              ¿Cual es el motivo de la baja del catálogo?
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
               Enviar
            </a>

            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="Inicio.html">
              Cancelar
            </a>
          </div>
        </form>
      </div>
@endforeach
@endsection