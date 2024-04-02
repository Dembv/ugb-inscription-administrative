@extends('scolarite.scolarite')

@section('titre', 'informations')

@section('contenu')
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row p-2">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-2 text-uppercase text-marron">@yield('titre')</h1>
            <a href="{{ route('scolarite.information.create') }}" class="btn bg-bleu text-white btn-md border">Ajouter</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11 p-2 border">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Image</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    <tbody>
                    @foreach($informations as $information)
                        <tr>
                            <td>{{ $information->titre }}</td>
                            <td>
                                <div class="row">
                                    <div class="col text-truncate" style="max-width: 500px;">
                                        {{ $information->contenu }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col text-truncate" style="max-width: 300px;">
                                        {{ $information->image }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2 w-100 justify-content-end">
                                    <a href="{{ route('scolarite.information.edit', $information) }}" class="btn btn-primary btn-sm">Editer</a>
                                    <form action="{{ route('scolarite.information.destroy', $information) }}" method="post">
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

    <div class="row  mt-2 p-5">
        <a href="{{ route('scolarite.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    
    {{$informations->links()}}

@endsection
