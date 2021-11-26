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
                    <a href="{{route('cliente.carrito')}}" class="w-10 h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <!--Etiquetas e input-->
        <div class="flex flex-wrap min-w-full my-30">
            <div class="min-w-full p-2 text-center">
                <label class="w-2/3 text-xl" for="ElegirCatalog">Primero elige un catálogo</label>
                <select name="NombreC" id="NombreC" class="w-1/3 text-base">
                    <option class="bg-white" value="">Nombre del catálogo</option>
                    @foreach(App\Models\Catalogo::get() as $catalog)
                        <option class="bg-white" value="{{$catalog->id}}">{{$catalog->Nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="min-w-full p-2 text-center">
                <label class="w-2/3 text-xl" for="ElegirDiseno">Ahora un diseno</label>
                <select name="NombreD" id="NombreD" class="w-1/3 text-base">
                    <option class="bg-white" value="">Nombre Diseño</option>
                   

                </select>
            </div>
        </div>
        <br>
        <!--Titulo y selección de producto-->
       
    
        <div id="nombre" class="flex flex-wrap -mx-3 p-3 mb-6 text-black"> 

        
        </div>
       
      
    </div>

<script type="text/javascript">

function addCarrito(){
        var Disenio = document.getElementById("Disenio");
        var existente = 0
        $(".idPDisenios").each(function() 
        {
            if (producto.value == this.value) 
            {
                existente = 1
            }
        });
        
        if(existente != 1)
        {

                        <input type="hidden" name="idNombre" id="idNombre" value="{{$producto_carrito->producto->diseno->Nombre}}" class="input_idNombre">
                        <input type="hidden" name="idNombreProducto" id="idNombreProducto" value="{{$producto_carrito->producto->Nombre}}" class="input_NombreProducto">
                        <input type="hidden" name="cantidad" id="cantidad" value="{{$producto_carrito->cantidad}}" class="input_cantidad">
                        <input type="hidden" name="total" id="total" value="{{$producto_carrito->cantidad * $producto_carrito->producto->Precio}}" class="input_total">

                   
            );
        
        document.getElementById("Producto").value = "";
        document.getElementById("Cantidad").value = "";
    }




    





   $(document).ready(function(){
        $('#NombreC').change(function(){
            var catalogId = $(this).val();
            $.get('/cliente/addCarrito/showDesing/'+catalogId, function(res){
                console.log(res);
                var html_select = '<option class="bg-white" value="">Nombre Diseno</option>';
                for (var i=0; i<res.length; i++){
                    html_select += '<option class="bg-white" value="'+res[i].id+'">'+res[i].Nombre+'</option>';
                }
                $('#NombreD').html(html_select);
            });
        });
    });

    $(document).ready(function(){
        
        $('#NombreD').change(function(){

            var disenoId = $(this).val();
            $.get('/cliente/addCarrito/showCard/'+disenoId, function(res){
                console.log(res);
                var titulo = ' <div class="min-w-full">'+
                '<h1 class="text-3xl">Selecciona los productos a comprar</h1>'+
           
                '</div>';
                var html_card = '';
                
                for (var i=0; i<res.length; i++){
                    html_card += '<div class="w-full max-w-sm md:w-1/3 p-3 mb-6 md:mb-0">'+
                    '<div class="rounded overflow-hidden shadow-lg flex-1">'+
                        '<div class="text-center px-4 py-2 m-4">'+
                            '<img name="Foto" id="Foto" class="pl-2 block h-80 w-64" value="'+res[i].Foto+'" alt="Sunset in the mountains">'+
                        '</div>'+
                        '<div class=" flex-1  text-center px-4 py-2 m-2">'+
                            '<input type="number" name="Cantidad" id="Cantidad" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-25 text-center">'+
                            '<td>'+
                            ' <div class="flex flex-wrap -mx-3 mb-6 text-black">'+
                                '<div class="flex-1  text-center px-4 py-2 m-2"> '+
                                    '<a  onclick="addCarrito()" class="bg-blue-600 hover:bg-blue-700 text-white hover:text-black font-semibold py-2 px-8 rounded shadow" href="{{route('cliente.carrito')}}">Agregar al carrito'+
                                    '</a>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                }
                $('#nombre').html(titulo + html_card);
            });
        });
    });



        
</script>
@endsection
