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
            <input class="rechercherTypeBar" type="text" name="name" id="name" placeholder="Nom d’un auteur ou d’une histoire">
            <button type="submit" class="searchIcon"><svg class="iconSearch" xmlns="http://www.w3.org/2000/svg" width="40" height="42" viewBox="0 0 20 21" fill="none">
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
            <li>{{ $user->name }}</li> <button><a href="{{ route('user.show', $user->id) }}">Informations</a></button>
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

                    <td><a href="{{ route('histoireDetail', ['histoire_id' => $histoire->id]) }}">{{ $histoire->titre }}</a></td>

                    <td>{{ $histoire->pitch }}</td>
                    <td><img src="{{ $histoire->photo }}" alt="Image calculée"></td>

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

        <img src="images/book_cover 1.png">

        <div class="buttonBottomBanner">
            <button type="submit" class="ctaBanner1"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
                    <path d="M1.58331 1L10.9166 7L1.58331 13V1Z" stroke="#09090B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>Lecture</button>
            <button type="submit" class="ctaBanner2"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                    <path d="M3.41669 13V2.99999C3.41669 2.55797 3.59228 2.13404 3.90484 1.82148C4.2174 1.50892 4.64133 1.33333 5.08335 1.33333H14.0834V14.6667H5.08335C4.64133 14.6667 4.2174 14.4911 3.90484 14.1785C3.59228 13.8659 3.41669 13.442 3.41669 13ZM3.41669 13C3.41669 12.558 3.59228 12.134 3.90484 11.8215C4.2174 11.5089 4.64133 11.3333 5.08335 11.3333H14.0834M6.75002 6.66666H10.75M8.75002 4.66666V8.66666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>Liste de lecture</button>
        </div>
    </div>


</div>

<div class="container">
    <h2>Cinq histoires selon vos goûts</h2>

    <button class="carousel__button carousel__button--left"><</button>
    <button class="carousel__button carousel__button--right">></button>
    <div class="carousel">
        <div class="filter"></div>
        <div class="carousel__track-container">
            <div class="carousel__track">
            @foreach($story->random(8) as $histoire)
                <a href="{{ route('histoireDetail', ['histoire_id' => $histoire->id]) }}" class="carousel__slide">
                    <span>{{ $histoire->titre }}</span>
                    <div class="tag">{{ $histoire->titre }}</div>
                    <img src="{{$histoire->photo}}" alt="Image calculée">
                </a>
                
            @endforeach
            </div>
        </div>
       
    </div>
</div>
<div class="wrapper_list-histoires">>
    <h2>Liste des histoires</h2>
    <form class="filtre" method="GET" action="{{ route('histoire.filtered') }}">
        @csrf
        <div>
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
        </div>
        <button class="ctaBanner2" type="submit">Filtrer</button>
    </form>
    @foreach ($histoiresParGenre as $genreLabel => $histoires)
    <div class="container">
        <h2>{{ $genreLabel }}</h2>
        <button class="carousel__button carousel__button--left"><</button>
        <button class="carousel__button carousel__button--right">></button>
        @if (count($histoires) > 0)
        <div class="carousel">
        <div class="filter"></div>
            <div class="carousel__track-container">
                <div class="carousel__track">
                @foreach($histoires as $histoire)
                    <a href="{{ route('histoireDetail', ['histoire_id' => $histoire->id]) }}" class="carousel__slide">
                        <span>{{ $histoire->titre }}</span>
                        <img src="{{$histoire->photo}}" alt="Image calculée">
                    </a>
                @endforeach
                </div>
            </div>
        </div>
    </div>

        @else
        <p>Aucune histoire pour ce genre.</p>
        @endif
    @endforeach
</div>
@endsection