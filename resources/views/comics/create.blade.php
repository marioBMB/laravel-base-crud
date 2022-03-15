@extends('layouts.app')


@section('content')

    <h1>Nuovo fumetto</h1>

    <form action="{{route('comics.store')}}" method="POST">
        @csrf    

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
             id="title" name="title" placeholder="Inserisci il titolo del fumetto">
             @error('title')
                <div class="alert alert-danger">{{$message}}</div>
             @enderror
        </div>

        <div class="form-group">
            <label for="type">Tipo fumetto</label>
            <select class="form-control form-control-md" id="type" name="type">
                <option value="comic">Comic book</option>
                <option value="novel">Graphic Novel</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Prezzo ($)</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" min="0.5" step="0.01" placeholder="Inserisci il prezzo in dollari">
        </div>
        <div class="form-group">
            <label for="series">Serie</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" placeholder="Inserisci il nome della serie">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci la descrizione del fumetto"></textarea>
        </div>

        <div class="form-group">
            <label for="sale_date">Data di vendita</label>
            <input type='date' class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" placeholder="Inserisci la data di vendita del fumetto"></textarea>
        </div>

        <div class="form-group">
            <label for="thumb">Immagine</label>
            <input type="data" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" placeholder="Inserisci l'url dell'immagine del fumetto">
        </div>

        <button type="submit" class="btn btn-primary">Crea</button>

    
    </form>

    @if ($errors->any())
    <div class='alert alert-danger'>

        <ul>
            @foreach($errors -> all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif


@endsection