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
        $searchTerm = $request->input('name');

        // Vérifier si le terme de recherche a une longueur minimale de 3 caractères
        if (strlen($searchTerm) < 3) {
            return redirect()->route('index')
                ->with('type', 'warning')
                ->with('msg', 'La recherche doit comporter au moins 3 caractères.');
        }



        $users = User::where('name', 'LIKE', "%$searchTerm%")->take(10)->get();
        $histoires = Histoire::where('titre', 'LIKE', "%$searchTerm%")->take(10)->get();
        $genres = Genre::all();

        $histoiresParGenre = [];
        foreach ($genres as $genre) {
            $histoiresParGenre[$genre->label] = Histoire::where('genre_id', $genre->id)->get();
        }


        // Vérifier si le nombre de résultats est supérieur à 10 pour les utilisateurs et les histoires
        $usersCount = User::where('name', 'LIKE', "%$searchTerm%")->count();
        $histoiresCount = Histoire::where('titre', 'LIKE', "%$searchTerm%")->count();

        if ($usersCount > 10 || $histoiresCount > 10) {
            return view('welcome', ['users' => $users, 'histoires' => $histoires, 'genres' => $genres,
                'searchTerm' => $searchTerm,'histoiresParGenre'=>$histoiresParGenre])
                ->with('moreThanTenResults', true);
        }

        return view('welcome', ['users' => $users, 'histoires' => $histoires, 'genres' => $genres,
            'searchTerm' => $searchTerm,'histoiresParGenre'=>$histoiresParGenre]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        return view('show', ['user' => $user]);
    }
}
