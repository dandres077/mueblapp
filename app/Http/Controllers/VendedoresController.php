<?php

namespace App\Http\Controllers;

use App\Vendedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class VendedoresController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Vendedores';            

        return view('vendedores.index', compact('titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $titulo = 'Vendedores';

        return view('vendedores.create', compact('titulo'));
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
        $data = Vendedores::create($request->all());

        return redirect ('admin/vendedores')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Vendedores::find($id); 
        $titulo = 'Vendedores';

        return view ('vendedores.edit')->with (compact('data', 'titulo'));
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
        $datos = Vendedores::find($id)->update($request->all());    
        
        return redirect ('admin/vendedores')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Vendedores::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/vendedores');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Vendedores::find($id);
        $data->status = 114;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/vendedores');
    }
    
    
/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Vendedores::find($id);
        $data->status = 115;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/vendedores');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function vendedores()
    {

        $data = DB::table('vendedores')
                    ->select('vendedores.*',
                            DB::raw('(CASE WHEN status = 116 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),)
                    ->where('empresa_id', Auth::user()->empresa_id )
                    ->orderByRaw('id ASC')
                    ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'vendedores.actions')
            ->rawColumns(['btn'])
            ->toJson();

    }
}
