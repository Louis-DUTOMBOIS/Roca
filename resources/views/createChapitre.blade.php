@extends("templates.app")

@section('content')
    <div>
        <form action="{{route('chapitre.create')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-header">
                <h3>Création de votre Chapitre</h3>
            </div>
            <!--Nom Input-->
            <div class="form-group">
                <input type="text" name="Titre" class="form-input" placeholder="Titre">
            </div>
            <div class="form-group">
                <input type="text" name="TitreCourt" class="form-input" placeholder="TitreCourt">
            </div>
            <div class="form-group">
                <input type="text" name="Texte" class="form-input" placeholder="Texte">
            </div>
            <div>
                <label for="doc">Image : </label>
                <input type="file" name="media" id="doc">
            </div>
            <div class="form-group">
                <input type="text" name="Question" class="form-input" placeholder="Question">
            </div>
            <div class="form-group">
                <input type="submit" value="Enregistrement" name="submit">
            </div>
        </form>
    </div>
@endsection