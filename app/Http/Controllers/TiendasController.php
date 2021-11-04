<?php

namespace App\Http\Controllers;

use App\Tiendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TiendasController extends Controller
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
        $titulo = 'Tiendas';            

        return view('tiendas.index', compact('titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $titulo = 'Tiendas';

        return view('tiendas.create', compact('titulo'));
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
        $data = Tiendas::create($request->all());

        return redirect ('admin/tiendas')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Tiendas::find($id); 
        $this->authorize('view', $data); 

        $titulo = 'Tiendas';

        return view ('tiendas.edit')->with (compact('data', 'titulo'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    { 

        $data = Tiendas::find($id);
        $this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Tiendas::find($id)->update($request->all());    
        
        return redirect ('admin/tiendas')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Tiendas::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/tiendas');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Tiendas::find($id);
        $this->authorize('view', $data);
        $data->status = 114;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/tiendas');
    }
    
    
/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Tiendas::find($id);
        $this->authorize('view', $data);
        $data->status = 115;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/tiendas');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function tiendas()
    {

        $data = DB::table('tiendas')
                    ->select('tiendas.*',
                            DB::raw('(CASE WHEN status = 114 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),)
                    ->where('empresa_id', Auth::user()->empresa_id )
                    ->orderByRaw('id ASC')
                    ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'tiendas.actions')
            ->rawColumns(['btn'])
            ->toJson();

    }
}
