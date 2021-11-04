<?php

namespace App\Http\Controllers;

use App\Almacenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AlmacenesController extends Controller
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
        $titulo = 'Almacenes';            

        return view('almacenes.index', compact('titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $titulo = 'Almacenes';

        return view('almacenes.create', compact('titulo'));
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
        $data = Almacenes::create($request->all());

        return redirect ('admin/almacenes')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Almacenes::find($id); 
        $this->authorize('view', $data); 

        $titulo = 'Almacenes';

        return view ('categorias.edit')->with (compact('data', 'titulo'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    { 
        $data = Almacenes::find($id);
        $this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Almacenes::find($id)->update($request->all());    
        
        return redirect ('admin/almacenes')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Almacenes::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/almacenes');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Almacenes::find($id);
        $this->authorize('view', $data);
        $data->status = 37;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/almacenes');
    }
    
    
/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Almacenes::find($id);
        $this->authorize('view', $data);
        $data->status = 38;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/almacenes');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function almacenes()
    {

        $data = DB::table('almacenes')
                    ->select('almacenes.*',
                            DB::raw('(CASE WHEN almacenes.status = 37 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),)
                    ->where('almacenes.empresa_id', Auth::user()->empresa_id )
                    ->orderByRaw('id ASC')
                    ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'almacenes.actions')
            ->rawColumns(['btn'])
            ->toJson();

    }
}
        
    