@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <title>Agregar cliente</title>
    </div>
    <div class="titulo_cata">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </div>
</header>
   

                    <!---No sé cual es la ruta-- --->
<form action ="{{route('clientes.store')}}" method="post" enctype="multipart/form-data" >
@csrf

    <!-- This example requires Tailwind CSS v2.0+ -->
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden"></div>
                <h1 style="font-size: 30px;" class="font-extrabold  pl-4 text-white" >Agregar Cliente</h1>
            </div>   
        </div>
    </nav>
        
    
  <div class=" flex flex-wrap ">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Nombre
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nombre" name="nombre"  type="text" placeholder="Nombre" > 
      
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Email
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="correoElectronico" name="correoElectronico"  type="text" placeholder="Email" >
    </div>
  </div>
  <br>
  <div class="flex flex-wrap">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Domicilio
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="domicilio" name="domicilio" type="text" placeholder="Domicilio" >
      
    </div>
    <br>
    <div class=" w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Teléfono
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="telefono" name="telefono" type="text" placeholder="Teléfono">
    </div>
  </div>
  <br>


<div class="pl-4">

    <input type="submit" name="Agregar" id="Agregar" value="Agregar" class=" bg-green-500 hover:bg-blue-400 text-white font-bold py-2 px-8 border-b-4 border-green-700 hover:border-blue-500 rounded ">
            
</div>
  
</form> 

@endsection