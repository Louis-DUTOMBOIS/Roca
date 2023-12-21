@extends('templates.app')

@section('css')
  
@append

@content
<div class="detail">
    <h1>Détails de la scène</h1>

    <h2>{{ $histoire->titre }}</h2>
    <p>Description : {{ $histoire->pitch }}</p>

    <img src="{{$histoire->photo}}" alt="Image calculée">

    <p>Nombre de lectures total terminé : {{ $histoire->terminees->sum('pivot.nombre') }}</p>

    <p>Nombre d'avis : {{ $histoire->avis()->count()  }}</p>

    <p>Auteur de la scène : {{ $histoire->user->name }}</p>

    <p>Nombre de chapitres : {{ $histoire->chapitres->count() }}</p>

    <form method="POST" action="{{ route('startReading') }}">
        @csrf
        <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
        <button type="submit">Commencer la lecture</button>
    </form>

    @auth
        <form method="POST" action="{{ route('ajouterAvis') }}">
            @csrf
            <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
            <textarea name="contenu" placeholder="Votre commentaire ici"></textarea>
            <button type="submit">Ajouter un commentaire</button>
        </form>
    @endauth


    <h3>Avis sur cette histoire :</h3>
    <ul>
        @foreach($histoire->avis as $avis)
            <li>
                <p>Utilisateur : <button><a href="{{ route('user.show', $avis->user->id) }}">{{ $avis->user->name }}</a></button></p>

                <p>Commentaire : {{ $avis->contenu }}</p>
                <!-- Ajoutez d'autres détails de l'avis au besoin -->
            </li>
        @endforeach
    </ul>

</div>

@endsection