<?php

namespace App\Http\Controllers;

use App\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class ProveedoresController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Proveedores';

        return view('proveedores.index', compact('titulo'));
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
        $proveedores = DB::table('catalogos')->select('catalogos.*')->where('nombre', 8 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 3 )->where('status', 1 )->get();
        $titulo = 'Proveedores';

        return view('proveedores.create', compact('titulo', 'ciudades', 'proveedores', 'tipos'));
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
        $data = Proveedores::create($request->all());

        return redirect ('admin/proveedores')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {
        $data = Proveedores::find($id); 
        //$this->authorize('view', $data);

        $ciudades = DB::table('ciudades')->select('ciudades.*')->where('status', 1 )->get();
        $proveedores = DB::table('catalogos')->select('catalogos.*')->where('nombre', 8 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 3 )->where('status', 1 )->get();

        $titulo = 'Proveedores';

        return view ('proveedores.edit')->with (compact('data', 'titulo', 'ciudades', 'proveedores', 'tipos'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {
        $data = Proveedores::find($id);
        //$this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Proveedores::find($id)->update($request->all());  
        
        return redirect ('admin/proveedores')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Proveedores::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/proveedores');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Proveedores::find($id);
        //$this->authorize('view', $data);
        $data->status = 118;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/proveedores');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Proveedores::find($id);
        //$this->authorize('view', $data);
        $data->status = 119;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/proveedores');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function proveedores()
    {

        $data = DB::table('proveedores')
                ->leftJoin('catalogos', 'proveedores.tipo_id', '=', 'catalogos.id')
                ->leftJoin('catalogos AS c2', 'proveedores.tipo_tercero', '=', 'c2.id')
                ->leftJoin('ciudades', 'proveedores.ciudad_id', '=', 'ciudades.id')
                ->select(
                    'proveedores.*',
                    DB::raw('(CASE WHEN proveedores.status = 118 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),
                    'catalogos.opcion AS nom_tipo',
                    'c2.opcion AS nom_tercero',
                    'ciudades.nombre AS nom_ciudad',)
                ->where('proveedores.empresa_id', Auth::user()->empresa_id )
                ->orderByRaw('proveedores.id ASC')
                ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'proveedores.actions')
            ->rawColumns(['btn'])
            ->toJson();
    
    }
}

