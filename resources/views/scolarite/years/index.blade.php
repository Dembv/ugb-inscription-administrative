@extends('scolarite.scolarite')

@section('titre', 'années academiques')

@section('contenu')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row p-2">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-2 text-uppercase text-marron">@yield('titre')</h1>
        <a href="{{ route('scolarite.year.create') }}" class="btn btn-primary btn-sm">Ajouter</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 p-2 border">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    <tbody>
                    @foreach($years as $year)
                        <tr>
                            <td>{{ $year->libelle_annee_academique }}</td>
                            <td>
                                <div class="d-flex gap-2 w-100 justify-content-end">
                                    <a href="{{ route('scolarite.year.edit', $year) }}" class="btn btn-primary btn-sm">Editer</a>
                                    <form action="{{ route('scolarite.year.destroy', $year) }}" method="post">
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

    {{$years->links()}}

@endsection
