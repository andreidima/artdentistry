@extends ('layouts.app')

@section('content')
<div class="container card" style="border-radius: 40px 40px 40px 40px;">
        <div class="row card-header align-items-center" style="border-radius: 40px 40px 0px 0px;">
            <div class="col-lg-3">
                <h4 class="mb-0"><a href="{{ route('etichete.index') }}"><i class="fa fa-tags me-1"></i>Etichete</a></h4>
            </div>
            <div class="col-lg-6" id="app1">
                <form class="needs-validation" novalidate method="GET" action="{{ route('etichete.index') }}">
                    @csrf
                    <div class="row mb-1 input-group custom-search-form justify-content-center">
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm me-2 border rounded-pill" id="search_cod_de_bare" name="search_cod_de_bare" placeholder="Cod de bare" autofocus
                                    value="{{ $search_cod_de_bare }}">
                        </div>
                    </div>
                    <div class="row input-group custom-search-form justify-content-center">
                        <button class="btn btn-sm btn-primary text-white col-md-4 me-1 border border-dark rounded-pill" type="submit">
                            <i class="fas fa-search text-white me-1"></i>Caută
                        </button>
                        <a class="btn btn-sm bg-secondary text-white col-md-4 border border-dark rounded-pill" href="{{ route('etichete.index') }}" role="button">
                            <i class="far fa-trash-alt text-white me-1"></i>Resetează căutarea
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 text-end">
                <a class="btn btn-sm bg-success text-white border border-dark rounded-pill col-md-8" href="{{ route('etichete.create') }}" role="button">
                    <i class="fas fa-plus-square text-white me-1"></i>Adaugă etichetă
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
                            <th>Cod de bare</th>
                            <th>Operator</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Printează</th>
                            <th class="text-end">Acțiuni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($etichete as $eticheta)
                            <tr>
                                <td align="">
                                    {{ ($etichete ->currentpage()-1) * $etichete ->perpage() + $loop->index + 1 }}
                                </td>
                                <td>
                                    <b>{{ $eticheta->cod_de_bare ?? '' }}</b>
                                </td>
                                <td>
                                    <b>{{ $eticheta->operator ?? '' }}</b>
                                </td>
                                <td class="text-center">
                                    {{ $eticheta->data ? \Carbon\Carbon::parse($eticheta->data)->isoFormat('DD.MM.YYYY') : '' }}
                                </td>
                                <td class="text-center">
                                    {{-- <a href="{{ $eticheta->path() }}/barcode/barcode-pdf"
                                        class="flex me-1"
                                    >
                                        <span class="badge bg-success">Printează</span>
                                    </a> --}}
                                        <form class="needs-validation" novalidate method="POST" action="{{ $eticheta->path() }}/barcode/barcode-pdf">
                                            @csrf
                                            <div class="d-flex justify-content-center">
                                                {{-- <input type="text"
                                                    class="form-control form-control-sm me-2 bg-white rounded-3 {{ $errors->has('cantitate') ? 'is-invalid' : '' }}"
                                                    name="cantitate"
                                                    style="width:50px"
                                                    value="1"> --}}
                                                <button type="submit"
                                                    class="btn btn-sm bg-success text-white me-2 rounded-3 shadow">
                                                    Printează
                                                </button>
                                            </div>
                                        </form>

                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ $eticheta->path() }}/modifica"
                                            class="flex me-1"
                                        >
                                            <span class="badge bg-primary">Modifică</span>
                                        </a>
                                        <div style="flex" class="">
                                            <a
                                                href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#stergeEticheta{{ $eticheta->id }}"
                                                title="Șterge Eticheta"
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
                        {{$etichete->appends(Request::except('page'))->links()}}
                    </ul>
                </nav>

        </div>
    </div>

    {{-- Modalele pentru stergere eticheta --}}
    @foreach ($etichete as $eticheta)
        <div class="modal fade text-dark" id="stergeEticheta{{ $eticheta->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Eticheta: <b>{{ $eticheta->pacient->nume ?? '' }}</b></h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align:left;">
                    Ești sigur ca vrei să ștergi Eticheta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Renunță</button>

                    <form method="POST" action="{{ $eticheta->path() }}">
                        @method('DELETE')
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-danger text-white"
                            >
                            Șterge Eticheta
                        </button>
                    </form>

                </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
