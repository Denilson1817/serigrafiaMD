<?php

use App\Http\Controllers\CatalogController;
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

Route::post('/admin/catalog/store', [CatalogController::class, 'store'])->name('catalog.store');
Route::get('/admin/catalog/edit/{id}', [CatalogController::class, 'edit'])->name('catalog.edit');
Route::post('/admin/catalog/update', [CatalogController::class, 'update'])->name('catalog.update');
Route::post('/admin/catalog/addDesing', [CatalogController::class, 'addDesing'])->name('catalog.addDesing');
Route::get('/admin/catalog/changeStatusDiseno/{id}', [CatalogController::class, 'changeStatusDiseno'])->name('catalog.changeStatusDiseno');
Route::get('/admin/catalog/changeStatusCatalog/{id}', [CatalogController::class, 'changeStatusCatalog'])->name('catalog.changeStatusCatalog');

//Ruta de Eliminar Diseños y Catalogos
Route::get('/admin/catalog/dashboard', [CatalogController::class, 'dashboard'])->name('catalog.dashboard');
Route::get('/admin/catalog/deleteCatalog/{id}', [CatalogController::class, 'deleteCatalog'])->name('catalog.deleteCatalog');
Route::get('/admin/catalog/deleteDiseno/{id}', [CatalogController::class, 'deleteDiseno'])->name('catalog.deleteDiseno');

//Ruta para enviar los datos a la BD
Route::post('/admin/catalog/enviarCatalog', [CatalogController::class, 'enviarCatalog'])->name('catalog.enviarCatalog');
Route::post('/admin/catalog/enviarDiseno', [CatalogController::class, 'enviarDiseno'])->name('catalog.enviarDiseno');
