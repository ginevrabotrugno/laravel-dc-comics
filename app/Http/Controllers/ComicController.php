<?php

namespace App\Http\Controllers;

use App\Functions\Helper;
use App\Http\Requests\ComicRequest;
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
    public function store(ComicRequest $request)
    {
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
    public function update(ComicRequest $request, Comic $comic)
    {
        $data = $request->all();

        if($data['title'] === $comic->title) {
            $data['slug'] = $comic->slug;
        } else {
            $data['slug'] = Helper::generateSlug($comic->title, Comic::class);
        }

        $comic->update($data);

        return redirect()->route('comics.show', $comic)->with('edited', $comic->title . ' ' . 'è stato modificato correttamente!' );

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
