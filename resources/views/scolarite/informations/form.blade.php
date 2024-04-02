@extends('scolarite.scolarite')

@section('titre', $information->exists ? "Editer une information" : "Créer une innformation")

@section('contenu')

    <h1>@yield('titre')</h1>
    <form class="vstack gap-2" action="{{ route($information->exists ? 'scolarite.information.update' : 'scolarite.information.store', $information) }}" method="post" enctype="multipart/form-data">
    @csrf
    
    @method($information->exists ? 'put' : 'post')

    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" id="titre" class="form-control" value="{{ old('titre', $information->titre) }}" name="titre">
    </div>
    <div class="form-group">
        <label for="contenu">Contenu</label>
        <textarea id="contenu" class="form-control" name="contenu">{{ old('contenu', $information->contenu) }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" class="form-control" value="{{ old('image', $information->image) }}" name="image" accept="image/*">
    </div>


    <button class="btn btn-primary">
            @if($information->exists)
                Modifier
            @else
                Créer
            @endif
        </button>


    </form>

    <div class="row mt-2 p-5">
        <a href="{{ route('scolarite.information.index') }}" class="btn btn-secondary">Retour</a>
    </div>

@endsection