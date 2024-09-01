<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class publicacion extends Model
{
    use HasFactory;

    public static function nuevapu(Request $request){
        $publicacion = new publicacion();
        $publicacion->titulo = $request->input('titulo');
        $publicacion->resumen = $request->input('resumen');
        $publicacion->juego = $request->input('juego');
        $publicacion->save();

        return $publicacion->id;

    }


    public static function mostrarpu(){
        return publicacion::all();

    }

    // public static function modificarp($id, $request){

    //     $publicacion = publicacion::find($id);
    //     $publicacion->titulo = $request->input('titulo');
    //     $publicacion->resumen = $request->input('resumen');
    //     $publicacion->imagen = $request->input('imagen');
    //     $publicacion->save();

    // }

    // public static function eliminarp($id){

    //     $publicacion = publicacion::find($id);
    //     $publicacion->delete();

    // }



}
