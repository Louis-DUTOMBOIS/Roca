@extends("templates.app")

@section('css')

@vite('resources/css/register.css')

@endsection

@section('content')

    <div class="flex-register">
        <img src="images/imgconnect.png" class="bloc_rouge" alt=""> 

            <div>
                <h1 class="h1login">👋 Ça fait toujours plaisir de t’accueillir !</h1>
                <p>Rejoignez la plus grande app de stockage de photos de l’IUT de Lens</p>
                
                <form action="{{route("register")}}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Nom :</legend>
                        <input type="text" name="name" required placeholder="Name" /><br />
                    </fieldset>
                    <fieldset>
                        <legend>Email :</legend>
                        <input type="email" name="email" required placeholder="Email" /><br />
                    </fieldset>
                    <fieldset>
                        <legend>Mot de passe :</legend>
                        <input type="password" name="password" required placeholder="password" /><br />
                    </fieldset>
                    <fieldset>
                        <legend>Confirmer mot de passe :</legend>
                        <input type="password" name="password_confirmation" required placeholder="password" /><br />
                    </fieldset>

                    <input type="submit" value="S'inscrire" class="submitlogin"/><br />
                    <div class="no_count">
                        Déjà un compte ? <a href="{{route("login")}}" class="pasdecompte">Connectez vous</a>
                    </div>
                </form>
            </div>
        
    </div>

@endsection
