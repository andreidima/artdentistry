<?php

namespace App\Http\Controllers;

use App\Models\Programare;
use App\Models\FisaDeTratament;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;

class ProgramareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_numar = \Request::get('search_numar');
        $search_nume = \Request::get('search_nume');
        $search_data = \Request::get('search_data');

        $programari = Programare::with('fisa_de_tratament')
            ->when($search_numar, function (Builder $query, $search_numar) {
                $query->whereHas('fisa_de_tratament', function (Builder $query) use ($search_numar) {
                    $query->where('fisa_numar', $search_numar);
                });
            })
            ->when($search_nume, function (Builder $query, $search_nume) {
                $query->whereHas('fisa_de_tratament', function (Builder $query) use ($search_nume) {
                    $query->where('nume', 'like', '%' . $search_nume . '%');
                });
            })
            ->when($search_data, function ($query, $search_data) {
                return $query->whereDate('data', '=', $search_data);
            })
            ->latest()
            ->simplePaginate(25);

        $request->session()->forget('programare_return_url');

        return view('programari.index', compact('programari', 'search_numar', 'search_nume', 'search_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fise_de_tratament = FisaDeTratament::orderBy('fisa_numar')->get();

        $request->session()->get('programare_return_url') ?? $request->session()->put('programare_return_url', url()->previous());

        return view('programari.create', compact('fise_de_tratament'));
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

        if ($request->fisa_de_tratament){
            $programare = Programare::create($request->except('nume', 'telefon'));
        } else {
            $fisa_de_tratament = FisaDeTratament::create(
                [
                    'nume' => $request->nume,
                    'telefon' => $request->telefon
                ]
            );
            $programare = Programare::create($request->except('nume', 'telefon'),
                [
                    'fisa_de_tratament' => $fisa_de_tratament->id
                ]
            );
        }
        $programare = Programare::create($this->validateRequest($request));

        return redirect($request->session()->get('programare_return_url') ?? ('/programari/afisare-saptamanal'))
            ->with('status', 'Programarea pentru „' . ($programare->fisa_de_tratament->nume ?? '') . '” a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceFisa  $programare
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Programare $programare)
    {
        return view('programari.show', compact('programare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Programare $programare)
    {
        $fise_de_tratament = FisaDeTratament::orderBy('fisa_numar')->get();

        $request->session()->get('salariat_return_url') ?? $request->session()->put('salariat_return_url', url()->previous());

        return view('programari.edit', compact('programare', 'fise_de_tratament'));
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
        if(is_null($request->semnatura)){
            $request->request->remove('semnatura');
        }

        $programare->update($this->validateRequest($request));

        return redirect($request->session()->get('programare_return_url') ?? ('/programari/afisare-saptamanal'))
            ->with('status', 'Programarea pentru „' . ($programare->fisa_de_tratament->nume ?? '') . '” a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Programare $programare)
    {
        $programare->delete();

        return back()->with('status', 'Programarea pentru „' . ($programare->fisa_de_tratament->nume ?? '') . '” a fost ștearsă cu succes!');
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
                'fisa_de_tratament' => 'nullable',
                'nume' => 'required_without:fisa_de_tratament',
                'telefon' => 'nullable',
                'data' => 'nullable',
                'ora' => 'nullable',
                'evolutie_si_tratament' => 'nullable|max:500',
                'cod' => 'nullable|max:500',
                'semnatura' => 'nullable',
                'observatii' => 'nullable|max:1000',
            ],
            [
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afisareSaptamanal(Request $request)
    {
        $search_data = \Request::get('search_data') ? \Carbon\Carbon::parse(\Request::get('search_data')) : \Carbon\Carbon::today();
        $data_de_cautat = \Carbon\Carbon::parse($search_data);

        $programari = Programare::with('fisa_de_tratament')
            ->whereDate('data', '>=', $data_de_cautat->startOfWeek())
            ->whereDate('data', '<=', $data_de_cautat->endOfWeek())
            ->orderBy('ora')
            ->get();

        $request->session()->forget('programare_return_url');

        return view('programari.afisareSaptamanal', compact('programari', 'search_data'));
    }
}
