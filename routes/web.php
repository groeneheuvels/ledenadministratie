<?php

use App\Models\Familie;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FamilieController;

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


// Show Create Familie Form
Route::get('/families/create', [FamilieController::class, 'create'])->middleware('auth');

// Store Familie Data
Route::post('/families', [FamilieController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/families/{familie}/edit', [FamilieController::class, 'edit'])->middleware('auth');

// Update Familie
Route::put('/families/{familie}', [FamilieController::class, 'update'])->middleware('auth');

// Delete Familie
Route::delete('/families/{familie}', [FamilieController::class, 'destroy'])->middleware('auth');

// Single Familie
Route::get('/families/{familie}', [FamilieController::class, 'show']);

//Show Register Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('auth');

// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('auth');

// Log User out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In User
Route::post('users/authenticate', [UserController::class, 'authenticate']);