@extends('templates.app')

@section('css')
  
@append

@content
<div class="detail">
    <h1>Détails de la scène</h1>

    <h2>{{ $histoire->titre }}</h2>
    <p>Description : {{ $histoire->pitch }}</p>

    <img src="{{$histoire['photo']}}" alt="Image calculée">

    <p>Nombre de lectures total terminé : {{ $histoire->terminees->sum('pivot.nombre') }}</p>

    <p>Nombre d'avis : {{ $histoire->avis()->count()  }}</p>

    <p>Auteur de la scène : {{ $histoire->user->name }}</p>

    <p>Nombre de chapitres : {{ $histoire->chapitres->count() }}</p>


</div>

@endsection