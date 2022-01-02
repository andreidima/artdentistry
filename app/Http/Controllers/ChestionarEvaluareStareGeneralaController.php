<?php

namespace App\Http\Controllers;

use App\Models\ChestionarEvaluareStareGenerala;
use App\Models\FisaDeTratament;

use Illuminate\Http\Request;

class ChestionarEvaluareStareGeneralaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FisaDeTratament $fisa_de_tratament)
    {
        // dd('Adaugare', $fisa_de_tratament);
        return view('chestionareEvaluareStareGenerala.create', compact('fisa_de_tratament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => $request->user()->id]);
        // dd($request);
        $chestionar = ChestionarEvaluareStareGenerala::create($this->validateRequest($request));
        // dd($chestionar);

        return redirect('/fise-de-tratament')->with('status', 'Chestionarul pentru „' . ($chestionar->fisa_de_tratament->nume ?? '') . '” a fost adăugat cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FirmaSalariat  $salariat
     * @return \Illuminate\Http\Response
     */
    public function show(FirmaSalariat $salariat)
    {
        return view('firme.salariati.show', compact('salariat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FirmaSalariat  $salariat
     * @return \Illuminate\Http\Response
     */
    public function edit(FisaDeTratament $fisa_de_tratament, ChestionarEvaluareStareGenerala $chestionar)
    {
        return view('chestionareEvaluareStareGenerala.edit', compact('fisa_de_tratament', 'chestionar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FirmaSalariat  $salariat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FisaDeTratament $fisa_de_tratament, ChestionarEvaluareStareGenerala $chestionar)
    {
        $request->request->add(['user_id' => $request->user()->id]);
        $chestionar->update($this->validateRequest($request));

        return redirect('/fise-de-tratament')->with('status', 'Chestionarul pentru „' . ($chestionar->fisa_de_tratament->nume ?? '') . '” a fost modificat cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FirmaSalariat  $salariat
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirmaSalariat $salariat)
    {
        $salariat->delete();

        return redirect('/firme/salariati')->with('status', 'Salariatul „' . ($salariat->nume ?? '') . '” a fost șters cu succes!');
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
                'gravida' => 'nullable|numeric|integer|between:0,1',
                'varsta_sarcina' => 'nullable|max:500',
                'data_menstruatie' => 'nullable|max:500',
                'alergii_intolerante' => 'nullable|numeric|integer|between:0,1',
                'alergic_la' => 'nullable|max:500',
                'intoleranta_la' => 'nullable|max:500',
                'tratament_medical' => 'nullable|numeric|integer|between:0,1',
                'in_tratament_cu' => 'nullable|max:500',
                'tratament_antibiotice' => 'nullable|numeric|integer|between:0,1',
                'antibiotic' => 'nullable|max:500',
                'doza' => 'nullable|max:500',
                'afectiunea' => 'nullable|max:500',
                'boli_profesionale' => 'nullable|numeric|integer|between:0,1',
                'angina_pectorala' => 'nullable|numeric|integer|between:0,1',
                'infarct_miocardic' => 'nullable|numeric|integer|between:0,1',
                'vulvulopatii' => 'nullable|numeric|integer|between:0,1',
                'endocardita' => 'nullable|numeric|integer|between:0,1',
                'durere_sufocare_palpitatii' => 'nullable|numeric|integer|between:0,1',
                'boli_de_inima_altele' => 'nullable|max:500',
                'arteriopatii' => 'nullable|numeric|integer|between:0,1',
                'varice' => 'nullable|numeric|integer|between:0,1',
                'tromboflebite' => 'nullable|numeric|integer|between:0,1',
                'embolii' => 'nullable|numeric|integer|between:0,1',
                'hipertensiune_arteriala' => 'nullable|numeric|integer|between:0,1',
                'hipotensiune_arteriala' => 'nullable|numeric|integer|between:0,1',
                'boli_vasculare_altele' => 'nullable|max:500',
                'tbc' => 'nullable|numeric|integer|between:0,1',
                'bronsita_cronica' => 'nullable|numeric|integer|between:0,1',
                'astm' => 'nullable|numeric|integer|between:0,1',
                'silicoza' => 'nullable|numeric|integer|between:0,1',
                'boli_plamani_altele' => 'nullable|max:500',
                'gastrita' => 'nullable|numeric|integer|between:0,1',
                'ulcer' => 'nullable|numeric|integer|between:0,1',
                'reflux_esofagian' => 'nullable|numeric|integer|between:0,1',
                'hernie_hiatala' => 'nullable|numeric|integer|between:0,1',
                'boli_digestive_altele' => 'nullable|max:500',
                'hepatita' => 'nullable|numeric|integer|between:0,1',
                'ciroza' => 'nullable|numeric|integer|between:0,1',
                'boli_hepatice_altele' => 'nullable|max:500',
                'insuficienta_renala' => 'nullable|numeric|integer|between:0,1',
                'boli_renale_altele' => 'nullable|max:500',
                'diabet_zaharat' => 'nullable|numeric|integer|between:0,1',
                'guta' => 'nullable|numeric|integer|between:0,1',
                'boli_metabolice_altele' => 'nullable|max:500',
                'hipertiroidism' => 'nullable|numeric|integer|between:0,1',
                'feocromocitom' => 'nullable|numeric|integer|between:0,1',
                'boli_endocrine_altele' => 'nullable|max:500',
                'epilepsie' => 'nullable|numeric|integer|between:0,1',
                'boli_neurologice_altele' => 'nullable|max:500',
                'afectiuni_ale_coloanei' => 'nullable|numeric|integer|between:0,1',
                'boli_ale_scheletului_altele' => 'nullable|max:500',
                'depresii' => 'nullable|numeric|integer|between:0,1',
                'fobii' => 'nullable|numeric|integer|between:0,1',
                'boli_psihice_altele' => 'nullable|max:500',
                'sangerari_echimoze' => 'nullable|numeric|integer|between:0,1',
                'hemofilie' => 'nullable|numeric|integer|between:0,1',
                'anemie' => 'nullable|numeric|integer|between:0,1',
                'leucemie_limfom' => 'nullable|numeric|integer|between:0,1',
                'boli_hematologice_altele' => 'nullable|max:500',
                'alte_boli' => 'nullable|max:500',
                'boli_infectioase' => 'nullable|numeric|integer|between:0,1',
                'hepatita_cronica_virala_a' => 'nullable|numeric|integer|between:0,1',
                'hepatita_cronica_virala_b' => 'nullable|numeric|integer|between:0,1',
                'hepatita_cronica_virala_c' => 'nullable|numeric|integer|between:0,1',
                'infectie_cu_virusul_hiv' => 'nullable|numeric|integer|between:0,1',
                'sida' => 'nullable|numeric|integer|between:0,1',
                'alte_infectii_cronice' => 'nullable|numeric|integer|between:0,1',
                'primire_sange' => 'nullable|numeric|integer|between:0,1',
                'primire_sange_cu_ce_ocazie' => 'nullable|max:500',
                'tratamente_stomatologice' => 'nullable|numeric|integer|between:0,1',
                'fara_anestezie' => 'nullable|numeric|integer|between:0,1',
                'cu_anestezie_locala' => 'nullable|numeric|integer|between:0,1',
                'cu_anestezie_locala_si_sedare_inhalatorie' => 'nullable|numeric|integer|between:0,1',
                'cu_anestezie_generala' => 'nullable|numeric|integer|between:0,1',
                'accidente_sau_incidente' => 'nullable|numeric|integer|between:0,1',
                'lesin' => 'nullable|numeric|integer|between:0,1',
                'greata' => 'nullable|numeric|integer|between:0,1',
                'alergii' => 'nullable|numeric|integer|between:0,1',
                'accidente_sau_incidente_altele' => 'nullable|max:500',
                'interventii_chirurgicale' => 'nullable|numeric|integer|between:0,1',
                'interventii_chirurgicale_detaliat' => 'nullable|max:500',
                'anestezie_loco_regionala' => 'nullable|numeric|integer|between:0,1',
                'anestezie_sedare_inhalatorie' => 'nullable|numeric|integer|between:0,1',
                'anestezie_sedare_intravenoasa' => 'nullable|numeric|integer|between:0,1',
                'anestezie_generala' => 'nullable|numeric|integer|between:0,1',
                'fumat' => 'nullable|numeric|integer|between:0,1',
                'fumat_nr_tigari' => 'nullable|max:500',
                'fumat_nr_ani' => 'nullable|max:500',
                'bauturi_alcolice' => 'nullable|numeric|integer|between:0,1',
                'bauturi_alcolice_tip' => 'nullable|max:500',
                'bauturi_alcolice_cantitate' => 'nullable|max:500',
                'bauturi_alcolice_probleme' => 'nullable|numeric|integer|between:0,1',
                'droguri' => 'nullable|numeric|integer|between:0,1',
                'droguri_tip' => 'nullable|max:500',
                'droguri_cantitate' => 'nullable|max:500',
                'droguri_dependenta' => 'nullable|numeric|integer|between:0,1',
                'observatii' => 'nullable|max:2000',
                'user_id' => 'required',
            ],
            [

            ]
        );
    }
}
