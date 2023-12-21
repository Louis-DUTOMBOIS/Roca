<!DOCTYPE html>
<html>
<head>
    <title>Détails du chapitre</title>
    <!-- Inclure vos styles CSS ou liens nécessaires -->
</head>
<body>
<div class="detail">
    <h1>Détails du chapitre</h1>

    <h2>{{ $chapitre->titre }}</h2>
    <p>{{ $chapitre->texte }}</p>

    @if ($chapitre->media)
        @if (pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpg' || pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpeg' || pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'png')
            <img src="{{ $chapitre->media }}" alt="Image du chapitre">
        @elseif (pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'mp3' || pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'wav')
            <audio controls>
                <source src="{{ $chapitre->media }}" type="audio/{{ pathinfo($chapitre->media, PATHINFO_EXTENSION) }}">
                Your browser does not support the audio element.
            </audio>
        @elseif (pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'mp4')
            <video controls>
                <source src="{{ $chapitre->media }}" type="video/{{ pathinfo($chapitre->media, PATHINFO_EXTENSION) }}">
                Your browser does not support the video tag.
            </video>
        @else
            <img src="{{ $chapitre->media }}" alt="Image du chapitre">
        @endif
    @endif




    @if ($chapitre->question)
        <p>Question : {{ $chapitre->question }}</p>
        <!-- Affichage des choix sous forme de boutons -->
        <div class="choices">
            @foreach ($chapitre->suivants as $suivant)
                <form method="POST" action="{{ route('makeChoice') }}">
                    @csrf
                    <input type="hidden" name="chapitre_id" value="{{ $chapitre->id }}">
                    <input type="hidden" name="reponse" value="{{ $suivant->id }}">
                    <button type="submit">{{ $suivant->texte }}</button>
                </form>
            @endforeach
        </div>
    @else
        <p>Fin de l'histoire</p>
    @endif

</div>
</body>
</html>
