<!DOCTYPE html>
<html>
<head>
    <title>Détails de la scène</title>
    @vite(['resources/css/accueil.css', 'resources/css/sceneDetails.css', 'resources/css/footer.css'])
    <!-- Assurez-vous d'inclure tout lien vers des styles CSS, des bibliothèques ou des scripts nécessaires -->
</head>
<body>
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

</div>

</body>
</html>
