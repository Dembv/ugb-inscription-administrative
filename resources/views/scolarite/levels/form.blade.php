@extends('scolarite.scolarite')

@section('titre', $level->exists ? "Editer un niveau" : "Créer un niveau")

@section('contenu')

    <h1>@yield('titre')</h1>
    <form class="vstack gap-2" action="{{ route($level->exists ? 'scolarite.level.update' : 'scolarite.level.store', $level) }}" method="post">
    @csrf
    
    @method($level->exists ? 'put' : 'post')

    <div class="form-group">
        <label for="libelle_niveau">Libellé</label>
        <input type="text" id="libelle_niveau" class="form-control" value="{{ old('libelle_niveau', $level->libelle_niveau) }}" name="libelle_niveau">
    </div>


    <button class="btn btn-primary">
            @if($level->exists)
                Modifier
            @else
                Créer
            @endif
        </button>


    </form>

    <div class="row mt-2 p-5">
        <a href="{{ route('scolarite.level.index') }}" class="btn btn-secondary">Retour</a>
    </div>

@endsection