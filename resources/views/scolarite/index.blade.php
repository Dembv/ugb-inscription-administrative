@extends('scolarite.scolarite')

@section('titre', "Accueil")

@section('contenu')

    <div class="row p-2">
        <div class="col-md-6 order-2 order-md-1">
            <h1 class="fs-2 text-bleu">Bienvenue à l'<span class="text-marron">espace Scolarité</span></h1>
        </div>
        <div class="col-md-6 text-end order-1 order-md-2">
            <a class="btn btn-danger" href="{{ route('auth.logout') }}">Se déconnecter</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 p-2">
            <div class="row p-3">
                <a href="{{ route('scolarite.student.index') }}" class="text-decoration-none text-white fs-3">
                    <div class="bg-marron rounded-2 d-flex p-3">
                        <div class="col-md-6 px-4">
                            <img src="assets/icones/diplome.png" alt="" class="img-fluid w-75">
                        </div>
                        <div class="col-md-6 my-auto">
                            <div class="text-start">
                                Etudiants
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 p-2 ">
            <div class="row p-3">
                <a href="{{ route('scolarite.formation.index') }}" class="text-decoration-none text-white fs-3">
                    <div class="bg-marron rounded-2 d-flex p-3 shadow-lg">
                        <div class="col-md-6 px-4">
                            <img src="assets/icones/formation.png" alt="" class="img-fluid w-75">
                        </div>
                        <div class="col-md-6 my-auto">
                            <div class="text-start">
                                Formations
                            </div>
                        </div>
                    </div>
                </a>
            </div>            
        </div>
        <div class="col-md-4 p-2 ">
            <div class="row p-3">
                <a href="{{ route('scolarite.level.index') }}" class="text-decoration-none text-white fs-3">
                    <div class="bg-marron rounded-2 d-flex p-3 shadow-lg">
                        <div class="col-md-6 px-4">
                            <img src="assets/icones/les-niveaux.png" alt="" class="img-fluid w-75">
                        </div>
                        <div class="col-md-6 my-auto">
                            <div class="text-start">
                                Niveaux
                            </div>
                        </div>
                    </div>
                </a>
            </div>     
        </div>
        <div class="col-md-4 p-2 ">
            <div class="row p-3">
                <a href="{{ route('scolarite.year.index') }}" class="text-decoration-none text-white fs-3">
                    <div class="bg-marron rounded-2 d-flex p-3 shadow-lg">
                        <div class="col-md-6 px-4">
                            <img src="assets/icones/annuel.png" alt="" class="img-fluid w-75">
                        </div>
                        <div class="col-md-6 my-auto">
                            <div class="text-start">
                                Années Academiques
                            </div>
                        </div>
                    </div>
                </a>
            </div>     
        </div>
        <div class="col-md-4 p-2">
            <div class="row p-3">
                <a href="{{ route('scolarite.information.index') }}" class="text-decoration-none text-white fs-3">
                    <div class="bg-marron rounded-2 d-flex p-3 shadow-lg">
                        <div class="col-md-6 px-4">
                            <img src="assets/icones/informatif.png" alt="" class="img-fluid w-75">
                        </div>
                        <div class="col-md-6 my-auto">
                            <div class="text-start">
                                Informations
                            </div>
                        </div>
                    </div>
                </a>
            </div>  
        </div>
        <div class="col-md-4 p-2 ">
            <div class="row p-3">
                <a href="{{ route('scolarite.registration.index') }}" class="text-decoration-none text-white fs-3">
                    <div class="bg-marron rounded-2 d-flex p-3 shadow-lg">
                        <div class="col-md-6 px-4">
                            <img src="assets/icones/inscription.png" alt="" class="img-fluid w-75">
                        </div>
                        <div class="col-md-6 my-auto">
                            <div class="text-start">
                                Inscriptions
                            </div>
                        </div>
                    </div>
                </a>
            </div>  
        </div>
    </div>

@endsection