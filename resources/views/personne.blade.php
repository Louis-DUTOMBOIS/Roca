@extends('templates.app')

@section('css')
  
@append

@section('content')
@auth
    <h1>Voici vos informations personnelles</h1>

    <p> Nom : {{ Auth::user()->name }}</p>
    <p> Email : {{ Auth::user()->email }}</p>

    <div>
        <form action="{{ route('profile.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <h2>Choix d'une photo de profil : </h2>
            </div>
            <div>
                <label for="doc">Image : </label>
                <input type="file" name="document" id="doc">
            </div>
            <input type="submit" value="Télécharger" name="submit">
        </form>
        <img src="{{ Storage::url(Auth::user()->avatar_lien) }}" alt="Image de l'utilisateur">

    </div>

@endauth
@endsection