@extends('templates.app')

@section('css')

@append

@section('content')
    <form action="{{route('histoire.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-header">
            <h3>Création de votre histoire</h3>
        </div>
        <!--Nom Input-->
        <div class="form-group">
            <input type="text" name="Titre" class="form-input" placeholder="Titre">
        </div>
        <div class="form-group">
            <input type="text" name="Pitch" class="form-input" placeholder="Pitch">
        </div>
        <div>
            <label for="doc">Image : </label>
            <input type="file" name="document" id="doc">
        </div>
        <div>
            <label for="genre"> Choix du genre :</label>
            <select name="genre" id="genre">
                @if(isset($genres))
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id}}">{{ $genre->label }}</option>
                    @endforeach
                @else
                    <option>Pas de genre</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Enregistrement" name="submit">
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