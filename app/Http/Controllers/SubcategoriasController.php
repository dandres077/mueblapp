<?php

namespace App\Http\Controllers;

use App\Subcategorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SubcategoriasController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Subcategorias';

        return view('subcategorias.index', compact('titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $categorias = DB::table('categorias')->where('empresa_id', Auth::user()->empresa_id )->where('status', 39 )->get();
        $titulo = 'Subcategorias';

        return view('subcategorias.create', compact('titulo', 'categorias'));
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
        $data = Subcategorias::create($request->all());

        return redirect ('admin/subcategorias')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Subcategorias::find($id); 
        $this->authorize('view', $data);
        
        $categorias = DB::table('categorias')->where('empresa_id', Auth::user()->empresa_id )->where('status', 39)->get();        
        $titulo = 'Subcategorias';

        return view ('subcategorias.edit')->with (compact('data', 'titulo', 'categorias'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {
        $data = Subcategorias::find($id);
        $this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Subcategorias::find($id)->update($request->all());    
        
        return redirect ('admin/subcategorias')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Subcategorias::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/subcategorias')->with('eliminar', 'ok');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Subcategorias::find($id);
        $this->authorize('view', $data);
        $data->status = 41;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/subcategorias');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Subcategorias::find($id);
        $this->authorize('view', $data);
        $data->status = 42;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/subcategorias');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function subcategorias()
    {

        $data = DB::table('subcategorias')
                ->leftJoin('categorias', 'subcategorias.categoria_id', '=', 'categorias.id')
                ->select(
                    'subcategorias.id',
                    'subcategorias.nombre AS nom_subcategoria',
                    'subcategorias.status',
                    'categorias.nombre AS nom_categoria',
                    DB::raw('(CASE WHEN subcategorias.status = 41 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'))
                ->where('subcategorias.empresa_id', Auth::user()->empresa_id )
                ->orderByRaw('subcategorias.id ASC')
                ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'subcategorias.actions')
            ->rawColumns(['btn'])
            ->toJson();

    }
}



