<?php

namespace App\Http\Controllers;

use App\Ubicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class UbicacionesController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $data = DB::table('ubicaciones')
                    ->where('status', '!=' ,3 )
                    ->orderByRaw('id ASC')
                    ->get();

        $titulo = 'Ubicaciones';
        

        return view('ubicaciones.index', compact('data', 'titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $titulo = 'Ubicaciones';

        return view('ubicaciones.create', compact('titulo'));
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
        $data = Ubicaciones::create($request->all());

        return redirect ('admin/ubicaciones')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Ubicaciones::find($id); 
        $titulo = 'Ubicaciones';

        return view ('ubicaciones.edit')->with (compact('data', 'titulo'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {

        $data = Ubicaciones::find($id);
        $data->nombre = $request->input('nombre');
        $data->user_update = Auth::id();
        $data->save();

        
        return redirect ('admin/ubicaciones')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    /*public function destroy($id)
    {
        $data = Ubicaciones::find($id);
        $data->status = 3;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/ubicaciones');
    }*/


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Ubicaciones::find($id);
        $data->status = 37;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/ubicaciones');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Ubicaciones::find($id);
        $data->status = 38;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/ubicaciones');
    }
}
