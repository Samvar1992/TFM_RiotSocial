<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\publicacion;
use Illuminate\Http\Request;

class publicacionController extends Controller

{

    public function nuevapushowform(){
        return view('usuarios\publicacionuform');
        
    }

    public function nuevapuform(Request $request){
        $idpu = publicacion::nuevapu($request);
        return view('usuarios\publicacionuOK', ['id' => $idpu]);
        
    }

    public function showallpu(){
        $publicacion = publicacion::mostrarpu();
        return view('usuarios.perfilu', ['publicacion' => $publicacion]);

    }

//     // public function modificarp($id){

//     //     publicacion::modificarp($id);

//     // }

//     // public function eliminarp($id){

//     //     publicacion::eliminarp($id);

//     // }

//     // public function publicacionu(){
//     //     return view("usuarios\publicacionu");
    
//     // }

}
