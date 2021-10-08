@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz</h2>
    </div>
    <div class="titulo_cata">
        <h1 class="titulo-2">Diseños</h1>
    </div>
</header>

<body>
    <div class="w-full p-4">
        <form action="{{route('pedidos.search')}}" method="get"></form>
            <div class="inline-block p-4">
                <label class="pl-16">Cliente</label>
                <input type="text" name="client" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="cliente" id="cliente" placeholder="Nombre Cliente">
            </div>
            <div class="inline-block p-4">
                <label class="pl-16">Fecha de compra</label>
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
    <div class="flex items-center justify-center w-full">
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
                    <!--@foreach($pedidos as $pedido)
                            <tr class="flex flex-wrap bg-gray-800">
                                <td class="w-2/6 p-3 max-w-xs">
                                    <div class="flex align-items-center">
                                        <div class="ml-3">
                                            <div class="text-xs md:text-lg">Appple</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-1/6 p-3">
                                    Technology
                                </td>
                                <td class="w-1/6 p-3 font-bold">
                                    200.00$
                                </td>
                                <td class="w-1/6 p-3">
                                    <span class="bg-green-400 text-gray-50 rounded-md px-2">available</span>
                                </td>
                                <td class="w-1/6 p-3">
                                    <a href="{{route('pedidos.edit', '')}}" class="text-gray-400 hover:text-gray-100  ml-2">
                                        <i class="material-icons-round text-base hover:text-green-300">Modificar</i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach-->
                    <tr class="bg-gray-800">
                        <td class="w-2/6 p-3 max-w-xs">
                            <div class="flex align-items-center">
                                <div class="ml-3">
                                    <div class="text-xs md:text-lg">Realme kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</div>
                                </div>
                            </div>
                        </td>
                        <td class="w-1/6 p-3">
                            Technology
                        </td>
                        <td class="w-1/6 p-3 font-bold">
                            200.00$
                        </td>
                        <td class="w-1/6 p-3">
                            <span class="bg-red-400 text-gray-50 rounded-md px-2">no stock</span>
                        </td>
                        <td class="w-1/6 p-3">
                            <a href="{{route('pedidos.edit', '')}}" class="text-gray-400 hover:text-gray-100 ml-2">
                                <i class="material-icons-round text-base hover:text-green-300">Modificar</i>
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-gray-800">
                        <td class="w-2/6 p-3 max-w-xs">
                            <div class="flex align-items-center">
                                <div class="ml-3">
                                    <div class="text-xs md:text-lg">Samsung</div>
                                </div>
                            </div>
                        </td>
                        <td class="w-1/6 p-3">
                            Technology
                        </td>
                        <td class="w-1/6 p-3 font-bold">
                            200.00$
                        </td>
                        <td class="w-1/6 p-3">
                            <span class="bg-yellow-400 text-gray-50  rounded-md px-2">start sale</span>
                        </td>
                        <td class="w-1/6 p-3">
                            <a href="{{route('pedidos.edit', '')}}" class="text-gray-400 hover:text-gray-100 ml-2">
                                <i class="material-icons-round text-base hover:text-green-300">Modificar</i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @else

            @endif
        </div>
    </div>

    <div class="container mx-auto">
        <label class="px-20 text-black font-weight"><b>Cliente</b></label>
        <label class="px-20 text-black font-weight"><b>Fecha entrega</b></label>
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
@endsection