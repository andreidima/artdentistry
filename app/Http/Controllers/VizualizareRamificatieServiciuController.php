<?php

namespace App\Http\Controllers;

use App\Models\ServiciuCategorie;

use Illuminate\Http\Request;

class VizualizareRamificatieServiciuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vizualizareRamificatieServiciu()
    {
        $servicii_categorii = ServiciuCategorie::with('servicii')
            ->where('serviciu_id', 0) // serviciile cu serviciu_id = 0 sunt categoriile primare
            ->orderBy('nume')
            ->simplePaginate(25);

        return view('vizualizare_ramificatii_servicii.index', compact('servicii_categorii'));
    }
}
