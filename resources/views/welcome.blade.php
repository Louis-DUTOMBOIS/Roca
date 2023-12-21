@extends("templates.app")


@section('css')
@vite([ 'resources/css/welcome.css' ])
@append

@section('content')

<div class="welcomeBanner">

    <div class="welcomeLeftBanner">

        <div class="welcomeLeftBannerText">
            <h1 class="bannerH1">Découvre des histoires<span> passionnantes</span></h1>
            <p class="bannerP">Roca vous invite à un voyage d’aventure sans précédent. Incarnez des personnages captivants et plongez dans des histoires interactives parsemées de choix multiples. Rejoins nous et commencez votre aventure dès aujourd’hui !</p>
        </div>

        <form class="filtre" method="GET" action="{{ route('scene.filtered') }}">
            @csrf
            <input type="text" name="name" id="name" placeholder="Nom d’un auteur ou d’une histoire">
            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                    <path d="M17.5002 18L13.9168 14.4166M15.8333 9.66667C15.8333 13.3486 12.8486 16.3333 9.16667 16.3333C5.48477 16.3333 2.5 13.3486 2.5 9.66667C2.5 5.98477 5.48477 3 9.16667 3C12.8486 3 15.8333 5.98477 15.8333 9.66667Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>Rechercher</button>
        </form>
        @if(session('type') && session('type') === 'warning')
        <p>{{ session('msg') }}</p>
        @endif
        @if(isset($users) && $users->isNotEmpty())
        <h3>Résultats de la recherche pour "{{ $searchTerm }}" :</h3>

        <h4>Utilisateurs :</h4>
        <ul>
            @foreach($users as $user)
            <li>{{ $user->name }}</li>
            @endforeach
        </ul>
        @endif

        @if(isset($histoires) && $histoires->isNotEmpty())
        <h4>Histoires correspondantes :</h4>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Pitch</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histoires as $histoire)
                <tr>
                    <td>{{ $histoire->titre }}</td>
                    <td>{{ $histoire->pitch }}</td>
                    <td><img src="{{ $histoire->photo }}" alt="Image calculée"></td>
                    <!-- Ajoutez d'autres colonnes au besoin -->
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @if(isset($moreThanTenResults) && $moreThanTenResults)
        <p>Tous les résultats n'ont pas été affichés. Il y a plus de 10 utilisateurs ou histoires correspondants.</p>
        @endif

    </div>

    <div class="welcomeRightBanner">

        <img src="https://images.unsplash.com/photo-1703027816278-2573b76e62f9?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">


    </div>
</div>




<div>
    <h1>Liste des histoires</h1>
    <form class="filtre" method="GET" action="{{ route('histoire.filtered') }}">
        @csrf
        <label for="genre">Filtrer par Genre :</label>
        <select name="genre" id="genre">
            @if(isset($genres))
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->label }}</option>
            @endforeach
            @else
            <option>Pas de Genre</option>
            @endif
        </select>
        <button type="submit">Filtrer</button>
    </form>
    @foreach ($histoiresParGenre as $genreLabel => $histoires)
    <h2>{{ $genreLabel }}</h2>
    @if (count($histoires) > 0)
    <table>
        <thead>
            <tr>
                <td>Titre</td>
                <td>Pitch</td>
                <td>Photo</td>
                <!-- Ajoutez d'autres colonnes au besoin -->
            </tr>
        </thead>
        <tbody>
            @foreach ($histoires as $histoire)
            <tr>
                <td>{{ $histoire->titre }}</td>
                <td>{{ $histoire->pitch }}</td>
                <td><img src="{{$histoire->photo}}" alt="Image calculée"></td>
                <!-- Ajoutez d'autres colonnes au besoin -->
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Aucune histoire pour ce genre.</p>
    @endif
    @endforeach
</div>
</div>
@endsection