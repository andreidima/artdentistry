<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Reteta;
use App\Models\RetetaMedicament;

class RetetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->forget(['retetaReturnUrl']);

        $searchPacient = $request->searchPacient;
        $searchData = $request->searchData;

        $retete = Reteta::
            when($searchPacient, function ($query, $searchPacient) {
                $query->where('pacient_nume', 'like', '%' . $searchPacient . '%');
            })
            ->when($searchData, function ($query, $searchData) {
                return $query->whereDate('data', $searchData);
            })
            ->latest()
            ->simplePaginate(25);

        return view('retete.index', compact('retete', 'searchPacient', 'searchData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $reteta = new Reteta;
        $reteta->data = Carbon::now();
        $reteta->pacient_localitate = "Focșani";

        $request->session()->get('retetaReturnUrl') ?? $request->session()->put('retetaReturnUrl', url()->previous());

        return view('retete.create', compact('reteta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $reteta = Reteta::make($request->except(['date', 'medicamente']));
        $reteta->unitate_sanitara_denumire = 'Clinica medicală „Art Dentistry” Focșani';
        // $reteta->unitate_sanitara_cif_j = 'CIF 36993096 / J39/58/2017';
        $reteta->unitate_sanitara_adresa = 'Str. Ștefan cel Mare, nr.14, bl.14 B';
        $reteta->unitate_sanitara_telefon = '0337.40.45.19 / 0766.63.63.62';
        $reteta->serie = "ART";
        $reteta->numar = (Reteta::latest()->first()->numar ?? 0) + 1;
        $reteta->medic_nume = 'Dr. Vlad Hanță';
        $reteta->save();

        foreach ($request->medicamente as $medicament) {
            $reteta->medicamente()->save(RetetaMedicament::make($medicament));
        }

        return redirect($request->session()->get('retetaReturnUrl') ?? ('/retete'))->with('status', 'Rețeta pentru pacientul „' . ($reteta->pacient_nume ) . '” a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reteta  $reteta
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Reteta $reteta)
    {
        $request->session()->get('retetaReturnUrl') ?? $request->session()->put('retetaReturnUrl', url()->previous());

        return view('retete.show', compact('reteta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reteta  $reteta
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Reteta $reteta)
    {
        $request->session()->get('retetaReturnUrl') ?? $request->session()->put('retetaReturnUrl', url()->previous());

        return view('retete.edit', compact('reteta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reteta  $reteta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reteta $reteta)
    {
        $this->validateRequest($request);

        $reteta->update($request->except(['date', 'medicamente']));

        RetetaMedicament::where('reteta_id', $reteta->id)->whereNotIn('id', array_filter(array_column($request->medicamente , 'id')))->delete();
        foreach($request->medicamente as $medicament) {
            $medicamentDB = RetetaMedicament::firstOrNew(['id' => $medicament['id']]);
            $medicamentDB->fill($medicament);
            $reteta->medicamente()->save($medicamentDB);
        }

        return redirect($request->session()->get('retetaReturnUrl') ?? ('/retete'))->with('status', 'Rețeta pentru pacientul „' . ($reteta->pacient_nume ) . '” a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reteta  $reteta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reteta $reteta)
    {
        $reteta->delete();
        $reteta->medicamente()->delete();

        return back()->with('status', 'Rețeta pentru pacientul „' . ($reteta->pacient_nume ) . '” a fost ștearsă cu succes!');
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
                'pacient_nume' => 'required|max:250',
                'pacient_varsta' => 'nullable|numeric|between:1,100',
                'pacient_cnp' => 'nullable|digits:13',
                'pacient_adresa' => 'nullable|max:1000',
                'pacient_localitate' => 'nullable|max:250',
                'pacient_diagnostic' => 'nullable|max:250',
                'pacient_diagnostic_descriptiv' => 'nullable|max:1000',
                'data' => 'nullable',

                'medicamente' => 'required',
                // 'medicamente.*.reteta_id' => 'required',
                'medicamente.*.denumire' => 'required|max:1000',
                'medicamente.*.concentratie' => 'nullable|max:1000',
                'medicamente.*.forma_faramceutica' => 'nullable|max:1000',
                'medicamente.*.mod_administrare' => 'nullable|max:1000',
                'medicamente.*.cantitate' => 'nullable|max:1000',
                'medicamente.*.durata_tratament' => 'nullable|max:1000',

            ],
            [
                'medicamente.required' => 'Este obligatoriu să fie adăugat minim un medicament.',
                'medicamente.*.denumire.required' => 'Câmpul Denumire pentru medicamente este necesar.',
                'medicamente.*.denumire.max' => 'Câmpul Denumire pentru medicamente poate avea maxim 1000 de caractere.',
                'medicamente.*.concentratie.max' => 'Câmpul Concentrație pentru medicamente poate avea maxim 1000 de caractere.',
                'medicamente.*.forma_faramceutica.max' => 'Câmpul Forma farmaceutică pentru medicamente poate avea maxim 1000 de caractere.',
                'medicamente.*.mod_administrare.max' => 'Câmpul Mod administrare pentru medicamente poate avea maxim 1000 de caractere.',
                'medicamente.*.cantitate.max' => 'Câmpul Cantitate pentru medicamente poate avea maxim 1000 de caractere.',
                'medicamente.*.durata_tratament.max' => 'Câmpul Durată tratament pentru medicamente poate avea maxim 1000 de caractere.',
            ]
        );
    }

    public function exportPdf(Reteta $reteta)
    {
        $pdf = \PDF::loadView('retete.export.retetaPdf', compact('reteta'))
            ->setPaper('a4', 'portrait');
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->stream();
    }
}
