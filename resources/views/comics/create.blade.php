{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1 class="my-3">  ADD NEW COMIC </h1>

        <form action="{{route('comics.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" type="email" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="src" class="form-label">Path Immagine</label>
                <input name="src" type="text" class="form-control" id="src">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input name="price" type="text" class="form-control" id="price">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input name="series" type="text" class="form-control" id="series">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input name="sale_date" type="text" class="form-control" id="sale_date" placeholder="YYYY-MM-DD">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Data di vendita</label>
                <input name="type" type="text" class="form-control" id="type">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">INVIA</button>
            <button type="reset" class="btn btn-danger">RESET</button>
        </form>

    </div>
@endsection

