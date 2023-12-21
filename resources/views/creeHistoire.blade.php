@extends('templates.app')

@section('css')

@append

@section('content')
<div>
    @vite('resources/css/creeHistoire.css')

    <form action="{{route('histoire.create')}}" method="post" enctype="multipart/form-data" >

        @csrf
        <div class="form-header">
            <h3 class="h3-createhistoire">Commence la rédaction de ton histoire</h3>
            <p class="p-description-createhistoire">Renseigne le nom, l’image le genre ainsi que la description de ton histoire</p>
        </div>
        <!--Nom Input-->
        <fieldset>
            <legend>Titre :</legend>
            <input type="text" name="Titre" class="form-input" placeholder="Mon histoire">
        </fieldset>
        <fieldset>
            <legend>Image :</legend>
            <div class="image-createhistoire">
                <p>Choisir une image</p>
                <input type="file" name="document" id="doc" placeholder="URL de mon image" class="file-createhistoire">
            </div>
        </fieldset>
        <fieldset>
            <legend>Description :</legend>
            <textarea type="text" name="Pitch" class="form-input textarea-createhistoire" placeholder="Décrivez votre histoire"></textarea>
        </fieldset>
        <fieldset>
            <legend>Genre :</legend>
            <select name="genre" id="genre" class="genre-createhistoire">
                @if(isset($genres))
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id}}">{{ $genre->label }}</option>
                    @endforeach
                @else
                    <option>Pas de genre</option>
                @endif
            </select>       
        </fieldset>

        <div class="form-group">
            <input type="submit" value="Suivant" name="submit" class="creehistoire-suivant">
        </div>
    </form>

    <form method="POST" action="{{ route('linkChapters') }}">
        @csrf

        <!-- Sélection du chapitre source -->
        <label for="chapitre_source_id">Chapitre source :</label>
        <select name="chapitre_source_id" id="chapitre_source_id">
            @foreach($chapitres as $chapitre)
                <option value="{{ $chapitre->id }}">{{ $chapitre->titre }}</option>
            @endforeach
        </select>

        <!-- Sélection du chapitre cible -->
        <label for="chapitre_destination_id">Chapitre cible :</label>
        <select name="chapitre_destination_id" id="chapitre_destination_id">
            @foreach($chapitres as $chapitre)
                <option value="{{ $chapitre->id }}">{{ $chapitre->titre }}</option>
            @endforeach
        </select>

        <!-- Réponse à la question posée dans le chapitre source -->
        <label for="reponse">Réponse :</label>
        <input type="text" name="reponse" id="reponse">

        <button type="submit">Lier les chapitres</button>
    </form>
@endsection