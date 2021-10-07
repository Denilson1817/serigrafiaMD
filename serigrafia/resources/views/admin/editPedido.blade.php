@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <h2 class="titulo-1">Serigrafía Ortiz</h2>
    </div>
    <div class="titulo_cata">
        <h1 class="titulo-2">Pedidos</h1>
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>

<body>
    <div class="container mx-auto">
        <h1 style="font-size: 30px;"><b>Datos del Pedido</b></h1>
        <br>
        <label style="font-size: 20px;"><b>Productos pedidos</b></label>
        <label class="pl-56"><b>Fecha de entrega</b></label>
        <input type="date" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" name="fecha" id="fecha" placeholder="DD/MM/YY">
        <label class="pl-64"><b>               </b></label>
        <button class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-8 border-b-4 border-green-700 hover:border-green-500 rounded">
            Modificar
        </button>
        <br>
        <br>
        <br>
    </div>

    <div class="container max-width: 640px">
        <table class="table-fixed">
            <tr>
                <!--
              <th>Company</th>
              <th>Contact</th>
              <th>Country</th>-->
            </tr>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">
                        <label class="pl-8">Producto uno</label>
                        <label class="pl-16"><b>               </b></label>
                        <button class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                            Editar
                        </button>
                        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                            Eliminar
                        </button>
                    </td>
                  </tr>
                
                  <tr>
                    <td class="border px-4 py-2">
                        <label class="pl-8">Producto Dos</label>
                        <label class="pl-16"><b>               </b></label>
                        <button class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                            Editar
                        </button>
                        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                            Eliminar
                        </button>
                    </td>
                  </tr>
    
                  <tr>
                    <td class="border px-4 py-2">
                        <label class="pl-8">Producto Tres</label>
                        <label class="pl-16"><b>               </b></label>
                        <button class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                            Editar
                        </button>
                        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                            Eliminar
                        </button>
                    </td>
                  </tr>
    
                  <tr>
                    <td class="border px-4 py-2">
                        <label class="pl-6">Producto Cuatro</label>
                        <label class="pl-12"><b></b></label>
                        <button class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded">
                            Editar
                        </button>
                        <button class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                            Eliminar
                        </button>
                    </td>
                  </tr>
    
                  <tr>
                    <td class="border px-2 py-2">
                        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-32 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            Agregar Producto
                        </button>
                    </td>
                  </tr>
            </tbody>
          </table>
    
          

    </div>      

</body>