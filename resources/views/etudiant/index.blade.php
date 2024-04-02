@extends('etudiant.etudiant')

@section('titre', "Accueil")

@section('contenu')
    
    <div class="wrapper">


        <!-- Sidebar -->
        <aside id="sidebar" class="p-0">
            <div class="h-100 justify-content-end w-100 sticky-top">
                <div class="sidebar-logo d-flex justify-content-center">
                    <a href="#"><img src="../assets/images/logo-ugb.png" class="imageReduit" width="150" height="150" alt=""></a>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav list-unstyled" id="liste">
                    <li class="sidebar-header text-decoration-none text-center mb-2 text-marron">
                    <span class="texteDisparaitre">Portail de Services aux Etudiants</span>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link text-decoration-none text-marron">
                            <i class="fas fa-home pe-2"></i>
                            <span class="texteDisparaitre">Accueil</span>
                        </a>
                    </li>
                    <li class="sidebar-item border">
                        <a href="#" class="sidebar-link text-decoration-none text-marron">
                            <i class="fas fa-solid fa-folder pe-2"></i>
                            <span class="texteDisparaitre">Inscription Administrative</span>
                        </a>
                    </li>
                    <li class="sidebar-item border">
                        <a href="#" class="sidebar-link text-decoration-none text-marron">
                            <i class="fas fa-solid fa-file pe-2"></i>
                            <span class="texteDisparaitre">Inscription Pédagogique</span>
                        </a>
                    </li>
                    <li class="sidebar-item border">
                        <a href="#" class="sidebar-link text-decoration-none text-marron">
                            <i class="fas fa-solid fa-eye pe-2"></i>
                            <span class="texteDisparaitre">Consultation de notes</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link text-decoration-none text-marron">
                            <i class="fas fa-solid fa-book pe-2"></i>
                            <span class="texteDisparaitre">Informations</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link text-decoration-none text-marron">
                            <i class="fas fa-solid fa-question-circle pe-2"></i>
                            <span class="texteDisparaitre">Aide</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand bg-marron sticky-top p-0">
                <!-- Button for sidebar toggle -->
                <div class="container-fluid h-f">
                    <div class="col-md-1 col-2 align-items-center">
                    <button class="btn border-white" id="btnSideBar" type="button" data-bs-theme="dark">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    </div>
                    <div class="col-md-11 col-10 d-flex justify-content-between align-items-center">
                        <div id="disparaitre">
                            <h2 class="text-white">Portail de Services aux Etudiants</h2>
                        </div>
                        <div id="disparaitre2" class="dropdown">
                            <a class="nav-link dropdown-toggle fs-6 text-white" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/storage/{{ $student->image }}" class="rounded-circle" width="24" height="24" alt="">
                                <span class="text-disparaitre">{{$student->prenom}} {{$student->nom}} </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Se déconnecter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <main class="content px-2">
                <div class="container-fluid">
                    <div class="row bg-dark bg-opacity-25">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif    
                    </div>
                </div>
                <div class="row bg-dark bg-opacity-25 p-3 justify-content-between contenu">
                    <div class="col-md-9 p-3 bg-white rounded">
                        <div class="row">
                            <h3 class="text-bleu"><i class="fas fa-folder"></i> Inscription Administrative</h3>
                        </div>
                        <div class="row">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tab1" data-bs-toggle="tab" data-bs-target="#content1" type="button" role="tab" aria-controls="content1" aria-selected="true"><span class="text-bleu fs-6"><i class="fas fa-user"></i> Informations Personnelles</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab2" data-bs-toggle="tab" data-bs-target="#content2" type="button" role="tab" aria-controls="content2" aria-selected="false"><span class="text-bleu fs-6"><i class="fas fa-book-open"></i> Formations</span></button>
                                </li>
                            </ul>
                            <div class="tab-content mt-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="content1" role="tabpanel" aria-labelledby="tab1" tabindex="0">
                                    <div class="row justify-content-center align-items-center text-marron">
                                        <p>Veuillez remplir ce formulaire d'abord.</p>
                                    </div>
                                    <div class="row justify-content-center align-items-center ">
                                        <span>Les champs grisés ne peuvent pas être modifiés. les champs précédés de "<span style="color: red;">*</span>" sont <span style="color: red;">obligatoires</span>.</span>
                                        <span>Si vous y trouvez des erreurs, veuillez les signaler à la scolarite.</span>
                                    </div>
                                    <div class="container mt-8 p-2">
                                        <div class="accordion" id="accordionExample">
                                        <form class="vstack gap-2" action="{{ route('etudiant.modifier', $student) }}" method="post">
                                            @csrf
                                            @method('post')
                                            <div class="accordion-item border-0">
                                                <h2 class="accordion-header mt-1">
                                                    <button class="accordion-button collapsed text-marron bg-dark bg-opacity-25" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Etat Civil
                                                    </button>
                                                </h2>
                                                
                                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="overflow-y-scroll" style="height: 200px;">
                                                            
                                                                <div class="form-group d-flex m-2">
                                                                    <label for="code_etudiant" class="w-50 text-end">Code Etudiant :</label>
                                                                    <input type="text" name="code_etudiant" id="code_etudiant" class="form-control ms-5" value="{{ $student->code_etudiant }}" readonly>
                                                                </div>
                                                                <div class="form-group d-flex m-2">
                                                                    <label for="prenom" class="w-50 text-end">Prénoms :</label>
                                                                    <input type="text" name="prenom" id="prenom" class="form-control ms-5" value="{{ $student->prenom }}" readonly>
                                                                </div>
                                                                <div class="form-group d-flex m-2">
                                                                    <label for="nom" class="w-50 text-end">Nom :</label>
                                                                    <input type="text" name="nom" id="nom" class="form-control ms-5" value="{{ $student->nom }}" readonly>
                                                                </div>
                                                                <div class="form-group d-flex m-2">
                                                                    <label for="date_naissance" class="w-50 text-end">Date de naissance :</label>
                                                                    <input type="date" name="date_naissance" id="date_naissance" class="form-control ms-5" value="{{ $student->date_naissance }}" readonly>
                                                                </div>
                                                            
                                                        </div>                                                 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header mt-0">
                                                    <button class="accordion-button collapsed text-marron bg-dark bg-opacity-25" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Contacts
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                            <div class="form-group d-flex m-2">
                                                                <label class="w-50 text-end" for="telephone">Numéro de téléphone :</label>
                                                                <input type="text" name="telephone" id="telephone" class="form-control ms-5" value="{{ $student->telephone }}">
                                                            </div>
                                                            <div class="form-group d-flex m-2">
                                                                <label class="w-50 text-end" for="email_personnelle">Email personnelle :</label>
                                                                <input type="text" name="email_personnelle" id="email_personnelle" class="form-control ms-5" value="{{ $student->email_personnelle }}">
                                                            </div>
                                                            <div class="form-group d-flex m-2">
                                                                <label class="w-50 text-end" for="adresse">Adresse :</label>
                                                                <input type="text" name="adresse" id="adresse" class="form-control ms-5" value="{{ $student->adresse }}">
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header mt-0">
                                                    <button class="accordion-button collapsed text-marron bg-dark bg-opacity-25" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Personne à contacter en cas d'urgence
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                    Personne à contacter en cas d'urgence
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header mt-0">
                                                    <button class="accordion-button collapsed text-marron bg-dark bg-opacity-25" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        Autres Informations
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Autres Informations
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <button class="btn text-white w-25 bg-marron">Valider</button>
                                            </div>
                                        </form>
                                        </div>       
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="content2" role="tabpanel" aria-labelledby="tab2" aria-selected="false" tabindex="0">
                                    <p>Veuillez remplir ce formulaire d'abord.</p>
                                    <p class="d-inline justify-content-center align-items-center">Les champs grises nepeuvent pas etre modifies.les champs precedes de *** sont obligatoires.</p>
                                    <p class="d-inline justify-content-center align-items-center">Si vous y trouvez des erreurs, veuillez les signaler a la scolarite.</p>
                                    <div class="row">
                                        <form class="vstack gap-2" action="{{ route('etudiant.inscrire') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group m-2">
                                                        <label for="formation" class="">Formation :</label>
                                                        <select name="formation" id="formation" class="form-control">
                                                            @foreach($formations as $formation)
                                                                    <option value="{{ $formation->id }}">
                                                                        {{$formation->libelle_formation}}
                                                                    </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group m-2">
                                                        <label for="niveau" class="">Niveau :</label>
                                                        <select name="niveau" id="niveau" class="form-control">
                                                            @foreach($levels as $level)
                                                                    <option value="{{ $level->id }}">
                                                                        {{$level->libelle_niveau}}
                                                                    </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group m-2">
                                                        <label for="annee_academique" class="">Année Academique :</label>
                                                        <select name="annee_academique" id="annee_academique" class="form-control">
                                                            @foreach($years as $year)
                                                                    <option value="{{ $year->id }}">
                                                                        {{$year->libelle_annee_academique}}
                                                                    </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <button class="btn text-white w-25 bg-marron">S'inscrire</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="row justify-content-center m-3">
                                        <div class="col p-2">
                                        <table class="table table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Formation</th>
                                                    <th>Niveau</th>
                                                    <th>Année Academique</th>
                                                    <th>Certificat</th>
                                                </tr>
                                                <tbody>
                                                @foreach($registrations as $registration)
                                                    <tr>
                                                        <td>
                                                            {{ $registration->formation }}
                                                        </td>
                                                        <td class="text-uppercase">
                                                            {{ $registration->niveau }}
                                                        </td>
                                                        <td>
                                                            {{ $registration->annee_academique }}
                                                        </td>
                                                        <td>
                                                            <a target="_blank" href="{{ route('etudiant.certificat', $registration) }}" class="text-decoration-none text-marron">Voir</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </thead>
                                        </table>
                                        </div>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-2-3-3 mt-md-0 mt-3 bg-white rounded etapes">
                        <div class="row p-2">
                            <h3 class="text-bleu"><i class="fas fa-hourglass-3 pe-2"></i>Etapes</h3>
                            <p class="fs-5"><i class="fas fa-circle pe-2 text-dark opacity-50"></i>Démarrage</p>
                            <p class="fs-5"><i class="fas fa-circle pe-2 text-dark opacity-50"></i>Frais d'inscription</p>
                            <p class="fs-5"><i class="fas fa-circle pe-2 text-dark opacity-50"></i>Formation</p>
                            <p class="fs-5"><i class="fas fa-circle pe-2 text-dark opacity-50"></i>Bibliothèque</p>
                            <p class="fs-5"><i class="fas fa-circle pe-2 text-dark opacity-50"></i>Visite Médicale</p>
                            <p class="fs-5"><i class="fas fa-circle pe-2 text-dark opacity-50"></i>Carte d'étudiant</p>

                        </div>
                    </div>
                </div>
                <div class="row h-f">
                <div class="shadow bg-white text-center border p-3">
                    <p class="text-marron">Copyright CCOS 2024</p>
                </div>
            </div>
            </main>
        </div>
    </div>


@endsection