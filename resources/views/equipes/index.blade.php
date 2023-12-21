@extends('templates.app')

@section('content')

    @vite(['resources/css/equipe.css'])
    <div class="maxwidth-equipe">

        <h2 class="h2membre-equipe scroll hidden">Membres de l'équipe :</h2>

        <ul class="equipe-all scroll hidden transitiondelay">
            <li>
                <img src="/images/Alex.png" alt="">
                <p>Alex</p>
            </li>
            <li>
                <img src="/images/ThéoInfo.png" alt="">
                <p>Théo</p>
            </li>
            <li>
                <img src="/images/HugoInfo.png" alt="">
                <p>Hugo</p>
            </li>
            <li>
                <img src="/images/LouisInfo.png" alt="">
                <p>Louis</p>
            </li>
            <li>
                <img src="/images/LucasMMI.png" alt="">
                <p>Lucas</p>
            </li>
            <li>
                <img src="/images/TanguyMMI.png" alt="">
                <p>Tanguy</p>
            </li>
            <li>
                <img src="/images/LouisMMI.png" alt="">
                <p>Louis</p>
            </li>
            <li>
                <img src="/images/GautierMMI.png" alt="">
                <p>Gautier</p>
            </li>
            <li>
                <img src="/images/Valentin.png" alt="">
                <p>Valentin</p>
            </li>
        </ul>

        <img src="images/teambg.jpg" class="picture-team scroll hidden" alt="">
    </div>
@endsection
