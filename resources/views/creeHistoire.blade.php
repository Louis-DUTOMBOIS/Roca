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
<div>
    <form action="{{route('histoire.create')}}" method="post">
        @csrf
        <div class="form-header">
            <h3>Création de votre histoire</h3>
        </div>
        <!--Nom Input-->
        <div class="form-group">
            <input type="text" name="Titre" class="form-input" placeholder="Titre">
        </div>
        <div class="form-group">
            <input type="text" name="Pitch" class="form-input" placeholder="Pitch">
        </div>
        <div>
            <label for="doc">Image : </label>
            <input type="file" name="document" id="doc">
        </div>
        <div>
            <label for="genre"> Choix du genre :</label>
            <select name="genre" id="genre">
                @if(isset($genres))
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id}}">{{ $genre->label }}</option>
                    @endforeach
                @else
                    <option>Pas de genre</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <button class="form-button" type="submit">Enregistrement</button>
        </div>
    </form>
</div>
</body>
</html>