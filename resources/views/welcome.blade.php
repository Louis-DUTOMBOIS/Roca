@extends("templates.app")

@section('content')
    <div style="display: flex;align-items: center; justify-content: center">

        <div>
            @auth
                <button><a href="{{route('profil')}}" id="informations">Profil</a>
                </button>
            @endauth
            <b>Le marathon du WEB 2023 !!!</b>
        </div>
    </div>

@endsection