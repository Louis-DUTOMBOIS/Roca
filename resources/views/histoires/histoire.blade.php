@extends('templates.app')

@section('css')
  
@append

@content
<div class="detail">
    <h1>Détails de la scène</h1>

@section('css')
  
@append

@section('content')
    @vite('resources/css/detailhistoire.css')

    <div class="detail maxwidth-histoire">

    <div class="flex-detailhistoire">

        <div class="relative-detailhistoire scroll hidden">
            <img class="histoire-img" src="{{$histoire->photo}}" alt="Image calculée">
            <form method="POST" action="{{ route('startReading') }}">
                @csrf
                <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
                <!-- <img class="icon-play" src="images/Play.png" alt=""> -->
                <button type="submit"><i data-lucide="play"></i>Lire</button>
            </form>
        </div>

        <div class="scroll hidden transitiondelay">

            <h2>{{ $histoire->titre }}</h2>
            
            <div class="flex-nbchapitres">

                <div class="nb-chapitres">
                    <h3>{{ $histoire->chapitres->count() }}</h3>
                    <p>chapitres</p>
                </div>
                
                <div class="nb-chapitres">
                    <h3>{{ $histoire->terminees->sum('pivot.nombre') }}</h3>
                    <p>Nombre de lecteurs</p>
                </div>
                
                <div class="nb-chapitres">
                    <h3>{{ $histoire->avis()->count()  }}</h3>
                    <p>Avis</p>
                </div>          
            </div>

            <p class="description">{{ $histoire->pitch }}</p>
            
            <p class="auteur">Auteur : <span>{{ $histoire->user->name }}</span></p>
            
        </div>
            
    </div>
        
        
        
        <h3 class="commentaires-avis scroll hidden">Ajouter un commentaire :</h3>
        @auth
            <form method="POST" action="{{ route('ajouterAvis') }}">
                @csrf
                <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
                <textarea name="contenu" placeholder="Votre commentaire ici" class="detail-histoire-textarea"></textarea>
                <button type="submit" class="detail-histoire-submit">Ajouter un commentaire</button>
            </form>
        @endauth


        <h3 class="commentaires-avis scroll hidden">Commentaires</h3>
        <ul class="ul-commentaire scroll hidden">
            @foreach($histoire->avis as $avis)
                <li class="li-commentaire">
                    <p>Utilisateur : <button><a href="{{ route('user.show', $avis->user->id) }}" class="avis-user-name">{{ $avis->user->name }}</a></button></p>

                    <p>{{ $avis->contenu }}</p>
                    <!-- Ajoutez d'autres détails de l'avis au besoin -->
                </li>
            @endforeach
        </ul>

    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

    <style>
    footer {
        position: relative!important
    }

    </style>
</div>
@endsection
