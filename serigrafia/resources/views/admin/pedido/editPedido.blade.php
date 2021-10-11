@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz</h2>
    </div>
    <div class="titulo_cata">
        <h1 class="titulo-2">Pedidos</h1>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<body>

    <form action="{{route('pedidos.update')}}" method="post">
        @csrf
        <div class="container mx-auto">
            <h1 style="font-size: 30px;"><b>Datos del Pedido</b></h1>
            <br>
            <label style="font-size: 20px;"><b>Productos pedidos</b></label>
            <label class="pl-56"><b>Fecha de entrega</b></label>
            <input type="date" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="FechaEntrega" id="FechaEntrega" value="{{$pedido->FechaEntraga}}">
            <label class="pl-64"><b> </b></label>


            <input type="hidden" name="id_pedido" id="id_pedido" value="{{$pedido->id}}" class="input_idpedido">

            <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-8 border-b-4 border-green-700 hover:border-green-500 rounded">
                Modificar
            </button>
            <br>
            <br>
            <br>
        </div>
    </form>
    <!-- AQUÍ ES DONDE EMPIEZA LA TABLA-->

    <div class="p-4">
        <div class="flex mb-4">
            <div class="w-1/2 p-2  text-center">
                <table class="table-fixed">
                    <tbody>
                        @foreach(App\Models\Producto_Pedido::where('IDPedido', $pedido->id)->get() as $producto )
                        <tr class="bg-gray-400">
                            <td class="border p-2">
                                <label class="pl-8">ID {{$producto->id}}</label>
                                <label class="pl-16"><b> </b></label>
                                <button class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded" onclick="editProductoPedido('{{$producto->id}}')">
                                    Editar
                                </button>
                                <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" onclick="">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="border px-2 py-2">
                                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-32 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                    Agregar Producto
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!--AQUÍ ES DONDE VA EL EDITAR PRODUCTO-->
            <div class="w-1/2 p-2 bg-gray-500 text-center" id="divProductEdit"></div>
        </div>
    </div>
</body>
<script>
    function editProductoPedido(id) {
        var id_prodcut = id;
        $.ajax({
            type: "GET",
            url: route('pedidos.productoPedido.edit'),
            data: {
                id: id_prodcut
            },
            success: function(respu) {
                $("#divProductEdit").html(respu);
            }
        });
    }
</script>
@endsection