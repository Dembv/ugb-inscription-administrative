@extends('scolarite.scolarite')

@section('titre', $formation->exists ? "Editer une formation" : "Créer une formation")

@section('contenu')

    <h1 class="text-center">@yield('titre')</h1>
    <div class="row justify-content-center p-2">
        <div class="col-md-4">
            <form class="vstack gap-2" action="{{ route($formation->exists ? 'scolarite.formation.update' : 'scolarite.formation.store', $formation) }}" method="post">
            @csrf
            
            @method($formation->exists ? 'put' : 'post')

            <div class="form-group">
                <label for="libelle_formation">Libellé</label>
                <input type="text" id="libelle_formation" class="form-control" value="{{ old('libelle_formation', $formation->libelle_formation) }}" name="libelle_formation">
            </div>


            <button class="btn btn-primary">
                    @if($formation->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>


            </form>
        </div>
    </div>

    <div class="row mt-2 p-5">
        <a href="{{ route('scolarite.formation.index') }}" class="btn btn-secondary">Retour</a>
    </div>
@endsection