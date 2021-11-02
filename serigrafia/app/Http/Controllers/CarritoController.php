<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Producto_Pedido;
use App\Models\Diseno;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        
    }*/

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
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(carrito $carrito)
    {
        $carrito = Carrito::where('cliente_id', auth()->user()->id)->get();
        return view('admin.carrito.viewCarrito', ['Carrito' => $carrito]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }
    
    public function destroy(Request $request)
    {
        Carrito::destroy($request->id_carrito);
        return back();
    }

    public function CarritoPedido(Request $request){
        $pedido = new Pedido();
        $pedido->IDCliente = auth()->user()->id;
        $pedido->FechaEntraga = $request->FechaEntraga;
        $pedido->NumProductos = 0;
        $pedido->estado = 1;
        $pedido->save();

        foreach (Carrito::where('cliente_id', auth()->user()->id)->get() as $producto) 
        {
            $productoPedido               = new Producto_Pedido();
            $productoPedido->IDPedido     = $pedido->id;
            $productoPedido->NumProductos = $producto->cantidad;
            $productoPedido->IDproducto   = $producto->producto_id;
            $productoPedido->PrecioTotal  = $producto->producto->Precio * $producto->cantidad;
            $productoPedido->save();
        }

        $pedido->NumProductos = Carrito::where('cliente_id', auth()->user()->id)->get()->count();
        $pedido->save();

        $carritoEliminado = Carrito::where('cliente_id', auth()->user()->id)->delete();
        session()->flash("success", "Pedido registrado");
    }

    public function create(){
        return view('admin.carrito.addProductos');
    }

    public function showDesing(Request $request){
        $disenos = collect();
        foreach(Catalogo::where('id', $request->id)->get() as $catalog){
            $disenos = $disenos->concat(Diseno::where('ID_Catalago', $catalog->id)->get());
        }
        return $disenos;
    }
}
