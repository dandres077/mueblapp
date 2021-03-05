<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\UsuariosUpdateRequest;
use App\User;
use DB;

class UserController extends Controller
{

/*-- ----------------------------
-- Index
-- ----------------------------*/

     public function index() 
    {

        //$data = User::all();

        $data = DB::table('users')
            ->leftJoin('empresas', 'users.colegio_id', '=', 'empresas.id')
            ->select(
                'users.*',
                'empresas.nombre AS nom_empresa')
            ->orderByRaw('users.id ASC')
            ->get();


        return view ('usuarios.index')->with (compact('data'));

    }


/*-- ----------------------------
-- Create
-- ----------------------------*/

    public function create() 
    {

        $roles = Role::get();
        $colegios = DB::table('colegios')->select('id', 'nombre')->where('status', 1 )->orderByRaw('nombre ASC')->get();

        return view ('usuarios.create')->with (compact('roles', 'colegios'));

    }

/*-- ----------------------------
-- Store
-- ----------------------------*/
    public function store(UsuariosRequest $request) 
    {

    	$user = new User();
        $user->name = $request->input('name');
        $user->last = $request->input('last');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->colegio_id = $request->input('colegio_id');
    	$user->save();

        $user->roles()->sync($request->get('roles'));        

        return redirect ('admin/usuarios')->with('success', 'Registro creado exitosamente');
    }


/*-- ----------------------------
-- Edit
-- ----------------------------*/
    public function edit($id) 
    {
        $user = User::find($id);        
        $roles = Role::get();
        $rol_user = DB::table('model_has_roles')
            ->select('model_has_roles.*')
            ->where('model_id', '=', $id)
            ->get();

        $colegios = DB::table('colegios')->select('id', 'nombre')->where('status', 1 )->orderByRaw('nombre ASC')->get();

        return view ('usuarios.edit')->with(compact('user', 'roles', 'rol_user', 'colegios'));
    }


/*-- ----------------------------
-- Update
-- ----------------------------*/
    public function update(UsuariosUpdateRequest $request, $id)
    {

    	$user = User::find($id);
        $user->name = $request->input('name');
        $user->last = $request->input('last');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->colegio_id = $request->input('colegio_id');
        $user->save();

        $user->roles()->sync($request->get('roles'));        

        return redirect ('admin/usuarios')->with('success', 'Registro creado exitosamente');
    }



/*-- ----------------------------
-- Destroy
-- ----------------------------*/
    public function destroy($id) 
    {
        $user = User::find($id);
        $user->status = 3;
        $user->save();
        return back();
    }


/*-- ----------------------------
-- Show
-- ----------------------------*/

     public function show() 
    {
        $users = DB::table('users')
            ->select(
                'users.*')
            ->where('users.id', Auth::id())
            ->get();

        return view ('usuarios.show')->with (compact('users'));
    }


/*-- ----------------------------
    -- Edit Perfil
    -- ----------------------------*/
    public function editarperfil($id) 
    {
        if ($id != Auth::id())
        return redirect('perfil');

        $user = User::find($id); 

        return view ('usuarios.editperfil')->with(compact('user'));
    }


/*-- ----------------------------
-- Update Perfil
-- ----------------------------*/
    public function updateperfil(Request $request, $id)
    {      
        if ($id != Auth::id())
        return redirect('perfil');    

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->last = $request->input('last');
        $user->save();
        
        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('img/users',$request->file('imagen'));
            $user->fill(['imagen'=>asset($path)])->save();
        }

        //$idioma = session(['lang' => Auth::user()->lang]);

        return redirect ('admin/perfil')->with('success', 'Perfil actualizado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| Activar publicación
|--------------------------------------------------------------------------
|
*/

    public function active($id)
    {

        $data = User::find($id);
        $data->status = 1;
        //$data->user_update = Auth::id();
        $data->save();
  
        return redirect ('admin/usuarios')->with('success', 'Registro activado exitosamente');
    }


/*
|--------------------------------------------------------------------------
| Desactivar publicación
|--------------------------------------------------------------------------
|
*/

    public function inactive($id)
    {
        $data = User::find($id);
        $data->status = 2;
        //$data->user_update = Auth::id();
        $data->save();

        return redirect ('admin/usuarios')->with('success', 'Registro inactivado exitosamente');
    }
}
