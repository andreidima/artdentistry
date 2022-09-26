@extends ('layouts.app')

@section('content')
<div class="container card" id="app" style="border-radius: 40px 40px 40px 40px;">
    <div class="row card-header justify-content-between align-items-center" style="border-radius: 40px 40px 0px 0px;">
        <div class="col-lg-3">
            <h4 class="mb-0">
                <a href="/programari/afisare-saptamanal">
                    <i class="fas fa-calendar-check me-1"></i>
                    Programări
                </a>
            </h4>
        </div>
        <div class="col-lg-6" id="app">
            <form class="needs-validation" novalidate method="GET" action="/programari/afisare-saptamanal">
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
                            *Selectează orice zi din săptămâna dorită
                        </small>
                    </div>
                    <div class="col-lg-4 d-grid gap-2">
                        <button class="btn btn-sm btn-primary text-white border border-dark rounded-3" type="submit">
                            <i class="fas fa-search text-white me-1"></i>Caută
                        </button>
                    </div>
                    <div class="col-lg-4 d-grid gap-2">
                        <a class="btn btn-sm btn-primary text-white border border-dark rounded-3" href="/cardiologie/programari/afisare-saptamanal" role="button">
                            <i class="far fa-trash-alt text-white me-1"></i>Resetează căutarea
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 text-end">
            <a class="btn btn-sm bg-success text-white border border-dark rounded-3 col-md-8" href="{{ route('cardiologie.programari.create') }}" role="button">
                <i class="fas fa-plus-square text-white me-1"></i>Adaugă programare
            </a>
        </div>
    </div>

    <div class="card-body px-0 py-3">

        @include ('errors')

        {{-- <div class="row d-flex justify-content-center">
            @for ($ziua = \Carbon\Carbon::parse($search_data->startOfWeek()); $ziua->lessThan($search_data->endOfWeek()->subDays(2)); $ziua->addDay())
                <div class="col-lg-2 px-0 table-responsive rounded">
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
                                            <div class="me-1">
                                                <span class="px-1 text-white rounded-3" style="background-color:darkcyan;">
                                                    {{ $programare->ora ? \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') : '' }}
                                                </span>
                                            </div>
                                            <div style="font-size:90%;">
                                                {{ $programare->fisa_de_tratament->nume ?? '' }}
                                                @if ($programare->fisa_de_tratament->telefon)
                                                    <br>
                                                    {{ $programare->fisa_de_tratament->telefon ?? ''}}
                                                @endif
                                                @if ($programare->notita)
                                                    <br>
                                                    {{ $programare->notita ?? ''}}
                                                @endif
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
                                                <span class="badge bg-warning px-1 text-dark">Etichete</span>
                                            </a>
                                            @if ($programare->fisa_de_tratament)
                                                <a href="{{ $programare->fisa_de_tratament->path() }}/modifica"
                                                    class=""
                                                >
                                                    <span class="badge bg-success px-1">Fișa de tratament</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endfor
        </div> --}}


        <div class="table-responsive rounded mb-4"  style="height: 90vh">
            <table class="table table-striped table-hover table-sm rounded table-bordered">
                <thead class="rounded" style="">
                    <tr class="text-white border border-0" style="background-color:#e66800; padding:2rem; position: sticky; top: 0px;">
                            <th>
                                Ora
                            </th>
                        @for ($ziua = \Carbon\Carbon::parse($search_data->startOfWeek()); $ziua->lessThan($search_data->endOfWeek()->subDays(2)); $ziua->addDay())
                            <th class="text-center rounded-3">
                                {{ ucfirst($ziua->dayName) }}
                                <br>
                                {{ $ziua->isoFormat('DD.MM') }}
                            </th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @for ($ora = (\Carbon\Carbon::parse($programari->min('ora'))->hour < 9 ? \Carbon\Carbon::parse($programari->min('ora'))->hour : 9); $ora <= (\Carbon\Carbon::parse($programari->max('ora'))->hour > 18 ? \Carbon\Carbon::parse($programari->max('ora'))->hour : 18) ; $ora ++)
                        <tr class="">
                            <td class="text-white" style="background-color:#e66800;">
                                {{ $ora }}:00
                            </td>
                            @for ($ziua = \Carbon\Carbon::parse($search_data->startOfWeek()); $ziua->lessThan($search_data->endOfWeek()->subDays(2)); $ziua->addDay())
                            <td class="p-0 border border-2 border-dark">
                                @foreach ($programari->where('data', $ziua->todatestring())->whereBetween('ora', [$ora, $ora]) as $programare)
                                    @if (!$loop->last)
                                        <div class="row p-0 m-0 border-bottom border-2 border-dark">
                                    @else
                                        <div class="row p-0 m-0">
                                    @endif
                                            <div class="col-12 py-0 px-1 d-flex">
                                                <div class="me-1">
                                                    <span class="px-1 text-white rounded-3" style="background-color:darkcyan;">
                                                        {{ $programare->ora ? \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') : '' }}
                                                    </span>
                                                </div>
                                                <div style="font-size:90%; line-height:1.2;">
                                                    {{ $programare->nume ?? '' }}
                                                    @if ($programare->telefon)
                                                        <br>
                                                        {{ $programare->telefon ?? ''}}
                                                    @endif
                                                    @if ($programare->notita)
                                                        <br>
                                                        ({{ $programare->notita ?? ''}})
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 py-0 px-1 d-flex justify-content-end">
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
                                            <div class="col-12 py-0 px-1 d-flex justify-content-end">
                                                {{-- <a href="/programari/etichete/{{ $programare->id }}"
                                                    class="flex me-1"
                                                >
                                                    <span class="badge bg-warning px-1 text-dark">Etichete</span>
                                                </a>
                                                @if ($programare->fisa_de_tratament)
                                                    <a href="{{ $programare->fisa_de_tratament->path() }}/modifica"
                                                        class=""
                                                    >
                                                        <span class="badge bg-success px-1">Fișa de tratament</span>
                                                    </a>
                                                @endif --}}
                                            </div>
                                        </div>
                                @endforeach
                            </td>
                            @endfor
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>



    </div>
</div>

    {{-- Modalele pentru stergere programare --}}
    @foreach ($programari as $programare)
        <div class="modal fade text-dark" id="stergeProgramare{{ $programare->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Programare: <b>{{ $programare->nume ?? '' }}</b></h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align:left;">
                    Ești sigur ca vrei să ștergi Programarea?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Renunță</button>

                    <form method="POST" action="{{ $programare->path() }}">
                        @method('DELETE')
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-danger text-white"
                            >
                            Șterge Programare
                        </button>
                    </form>

                </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
