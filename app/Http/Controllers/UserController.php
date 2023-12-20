<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use App\Models\User;
use Illuminate\Http\Request;
use function React\Promise\all;

class UserController extends Controller
{
    public function filtered(Request $request) {
        $userName = $request->input('name');

        $user = User::where('name', $userName)->first();
        $genres = Genre::all();
        $histoiresParGenre = [];
        foreach ($genres as $genre) {
            $histoiresParGenre[$genre->label] = Histoire::where('genre_id', $genre->id)->get();
        }

        if (!$user) {
            return redirect()->route('index')
            ->with('type', 'warning')
                ->with('msg', 'Aucun utilisateur trouvé avec le nom : ' . $userName);
        }

        $stories = Histoire::where('user_id', $user->id)->get();

        return view('welcome', ['user' => $user,'stories' => $stories,'genres'=>$genres,'histoiresParGenre'=>$histoiresParGenre]);


    }
}
