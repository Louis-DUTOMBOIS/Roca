<h1>Chapitres de l'Histoire</h1>
<ul>
    @foreach($chapitres as $chapitre)
    <li>{{ $chapitre->titrecourt }}</li>
    @endforeach

        <form method="GET" action="{{route('createChapitre'}}">
            <button type="submit">Creer un chapitre</button>
        </form>
</ul>