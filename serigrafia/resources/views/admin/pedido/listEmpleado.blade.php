@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz Empleado</h2>
    </div>
    <div class="titulo_cata">
        <h1 class="titulo-2">Diseños</h1>
    </div>
</header>
    <div class="w-full p-4">
        <form action="{{route('pedidos.principal')}}" method="get">
            <div class="inline-block p-4">
                <label class="pl-16">Cliente</label>
                <input type="text" name="client" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="cliente" id="cliente" placeholder="Nombre Cliente">
            </div>
            <div class="inline-block p-4">
                <label class="pl-16">Para ver si es direrente</label>
                <input type="date" name="date" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="fecha" id="fecha" placeholder="DD/MM/YY">
            </div>

            <div class="inline-block p-4">
                <button type="submit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                    Buscar
                </button>
                <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4">
                    Limpiar
                </a>
                <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                    Regresar
                </a>
            </div>
        </form>
    </div>
    <div class="flex flex-wrap items-center justify-center w-full">
        <div class="w-full">
            <div class="overflow-auto lg:overflow-visible w-full">
                @if(isset($pedidos))
                <table class="table text-gray-400 border-separate space-y-6 text-sm w-full">
                    <thead class="bg-gray-800 text-gray-500">
                        <tr>
                        
                            <th class="p-3 ">Cliente</th>
                            <th class="p-3 text-left">Fecha entrega</th>
                            <th class="p-3 text-left">Precio total</th>
                            <th class="p-3 text-left">Número de productos</th>
                            <th class="p-3 ">Quien te atendio</th>
                            <th class="p-3 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                            
                        @foreach($pedidos as $pedido)
                                <tr class="bg-gray-800">
                                
                                

                                    <td class="w-2/6 p-3 max-w-xs">
                                        <div class="flex align-items-center">
                                            <div class="ml-3">
                                                <div class="text-xs md:text-lg">{{$pedido->cliente->Nombre}}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="w-1/6 p-3">
                                        {{$pedido->FechaEntraga}}
                                    </td>
                                    <td class="w-1/6 p-3 font-bold">
                                        {{App\Models\Producto_Pedido::where('IDPedido', $pedido->id)->sum('PrecioTotal')}}
                                    </td>
                                    <td class="w-1/6 p-3">
                                        {{$pedido->NumProductos}}
                                    </td>
                                    
                                    @php
                                    $empleado= App\Models\Empleado_Cliente::where('pedido_id', $pedido->id)->first();
                                    @endphp
                                    
                                    @if(empty($empleado))
                                        <td class="w-2/6 p-3 max-w-xs">
                                            <div class="flex align-items-center">
                                                    <div class="ml-3">
                                                    <div class="text-xs md:text-lg">sin asignar</div>
                                                    </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="w-2/6 p-3 max-w-xs">
                                            <div class="flex align-items-center">
                                                    <div class="ml-3">
                                                    <div class="text-xs md:text-lg">{{$empleado->empleado->name}}</div>
                                                    </div>
                                            </div>
                                        </td>
                                    @endif
                        
                                        
                                   
                                        
                                    <td class="w-1/6 p-3">
                                        <a href="{{route('pedidos.edit', $pedido->id)}}" class="text-gray-400 hover:text-gray-100 ml-2">
                                            <i class="material-icons-round text-base hover:text-green-300">Modificar</i>
                                        </a>
                                    </td>
                                    <td class="w-1/6 p-3">
                                        <a href="{{route('pedidos.cancelPedido', ['id_pedido' => $pedido->id, 'id_cliente' => $pedido->IDCliente])}}" class="text-gray-400 hover:text-gray-100 ml-2">
                                            <i class="material-icons-round text-base hover:text-red-300">Eliminar</i>
                                        </a>
                                    </td>


                                </tr>
                        @endforeach
                    </tbody>
                </table>
                @else

                @endif
            </div>
        </div>
        <div class="flex flex-wrap bg-gray-200">
            <div class="w-2/3 justify-start">
                {{$pedidos->appends([
                    'pedidos' => $pedidos,
                    'client'  => $client,
                    'date'    => $date
                ])->links()}}
            </div>
            <div class="w-1/3 p-2 justify-end">
                <a href="{{route('pedidos.register')}}" class="bg-transparent hover:bg-green-500 text-bluegreen font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">Agregar pedido</a>
            </div>
        </div>
    </div>

</body>
@endsection