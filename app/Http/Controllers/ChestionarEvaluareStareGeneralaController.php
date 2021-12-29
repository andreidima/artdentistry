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
        $salariat = FirmaSalariat::create($this->validateRequest($request));
        // dd($salariat);

        return redirect('/firme/salariati')->with('status', 'Salariatul „' . ($salariat->nume ?? '') . '” a fost adăugat cu succes!');
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
    public function edit($fisa = null,ChestionarEvaluareStareGenerala $chestionar)
    {
        dd('Modificare', $fisa, $chestionar);
        $firme = Firma::orderBy('nume')->get();

        return view('firme.salariati.edit', compact('salariat', 'firme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FirmaSalariat  $salariat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FirmaSalariat $salariat)
    {
        $request->request->add(['user_id' => $request->user()->id]);
        $salariat->update($this->validateRequest($request));

        return redirect('/firme/salariati')->with('status', 'Salariatul „' . ($salariat->nume ?? '') . '” a fost modificat cu succes!');
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
                'firma_id' => 'nullable|numeric|integer',
                'nume' => 'required|max:500',
                'cnp' => 'nullable|numeric|integer|digits:13',
                'functie' => 'nullable|max:500',
                'data_angajare' => 'nullable|date',
                'data_incetare' => 'nullable|date',
                'instructaj_la_nr_luni' => 'nullable|numeric|integer|between:1,12',
                'data_instructaj' => 'nullable|max:500',
                'anexa_ssm' => 'nullable',
                'lista_eip' => 'nullable',
                'medicina_muncii_expirare' => 'nullable|date',
                'locatie_fisa_ssm' => 'nullable|max:500',
                'locatie_fisa_su' => 'nullable|max:500',
                'observatii' => 'nullable|max:2000',
                'user_id' => 'nullable',
            ],
            [

            ]
        );
    }
}
