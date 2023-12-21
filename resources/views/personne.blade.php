<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
</head>
<body>
@auth
    <h1>Voici vos informations personnelles</h1>

    <p> Nom : {{ Auth::user()->name }}</p>
    <p> Email : {{ Auth::user()->email }}</p>

    <div>
        <form action="{{ route('profile.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <h2>Choix d'une photo de profil :</h2>
            </div>
            <div>
                <label for="doc">Image : </label>
                <input type="file" name="document" id="doc">
            </div>
            <input type="submit" value="Télécharger" name="submit">
        </form>
        <img src="{{ Storage::url(Auth::user()->avatar_lien) }}" alt="Image de l'utilisateur">

    </div>

@endauth
</body>
</html>
