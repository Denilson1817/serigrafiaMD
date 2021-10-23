<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoPedidoController;
use App\Models\Producto_Pedido;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/catalog/dashboard', [CatalogController::class, 'dashboard'])->name('catalog.dashboard');
Route::post('/admin/catalog/store', [CatalogController::class, 'store'])->name('catalog.store');
Route::get('/admin/catalog/edit/{id}', [CatalogController::class, 'edit'])->name('catalog.edit');
Route::post('/admin/catalog/update', [CatalogController::class, 'update'])->name('catalog.update');
Route::post('/admin/catalog/addDesing', [CatalogController::class, 'addDesing'])->name('catalog.addDesing');


//Ruta de Eliminar Diseños y Catalogos
Route::get('/admin/catalog/deleteCatalog/{id}', [CatalogController::class, 'deleteCatalog'])->name('catalog.deleteCatalog');
Route::get('/admin/catalog/deleteDiseno/{iddiseno}', [CatalogController::class, 'deleteDiseno'])->name('catalog.deleteDiseno');

//Ruta para enviar los datos a la BD
Route::post('/admin/catalog/enviarCatalog', [CatalogController::class, 'enviarCatalog'])->name('catalog.enviarCatalog');
Route::post('/admin/catalog/enviarDiseno', [CatalogController::class, 'enviarDiseno'])->name('catalog.enviarDiseno');

/* PEDIDOS */
Route::get('/admin/pedidos/search/', [PedidoController::class, 'show'])->name('pedidos.search');
Route::get('/admin/pedidos/edit/{id_pedido}', [PedidoController::class, 'edit'])->name('pedidos.edit');
Route::post('/admin/pedidos/update', [PedidoController::class, 'update'])->name('pedidos.update');

Route::get('/admin/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/admin/pedidos/save', [PedidoController::class, 'store'])->name('pedidos.save');

//RUTA PARA CANCELAR PEDIDO
Route::get('/admin/pedidos/cancelPedido/{id_pedido}/{id_cliente}', [PedidoController::class, 'cancelPedido'])->name('pedidos.cancelPedido');
//RUTA PARA ENVIAR LOS DATOS A LA BD
Route::post('/admin/pedidos/enviarPedido', [PedidoController::class, 'enviarPedido'])->name('pedidos.enviarPedido');



//Productos pedidos
Route::get('/admin/pedidos/editProductoPedido', [ProductoPedidoController::class, 'edit'])->name('pedidos.productoPedido.edit');
Route::get('/admin/pedidos/updateProductoPedido', [ProductoPedidoController::class, 'update'])->name('pedidos.productoPedido.update');
//RUTA PARA ELIMINAR PRODUCTO
Route::get('admin/pedidos/destroyProPed/{id_Prod}', [ProductoPedidoController::class, 'destroyProPed'])->name('pedidos.destroyProPed');
//RUTA PARA AGREGAR PRODUCTO EN UN PEDIDO
Route::get('admin/pedidos/addPro_Ped/{id_Pedido}', [ProductoPedidoController::class, 'addPro_Ped'])->name('pedidos.addPro_Ped');


//Ruta para editar diseños dentro de un catalogo
Route::get('/admin/catalog/editarDisenio/{id}', [CatalogController::class, 'editarDisenio'])->name('catalog.editarDisenio');
Route::post('/admin/catalog/editDisenio', [CatalogController::class, 'editDisenioGuard'])->name('catalog.editDisenioGuard');



//CLIENTES
Route::get('client/index', [ClienteController::class, 'index'])->name('client.index');

//Ruta para registrar pedido
Route::get('/admin/pedidos/agregarProducto', [ProductoPedidoController::class, 'agregarProducto'])->name('pedidos.agregarProducto');
//Ruta para agregar productos
Route::post('/admin/pedidos/addNewProduct', [ProductoPedidoController::class, 'addNewProduct'])->name('pedidos.addNewProduct');
//Ruta para buscar disenios en catalogo
Route::get('/admin/pedidos/buscarCatalogo/{categoria}', [ProductoPedidoController::class, 'buscarCatalogo'])->name('pedidos.buscarCatalogo');

//Ruta para agregar clientes vista
Route::get('/admin/pedidos/agregarCliente', [PedidoController::class, 'agregarCliente'])->name('pedidos.agregarCliente');
