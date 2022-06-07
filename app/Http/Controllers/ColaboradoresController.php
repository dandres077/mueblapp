<?php

namespace App\Http\Controllers;

use App\Colaboradores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ColaboradoresController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Colaboradores';

        return view('colaboradores.index', compact('titulo'));
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
        $colaboradores = DB::table('catalogos')->select('catalogos.*')->where('nombre', 8 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 3 )->where('status', 1 )->get();
        $titulo = 'Colaboradores';

        return view('colaboradores.create', compact('titulo', 'ciudades', 'colaboradores', 'tipos'));
    }


/*
|--------------------------------------------------------------------------
| store
|--------------------------------------------------------------------------
|
*/
    public function store(Request $request)
    {

        $request['empresa_id'] = Auth::user()->empresa_id;
        $request['user_create'] = Auth::id();
        $data = Colaboradores::create($request->all());

        return redirect ('admin/colaboradores')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {
        $data = Colaboradores::find($id); 
        //$this->authorize('view', $data);

        $ciudades = DB::table('ciudades')->select('ciudades.*')->where('status', 1 )->get();
        $colaboradores = DB::table('catalogos')->select('catalogos.*')->where('nombre', 8 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 3 )->where('status', 1 )->get();

        $titulo = 'Colaboradores';

        return view ('colaboradores.edit')->with (compact('data', 'titulo', 'ciudades', 'colaboradores', 'tipos'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {
        $data = Colaboradores::find($id);
        //$this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Colaboradores::find($id)->update($request->all());  
        
        return redirect ('admin/colaboradores')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Colaboradores::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/colaboradores');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Colaboradores::find($id);
        //$this->authorize('view', $data);
        $data->status = 118;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/colaboradores');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Colaboradores::find($id);
        //$this->authorize('view', $data);
        $data->status = 119;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/colaboradores');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function colaboradores()
    {

        $data = DB::table('colaboradores')
                ->leftJoin('catalogos', 'colaboradores.tipo_id', '=', 'catalogos.id')
                ->leftJoin('catalogos AS c2', 'colaboradores.tipo_tercero', '=', 'c2.id')
                ->leftJoin('ciudades', 'colaboradores.ciudad_id', '=', 'ciudades.id')
                ->select(
                    'colaboradores.*',
                    DB::raw('(CASE WHEN colaboradores.status = 118 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),
                    'catalogos.opcion AS nom_tipo',
                    'c2.opcion AS nom_tercero',
                    'ciudades.nombre AS nom_ciudad',)
                ->where('colaboradores.empresa_id', Auth::user()->empresa_id )
                ->orderByRaw('colaboradores.id ASC')
                ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'colaboradores.actions')
            ->rawColumns(['btn'])
            ->toJson();
    
    }
}

