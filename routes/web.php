<?php

use App\Models\Familie;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FactuurController;
use App\Http\Controllers\FamilieController;
use App\Http\Controllers\BoekjaarController;
use App\Http\Controllers\LidsoortController;
use App\Http\Controllers\FamilielidController;
use App\Http\Controllers\LeeftijdscategorieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
return view('welcome');
});*/

// All families
Route::get('/', [FamilieController::class, 'index']);

// All lidsoorten
Route::get('/lidsoorten', [LidsoortController::class, 'show']);

// All leeftijdscategorieen
Route::get('/leeftijdscategorieen', [LeeftijdscategorieController::class, 'show']);

// All boekjaren
Route::get('/boekjaren', [BoekjaarController::class, 'show']);

//All facturen
Route::get('/facturen', [FactuurController::class, 'show']);


// Show Create Familie Form
Route::get('/families/create', [FamilieController::class, 'create'])->middleware('auth');

// Store Familie Data
Route::post('/families', [FamilieController::class, 'store'])->middleware('auth');

//Show Create Familielid Form 
Route::get('/familieleden/create', [FamilielidController::class, 'create'])->middleware('auth');

//Store Familielid Data
Route::post('/familieleden', [FamilielidController::class, 'store'])->middleware('auth');

//Show Create Lidsoort Form
Route::get('lidsoorten/create', [LidsoortController::class, 'create'])->middleware('auth');

//Store Lidsoort Data
Route::post('/lidsoorten', [LidsoortController::class, 'store'])->middleware('auth');

//Show Create Leeftijdscategorie Form
Route::get('leeftijdscategorieen/create', [LeeftijdscategorieController::class, 'create'])->middleware('auth');

//Store Leeftijdscategorie Data
Route::post('/leeftijdscategorieen', [LeeftijdscategorieController::class, 'store'])->middleware('auth');

//Show Create Boekjaar Form
Route::get('boekjaren/create', [BoekjaarController::class, 'create'])->middleware('auth');

//Store Boekjaar Data
Route::post('/boekjaren', [BoekjaarController::class, 'store'])->middleware('auth');

//Show Create Factuur Form
Route::get('/facturen/create', [FactuurController::class, 'create'])->middleware('auth');

// Store Factuur Data
Route::post('/facturen', [FactuurController::class, 'store'])->middleware('auth');

// Show Edit Familie Form
Route::get('/families/{familie}/edit', [FamilieController::class, 'edit'])->middleware('auth');

// Update Familie
Route::put('/families/{familie}', [FamilieController::class, 'update'])->middleware('auth');

// Show Edit Familielid Form
Route::get('/familieleden/{familielid}/edit', [FamilielidController::class, 'edit'])->middleware('auth');

// Update Familielid
Route::put('/familieleden/{familielid}', [FamilielidController::class, 'update'])->middleware('auth');

// Show Edit Lidsoort Form
Route::get('/lidsoorten/{lidsoort}/edit', [LidsoortController::class, 'edit'])->middleware('auth');

// Update Lidsoort
Route::put('/lidsoorten/{lidsoort}', [LidsoortController::class, 'update'])->middleware('auth');

// Show Edit Leeftijdscategorie Form
Route::get('/leeftijdscategorieen/{leeftijdscategorie}/edit', [LeeftijdscategorieController::class, 'edit'])->middleware('auth');

// Update Leeftijdscategorie
Route::put('/leeftijdscategorieen/{leeftijdscategorie}', [LeeftijdscategorieController::class, 'update'])->middleware('auth');

// Show Edit Boekjaar Form
Route::get('/boekjaren/{boekjaar}/edit', [BoekjaarController::class, 'edit'])->middleware('auth');

// Update Boekjaar
Route::put('/boekjaren/{boekjaar}', [BoekjaarController::class, 'update'])->middleware('auth');

// Update Factuur
Route::put('/facturen/{factuur}', [FactuurController::class, 'update'])->middleware('auth');

// Delete Familie
Route::delete('/families/{familie}', [FamilieController::class, 'destroy'])->middleware('auth');

// Delete Lidsoort
Route::delete('/lidsoorten/{lidsoort}', [LidsoortController::class, 'destroy'])->middleware('auth');

// Delete Leeftijdscategorie
Route::delete('/leeftijdscategorieen/{leeftijdscategorie}', [LeeftijdscategorieController::class, 'destroy'])->middleware('auth');

// Delete Boekjaar
Route::delete('/boekjaren/{boekjaar}', [BoekjaarController::class, 'destroy'])->middleware('auth');

// Delete Familielid
Route::delete('/familieleden/{familielid}', [FamilielidController::class, 'destroy'])->middleware('auth');

// Delete factuur
Route::delete('/facturen/{factuur}', [FactuurController::class, 'destroy'])->middleware('auth');

// Show Single Familie
Route::get('/families/{familie}', [FamilieController::class, 'show']);

// Show Single familielid
Route::get('/familieleden/{familielid}', [FamilielidController::class, 'show']);

// Show Single factuur
// Route::get('/facturen/{factuur}', [FactuurController::class, 'show']);

//Show Register Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('auth');

// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('auth');

// Show Edit User Form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

// Update User
Route::put('/users/{user}/edit', [UserController::class, 'update'])->middleware('auth');

// Log User out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In User
Route::post('users/authenticate', [UserController::class, 'authenticate']);