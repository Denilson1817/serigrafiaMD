@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_cata">
        <h2 class="titulo-1">Editar diseño del catálogo</h2>
    </div>
</header>

<center>
<div class="bg-rojo-700 border-gray-200 box-content w-2/3 h-auto">
    <form action="{{route('catalog.editDisenioGuard')}}" method="post">
        @csrf
        <div class="grid grid-cols-6 gap-4 p-4">
            <div class="col-span-6">
                <h1 class="w-full text-xl">Editar diseño</h1>
            </div>
            <input type="hidden" name="id" value="{{$desing->id}}">
            <div class="col-span-6 md:col-span-3">
                <label for="foto">Foto: </label>
                <input type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg"  value="{{$desing->Foto}}" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
                    
            <div class="col-span-6 md:col-span-3">
                <label for="textura">Textura: </label>
                <input type="text" name="textura" id="textura" value="{{$desing->Textura}}" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
                    
            <div class="col-span-6 md:col-span-2">
                <label for="color">Color: </label>
                <input type="color" name="color" id="color" class="w-full" value="{{$color->Color}}">
            </div>
        
            <div class="col-span-6 md:col-span-2">
                <label for="dimension_x">Dimensión X </label>
                <input type="number" name="dimension_x" id="dimension_x" value="{{$dimen->DimensioX}}"  class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            
            <div class="col-span-6 md:col-span-2">
                <label for="dimension_y">Dimensión Y </label>
                <input type="number" name="dimension_y" id="dimension_y" value="{{$dimen->DimensioY}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            
            <div class="col-span-6">
                <button class="bg-green-500 hover:bg-green-400 mr-64 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" type="submit"> Aceptar </button>
                <!--<button class="bg-green-500 hover:bg-green-400 mr-64 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" onclick="document.getElementById('modal2').hidden=false;"  type="button" id="btnAcep"> Aceptar </button>-->
                <button class="bg-red-500 hover:bg-red-700 ml-64 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" onclick="document.getElementById('modal1').hidden=false;"  type="button" id="btnCance"> Cancelar </button>
            </div>
        </div>
    </div>    
</center>

<!-- Full screen modal -->
<div class="" id="modal1" hidden>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <transition enter-active-class="ease-out duration-300"
        enter-class="opacity-0" enter-to-class="opacity-100"
        leave-active-class="ease-in duration-200" leave-class="opacity-100"
        leave-to-class="opacity-0">
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <transition enter-active-class="ease-out duration-300"
                enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                leave-active-class="ease-in duration-200" leave-class="opacity-100 translate-y-0 sm:scale-100"
                leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                ¿Seguro que desea cancelar los cambios?
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Si cancela, los cambios desapareceran.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <a class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" href="{{route('catalog.edit', $desing->ID_Catalago)}}">
                        Aceptar
                    </a>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="document.getElementById('modal1').hidden=true;">
                        Cancelar
                    </button>
                </div>
            </div>
            </transition>
        </div>
    </div>
    </transition>
</div>

<!-- Full screen modal -->
<div class="" id="modal2" hidden>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <transition enter-active-class="ease-out duration-300"
        enter-class="opacity-0" enter-to-class="opacity-100"
        leave-active-class="ease-in duration-200" leave-class="opacity-100"
        leave-to-class="opacity-0">
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <transition enter-active-class="ease-out duration-300"
                enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                leave-active-class="ease-in duration-200" leave-class="opacity-100 translate-y-0 sm:scale-100"
                leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                ¿Seguro que desea cancelar los cambios?
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Si cancela, los cambios desapareceran.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Aceptar
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="document.getElementById('modal2').hidden=true;">
                        Cancelar
                    </button>
                </div>
            </div>
            </transition>
        </div>
    </div>
    </transition>
</div>

@endsection