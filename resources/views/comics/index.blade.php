{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5 text-center">
        <h1 class="my-3">Comics</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Series</th>
                    <th scope="col">Type</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)

                <tr>
                    <th> {{ $comic->id }} </th>
                    <td> {{ $comic->title }} </td>
                    <td> {{ $comic->series }} </td>
                    <td> {{ $comic->type }} </td>
                    <td> {{ $comic->sale_date }} </td>
                    <td> {{ $comic->price }} </td>
                    <td>
                        <a href="#" class="btn btn-warning">
                            Dettagli
                        </a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
@endsection
