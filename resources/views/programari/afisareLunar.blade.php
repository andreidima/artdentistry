@extends ('layouts.app')

@section('content')
<div class="container card" style="border-radius: 40px 40px 40px 40px;">
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
        <div class="table-responsive rounded mb-4" style="height: 90vh">
            <table class="table table-striped table-hover table-sm rounded table-bordered">
                <thead class="text-white rounded" style="">
                    <tr class="" style="background-color:#e66800; padding:2rem; position: sticky; top: 0; z-index: 1;">
                        <th class="px-3 text-center" style="">Ora</th>
                        @for ($ziua = 1; $ziua <= \Carbon\Carbon::parse($search_data)->endOfMonth()->day; $ziua++)
                            @if (\Carbon\Carbon::parse($search_data)->startOfMonth()->addDays($ziua-1)->isWeekday())
                                <th class="px-0 text-center" style="">
                            @else
                                <th class="px-0 text-center" style="background-color: darkcyan; ">
                            @endif
                                    {{ ucfirst(\Carbon\Carbon::parse($search_data)->startOfMonth()->addDays($ziua-1)->minDayName) }}
                                    <br>
                                    {{ $ziua }}
                            </th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @for ($ora = 8; $ora <=20; $ora++)
                    @php
                        // $ora = \Carbon\Carbon::today()->addHours($ora);
                        // dd(\Carbon\Carbon::today()->addHours($ora)->toTimeString(), \Carbon\Carbon::today()->addHours($ora)->endOfHour()->toTimeString());
                        // $programari_per_ora = $programari->whereBetween('ora', [$ora . ':00:00' , $ora . ':59:59']);
                        $programari_per_ora = $programari->whereBetween('ora', [\Carbon\Carbon::today()->addHours($ora)->toTimeString() , \Carbon\Carbon::today()->addHours($ora)->endOfHour()->toTimeString()]);
                    @endphp
                        <tr>
                            <td class="px-0 py-0 text-start text-white" style="background-color:#e66800; position: sticky; left: 0;">
                                <b>{{ $ora }}:00</b>
                            </td>
                                @for ($ziua = 1; $ziua <= \Carbon\Carbon::parse($search_data)->endOfMonth()->day; $ziua++)
                                    @if (\Carbon\Carbon::parse($search_data)->startOfMonth()->addDays($ziua-1)->isWeekday())
                                        <td class="px-0 py-0 text-start">
                                    @else
                                        <td class="px-0 py-0 text-start" style="background-color: darkcyan">
                                    @endif
                                            @foreach ($programari_per_ora->where('data', \Carbon\Carbon::parse($search_data)->startOfMonth()->addDays($ziua-1)->format('Y-m-d')) as $programare)
                                                {{-- @if (!$loop->first)
                                                    <br>
                                                @endif --}}
                                                <div class="mb-2" style="line-height:1;">
                                                    <small style="white-space: nowrap;">
                                                        <b>
                                                            {{ \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') }}
                                                        </b>
                                                        <a href="{{ $programare->path() }}/modifica">
                                                            {{ $programare->fisa_de_tratament->nume }}
                                                        </a>
                                                    </small>
                                                    @if ($programare->notita)
                                                        <small>
                                                            ({{ $programare->notita ?? ''}})
                                                        </small>
                                                    @endif
                                                </div>
                                                {{-- @if ($programare->notita) --}}
                                                    {{-- <br>
                                                    <div class="ms-0 mb-0">
                                                        {{ $programare->notita ?? ''}}
                                                    </div> --}}
                                                {{-- @endif --}}
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

@endsection
