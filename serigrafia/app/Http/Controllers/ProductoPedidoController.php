<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
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
    public function destroy(Producto_Pedido $producto_Pedido)
    {
        //
    }
}
