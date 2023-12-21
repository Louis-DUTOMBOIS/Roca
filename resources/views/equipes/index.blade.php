@extends('templates.app')

@section('css')

@append

@section('content')
<div>
    <h1>{{$equipe['nomEquipe']}}</h1>
    <img src="{{$equipe['logo']}}" alt="Logo de l'équipe">

    <p><strong>Slogan:</strong> {{$equipe['slogan']}}</p>
    <p><strong>Localisation:</strong> Salle {{$equipe['localisation']}}</p>

    <h2>Membres de l'équipe :</h2>
    <ul>
        @foreach($equipe['membres'] as $membre)
        <li>
            <h3>{{$membre['prenom']}}  {{$membre['nom']}}</h3>
            <img src="{{$membre['image']}}" alt="Photo de {{$membre['prenom']}}">
            <p><strong>Fonctions:</strong> </p>
            @foreach($membre['fonctions'] as $fonction)
                <p>{{$fonction}}</p>
            @endforeach
        </li>
        @endforeach
    </ul>

    <p><strong>Autres informations:</strong> {{$equipe['autres']}}</p>
</div>


@endsection
