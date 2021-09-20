<?php

namespace App\Http\Controllers;

use App\Models\Pacient;
use Illuminate\Http\Request;

class PacientController extends Controller
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

        $pacienti = Pacient::
            when($search_nume, function ($query, $search_nume) {
                return $query->where('nume', 'like', '%' . $search_nume . '%');
            })
            ->when($search_telefon, function ($query, $search_telefon) {
                return $query->where('telefon', 'like', '%' . $search_telefon . '%');
            })
            ->latest()
            ->simplePaginate(25);

        return view('pacienti.index', compact('pacienti', 'search_nume', 'search_telefon'));
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
