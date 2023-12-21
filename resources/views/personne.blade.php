@extends('templates.app')

@section('css')
    @vite("resources/css/account.css")
@endsection


    @section("content")
    @auth
    <div id="accountContainer">
        
        <img src="images/SecondaryIcon.jpg" class="accountBG"/>
        
        <img src="images/Pencil-line.svg" alt="un triangle avec trois côtés égaux" height="16" width="16" class="accountIcon"/>

        {{--<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Image de l'utilisateur" id="profilPic">--}}
        <img src="{{ Storage::url(Auth::user()->avatar_lien) }}" alt="Image de l'utilisateur" id="profilPic">


        <h1>{{ Auth::user()->name }}</h1>
        <p class="userMail">{{ Auth::user()->email }}</p>

        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
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



        <div class="modal">
            <span class="closeM">Press ESC</span>
            <div class="modalContent">
                <form action="{{ route('profile.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=".upload-btn-wrapper">
                        <label for="file" class="label-file" id="label-file">Choisir une image</label>
                        <input type="file" name="file" id="file" class="input-file" onchange="previewImage()">
                        <div id="previewImageContainer"></div>
                        <input type="submit" value="Valider" name="submit" class="submit" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="accountListes">

        <div class="maListe scroll hidden">
            <h1>Ma liste de lecture</h1>
            <div class="maListeCards">
                <div class="maListeCard">
                    <div class="labeldiv">
                        <p>Label</p>
                        <img src="images/book_cover1.jpg" alt="" srcset="" class="cover">
                    </div>
                    <span>Titre Histoire</span>
                </div>
                <div class="maListeCard">
                    <div class="labeldiv">
                        <p>Label</p>
                        <img src="images/book_cover2.jpg" alt="" srcset="" class="cover">
                    </div>
                    <span>Titre Histoire</span>
                </div>
                <div class="maListeCard">
                    <div class="labeldiv">
                        <p>Label</p>
                        <img src="images/book_cover3.jpg" alt="" srcset="" class="cover">
                    </div>
                    <span>Titre Histoire</span>
                </div>
            </div>
        </div>
        <div class="maListe scroll hidden">
            <h1>Reprendre l'écriture</h1>
            <div class="maListeCards">
                <div class="maListeCard">
                    <div class="reprendreImgBtn">
                        <img src="images/book_cover3.jpg" alt="" srcset="" class="cover">
                        <button>Continuer</button>
                    </div>
                    <span>Titre Histoire</span>
                </div>
                <div class="maListeCard">
                    <div class="reprendreImgBtn">
                        <img src="images/book_cover1.jpg" alt="" srcset="" class="cover">
                        <button>Continuer</button>
                    </div>
                    <span>Titre Histoire</span>
                </div>
            </div>
        </div>
        <div class="maListe scroll hidden">
            <h1>Mes chefs-d'œuvre</h1>
            <div class="maListeCards">
                <div class="maListeCard">
                    <div class="labeldiv">
                        <p>Label</p>
                        <img src="images/book_cover1.jpg" alt="" srcset="" class="cover">
                    </div>
                    <span>Titre Histoire</span>
                </div>
                <div class="maListeCard">
                    <div class="labeldiv">
                        <p>Label</p>
                        <img src="images/book_cover3.jpg" alt="" srcset="" class="cover">
                    </div>
                    <span>Titre Histoire</span>
                </div>
                <div class="maListeCard">
                    <div class="labeldiv">
                        <p>Label</p>
                        <img src="images/book_cover2.jpg" alt="" srcset="" class="cover">
                    </div>
                    <span>Titre Histoire</span>
                </div>
            </div>
        </div>
    </div>






    <script>

        const icon = document.querySelector(".accountIcon")
        const modal = document.querySelector(".modal")
        const modalImg = document.querySelector(".modalImg")
        const modalTxt = document.querySelector(".modalTxt")
        const closeM = document.querySelector(".closeM")


        icon.addEventListener("click", (e) => {
            console.log(e.target.src)
            modal.classList.add("appear")
        })

        closeM.addEventListener("click", () => {
            modal.classList.add("appear");
        })




        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                modal.classList.remove("appear");
            }
        });


        // Prévisu de l'image uploadée

        function previewImage() {
        const fileInput = document.getElementById('file');
        const submit = document.getElementById('submit');
        const file = fileInput.files[0];
        const imagePreviewContainer = document.getElementById('previewImageContainer');

        if(file.type.match('image.*')){
            const reader = new FileReader();

            reader.addEventListener('load', function (event) {
            const imageUrl = event.target.result;
            const image = new Image();

            image.addEventListener('load', function() {
                imagePreviewContainer.innerHTML = ''; // Vider le conteneur au cas où il y aurait déjà des images.
                imagePreviewContainer.appendChild(image);
            });

            image.src = imageUrl;
            console.log(submit)
            submit.classList.add('submitVisible')
            });

            reader.readAsDataURL(file);
        }
        }

    </script>

        @endauth
@endsection
