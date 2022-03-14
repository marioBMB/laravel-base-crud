@extends('layouts.app')

@section('page-title', "elenco fumetti")


@section('content')
<a href="{{route("comics.create")}}"><button type="button" class="btn btn-success">aggiungi</button></a>

    <table class="table">
        <thead>
        <tr>
            <th scope="row">#</th>
            <th scope="col">titolo</th>
            <th scope="col">descrizione</th>
            <th scope="col">tipo</th>
            <th scope="col">thumb</th>
            <th scope="col">prezzo</th>
            <th scope="col">serie</th>
            <th scope="col">data di vendita</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
            <tr>
                <th scope="row">{{$comic->id}}</th>
                <td>{{$comic->title}}</td>
                <td>{{$comic->description}}</th>
                <td>{{$comic->type}}</th>
                <td>{{$comic->thumb}}</th>
                <td>{{$comic->price}} $</th>
                <td>{{$comic->series}}</th>
                <td>{{$comic->sale_date}}</th>
                <td>
                <a href="{{route("comics.show", $comic->id)}}"><button type="button" class="btn btn-primary">vedi</button></a>
                <a href="{{route("comics.edit", $comic->id)}}"><button type="button" class="btn btn-warning">modifica</button></a>
                <form action="{{route("comics.destroy", $comic->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">X</button>
                </form>
            </th>
            </tr>
            @endforeach
        
        </tbody>
    </table>
@endsection
