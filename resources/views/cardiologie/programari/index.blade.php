@extends ('layouts.app')

@section('content')
<div class="container card" style="border-radius: 40px 40px 40px 40px;">
        <div class="row card-header align-items-center" style="border-radius: 40px 40px 0px 0px;">
            <div class="col-lg-3">
                <h4 class="mb-0"><a href="{{ route('cardiologie.programari.index') }}"><i class="fas fa-calendar-check me-1"></i>Cardiologie / Programări</a></h4>
            </div>
            <div class="col-lg-6" id="app">
                <form class="needs-validation" novalidate method="GET" action="{{ route('cardiologie.programari.index') }}">
                    @csrf
                    <div class="row mb-1 input-group custom-search-form justify-content-center">
                        <input type="text" class="form-control form-control-sm col-md-3 me-1 border rounded-pill" id="search_nume" name="search_nume" placeholder="Nume" autofocus
                                value="{{ $search_nume }}">
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
                    </div>
                    <div class="row input-group custom-search-form justify-content-center">
                        <button class="btn btn-sm btn-primary text-white col-md-4 me-1 border border-dark rounded-pill" type="submit">
                            <i class="fas fa-search text-white me-1"></i>Caută
                        </button>
                        <a class="btn btn-sm bg-secondary text-white col-md-4 border border-dark rounded-pill" href="{{ route('cardiologie.programari.index') }}" role="button">
                            <i class="far fa-trash-alt text-white me-1"></i>Resetează căutarea
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 text-end">
                <a class="btn btn-sm bg-success text-white border border-dark rounded-pill col-md-8" href="{{ route('cardiologie.programari.create') }}" role="button">
                    <i class="fas fa-plus-square text-white me-1"></i>Adaugă programare
                </a>
            </div>
        </div>

        <div class="card-body px-0 py-3">

            @include ('errors')

            <div class="table-responsive rounded">
                <table class="table table-striped table-hover table-sm rounded">
                    <thead class="text-white rounded" style="background-color:#00b7ff;">
                        <tr class="" style="padding:2rem">
                            <th>Nr. Crt.</th>
                            <th>Nume</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Ora</th>
                            <th class="text-center">Buletin<br>ecocardiografic</th>
                            <th class="text-center">Fișă<br>consultație</th>
                            <th class="text-end">Acțiuni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($programari as $programare)
                            <tr>
                                <td align="">
                                    {{ ($programari ->currentpage()-1) * $programari ->perpage() + $loop->index + 1 }}
                                </td>
                                <td>
                                    <b>{{ $programare->nume ?? '' }}</b>
                                </td>
                                <td class="text-center">
                                    {{ $programare->data ? \Carbon\Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') : '' }}
                                </td>
                                <td class="text-center">
                                    {{ $programare->ora ? \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') : '' }}
                                </td>
                                <td class="">
                                    <div class="col-12 py-0 px-1 d-flex justify-content-center">
                                        @if (!$programare->buletin_ecocardiografic)
                                            <a class="flex me-1" href="/cardiologie/programari/{{ $programare->id }}/buletin-ecocardiografic/adauga">
                                                <span class="badge bg-success">Adaugă</span>
                                            </a>
                                        @else
                                            <a class="" href="/cardiologie/programari/{{ $programare->id }}/buletin-ecocardiografic/{{ $programare->buletin_ecocardiografic->id }}/modifica">
                                                <span class="badge bg-primary">Modifică</span>
                                            </a>
                                            <a class="" href="/cardiologie/programari/{{ $programare->id }}/buletin-ecocardiografic-export/{{$programare->buletin_ecocardiografic->id}}/export-pdf" target="_blank">
                                                <span class="badge bg-white text-danger border border-danger  px-1">PDF</span>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="">
                                    <div class="col-12 py-0 px-1 d-flex justify-content-center">
                                        @if (!$programare->fisa_consultatie)
                                            <a class="flex me-1" href="/cardiologie/programari/{{ $programare->id }}/fisa-consultatie/adauga">
                                                <span class="badge bg-success">Adaugă</span>
                                            </a>
                                        @else
                                            <a class="" href="/cardiologie/programari/{{ $programare->id }}/fisa-consultatie/{{ $programare->fisa_consultatie->id }}/modifica">
                                                <span class="badge bg-primary">Modifică</span>
                                            </a>
                                            <a class="" href="/cardiologie/programari/{{ $programare->id }}/fisa-consultatie-export/{{$programare->fisa_consultatie->id}}/export-pdf" target="_blank">
                                                <span class="badge bg-white text-danger border border-danger  px-1">PDF</span>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ $programare->path() }}"
                                            class="flex me-1"
                                        >
                                            <span class="badge bg-success">Vizualizează</span>
                                        </a>
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
                                </td>
                            </tr>
                        @empty
                            {{-- <div>Nu s-au gasit rezervări în baza de date. Încearcă alte date de căutare</div> --}}
                        @endforelse
                        </tbody>
                </table>
            </div>

                <nav>
                    <ul class="pagination pagination-sm justify-content-center">
                        {{$programari->appends(Request::except('page'))->links()}}
                    </ul>
                </nav>

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
