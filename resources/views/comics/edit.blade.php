@extends('layouts.app')

@section('title','lista fumetti')

@section('content')
    <h1>Modifica prodotto: {{$comic->title}}</h1>
    <form action="{{route("comics.update", $comic->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del prodotto" value="{{old('title')??$comic->title}}">
            
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
             @enderror
        </div>

        <div class="form-group">
            <label for="type">Tipo fumetto</label>
            <select class="form-control form-control-md" id="type" name="type">

                @php
                    $selected = old('type')?? $comic->type;
                @endphp

                <option value="comic" {{$selected == "comic book"? "selected": ""}}>Comic book</option>
                <option value="novel" {{$selected == "graphic novel"? "selected": ""}}>Graphic novel</option>
            </select>
        </div>

        <div class="form-group">
            <label for="series">Serie</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" placeholder="Inserisci il tempo di cottura"value="{{old('series')??$comic->series}}">
            
            @error('series')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Prezzo ($)</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" min="0.5" step="0.01" placeholder="Inserisci il peso del prodotto" value="{{old('price')??$comic->price}}">
            @error('price')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sale_date">Data di vendita</label>
            <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" placeholder="Inserisci la descrizione del prodotto" value="{{old('sale_date')??$comic->description}}">
            @error('sale_date')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci la descrizione del prodotto">{{old('')??$comic->description}}</textarea>
            @error('description')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="thumb">Immagine</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" placeholder="Inserisci l'url dell'immagine prodotto" value="{{old('')??$comic->image}}">
            @error('thumb')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Conferma</button>
    </form>
@endsection