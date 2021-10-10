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
        <label class="pl-16">Selecciona un producto</label>  
        <label class="pl-16"><b></b></label>
        <select name="cliente" class="form-control appearance-none border rounded py-2 px-24 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon"" name="cliente" id="cliente" placeholder="Catalogo uno">
            <option value="chico">Producto uno</option>
            <option value="grande">Producto dos</option>
        </select>
            <br>
            <br>
            <br>
    </div>
        <div>
          <label class="pl-16">Precio</label>
          <label class="pl-32"><b></b></label>
            <input type="text" name="price" id="price">
        </div>
            <br>
            <br>
        <div class="col-span-6 md:col-span-2">
            <label class="pl-16">Cantidad de unidades </label>
            <label class="pl-16"><b></b></label>
            <input type="number"class="appearance-none border rounded py-2 px-12 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon">        
        </div>
            <br>
            <br>
        <div>
          <label class="pl-16">Precio total</label>
          <label class="pl-32"><b></b></label>
            <input type="text" name="price" id="price">
            <br>
            <br>
        </div>
            <label class="pl-16"></label>
            
                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-56 border-b-23 border-blue-700 hover:border-blue-500 rounded">Agregar 
                </button>
</body>