<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;
use Illuminate\Support\Str;


class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');
        foreach ($comics as $comic) {
            $new_comic = new Comic();
            $new_comic->title = $comic['title'];
            $new_comic->slug = $this->generateSlug($comic['title']);
            $new_comic->description = $comic['description'];
            $new_comic->thumb = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];

            $new_comic->save();
        }
    }

    private function generateSlug($string){
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $exists = Comic::where('slug', $slug)->first();
        $c = 1;

        while($exists){
            $slug = $original_slug . '-' . $c;
            $exists = Comic::where('slug', $slug)->first();
            $c++;
        }

        return $slug;

    }
}
