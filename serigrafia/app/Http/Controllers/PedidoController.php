<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Pedido;
use App\Models\PedidoCancelado;
use App\Models\Cliente;
use App\Models\Diseno;
use App\Models\Producto;
use App\Models\Producto_Pedido;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $pedido->FechaRealizado = new Carbon();
        $pedido->FechaEntraga = $request->FechaEntraga;
        $pedido->NumProductos = 0;
        $pedido->IDCliente = $request->cliente_id;
        $pedido->estado = 1;
        $pedido->save();

        foreach ($request->productos as $producto) 
        {
            $productoPedido               = new Producto_Pedido();
            $productoPedido->IDPedido     = $pedido->id;
            $productoPedido->NumProductos = $producto['cantidad'];
            $productoPedido->IDproducto   = $producto['id'];
            $productoObj = Producto::find($producto['id']);
            $productoPedido->PrecioTotal  = $productoObj->Precio * $producto['cantidad'];
            $productoPedido->save();
        }

        $pedido->NumProductos = Producto_Pedido::where('IDPedido', $pedido->id)->get()->count();
        $pedido->save();
        session()->flash("success", "Pedido registrado");
        return redirect()->route('pedidos.search');
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
        })
        ->where('estado',1)
        ->paginate(5);
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
        $pedido->estado = 1;
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
    //para buscar una foto 
    public function showPhoto(Request $request){
        $diseno = Diseno::find($request->idDiseno);
        return $diseno->Foto;
    }
        //Función PARA CANCELAR PEDIDO
    public function cancelPedido($id_pedido, $id_cliente)
    {
        $pedido = Pedido::find($id_pedido);
        //$cliente->id = Cliente::where('IDPedido', $request->id_pedido)->count();
        $cliente = Cliente::find($id_cliente);


        return view('admin.pedido.cancelPedido', [
            'pedido' => $pedido, 
            'cliente' => $cliente
        ]);
    }

    //Aquí se envian los datos de cancelPedido
    public function enviarPedido(Request $request){
        //Aquí es para actualizar el Estado del catalogo en la BD
        
        $pedido = Pedido::find($request->idpedido);
        /*$pedido->FechaRealizado = $request->fechaRealizado;
        $pedido->FechaEntraga = $request->fechaEntraga;
        $pedido->NumProductos = $request->numProductos;*/
        $pedido->estado = 0;
        $pedido->save();

        //Aquí se envia los datos a la tabla de Pedidos Cancelados
        $enviarP = new PedidoCancelado();
        $enviarP->NombreCliente = $request->nombreCliente;
        $enviarP->IDPedido = $request->idpedido;
        $enviarP->FechaRealizacion = $request->fechaRealizado;
        $enviarP->FechaEntrega = $request->fechaEntrega;
        $enviarP->Motivo = $request->razon;
        $enviarP->Estado = 0;

        $enviarP->save();
        return redirect()->route('pedidos.search');
    }


    
    public function agregarCliente(){
        return view('admin.pedido.agregarCliente');
    }

   
}
