<?php

namespace App\Http\Controllers;

use App\Models\ChestionarAcordulPacientuluiInformat;
use App\Models\FisaDeTratament;

use Illuminate\Http\Request;

class ChestionarAcordulPacientuluiInformatController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, FisaDeTratament $fisa_de_tratament)
    {
        $request->session()->get('fisa_de_tratament_return_url') ?? $request->session()->put('fisa_de_tratament_return_url', url()->previous());

        return view('chestionareAcordulPacientuluiInformat.create', compact('fisa_de_tratament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->request->add(['user_id' => $request->user()->id]);
        // dd($request);
        $chestionar = ChestionarAcordulPacientuluiInformat::create($this->validateRequest($request));
        // dd($chestionar);

        return redirect($request->session()->get('fisa_de_tratament_return_url') ?? ('/fise-de-tratament'))
            ->with('status', 'Chestionarul pentru „' . ($chestionar->fisa_de_tratament->nume ?? '') . '” a fost adăugat cu succes!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FisaDeTratament  $fisa_de_tratament
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FisaDeTratament $fisa_de_tratament, ChestionarAcordulPacientuluiInformat $chestionar)
    {
        $request->session()->get('fisa_de_tratament_return_url') ?? $request->session()->put('fisa_de_tratament_return_url', url()->previous());

        return view('chestionareAcordulPacientuluiInformat.edit', compact('fisa_de_tratament', 'chestionar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FisaDeTratament  $fisa_de_tratament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FisaDeTratament $fisa_de_tratament, ChestionarAcordulPacientuluiInformat $chestionar)
    {
        // $request->request->add(['user_id' => $request->user()->id]);
        $chestionar->update($this->validateRequest($request));

        // dd($request, $chestionar);

        return redirect($request->session()->get('fisa_de_tratament_return_url') ?? ('/fise-de-tratament'))
            ->with('status', 'Chestionarul pentru „' . ($chestionar->fisa_de_tratament->nume ?? '') . '” a fost modificat cu succes!');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest(Request $request)
    {
        return $request->validate(
            [
                'fisa_de_tratament_id' => 'required|numeric|integer',
                'nume' => 'nullable|max:500',
                'domiciliu' => 'nullable|max:500',
                'reprezentant_legal_nume' => 'nullable|max:500',
                'reprezentant_legal_domiciliu' => 'nullable|max:500',
                'reprezentant_legal_calitate' => 'nullable|max:500',
                'act_medical' => 'nullable|max:2000',
                'date_stare_sanatate' => 'nullable|numeric|integer|between:0,1',
                'diagnostic' => 'nullable|numeric|integer|between:0,1',
                'prognostic' => 'nullable|numeric|integer|between:0,1',
                'natura_scop_act_medical' => 'nullable|numeric|integer|between:0,1',
                'interventie_si_strategie' => 'nullable|numeric|integer|between:0,1',
                'beneficii_si_consecinte' => 'nullable|numeric|integer|between:0,1',
                'beneficii_si_consecinte_detaliat' => 'nullable|max:2000',
                'riscuri' => 'nullable|numeric|integer|between:0,1',
                'beneficii_si_consecinte_detaliat' => 'nullable|max:2000',
                'riscuri' => 'nullable|numeric|integer|between:0,1',
                'riscuri_detaliat' => 'nullable|max:2000',
                'alternative_tratament' => 'nullable|numeric|integer|between:0,1',
                'alternative_tratament_detaliat' => 'nullable|max:2000',
                'riscuri_neefectuare_tratament' => 'nullable|numeric|integer|between:0,1',
                'riscuri_nerespectare_recomandari_medicale' => 'nullable|numeric|integer|between:0,1',
                'consimtamant_recoltare_pastrare_folosire_produse_biologice' => 'nullable|numeric|integer|between:0,1',
                'informatii_servicii_medicale_disponibile' => 'nullable|numeric|integer|between:0,1',
                'informatii_identitatea_si_statutul_profesional_al_personalului' => 'nullable|numeric|integer|between:0,1',
                'informatii_reguli_unitatea_medicala' => 'nullable|numeric|integer|between:0,1',
                'instiintare_a_doua_opinie_medicala' => 'nullable|numeric|integer|between:0,1',
                'informare_in_continuare' => 'nullable|numeric|integer|between:0,1',
                'acceptare_subsemnat' => 'nullable|max:200',
                'acceptare_informatii_furnizate_de' => 'nullable|max:200',
                'acceptare_semnatura' => 'nullable',
                'acceptare_data' => 'nullable|max:100',
                'acceptare_ora' => 'nullable|max:100',
                'refuz_subsemnat' => 'nullable|max:200',
                'refuz_informatii_furnizate_de' => 'nullable|max:200',
                'refuz_semnatura' => 'nullable',
                'refuz_data' => 'nullable|max:100',
                'refuz_ora' => 'nullable|max:100',
                'ingrijiri_sanatate_nume' => 'nullable|max:100',
                'personal_medical_nume_1' => 'nullable|max:100',
                'personal_medical_profesie_1' => 'nullable|max:100',
                'personal_medical_grad_profesional_1' => 'nullable|max:100',
                'personal_medical_nume_2' => 'nullable|max:100',
                'personal_medical_profesie_2' => 'nullable|max:100',
                'personal_medical_grad_profesional_2' => 'nullable|max:100',
                'personal_medical_nume_3' => 'nullable|max:100',
                'personal_medical_profesie_3' => 'nullable|max:100',
                'personal_medical_grad_profesional_3' => 'nullable|max:100',
                'personal_medical_nume_4' => 'nullable|max:100',
                'personal_medical_profesie_4' => 'nullable|max:100',
                'personal_medical_grad_profesional_4' => 'nullable|max:100',
                'personal_medical_nume_5' => 'nullable|max:100',
                'personal_medical_profesie_5' => 'nullable|max:100',
                'personal_medical_grad_profesional_5' => 'nullable|max:100',
                'gdpr' => 'required',
            ],
            [

            ]
        );
    }
}
