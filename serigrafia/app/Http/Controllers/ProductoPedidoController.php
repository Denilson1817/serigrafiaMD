<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Diseno;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Producto_Pedido;
use Illuminate\Http\Request;

class ProductoPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto_Pedido  $producto_Pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto_Pedido  $producto_Pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $producto_Pedido = Producto_Pedido::find($request->id);
        return view('admin.pedido.editProductoPedido', ['ProductoPedido' => $producto_Pedido]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto_Pedido  $producto_Pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $producto_Pedido = Producto_Pedido::find($request->id);
        $producto_Pedido->NumProductos = $request->NumProductos;
        $producto_Pedido->PrecioTotal = $request->NumProductos*$producto_Pedido->producto->Precio;
        $producto_Pedido->save();
        return redirect()->route('pedidos.edit', ['id_pedido' => $producto_Pedido->pedido->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto_Pedido  $producto_Pedido
     * @return \Illuminate\Http\Response
     */
    public function destroyProPed($id_Prod){
        //$producto_Pedido = Producto_Pedido::find($id_Prod);
        
        $producto_Pedido = Producto_Pedido::where('IDproducto', $id_Prod);

        $producto_Pedido->delete();   
        return back();
    }

    public function addPro_Ped($id_Pedido){
        $pedido = Pedido::find($id_Pedido);

        return view('admin.pedido.addProd_Ped', ['pedido' => $pedido]);


    }

    public function agregarProducto(){
        return view('admin.producto.agregarProducto');
    }

    public function addNewProduct(Request $request){
        $producto = new Producto();
        $producto->Material = $request->Material;
        $producto->Precio = $request->Precio;
        $producto->Nombre = $request->Nombre;
        $producto->IDDiseno = $request->Diseno;
        $producto->save();
        return back();
    }

    public function buscarCatalogo(Request $request){
        $disenos = collect();
        foreach(Catalogo::where('Categoria', $request->categoria)->get() as $catalog){
            $disenos = $disenos->concat(Diseno::where('ID_Catalago', $catalog->id)->get());
        }
        return $disenos;
    }
}
