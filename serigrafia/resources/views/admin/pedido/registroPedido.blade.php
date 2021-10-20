@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <title>Agregar productos</title>
    </div>
    <h1 style="font-size: 30px;" class="font-extrabold  pl-16 ">Agregar Productos</h1>
    <br>
    <br>
    <div class="titulo_cata">
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>


<div class="flex flex-wrap -mx-3 mb-6 p-4">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label>Producto: </label>
            </div>
            <div class="md:w-2/3">
                <select name="Producto" id="Producto" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" onchange="functionProducto()">
                    <option disabled selected>Producto</option>
                    @foreach(App\Models\Producto::get() as $producto)
                        <option value="{{$producto->id}}"> {{$producto->Nombre}} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label>Cantidad</label>
            </div>
            <div class="md:w-2/3">
                <input type="number" name="Cantidad" id="Cantidad" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" min="20">
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <center>
            <div class="pl-16 space-y-4 flex space-x-4 justify-center">
                <button onclick="addProduct()" class=" bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-8 border-b-4 border-blue-700 hover:border-blue-500 rounded ">Agregar</button>
            </div>
        </center>
    </div>
</div>
<form action="{{route('pedidos.save')}}" method="post" enctype="multipart/form-data" class="p-4">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                Fecha de entrega
            </label>
            <input type="date" name="FechaEntraga" id="FechaEntraga" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" placeholder="DD/MM/YY">
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Nombre del cliente
            </label>
            <div class="relative">
                <select name="cliente_id" id="cliente_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="functionNombre()">
                    <option disabled selected>Nombre del cliente</option>
                    @foreach(App\Models\Cliente::get() as $cliente)
                        <option value="{{$cliente->id}}"> {{$cliente->Nombre}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="text-lg">¿Aún no te has registrado?</label>
            <br>
            <!--------No conozco la ruta para la pantalla de registro---->
            <a href="Aquí debería ir la ruta para la pantalla de registro, pero no la encontre." class="underline hover:underline text-blue-500 text-lg">Registrarse</a>
        </div>
    </div>
    <div id="productsTable" class="flex flex-wrap -mx-3 mb-2">
        <table class="w-full table my-5">
            <thead class="text-white">
                <tr class="bg-blue-900 hidden sm:table-row">
                    <th class="p-2 text-left sm:text-center rounded-l-lg">Producto</th>
                    <th class="p-2 text-left sm:text-center">Cantidad</th>
                    <th class="p-2 rounded-r-lg"></th>
                </tr>
            </thead>
            <tbody class="sm:divide-y" id="productsTableBody">
                
            </tbody>
        </table>
    <div class="pl-16">
        <button name="Aceptar" id="Aceptar" class=" bg-green-500 hover:bg-blue-400 text-white font-bold py-2 px-8 border-b-4 border-green-700 hover:border-blue-500 rounded ">Aceptar</button>

    </div>
</form>

<script type="text/javascript">
    function addProduct(){
        var producto = document.getElementById("Producto");
        $('#productsTableBody').append(
            "<tr class='flex flex-wrap sm:table-row mb-6 sm:mb-0'>"
                +"<td class='w-1/2 p-3 text-white bg-blue-900 rounded-tl-lg sm:hidden border border-b-0 border-r-0'>"
                    +"Producto"
                +"</td>"
                +"<td class='w-1/2 sm:w-auto p-3 text-right sm:text-center border border-b-0 sm:border-none rounded-tr-lg sm:rounded-tr-none'>"
                    +"<input type='hidden' name='productos["+producto.value+"][id]' value='"+producto.value+"'>"
                    +$('#Producto option:selected').text()
                +"</td>"
                +"<td class='w-1/2 p-3 text-white bg-blue-900 rounded-tl-lg sm:hidden border border-b-0 border-r-0'>"
                    +"Cantidad"
                +"</td>"
                +"<td class='w-1/2 sm:w-auto p-3 text-right sm:text-center border border-b-0 sm:border-none rounded-tr-lg sm:rounded-tr-none'>"
                    +"<input type='number' name='productos["+producto.value+"][cantidad]' value='"+document.getElementById("Cantidad").value+"'>"
                +"</td>"
                +"<td class='w-full sm:w-auto p-3 text-center border sm:border-none rounded-b-lg sm:rounded-br-none'>"
                    +"<button type='button' class='appearance-none bg-pink-600 hover:bg-red-600 text-white transition duration-500 ease-in-out font-bold py-2 px-2 rounded-full focus:outline-none focus:shadow-outline' , onclick='deleteProduct(this)'>"
                        +"<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='16' height='16'>"
                            +"<path fill-rule='evenodd' d='M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z'></path>"
                        +"</svg>"
                    +"</button>"
                +"</td>"
            +"</tr>"
        );
        document.getElementById("Producto").value = "";
        document.getElementById("Cantidad").value = "";
    }

    function deleteProduct(btn) 
    {
        var productTR = btn.parentNode.parentNode;
        document.getElementById('productsTableBody').removeChild(productTR)
    }

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
</script>
@endsection

<!--------------------------------Dato mamalon: Class = "block h-8 w-8 rounded-full "--------->