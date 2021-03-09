<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ConsumosWebController extends Controller
{
    public function subcategorias($empresa, $categoria_id)
    {
        $subcategorias = DB::table('subcategorias')
                        ->select('id', 'nombre')
                        ->where('empresa_id', 1)
                        ->where('categoria_id', $categoria_id )
                        ->where('status', 41 )
                        ->get();

        return $subcategorias;
    }
}
