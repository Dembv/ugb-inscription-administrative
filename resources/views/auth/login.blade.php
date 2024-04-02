@extends('base')
@section('contenu')
    <div class="bg-image">
        <div class="row justify-content-center py-3">
            <div class="col-md-3 px-4 py-4 bg-white bg-opacity-90 rounded-4">
                <div class="row justify-content-center px-5 mb-4">
                    <div class="col-8">
                        <img src="assets/images/logo-ugb.png" class="img-fluid">
                    </div>
                </div>
                <div class="row text-center">
                    <p class="text-marron fs-4 fw-bold">Service d'Authentification Unique</p>
                </div>
                <div class="row justify-content-center">
                    <form action="{{ route('auth.login') }}" method="post" id="loginForm">
                        @csrf
                        <div class="form-group mx-2">
                            <label for="email" class="text-bleu fs-4 fw-lighter">Email institutionnelle UGB</label>
                            <input type="text" id="email" name="email" class="form-control rounded-3 bg-dark bg-opacity-25 border-bleu" placeholder="Ex : *****.*****@ugb.edu.sn" autocomplete="off">
                            <div class="" id="messageEmail">
                                @error("email")
                                {{ $message }}
                                @enderror
                            </div>
                            
                        </div>
                        <div class="form-group mx-2 mt-3">
                            <label for="password" class="text-bleu fs-4 fw-lighter">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control rounded-3 bg-dark bg-opacity-25 border-bleu" placeholder="*************">
                            <div id="messagePassword">
                                @error("password")
                                {{ $message }}
                                @enderror
                            </div>
                            
                        </div>
                        <div class="form-group mx-4 p-3">
                            <button type="submit" id="btnSubmit" class="btn bg-marron rounded-5 w-100 text-white fw-bold fs-4 text-uppercase">Connexion</button>
                        </div>
                    </form>
                    <div class="row justify-content-center">
                        <a href="{{ route('accueil') }}" class="btn btn-secondary">Accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection('contenu')