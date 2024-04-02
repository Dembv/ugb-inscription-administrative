@extends('scolarite.scolarite')

@section('titre', 'inscriptions')

@section('contenu')

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

    <div class="row p-2">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-2 text-uppercase text-marron">@yield('titre')</h1>
            <a href="{{ route('scolarite.registration.create') }}" class="btn btn-primary btn-sm">Ajouter</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 p-2 border">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Code Etudiant</th>
                    <th>Prénoms</th>
                    <th>Nom</th>
                    <th>Formation</th>
                    <th>Niveau</th>
                    <th>Année Academique</th>
                    <th>Date Inscription</th>
                    <th class="text-end">Actions</th>
                </tr>
                <tbody>
                @foreach($registrations as $registration)
                    <tr>
                        <td>
                            {{ $registration->etudiant }}
                        </td>
                        <td>
                            {{ $registration->prenom }}
                        </td>
                        <td>
                            {{ $registration->nom }}
                        </td>
                        <td>
                            {{ $registration->formation }}
                        </td>
                        <td>
                            {{ $registration->niveau }}
                        </td>
                        <td>
                            {{ $registration->annee_academique }}
                        </td>
                        <td>
                            {{ $registration->date_inscription }}
                        </td>
                        <td>
                            <div class="d-flex gap-2 w-100 justify-content-end">
                                <a href="{{ route('scolarite.registration.edit', $registration) }}" class="btn btn-primary btn-sm">Editer</a>
                                <form action="{{ route('scolarite.registration.destroy', $registration) }}" method="post">
                                @csrf
                                    @method("delete")
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </thead>
        </table>
        </div>
    </div>

    <div class="row mt-2 p-5">
        <a href="{{ route('scolarite.index') }}" class="btn btn-secondary">Retour</a>
    </div>

    

@endsection