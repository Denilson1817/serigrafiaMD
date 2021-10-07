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

<body>
    <div class="container mx-auto">
        <br>
        <label class="pl-16">Cliente</label>  
        <input type="text" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="cliente" id="cliente" placeholder="Nombre Cliente">


        <label class="pl-16">Fecha de compra</label>
        <input type="date" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="fecha" id="fecha" placeholder="DD/MM/YY">
        

        <div class="inline-block pl-32" >
            <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                Buscar
            </a>
            <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                Limpiar
            </a>
            <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                Regresar
            </a>
        </div>

        <br>
        <br>
        <br>

        <label class="px-20 text-black font-weight"><b>Cliente</b></label>
        <label class="px-20 text-black font-weight" ><b>Fecha entrega</b></label>
        <label class="px-20 text-black font-weight"><b>Número de productos</b></label>
        <label class="px-20 text-black font-weight"><b>Precio total</b></label>

        <br>

        <label class="pl-16">Some Text</label>
        <label class="pl-40">Some Text</label>
        <label class="pl-48">Some Text</label>
        <label class="pl-56 pr-32">Some Text</label>
        <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
            Modificar
        </button>

        <br>
        <br>
        <br>

        <label class="pl-16">Some Text</label>
        <label class="pl-40">Some Text</label>
        <label class="pl-48">Some Text</label>
        <label class="pl-56 pr-32">Some Text</label>
        <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
            Modificar
        </button>



    </div>
</body>

