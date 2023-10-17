<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Utilisateurcontroller;


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

Route::get('/administrateur',[Utilisateurcontroller::class, 'liste_utilisateur']);
Route::get('/ajouter',[Utilisateurcontroller::class,'ajouter_utilisateur']);
Route::post('/ajouter/traitement',[Utilisateurcontroller::class,'ajouter_utilisateur_traitement']);
Route::post('/modifier/traitement',[Utilisateurcontroller::class, 'modifier_utilisateur_traitement']);
Route::get('/modifier_utilisateur/{id}',[Utilisateurcontroller::class, 'modifier_utilisateur'])->whereNumber('id')->name('modifier');
Route::get('/supprimer_utilisateur/{id}',[Utilisateurcontroller::class, 'supprimer_utilisateur'])->whereNumber('id')->name('supprimer');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/connexion', [Utilisateurcontroller::class, 'connexion'])->name('connexion');
    Route::post('/connexion', [Utilisateurcontroller::class, 'connexionPost'])->name('connexionPost');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/accueil', [AccueilController::class, 'accueil'])->name('accueil');
    Route::delete('/deconnecter', [Utilisateurcontroller::class, 'deconnecter'])->name('deconnecter');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

