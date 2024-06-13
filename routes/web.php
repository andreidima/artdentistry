<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PacientController;
use App\Http\Controllers\FisaDeTratamentController;
use App\Http\Controllers\ChestionarEvaluareStareGeneralaController;
use App\Http\Controllers\ChestionarAcordulPacientuluiInformatController;
use App\Http\Controllers\ServiciuCategorieController;
use App\Http\Controllers\ServiciuController;
use App\Http\Controllers\VizualizareRamificatieServiciuController;
use App\Http\Controllers\ProgramareController;
use App\Http\Controllers\EtichetaController;
use App\Http\Controllers\ProgramareEtichetaController;
use App\Http\Controllers\MesajTrimisSmsController;
use App\Http\Controllers\SmsConfirmareProgramareController;
use App\Http\Controllers\RetetaController;

use Illuminate\Support\Facades\DB;

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

// Trimitere Cron joburi din Cpanel
Route::any('/cron-jobs/trimitere-automata-sms-cerere-confirmare-programare/{key}', [SmsConfirmareProgramareController::class, 'cronJobTrimitereAutomataSmsCerereConfirmareProgramare']);
// The next 2 routes are identical, the difference is that the second one is smaller to fit better in 1 sms.
Route::get('status-programare/{cheie_unica}', [SmsConfirmareProgramareController::class, 'statusProgramare']);
Route::get('sp/{cheie_unica}', [SmsConfirmareProgramareController::class, 'statusProgramare']);


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
    Route::resource('fise-de-tratament/{fisa_de_tratament}/chestionar-acordul-pacientului-informat', ChestionarAcordulPacientuluiInformatController::class,  ['parameters' => ['chestionar-acordul-pacientului-informat' => 'chestionar']]);
    Route::resource('fise-de-tratament', FisaDeTratamentController::class,  ['parameters' => ['fise-de-tratament' => 'fisa_de_tratament']]);

    Route::get('programari/afisare-zilnic', [ProgramareController::class, 'afisareZilnic'])->name('programari.afisareZilnic');
    Route::get('programari/afisare-saptamanal', [ProgramareController::class, 'afisareSaptamanal'])->name('programari.afisareSaptamanal');
    Route::get('programari/afisare-lunar', [ProgramareController::class, 'afisareLunar'])->name('programari.afisareLunar');
    // Route::any('programari/etichete/{programare}/{etichetaId?}/{actiune?}', [ProgramareController::class, 'etichete'])->name('programari.etichete');
    Route::any('programari/trimite-recenzie/{programare}', [ProgramareController::class, 'trimiteRecenzie']);
    Route::any('programari/etichete/{programare}', [ProgramareController::class, 'etichete'])->name('programari.etichete');
    Route::resource('programari', ProgramareController::class,  ['parameters' => ['programari' => 'programare']]);

    Route::resource('etichete', EtichetaController::class,  ['parameters' => ['etichete' => 'eticheta']]);
    Route::post('etichete/{eticheta}/barcode/{view_type}', [EtichetaController::class, 'pdfExportBarcode']);

    Route::get('retete/{reteta}/export/pdf', [RetetaController::class, 'exportPdf']);
    Route::resource('retete', RetetaController::class,  ['parameters' => ['retete' => 'reteta']]);


    // Cardiologie
    Route::prefix('cardiologie')->name('cardiologie.')->group(function () {
        Route::get('programari/afisare-saptamanal', [App\Http\Controllers\Cardiologie\ProgramareController::class, 'afisareSaptamanal'])->name('programari.afisareSaptamanal');
        Route::get('programari/afisare-lunar', [App\Http\Controllers\Cardiologie\ProgramareController::class, 'afisareLunar'])->name('programari.afisareLunar');
        Route::any('programari/trimite-recenzie/{programare}', [App\Http\Controllers\Cardiologie\ProgramareController::class, 'trimiteRecenzie']);
        Route::resource('programari', App\Http\Controllers\Cardiologie\ProgramareController::class,  ['parameters' => ['programari' => 'programare']]);

        Route::resource('programari/{programare}/buletin-ecocardiografic', App\Http\Controllers\Cardiologie\BuletinEcocardiograficController::class, ['parameters' => ['buletin-ecocardiografic' => 'buletin_ecocardiografic']]);
        Route::get('programari/{programare}/buletin-ecocardiografic-export/{buletin_ecocardiografic}/{view_type}', [App\Http\Controllers\Cardiologie\BuletinEcocardiograficController::class, 'exportPdf']);

        Route::resource('programari/{programare}/fisa-consultatie', App\Http\Controllers\Cardiologie\FisaConsultatieController::class, ['parameters' => ['fisa-consultatie' => 'fisa_consultatie']]);
        Route::get('programari/{programare}/fisa-consultatie-export/{fisa_consultatie}/{view_type}', [App\Http\Controllers\Cardiologie\FisaConsultatieController::class, 'exportPdf']);

        Route::resource('programari/{programare}/referat-medical', App\Http\Controllers\Cardiologie\ReferatMedicalController::class, ['parameters' => ['referat-medical' => 'referat_medical']]);
        Route::get('programari/{programare}/referat-medical-export/{referat_medical}/{view_type}', [App\Http\Controllers\Cardiologie\ReferatMedicalController::class, 'exportPdf']);
    });

    Route::resource('mesaje-trimise-sms', MesajTrimisSmsController::class,  ['parameters' => ['mesaje-trimise-sms' => 'mesaj_trimis_sms']]);

    Route::get('toate-numerele-de-telefon-din-aplicatie', function(){
        $telefoane = \App\Models\FisaDeTratament::select('telefon')->distinct()->get();
        foreach ($telefoane as $telefon){
            echo $telefon->telefon;
            echo '<br>';
        }

        $telefoane_cardiologie = \App\Models\Cardiologie\Programare::select('telefon')->distinct()->get();
        foreach ($telefoane_cardiologie as $telefon){
            echo $telefon->telefon;
            echo '<br>';
        }

        dd($telefoane, $telefoane_cardiologie);
    });
});
