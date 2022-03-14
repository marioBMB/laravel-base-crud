@extends('layouts.app')


@section('content')

    <h2>{{$comic->title}}</h2>

    <p>{{$comic->description}}</p>
    <img src="{{$comic->thumb}}" alt="">

    <a href="{{route('comics.destroy', $comic->id)}}" class='btn btn-danger'>Elimina</a>
    <a href="{{route("products.index")}}"><button type="button" class="btn btn-primary">Indietro</button></a>
@endsection