<?php

namespace App\Http\Controllers;

use App\Functions\Helper;
use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:100',
            'price' => 'required|min:2',
            'series' => 'required|min:3|max:100',
            'sale_date' => 'required|min:10',
            'type' => 'required|min:3|max:30'
        ],
        [
            'title.required' => 'Il Titolo è obbligatorio',
            'title.min' => 'Il Titolo deve avere almeno :min caratteri',
            'title.max' => 'Il Titolo deve avere massimo :max caratteri',
            'price.required' => 'Il Prezzo è obbligatorio',
            'price.min' => 'Il Prezzo deve avere almeno :min caratteri',
            'series.required' => 'La Serie è obbligatoria',
            'series.min' => 'La Serie deve avere almeno :min caratteri',
            'series.min' => 'La Serie deve avere massimo :max caratteri',
            'sale_date.required' => 'La Data di Vendita è obbligatoria',
            'sale_date.min' => 'La Data di Vendita deve avere almeno :min caratteri',
            'type.required' => 'Il Tipo è obbligatorio',
            'type.min' => 'Il Tipo deve avere almeno :min caratteri',
            'type.max' => 'Il Tipo deve avere massimo :max caratteri'
        ]);

        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['title'], Comic::class);

        $new_comic = new Comic();
        $new_comic->fill($data);

        $new_comic->save();

        return redirect()->route('comics.show', $new_comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        if($data['title'] === $comic->title) {
            $data['slug'] = $comic->slug;
        } else {
            $data['slug'] = Helper::generateSlug($comic->title, Comic::class);
        }

        $comic->update($data);

        return redirect()->route('comics.show', $comic);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', $comic->title . ' ' . 'è stato eliminato correttamente!' );
    }
}
