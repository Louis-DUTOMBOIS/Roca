@extends('templates.app')



    @section("content")
    @auth
    <div id="accountContainer">
        
        <img src="images/SecondaryIcon.jpg" class="accountBG"/>
        
        <img src="images/Pencil-line.svg" alt="un triangle avec trois côtés égaux" height="16" width="16" class="accountIcon"/>

        {{--<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Image de l'utilisateur" id="profilPic">--}}
        <img src="{{ Storage::url(Auth::user()->avatar_lien) }}" alt="Image de l'utilisateur" id="profilPic">


        <h1>{{ Auth::user()->name }}</h1>
        <p class="userMail">{{ Auth::user()->email }}</p>

        {{-- <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form> --}}



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




<style>

#accountContainer {
    color: white;
    width: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.accountBG {
    position: absolute;
    width: 100%;
    height: auto;
    top: 0;
    z-index: -1;
}

#accountContainer a{
    text-decoration: none;
    color: white;
}

#accountContainer p{
    margin: 0;
}


#accountContainer h1{
    color: #FFF;
    text-align: center;
    font-family: Albert Sans;
    font-size: 30px;
    font-style: normal;
    line-height: 36px; /* 120% */
}



#profilPic {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    margin-bottom: 1rem;
}

.accountIcon {
    display: flex;
    padding: 8px;
    justify-content: center;
    align-items: center;
    gap: 6px;
    position: relative;
    right: -4rem;
    top: 3rem;
    border-radius: 8px;
    border: 1px solid #475569;
    background: #0F172A;
    height: 16px;
    width: 16px;
}

.accountIcon:hover {
    cursor: pointer;
}

.modal {
    position: fixed;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.5);
    color: white;
    z-index: 1;
    overflow: auto;
    display: none;
    z-index: 2;
}



.modalContent {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #0f172a;
    width: 500px;
    height: auto;
    padding: 2rem 0;
    border-radius: 1rem;
}

.modalImg {
    width: 70%;
    max-width: 1000px;
}

.modalTxt {
    margin-top: 1rem;
}

.closeM   {
    position: absolute;
    top: 1rem;
    right: 2rem;
    cursor: pointer;
}

.appear {
    display: block;
    pointer-events: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.userMail {
    color: #FFF;
    text-align: center;
    /* Text/Small */
    font-family: Albert Sans;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 20px; /* 142.857% */
}

.accountListes {
    margin-bottom: 3rem;
    display: inline-flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 48px;
}

.maListe {
    color: white;
    gap: 24px;
}

.maListeCards {
    display: flex;
    width: 1200px;
    align-items: flex-start;
    gap: 32px;
}

.maListeCard {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
}

.cover {
    position: relative;
}

.maListeCard p{
    color: #CBD5E1;
    font-size: 14px;
    position: absolute;
    z-index: 1;
    border-radius: 8px;
    background: #475569;
    display: inline-flex;
    height: 24px;
    padding: 0px 8px;
    justify-content: center;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
}

.maListeCard img {
    width: 220px;
    height: auto;
    border-radius: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.20);
}

.reprendreImgBtn {
    font-family: Albert Sans;
    display: flex;
    width: 220px;
    padding: 8px;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
    gap: 8px;
    flex-shrink: 0;
    position: relative;
}

.reprendreImgBtn button{
    display: flex;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 6px;
    flex: 1 0 0;
    border-radius: 8px;
    border: 1px solid #CBD5E1;
    background:  #FFF;
    width: 85%;
    position: absolute;
    bottom: 1rem;
    align-self: center;
}

.labeldiv {
    position: relative;
}

.labeldiv p {
    position: absolute;
    right: 10px;
    top: 0;
}

.upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
  }
  
  .btn {
    border: 2px solid gray;
    color: gray;
    background-color: white;
    padding: 8px 20px;
    border-radius: 8px;
    font-size: 20px;
    font-weight: bold;
    
  }
  
  .upload-btn-wrapper input[type=file] {
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
  }

.label-file {
    cursor: pointer;
    display: flex;
    padding: 12px 24px;
    justify-content: center;
    align-items: center;
    gap: 8px;
    border-radius: 8px;
    border: 1px solid  #6E7FFF;
    background: #6E7FFF;
}

.input-file {
    display: none;
}

#previewImageContainer img {
    object-fit: cover;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    margin: 2rem;
}

.submit {
    display: none;
}

.submitVisible {
    display: block;
    cursor: pointer;
    color: #FFF;
    display: flex;
    padding: 12px 24px;
    justify-content: center;
    align-items: center;
    gap: 8px;
    border-radius: 8px;
    border: 1px solid  #6E7FFF;
    background: #6E7FFF;
    margin: auto;
}

h1 {
    margin: 1rem 0 2rem 0 ;
}


</style>

@endsection
