<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MesajTrimisSms;

class MesajTrimisSmsController extends Controller
{
    public function index()
    {
        $search_nume = \Request::get('search_nume');
        $search_telefon = \Request::get('search_telefon');

        $mesaje_sms = MesajTrimisSms::
            when($search_nume, function ($query, $search_nume) {
                return $query->where('mesaj', 'like', '%' . $search_nume . '%');
            })
            ->when($search_telefon, function ($query, $search_telefon) {
                return $query->where('telefon', 'like', '%' . $search_telefon . '%');
            })
            ->latest()
            ->simplePaginate(25);

        return view('mesajeTrimiseSms.index', compact('mesaje_sms', 'search_nume', 'search_telefon'));
    }
}
