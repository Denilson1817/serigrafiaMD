<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\CatalogoEliminado;
use App\Models\DisenoEliminado;
use App\Models\Diseno as ModelsDiseno;
use App\Models\Diseno_color;
use App\Models\Diseno_dimension;
use App\Models\Diseno;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


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
        'foto.image'     => 'La foto debe ser una imagen',
        'foto.file'     => 'La foto debe ser un archivo',
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
        'foto'       => 'required|file|image',
    ];
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationsCatalog, $this->messagesCatalog);
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
        }
        $catalog           = new Catalogo();
        $catalog->Nombre     = $request->nombre;
        $catalog->Categoria = $request->categoria;
        $catalog->Estado = 1;
        $catalog->save();

        $diseno = new ModelsDiseno();
        $path = $request->file('foto')->store('diseños');
        $diseno->Foto = $path;
        $diseno->Textura = $request->textura;
        $diseno->Estado = 1;
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
        $validator = Validator::make($request->all(), $this->validationsCatalog, $this->messagesCatalog);
        if ($validator->fails()) 
        {
            session()->flash("error", "«Por favor verifica que los campos del catálogo sean correctos»");
            return back()->withErrors($validator)->withInput();
        }

        $catalog = Catalogo::find($request->id_catalog);
        $catalog->Nombre     = $request->nombre;
        $catalog->Categoria = $request->categoria;
        $catalog->Estado = 1;
        $catalog->save();
        session()->flash("success", "Catálogo editado");
        return back()->withInput();
    }

   //Función PARA DELETE CATALOGO
    public function deleteCatalog($id){
        $catalog = Catalogo::find($id);
        return view('admin.deleteCatalog', ['catalog' => $catalog]);
    }
    
    //Función PARA DELETE DISEÑO
    public function deleteDiseno($iddiseno){
        $diseno = Diseno::find($iddiseno);

        return view('admin.deleteDiseno')->with([
                    'desing' => $diseno
                ]);
    }

    
    //Aqui se envian los datos de DeleteCatalogo 
    public function enviarCatalog(Request $request){
        //Aquí es para actualizar el Estado del catalogo en la BD
        $catalog = Catalogo::find($request->idcatalogo);
        $catalog->Nombre = $request->nombre;
        $catalog->Categoria = $request->categoria;
        $catalog->Estado = $request->estado;
        
        $catalog->save();

        //Aquí se envia los datos a la tabla de Catalogos eliminados
        $enviar = new CatalogoEliminado();
        $enviar->Razon = $request->razon;
        $enviar->Nombre = $request->nombre;
        $enviar->IDCatalogo = $request->idcatalogo;

        $enviar->save();

        return redirect()->route('dashboard');
    }

    //Aquí se envian los datos de DeleteDiseno
    public function enviarDiseno(Request $request){
        //Aquí es para actualizar el Estado del diseño en la BD
        $diseno = Diseno::find($request->iddiseno);
        $diseno->Foto = $request->foto;
        $diseno->Textura = $request->textura;
        $diseno->Estado = $request->estado;

        $diseno->save();
        
        //Aquí se envia los datos a la tabla de Diseños eliminados
        $enviarD = new DisenoEliminado();
        $enviarD->Razon = $request->razon;
        $enviarD->Nombre = "My little Pony";
        $enviarD->IDDisenos = $request->iddiseno;
        
        $enviarD->save();
        return redirect()->route('dashboard');
    }

    //Metodo para redireccionar a la pagina de inicio 
    public function dashboard(){
        return view('admin.index');
    }
    
    public function addDesing(Request $request){
        $validator = Validator::make($request->all(), $this->validationsDesing, $this->messagesDesing);
        if ($validator->fails()) 
        {
            session()->flash("error", "«Por favor verifica que los campos del diseño sean correctos»");
            return back()->withErrors($validator)->withInput();
        }

        $diseno = new ModelsDiseno();
        $path = $request->file('foto')->store('public/diseños');
        $diseno->Foto = $path;
        $diseno->Textura = $request->textura;
        $diseno->Estado = $request->estado;
        $diseno->ID_Catalago = $request->id_catalog;
        $diseno->Estado = 1;
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

    //Editar diseño dentro de un catalogo
    public function editarDisenio($iddiseno){
        $diseno = Diseno::find($iddiseno);


        $dcolor = Diseno_color::where('IDDiseno', $iddiseno)->first();
        $ddimen = Diseno_dimension::find($iddiseno);

        return view('admin.editarDisenio')->with([
                'desing' => $diseno,
                'color' => $dcolor,
                'dimen' => $ddimen    
        ]);
    }

    public function editDisenio(Request $request){
        $diseno = Diseno::find($request->iddiseno);
        $diseno->Textura = $request->textura;
        $diseno->Foto = $request->foto;
        $diseno->Estado = 1;
        $diseno->ID_Catalogo = $request->idcatalogo;

        $diseno->save();

    }
    
}
