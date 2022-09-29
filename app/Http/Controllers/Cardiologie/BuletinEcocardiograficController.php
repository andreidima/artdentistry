<?php

namespace App\Http\Controllers\Cardiologie;
use App\Http\Controllers\Controller;

use App\Models\Cardiologie\Programare;
use App\Models\Cardiologie\BuletinEcocardiografic;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Builder;

class BuletinEcocardiograficController extends Controller
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

        return view('cardiologie.buletineEcocardiografice.create', compact('programare'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buletin_ecocardiografic = BuletinEcocardiografic::create($this->validateRequest());

        return redirect($request->session()->get('cardiologie_programare_return_url') ?? ('cardiologie/programari/afisare-saptamanal'))
            ->with('status', 'Buletinul Ecocardiografic pentru „' . ($buletin_ecocardiografic->programare->nume ?? '') . '” a fost adăugat cu succes!');
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
    public function edit(Request $request, Programare $programare, BuletinEcocardiografic $buletin_ecocardiografic)
    {
        $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        return view('cardiologie.buletineEcocardiografice.edit', compact('programare', 'buletin_ecocardiografic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programare $programare, BuletinEcocardiografic $buletin_ecocardiografic)
    {
        $buletin_ecocardiografic->update($this->validateRequest());

        return redirect($request->session()->get('cardiologie_programare_return_url') ?? ('cardiologie/programari/afisare-saptamanal'))
            ->with('status', 'Buletinul Ecocardiografic pentru „' . ($buletin_ecocardiografic->programare->nume ?? '') . '” a fost modificat cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Programare $programare)
    {
        $programare->delete();

        return back()->with('status', 'Programarea pentru „' . ($programare->nume ?? '') . '” a fost ștearsă cu succes!');
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
                'dtdvs_1' => 'nullable|max:50',
                'dtdvs_2' => 'nullable|max:50',
                'dtsvs_1' => 'nullable|max:50',
                'dtsvs_2' => 'nullable|max:50',
                'sivd_1' => 'nullable|max:50',
                'sivd_2' => 'nullable|max:50',
                'sivs_1' => 'nullable|max:50',
                'sivs_2' => 'nullable|max:50',
                'ppvsd_1' => 'nullable|max:50',
                'ppvsd_2' => 'nullable|max:50',
                'ppvss_1' => 'nullable|max:50',
                'ppvss_2' => 'nullable|max:50',
                'dsm_1' => 'nullable|max:50',
                'dsm_2' => 'nullable|max:50',
                'fs_1' => 'nullable|max:50',
                'fs_2' => 'nullable|max:50',
                'fe_1' => 'nullable|max:50',
                'fe_2' => 'nullable|max:50',
                'fevol_1' => 'nullable|max:50',
                'fevol_2' => 'nullable|max:50',
                'vtdvs_1' => 'nullable|max:50',
                'vtdvs_2' => 'nullable|max:50',
                'vtsvs_1' => 'nullable|max:50',
                'vtsvs_2' => 'nullable|max:50',
                'as_1' => 'nullable|max:50',
                'as_2' => 'nullable|max:50',
                'ad_1' => 'nullable|max:50',
                'ad_2' => 'nullable|max:50',
                'dtdvd_1' => 'nullable|max:50',
                'dtdvd_2' => 'nullable|max:50',
                'pavdd_1' => 'nullable|max:50',
                'pavdd_2' => 'nullable|max:50',
                'vci_cu_colaps_1' => 'nullable|max:50',
                'vci_cu_colaps_2' => 'nullable|max:50',
                'rdap_1' => 'nullable|max:50',
                'rdap_2' => 'nullable|max:50',
                'ap_inel_1' => 'nullable|max:50',
                'ap_inel_2' => 'nullable|max:50',
                'ao_inel_1' => 'nullable|max:50',
                'ao_inel_2' => 'nullable|max:50',
                'ao_asc_1' => 'nullable|max:50',
                'ao_asc_2' => 'nullable|max:50',
                'ao_crosa_1' => 'nullable|max:50',
                'ao_crosa_2' => 'nullable|max:50',
                'desc_cusp_ao_1' => 'nullable|max:50',
                'desc_cusp_ao_2' => 'nullable|max:50',
                'unda_e_1' => 'nullable|max:50',
                'unda_e_2' => 'nullable|max:50',
                'unda_a_1' => 'nullable|max:50',
                'unda_a_2' => 'nullable|max:50',
                'e_a_1' => 'nullable|max:50',
                'e_a_2' => 'nullable|max:50',
                'valva_mitrala_insertie' => 'nullable|max:50',
                'valva_mitrala_aspect' => 'nullable|max:50',
                'valva_mitrala_mobilitate' => 'nullable|max:50',
                'valva_mitrala_dpmax' => 'nullable|max:50',
                'valva_mitrala_dpmediu' => 'nullable|max:50',
                'valva_mitrala_vmax' => 'nullable|max:50',
                'valva_mitrala_som' => 'nullable|max:50',
                'valva_mitrala_pht' => 'nullable|max:50',
                'valva_mitrala_som_2d' => 'nullable|max:50',
                'valva_aortica_insertie' => 'nullable|max:50',
                'valva_aortica_aspect' => 'nullable|max:50',
                'valva_aortica_mobilitate' => 'nullable|max:50',
                'valva_aortica_dpmax' => 'nullable|max:50',
                'valva_aortica_dpmediu' => 'nullable|max:50',
                'valva_aortica_vmax' => 'nullable|max:50',
                'valva_aortica_soacont' => 'nullable|max:50',
                'valva_tricuspida_insertie' => 'nullable|max:50',
                'valva_tricuspida_aspect' => 'nullable|max:50',
                'valva_tricuspida_mobilitate' => 'nullable|max:50',
                'valva_tricuspida_dpmax' => 'nullable|max:50',
                'im' => 'nullable|max:50',
                'ia' => 'nullable|max:50',
                'ip' => 'nullable|max:50',
                'it' => 'nullable|max:50',
                'concluzii' => 'nullable|max:50',
                'data' => 'nullable|max:50',
            ],
            [
            ]
        );

        $request["user_id"] = request()->user()->id;
        // $request = \array_diff_key($request, ['gdpr' => '', 'covid_19' => '']);

        return $request;
    }

}
