@extends('layouts.app')
@section('content')
<header class="interfaz_Principal">
    <div class="titulo_seri">
        <title>Agregar productos</title>
    </div>
    <h1 style="font-size: 30px;" class="font-extrabold  pl-16 " >Agregar Productos</h1>
    <br>
    <br>
    <div class="titulo_cata">
    </div>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</header>
<!----------------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------->



                    <!---No sé cual es la ruta--->
    <form action ="{{route(No conozco la ruta)}}" method="post" enctype="multipart/form-data">
        <table >
       
            <td>
                <div class="container mx-auto ">
                    <div class="flex space-x-4 ">
                        <!---En los select puse el onchange--->
                        <label class="pl-16">Producto: </label>
                        <select name="Producto" id="Producto" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" onchange="functionProducto()">
                            <option disabled selected>Producto</option>
                        </select>
                    </div>
                    <br>
                    <div class="flex space-x-6">
                        <label class="pl-16">Cantidad</label>
                        <input type="number" name="Cantidad" id="Cantidad" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" min="20">
                    </div>
                    <br>    
                    <div class="flex space-x-12 ">
                        <label class="pl-16">Total</label>
                        <input type="number" name="Total" id="Total" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="flex space-x-4">
                        <label class="pl-16">Fecha de entrega: </label>
                        <input type="date" name="FechaEntraga" id="FechaEntraga" class="shadow appearance-none border rounded py-2 px-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon"  placeholder="DD/MM/YY">
                    </div>
           
                </div>
            </td>
        <!----------------------------------------------------------------------------------------------------------------------------------->




            <td>
                <div>          
                    <div >
                        <center><label style="font-size: 20px;" class="font-extrabold  pl-20 ">Elegir diseño</label></center>
                    </div>
                    <br>
                    <br>
                    <div class="flex space-x-4 ">
                        <label class="pl-16">Categoría: </label>  
                        <select name="Categoria" id="Categoria" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" onchange="functionCategoria()">
                            <option disabled selected>Categoría</option>
                    
                        </select>
                    </div>
                    <br>
                    <div class="flex space-x-10">
                        <label class="pl-16">Diseño </label>  
                        <select name="Diseno" id="Diseno" class="appearance-none border rounded py-2 px-15 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon" onchange="functionDiseno()">
                            <option disabled selected>Diseño</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="flex space-x-4">
                        <label class="pl-16">Nombre del cliente </label>  
                        <select name="Nombre" id="Nombre" class="appearance-none border rounded py-2 px-30 text-gray-700 leading-tight focus:outline-none focus:shadow-outline input_razon " onchange="functionNombre()">
                            <option disabled selected>Nombre del cliente</option>
                        </select>
                    </div> 
                </div>
            </td>
            <td>
                <div class="pl-16">
                    <center>
                    <div class="pl-8">
                        <img id="imagenPrevisualizacion" class="pl-2 block h-40 w-32 ">
    
                    </div>
                    <br>
                    <div class="pl-16 space-y-4 flex space-x-4">

                        <button  onclick="document.getElementById('Foto').click()" class=" bg-green-500 hover:bg-blue-400 text-white font-bold py-2 px-8 border-b-4 border-green-700 hover:border-blue-500 rounded ">Agregar</button>
                        <!---Esro era para agregar una foto

                        <input type="file" name="Foto" id="Foto" accept=".png, .jpg, .jpeg"  value="{{$desing->Foto}}" style="display:none">

                        pero creo que ya no es necesario----->
                    </div >
                    <div>
                    <br>
                    <br><br>         
                    <label class="text-lg">¿Aún no te has registrado?</label>
                    <br>
                    <!--------No conozco la ruta para la pantalla de registro---->
                    <a href="Aquí debería ir la ruta para la pantalla de registro, pero no la encontre." class="underline hover:underline text-blue-500 text-lg">Registrarse</a>
                    </div>
                    </center>
            

                </div>
            </td>
        </table>
        <div class="pl-16">
            <button name="Aceptar" id="Aceptar" class=" bg-green-500 hover:bg-blue-400 text-white font-bold py-2 px-8 border-b-4 border-green-700 hover:border-blue-500 rounded ">Aceptar</button>
            
        </div>
    </form>   

<!---En ente script se mostraba la imágen que subia el cliente, se supone  que debería mostrar 
la imágen del diseño escogido, pero por el form no funciona, aun así lo dejo por si es útil--->
<script type="text/javascript">
    const $seleccionArchivos = document.querySelector("#Diseno"),
        $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

    // Escuchar cuando cambie
    $seleccionArchivos.addEventListener("change", () => {
      // Los archivos seleccionados, pueden ser muchos o uno
      const archivos = $seleccionArchivos.files;
      // Si no hay archivos salimos de la función y quitamos la imagen
      if (!archivos || !archivos.length) {
        $imagenPrevisualizacion.src = "";
        return;
      }
      // Ahora tomamos el primer archivo, el cual vamos a previsualizar
      const primerArchivo = archivos[0];
      // Lo convertimos a un objeto de tipo objectURL
      const objectURL = URL.createObjectURL(primerArchivo);
      // Y a la fuente de la imagen le ponemos el objectURL
      $imagenPrevisualizacion.src = objectURL;
    });
    
</script>
@endsection

   <!--------------------------------Dato mamalon: Class = "block h-8 w-8 rounded-full "--------->

           
