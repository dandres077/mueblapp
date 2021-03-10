<?php

namespace App\Http\Controllers;

use App\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class EmpresasController extends Controller
{
/*
}
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $data = DB::table('empresas')
            ->leftJoin('catalogos', 'empresas.tipo_id', '=', 'catalogos.id')
            ->leftJoin('catalogos AS c2', 'empresas.sector_id', '=', 'c2.id')
            ->leftJoin('ciudades', 'empresas.ciudad_id', '=', 'ciudades.id')
            ->select(
                'empresas.*',
                'catalogos.opcion AS nom_tipo',
                'c2.opcion AS nom_sector',
                'ciudades.nombre AS nom_ciudad',)
            ->where('empresas.status', '<>', 3 )
            ->orderByRaw('empresas.id ASC')
            ->get();

        $titulo = 'Empresas';

        return view('empresas.index', compact('data', 'titulo'));

    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $ciudades = DB::table('ciudades')->select('ciudades.*')->where('status', 1 )->get();
        $sectores = DB::table('catalogos')->select('catalogos.*')->where('nombre', 7 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 1 )->where('status', 1 )->get();
        $titulo = 'Empresas';

        return view('empresas.create', compact('titulo', 'ciudades', 'sectores', 'tipos'));
    }


/*
|--------------------------------------------------------------------------
| store
|--------------------------------------------------------------------------
|
*/
    public function store(Request $request)
    {

        $request['user_create'] = Auth::id();
        $data = Empresas::create($request->all());

        return redirect ('admin/empresas')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Empresas::find($id); 
        $ciudades = DB::table('ciudades')->select('ciudades.*')->where('status', 1 )->get();
        $sectores = DB::table('catalogos')->select('catalogos.*')->where('nombre', 7 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 1 )->where('status', 1 )->get();

        $titulo = 'Empresas';

        return view ('empresas.edit')->with (compact('data', 'titulo', 'ciudades', 'sectores', 'tipos'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {

        $data = Empresas::find($id);       
        $data->nombre = $request->input('nombre');
        $data->razon_social = $request->input('razon_social');
        $data->tipo_id = $request->input('tipo_id');
        $data->n_documento = $request->input('n_documento');
        $data->direccion = $request->input('direccion');
        $data->telefono = $request->input('telefono');
        $data->email = $request->input('email');
        $data->sitioweb = $request->input('sitioweb');
        $data->ciudad_id = $request->input('ciudad_id');
        $data->sector_id = $request->input('sector_id');
        $data->user_update = Auth::id();
        $data->save();

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('images',$request->file('imagen'));
            $data->fill(['imagen'=>asset($path)])->save();
        }

        
        return redirect ('admin/empresas')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Empresas::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/empresas');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Empresas::find($id);
        $data->status = 1;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/empresas');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Empresas::find($id);
        $data->status = 2;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/empresas');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function empresas()
    {

        $data = DB::table('empresas')
                ->leftJoin('catalogos', 'empresas.tipo_id', '=', 'catalogos.id')
                ->leftJoin('catalogos AS c2', 'empresas.sector_id', '=', 'c2.id')
                ->leftJoin('ciudades', 'empresas.ciudad_id', '=', 'ciudades.id')
                ->select(
                    'empresas.*',
                    DB::raw('(CASE WHEN empresas.status = 1 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),
                    'catalogos.opcion AS nom_tipo',
                    'c2.opcion AS nom_sector',
                    'ciudades.nombre AS nom_ciudad',)
                ->where('empresas.status', '<>', 3 )
                ->orderByRaw('empresas.id ASC')
                ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'empresas.actions')
            ->rawColumns(['btn'])
            ->toJson();
    
    }
}
