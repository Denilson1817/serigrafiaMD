@extends('layouts.app')
@section('content')
    <div class="flex flex-wrap items-center justify-center w-full p-6">
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
                                <td class="w-1/6 p-3">
                                    <a href="{{route('pedidos.edit', $pedido->id)}}" class="text-gray-400 hover:text-gray-100 ml-2">
                                        <i class="material-icons-round text-base hover:text-green-300">Modificar</i>
                                    </a>
                                </td>
                                <td class="w-1/6 p-3">
                                    <a href="{{route('pedidos.cancelPedido', ['id_pedido' => $pedido->id, 'id_cliente' => $pedido->IDCliente])}}" class="text-gray-400 hover:text-gray-100 ml-2">
                                        <i class="material-icons-round text-base hover:text-green-300">Cancelar</i>
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
                <a href="{{route('pedidos.create')}}" class="bg-transparent hover:bg-green-500 text-bluegreen font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">Agregar pedido</a>
            </div>
        </div>
    </div>
@endsection