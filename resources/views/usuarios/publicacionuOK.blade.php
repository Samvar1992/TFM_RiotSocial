@extends('general')

@section('title', "Publicación Añadida")

@section('content')

    @if( $id > 0 )
        <p>Se ha publicado correctamente</p>

    @else
        <p>Ha ocurrido un error al publicar</p>

    @endif

@endsection