<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class EquipeController extends Controller
{
    public function index(){
        // TO-DO Modifier le contenu de l'équipe
        $equipe= [
            'nomEquipe'=>"L'equipe de l'année !",
            'logo'=>"/images/logo.jpg",
            'slogan'=>"....",
            'localisation'=>"numero de la salle",
            'membres'=> [
                [ 'nom'=>"nom",'prenom'=>"prenom", 'image'=>"https://picsum.photos/10/10", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"nom",'prenom'=>"prenom", 'image'=>"https://picsum.photos/10/10", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"nom",'prenom'=>"prenom", 'image'=>"https://picsum.photos/10/10", 'fonctions'=>["validateur","développer", "concepteur"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);
    }
}
