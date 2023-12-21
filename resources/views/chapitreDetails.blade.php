@extends('templates.app')



    @section('content')



    <body>

    <div class="ambi-light">
        @if ($chapitre->media)
            @if (pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpg' ||
                    pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpeg' ||
                    pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'png')
                <img src="{{ $chapitre->media }}" alt="Image du chapitre">
            @else
                <img src="{{ $chapitre->media }}" alt="Image du chapitre">
            @endif
        @endif
    </div>

    <div class="card">
        @if ($chapitre->media)
            @if (pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpg' ||
                    pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpeg' ||
                    pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'png')
                <div class="cover">
                    <img src="{{ $chapitre->media }}" alt="Image du chapitre">
                </div>
            @else
                <div class="cover">
                    <img src="{{ $chapitre->media }}" alt="Image du chapitre">
                </div>
            @endif
        @endif


        <h1>{{ $chapitre->titrecourt }}</h1>
        <h1>{{ $chapitre->titre }}</h1>
        <p>{{ $chapitre->texte }}</p>

        @if ($chapitre->question)
            <p>{{ $chapitre->question }}</p>
            <!-- Affichage des choix sous forme de boutons -->
            <div class="choices">
                @foreach ($chapitre->suivants as $suivant)
                    <form method="POST" action="{{ route('makeChoice') }}">
                        @csrf
                        <input type="hidden" name="chapitre_id" value="{{ $chapitre->id }}">
                        <input type="hidden" name="reponse" value="{{ $suivant->id }}">
                        <button type="submit" class="submit">{{ $suivant->titrecourt }}</button>
                    </form>
                @endforeach
            </div>
        @else
            <p>L'histoire est terminée</p>
            <div class="container-cta-end">
                <a class="submit submit-primary" href='{{ route('index') }}'>Retourner à l'accueil</a>
            </div>



            {{-- page de fin, cta recommencer, cta aller acceuil --}}

        @endif
    </div>



@endsection
