<?php

namespace App\Http\Controllers;

use App\Campanas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CampanasController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $titulo = 'Campañas';            

        return view('campanas.index', compact('titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $titulo = 'Campañas';

        return view('campanas.create', compact('titulo'));
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
        $data = Campanas::create($request->all());

        return redirect ('admin/campanas')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Campanas::find($id); 
        $this->authorize('view', $data); 

        $titulo = 'Campañas';

        return view ('campanas.edit')->with (compact('data', 'titulo'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    { 
        $data = Campanas::find($id);
        $this->authorize('view', $data);  

        $request['user_update'] = Auth::id();
        $datos = Campanas::find($id)->update($request->all());    
        
        return redirect ('admin/campanas')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    public function destroy($id)
    {
        $data = Campanas::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/campanas');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Campanas::find($id);
        $this->authorize('view', $data);
        $data->status = 114;
        $data->user_update = Auth::id();
        $data->save();
    
        return redirect ('admin/campanas');
    }
    
    
/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Campanas::find($id);
        $this->authorize('view', $data);
        $data->status = 115;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/campanas');
    }

/*
}
|--------------------------------------------------------------------------
| Datatable
|--------------------------------------------------------------------------
|
*/

    public function campanas()
    {

        $data = DB::table('campanas')
                    ->select('campanas.*',
                            DB::raw('(CASE WHEN status = 93 THEN "Activo" ELSE "Inactivo" END) AS estado_elemento'),)
                    ->where('empresa_id', Auth::user()->empresa_id )
                    ->orderByRaw('id ASC')
                    ->get();

        return datatables()
            ->of($data)
            ->addColumn('btn', 'campanas.actions')
            ->rawColumns(['btn'])
            ->toJson();

    }
}
