<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CategoriasController extends Controller
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
        $data = DB::table('categorias')
                    ->select('categorias.*')
                    //->where('status', '<>', 3 )
                    ->orderByRaw('id ASC')
                    ->get();

        $titulo = 'Categorías';            

        return view('categorias.index', compact('data', 'titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $titulo = 'Categorías';

        return view('categorias.create', compact('titulo'));
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
        $data = Categorias::create($request->all());

        return redirect ('admin/categorias')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Categorias::find($id); 
        $titulo = 'Categorías';

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

        $request['user_update'] = Auth::id();
        $datos = Categorias::find($id)->update($request->all());    
        
        return redirect ('admin/categorias')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Categorias::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/categorias');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Categorias::find($id);
        $data->status = 39;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/categorias');
    }
    
    
/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Categorias::find($id);
        $data->status = 40;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/categorias');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function categorias()
    {

        $data = DB::table('categorias')
                    ->select('categorias.*',
                            DB::raw('(CASE WHEN categorias.status = 39 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),)
                    //->where('status', '<>', 3 )
                    ->orderByRaw('id ASC')
                    ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'categorias.actions')
            ->rawColumns(['btn'])
            ->toJson();

    }
}
    
