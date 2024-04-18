<?php

use App\Http\Controllers\ConcourController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionConcourController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Concour;
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
    $concours = Concour::orderby('id', 'desc')->paginate(12);
    return view('welcome',compact('concours'));
});
Route::get('/home', [HomeController::class , 'indexhome'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('Admin/dashboard', [HomeController::class , 'index'])->name('admin')->middleware('admin');
Route::get('Admin_etablissement/dashboard', [HomeController::class, 'indexetablissement'])->name('etablissement')->middleware('etablissement');
Route::prefix('admin')->group(function(){
    Route::resource("concours",ConcourController::class)->names('concours');
 });

 Route::prefix('admin')->group(function(){
    Route::resource("etablissements",EtablissementController::class)->names('etablissements');
 });

Route::get('Admin/etablissements', [HomeController::class , 'etablissement'])->name('etablissements');
Route::get('Admin/role', [HomeController::class , 'role'])->name('role');


Route::get('/candidater/{id}', [InscriptionConcourController::class , 'inscriptionConcour'])->name('candidater');
Route::post('/candidater/store', [InscriptionConcourController::class , 'storeInscription'])->name('inscription');


Route::prefix('admin')->group(function(){
    Route::resource("utilisateur",UserController::class)->names('utilisateur');
 });