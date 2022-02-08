@extends ('layouts.app')

@section('content')
<div class="container card" id="app1" style="border-radius: 40px 40px 40px 40px;">
    <div class="row card-header justify-content-between align-items-center" style="border-radius: 40px 40px 0px 0px;">
        <div class="col-lg-3">
            <h4 class="mb-0">
                <a href="programari">
                    <i class="fas fa-calendar-check me-1"></i>
                    Programări
                </a>
            </h4>
        </div>
        <div class="col-lg-6" id="app">
            <form class="needs-validation" novalidate method="GET" action="/programari/afisare-saptamanal">
                @csrf
                <div class="row mb-1 input-group custom-search-form justify-content-center align-items-center">
                    <div class="col-lg-4 d-flex">
                        <label for="search_data" class="mb-0 align-self-center me-1">Data:</label>
                        <vue2-datepicker
                            data-veche="{{ $search_data }}"
                            nume-camp-db="search_data"
                            tip="date"
                            value-type="YYYY-MM-DD"
                            format="DD-MM-YYYY"
                            :latime="{ width: '125px' }"
                        ></vue2-datepicker>
                    </div>
                    <div class="col-lg-4 d-grid gap-2">
                        <button class="btn btn-sm btn-primary text-white border border-dark rounded-3" type="submit">
                            <i class="fas fa-search text-white me-1"></i>Caută
                        </button>
                    </div>
                    <div class="col-lg-4 d-grid gap-2">
                        <a class="btn btn-sm btn-primary text-white border border-dark rounded-3" href="/programari/afisare-saptamanal" role="button">
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

        <div class="row d-flex justify-content-center">
            @for ($ziua = \Carbon\Carbon::parse($search_data->startOfWeek()); $ziua->lessThan($search_data->endOfWeek()->subDays(2)); $ziua->addDay())
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
                                <td class="d-flex">
                                    <div class="me-2">
                                        <span class="px-1 text-white rounded-3" style="background-color:darkcyan;">
                                            {{ $programare->ora ? \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') : '' }}
                                        </span>
                                    </div>
                                    <div>
                                        {{ $programare->fisa_de_tratament->nume }}
                                        <br>
                                        {{ $programare->fisa_de_tratament->telefon }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endfor
        </div>
    </div>
</div>

@endsection
