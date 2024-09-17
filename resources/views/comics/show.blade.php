{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5 text-center">
        <h1 class="my-3">  {{$comic->title}} </h1>

        <a href="{{route('comics.edit', $comic)}}" class="btn btn-warning">
            <i class="fa-solid fa-pencil"></i>
        </a>
        <form action="{{route('comics.destroy', $comic)}}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare {{$comic->title}}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </form>

        <h2 class="my-3"> {{ $comic->series }} </h2>
        <ul class="list-group my-3">
            <li class="list-group-item">PREZZO: {{ $comic->price }}</li>
            <li class="list-group-item">Data di Uscita: {{ $comic->sale_date }}</li>
            <li class="list-group-item">TIPO: {{ $comic->type }}</li>
        </ul>
        <img src="{{$comic->thumb}}" alt="{{$comic->title}}" class="img-fluid">
        <p class="my-5"> {{$comic->description}} </p>
        <a href="{{route('comics.index')}}" class="btn btn-warning">BACK</a>
    </div>
@endsection

