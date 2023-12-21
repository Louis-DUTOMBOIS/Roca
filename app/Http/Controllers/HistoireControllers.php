<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;

class HistoireControllers{
    public function histoire(Request $request)
    {
        $genres = Genre::all();
        $histoiresParGenre = [];
        foreach ($genres as $genre) {
            $histoiresParGenre[$genre->label] = Histoire::where('genre_id', $genre->id)->get();
        }

        $histoires = Histoire::all();

        return view('welcome', ['histoiresParGenre' => $histoiresParGenre, 'genres' => $genres, 'story'=>$histoires]);
    }
    public function filteredGenre(Request $request)
    {
        $genreId = $request->input('genre');
        $histoiresParGenre = Histoire::where('genre_id', $genreId)->get();
        return view('welcome', ['histoiresParGenre' => [$genreId => $histoiresParGenre], 'genres' => Genre::all()]);
    }
}