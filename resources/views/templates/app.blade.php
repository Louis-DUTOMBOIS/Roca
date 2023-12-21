<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "Page en cours"}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Albert Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Albert Sans:900">

    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js' ])

    @yield("css")


<<<<<<< HEAD
    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js', 'resources/css/login.css', 'resources/css/register.css', 'resources/css/welcome.css'])
=======
>>>>>>> 65d69536e7f8f9d5efcf544c89e72e6cb23aed53
</head>
<body>



<nav>
    <a href="{{route('index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="127" height="40" viewBox="0 0 127 40" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2644 7.68513C10.641 7.68513 7.68513 10.6337 7.68513 14.2939C7.68513 17.9541 10.641 20.9027 14.2644 20.9027C17.8878 20.9027 20.8437 17.9541 20.8437 14.2939C20.8437 10.6337 17.8878 7.68513 14.2644 7.68513ZM0 14.2939C-2.81735e-07 6.40987 6.37615 0 14.2644 0C22.1527 0 28.5288 6.40987 28.5288 14.2939C28.5288 21.9809 22.4674 28.2665 14.853 28.5759C15.6607 29.227 16.5274 29.7594 17.3873 30.1153C18.1919 30.4483 19.5754 30.6484 21.332 30.5581C23.0339 30.4706 24.7057 30.1301 25.893 29.7126L28.4426 36.9625C26.4967 37.6468 24.0922 38.1114 21.7267 38.2331C19.416 38.3519 16.7411 38.1652 14.4482 37.2162C11.9431 36.1794 9.58268 34.4423 7.6852 32.342V38.7206H7.21242e-05L6.31086e-05 14.8692H0.0113505C0.00380652 14.6784 0 14.4866 0 14.2939Z" fill="#F1F5F9"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M61.2703 24.7267C61.2703 33.1619 54.4322 40 45.997 40C37.5618 40 30.7238 33.1619 30.7238 24.7267C30.7238 16.2915 37.5618 9.45341 45.997 9.45341C54.4322 9.45341 61.2703 16.2915 61.2703 24.7267ZM45.997 31.9441C49.9831 31.9441 53.2145 28.7128 53.2145 24.7267C53.2145 20.7406 49.9831 17.5092 45.997 17.5092C42.011 17.5092 38.7796 20.7406 38.7796 24.7267C38.7796 28.7128 42.011 31.9441 45.997 31.9441Z" fill="#F1F5F9"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M78.8598 39.5863C85.7622 39.5863 91.5793 35.025 93.353 28.8059L84.9477 28.4249C83.7018 30.4451 81.4414 31.7954 78.8598 31.7954C74.9323 31.7954 71.7484 28.6703 71.7484 24.8153C71.7484 20.9603 74.9323 17.8352 78.8598 17.8352C81.4414 17.8352 83.7018 19.1855 84.9477 21.2057L93.353 20.8247C91.5793 14.6055 85.7622 10.0443 78.8598 10.0443C70.5486 10.0443 63.811 16.6575 63.811 24.8153C63.811 32.9731 70.5486 39.5863 78.8598 39.5863Z" fill="#F1F5F9"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M126.44 24.234C126.44 32.397 119.562 39.0145 111.078 39.0145C102.594 39.0145 95.7165 32.397 95.7165 24.234C95.7165 16.0709 102.594 9.45341 111.078 9.45341C119.562 9.45341 126.44 16.0709 126.44 24.234ZM111.078 31.2186C115.088 31.2186 118.338 28.0914 118.338 24.234C118.338 20.3765 115.088 17.2494 111.078 17.2494C107.069 17.2494 103.819 20.3765 103.819 24.234C103.819 28.0914 107.069 31.2186 111.078 31.2186Z" fill="#F1F5F9"/>
  <path d="M118.351 24.8057H126.44V39.5863H118.351V24.8057Z" fill="#F1F5F9"/>
</svg></a>



<div class="rightNav">



@auth
        {{Auth::user()->name}}
        <a href="{{route('histoire.index')}}">Créer une Histoire</a>
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
        <button>
            <a href="{{route('profil')}}" id="informations">Profil</a>
        </button>
    @else
        <a href="{{route("login")}}" class="navCTA1">Se connecter</a>
        <a href="{{route("register")}}" class="navCTA2">S'inscrire</a>
    @endauth

    </div>
</nav>

<main>
    @yield("content")
</main>
<footer class="scroll hidden transitiondelay">
    <div class="footer-img">
        <img class="logo-footer" src="images/logosite.png" alt="">
    </div>
    <div class="lien-footer">
        <a href="#">A Propos</a>
        <a href="#">Mentions Légales</a>
        <a href="{{route('equipe')}}">Équipe projet</a>
    </div>
</footer>
</body>
</html>
