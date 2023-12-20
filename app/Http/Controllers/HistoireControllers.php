<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;

class HistoireControllers{
    public function histoire(Request $request)
    {
        $genres = Genre::all(); // Fetch all genres

        // Fetch stories for each genre
        $histoiresParGenre = [];
        foreach ($genres as $genre) {
            $histoiresParGenre[$genre->label] = Histoire::where('genre_id', $genre->id)->get();
        }

        return view('welcome', ['histoiresParGenre' => $histoiresParGenre, 'genres' => $genres]);

    }
}