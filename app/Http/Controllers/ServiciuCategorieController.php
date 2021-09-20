<?php

namespace App\Http\Controllers;

use App\Models\ServiciuCategorie;

use Illuminate\Http\Request;

class ServiciuCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_nume = \Request::get('search_nume');

        $categorii = ServiciuCategorie::with('servicii')
            ->when($search_nume, function ($query, $search_nume) {
                return $query->where('nume', 'like', '%' . $search_nume . '%');
            })
            ->where('serviciu_id', 0) // serviciile cu serviciu_id = 0 sunt categoriile primare
            ->latest()
            ->simplePaginate(25);

        return view('servicii_categorii.index', compact('categorii', 'search_nume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorii = Serviciu::where('serviciu_id', 0)->orderBy('nume')->get();

        return view('servicii.create', compact('categorii'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviciu = Serviciu::create($this->validateRequest($request));

        return redirect('/servicii')->with('status', 'Serviciul "' . $serviciu->nume . '" a fost adăugat cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serviciu  $serviciu
     * @return \Illuminate\Http\Response
     */
    public function show(Serviciu $serviciu)
    {
        return view('servicii.show', compact('serviciu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serviciu  $serviciu
     * @return \Illuminate\Http\Response
     */
    public function edit(Serviciu $serviciu)
    {
        $categorii = Serviciu::where('serviciu_id', 0)->orderBy('nume')->get();

        return view('servicii.edit', compact('serviciu', 'categorii'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serviciu  $serviciu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serviciu $serviciu)
    {
        $serviciu->update($this->validateRequest($request));

        return redirect('/servicii')->with('status', 'Serviciul "' . $serviciu->nume . '" a fost modificat cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serviciu  $serviciu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serviciu $serviciu)
    {
        $serviciu->delete();
        return redirect('/servicii')->with('status', 'Serviciul "' . $serviciu->nume . '" a fost șters cu succes!');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest(Request $request)
    {
        return request()->validate(
            [
                'serviciu_id' => 'nullable',
                'nume' => 'max:200',
                'pret' => 'nullable|numeric|between:0,9999|regex:/^\d*(\.\d{1,2})?$/',
                'adresa' => 'nullable|max:200',
                'descriere' => 'nullable|max:1000',
                'observatii' => 'nullable|max:1000',
            ],
            [
                'pret.regex' => 'Prețul poate avea la partea zecimală maxim 2 cifre.',
            ]
        );
    }
}
