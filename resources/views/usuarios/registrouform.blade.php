@extends('general')

@section('title', "Registro de usuario")

@section('content')
    <form action="{{ route('registrouform')}}" method="POST">
        @csrf
        <label for="">Correo</label>
        <input type="correo" name="correo">
        <label for="">Contraseña</label>
        <input type="password" name="contraseña">
        <label for="">Alias</label>
        <input type="text" name="alias">
        <input type="submit" value="Registrar">

    </form>

@endsection