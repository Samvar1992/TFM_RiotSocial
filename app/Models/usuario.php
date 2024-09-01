<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class usuario extends Model
{
    use HasFactory;

    public static function registrou(Request $request){

        $usuario = new usuario();
        $usuario->correo = $request->input('correo');
        $usuario->contraseña = $request->input('contraseña');
        $usuario->alias = $request->input('alias');
        $usuario->save();

        return $usuario->id;

    }






}
