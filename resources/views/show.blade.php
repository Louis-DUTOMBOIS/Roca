<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Redacted+Script:wght@400">

    @vite(['resources/css/test-vite.css', 'resources/js/test-vite.js'])
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>
<body>

    <h1>Profile de {{$user->name}}</h1>

    <p>Name : {{ $user->name }}</p>
    <p>Adresse email : {{ $user->email }}</p>

    <a href="{{ route('index') }}">Retour à la page d'accueil</a>

    @if($user->stories->isNotEmpty())
        <h2>Histoire écrite par {{ $user->name }}</h2>
        <ul>
            @foreach($user->stories as $story)
                <li>{{ $story->titre }}</li>
            @endforeach
        </ul>
    @else
        <p>Pas d'histoire écrite par {{ $user->name }}.</p>
    @endif


        <h2>Histoires terminées par {{ $user->name }}</h2>
        <ul>
            @foreach($user->terminees as $terminee)
                <li>{{ $terminee->titre }}</li>
                <li>{{ $terminee->pivot->nombre }} fois terminée</li>
            @endforeach
        </ul>



</body>
</html>
