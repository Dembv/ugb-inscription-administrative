@extends('scolarite.scolarite')

@section('titre', $student->exists ? "Editer un étudiant" : "Créer un étudiant")

@section('contenu')
    
    <h1 class="text-center">@yield('titre')</h1>
    <div class="row justify-content-center p-2">
        <div class="col-md-8">
            <form class="vstack gap-2" action="{{ route($student->exists ? 'scolarite.student.update' : 'scolarite.student.store', $student) }}" method="post" enctype="multipart/form-data">
                @csrf

                @method($student->exists ? 'put' : 'post')

                <div class="row">
                    <div class="col-md-2">
                        <label for="code_etudiant">Code étudiant</label>
                        <input type="text" id="code_etudiant" class="form-control" value="{{ old('code_etudiant', $student->code_etudiant) }}" name="code_etudiant">
                    </div>
                    <div class="col-md">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" class="form-control" value="{{ old('prenom', $student->prenom) }}" name="prenom">
                    </div>
                    <div class="col-md">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" class="form-control" value="{{ old('nom', $student->nom) }}" name="nom">
                    </div>        
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="email_pers">Email Personnelle</label>
                        <input type="email" id="email_personnelle" class="form-control" value="{{ old('email_pers', $student->email_personnelle) }}" name="email_personnelle">
                    </div>

                    <div class="col-md">
                        <label for="date_naissance">Date de Naissance</label>
                        <input type="date" id="date_naissance" class="form-control" value="{{ old('date_naissance', $student->date_naissance) }}" name="date_naissance">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="telephone" class="form-control" value="{{ old('telephone', $student->telephone) }}" name="telephone">
                    </div>

                    <div class="col-md">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" class="form-control"value="{{ old('adresse', $student->adresse) }}" name="adresse">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" class="form-control" value="{{ old('image', $student->image) }}" name="image" accept="image/*">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" class="form-control"value="{{ old('adresse', $student->adresse) }}" name="password">
                    </div>
                </div>
                <button class="col btn btn-primary h-100">
                    @if($student->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
                

            </form>
        </div>
    </div>

    <div class="row mt-2 p-5">
        <a href="{{ route('scolarite.student.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    

@endsection