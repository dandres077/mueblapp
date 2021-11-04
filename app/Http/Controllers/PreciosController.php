<?php

namespace App\Http\Controllers;

use App\Precios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PreciosController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Precios';

        return view('precios.index', compact('titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $productos = DB::table('productos')->where('empresa_id', Auth::user()->empresa_id )->where('status', 120 )->get();
        $titulo = 'Precios';

        return view('precios.create', compact('titulo', 'productos'));
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
        $data = Precios::create($request->all());

        return redirect ('admin/precios')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Precios::find($id); 
        $this->authorize('view', $data); 

        $productos = DB::table('productos')->where('empresa_id', Auth::user()->empresa_id )->where('status', 120 )->get();       
        $titulo = 'Precios';

        return view ('precios.edit')->with (compact('data', 'titulo', 'productos'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {
        $data = Precios::find($id);
        $this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Precios::find($id)->update($request->all());    
        
        return redirect ('admin/precios')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Precios::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/precios')->with('eliminar', 'ok');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Precios::find($id);
        $this->authorize('view', $data);
        $data->status = 122;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/precios');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Precios::find($id);
        $this->authorize('view', $data);
        $data->status = 123;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/precios');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function precios()
    {

        $data = DB::table('precios')
                ->leftJoin('productos', 'precios.producto_id', '=', 'productos.id')
                ->select(
                    'precios.*',
                    'productos.nombre AS nom_producto',
                    DB::raw('(CASE WHEN precios.status = 122 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'))
                ->where('precios.empresa_id', Auth::user()->empresa_id )
                ->orderByRaw('precios.id ASC')
                ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'precios.actions')
            ->rawColumns(['btn'])
            ->toJson();

    }
}
