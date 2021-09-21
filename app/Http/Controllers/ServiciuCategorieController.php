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

        $servicii_categorii = ServiciuCategorie::with('servicii')
            ->when($search_nume, function ($query, $search_nume) {
                return $query->where('nume', 'like', '%' . $search_nume . '%');
            })
            ->where('serviciu_id', 0) // serviciile cu serviciu_id = 0 sunt categoriile primare
            ->latest()
            ->simplePaginate(25);

        return view('servicii_categorii.index', compact('servicii_categorii', 'search_nume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicii_categorii.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviciu_categorie = ServiciuCategorie::create($this->validateRequest($request));

        return redirect('/servicii-categorii')->with('status', 'Categoria "' . $serviciu_categorie->nume . '" a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiciuCategorie  $serviciu_categorie
     * @return \Illuminate\Http\Response
     */
    public function show(ServiciuCategorie $serviciu_categorie)
    {
        return view('servicii_categorii.show', compact('serviciu_categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiciuCategorie  $serviciu_categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiciuCategorie $serviciu_categorie)
    {
        return view('servicii_categorii.edit', compact('serviciu_categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiciuCategorie  $serviciu_categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiciuCategorie $serviciu_categorie)
    {
        $serviciu_categorie->update($this->validateRequest($request));

        return redirect('/servicii-categorii')->with('status', 'Categoria "' . $serviciu_categorie->nume . '" a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiciuCategorie  $serviciu_categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiciuCategorie $serviciu_categorie)
    {
        if (count($serviciu_categorie->servicii)){
            return back()->with('error', 'Categoria „' . $serviciu_categorie->nume . '” nu poate fi ștearsă pentru că are servicii atașate! Mai întâi este nevoie să ștergeți sau să mutați serviciile la altă categorie!');
        }
        $serviciu_categorie->delete();
        return redirect('/servicii-categorii')->with('status', 'Categoria „' . $serviciu_categorie->nume . '” a fost ștearsă cu succes!');
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
