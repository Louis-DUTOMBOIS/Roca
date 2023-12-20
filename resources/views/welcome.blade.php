@extends("templates.app")

@section('content')
    <div>
        <h1>Liste des histoires</h1>
        @foreach ($genres as $genre)
            <h2>{{ $genre->label }}</h2>
            @if (isset($histoiresParGenre[$genre->label]) && count($histoiresParGenre[$genre->label]) > 0)
                <table>
                    <thead>
                    <tr>
                        <td>Titre</td>
                        <td>Pitch</td>
                        <td>Photo</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($histoiresParGenre[$genre->label] as $histoire)
                        <tr>
                            <td>{{ $histoire->titre }}</td>
                            <td>{{ $histoire->pitch }}</td>
                            <td>{{ $histoire->photo }}</td>
                            <!-- Ajoutez d'autres colonnes au besoin -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>Aucune histoire pour ce genre.</p>
            @endif
        @endforeach
    </div>

@endsection