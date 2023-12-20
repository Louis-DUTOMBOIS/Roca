<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;

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
        $histoire->photo = $request->input('document');
        $histoire->active = false;
        $histoire->genre_id = $request->input('genre') ;
        $histoire->user_id = auth()->id();

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

}
