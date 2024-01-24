@extends ('layouts.app')

@php
    use \Carbon\Carbon;
@endphp

@section('content')
<div class="container card" style="border-radius: 40px 40px 40px 40px;">
        <div class="row card-header align-items-center" style="border-radius: 40px 40px 0px 0px;">
            <div class="col-lg-3">
                <h4 class="mb-0"><a href="{{ url()->current() }}"><i class="fas fa-receipt me-1"></i>Rețete</a></h4>
            </div>
            <div class="col-lg-6" id="app">
                <form class="needs-validation" novalidate method="GET" action="{{ url()->current() }}">
                    @csrf
                    <div class="row mb-1 custom-search-form justify-content-center">
                        <div class="col-lg-6">
                            <input type="text" class="form-control rounded-3" id="searchPacient" name="searchPacient" placeholder="Pacient" value="{{ $searchPacient }}">
                        </div>
                        <div class="col-lg-4 d-flex">
                            <label for="searchData" class="mb-0 align-self-center me-1">Data:</label>
                            <vue2-datepicker
                                data-veche="{{ $searchData }}"
                                nume-camp-db="searchData"
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
                        <a class="btn btn-sm bg-secondary text-white col-md-4 border border-dark rounded-pill" href="{{ url()->current() }}" role="button">
                            <i class="far fa-trash-alt text-white me-1"></i>Resetează căutarea
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 text-end">
                <a class="btn btn-sm btn-success text-white border border-dark rounded-3 col-md-8" href="{{ url()->current() }}/adauga" role="button">
                    <i class="fas fa-plus-square text-white me-1"></i>Adaugă Rețetă
                </a>
            </div>
        </div>

        <div class="card-body px-0 py-3">

            @include ('errors')

            <div class="table-responsive rounded">
                <table class="table table-striped table-hover table-sm rounded">
                    <thead class="text-white rounded" style="background-color:#e66800;">
                        <tr class="" style="padding:2rem">
                            <th>#</th>
                            <th>Serie număr</th>
                            <th>Pacient</th>
                            <th>Data</th>
                            <th>Pdf</th>
                            <th class="text-end">Acțiuni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($retete as $reteta)
                            <tr>
                                <td align="">
                                    {{ ($retete ->currentpage()-1) * $retete ->perpage() + $loop->index + 1 }}
                                </td>
                                <td class="">
                                    {{ $reteta->serie }}{{ $reteta->numar }}
                                </td>
                                <td class="">
                                    {{ $reteta->pacient_nume }}
                                </td>
                                <td class="">
                                    {{ $reteta->data ? Carbon::parse($reteta->data)->isoFormat('DD.MM.YYYY') : '' }}
                                </td>
                                <td class="pb-0">
                                    <a href="{{ $reteta->path() }}/export/pdf" target="_blank">
                                        {{-- <span class="text-danger"><i class="fas fa-file-pdf h4 mb-0"></i></a> --}}
                                        <span class="badge bg-success">Pdf</a>
                                </td>
                                <td>
                                    <div class="text-end">
                                        <a href="{{ $reteta->path() }}" class="flex me-1">
                                            <span class="badge bg-success">Vizualizează</span></a>
                                        <a href="{{ $reteta->path() }}/modifica" class="flex me-1">
                                            <span class="badge bg-primary">Modifică</span></a>
                                        <a href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#stergeReteta{{ $reteta->id }}"
                                            title="Șterge reteta"
                                            >
                                            <span class="badge bg-danger">Șterge</span></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                </table>
            </div>

                <nav>
                    <ul class="pagination justify-content-center">
                        {{ $retete->appends(Request::except('page'))->links() }}
                    </ul>
                </nav>
        </div>
    </div>

    {{-- Modalele pentru stergere rețetă --}}
    @foreach ($retete as $reteta)
        <div class="modal fade text-dark" id="stergeReteta{{ $reteta->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Pacient: <b>{{ $reteta->pacient_nume }}</b></h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align:left;">
                    Ești sigur ca vrei să ștergi rețeta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Renunță</button>

                    <form method="POST" action="{{ $reteta->path() }}">
                        @method('DELETE')
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-danger text-white"
                            >
                            Șterge Rețeta
                        </button>
                    </form>

                </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
