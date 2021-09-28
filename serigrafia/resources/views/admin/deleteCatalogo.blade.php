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
<form action="{{route('catalog.eliminar')}}" method="post">
    @csrf
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-6">
            <h3 class="w-full text-xl">¿Estas seguro de eliminar este diseño?</h3>
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
            <input type="submit" value="Aceptar" class="crear_cata_enviar">
        </div>
    </div>
</form>
<form action="{{route('catalog.deleteCatalogo')}}">
    @csrf
    <div class="grid grid-cols-6 gap-4">
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
            <input type="color" name="color" id="color" class="appearance-none block w-full text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
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
            <input type="submit" value="Aceptar">
            <input type="button" value="Cancelar">
        </div>
    </div>
</form>
</div>
</div>
@endforeach
@endsection