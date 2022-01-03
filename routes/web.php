<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PacientController;
use App\Http\Controllers\FisaDeTratamentController;
use App\Http\Controllers\ChestionarEvaluareStareGeneralaController;
use App\Http\Controllers\ServiciuCategorieController;
use App\Http\Controllers\ServiciuController;
use App\Http\Controllers\VizualizareRamificatieServiciuController;
use App\Http\Controllers\ProgramareController;

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

    // Route::resource('pacienti', PacientController::class,  ['parameters' => ['pacienti' => 'pacient']]);

    // Route::resource('servicii-categorii', ServiciuCategorieController::class,  ['parameters' => ['servicii-categorii' => 'serviciu_categorie']]);
    // Route::resource('servicii', ServiciuController::class,  ['parameters' => ['servicii' => 'serviciu']]);
    // Route::get('vizualizare-ramificatii-servicii', [VizualizareRamificatieServiciuController::class, 'vizualizareRamificatieServiciu'])->name('vizualizare-ramificatii-servicii');

    // Route::get('programari/afisare-tabel', [ProgramareController::class, 'afisareTabel'])->name('programari.afisare_tabel');
    // Route::resource('programari', ProgramareController::class,  ['parameters' => ['programari' => 'programare']]);

    Route::resource('fise-de-tratament/{fisa_de_tratament}/chestionar-evaluare-stare-generala', ChestionarEvaluareStareGeneralaController::class,  ['parameters' => ['chestionar-evaluare-stare-generala' => 'chestionar']]);
    Route::resource('fise-de-tratament', FisaDeTratamentController::class,  ['parameters' => ['fise-de-tratament' => 'fisa_de_tratament']]);

    Route::get('programari', [ProgramareController::class, 'afisareSaptamanal'])->name('programari.afisareSaptamanal');
});
