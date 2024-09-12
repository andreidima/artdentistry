<?php

namespace App\Http\Controllers\Cardiologie;
use App\Http\Controllers\Controller;

use App\Models\Cardiologie\Programare;
use App\Models\Cardiologie\FisaConsultatie;
use App\Models\Cardiologie\FisaConsultatieMedicament;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Builder;

class FisaConsultatieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Programare $programare)
    {
        $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        $programareUltimaDeLaAcelasiPacient = Programare::with('fisa_consultatie')->whereHas('fisa_consultatie')->where('nume', $programare->nume)->where('telefon', $programare->telefon)->latest()->first();

        $fisa_consultatie = new FisaConsultatie;
        $fisa_consultatie->motive_prezentare = $programareUltimaDeLaAcelasiPacient->fisa_consultatie->motive_prezentare ?? '';
        $fisa_consultatie->factori_de_risc_cardiovasculari = $programareUltimaDeLaAcelasiPacient->fisa_consultatie->factori_de_risc_cardiovasculari ?? '';
        $fisa_consultatie->antecedente_personale_patologice = $programareUltimaDeLaAcelasiPacient->fisa_consultatie->antecedente_personale_patologice ?? '';
        $fisa_consultatie->diagnostic = $programareUltimaDeLaAcelasiPacient->fisa_consultatie->diagnostic ?? '';
        $fisa_consultatie->examen_clinic = $programareUltimaDeLaAcelasiPacient->fisa_consultatie->examen_clinic ?? '';
        $fisa_consultatie->ekg = $programareUltimaDeLaAcelasiPacient->fisa_consultatie->ekg ?? '';
        $fisa_consultatie->tratament_efectuat = $programareUltimaDeLaAcelasiPacient->fisa_consultatie->tratament_efectuat ?? '';

        return view('cardiologie.fiseConsultatie.create', compact('programare', 'fisa_consultatie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fisa_consultatie = FisaConsultatie::create($this->validateRequest());

        // salvare medicamente
        for ($i = 1; $i <= $request->numar_medicamente; $i++) {
            $medicament = new FisaConsultatieMedicament;
            $medicament->fisa_consultatie_id = $fisa_consultatie->id;
            $medicament->nume = $request->medicamente['nume'][$i];
            $medicament->dimineata = $request->medicamente['dimineata'][$i];
            $medicament->pranz = $request->medicamente['pranz'][$i];
            $medicament->seara = $request->medicamente['seara'][$i];
            $medicament->save();
        }

        return redirect($request->session()->get('cardiologie_programare_return_url') ?? ('cardiologie/programari/afisare-saptamanal'))
            ->with('status', 'Fișa Consultație pentru „' . ($fisa_consultatie->programare->nume ?? '') . '” a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Programare $programare)
    {
        $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        return view('cardiologie.programari.show', compact('programare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Programare $programare, FisaConsultatie $fisa_consultatie)
    {
        $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        // Incarcare medicamente in fisa_consultatie
        $medicamente = [
            'nume' => [],
            'dimineata' => [],
            'pranz' => [],
            'seara' => [],
        ];
        $i = 1;
        foreach ($fisa_consultatie->medicamente as $medicament){
            $medicamente['nume'] = Arr::add($medicamente['nume'], $i, $medicament->nume);
            $medicamente['dimineata'] = Arr::add($medicamente['dimineata'], $i, $medicament->dimineata);
            $medicamente['pranz'] = Arr::add($medicamente['pranz'], $i, $medicament->pranz);
            $medicamente['seara'] = Arr::add($medicamente['seara'], $i, $medicament->seara);
            $i++;
        }
        $fisa_consultatie->medicamente = $medicamente;

        return view('cardiologie.fiseConsultatie.edit', compact('programare', 'fisa_consultatie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programare $programare, FisaConsultatie $fisa_consultatie)
    {
        // dd($request);
        $fisa_consultatie->update($this->validateRequest());

        // Stergerea medicamentelor
        foreach ($fisa_consultatie->medicamente as $medicament) {
                $medicament->delete();
        }

        // Adaugarea medicamentelor din nou
        for ($i = 1; $i <= $request->numar_medicamente; $i++) {
            $medicament = new FisaConsultatieMedicament;
            $medicament->fisa_consultatie_id = $fisa_consultatie->id;
            $medicament->nume = $request->medicamente['nume'][$i];
            $medicament->dimineata = $request->medicamente['dimineata'][$i];
            $medicament->pranz = $request->medicamente['pranz'][$i];
            $medicament->seara = $request->medicamente['seara'][$i];
            $medicament->save();
        }

        return redirect($request->session()->get('cardiologie_programare_return_url') ?? ('cardiologie/programari/afisare-saptamanal'))
            ->with('status', 'Fișa Consultație pentru „' . ($fisa_consultatie->programare->nume ?? '') . '” a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Programare $programare)
    {
        // $programare->delete();

        // return back()->with('status', 'Programarea pentru „' . ($programare->nume ?? '') . '” a fost ștearsă cu succes!');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest()
    {
        $request = request()->validate(
            [
                'programare_id' => 'required',
                'varsta' => 'nullable|max:50',
                'motive_prezentare' => 'nullable|max:2000',
                'factori_de_risc_cardiovasculari' => 'nullable|max:2000',
                'antecedente_personale_patologice' => 'nullable|max:2000',
                'diagnostic' => 'nullable|max:2000',
                'examen_clinic' => 'nullable|max:2000',
                'ekg' => 'nullable|max:2000',
                'tratament_efectuat' => 'nullable|max:2000',
                'data' => 'nullable|max:50',
                'medicamente.nume.*' => 'required|max:200',
                'medicamente.dimineata.*' => 'nullable|max:200',
                'medicamente.pranz.*' => 'nullable|max:200',
                'medicamente.seara.*' => 'nullable|max:200',
            ],
            [
            ]
        );

        $request["user_id"] = request()->user()->id;
        $request = \array_diff_key($request, ['medicamente' => '', 'numar_medicamente' => '']);

        return $request;
    }

    public function exportPdf(Request $request, Programare $programare, FisaConsultatie $fisa_consultatie)
    {
        // dd($fisa_consultatie->medicamente->count());
        if ($request->view_type === 'export-html') {
            return view('cardiologie.fiseConsultatie.diverse.exportPdf', compact('programare', 'fisa_consultatie'));
        } elseif ($request->view_type === 'export-pdf') {
            $pdf = \PDF::loadView('cardiologie.fiseConsultatie.diverse.exportPdf', compact('programare', 'fisa_consultatie'))
                ->setPaper('a4', 'portrait');
            $pdf->getDomPDF()->set_option("enable_php", true);
            // return $pdf->download('Raport SSM - salariati.pdf');
            return $pdf->stream();
        }
    }
}
