<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;

class ChapitreController{
    public function chapitre(){
        $chapitres = Chapitre::all();
        $histoiresParChapitre = [];
        foreach ($chapitres as $chapitre) {
            $histoiresParChapitre[$chapitre->label] = Histoire::where('chapitre_id', $chapitre->id)->get();
        }
        return view('welcome', ['histoiresParChapitre' => $histoiresParChapitre, 'chapitre' => $chapitres]);
    }

    public function afficherChapitres($histoireId)
    {
        $histoire = Histoire::findOrFail($histoireId);
        $chapitres = Chapitre::where('histoire_id', $histoireId)->get();
        return view('afficherChapitre', ['chapitres' => $chapitres, 'histoire' => $histoire]);
    }
}