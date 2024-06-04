<?php

use App\Http\Controllers\CentreController;
use App\Http\Controllers\ConcourController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionConcourController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\UserController;
use App\Models\Concour;
Use App\Models\Media;
Use App\Models\User;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class , 'indexhome'])->name('home');
Route::get('/propos', [HomeController::class , 'propos'])->name('propos');
// Route::get('/home', [HomeController::class , 'indexhome'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('Admin/dashboard', [HomeController::class , 'index'])->name('admin')->middleware('admin');
Route::get('Admin/dashboard/utilisateur', [HomeController::class , 'utilisateur'])->name('users')->middleware('admin');
Route::get('Admin/dashboard/candidat/{id}', [HomeController::class , 'listeC'])->name('listeC')->middleware('admin');

Route::get('Admin_etablissement/dashboard', [HomeController::class, 'indexetablissement'])->name('etablissement')->middleware('etablissement');
Route::get('Admin_etablissement/listcandidat/{id}', [HomeController::class, 'listeCandidat'])->name('listeCandidat')->middleware('etablissement');
Route::get('Admin_etablissement/details/{id}', [HomeController::class, 'details'])->name('detail')->middleware('etablissement');
Route::get('/statut/{id}', [HomeController::class , 'modifierStatut'])->name('modifierStatut')->middleware('etablissement');

Route::prefix('etablissement')->group(function(){
   Route::resource("centres",CentreController::class)->names('centre');
})->middleware('etablissement');
Route::prefix('admin')->group(function(){
    Route::resource("concours",ConcourController::class)->names('concours');
 })->middleware('admin');;

 Route::prefix('admin')->group(function(){
    Route::resource("etablissements",EtablissementController::class)->names('etablissements');
 })->middleware('admin');

Route::get('Admin/etablissements', [HomeController::class , 'etablissement'])->name('etablissements');
Route::get('Admin/role', [HomeController::class , 'role'])->name('role');


Route::get('/candidater/{id}', [InscriptionConcourController::class , 'inscriptionConcour'])->name('candidater');
Route::post('/candidater/store', [InscriptionConcourController::class , 'storeInscription'])->name('inscription');


Route::prefix('admin')->group(function(){
    Route::resource("utilisateur",UserController::class)->names('utilisateur');
 })->middleware('admin');


Route::get('/details/concour/{id}', [ConcourController::class , 'details'])->name('details');

Route::prefix('candidat')->group(function(){
    Route::resource("media",MediaController::class)->names('media');
 })->middleware('candidat');
 Route::prefix('candidat')->group(function(){
    Route::resource("temoignage",TemoignageController::class)->names('temoignage');
 });

 Route::get('Candidat/dashboard', [HomeController::class , 'indexCandidat'])->name('candidat')->middleware('candidat');
 Route::get('/Candidat/dashboard/dossier', [HomeController::class , 'folder'])->name('folder')->middleware('candidat');
 
 Route::prefix('infos')->group(function(){
   Route::resource("contact",ContactController::class)->names('contact');
});
