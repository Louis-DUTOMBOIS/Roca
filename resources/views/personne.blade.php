{{-- @extends('templates.app')

@section('css')
    @vite("resources/css/account.css")
@endsection --}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "Page en cours"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js', 'resources/css/account.css'])
</head>
<body>
<header>Ma super application</header>
<nav>
    <a href="{{route('index')}}">Accueil</a>
    <a href="{{route('test-vite')}}">Test Vite</a>
    <a href="#">Contact</a>
    <a href="{{route('equipe')}}">Equipe</a>

@auth
        {{Auth::user()->name}}
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
    @else
        <a href="{{route("login")}}">Login</a>
        <a href="{{route("register")}}">Register</a>
    @endauth
</nav>







<main>
    {{-- @yield("content") --}}
    @auth
    <div id="accountContainer">
        
        <img src="images/Pencil-line.svg" alt="un triangle avec trois côtés égaux" height="16" width="16" class="accountIcon"/>
        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Image de l'utilisateur" id="profilPic">
        {{-- <img src="{{ Storage::url(Auth::user()->avatar_lien) }}" alt="Image de l'utilisateur"> --}}
        
        <p>{{ Auth::user()->name }}</p>
        <p>{{ Auth::user()->email }}</p>

        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
    


        <div class="modal">
            <span class="closeM">ESC</span>
            <div class="modalContent">
                <form action="{{ route('profile.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="file" name="document" id="doc">
                    </div>
                    <input type="submit" value="Télécharger" name="submit">
                </form>
            </div>
        </div>
        
    </div>
        @endauth
</main>

<footer>IUT de Lens</footer>

<script>
    const icon = document.querySelector(".accountIcon")
    const modal = document.querySelector(".modal")
    const modalImg = document.querySelector(".modalImg")
    const modalTxt = document.querySelector(".modalTxt")
    const closeM = document.querySelector(".closeM")



    icon.addEventListener("click", (e) => {
        console.log(e.target.src)
        modal.classList.add("appear")
    })

    closeM.addEventListener("click", () => {
        modal.classList.add("appear");
    })




    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            modal.classList.remove("appear");
        }
    });
</script>
</body>
</html>







