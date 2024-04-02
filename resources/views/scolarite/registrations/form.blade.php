@extends('scolarite.scolarite')

@section('titre', $registration->exists ? "Editer une inscription" : "Créer un inscription")

@section('contenu')

    <h1>@yield('titre')</h1>
    <form class="vstack gap-2" action="{{ route($registration->exists ? 'scolarite.registration.update' : 'scolarite.registration.store', $registration) }}" method="post">
        @csrf

        @method($registration->exists ? 'put' : 'post')

        <label for="etudiant">Etudiant</label>
        <select name="etudiant" id="etudiant">
            
            @foreach($students as $student)
                <option value="{{ $student->code_etudiant }}">{{ $student->code_etudiant }} - {{ $student->prenom }} {{ $student->nom }}</option>
            @endforeach
        </select>

        <label for="formation">Formation</label>
        <select name="formation" id="formation">
            <option value="{{$registration->formation}}">
                @foreach($formations as $formation)
                    @if($formation->id == $registration->formation)
                        {{$formation->libelle_formation}}
                    @endif
                @endforeach
            </option>
            @foreach($formations as $formation)
                @if($formation->id != $registration->formation)
                    <option value="{{ $formation->id }}">
                        {{$formation->libelle_formation}}
                    </option>
                @endif
            @endforeach
        </select>

        <label for="niveau">Niveau</label>
        <select name="niveau" id="niveau">
            <option value="{{$registration->niveau}}">
                @foreach($levels as $level)
                    @if($level->id == $registration->niveau)
                        {{$level->libelle_niveau}}
                    @endif
                @endforeach
            </option>
            @foreach($levels as $level)
                @if($level->id != $registration->niveau)
                    <option value="{{ $level->id }}">
                        {{$level->libelle_niveau}}
                    </option>
                @endif
            @endforeach
        </select>

        <label for="annee_academique">Année Academique</label>
        <select name="annee_academique" id="annee_academique">
            <option value="{{$registration->annee_academique}}">
                @foreach($years as $year)
                    @if($year->id == $registration->annee_academique)
                        {{$year->libelle_annee_academique}}
                    @endif
                @endforeach
            </option>
            @foreach($years as $year)
                @if($year->id != $registration->annee_academique)
                    <option value="{{ $year->id }}">
                        {{$year->libelle_annee_academique}}
                    </option>
                @endif
            @endforeach
        </select>

        <button class="btn btn-primary">
            @if($registration->exists)
                Modifier
            @else
                Créer
            @endif
        </button>

    </form>

    <div class="row mt-2 p-5">
        <a href="{{ route('scolarite.registration.index') }}" class="btn btn-secondary">Retour</a>
    </div>

@endsection