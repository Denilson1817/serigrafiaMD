<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Diseno as ModelsDiseno;
use App\Models\Diseno_color;
use App\Models\Diseno_dimension;
use Diseno;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    /*protected $messages = [
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
    ];*/
    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), $this->validations, $this->messages);
        if ($validator->fails()) 
        {
            session()->flash("error", "«Por favor verifica que los campos sean correctos»");
            return back()->withErrors($validator)->withInput();
        }*/
        $catalog           = new Catalogo();
        $catalog->Nombre     = $request->nombre;
        $catalog->Categoria = $request->categoria;
        $catalog->save();

        $diseno = new ModelsDiseno();
        $diseno->Foto = $request->foto;
        $diseno->Textura = $request->textura;
        $diseno->ID_Catalago = $catalog->id;
        $diseno->save();

        $diseno_color = new Diseno_color();
        $diseno_color->Color = $request->color;
        $diseno_color->IDDiseno = $diseno->id;
        $diseno_color->save();

        $diseno_dimen = new Diseno_dimension();
        $diseno_dimen->DimensioY = $request->dimension_y;
        $diseno_dimen->DimensioX = $request->dimension_x;
        $diseno_dimen->IDDiseno = $diseno->id;
        $diseno_dimen->save();
        
        session()->flash("success", "Catálogo agregado");
        return redirect()->route('dashboard');
    }
    public function edit($id)
    {
        $catalog = Catalogo::find($id);
        return view('admin.edit', ['catalog' => $catalog]);
    }

    public function update(Request $request)
    {
        $catalog = Catalogo::find($request->id_catalog);
        $catalog->Nombre     = $request->nombre;
        $catalog->Categoria = $request->categoria;
        $catalog->save();
        session()->flash("success", "Catálogo editado");
        return back()->withInput();
        //return redirect()->route('catalog.edit', $request->id_catalog);
    }

    public function deleteCatalog($id){
        $catalog = Catalogo::find($id);
        return view('admin.deleteCatalog', ['catalog' => $catalog]);
    }
    public function deleteDiseno($id){
        $catalog = Catalogo::find($id);
        return view('admin.deleteDiseno', ['catalog' => $catalog]);
    }

    public function dashboard(){
        return view('admin.index');
    }

    public function addDesing(Request $request){
        $diseno = new ModelsDiseno();
        $diseno->Foto = $request->foto;
        $diseno->Textura = $request->textura;
        $diseno->ID_Catalago = $catalog->id;
        $diseno->save();

        $catalog           = new Catalogo();
        $catalog->Nombre     = $request->nombre;
        $catalog->Categoria = $request->categoria;
        $catalog->save();

        $diseno_color = new Diseno_color();
        $diseno_color->Color = $request->color;
        $diseno_color->IDDiseno = $diseno->id;
        $diseno_color->save();

        $diseno_dimen = new Diseno_dimension();
        $diseno_dimen->DimensioY = $request->dimension_y;
        $diseno_dimen->DimensioX = $request->dimension_x;
        $diseno_dimen->IDDiseno = $diseno->id;
        $diseno_dimen->save();
        
        session()->flash("success", "Catálogo agregado");
        return redirect()->route('dashboard');
    }
}
