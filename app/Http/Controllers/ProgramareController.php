<?php

namespace App\Http\Controllers;

use App\Models\Programare;
use App\Models\ProgramareIstoric;
use App\Models\FisaDeTratament;
use App\Models\Eticheta;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Builder;

use App\Traits\TrimiteSmsTrait;

class ProgramareController extends Controller
{
    use TrimiteSmsTrait;

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
        $request->session()->forget('fisa_de_tratament_return_url');

        return view('programari.index', compact('programari', 'search_numar', 'search_nume', 'search_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fise_de_tratament = FisaDeTratament::select('id', 'fisa_numar', 'nume')->orderBy('fisa_numar', 'desc')->get();

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

        // Daca nu se ataseaza programarea la o fisa de tratament deja existenta, se creaza acum fisa de tratament pentru client nou
        if (!$request->fisa_de_tratament_id){
            $fisa_de_tratament = FisaDeTratament::create(
                [
                    'fisa_numar' => FisaDeTratament::max('fisa_numar') + 1,
                    'nume' => $request->nume,
                    'telefon' => $request->telefon,
                    'user_id' => $request->user_id
                ]
            );
            $request->request->add(['fisa_de_tratament_id' => $fisa_de_tratament->id]);
        }

        $programare = Programare::create($request->except('nume', 'telefon', 'date', 'gdpr', 'covid_19', 'rezultateConsultatie', 'fisa_de_tratament_nume_autocomplete'));

        // Salvare in istoric
        $programare_istoric = new ProgramareIstoric;
        $programare_istoric->fill($programare->makeHidden(['created_at', 'updated_at'])->attributesToArray());
        $programare_istoric->operatie = 'Adaugare';
        $programare_istoric->operatie_user_id = auth()->user()->id ?? null;
        $programare_istoric->save();

        // Trimitere Sms la inregistrare programare
        // $mesaj = 'Programarea pentru ' . $request->nume . ' a fost inregistrata. ' .
        //             'Va asteptam la cabinet in data de ' . \Carbon\Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') .
        //             ', la ora ' . \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') . '. ' .
        //             'Cu stima, ArtDentistry!';
        $mesaj = 'Programarea dvs. a fost inregistrata. ' .
                    'Va asteptam la cabinet in data de ' . \Carbon\Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') .
                    ', la ora ' . \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') . '. ' .
                    'Cu stima, ArtDentistry! (Mesaj automat, nu raspundeti)';
        $this->trimiteSms('Programari', 'Inregistrare', $programare->id, [$request->telefon], $mesaj);

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
        // $programare_return_url = $request->session()->get('programare_return_url') ?? $request->session()->put('programare_return_url', url()->previous());

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
        $fise_de_tratament = FisaDeTratament::select('id', 'fisa_numar', 'nume')->orderBy('fisa_numar', 'desc')->get();

        $request->session()->get('programare_return_url') ?? $request->session()->put('programare_return_url', url()->previous());

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

        $this->validateRequest($request);

        // Daca nu se ataseaza programarea la o fisa de tratament deja existenta, se creaza acum fisa de tratament pentru client nou
        if (!$request->fisa_de_tratament_id){
            $fisa_de_tratament = FisaDeTratament::create(
                [
                    'nume' => $request->nume,
                    'telefon' => $request->telefon,
                    'user_id' => $request->user_id
                ]
            );
            $request->request->add(['fisa_de_tratament_id' => $fisa_de_tratament->id]);
        }

        // Daca data programarii se modifica, si daca se modifica la minim 2 zile peste ziua curenta, se sterge confirmarea
        if ( ($programare->data !== $request->data) && (Carbon::today()->diffInDays(Carbon::parse($request->data), false)) >= 2 ){
            $request->request->add(['confirmare' => null]);
        }

        $programare->update($request->except('nume', 'telefon', 'date', 'gdpr', 'covid_19', 'rezultateConsultatie', 'fisa_de_tratament_nume_autocomplete'));

        // Salvare in istoric
        $programare_istoric = new ProgramareIstoric;
        $programare_istoric->fill($programare->makeHidden(['created_at', 'updated_at'])->attributesToArray());
        $programare_istoric->operatie = 'Modificare';
        $programare_istoric->operatie_user_id = auth()->user()->id ?? null;
        $programare_istoric->save();

        // Trimitere Sms la modificare programare
        if (($programare->wasChanged(['fisa_de_tratament_id', 'data', 'ora'])) || (!$request->fisa_de_tratament_id)) {
            // $mesaj = 'Programarea pentru ' . $programare->fisa_de_tratament->nume . ' a fost modificata. ' .
            //             'Va asteptam la cabinet in data de ' . \Carbon\Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') .
            //             ', la ora ' . \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') . '. ' .
            //             'Cu stima, ArtDentistry!';
            $mesaj = 'Programarea pentru dvs. a fost modificata. ' .
                        'Va asteptam la cabinet in data de ' . \Carbon\Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') .
                        ', la ora ' . \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') . '. ' .
                        'Cu stima, ArtDentistry! (Mesaj automat, nu raspundeti).';
            $this->trimiteSms('Programari', 'Modificare', $programare->id, [$programare->fisa_de_tratament->telefon], $mesaj);
        }

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

        // Salvare in istoric
        $programare_istoric = new ProgramareIstoric;
        $programare_istoric->fill($programare->makeHidden(['created_at', 'updated_at'])->attributesToArray());
        $programare_istoric->operatie = 'Stergere';
        $programare_istoric->operatie_user_id = auth()->user()->id ?? null;
        $programare_istoric->save();

        return back()->with('status', 'Programarea pentru „' . ($programare->fisa_de_tratament->nume ?? '') . '” a fost ștearsă cu succes!');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest(Request $request)
    {
        // Se adauga doar la adaugare, iar la modificare nu se schimba
        if ($request->isMethod('post')) {
            $request->request->add(['user_id' => $request->user()->id]);
            $request->request->add(['cheie_unica' => uniqid()]);
        }

        return request()->validate(
            [
                'fisa_de_tratament_id' => 'nullable',
                'nume' => 'required_without:fisa_de_tratament_id',
                'telefon' => 'nullable',
                'data' => 'required',
                'ora' => 'required',
                'notita' => 'nullable|max:500',
                'tratament' => 'nullable|max:2000',
                'cod' => 'nullable|max:500',
                'semnatura' => 'nullable',
                'observatii' => 'nullable|max:2000',
                // 'gdpr' => ($request->_method !== "PATCH") ? '' : 'required',
                // 'covid_19' => ($request->_method !== "PATCH") ? '' : 'required',
                'gdpr' => 'required_with:semnatura',
                'covid_19' => 'required_with:semnatura',
                'user_id' => '',
                'confirmare' => '',
                'cheie_unica' => '',
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
        $search_data = $request->search_data ? Carbon::parse($request->search_data) : Carbon::today();
        $data_de_cautat = Carbon::parse($search_data);

        $programari = Programare::with('fisa_de_tratament')
            ->whereDate('data', '>=', $data_de_cautat->startOfWeek())
            ->whereDate('data', '<=', $data_de_cautat->endOfWeek())
            ->orderBy('ora')
            ->get();

        $request->session()->forget('programare_return_url');
        $request->session()->forget('fisa_de_tratament_return_url');

        return view('programari.afisareSaptamanal', compact('programari', 'search_data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afisareLunar(Request $request)
    {
        $search_data = \Request::get('search_data') ? \Carbon\Carbon::parse(\Request::get('search_data')) : \Carbon\Carbon::today();
        $data_de_cautat = \Carbon\Carbon::parse($search_data);

        $programari = Programare::with('fisa_de_tratament')
            ->whereDate('data', '>=', $data_de_cautat->startOfMonth())
            ->whereDate('data', '<=', $data_de_cautat->endOfMonth())
            ->orderBy('ora')
            ->get();

        $request->session()->forget('programare_return_url');
        $request->session()->forget('fisa_de_tratament_return_url');

        return view('programari.afisareLunar', compact('programari', 'search_data'));
    }

    public function etichete(Request $request, Programare $programare)
    {
        // dd($actiune);
        // echo 'Programare' . $programare . '<br>' . 'Eticheta' . $eticheta . '<br>' . 'Actiune' . $actiune;
        switch ($request->input('action')) {
            case 'adauga':
                $etichetaId = Eticheta::where('cod_de_bare', $request->codDeBare)->value('id');
                if(!isset($etichetaId)){
                    return back()->with('error', 'Acest cod de bare nu există în aplicație');
                } elseif ($programare->etichete()->find($etichetaId)){
                    return back()->with('error', 'Nu puteți adăuga din nou acestă etichetă! Programarea are deja adaugată eticheta.');
                } else {
                    $programare->etichete()->attach($etichetaId);
                    return back()->with('succes', 'Eticheta a fost adaugată cu succes Programării!');
                }
                echo 'adauga' . $request->codDeBare . '<br>';
                // dd($etichetaId);
                echo 'Id eticheta: ' . $etichetaId;
                break;
            case 'scoate':
                $programare->etichete()->detach($request->etichetaId);
                return back()->with('succes', 'Eticheta a fost scoasă cu succes de la acestă Programare!');
                echo 'scoate' . $request->etichetaId;
                break;
            }

        return view('programari.diverse.etichete', compact('programare'));
    }
}
