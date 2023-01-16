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
Route::get('status-programare/{cheie_unica}', [SmsConfirmareProgramareController::class, 'statusProgramare']);


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
    Route::any('programari/etichete/{programare}', [ProgramareController::class, 'etichete'])->name('programari.etichete');
    Route::resource('programari', ProgramareController::class,  ['parameters' => ['programari' => 'programare']]);

    Route::resource('etichete', EtichetaController::class,  ['parameters' => ['etichete' => 'eticheta']]);
    Route::post('etichete/{eticheta}/barcode/{view_type}', [EtichetaController::class, 'pdfExportBarcode']);


    // Cardiologie
    Route::prefix('cardiologie')->name('cardiologie.')->group(function () {
        Route::get('programari/afisare-saptamanal', [App\Http\Controllers\Cardiologie\ProgramareController::class, 'afisareSaptamanal'])->name('programari.afisareSaptamanal');
        Route::get('programari/afisare-lunar', [App\Http\Controllers\Cardiologie\ProgramareController::class, 'afisareLunar'])->name('programari.afisareLunar');

        Route::resource('programari', App\Http\Controllers\Cardiologie\ProgramareController::class,  ['parameters' => ['programari' => 'programare']]);

        Route::resource('programari/{programare}/buletin-ecocardiografic', App\Http\Controllers\Cardiologie\BuletinEcocardiograficController::class, ['parameters' => ['buletin-ecocardiografic' => 'buletin_ecocardiografic']]);
        Route::get('programari/{programare}/buletin-ecocardiografic-export/{buletin_ecocardiografic}/{view_type}', [App\Http\Controllers\Cardiologie\BuletinEcocardiograficController::class, 'exportPdf']);

        Route::resource('programari/{programare}/fisa-consultatie', App\Http\Controllers\Cardiologie\FisaConsultatieController::class, ['parameters' => ['fisa-consultatie' => 'fisa_consultatie']]);
        Route::get('programari/{programare}/fisa-consultatie-export/{fisa_consultatie}/{view_type}', [App\Http\Controllers\Cardiologie\FisaConsultatieController::class, 'exportPdf']);
    });

    Route::resource('mesaje-trimise-sms', MesajTrimisSmsController::class,  ['parameters' => ['mesaje-trimise-sms' => 'mesaj_trimis_sms']]);

    // Route::get('generare-chei-unice-acolo-unde-lipsesc', function(){
    //     $programari = \App\Models\Programare::where('cheie_unica', null)->get();
    //     foreach ($programari as $programare){
    //         // echo $programare->id . '<br>';
    //         $programare->cheie_unica = uniqid();
    //         $programare->save();
    //     }
    //     $programari = \App\Models\Cardiologie\Programare::where('cheie_unica', null)->get();
    //     foreach ($programari as $programare){
    //         // echo $programare->id . '<br>';
    //         $programare->cheie_unica = uniqid();
    //         $programare->save();
    //     }
    // });

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

    // Barcoduri Mirica
    Route::get('mirica-barcoduri', function(){
        $barcoduri = DB::table('mirica_barcoduri')->get();
        echo '<style>
                    table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                        padding: 5px;
                    }
                </style>';

        echo '<table style="border: 1px solid black">';
        // echo
        //         '<tr style="font-size:100%">
        //             <td>
        //                 #
        //             </td>
        //             <td>
        //                 Cod de bare
        //             </td>
        //             <td>
        //                 cod
        //             </td>
        //             <td>
        //                 den
        //             </td>
        //             <td>
        //                 um
        //             </td>
        //             <td>
        //                 scriptic
        //             </td>
        //             <td>
        //                 faptic
        //             </td>
        //             <td>
        //                 De transferat
        //             </td>
        //             <td>
        //                 pret
        //             </td>
        //         </tr>';
        foreach ($barcoduri as $key=>$barcod){
            echo
                '<tr style="page-break-inside: avoid;">
                    <td>' .
                        ($key + 1) .
                    '</td>
                    <td style="padding:20px">' .
                        DNS1D::getBarcodeHTML($barcod->a, 'C128',2.45 ,50) .
                    '</td>
                    <td>' .
                        $barcod->a .
                    '</td>
                    <td>' .
                        $barcod->b .
                    '</td>
                    <td>' .
                        $barcod->c .
                    '</td>
                    <td>' .
                        $barcod->d .
                    '</td>
                    <td>' .
                        $barcod->e .
                    '</td>
                    <td>' .
                        $barcod->f .
                    '</td>
                    <td>' .
                        $barcod->g .
                    '</td>
                </tr>';
        }
        echo '</table>';

    });


});
