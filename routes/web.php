<?php

use App\Http\Controllers\EquipeController;

use App\Http\Controllers\HistoireController;
use App\Http\Controllers\HistoireControllers;

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
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

// faire route a propos

// Route pour l'index de l'équipe
Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe');

// Route pour l'index de l'équipe
Route::get('/histoire', [HistoireController::class, 'histoire'])->name('histoire');

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

//Route pour les informations personnelles des utilisateurs

Route::get('/profil', function () {
    return view('personne');
})->middleware(['auth'])->name('profil');

Route::GET('/personne/show', [ProfilController::class, 'show'])->name('personne.show');
Route::post('/profile/upload', [ProfilController::class, 'upload'])->name('profile.upload');

Route::GET('/histoire/create', [HistoireController::class, 'index'])->name('histoire.index');
Route::post('/histoire/create', [HistoireController::class, 'create'])->name('histoire.create');



//Route scène filtré

Route::get('/welcome/filtered', [UserController::class, 'filtered'])->name('scene.filtered');

Route::get('/accueil', [HistoireControllers::class, 'histoire'])->name('histoire');
Route::get('/', [HistoireControllers::class, 'histoire'])->name('index');
Route::get('/accueil/filtered', [HistoireControllers::class, 'filteredGenre'])->name('histoire.filtered');


