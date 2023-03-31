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

Route::get('/families/{familie}', [FamilieController::class, 'show']);





/*Route::get('/search', function (Request $request) {
return $request->naam . ' ' . $request->adres;
});*/

/*Route::get('/', function () {
return view('families/index', [
'heading' => 'Familie overzicht',
'families' => Familie::all()
]);
});*/