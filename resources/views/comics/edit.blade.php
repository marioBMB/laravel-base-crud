@extends('layouts.app')

@section('title','lista fumetti')

@section('content')
    <h1>Modifica prodotto: {{$comic->title}}</h1>
    <form action="{{route("comics.update", $comic->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il nome del prodotto" value="{{$comic->name}}">
        </div>

        <div class="form-group">
            <label for="type">Tipo fumetto</label>
            <select class="form-control form-control-md" id="type" name="type">
                <option value="comic" {{$comic->type == "comic book"? "selected": ""}}>Comic book</option>
                <option value="novel" {{$comic->type == "graphic novel"? "selected": ""}}>Graphic novel</option>
            </select>
        </div>

        <div class="form-group">
            <label for="series">Serie</label>
            <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci il tempo di cottura"value="{{$comic->series}}">
        </div>

        <div class="form-group">
            <label for="price">Prezzo ($)</label>
            <input type="number" class="form-control" id="price" name="price" min="1" step="0.01" placeholder="Inserisci il peso del prodotto" value="{{$comic->price}}">
        </div>


        <div class="form-group">
            <label for="description">Data di vendita</label>
            <textarea class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la descrizione del prodotto">{{$comic->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" placeholder="Inserisci la descrizione del prodotto">{{$comic->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="thumb">Immagine</label>
            <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci l'url dell'immagine prodotto" value="{{$comic->image}}">
        </div>


        <button type="submit" class="btn btn-primary">Conferma</button>
    </form>
@endsection