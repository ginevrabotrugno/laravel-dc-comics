{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1 class="my-3">  ADD NEW COMIC </h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{route('comics.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}">
                @error('title')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Path Immagine</label>
                <input name="thumb" type="text" class="form-control" id="thumb" value="{{old('thumb')}}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price" value="{{old('price')}}">
                @error('price')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input name="series" type="text" class="form-control @error('series') is-invalid @enderror" id="series" value="{{old('series')}}">
                @error('series')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input name="sale_date" type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" value="{{old('sale_date')}}" placeholder="YYYY-MM-DD">
                @error('sale_date')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input name="type" type="text" class="form-control @error('type') is-invalid @enderror" id="type" value="{{old('type')}}">
                @error('type')
                    <small class="text-danger">{{$message}}</small>
                @enderror
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

