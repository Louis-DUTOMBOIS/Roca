<?php

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

Route::get('/', function () {
    return view('welcome');
})->name("index");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

//Route pour les informations personnelles des utilisateurs

Route::get('/profil', function () {
    return view('personne');
})->middleware(['auth'])->name('profil');

Route::GET('/personne/show', [ProfilController::class, 'show'])->name('personne.show');
Route::post('/profile/upload', [ProfilController::class, 'upload'])->name('profile.upload');


//Route scène filtré

Route::get('/welcome/filtered', [UserController::class, 'filtered'])->name('scene.filtered');