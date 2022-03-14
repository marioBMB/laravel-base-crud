@extends('layouts.app')


@section('content')

    <h1>Nuovo fumetto</h1>

    <form action="{{route('comics.store')}}" method="POST">
        @csrf    

        <div class="form-group">
            <label for="name">Titolo</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il titolo del fumetto">
        </div>

        <div class="form-group">
            <label for="type">Tipo fumetto</label>
            <select class="form-control form-control-md" id="type" name="type">
                <option value="comic">Comic book</option>
                <option value="novel">Graphic Novel</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cooking_time">Prezzo ($)</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo in dollari">
        </div>
        <div class="form-group">
            <label for="weight">Serie</label>
            <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci il nome della serie">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" placeholder="Inserisci la descrizione del fumetto"></textarea>
        </div>

        <div class="form-group">
            <label for="description">Data di vendita</label>
            <textarea class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data di vendita del fumetto"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="data" class="form-control" id="thumb" name="thumb" placeholder="Inserisci l'url dell'immagine del fumetto">
        </div>

        <button type="submit" class="btn btn-primary">Crea</button>

    
    </form>



@endsection