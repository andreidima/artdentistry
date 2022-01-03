<?php

namespace App\Http\Controllers;

use App\Models\FisaDeTratament;
use Illuminate\Http\Request;

class ProgramareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afisareSaptamanal()
    {
        $search_data = \Request::get('search_data') ? \Carbon\Carbon::parse(\Request::get('search_data')) : \Carbon\Carbon::today();
        $data_de_cautat = \Carbon\Carbon::parse($search_data);

        $fise = FisaDeTratament::
            whereDate('data', '>=', $data_de_cautat->startOfWeek())
            ->whereDate('data', '<=', $data_de_cautat->endOfWeek())
            ->orderBy('ora')
            ->get();
// dd($data_de_cautat->startOfWeek(), $data_de_cautat->endOfWeek(), $fise);
        return view('programari.afisareSaptamanal', compact('fise', 'search_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacienti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pacient = Pacient::create($this->validateRequest($request));

        return redirect('/pacienti')->with('status', 'Pacientul "' . $pacient->nume . '" a fost adăugat cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacient  $pacient
     * @return \Illuminate\Http\Response
     */
    public function show(Pacient $pacient)
    {
        return view('pacienti.show', compact('pacient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacient  $pacient
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacient $pacient)
    {
        return view('pacienti.edit', compact('pacient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pacient  $pacient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pacient $pacient)
    {
        $pacient->update($this->validateRequest($request));

        return redirect('/pacienti')->with('status', 'Pacientul "' . $pacient->nume . '" a fost modificat cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacient  $pacient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacient $pacient)
    {
        $pacient->delete();
        return redirect('/pacienti')->with('status', 'Pacientul "' . $pacient->nume . '" a fost șters cu succes!');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest(Request $request)
    {
        return request()->validate([
            'nume' => 'nullable|max:100',
            'telefon' => 'nullable|max:20',
            'email' => 'nullable|max:50',
            'adresa' => 'nullable|max:200',
            'observatii' => 'nullable|max:500',
        ]);
    }
}
