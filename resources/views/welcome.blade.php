@extends("templates.app")

@section('content')
    <div>
        <div>
            @if(session('type') && session('type') === 'warning')
                <p>{{ session('msg') }}</p>
            @endif

            @auth
                <button>
                    <a href="{{route('profil')}}" id="informations">Profil</a>
                </button>
            @endauth
            
            <div class="accueil">
                <div class="accueil_gauche">      
                    <h1>Découvre des histoires <span>passionnantes</span></h1>
                    <p>Roca vous invite à un voyage d’aventure sans précédent. Incarnez des personnages captivants et plongez dans des histoires interactives parsemées de choix multiples. Rejoins nous et commencez votre aventure dès aujourd’hui !</p>
                    <form method="GET" action="{{ route('scene.filtered') }}">
                        @csrf
                        <div class="filtre">
                            <input type="text" name="name" id="name" placeholder="Nom de l'auteur ou titre de l'histoire">
                            <div class="button-search">
                                <img src="images/Icon.png" alt="" class="loop">
                                <button type="submit">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="accueil_droite">
                    <img src="images/cover.png" alt="">
                </div>
            </div>

            @if(isset($users) && $users->isNotEmpty())
                <h3>Résultats de la recherche pour "{{ $searchTerm }}" :</h3>

                <h4>Utilisateurs :</h4>
                <ul>
                    @foreach($users as $user)
                        <li>{{ $user->name }}</li> <button><a href="{{ route('user.show', $user->id) }}">Informations</a></button>
                        </li>
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
        <div class="maxwidth-welcome">
            <h1>Liste des histoires :</h1>
            <form method="GET" action="{{ route('histoire.filtered') }}">
                @csrf
                <div class="filtre">
                    <label for="genre" class="genre">Filtrer par Genre :</label>
                    <div>
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
                    </div>
                </div>
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
                                <td>
                                    <form method="GET" action="{{ route('histoireDetail') }}">
                                        @csrf
                                        <input type="hidden" name="histoire_id" value="{{ $histoire->id }}">
                                        <button type="submit">Détails histoire</button>
                                    </form>
                                </td>
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
