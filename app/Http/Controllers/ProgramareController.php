<?php

namespace App\Http\Controllers;

use App\Models\Programare;
use App\Models\Pacient;
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

        return view('programari.create', compact('pacienti'));
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

        return back()->with('status', 'Programarea pentru "' . $programare->pacient->nume ?? '' . '" a fost adăugată cu succes!');
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

        return view('programare.edit', compact('programare', 'pacienti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceFisa  $fisaService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceFisa $fise)
    {
        // dd($request);
        $client = ServiceClient::where('id', $request->client_deja_inregistrat)->first();
        if (isset($client)){
            $client->update($this->validateRequestClient($request));
        } else {
            $client = ServiceClient::make($this->validateRequestClient($request));
            $client->save();
        }

        $fise->update($this->validateRequestFisa($request, $fise));
        $fise->update(['client_id' => $client->id]);

        $fise->servicii()->sync($request->input('servicii_selectate'));

        return redirect($fise->path())->with('status',
            'Fișa de service pentru clientul "' . ($fise->client->nume ?? '') . '", a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceFisa  $fisaService
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceFisa $fise)
    {
        $fise->delete();
        return redirect('/service/fise')->with('status', 'Fișa "' . $fise->nr_fisa . '" a fost ștearsă cu succes!');
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
                'pacient_id' => 'nullable',
                'data' => 'required',
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
}
