<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto_Pedido;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
class PedidoController extends Controller
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
    public function create()
    {
        return view('admin.pedido.registroPedido');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->FechaRealizado = $request->FechaRealizado;
        $pedido->FechaEntraga = $request->FechaEntraga;
        $pedido->NumProductos = 0;
        $pedido->IDCliente = $request->IDCliente;
        $pedido->save();

        foreach ($request->productos as $producto) 
        {
            $productoPedido               = new Producto_Pedido();
            $productoPedido->IDPedido     = $pedido->id;
            $productoPedido->NumProductos = $producto['cantidad'];
            $productoPedido->IDproducto   = $producto['id'];
            $productoPedido->PrecioTotal  = $producto['precio'] * $producto['cantidad'];
            $productoPedido->save();
        }

        $pedido->NumProductos = Producto_Pedido::where('IDPedido', $pedido->id)->get()->count();
        $pedido->save();
    }

    public function show(Request $request)
    {
        $pedidos = Pedido::orderBy('id', 'DESC')->where(function ($q) use ($request) 
        {
            if (!empty($request->date)) 
            {
                $q->where('FechaRealizado', $request->date);
            }
            
        })->where(function ($q) use ($request) 
        {
            if (!empty($request->client)) 
            {
                $q->whereHas('cliente', function (Builder $query) use ($request) 
                {
                    $query->where('Nombre', 'LIKE', '%'.$request->client.'%');
                });
            }
        })->paginate(5);
        return view('admin.pedido.list', [
            'pedidos' => $pedidos,
            'client'  => $request->client,
            'date'    => $request->date
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);
        return view('admin.pedido.editPedido', [
            'pedido' => $pedido
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pedido = Pedido::find($request->id_pedido);
        $pedido->FechaEntraga = $request->FechaEntrega;
        $pedido->numProductos = Producto_Pedido::where('IDPedido', $request->id_pedido)->count();
        $pedido->save();
        return redirect()->route('pedidos.search');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
