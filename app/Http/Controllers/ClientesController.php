<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ClientesController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Clientes';

        return view('clientes.index', compact('titulo'));
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
        $clientes = DB::table('catalogos')->select('catalogos.*')->where('nombre', 8 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 3 )->where('status', 1 )->get();
        $titulo = 'Clientes';

        return view('clientes.create', compact('titulo', 'ciudades', 'clientes', 'tipos'));
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
        $data = Clientes::create($request->all());

        return redirect ('admin/clientes')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {
        $data = Clientes::find($id); 
        //$this->authorize('view', $data);

        $ciudades = DB::table('ciudades')->select('ciudades.*')->where('status', 1 )->get();
        $clientes = DB::table('catalogos')->select('catalogos.*')->where('nombre', 8 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 3 )->where('status', 1 )->get();

        $titulo = 'Clientes';

        return view ('clientes.edit')->with (compact('data', 'titulo', 'ciudades', 'clientes', 'tipos'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {
        $data = Clientes::find($id);
        //$this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Clientes::find($id)->update($request->all());  
        
        return redirect ('admin/clientes')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Clientes::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/clientes');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Clientes::find($id);
        //$this->authorize('view', $data);
        $data->status = 118;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/clientes');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Clientes::find($id);
        //$this->authorize('view', $data);
        $data->status = 119;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/clientes');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function clientes()
    {

        $data = DB::table('clientes')
                ->leftJoin('catalogos', 'clientes.tipo_id', '=', 'catalogos.id')
                ->leftJoin('catalogos AS c2', 'clientes.tipo_tercero', '=', 'c2.id')
                ->leftJoin('ciudades', 'clientes.ciudad_id', '=', 'ciudades.id')
                ->select(
                    'clientes.*',
                    DB::raw('(CASE WHEN clientes.status = 118 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),
                    'catalogos.opcion AS nom_tipo',
                    'c2.opcion AS nom_tercero',
                    'ciudades.nombre AS nom_ciudad',)
                ->where('clientes.empresa_id', Auth::user()->empresa_id )
                ->orderByRaw('clientes.id ASC')
                ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'clientes.actions')
            ->rawColumns(['btn'])
            ->toJson();
    
    }
}

