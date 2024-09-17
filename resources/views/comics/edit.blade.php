{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1 class="my-3">  EDIT | {{$comic->title}} </h1>

    <form action="{{route('comics.update', $comic)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input name="title" value="{{$comic->title}}" type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Path Immagine</label>
            <input name="thumb" value="{{$comic->thumb}}" type="text" class="form-control" id="thumb">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input name="price" value="{{$comic->price}}" type="text" class="form-control" id="price">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input name="series" value="{{$comic->series}}" type="text" class="form-control" id="series">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di vendita</label>
            <input name="sale_date" value="{{$comic->sale_date}}" type="text" class="form-control" id="sale_date" placeholder="YYYY-MM-DD">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input name="type" value="{{$comic->type}}" type="text" class="form-control" id="type">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"> {{$comic->description}} </textarea>
        </div>
        <button type="submit" class="btn btn-primary">INVIA</button>
        <button type="reset" class="btn btn-danger">ANNULLA</button>
    </form>

</div>
@endsection
