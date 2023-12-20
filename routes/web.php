<?php

use App\Http\Controllers\HistoireController;
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

Route::get('/', function () {
    return view('welcome');
})->name("index");

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

Route::GET('/histoire/create', [HistoireController::class, 'index'])->name('histoire.index');
Route::post('/histoire/create', [HistoireController::class, 'create'])->name('histoire.create');