<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Chapitre;
use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class HistoireController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
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

    public function histoire(Request $request){
        // TO-DO Modifier le contenu de l'équipe

        $histoireId = $request->input('histoire_id');

        // Récupérer la scène en utilisant l'ID
        $histoire = Histoire::find($histoireId);


        return view('histoires/histoire', ['histoire' => $histoire]);
    }

    public function startReading(Request $request)
    {
        $histoireId = $request->input('histoire_id');

        // Récupérer l'histoire en utilisant l'ID
        $histoire = Histoire::find($histoireId);

        // Récupérer le premier chapitre de l'histoire
        $premierChapitre = $histoire->chapitres()->where('premier', true)->first();

        // Rediriger vers la page du premier chapitre pour commencer la lecture
        return redirect()->route('chapitreDetails', ['chapitre_id' => $premierChapitre->id]);
    }

    public function showChapitreDetails(string $chapitre_id)
    {
        // Récupérer le chapitre en utilisant l'ID
        $chapitre = Chapitre::findOrFail($chapitre_id);

        return view('chapitreDetails', ['chapitre' => $chapitre]);
    }

    public function makeChoice(Request $request)
    {
        $chapitreId = $request->input('chapitre_id');
        $reponseId = $request->input('reponse');

        // Récupérer le chapitre actuel
        $chapitreActuel = Chapitre::findOrFail($chapitreId);

        // Récupérer le chapitre suivant en fonction de la réponse choisie
        $chapitreSuivant = $chapitreActuel->suivants()->where('id', $reponseId)->first();

        if ($chapitreSuivant) {
            // Redirection vers la page du chapitre suivant
            return redirect()->route('chapitreDetails', ['chapitre_id' => $chapitreSuivant->id]);
        } else {
            // Gestion de la fin de l'histoire
            return view('finHistoire');
        }
    }


    public function ajouterAvis(Request $request)
    {
        $request->validate([
            'histoire_id' => 'required|exists:histoires,id',
            'contenu' => 'required|string|max:255',
        ]);

        $avis = new Avis();
        $avis->contenu = $request->input('contenu');
        $avis->user_id = auth()->id();
        $avis->histoire_id = $request->input('histoire_id');
        $avis->save();

        return redirect()->back()->with('success', 'Votre avis a été ajouté avec succès!');
    }





}
