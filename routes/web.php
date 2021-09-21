<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PacientController;

use App\Http\Controllers\ServiciuCategorieController;
use App\Http\Controllers\ServiciuController;

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

Auth::routes(['register' => false, 'password.request' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('acasa');
    });

    Route::resource('pacienti', PacientController::class,  ['parameters' => ['pacienti' => 'pacient']]);

    Route::resource('servicii-categorii', ServiciuCategorieController::class,  ['parameters' => ['servicii-categorii' => 'serviciu_categorie']]);
    Route::resource('servicii', ServiciuController::class,  ['parameters' => ['servicii' => 'serviciu']]);

    Route::resource('programari', ServiciuController::class,  ['parameters' => ['programari' => 'programare']]);
});
