@extends('scolarite.scolarite')

@section('titre', $year->exists ? "Editer une année academique" : "Créer une année academique")

@section('contenu')

    <h1>@yield('titre')</h1>
    <form class="vstack gap-2" action="{{ route($year->exists ? 'scolarite.year.update' : 'scolarite.year.store', $year) }}" method="post">
    @csrf
    
    @method($year->exists ? 'put' : 'post')

    <div class="form-group">
        <label for="libelle_annee_academique">Libellé</label>
        <input type="text" id="libelle_annee_academique" class="form-control" value="{{ old('libelle_annee_academique', $year->libelle_annee_academique) }}" name="libelle_annee_academique">
    </div>


    <button class="btn btn-primary">
            @if($year->exists)
                Modifier
            @else
                Créer
            @endif
        </button>


    </form>

    <div class="row mt-2 p-5">
        <a href="{{ route('scolarite.year.index') }}" class="btn btn-secondary">Retour</a>
    </div>

@endsection