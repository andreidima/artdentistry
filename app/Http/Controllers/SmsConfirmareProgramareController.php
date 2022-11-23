<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programare;
use Carbon\Carbon;

use App\Traits\TrimiteSmsTrait;

class SmsConfirmareProgramareController extends Controller
{
    use TrimiteSmsTrait;

    public function cronJobTrimitereAutomataSmsCerereConfirmareProgramare($key = null)
    {
        $config_key = \Config::get('variabile.cron_job_key');
        // dd($key, $config_key);

        if ($key === $config_key){

            $programari = Programare::with('fisa_de_tratament')
                ->whereDate('data', '=', Carbon::tomorrow()->todatestring())
                ->whereDate('created_at', '<', Carbon::today()->todatestring()) // sa fie cel putin cu 2 zile in urma facuta programarea
                ->doesntHave('sms_confirmare') // sms-ul nu a fost deja trimis
                ->whereNull('confirmare') // nu sunt confirmate deja de administratorii aplicatiei
                ->get();

            foreach ($programari as $programare){
                $mesaj = 'Accesati ' . url('/status-programare/' . $programare->cheie_unica) . ', pentru a confirma sau anula programarea din ' . Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') .
                            ', ora ' . Carbon::parse($programare->ora)->isoFormat('HH:mm') .
                            '. Cu stima, ArtDentistry!';
                // echo $programare->id . '<br>' . $programare->fisa_de_tratament->telefon . '<br>' . $mesaj . '<br><br>';
                $this->trimiteSms('Programari', 'Confirmare', $programare->id, [$programare->fisa_de_tratament->telefon ?? ''], $mesaj);
            }

            echo '<br><br><br><br>';

            $programari = \App\Models\Cardiologie\Programare::
                whereDate('data', '=', Carbon::tomorrow()->todatestring())
                ->whereDate('created_at', '<', Carbon::today()->todatestring()) // sa fie cel putin cu 2 zile in urma facuta programarea
                ->doesntHave('sms_confirmare') // sms-ul nu a fost deja trimis
                ->whereNull('confirmare') // nu sunt confirmate deja de administratorii aplicatiei
                ->get();

            foreach ($programari as $programare){
                $mesaj = 'Accesati ' . url('/status-programare/' . $programare->cheie_unica) . ', pentru a confirma sau anula programarea din ' . Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') .
                            ', ora ' . Carbon::parse($programare->ora)->isoFormat('HH:mm') .
                            '. Cu stima, ArtDentistry!';
                // echo $programare->id . '<br>' . $programare->telefon . '<br>' . $mesaj . '<br><br>';
                $this->trimiteSms('Programari Cardiologie', 'Confirmare', $programare->id, [$programare->fisa_de_tratament->telefon ?? ''], $mesaj);
            }

        } else {
            echo 'Cheia pentru Cron Joburi nu este corectă!';
        }
    }

    public function statusProgramare(Request $request, $cheie_unica)
    {
        $programare = Programare::where('cheie_unica', $cheie_unica)->first() ?? \App\Models\Cardiologie\Programare::where('cheie_unica', $cheie_unica)->first();
        $data_programare = Carbon::parse($programare->data)->addHours(Carbon::parse($programare->ora)->hour)->addMinutes(Carbon::parse($programare->ora)->minute);

        if (($programare->confirmare === null) && ($data_programare->greaterThan(Carbon::now()))){
            if ($request->has('confirmare')){
                if ($request->confirmare === 'da'){
                    $programare->confirmare = 1;
                } else if ($request->confirmare === 'nu'){
                    $programare->confirmare = 0;
                }
                $programare->confirmare_client_timestamp = Carbon::now();
                $programare->save();

                // Salvare in istoric
                if ($programare->getTable() == "programari"){
                    $programare_istoric = new \App\Models\ProgramareIstoric;
                } else {
                    $programare_istoric = new \App\Models\Cardiologie\ProgramareIstoric;
                }
                $programare_istoric->fill($programare->makeHidden(['created_at', 'updated_at', 'deleted_at'])->attributesToArray());
                $programare_istoric->operatie = 'Confirmare Anulare';
                $programare_istoric->operatie_user_id = auth()->user()->id ?? null;
                $programare_istoric->save();
            }
        }

        return view('diverse.confirmareAnulareProgramare', compact('programare', 'data_programare'));
    }
}
