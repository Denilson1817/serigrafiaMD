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
    <!-- AQUÍ EN EL FOREACH ES PARA RECUPERAR LOS PRODUCTOS QUE YA ESTEN EN EL PEDIDO CON EL ID QUE 
            SE NOS MANDARA AL AGREGAR PRODUCTO -->
    @foreach(App\Models\Producto_Pedido::where('IDPedido', $pedido->id)->get() as $producto )
    <div class="container mx-auto">
        <br>
        <label class="pl-16">Selecciona un producto</label>  
        <label class="pl-16"><b></b></label>
        <select name="productos" id="productos" placeholder="Productos..." class="form-control appearance-none border rounded py-2 px-24 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" >

            <option value="{{$producto->IDproducto}}">{{$producto->IDproducto}}</option>
            
        </select>
            <br>
            <br>
            <br>
    </div>
        
            
                <label class="pl-16">Precio </label> 
                <label class="pl-16"><b></b></label>
                <input type="hidden" id="precio" value="{{$producto->Precio}}">
                <div class="w-1/2 text-left">{{$producto->Precio}}
            
          <input type="hidden" name="precio" id="precio" value="{{producto->id}}"> <!-- EN ESTE 
            INPUT SE GUARDARA EL PRECIO PARA POSTERIORMENTE LLEVARLO A LA MULTIPLICACIÓN-->  
        </div>
            <br>
            <br>
        <div class="col-span-6 md:col-span-2">
            <label class="pl-16">Cantidad de unidades </label>
            <label class="pl-16"><b></b></label>
            <input type="number" name="NumProductos" id="NumProductos" value="{{$producto->NumProductos}}" class="appearance-none border rounded py-2 px-12 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_num" onchange="calculaTotal()">        
            
            <br>
            <br>
        
                  <label class="pl-16">Precio total </label>
                  <label class="pl-32"><b></b></label>
                <div class="w-1/2 text-left" id="total">{{$producto->PrecioTotal}}
                </div>
            
            <br>
            <br>
        </div>
            <label class="pl-16"></label>
                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-56 border-b-23 border-blue-700 hover:border-blue-500 rounded">
                    Agregar 
                </button>
                <!-- CUANDO SE DE EN AGREGAR SE DEBERIA MANDAR A LA BD, CREO YO-->
    @endforeach
</body>
<script>
    function calculaTotal(){
        document.getElementById('total').innerHTML = document.getElementById('precio').value * document.getElementById('NumProductos').value
    }
</script>