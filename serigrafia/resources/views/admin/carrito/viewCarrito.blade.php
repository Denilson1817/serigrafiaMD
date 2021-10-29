@extends('layouts.app')
@section('content')
    <div class="w-full justify-center">
        <h1 class="text-center text-2xl">Carrito de </h1>
        <h2 class="text-center text-2xl">{{auth()->user()->id}}</h2>
    </div>
    <div class="w-full p-4">
        @if(isset($Carrito) && ($Carrito->count() > 0))
            <table class="w-full">
                <thead>
                    <tr class="bg-blue-900 hidden lg:table-row">
                        <th class="p-3 text-left lg:text-center rounded-l-lg">Diseño</th>
                        <th class="p-3 text-left lg:text-center">Producto</th>
                        <th class="p-3 text-left lg:text-center">Cantidad</th>
                        <th class="p-3 text-left lg:text-center">Precio</th>
                        <th class="p-3 text-left lg:text-center rounded-r-lg"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Carrito as $producto_carrito)
                        <tr class="flex flex-wrap @if($loop->first) mt-4 @endif sm:table-row mb-4 sm:mb-0">
                            <td class="w-1/2 sm:w-auto p-3 border border-r-0 sm:border-none rounded-l-lg sm:rounded-l-none text-center">{{$producto_carrito->producto->diseno->Nombre}}</td>
                            <td class="w-1/2 sm:w-auto p-3 border border-r-0 sm:border-none rounded-l-lg sm:rounded-l-none text-center">{{$producto_carrito->producto->Nombre}}</td>
                            <td class="w-1/2 sm:w-auto p-3 border border-r-0 sm:border-none rounded-l-lg sm:rounded-l-none text-center">{{$producto_carrito->cantidad}}</td>
                            <td class="w-1/2 sm:w-auto p-3 border border-r-0 sm:border-none rounded-l-lg sm:rounded-l-none text-center">{{$producto_carrito->cantidad * $producto_carrito->producto->Precio}}</td>
                            <td class="w-1/2 sm:w-auto p-3 text-center border sm:border-none rounded-r-lg sm:rounded-r-none">
                                <div class="grid grid-cols-1">
                                    <button class="appearance-none bg-pink-600 hover:bg-red-600 text-white transition duration-500 ease-in-out font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="button">
                                        Eliminar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="w-full p-10">
                <div class="text-2xl text-center text-red-600">
                    ¡No tienes productos en el carrito! te recomendamos agregar uno
                </div>
                <div class="w-full flex justify-center">
                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">Agregar productos al carrito</button>
                </div>
            </div>
        @endif
    </div>
@endsection