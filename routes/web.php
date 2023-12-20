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

Route::get('/', [HistoireController::class, 'createHistoire'])->name('index');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/equipe', function () {
    return view('contact');
})->name("contact");

// Route pour l'index de l'équipe
Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe');

// Route pour l'index de l'équipe
<<<<<<< HEAD
Route::get('/histoire/{id}', [HistoireController::class, 'histoire'])->where('id', '[0-9]+')->name('histoire.histoire');
=======
Route::get('/histoire', [HistoireController::class, 'histoire'])->name('histoireDetail');
>>>>>>> 775c9277a5e2fc0bebacd756e62ffb062ec46ab4

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

//Route pour les informations personnelles des utilisateurs

Route::get('/profil', function () {
    return view('personne');
})->middleware(['auth'])->name('profil');

Route::GET('/personne/show', [ProfilController::class, 'show'])->name('personne.show');
Route::post('/profile/upload', [ProfilController::class, 'upload'])->name('profile.upload');

Route::GET('/histoire/create', [HistoireController::class, 'createHistoire'])->name('histoire.index');
Route::post('/histoire/create', [HistoireController::class, 'create'])->name('histoire.create');



//Route scène filtré

Route::get('/welcome/filtered', [UserController::class, 'filtered'])->name('scene.filtered');


Route::get('/', [HistoireControllers::class, 'histoire'])->name('index');
Route::get('/accueil/filtered', [HistoireControllers::class, 'filteredGenre'])->name('histoire.filtered');



Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
