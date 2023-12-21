@extends('templates.app')



    @section('content')





    <div class="ambi-light">
        @if ($chapitre->media)
            @if (pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpg' ||
                    pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpeg' ||
                    pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'png')
                <img src="{{ $chapitre->media }}" alt="Image du chapitre">
            @else
                <img src="{{ $chapitre->media }}" alt="Image du chapitre">
            @endif
        @endif
    </div>

    <div class="card">
        @if ($chapitre->media)
            @if (pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpg' ||
                    pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'jpeg' ||
                    pathinfo($chapitre->media, PATHINFO_EXTENSION) === 'png')
                <div class="cover">
                    <img src="{{ $chapitre->media }}" alt="Image du chapitre">
                </div>
            @else
                <div class="cover">
                    <img src="{{ $chapitre->media }}" alt="Image du chapitre">
                </div>
            @endif
        @endif


        <h1>{{ $chapitre->titrecourt }}</h1>
        <h1>{{ $chapitre->titre }}</h1>
        <p>{{ $chapitre->texte }}</p>

        @if ($chapitre->question)
            <p>{{ $chapitre->question }}</p>
            <!-- Affichage des choix sous forme de boutons -->
            <div class="choices">
                @foreach ($chapitre->suivants as $suivant)
                    <form method="POST" action="{{ route('makeChoice') }}">
                        @csrf
                        <input type="hidden" name="chapitre_id" value="{{ $chapitre->id }}">
                        <input type="hidden" name="reponse" value="{{ $suivant->id }}">
                        <button type="submit" class="submit">{{ $suivant->titrecourt }}</button>
                    </form>
                @endforeach
            </div>
        @else
            <p>L'histoire est terminée</p>
            <div class="container-cta-end">
                <a class="submit submit-primary" href='{{ route('index') }}'>Retourner à l'accueil</a>
            </div>



            {{-- page de fin, cta recommencer, cta aller acceuil --}}

        @endif
    </div>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

h1 {
  color: #fff;
  text-align: center;

  /* Display/H3 */
  font-family: Albert Sans;
  font-size: 48px;
  font-style: normal;
  font-weight: 700;
  line-height: 48px; /* 100% */
}

body {
  color: white;
  height: 100vh;
}

.ambi-light {
  width: 100%;
  height: 40rem;
  position: absolute;
  top: 0;
  z-index: -10;
}

.ambi-light img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}

.ambi-light::after {
  content: "";
  background: linear-gradient(
      0deg,
      rgba(15, 23, 42, 0.75) 0%,
      rgba(15, 23, 42, 0.75) 100%
    ),
    linear-gradient(180deg, #0f172a 0%, #0f172a14 50%, #0f172a 99%),
    rgba(211, 211, 211, 0.203) 10% / cover no-repeat;
  position: absolute;
  top: 0;
  opacity: 98%;
  right: 0;
  bottom: 0;
  left: 0;
}

.card {
  position: relative;
  display: inline-flex;
  padding: 32px;
  border: 1px solid rgba(255, 255, 255, 0.444);

  max-width: 580px;
  flex-direction: column;
  align-items: flex-start;
  gap: 8px;
  border-radius: var(--Common-Spacing-M, 16px);
  background: var(--Common-Neutral-Lower, #1e293b);
}

.card img {
  height: 280px;
  border-radius: var(--Common-Spacing-XS, 8px);
  outline: 1px solid rgba(255, 255, 255, 0.444);
  background: linear-gradient(
      180deg,
      rgba(30, 41, 59, 0.4) 0%,
      rgba(0, 0, 0, 0) 11.67%
    ),
    url(<path-to-image>), lightgray 50% / cover no-repeat;
  width: 100%;
  object-fit: cover;
}

.card .cover {
  width: 100%;
  margin-bottom: 1rem;
}

p {
  color: var(--Common-Neutral-Hightest, #fff);

  /* Text/Medium */
  font-family: Albert Sans;
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: 165%; /* 26.4px */
}

.choices {
  margin-top: 32px;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  gap: 0.5rem;
}

.submit {
  display: flex;
  padding: var(--sizes-button-input-nav-large-padding-v, 12px) var(--sizes-button-input-nav-large-padding-h, 24px);
  justify-content: center;
  align-items: center;
  gap: var(--sizes-button-input-nav-large-gap, 8px);

  border-radius: var(--Button-Border-radius, 8px);
  border: 1px solid var(--Button-Light-Default-Border, rgba(255, 255, 255, 0.00));
  background-color: var(--Button-Light-Default-Background, rgba(255, 255, 255, 0.30)) ;
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  color: #ffffff;
  text-decoration: none;

  width: 100%;
  cursor: pointer;
}

.submit:hover {
  background-color: var(--Button-Light-Hover-Background, rgba(255, 255, 255, 0.50));
  border: 1px solid var(--Button-Light-Hover-Border, rgba(255, 255, 255, 0.00));
}

.container-cta-end {
  display: flex;
  gap: 8px;
  width: 100%;
}

.container-cta-end .submit {
  width: 100%;
}

.submit-primary {
  color: #161353;
  background-color: #6e7fff;
}

.submit-primary:hover {
  background-color: #6e7fffb0;
}

footer {
    display: none!important
}
</style>

@endsection
