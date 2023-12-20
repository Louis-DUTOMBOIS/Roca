<?php

use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HistoireControllers;
use App\Http\Controllers\ProfilController;
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

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/equipe', function () {
    return view('contact');
})->name("contact");

// Route pour l'index de l'équipe
Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe');

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

//Route pour les informations personnelles des utilisateurs

Route::get('/profil', function () {
    return view('personne');
})->middleware(['auth'])->name('profil');

Route::GET('/personne/show', [ProfilController::class, 'show'])->name('personne.show');
Route::post('/profile/upload', [ProfilController::class, 'upload'])->name('profile.upload');


Route::get('/accueil', [HistoireControllers::class, 'histoire'])->name('histoire');
Route::get('/', [HistoireControllers::class, 'histoire'])->name('index');
