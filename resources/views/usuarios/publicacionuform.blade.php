@extends('general')

@section('title', "Nueva Publicación")

@section('content')
    <form action="{{ route('nuevapuform')}}" method="POST">
        @csrf
        <label for="">Título</label>
        <input type="string" name="titulo">
        <label for="">Resumen</label>
        <input type="text" name="resumen">
        <label for="">Juego:</label>
        <label for="">League of Legends</label>
        <input type="radio" name="juego" value="1">
        <label for="">League of Legends Wild Rift</label>
        <input type="radio" name="juego" value="2">
        <label for="">Valorant</label>
        <input type="radio" name="juego" value="3">
        <input type="submit" value="Publicar">
    </form>

@endsection