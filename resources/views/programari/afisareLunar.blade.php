@extends ('layouts.app')

@section('content')
<div class="container card" id="app1" style="border-radius: 40px 40px 40px 40px;">
    <div class="row card-header justify-content-between align-items-center" style="border-radius: 40px 40px 0px 0px;">
        <div class="col-lg-3">
            <h4 class="mb-0">
                <a href="/programari/afisare-lunar">
                    <i class="fas fa-calendar-check me-1"></i>
                    Programări
                </a>
            </h4>
        </div>
        <div class="col-lg-6" id="app">
            <form class="needs-validation" novalidate method="GET" action="/programari/afisare-lunar">
                @csrf
                <div class="row mb-1 input-group custom-search-form justify-content-center align-items-center">
                    <div class="col-lg-12 mb-1 d-flex justify-content-center">
                        <label for="search_data" class="mb-0 align-self-center me-1">Data:</label>
                        <vue2-datepicker
                            data-veche="{{ $search_data }}"
                            nume-camp-db="search_data"
                            tip="date"
                            value-type="YYYY-MM-DD"
                            format="DD-MM-YYYY"
                            :latime="{ width: '125px' }"
                            style="margin-right: 20px;"
                        ></vue2-datepicker>
                        <small class="align-self-center">
                            *Selectează orice zi din luna dorită
                        </small>
                    </div>
                    <div class="col-lg-4 d-grid gap-2">
                        <button class="btn btn-sm btn-primary text-white border border-dark rounded-3" type="submit">
                            <i class="fas fa-search text-white me-1"></i>Caută
                        </button>
                    </div>
                    <div class="col-lg-4 d-grid gap-2">
                        <a class="btn btn-sm btn-primary text-white border border-dark rounded-3" href="/programari/afisare-lunar" role="button">
                            <i class="far fa-trash-alt text-white me-1"></i>Resetează căutarea
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 text-end">
            <a class="btn btn-sm bg-success text-white border border-dark rounded-3 col-md-8" href="{{ route('programari.create') }}" role="button">
                <i class="fas fa-plus-square text-white me-1"></i>Adaugă programare
            </a>
        </div>
    </div>

    <div class="card-body px-0 py-3">

        @include ('errors')

        {{-- <div class="row d-flex justify-content-center"> --}}
            {{-- @for ($ziua = \Carbon\Carbon::parse($search_data->startOfWeek()); $ziua->lessThan($search_data->endOfWeek()->subDays(2)); $ziua->addDay())
                <div class="col-lg-2 table-responsive rounded">
                    <table class="table table-striped table-hover table-sm rounded">
                        <thead class="text-white rounded-3" style="background-color:#e66800;">
                            <tr class="" style="padding:2rem">
                                <th class="text-center rounded-3">
                                    {{ \Carbon\Carbon::parse($ziua)->dayName }}
                                    <br>
                                    {{ \Carbon\Carbon::parse($ziua)->isoFormat('DD.MM.YYYY') }}
                                </th>
                            </tr>
                        </thead>
                        @foreach ($programari->where('data', \Carbon\Carbon::parse($ziua)->isoformat('YYYY-MM-DD')) as $programare)
                            <tr>
                                <td class="border border-2 border-dark">
                                    <div class="row">
                                        <div class="col-12 d-flex">
                                            <div class="me-2">
                                                <span class="px-1 text-white rounded-3" style="background-color:darkcyan;">
                                                    {{ $programare->ora ? \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') : '' }}
                                                </span>
                                            </div>
                                            <div>
                                                {{ $programare->fisa_de_tratament->nume ?? '' }}
                                                <br>
                                                {{ $programare->fisa_de_tratament->telefon ?? ''}}
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <a href="{{ $programare->path() }}/modifica"
                                                class="flex me-1"
                                            >
                                                <span class="badge bg-primary">Modifică</span>
                                            </a>
                                            <div style="flex" class="">
                                                <a
                                                    href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#stergeProgramare{{ $programare->id }}"
                                                    title="Șterge Programare"
                                                    >
                                                    <span class="badge bg-danger">Șterge</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <a href="/programari/etichete/{{ $programare->id }}"
                                                class="flex me-1"
                                            >
                                                <span class="badge bg-warning text-dark">Etichete</span>
                                            </a>
                                            @if ($programare->fisa_de_tratament)
                                                <a href="{{ $programare->fisa_de_tratament->path() }}/modifica"
                                                    class=""
                                                >
                                                    <span class="badge bg-success">Fișa de tratament</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endfor --}}


        <div class="table-responsive rounded mb-4">
            <table class="table table-striped table-hover table-sm rounded table-bordered">
                <thead class="text-white rounded" style="background-color:#e66800;">
                    <tr class="" style="padding:2rem">
                        <th style="min-width: 50px;">#</th>
                        <th style="min-width: 170px;">Nume</th>
                        @for ($ziua = 0; $ziua <= \Carbon\Carbon::parse($search_data_sfarsit)->diffInDays($search_data_inceput); $ziua++)
                            <th class="text-center" style="min-width: 120px;">
                                {{ \Carbon\Carbon::parse($search_data_inceput)->addDays($ziua)->isoFormat('DD.MM.YYYY') }}
                            </th>
                        @endfor
                        {{-- <th class="text-center" style="min-width: 120px;">
                            Total
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($angajati as $angajat)
                        {{-- @php
                            $timp_total = \Carbon\Carbon::today();
                        @endphp --}}
                        <tr>
                            <td style="">
                                {{ $loop->iteration }}
                            </td>
                            <td style="">
                                <div class="px-2"
                                style="
    position: absolute;
    display: inline-block;
    width: 160px;
    background-color:#e66800;
    color:white;
    "
    >
                                    {{ $angajat->nume ?? '' }}
                                </div>
                            </td>

                            @for ($ziua = 0; $ziua <= \Carbon\Carbon::parse($search_data_sfarsit)->diffInDays($search_data_inceput); $ziua++)
                                <td class="text-center">
                                    {{-- @if (\Carbon\Carbon::parse($search_data_inceput)->addDays($ziua)->isWeekday()) --}}
                                        @forelse ($angajat->pontaj->where('data', \Carbon\Carbon::parse($search_data_inceput)->addDays($ziua)->toDateString()) as $pontaj)
                                            <a href="/pontaje/{{ $pontaj->id }}/modifica" style="text-decoration: none;">
                                                @switch($pontaj->concediu)
                                                    @case(0)
                                                        @if ($pontaj->ora_sosire && $pontaj->ora_plecare)




        </div>
    </div>
</div>

@endsection
