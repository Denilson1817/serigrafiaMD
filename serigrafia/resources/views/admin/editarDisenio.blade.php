@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_cata">
        <h2 class="titulo-1">Editar diseño del catálogo</h2>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<center>
<div class="bg-rojo-700 border-gray-200 box-content w-2/3 h-auto">
            <form action="{{route('catalog.editDisenio')}}" method="post">
                @csrf
                <div class="grid grid-cols-6 gap-4 p-4">
                    <div class="col-span-6">
                        <h3 class="w-full text-xl">Editar diseño</h3>
                    </div>
                    
                    <div class="col-span-6 md:col-span-3">
                        <label for="textura">Textura: </label>
                        <input type="text" name="textura" id="textura"  value="{{$desing->Textura}}" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </div>

                    <div class="col-span-6 md:col-span-3">
                        <label for="foto">Foto: </label>
                        <input type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg"  value="{{$desing->Foto}}" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    
                    <div class="col-span-6 md:col-span-2">
                        <label for="color">Color: </label>
                        <input type="color" name="color" id="color" class="w-full" value="{{$desing->diseno->id}}">
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
                        <button class="bg-amarillo-900 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" type="submit"> Aceptar </button>
                        <button class="bg-amarillo-900 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded" type="button"> Cancelar </button>
                    </div>
                </div>
            <!--</form>-->
        </div>    
</center>
@endsection