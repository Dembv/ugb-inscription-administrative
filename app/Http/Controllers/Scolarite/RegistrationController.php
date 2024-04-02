<?php

namespace App\Http\Controllers\Scolarite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Scolarite\RegistrationFormRequest;
use App\Models\Formation;
use App\Models\Level;
use App\Models\Registration;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scolarite.registrations.index',[
        'registrations' => Registration::select(
            'registrations.id',
            'registrations.etudiant',
            'students.prenom',
            'students.nom',
            'levels.libelle_niveau as niveau',
            'formations.libelle_formation as formation',
            'years.libelle_annee_academique as annee_academique',
            'registrations.date_inscription'
        )
        ->join('students', 'students.code_etudiant', '=', 'registrations.etudiant')
        ->join('levels', 'levels.id', '=', 'registrations.niveau')
        ->join('formations', 'formations.id', '=', 'registrations.formation')
        ->join('years', 'years.id', '=', 'registrations.annee_academique')
        ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scolarite.registrations.form',[
            'registration' => new Registration(),
            'students' => Student::all(),
            'formations' => Formation::all(),  
            'levels' => Level::all(), 
            'years' => Year::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrationFormRequest $requete)
    {
        DB::beginTransaction();
        try{
        $registration = new Registration();
        $registration->etudiant = $requete->etudiant;
        $registration->formation = $requete->formation;
        $registration->niveau = $requete->niveau;
        $registration->annee_academique = $requete->annee_academique;

        $registration->save();

        DB::commit();
        return to_route('scolarite.registration.index')->with('success', 'l\'inscription a bien été crée');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('scolarite.registration.index')->with('error', 'l\'étudiant a déjà une insciption valide pour l\'année en cours.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        return view('scolarite.registrations.form',[
            'registration' => $registration,
            'students' => Student::all(),
            'formations' => Formation::all(),  
            'levels' => Level::all(), 
            'years' => Year::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegistrationFormRequest $requete, Registration $registration)
    {
        DB::beginTransaction();
        try{
            $registration->etudiant = $requete->etudiant;
            $registration->formation = $requete->formation;
            $registration->niveau = $requete->niveau;
            $registration->annee_academique = $requete->annee_academique;

        $registration->save();
        DB::commit();
        return to_route('scolarite.registration.index')->with('success', 'l\'inscription a bien été modifié');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('scolarite.registration.index')->with('error', 'l\'étudiant a déjà une insciption valide pour l\'année en cours.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();
        return to_route('scolarite.registration.index')->with('success', 'L\'inscription a bien été supprimé');
    }
}
