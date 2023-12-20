@extends("templates.app")

@section('css')

@vite('resources/css/login.css')

@endsection

@section('content')

    <div class="flex-login">
        <img src="images/imgconnect.png" class="bloc_rouge" alt=""> 
        
        <div>
            <h1 class="h1login">⭐️ Enfin, ça faisait longtemps !</h1>
            <p>Rejoignez la plus grande app de stockage de photos de l’IUT de Lens</p>
            
            <form action="{{route("login")}}" method="post">
                @csrf
                <fieldset>
                    <legend>Email :</legend>
                    <input type="email" name="email" required placeholder="Email" /><br />
                </fieldset>
                <fieldset>
                    <legend>Mot de passe :</legend>
                    <input type="password" name="password" required placeholder="Mot de passe" /><br />
                </fieldset>
                <!-- Remember me<input type="checkbox" name="remember"   /><br /> -->
                <input type="submit" value="Se Connecter" class="submitlogin"/><br />
                <div class="no_count">
                    Vous n'avez pas de compte ? 
                    <a href="{{route("register")}}" class="pasdecompte">Inscrivez-vous</a>
                </div>
            </form>
        </div>
    </div>

@endsection