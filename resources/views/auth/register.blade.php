@extends("templates.app")

@section('css')
@vite([ 'resources/css/register.css' ])
@append


@section('content')

    <div class="flex-register">
        <img src="images/imgconnect.png" class="bloc_rouge scroll hidden" alt=""> 

            <div class="scroll hidden transitiondelay">
                <h1 class="h1login">👋 Ça fait toujours plaisir de t’accueillir !</h1>
                <p>Rejoignez la plus grande app de stockage de photos de l’IUT de Lens</p>
                
                <form action="{{route("register")}}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Nom :</legend>
                        <input type="text" name="name" required placeholder="Nom" /><br />
                    </fieldset>
                    <fieldset>
                        <legend>Email :</legend>
                        <input type="email" name="email" required placeholder="Email" /><br />
                    </fieldset>
                    <fieldset>
                        <legend>Mot de passe :</legend>
                        <input type="password" name="password" required placeholder="Mot de passe" /><br />
                    </fieldset>
                    <fieldset>
                        <legend>Confirmer mot de passe :</legend>
                        <input type="password" name="password_confirmation" required placeholder="Confirmer mot de passe " /><br />
                    </fieldset>

                    <input type="submit" value="S'inscrire" class="submitlogin"/><br />
                    <div class="no_count">
                        Déjà un compte ? <a href="{{route("login")}}" class="pasdecompte">Connectez vous</a>
                    </div>
                </form>
            </div>
        
    </div>

@endsection
