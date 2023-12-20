<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class HistoireController extends Controller
{

    public function index()
    {
        $histoires = Histoire::all();
        return view('welcome', ['histoires' => $histoires]);
    }

    public function histoire($id){
        // TO-DO Modifier le contenu de l'équipe

        // Récupérer la scène en utilisant l'ID
        $histoire = Histoire::find($id);

        $lecturesTerminees = $histoire->terminees()->where('histoire_id', $id)->sum('nombre');

        return view('histoires.histoire', ['histoire' => $histoire, 'lecturesTerminees' => $lecturesTerminees]);
    }


    /**
     * Display a listing of the resource.
     */
    public function createHistoire()
    {
        $genres = Genre::all();

        return view('creeHistoire', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $request->validate([
            'Titre' => 'required|string|max:100',
            'Pitch' => 'required|string|max:250',
        ]);

        $histoire = new Histoire();
        $histoire->titre = $request->input('Titre');
        $histoire->pitch = $request->input('Pitch');

        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $file = $request->file('document');
        } else {
            $msg = "Aucun fichier téléchargé";
            return redirect()->route('index');
        }
        $nom = 'image';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images', $nom);
        if (isset($tache->photo)) {
            Log::info("Image supprimée : ". $tache->photo);
            Storage::delete($tache->photo);
        }
        $histoire->photo = 'images/'.$nom;

        $histoire->active = false;
        $histoire->user_id = auth()->id();
        $histoire->genre_id = $request->input('genre') ;

        $histoire->save();

        return redirect()->route('personne.show');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


<<<<<<< HEAD
=======
        $histoireId = $request->input('histoire_id');

        // Récupérer la scène en utilisant l'ID
        $histoire = Histoire::find($histoireId);


        return view('histoires/histoire', ['histoire' => $histoire]);
    }
>>>>>>> 775c9277a5e2fc0bebacd756e62ffb062ec46ab4

}
