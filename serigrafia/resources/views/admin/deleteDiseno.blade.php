@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz</h2>
    </div>
    <div class="titulo_cata">
        <h1 class="titulo-2">Diseños</h1>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<center>
  <form action="{{route('catalog.enviarDiseno')}}" method="post">
        @csrf
          <div class="w-full max-w-xs">
            <form class="bg-whtie shadow-md rounded px-8 pt-6 pb-8 mb-4">
              <div class="mb-4, text-center">
                <label class="font-serif text-lg text-gray-800 text-center">
                  ¿Estas seguro de eliminar este Diseño?
                </label>
              </div>

              <div class="text-center">
                <img src=https://www.serigrafiadf.com/wp-content/uploads/2017/11/Outsourcing-en-disen%CC%83os-de-playeras-parte-2-serigrafia-ink-works.png>
              </div>

              <div class="mb-6, text-center">
                <label class="font-serif text-lg text-gray-800 text-center">
                Nombre del Catalogo al que pertenece el Diseño: 
                </label>
                <p></p>
                <label class="font-serif text-lg text-blue-800 text-center">{{$catalog->Categoria}}</label>
              </div>
              
              <input type="hidden" name="iddiseno" id="iddiseno" value="{{$desing->id}}" class="input_iddiseno">
              <input type="hidden" name="estado" id="estado" value = 0 class="input_estado">
              <input type="hidden" name="textura" id="textura" value="{{$desing->Textura}}" class="input_Textura">
              <input type="hidden" name="foto" id="foto" value="{{$desing->Foto}}" class="input_Foto">
              

              <div class="mb-6, text-center">
                    <div class="font-serif text-lg text-gray-800">
                        <label for="categoria">ID del Diseño: </label>
                        <p> </p>
                        <label class="font-serif text-lg text-blue-800 text-center">{{$desing->id}}</label>
                    </div>
              </div>            

              <div class="mb-4, text-center">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                  ¿Cual es el motivo de la baja del Diseño?
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="razon" id="razon">
              </div>

              <div class="mb-6">
                <p class="text-red-500 text-xs italic"></p>
              </div>

              <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Enviar</button>
                </button>
      
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{route('catalog.dashboard')}}">
                  Cancelar
                </a>
              </div>
            </form>
          </div>     
  </form>
</center>
@endsection