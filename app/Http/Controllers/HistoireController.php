<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;

class HistoireController extends Controller
{
    public function histoire(Request $request){
        // TO-DO Modifier le contenu de l'équipe

        $histoireId = $request->input('histoire_id');

        // Récupérer la scène en utilisant l'ID
        $histoire = Histoire::find($histoireId);

        $lecturesTerminees = $histoire->terminees()->where('histoire_id', $histoireId)->sum('nombre');

        return view('histoires/histoire', ['histoire' => $histoire, 'lecturesTerminees' => $lecturesTerminees]);
    }

}
