<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etudiant\RegistrationFormRequest;
use App\Http\Requests\Etudiant\StudentFormRequest;
use App\Models\Formation;
use App\Models\Level;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        
        return view('etudiant.index', [
            'user' => Auth::user(),
            'student' => Student::where('user_id', Auth::user()->id)->first(),
            'formations' => Formation::all(),
            'levels' => Level::all(),
            'years' => Year::all(),
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
            ->where('registrations.etudiant', Student::where('user_id', Auth::user()->id)->pluck('code_etudiant')->first())
            ->get()
        ]);
    }
    
    public function informations_personnelles(StudentFormRequest $requete, Student $student){
        DB::beginTransaction();
        try{
            $student->email_personnelle = $requete->email_personnelle;
            $student->telephone = $requete->telephone;
            $student->adresse = $requete->adresse;
            $student->save();
            DB::commit();

            return to_route('etudiant.index')->with('success', 'Vous avez modifié vos informations');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('etudiant.index')->with('error', 'Verifier que les informations saisies sont correctes!');
        }
    }

    public function inscrire(RegistrationFormRequest $requete)
    {
        DB::beginTransaction();
        try{
            $registration = new Registration();
            $registration->etudiant = Student::where('user_id', Auth::user()->id)->pluck('code_etudiant')->first();
            $registration->formation = $requete->formation;
            $registration->niveau = $requete->niveau;
            $registration->annee_academique = $requete->annee_academique;

            $registration->save();
            DB::commit();
            return to_route('etudiant.index')->with('success', 'Felicitations votre inscription est un succès!');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('etudiant.index')->with('error', 'Verifier que vous n\'avez pas une inscription pour la même année');
        }
    }
}
