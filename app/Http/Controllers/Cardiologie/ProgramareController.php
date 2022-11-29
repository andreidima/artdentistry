<?php

namespace App\Http\Controllers\Cardiologie;
use App\Http\Controllers\Controller;

use App\Models\Cardiologie\Programare;
use App\Models\Cardiologie\ProgramareIstoric;
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
        $search_nume = \Request::get('search_nume');
        $search_data = \Request::get('search_data');

        $programari = Programare::
            when($search_nume, function (Builder $query, $search_nume) {
                $query->where('nume', 'like', '%' . $search_nume . '%');
            })
            ->when($search_data, function ($query, $search_data) {
                return $query->whereDate('data', $search_data);
            })
            ->latest()
            ->simplePaginate(25);

        $request->session()->forget('cardiologie_programare_return_url');

        return view('cardiologie.programari.index', compact('programari', 'search_nume', 'search_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        return view('cardiologie.programari.create');
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

        // Salvare in istoric
        $programare_istoric = new ProgramareIstoric;
        $programare_istoric->fill($programare->makeHidden(['created_at', 'updated_at', 'deleted_at'])->attributesToArray());
        $programare_istoric->operatie = 'Adaugare';
        $programare_istoric->operatie_user_id = auth()->user()->id ?? null;
        $programare_istoric->save();

        // Trimitere Sms la inregistrare programare
        $mesaj = 'Programarea pentru ' . $programare->nume . ' a fost inregistrata. ' .
                    'Va asteptam la cabinet in data de ' . \Carbon\Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') .
                    ', la ora ' . \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') . '. ' .
                    'Cu stima, ArtDentistry!';
        $this->trimiteSms('Programari Cardiologie', 'Inregistrare', $programare->id, [$request->telefon], $mesaj);

        return redirect($request->session()->get('cardiologie_programare_return_url') ?? ('cardiologie/programari/afisare-saptamanal'))
            ->with('status', 'Programarea pentru „' . ($programare->nume ?? '') . '” a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Programare $programare)
    {
        $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        return view('cardiologie.programari.show', compact('programare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programare  $programare
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Programare $programare)
    {
        $request->session()->get('cardiologie_programare_return_url') ?? $request->session()->put('cardiologie_programare_return_url', url()->previous());

        return view('cardiologie.programari.edit', compact('programare'));
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
        // Daca data programarii se modifica la minim 2 zile peste ziua curenta, se sterge confirmarea
        if ( (Carbon::today()->diffInDays(Carbon::parse($request->data), false)) >= 2 ){
            $request->request->add(['confirmare' => null]);
        }

        $programare->update($this->validateRequest($request));

        // Salvare in istoric
        $programare_istoric = new ProgramareIstoric;
        $programare_istoric->fill($programare->makeHidden(['created_at', 'updated_at', 'deleted_at'])->attributesToArray());
        $programare_istoric->operatie = 'Modificare';
        $programare_istoric->operatie_user_id = auth()->user()->id ?? null;
        $programare_istoric->save();

        // Trimitere Sms la modificare programare
        if ($programare->wasChanged(['nume', 'telefon', 'data', 'ora'])) {
            $mesaj = 'Programarea pentru ' . $programare->nume . ' a fost modificata. ' .
                        'Va asteptam la cabinet in data de ' . \Carbon\Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') .
                        ', la ora ' . \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') . '. ' .
                        'Cu stima, ArtDentistry!';
            $this->trimiteSms('Programari Cardiologie', 'Modificare', $programare->id, [$programare->telefon], $mesaj);
        }

        return redirect($request->session()->get('cardiologie_programare_return_url') ?? ('cardiologie/programari/afisare-saptamanal'))
            ->with('status', 'Programarea pentru „' . ($programare->nume ?? '') . '” a fost modificată cu succes!');
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
        $programare_istoric->fill($programare->makeHidden(['created_at', 'updated_at', 'deleted_at'])->attributesToArray());
        $programare_istoric->operatie = 'Stergere';
        $programare_istoric->operatie_user_id = auth()->user()->id ?? null;
        $programare_istoric->save();

        return back()->with('status', 'Programarea pentru „' . ($programare->nume ?? '') . '” a fost ștearsă cu succes!');
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

        $request = request()->validate(
            [
                'nume' => 'nullable|max:500',
                'telefon' => 'nullable|max:500',
                'data' => 'required',
                'ora' => 'required',
                'notita' => 'nullable|max:500',
                'semnatura' => 'nullable',
                'observatii' => 'nullable|max:2000',
                'gdpr' => 'required_with:semnatura',
                'covid_19' => 'required_with:semnatura',
                'user_id' => '',
                'confirmare' => '',
                'cheie_unica' => '',
            ],
            [
            ]
        );

        $request = \array_diff_key($request, ['gdpr' => '', 'covid_19' => '']);

        return $request;
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

        $programari = Programare::
            whereDate('data', '>=', $data_de_cautat->startOfWeek())
            ->whereDate('data', '<=', $data_de_cautat->endOfWeek())
            ->orderBy('ora')
            ->get();

        $request->session()->forget('cardiologie_programare_return_url');

        return view('cardiologie.programari.afisareSaptamanal', compact('programari', 'search_data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afisareLunar(Request $request)
    {
        $search_data = $request->search_data ? Carbon::parse($request->search_data) : Carbon::today();
        $data_de_cautat = Carbon::parse($search_data);

        $programari = Programare::
            whereDate('data', '>=', $data_de_cautat->startOfMonth())
            ->whereDate('data', '<=', $data_de_cautat->endOfMonth())
            ->orderBy('ora')
            ->get();

        $request->session()->forget('cardiologie_programare_return_url');

        return view('cardiologie.programari.afisareLunar', compact('programari', 'search_data'));
    }
}
