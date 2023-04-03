<?php

use App\Models\Familie;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
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
Route::get('/families/create', [FamilieController::class, 'create']);

// Store Familie Data
Route::post('/families', [FamilieController::class, 'store']);

// Show Edit Form
Route::get('/families/{familie}/edit', [FamilieController::class, 'edit']);

// Update Familie
Route::put('/families/{familie}', [FamilieController::class, 'update']);

// Delete Familie
Route::delete('/families/{familie}', [FamilieController::class, 'destroy']);

// Single Familie
Route::get('/families/{familie}', [FamilieController::class, 'show']);