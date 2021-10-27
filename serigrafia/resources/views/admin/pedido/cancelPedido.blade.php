@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz</h2>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<center>
<form action="{{route('pedidos.enviarPedido')}}" method="post">
        @csrf
    <label class="font-serif text-lg text-black-800 text-center">
        <h2>Se cancelará el siguiente pedido</h2>
    </label>
    <div class="flex">
        <div class="w-1/2 p-4 " >
        
        <div class="mb-6, text-center">
            <br>
            <label class="font-serif text-lg text-black-800 text-center">
                    Nombre del Cliente que realizó el pedido:
                </label>
            <br>
            <label class="font-serif text-lg text-blue-800 text-center">{{$cliente->Nombre}}</label>

            <input type="hidden" name="nombreCliente" id="nombreCliente" value="{{$cliente->Nombre}}" class="input_ClienteNombre">
        </div>
        <br>
        <br>
        <br>
        <div class="font-serif text-lg text-black-800" align="center">
            <label for="categoria">Fecha de Realización: </label>

                    <br>
        <!--<input type="date" name="fecha" min="2018-03-25" max="2018-05-25" step="2" />-->
        <input type="date" name="fecha" value="{{$pedido->FechaRealizado}}"/>
        <input type="hidden" name="fechaRealizado" id="fechaRealizado" value="{{$pedido->FechaRealizado}}"/>                
        </div>

        </div>


        <div class="w-1/2 p-4 ">
        <br>
        <div class="font-serif text-lg text-black-800" align="center">
                    <label for="categoria">ID del Pedido: </label>
                    <br>
                    <label class="font-serif text-lg text-blue-800 text-center">{{$pedido->id}}</label>
        </div>
        <br>

                <!--Inputs que se enviaran en el request-->
        <input type="hidden" name="idpedido" id="idpedido" value="{{$pedido->id}}" class="input_idpedido">
        <input type="hidden" name="numProductos" id= "numProductos" value="{{$pedido->NumProducto}}" class="input_numProductos"/>
        <input type="hidden" name="idCliente" id= "idCliente" value="{{$pedido->IDCliente}}" class="input_idCliente"/>
        <input type="hidden" name="estado" id="estado" value = 0 class="input_estado" />
        <br>
        <br>
        <div class="font-serif text-lg text-black-800" align="center">
                    <label for="categoria">Fecha para la cuál se entregaría: </label>
                    <br>
                    <!-- Campo de entrada de fecha -->

        <!--<input type="date" name="fecha" min="2018-03-25" max="2018-05-25" step="2" />-->
        
        <input type="date" name="fechaEntrega" value="{{$pedido->FechaEntraga}}" />
        <input type="hidden" name="fechaEntrega" id="fechaEntrega" value="{{$pedido->FechaEntraga}}"/>
        

            <br>
                
        </div>  


        </div>
    </div>
    <br>
            <div class="w-full max-w-xs">
                <form class="bg-whtie shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4, text-center">
                    <label class="block text-black-800 text-sm font-bold mb-2">
                    ¿Cuál es el motivo de la Cancelación?
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="razon" id="razon">
                </div>

                <br>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Envíar</button>
                    </button>
        
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{route('catalog.dashboard')}}">
                    Cancelar
                    </a>
                </div>
                </form>
            </div>    

    </form>
    </center>
@endsection