<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'Titre' => 'required|string|max:100',
            'TitreCourt' => 'required|string|max:100',
            'Texte' => 'required|string|max:250',
        ]);

        $chapitre = new Chapitre();
        $chapitre->titre = $request->input('Titre');
        $chapitre->titrecourt = $request->input('TitreCourt');
        $chapitre->texte = $request->input('Texte');

        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $file = $request->file('media');
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
        $chapitre->photo = 'images/'.$nom;

        $chapitre->question = $request->input('Question');
        $chapitre->histoire_id = auth()->id();
        $chapitre->premier = 0;

        $chapitre->save();

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

    public function lierChapitres(Request $request)
    {
        // Valider les données du formulaire
        $this->validate($request, [
            'chapitre_actuel' => 'required',
            'chapitre_suivant' => 'required',
        ]);

        // Récupérer les identifiants des chapitres
        $chapitreActuelId = $request->input('chapitre_actuel');
        $chapitreSuivantId = $request->input('chapitre_suivant');

        // Logique pour lier les chapitres (à adapter selon ta structure de données)
        $chapitreActuel = Chapitre::find($chapitreActuelId);
        $chapitreSuivant = Chapitre::find($chapitreSuivantId);

        // Exemple de liaison : enregistrer l'ID du chapitre suivant dans le champ du chapitre actuel
        $chapitreActuel->chapitre_suivant_id = $chapitreSuivantId;
        $chapitreActuel->save();

        // Redirection ou traitement supplémentaire si nécessaire
        return redirect()->back()->with('success', 'Chapitres liés avec succès !');
    }

}
