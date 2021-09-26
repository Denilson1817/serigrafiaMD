<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    protected $messages = [
        'name.required'     => 'Es necesario ingresar un nombre',
        'capacity.required' => 'Es necesario ingresar una capacidad',
        'capacity.integer'  => 'La capacidad debe ser expresada en números',
        'address.required'  => 'Es necesario ingresar una dirección',
        'cp.required'       => 'Es necesario ingresar un código postal',
        'cp.integer'        => 'El código postal debe ser expresado en números',
        'cp.digits'         => 'El código postal debe componerse de cinco dígitos',
        'state.required'    => 'Es necesario ingresar un estado',
        'city.required'     => 'Es necesario ingresar una ciudad',
        'items.required'    => 'Debe ingresar al menos un artículo.',
    ];
    protected $validations = [
        'name'     => 'required',
        'capacity' => 'required|integer',
        'address'  => 'required',
        'cp'       => 'required|integer|digits: 5',
        'state'    => 'required',
        'city'     => 'required',
        'items'    => 'required'
    ];
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validations, $this->messages);
        if ($validator->fails()) 
        {
            session()->flash("error", "«Por favor verifica que los campos sean correctos»");
            return back()->withErrors($validator)->withInput();
        }
        $classroom           = new Classroom();
        $classroom->name     = $request->name;
        $classroom->capacity = $request->capacity;
        $classroom->address  = $request->address;
        $classroom->cp       = $request->cp;
        $classroom->state_id = $request->state;
        $classroom->city     = $request->city;

        $classroom->save();

        foreach ($request->items as $item) 
        {
            $itemObject               = new Item();
            $itemObject->name         = $item['id'];
            $itemObject->quantity     = $item['cantidad'];
            $itemObject->classroom_id = $classroom['id'];
            $itemObject->save();
        }
        session()->flash("success", "Salón agregado");
        return redirect()->route('classroom.search');
    }
}
