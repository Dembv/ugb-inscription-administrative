<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Etudiant\PdfController;
use App\Http\Controllers\Etudiant\StudentController as EtudiantStudentController;
use App\Http\Controllers\Scolarite\FormationController;
use App\Http\Controllers\Scolarite\InformationController;
use App\Http\Controllers\Scolarite\LevelController;
use App\Http\Controllers\Scolarite\ScolariteController;
use App\Http\Controllers\Scolarite\RegistrationController;
use App\Http\Controllers\Scolarite\YearController;
use App\Http\Controllers\Scolarite\StudentController;
use App\Models\Information;
use App\Models\Year;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('accueil', [
        'informations' => Information::orderBy('created_at', 'desc')->paginate(5)
        ]);
})->name('accueil');


Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->prefix('scolarite')->name('scolarite.')->group(function() {
    Route::get('/', [ScolariteController::class, 'index'])->name('index');
    Route::resource('student', StudentController::class)->except(['show']);
    Route::resource('level', LevelController::class)->except(['show']);
    Route::resource('formation', FormationController::class)->except(['show']);
    Route::resource('year', YearController::class)->except(['show']);
    Route::resource('registration', RegistrationController::class)->except(['show']);
    Route::resource('information', InformationController::class)->except(['show']);
});

Route::middleware('auth')->prefix('etudiant')->name('etudiant.')->group(function() {
    Route::get('/', [EtudiantStudentController::class, 'index'])->name('index');
    Route::post('/{student}', [EtudiantStudentController::class, 'informations_personnelles'])->name('modifier');
    Route::post('/', [EtudiantStudentController::class, 'inscrire'])->name('inscrire');
    Route::get('/certificat/{registration}', [PdfController::class, 'genererCertificat'])->name('certificat');
});