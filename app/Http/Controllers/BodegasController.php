<?php

namespace App\Http\Controllers;

use App\Bodegas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class BodegasController extends Controller
{
/*
|--------------------------------------------------------------------------
| index
|--------------------------------------------------------------------------
|
*/

    public function index()
    {
        $data = DB::table('bodegas')
                    ->orderByRaw('id ASC')
                    ->get();

        $titulo = 'Bodegas';
        

        return view('bodegas.index', compact('data', 'titulo'));
    }


/*
|--------------------------------------------------------------------------
| create
|--------------------------------------------------------------------------
|
*/

    public function create()
    {
        $titulo = 'Bodegas';

        return view('bodegas.create', compact('titulo'));
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
        $data = Bodegas::create($request->all());

        return redirect ('admin/bodegas')->with('success', 'Registro creado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| edit
|--------------------------------------------------------------------------
|
*/

    public function edit($id)
    {

        $data = Bodegas::find($id); 
        $titulo = 'Bodegas';

        return view ('bodegas.edit')->with (compact('data', 'titulo'));
    }



/*
|--------------------------------------------------------------------------
| update
|--------------------------------------------------------------------------
|
*/
    public function update(Request $request, $id)
    {

        $data = Bodegas::find($id);
        $data->nombre = $request->input('nombre');
        $data->user_update = Auth::id();
        $data->save();

        
        return redirect ('admin/bodegas')->with('success', 'Registro actualizado exitosamente');
    }



/*
|--------------------------------------------------------------------------
| destroy
|--------------------------------------------------------------------------
|
*/

    /*public function destroy($id)
    {
        $data = Bodegas::find($id);
        $data->status = ;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/bodegas');
    }*/


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = Bodegas::find($id);
        $data->status = 37;
        $data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/bodegas');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = Bodegas::find($id);
        $data->status = 38;
        $data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/bodegas');
    }
}

