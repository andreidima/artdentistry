<?php

namespace App\Http\Controllers\Cardiologie;
use App\Http\Controllers\Controller;

use App\Models\Cardiologie\Programare;
use App\Models\Cardiologie\FisaConsultatie;
use Illuminate\Http\Request;

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

        return view('cardiologie.fiseConsultatie.create', compact('programare'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $fisa_consultatie = FisaConsultatie::create($this->validateRequest());

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
        $fisa_consultatie->update($this->validateRequest());

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
            ],
            [
            ]
        );

        $request["user_id"] = request()->user()->id;
        // $request = \array_diff_key($request, ['gdpr' => '', 'covid_19' => '']);

        return $request;
    }

    public function exportPdf(Request $request, Programare $programare, FisaConsultatie $fisa_consultatie)
    {
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
