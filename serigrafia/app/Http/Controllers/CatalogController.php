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
    protected $messagesCatalog = [
        'nombre.required'     => 'Es necesario ingresar un nombre',
        'categoria.required' => 'Es necesario ingresar una categoria'
    ];
    protected $validationsCatalog = [
        'nombre'     => 'required',
        'categoria' => 'required'
    ];
    protected $messagesDesing = [
        'foto.required'     => 'Es necesario ingresar una foto de diseño',
        'foto.image'     => 'La foto debe ser una imágen',
        'textura.required' => 'Es necesario ingresar una textura',
        'color.required'  => 'Es necesario ingresar un color',
        'dimension_y.required'       => 'Es necesario ingresar una dimensión y',
        'dimension_x.required'       => 'Es necesario ingresar un dimensión x',
        'dimension_y.integer'       => 'Es necesario que la dimensión y sea expresada en números enteros',
        'dimension_x.integer'       => 'Es necesario que la dimensión x sea expresada en números enteros'
    ];
    protected $validationsDesing = [
        'textura'     => 'required',
        'dimension_y' => 'required|integer',
        'dimension_x' => 'required|integer',
        'color'  => 'required',
        'foto'       => 'required|image',
    ];
    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), $this->validationsCatalog, $this->messagesCatalog);
        if ($validator->fails()) 
        {
            session()->flash("error", "«Por favor verifica que los campos del catálogo sean correctos»");
            return back()->withErrors($validator)->withInput();
        }

        $validator = Validator::make($request->all(), $this->validationsDesing, $this->messagesDesing);
        if ($validator->fails()) 
        {
            session()->flash("error", "«Por favor verifica que los campos del diseño sean correctos»");
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
        /*$validator = Validator::make($request->all(), $this->validationsCatalog, $this->messagesCatalog);
        if ($validator->fails()) 
        {
            session()->flash("error", "«Por favor verifica que los campos del catálogo sean correctos»");
            return back()->withErrors($validator)->withInput();
        }*/

        $catalog = Catalogo::find($request->id_catalog);
        $catalog->Nombre     = $request->nombre;
        $catalog->Categoria = $request->categoria;
        $catalog->save();
        session()->flash("success", "Catálogo editado");
        return back()->withInput();
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
        /*$validator = Validator::make($request->all(), $this->validationsDesing, $this->messagesDesing);
        if ($validator->fails()) 
        {
            session()->flash("error", "«Por favor verifica que los campos del diseño sean correctos»");
            return back()->withErrors($validator)->withInput();
        }*/

        $diseno = new ModelsDiseno();
        $diseno->Foto = $request->foto;
        $diseno->Textura = $request->textura;
        $diseno->ID_Catalago = $request->id_catalog;
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
        
        session()->flash("success", "Diseño agregado al catálogo");
        return back()->withInput();
    }
    
}
