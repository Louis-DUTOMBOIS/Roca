@extends("templates.app")

@section('content')
    <div style="display: flex;align-items: center; justify-content: center">
        <div>
            @auth
                <button><a href="{{route('profil')}}" id="informations">Profil</a>
                </button>
            @endauth
            <b>Le marathon du WEB 2023 !!!</b>


                <form class="filtre" method="GET" action="{{ route('scene.filtered') }}">
                    @csrf
                    <label for="auteur">Rechercher par auteur :</label>
                    <input type="text" name="name" id="name" placeholder="Nom de l'auteur">
                    <button type="submit">Rechercher</button>
                </form>

                @if(isset($user))
                    <h3>Utilisateur trouvé : {{ $user->name }}</h3>

                    @if($stories->isNotEmpty())
                        <h4>Histoires écrites par {{ $user->name }} :</h4>
                        <ul>
                            @foreach($stories as $story)
                                <li>{{ $story->titre }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Aucune histoire écrite par {{ $user->name }}.</p>
                    @endif
                @endif

        </div>
    </div>

@endsection