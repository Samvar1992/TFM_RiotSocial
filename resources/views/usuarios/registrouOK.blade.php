@extends('general')

@section('title', "Usuario Registrado")

@section('content')

    @if( $id > 0 )
        <p>Se ha registrado correctamente</p>

    @else
        <p>Ha ocurrido un error al registrar</p>

    @endif

@endsection