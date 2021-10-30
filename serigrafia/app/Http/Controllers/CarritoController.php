<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;

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
    public function create()
    {
        
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
    public function update(Request $request, carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(carrito $carrito)
    {
        //
    }

    public function addCarrito(){
        return view('admin.carrito.addCarrito');
    }
}
