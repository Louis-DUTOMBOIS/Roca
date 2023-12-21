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
@endsection