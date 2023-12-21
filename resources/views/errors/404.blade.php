@extends("templates.app")

@section('css')
@vite("resources/css/404.css")
  
@append

@section('content')
    <div class="wrapper_img"><img src="/images/rickroll.gif" alt=""></div>
    <div class="wrapper_404" style="font-size: larger;"><h1>404</h1>
    <a class="btn primary" href="/">Revenir à l'accueil<img src="/images/home.svg" alt=""></a>
    </div>
@endsection
