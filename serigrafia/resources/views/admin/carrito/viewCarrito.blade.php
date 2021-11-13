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
                    @php $total=0; @endphp
                    @foreach($Carrito as $producto_carrito)
                        <tr class="flex flex-wrap @if($loop->first) mt-4 @endif sm:table-row mb-4 sm:mb-0">
                            <td class="w-1/2 sm:w-auto p-3 border border-r-0 sm:border-none rounded-l-lg sm:rounded-l-none text-center">{{$producto_carrito->producto->diseno->Nombre}}</td>
                            <td class="w-1/2 sm:w-auto p-3 border border-r-0 sm:border-none rounded-l-lg sm:rounded-l-none text-center">{{$producto_carrito->producto->Nombre}}</td>
                            <td class="w-1/2 sm:w-auto p-3 border border-r-0 sm:border-none rounded-l-lg sm:rounded-l-none text-center">{{$producto_carrito->cantidad}}</td>
                            <td class="w-1/2 sm:w-auto p-3 border border-r-0 sm:border-none rounded-l-lg sm:rounded-l-none text-center">{{$producto_carrito->cantidad * $producto_carrito->producto->Precio}}</td>
                            @php $total+=$producto_carrito->cantidad * $producto_carrito->producto->Precio; @endphp
                            <td class="w-1/2 sm:w-auto p-3 text-center border sm:border-none rounded-r-lg sm:rounded-r-none">
                                <button type='button' class='appearance-none bg-pink-600 hover:bg-red-600 text-white transition duration-500 ease-in-out font-bold py-2 px-2 rounded-full focus:outline-none focus:shadow-outline' , onclick='deleteProduct("{{$producto_carrito->id}}")'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='16' height='16'>
                                        <path fill-rule='evenodd' d='M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z'></path>
                                    </svg>
                                </button>
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
    <div class="w-full">
        <!--Fecha de entrega-->
        <div class="flex flex-row w-full pt-16 pl-10 text-center">
            <div class="w-1/6">
                <h4 class="text-lg">Fecha de entrega</h4>
            </div>
            <div class="w-1/5 text-left">
                <input type="date" name="fecha" id="fecha" class="">
            </div>
        </div>
        <div class="flex flex-row w-full pt-4 pl-10 pb-4">
            <!--Total a pagar-->
            <div class="flex flex-row w-1/2">
                <div class="w-1/3 text-center">
                    <h4 class="text-lg">Precio total:</h4>
                </div>
                <div class="w-1/5 text-left">
                    <p>{{$total}}</p>
                </div>
            </div>
            <!--Botones Pagar y Cancelar-->
            <div class="flex flex-row w-1/2">
                <button id="btnPagar" class="ml-96 mr-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Pagar</button>
              <!--  <button id="btnCancelar" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">Cancelar</button> -->
                <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded" id="delete-btn">
                Eliminar
                </button>
                
                <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
                <div class="bg-gray-200 max-w-sm py-2 px-3 rounded shadow-xl text-gray-800">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg font-bold">Esta seguro de eliminar el carrito</h4>
                        <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="mt-2 text-sm">
                        <p>Se eliminaran los productos del carrito.</p>
                    </div>
                    <div class="mt-3 flex justify-end space-x-3">
                    <!-- <button class="px-3 py-1 rounded hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900" >Cancelar</button> -->
                        <button id="btnEliminar" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded" >Eliminar</button>
                        
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    <script>
        function deleteProduct(id){
            var id_prodcut = id;
            console.log(id_prodcut)
            $.ajax({
                type: "POST",
                url: route('cliente.carrito.delProduct'),
                data: {
                    id_carrito: id_prodcut,
                    _token: '{{ csrf_token() }}'
                },
                success: function(respu) {
                }
            });
        }

        window.addEventListener('DOMContentLoaded', () =>{
            const overlay = document.querySelector('#overlay')
            const delBtn = document.querySelector('#delete-btn')
            const closeBtn = document.querySelector('#close-modal')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            delBtn.addEventListener('click', toggleModal)

            closeBtn.addEventListener('click', toggleModal)
        })

        
        window.addEventListener('DOMContentLoaded', () =>{
            const overlay = document.querySelector('#overlay')
            
            const closeBtn = document.querySelector('#close-modal')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            delBtn.addEventListener('click', toggleModal)

            closeBtn.addEventListener('click', toggleModal)
        })

        const btnVaciar = document.getElementById('btnEliminar');
        btnVaciar.addEventListener('click', () => {

        })

    </script>
@endsection