@extends('scolarite.scolarite')

@section('titre', 'formations')

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
        <a href="{{ route('scolarite.formation.create') }}" class="btn bg-bleu text-white btn-md border">Ajouter</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-11 p-2 border">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    <tbody>
                    @foreach($formations as $formation)
                        <tr>
                            <td>{{ $formation->libelle_formation }}</td>
                            <td>
                                <div class="d-flex gap-2 w-100 justify-content-end">
                                    <a href="{{ route('scolarite.formation.edit', $formation) }}" class="btn btn-primary btn-sm">Editer</a>
                                    <form action="{{ route('scolarite.formation.destroy', $formation) }}" method="post">
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

    {{$formations->links()}}

@endsection
