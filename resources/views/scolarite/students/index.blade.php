@extends('scolarite.scolarite')

@section('titre', 'étudiants')

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
            <h1 class="fs-2 text-marron text-uppercase">@yield('titre')</h1>
            <a href="{{ route('scolarite.student.create') }}" class="btn bg-bleu text-white btn-md border">Ajouter</a>
        </div>
    </div> 
    <div class="row justify-content-center">
        <div class="col-md-11 p-2 border">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Code Etudiant</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email Personnelle</th>
                        <th>Date de Naissance</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Email Institutionnelle </th>
                        <th class="text-end">Actions</th>
                    </tr>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td><img src="/storage/{{ $student->image }}" class="image-fluid w-100 rounded-circle" width="50" height="50" alt=""></td>
                            <td>{{ $student->code_etudiant }}</td>
                            <td>{{ $student->prenom }}</td>
                            <td>{{ $student->nom }}</td>
                            <td>{{ $student->email_personnelle  }}</td>
                            <td>{{ $student->date_naissance }}</td>
                            <td>{{ $student->telephone  }}</td>
                            <td>{{ $student->adresse }}</td>
                            <td>{{ $student->email_institutionnelle  }}</td>
                            <td>
                                <div class="d-flex gap-2 w-100 justify-content-end">
                                    <a href="{{ route('scolarite.student.edit', $student) }}" class="btn btn-primary btn-sm">Editer</a>
                                    <form action="{{ route('scolarite.student.destroy', $student) }}" method="post">
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
        <a href="{{ route('scolarite.index') }}" class="btn btn-secondary"><i class="fas fa-solid text-marron fa-reply"></i><span>Retour</span></a>
    </div>

    {{$students->links()}}

@endsection