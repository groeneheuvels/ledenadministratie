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





// Single Familie
Route::get('/families/{familie}', [FamilieController::class, 'show']);