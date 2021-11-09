<?php

namespace App\Http\Controllers;

use App\Models\FisaDeTratament;
use Illuminate\Http\Request;

class FisaDeTratamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_nume = \Request::get('search_nume');
        $search_telefon = \Request::get('search_telefon');

        $fise_de_tratament = FisaDeTratament::
            when($search_nume, function ($query, $search_nume) {
                return $query->where('nume', 'like', '%' . $search_nume . '%');
            })
            ->when($search_telefon, function ($query, $search_telefon) {
                return $query->where('telefon', 'like', '%' . $search_telefon . '%');
            })
            ->latest()
            ->simplePaginate(25);

        return view('fise_de_tratament.index', compact('fise_de_tratament', 'search_nume', 'search_telefon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fise_de_tratament.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fisa_de_tratament = FisaDeTratament::create($this->validateRequest($request));

        return redirect('/fise-de-tratament')->with('status', 'Fișa de tratament pentru pacientul "' . $fisa_de_tratament->nume . '" a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FisaDeTratament  $fisa_de_tratament
     * @return \Illuminate\Http\Response
     */
    public function show(FisaDeTratament $fisa_de_tratament)
    {
        return view('fise_de_tratament.show', compact('fisa_de_tratament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FisaDeTratament  $fisa_de_tratament
     * @return \Illuminate\Http\Response
     */
    public function edit(FisaDeTratament $fisa_de_tratament)
    {
        return view('fise_de_tratament.edit', compact('fisa_de_tratament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FisaDeTratament  $fisa_de_tratament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FisaDeTratament $fisa_de_tratament)
    {
        $fisa_de_tratament->update($this->validateRequest($request));

        return redirect('/fise-de-tratament')->with('status', 'Fișa de tratament pentru pacientul "' . $fisa_de_tratament->nume . '" a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FisaDeTratament  $fisa_de_tratament
     * @return \Illuminate\Http\Response
     */
    public function destroy(FisaDeTratament $fisa_de_tratament)
    {
        $fisa_de_tratament->delete();
        return redirect('/fise-de-tratament')->with('status', 'Fișa de tratament pentru pacientul "' . $fisa_de_tratament->nume . '" a fost ștearsa cu succes!');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest(Request $request)
    {
        return request()->validate([
            'fisa_numar' => 'numeric|between:0,99999',
            'medic_curant' => 'nullable|max:100',
            'data' => 'nullable',
            'nume' => 'nullable|max:100',
            'varsta' => 'nullable|numeric|integer|between:0,150',
            'sex' => 'nullable|max:1',
            'cnp' => 'nullable|numeric|integer|digits:13',
            'asigurare_medicala' => 'nullable|max:50',
            'oras' => 'nullable|max:50',
            'strada' => 'nullable|max:50',
            'numar' => 'nullable|max:50',
            'bloc' => 'nullable|max:50',
            'scara' => 'nullable|max:50',
            'apartament' => 'nullable|max:50',
            'sector' => 'nullable|max:50',
            'judet' => 'nullable|max:50',
            'telefon' => 'nullable|max:20',
            'ocupatie' => 'nullable|max:100',
            'loc_de_munca' => 'nullable|max:100',
            'status_dentar_grupa' => 'nullable|max:50',
            'status_dentar_11' => 'nullable|max:500',
            'status_dentar_12' => 'nullable|max:500',
            'status_dentar_13' => 'nullable|max:500',
            'status_dentar_14' => 'nullable|max:500',
            'status_dentar_15' => 'nullable|max:500',
            'status_dentar_16' => 'nullable|max:500',
            'status_dentar_17' => 'nullable|max:500',
            'status_dentar_18' => 'nullable|max:500',
            'status_dentar_21' => 'nullable|max:500',
            'status_dentar_22' => 'nullable|max:500',
            'status_dentar_23' => 'nullable|max:500',
            'status_dentar_24' => 'nullable|max:500',
            'status_dentar_25' => 'nullable|max:500',
            'status_dentar_26' => 'nullable|max:500',
            'status_dentar_27' => 'nullable|max:500',
            'status_dentar_28' => 'nullable|max:500',
            'status_dentar_31' => 'nullable|max:500',
            'status_dentar_32' => 'nullable|max:500',
            'status_dentar_33' => 'nullable|max:500',
            'status_dentar_34' => 'nullable|max:500',
            'status_dentar_35' => 'nullable|max:500',
            'status_dentar_36' => 'nullable|max:500',
            'status_dentar_37' => 'nullable|max:500',
            'status_dentar_38' => 'nullable|max:500',
            'status_dentar_41' => 'nullable|max:500',
            'status_dentar_42' => 'nullable|max:500',
            'status_dentar_43' => 'nullable|max:500',
            'status_dentar_44' => 'nullable|max:500',
            'status_dentar_45' => 'nullable|max:500',
            'status_dentar_46' => 'nullable|max:500',
            'status_dentar_47' => 'nullable|max:500',
            'status_dentar_48' => 'nullable|max:500',
            'status_dentar_51' => 'nullable|max:500',
            'status_dentar_52' => 'nullable|max:500',
            'status_dentar_53' => 'nullable|max:500',
            'status_dentar_54' => 'nullable|max:500',
            'status_dentar_55' => 'nullable|max:500',
            'status_dentar_61' => 'nullable|max:500',
            'status_dentar_62' => 'nullable|max:500',
            'status_dentar_63' => 'nullable|max:500',
            'status_dentar_64' => 'nullable|max:500',
            'status_dentar_65' => 'nullable|max:500',
            'status_dentar_71' => 'nullable|max:500',
            'status_dentar_72' => 'nullable|max:500',
            'status_dentar_73' => 'nullable|max:500',
            'status_dentar_74' => 'nullable|max:500',
            'status_dentar_75' => 'nullable|max:500',
            'status_dentar_81' => 'nullable|max:500',
            'status_dentar_82' => 'nullable|max:500',
            'status_dentar_83' => 'nullable|max:500',
            'status_dentar_84' => 'nullable|max:500',
            'status_dentar_85' => 'nullable|max:500',
            'diagnostic_odontal' => 'nullable|max:500',
            'diagnostic_paradontal' => 'nullable|max:500',
            'diagnostic_edentatie' => 'nullable|max:500',
            'diagnostic_mucoasa' => 'nullable|max:500',
            'diagnostic_complex' => 'nullable|max:500',
            'plan_complex_tratament' => 'nullable|max:65000',
            'deviz_provizoriu' => 'nullable|max:65000',
            'observatii' => 'nullable|max:500',
        ]);
    }
}
