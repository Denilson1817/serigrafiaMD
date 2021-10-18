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
                            <option value="{{$producto->id}}"> {{$producto->name}} </option>
                        @endofreach
                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label>Cantidad</label>
                </div>
                <div class="md:w-2/3">
                    <input type="number" name="Cantidad" id="Cantidad" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" min="20">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label>Total</label>
                </div>
                <div class="md:w-2/3">
                    <input type="number" name="Total" id="Total" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full">
                </div>
            </div>
        </div>
    
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <div>
                <center><label style="font-size: 20px;" class="font-extrabold  pl-20 ">Elegir diseño</label></center>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label>Categoría: </label>
                </div>
                <div class="md:w-2/3">
                    <select name="Categoria" id="Categoria" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" onchange="functionCategoria()">
                        <option disabled selected>Categoría</option>

                    </select>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label>Diseño </label>
                </div>
                <div class="md:w-2/3">
                    <select name="Diseno" id="Diseno" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full" onchange="functionDiseno()">
                        <option disabled selected value="">Diseño</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <center>
                <div class="pl-8">
                    <img id="imagenPrevisualizacion" class="pl-2 block h-40 w-32 ">

                </div>
                <br>
                <div class="pl-16 space-y-4 flex space-x-4 justify-center">

                    <button onclick="document.getElementById('Foto').click()" class=" bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-8 border-b-4 border-blue-700 hover:border-blue-500 rounded ">Agregar</button>
                    <!---Esro era para agregar una foto

                        pero creo que ya no es necesario----->
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
                <select name="Nombre" id="Nombre" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" onchange="functionNombre()">
                    <option disabled selected>Nombre del cliente</option>
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
    <div class="pl-16">
        <button name="Aceptar" id="Aceptar" class=" bg-green-500 hover:bg-blue-400 text-white font-bold py-2 px-8 border-b-4 border-green-700 hover:border-blue-500 rounded ">Aceptar</button>

    </div>
</form>

<script type="text/javascript">
    
</script>
@endsection

<!--------------------------------Dato mamalon: Class = "block h-8 w-8 rounded-full "--------->