@extends('layouts.app')
@section('content')
    <header class="interfaz_Principal">
        <div class="titulo_seri">
            <h2 class="titulo-1">Serigrafía</h2>
        </div>
        <div class="titulo_cata">
            <h1 class="titulo-2">Catálogos</h1>
        </div>
    </header>
    <form action="{{route('catalog.update')}}" method="post">
        @csrf
        <div class="grid grid-cols-6 gap-4 p-4">
            <div class="col-span-6">
                <h3 class="w-full text-xl">Cambiar datos del catálogo</h3>
            </div>
            <input type="hidden" name="id_catalog" id="id_catalog" value="{{$catalog->id}}">
            <div class="col-span-6 md:col-span-3">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{$catalog->Nombre}}">
            </div>
            <div class="col-span-6 md:col-span-3">
                <label for="categoria">Categoría: </label>
                <input type="text" name="categoria" id="categoria" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{$catalog->Categoria}}">
            </div>
            <div class="col-span-6">
                <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" type="submit"> Aceptar </button>
            </div>
        </div>
    </form>
    <form action="{{route('catalog.addDesing')}}" method="post">
        @csrf
        <div class="grid grid-cols-6 gap-4 p-4">
            <div class="col-span-6">
                <h3 class="w-full text-xl">Agregar un diseño</h3>
            </div>
            <input type="hidden" name="id_catalog" value="{{$catalog->id}}">
            <div class="col-span-6 md:col-span-3">
                <label for="foto">Foto: </label>
                <input type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="col-span-6 md:col-span-3">
                <label for="textura">Textura: </label>
                <input type="text" name="textura" id="textura" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="col-span-6 md:col-span-2">
                <label for="color">Color: </label>
                <input type="color" name="color" id="color" class="w-full">
            </div>
            <div class="col-span-6 md:col-span-2">
                <label for="dimension_x">Dimensión X </label>
                <input type="number" name="dimension_x" id="dimension_x" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="col-span-6 md:col-span-2">
                <label for="dimension_y">Dimensión Y </label>
                <input type="number" name="dimension_y" id="dimension_y" accept=".png, .jpg, .jpeg" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
            </div>
            <div class="col-span-6">
                <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" type="submit"> Aceptar </button>
                <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" type="button"> Cancelar </button>
            </div>
        </div>
    </form>
    <div class="flex flex-wrap">
    @foreach(App\Models\Diseno::where('ID_Catalago', $catalog->id)->get() as $desing)
        <div class="w-full md:w-1/2 lg:flex">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://v1.tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
            </div>
            <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center">
                        <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                        </svg>
                        Members only
                    </p>
                    <div class="text-gray-900 font-bold text-xl mb-2">ID: {{$desing->id}}</div>
                    <p class="text-gray-700 text-base">Textura: {{$desing->Textura}}</p>
                </div>
                <div class="flex items-center">
                    <div class="flex flex-wrap -mx-3 mb-6 text-black">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <a class="bg-gray-600 hover:bg-gray-700 text-white hover:text-black font-semibold py-2 px-4 rounded shadow" href="{{route('catalog.deleteDiseno', $catalog->id)}}">
                                Eliminar
                            </a>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <a class="bg-blue-600 hover:bg-blue-700 text-white hover:text-black font-semibold py-2 px-4 rounded shadow" href="{{route('catalog.editDisenio', $catalog->id_diseno)}}" id="bntEdit">
                                Editar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-rojo-700 border-gray-200 box-content w-2/3 h-auto" id="editDisenio" hidden>
        <!--<div class="w-2/3 h-56 edit_disenio" id="editDisenio">-->
            <form action="{{route('catalog.editDisenio')}}" method="get">
                @csrf
                <div class="grid grid-cols-6 gap-4 p-4">
                    <div class="col-span-6">
                        <h3 class="w-full text-xl">Editar diseño</h3>
                    </div>
                    <input type="hidden" name="id_diseno" value="{{$catalog->id_diseno}}">
                    <div class="col-span-6 md:col-span-3">
                        <label for="foto">Foto: </label>
                        <input type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <label for="textura">Textura: </label>
                        <input type="text" name="textura" id="textura" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    <div class="col-span-6 md:col-span-2">
                        <label for="color">Color: </label>
                        <input type="color" name="color" id="color" class="w-full">
                    </div>
                    <div class="col-span-6 md:col-span-2">
                        <label for="dimension_x">Dimensión X </label>
                        <input type="number" name="dimension_x" id="dimension_x" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    <div class="col-span-6 md:col-span-2">
                        <label for="dimension_y">Dimensión Y </label>
                        <input type="number" name="dimension_y" id="dimension_y" accept=".png, .jpg, .jpeg" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    <div class="col-span-6">
                        <button class="bg-amarillo-900 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" type="submit"> Aceptar </button>
                        <button class="bg-amarillo-900 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" type="button"> Cancelar </button>
                    </div>
                </div>
            </form>
        </div>    

    @endforeach
    </div>
    <script>
        @if(Session::has('success'))
        Swal.fire(
            {
                icon: 'success',
                title: '¡Listo!',
                text: '{{Session::get("success")}}',
                showConfirmButton: false,
                timer: 1500
            }
        )
        @endif
        @if(Session::has('error'))
        Swal.fire(
            {
                icon: 'error',
                title: '¡Error!',
                text: '{{ Session::get("error") }}',
                showConfirmButton: false,
                timer: 1500
            }
        )
        @endif
    </script>
@endsection