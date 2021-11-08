@extends('layouts.app')
@section('content')
    <header class="interfaz_Principal">
        <div class="titulo_seri">
            <title>Comprar</title>
        </div>
        <h1 style="font-size: 30px;" class="font-extrabold  pl-16 ">Realizar compra</h1>
        <br>
        <br>
    </header>

    <div class="p-8 max-h-screen min-w-full">
        <!--Titulo y boton a carrito-->
        <div class="flex flex-row min-w-full">
            <div class="w-4/5">
                <h1 class="text-3xl">Elegir productos a comprar</h1>
            </div>
            <div class="flex flex-row w-1/5">
                <div class="w-1/2">
                    <h3 class="text-2xl">Ver carrito</h3>
                </div>
                <div class="w-1/2">
                    <button type="button" class="w-10 h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <br>
        <!--Etiquetas e input-->
        <div class="flex flex-wrap min-w-full my-30">
            <div class="w-4/5 p-2 text-center">
                <label class="w-2/3 text-xl" for="ElegirCatalog">Primero elige un catálogo</label>
                <select name="NombreC" id="NombreC" class="w-1/3 text-base">
                    <option value="">Nombre del catálogo</option>
                    <!--@foreach(App\Models\Catalogo::get() as $catalog)
                        <option value="{{$catalog->Nombre}}">{{$catalog->Nombre}}</option>
                    @endforeach-->
                </select>
            </div>
            <div class="w-4/5 p-2 text-center">
                <label class="w-2/3 text-xl" for="ElegirDiseno">Ahora un diseno</label>
                <select name="NombreD" id="NombreD" class="w-1/3 text-base">
                    <option value="">Nombre Diseno</option>
                </select>
            </div>
        </div>
        <br>
        <!--Titulo y selección de producto-->
        <div class="min-w-full">
            <h1 class="text-3xl">Selecciona los productos a comprar</h1>
        </div>
        <!--Aqui va un @foreach-->

        <!--Aqui finaliza el @foreach-->
    </div>

<script type="text/javascript">
    function selectDesign() {
        $('#NombreC').on('change', selectId);
    }

    function selectId(){
        var catalogId = $(this).val();
        $.get('ruta de controller', function(data){
            
        });
    }

</script>

<!--
    Controlador para mostrar diseños
    public function showDesing(%id){
        return $design = Diseno::select('Nombre')->
                where('ID_Catalago', $id)->get();
    }
-->
@endsection