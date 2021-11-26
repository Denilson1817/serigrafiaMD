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

    <form action="{{route('pedidos.addPro_Ped_back')}}" method="post">
    @csrf
        <div class="container mx-auto">
            <br>
            <label class="pl-16">Selecciona un producto</label>
            <label class="pl-16"><b></b></label>
            <select name="productos" id="productos" placeholder="Productos..." class="form-control appearance-none border rounded py-2 px-24 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon">
                @foreach(App\Models\Producto::get() as $producto )
                <option value="{{$producto->id}}">{{$producto->Nombre}}</option>
                @endforeach
            </select>
            <br>
            <br>
            <br>
        </div>

        <!--<label class="pl-16">Precio </label>-->
        <input type="hidden" id="precio" name="precio" value="{{$producto->Precio}}">
        <input type="hidden" id="pedido" name="pedido" value="{{$pedido->id}}">
        <label class="pl-16"><b></b></label>
        

        <!--<input type="hidden" name="precio" id="precio" value="{{$producto->Precio}}">-->
        <!-- EN ESTE 
            INPUT SE GUARDARA EL PRECIO PARA POSTERIORMENTE LLEVARLO A LA MULTIPLICACIÓN-->

        <br>
        <br>
        <div class="col-span-6 md:col-span-2">
            <label class="pl-16">Cantidad de unidades </label>
            <label class="pl-16"><b></b></label>
            <input type="number" name="NumProductos" id="NumProductos" value="{{$producto->NumProductos}}" class="appearance-none border rounded py-2 px-12 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_num" onchange="calculaTotal()">

        </div>
        <br>
        <br>
        <label class="pl-16">Precio total </label>
        <label class="pl-16"><b></b></label>
        <label class="pl-16" id="total"></label>

        <br>
        <br>

        <label class="pl-16"></label>
        <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-56 border-b-23 border-blue-700 hover:border-blue-500 rounded">
            Agregar
        </button>
        <!-- CUANDO SE DE EN AGREGAR SE DEBERIA MANDAR A LA BD, CREO YO-->
    </form>

</body>
<script>
    function calculaTotal() {
        document.getElementById('total').innerHTML = document.getElementById('precio').value * document.getElementById('NumProductos').value
    }
</script>
@endsection