<?php

namespace App\Http\Controllers;

use App\Models\Eticheta;
use Illuminate\Http\Request;

class EtichetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_cod_de_bare = \Request::get('search_cod_de_bare');

        $etichete = Eticheta::with('programare')
            ->when($search_cod_de_bare, function ($query, $search_cod_de_bare) {
                return $query->whereDate('data', '=', $search_cod_de_bare);
            })
            ->latest()
            ->simplePaginate(25);

        return view('etichete.index', compact('etichete', 'search_cod_de_bare'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('etichete.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eticheta = Eticheta::create($this->validateRequest($request));

        return redirect('/etichete')
            ->with('status', 'Eticheta a fost adăugată cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eticheta  $eticheta
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Programare $eticheta)
    {
        return view('etichete.show', compact('eticheta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eticheta  $eticheta
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Eticheta  $eticheta)
    {
        return view('etichete.edit', compact('eticheta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eticheta  $eticheta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eticheta  $eticheta)
    {
        $eticheta->update($this->validateRequest($request));

        return redirect('/etichete')
            ->with('status', 'Eticheta a fost modificată cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eticheta  $eticheta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Eticheta  $eticheta)
    {
        if ($eticheta->programare){
            return back()->with('error', 'Eticheta nu poate fi ștearsă pentru că este asociată programării din data de
                „' . ($eticheta->programare->data ? Carbon::parse($eticheta->programare->data)->isoFormat('DD.MM.YYYY') : '') . '",
                a pacientului „' . ($eticheta->programare->fisa_de_tratament->nume ?? '') . '”.
                Eliminați mai întâi asocierea.');
        }

        $eticheta->delete();

        return back()->with('status', 'Eticheta a fost ștearsă cu succes!');
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest(Request $request)
    {
        $request->request->add(['user_id' => $request->user()->id]);

        return request()->validate(
            [
                'cod_de_bare' => 'required',
                'operator' => 'required|max:500',
                'data' => 'required',
            ],
            [
            ]
        );
    }

    public function pdfExportBarcode(Request $request, Eticheta $eticheta)
    {
        if ($request->view_type === 'barcode-html') {
            return view('etichete.export.barcode-pdf', compact('eticheta'));
        } elseif ($request->view_type === 'barcode-pdf') {
            $pdf = \PDF::loadView('etichete.export.barcode-pdf', compact('eticheta'))
                ->setPaper('a7', 'landscape');
            // return $pdf->download('Eticheta ' . $eticheta->cod_de_bare . '.pdf');
            return $pdf->stream();
        }
    }
}
