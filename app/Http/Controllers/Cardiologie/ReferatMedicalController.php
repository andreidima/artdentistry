<?php

namespace App\Http\Controllers\Cardiologie;
use App\Http\Controllers\Controller;

use App\Models\Cardiologie\Programare;
use App\Models\Cardiologie\ReferatMedical;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Builder;

class ReferatMedicalController extends Controller
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

        return view('cardiologie.referateMedicale.create', compact('programare'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $referat_medical = ReferatMedical::create($this->validateRequest());

        return redirect($request->session()->get('cardiologie_programare_return_url') ?? ('cardiologie/programari/afisare-saptamanal'))
            ->with('status', 'Referatul medical pentru „' . ($referat_medical->programare->nume ?? '') . '” a fost adăugat cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Programare $programare)
    {
        // $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        // return view('cardiologie.programari.show', compact('programare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Programare $programare, ReferatMedical $referat_medical)
    {
        $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        return view('cardiologie.referateMedicale.edit', compact('programare', 'referat_medical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programare $programare, ReferatMedical $referat_medical)
    {
        // dd($request);
        $referat_medical->update($this->validateRequest());

        return redirect($request->session()->get('cardiologie_programare_return_url') ?? ('cardiologie/programari/afisare-saptamanal'))
            ->with('status', 'Referatul medical pentru „' . ($referat_medical->programare->nume ?? '') . '” a fost modificat cu succes!');
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
                'cnp' => 'nullable|max:500',
                'adresa' => 'nullable|max:500',
                'numar_inregistrare' => 'nullable|max:500',
                'diagnostic_clinic' => 'nullable|max:2000',
                'simptomologie' => 'nullable|max:2000',
                'examen_obiectiv_detaliat' => 'nullable|max:2000',
                'inaltime' => 'nullable|max:500',
                'greutate' => 'nullable|max:500',
                'ta' => 'nullable|max:500',
                'av' => 'nullable|max:500',
                'investigatii_clinice_paraclinice' => 'nullable|max:2000',
                'tratamente_urmate' => 'nullable|max:2000',
                'observatii' => 'nullable|max:2000',
            ],
            [
            ]
        );

        return $request;
    }

    public function exportPdf(Request $request, Programare $programare, ReferatMedical $referat_medical)
    {
        if ($request->view_type === 'export-html') {
            return view('cardiologie.referateMedicale.diverse.exportPdf', compact('programare', 'referat_medical'));
        } elseif ($request->view_type === 'export-pdf') {
            $pdf = \PDF::loadView('cardiologie.referateMedicale.diverse.exportPdf', compact('programare', 'referat_medical'))
                ->setPaper('a4', 'portrait');
            $pdf->getDomPDF()->set_option("enable_php", true);
            // return $pdf->download('Referat medical.pdf');
            return $pdf->stream();
        }
    }
}
