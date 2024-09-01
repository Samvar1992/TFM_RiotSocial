<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function registroushowform(){
        return view('usuarios\registrouform');
        
    }

    public function registrouform(Request $request){
        $idru = usuario::registrou($request);
        return view('usuarios\RegistrouOK', ['id' => $idru]);
        
    }
}
