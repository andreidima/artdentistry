<?php

namespace App\Http\Controllers;

use App\Models\Programare;
use App\Models\Pacient;
use App\Models\Serviciu;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProgramareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_nume = \Request::get('search_nume');
        $search_data = \Request::get('search_data');

        $programari = Programare::with('pacient')
            ->when($search_nume, function (Builder $query, $search_nume) {
                $query->whereHas('pacient', function (Builder $query) use ($search_nume) {
                    $query->where('nume', 'like', '%' . $search_nume . '%');
                });
            })
            ->latest()
            ->simplePaginate(25);

        return view('programari.index', compact('programari', 'search_nume', 'search_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacienti = Pacient::orderBy('nume')->get();
        $servicii = Serviciu::orderBy('nume')->get();

        return view('programari.create', compact('pacienti', 'servicii'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programare = Programare::create($this->validateRequest($request));

        $programare->servicii()->attach($request->input('servicii_selectate'));

        return redirect('/programari')->with('status', 'Programarea pentru „' . ($programare->pacient->nume ?? '') . '” a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceFisa  $programare
     * @return \Illuminate\Http\Response
     */
    public function show(Programare $programare)
    {
        return view('programari.show', compact('programare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function edit(Programare $programare)
    {
        $pacienti = Pacient::orderBy('nume')->get();
        $servicii = Serviciu::orderBy('nume')->get();
        $servicii_curente_selectate = $programare->servicii->pluck('id')->toArray();

        return view('programari.edit', compact('programare', 'pacienti', 'servicii', 'servicii_curente_selectate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programare $programare)
    {
        $programare->update($this->validateRequest($request));

        $programare->servicii()->sync($request->input('servicii_selectate'));

        return redirect('/programari')->with('status', 'Programarea pentru „' . ($programare->pacient->nume ?? '') . '” a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programare $programare)
    {
        $programare->delete();
        $programare->servicii()->detach();
        return redirect('/programari')->with('status', 'Programarea pentru „' . ($programare->pacient->nume ?? '') . '” a fost ștearsă cu succes!');
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
                'pacient_id' => 'required',
                'data' => 'nullable',
                'ora_inceput' => 'nullable',
                'ora_sfarsit' => 'nullable',
                'pret_total' => 'nullable|numeric|between:0,9999|regex:/^\d*(\.\d{1,2})?$/',
                'observatii' => 'nullable|max:1000',
            ],
            [
                'pret.regex' => 'Prețul poate avea la partea zecimală maxim 2 cifre.',
            ]
        );
    }

    /**
     * Afisare Tabel
     *
     * @return array
     */
    protected function afisareTabel(Request $request)
    {
        $search_nume = \Request::get('search_nume');
        $search_data_inceput = \Request::get('search_data_inceput') ?? \Carbon\Carbon::now()->startOfWeek()->toDateString();
        $search_data_sfarsit = \Request::get('search_data_sfarsit') ?? \Carbon\Carbon::now()->endOfWeek()->toDateString();


        if (\Carbon\Carbon::parse($search_data_sfarsit)->diffInDays($search_data_inceput) > 35){
            return back()->with('error', 'Selectează te rog intervale mai mici de 35 de zile, pentru ca extragerea datelor din baza de date să fie eficientă!');
        }

        $pacienti = Pacient::with(['programare'=> function($query) use ($search_data_inceput, $search_data_sfarsit){
                $query->whereDate('data', '>=', $search_data_inceput)
                    ->whereDate('data', '<=', $search_data_sfarsit);
            }])
            ->when($search_nume, function ($query, $search_nume) {
                return $query->where('nume', 'like', '%' . $search_nume . '%');
            })
            ->orderBy('nume')
            ->paginate(10);

        return view('programari.index.tabel', compact('angajati', 'search_nume', 'search_data_inceput', 'search_data_sfarsit'));
    }
}
