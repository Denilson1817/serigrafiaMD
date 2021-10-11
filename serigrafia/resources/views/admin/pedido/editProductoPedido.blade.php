<div class="w-full bg-gray-200 p-4">
    <form action="{{route('pedidos.productoPedido.update')}}">
        <div class="flex flex-wrap justify-center mb-4">
            <div class="justify-start w-1/2 p-2">
                <h2 class="text-xl text-left">Producto {{$ProductoPedido->producto->id}}</h2>
                <h2 class="text-xl text-left">Catálogo {{$ProductoPedido->producto->diseno->catalogo->Nombre}}</h2>
            </div>
            <div class="w-1/2 p-2 justify-center">
                <img src="{{$ProductoPedido->producto->diseno->Foto}}" alt="{{$ProductoPedido->producto->diseno->Foto}}" srcset="">
            </div>
        </div>
        <input type="hidden" name="id" value="{{$ProductoPedido->id}}">
        <div class="flex flex-wrap justify-center mb-4">
            <div class="w-1/2 text-left">Precio por unidad</div>
            <input type="hidden" id="precioUnitario" value="{{$ProductoPedido->producto->Precio}}">
            <div class="w-1/2 text-left">{{$ProductoPedido->producto->Precio}}</div>
        </div>
        <div class="flex flex-wrap justify-center mb-4">
            <div class="w-1/2 text-left">Cantidad de unidades</div>
            <div class="w-1/2 text-left">
                <input class="w-full md:w-1/2" type="number" name="NumProductos" id="NumProductos" value="{{$ProductoPedido->NumProductos}}" onchange="calculateTotal()">
            </div>
        </div>
        <div class="flex flex-wrap justify-center mb-4">
            <div class="w-1/2 text-left">Precio total</div>
            <div class="w-1/2 text-left" id="total">
                {{$ProductoPedido->PrecioTotal}}
            </div>
        </div>
        <div class="flex flex-wrap justify-center mb-4">
            <div class="w-full text-left">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Guardar cambios
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    function calculateTotal(){
        document.getElementById('total').innerHTML = document.getElementById('precioUnitario').value * document.getElementById('NumProductos').value
    }
</script>