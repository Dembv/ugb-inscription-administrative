<?php

namespace App\Http\Controllers\Etudiant;
use Barryvdh\DomPDF\Facade\Pdf;


use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\Level;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Support\Carbon;

class PdfController extends Controller
{
    public function genererCertificat(Registration $registration) {
        App::setLocale('fr');
        $data = [
            'student' => Student::where('code_etudiant', $registration->etudiant)->first(),
            'registration' => $registration,
            'niveau' => Level::where('id', $registration->niveau)->first(),
            'formation' => Formation::where('id', $registration->formation)->first(),
            'annee_academique' => Year::where('id', $registration->annee_academique)->first(),
            'naissance' => Carbon::parse(Student::where('code_etudiant', $registration->etudiant)->pluck('date_naissance')->first())->isoFormat('DD MMMM YYYY')
        ];
        $pdf = Pdf::loadView('etudiant.certificat', $data);
        return $pdf->stream('certificat.pdf');
    }
}
