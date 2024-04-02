<?php

namespace App\Http\Controllers\Scolarite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentFormRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scolarite.students.index',[
        'students' => Student::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scolarite.students.form',[
            'student' => new Student()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentFormRequest $requete)
    {
        /** @var UploadedFile $image */

        $image = $requete->validated('image');

        $imagePath = $image->store('uploads/students', 'public');

        DB::beginTransaction();
        try{
            $user = new User();
            $student = new Student();
        
            $prenomComplet = str_replace(' ', '-', $requete->prenom);
            $user->name = strtolower($requete->nom. '.' .$prenomComplet); 
            $user->email = $user->name. '@ugb.edu.sn';
            $user->role = 1;
            $user->password = $requete->password;
            
            $user->save();

            $student->email_institutionnelle = $user->email;
            $student->user_id = $user->id;
            $student->code_etudiant = 'P' .$requete->code_etudiant;
            $student->prenom = $requete->prenom;
            $student->nom = $requete->nom;
            $student->email_personnelle = $requete->email_personnelle;
            $student->date_naissance = $requete->date_naissance;
            $student->telephone = $requete->telephone;
            $student->adresse = $requete->adresse;
            $student->image = $imagePath;
                
            $student->save();

            DB::commit();
            return to_route('scolarite.student.index')->with('success', 'l\'étudiant a bien été crée');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('scolarite.student.index')->with('error', 'l\'étudiant n\'a pas été créé à cause des erreurs');
        }

        
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('scolarite.students.form', [
            'student' => $student 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $requete, Student $student)
    {
        /** @var UploadedFile $image */

        $image = $requete->image;

        if($image) {
            $imagePath = $image->store('uploads/students', 'public');
        }

        DB::beginTransaction();
        try{
            $user = User::find($student->user_id);
        
            $prenomComplet = str_replace(' ', '-', $requete->prenom);
            $user->name = strtolower($requete->nom. '.' .$prenomComplet); 
            $user->email = $user->name. '@ugb.edu.sn';
            $user->role = 1;
            $user->password = $requete->password;
            
            $user->save();

            $student->email_institutionnelle = $user->email;
            $student->user_id = $user->id;
            $student->code_etudiant = $requete->code_etudiant;
            $student->prenom = $requete->prenom;
            $student->nom = $requete->nom;
            $student->email_personnelle = $requete->email_personnelle;
            $student->date_naissance = $requete->date_naissance;
            $student->telephone = $requete->telephone;
            $student->adresse = $requete->adresse;
            if($image) {
                $student->image = $imagePath;
            }
            
            $student->save();
            DB::commit();
            return to_route('scolarite.student.index')->with('success', 'l\'étudiant a bien été modifié');

        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
            return to_route('scolarite.student.index')->with('error', 'l\'étudiant n\'a pas été modifié à cause des erreurs');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $user = User::find($student->user_id);

        $student->delete();
        $user->delete();
        return to_route('scolarite.student.index')->with('success', 'L\'étudiant a bien été supprimé');
    }
}
