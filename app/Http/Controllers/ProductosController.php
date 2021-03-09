<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class ProductosController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Productos';

        return view('productos.index', compact('titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $tipos = DB::table('catalogos')->where('nombre', 12 )->where('status', 1 )->get();
        $categorias = DB::table('categorias')->where('empresa_id', Auth::user()->empresa_id )->where('status', 39 )->get();
        $subcategorias = DB::table('subcategorias')
                            ->where('empresa_id', Auth::user()->empresa_id )
                            ->where('categoria_id', $categorias[0]->id )
                            ->where('status', 41 )
                            ->get();
        
        $empresa = Auth::user()->empresa_id;
        $titulo = 'Productos';

        return view('productos.create', compact('titulo', 'tipos', 'categorias', 'subcategorias', 'empresa'));
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
        $data = Productos::create($request->all());

        return redirect ('admin/productos')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {
        $data = Productos::find($id); 
        $tipos = DB::table('catalogos')->where('nombre', 12 )->where('status', 1 )->get();
        $categorias = DB::table('categorias')->where('empresa_id', Auth::user()->empresa_id )->where('status', 39 )->get();
        $subcategorias = DB::table('subcategorias')->where('empresa_id', Auth::user()->empresa_id )->where('status', 41 )->get();

        $empresa = Auth::user()->empresa_id;
        $titulo = 'Productos';

        return view ('productos.edit')->with (compact('data', 'titulo', 'tipos', 'categorias', 'subcategorias', 'empresa'));
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
        $datos = Productos::find($id)->update($request->all());  
        
        return redirect ('admin/productos')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Productos::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/productos');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Productos::find($id);
        $data->status = 120;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/productos');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Productos::find($id);
        $data->status = 121;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/productos');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function productos()
    {

        $data = DB::table('productos')
                ->leftJoin('catalogos', 'productos.tipo_producto', '=', 'catalogos.id')
                ->leftJoin('categorias', 'productos.categoria_id', '=', 'categorias.id')
                ->leftJoin('subcategorias', 'productos.subcategoria_id', '=', 'subcategorias.id')
                ->select(
                    'productos.*',
                    DB::raw('(CASE WHEN productos.status = 120 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),
                    'catalogos.opcion AS nom_tipo',
                    'categorias.nombre AS nom_categoria',
                    'subcategorias.nombre AS nom_subcategoria',)
                ->where('productos.empresa_id', Auth::user()->empresa_id )
                ->orderByRaw('productos.id ASC')
                ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'productos.actions')
            ->rawColumns(['btn'])
            ->toJson();
    
    }
}