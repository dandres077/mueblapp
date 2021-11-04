<?php

namespace App\Http\Controllers;

use App\Terceros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TercerosController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Terceros';

        return view('terceros.index', compact('titulo'));
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
        $terceros = DB::table('catalogos')->select('catalogos.*')->where('nombre', 8 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 3 )->where('status', 1 )->get();
        $titulo = 'Terceros';

        return view('terceros.create', compact('titulo', 'ciudades', 'terceros', 'tipos'));
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
        $data = Terceros::create($request->all());

        return redirect ('admin/terceros')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {
        $data = Terceros::find($id); 
        $this->authorize('view', $data);

        $ciudades = DB::table('ciudades')->select('ciudades.*')->where('status', 1 )->get();
        $terceros = DB::table('catalogos')->select('catalogos.*')->where('nombre', 8 )->where('status', 1 )->get();
        $tipos = DB::table('catalogos')->select('catalogos.*')->where('nombre', 3 )->where('status', 1 )->get();

        $titulo = 'Terceros';

        return view ('terceros.edit')->with (compact('data', 'titulo', 'ciudades', 'terceros', 'tipos'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {
        $data = Terceros::find($id);
        $this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Terceros::find($id)->update($request->all());  
        
        return redirect ('admin/terceros')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Terceros::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/terceros');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Terceros::find($id);
        $this->authorize('view', $data);
        $data->status = 118;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/terceros');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Terceros::find($id);
        $this->authorize('view', $data);
        $data->status = 119;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/terceros');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function terceros()
    {

        $data = DB::table('terceros')
                ->leftJoin('catalogos', 'terceros.tipo_id', '=', 'catalogos.id')
                ->leftJoin('catalogos AS c2', 'terceros.tipo_tercero', '=', 'c2.id')
                ->leftJoin('ciudades', 'terceros.ciudad_id', '=', 'ciudades.id')
                ->select(
                    'terceros.*',
                    DB::raw('(CASE WHEN terceros.status = 118 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),
                    'catalogos.opcion AS nom_tipo',
                    'c2.opcion AS nom_tercero',
                    'ciudades.nombre AS nom_ciudad',)
                ->where('terceros.empresa_id', Auth::user()->empresa_id )
                ->orderByRaw('terceros.id ASC')
                ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'terceros.actions')
            ->rawColumns(['btn'])
            ->toJson();
    
    }
}
