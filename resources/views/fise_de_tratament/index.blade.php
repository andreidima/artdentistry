@extends ('layouts.app')

@section('content')
<div class="container card" style="border-radius: 40px 40px 40px 40px;">
        <div class="row card-header align-items-center" style="border-radius: 40px 40px 0px 0px;">
            <div class="col-lg-3">
                <h4 class="mb-0"><a href="{{ route('fise-de-tratament.index') }}"><i class="fas fa-file-alt me-1"></i>Fișe de tratament</a></h4>
            </div>
            <div class="col-lg-6">
                <form class="needs-validation" novalidate method="GET" action="{{ route('fise-de-tratament.index') }}">
                    @csrf
                    <div class="row mb-1 input-group custom-search-form justify-content-center">
                        <input type="text" class="form-control form-control-sm col-md-4 me-1 border rounded-pill" id="search_nume" name="search_nume" placeholder="Nume" autofocus
                                value="{{ $search_nume }}">
                        <input type="text" class="form-control form-control-sm col-md-4 me-1 border rounded-pill" id="search_telefon" name="search_telefon" placeholder="Telefon" autofocus
                                value="{{ $search_telefon }}">
                    </div>
                    <div class="row input-group custom-search-form justify-content-center">
                        <button class="btn btn-sm btn-primary text-white col-md-4 me-1 border border-dark rounded-pill" type="submit">
                            <i class="fas fa-search text-white me-1"></i>Caută
                        </button>
                        <a class="btn btn-sm bg-secondary text-white col-md-4 border border-dark rounded-pill" href="{{ route('fise-de-tratament.index') }}" role="button">
                            <i class="far fa-trash-alt text-white me-1"></i>Resetează căutarea
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 text-end">
                <a class="btn btn-sm bg-success text-white border border-dark rounded-pill col-md-8" href="{{ route('fise-de-tratament.create') }}" role="button">
                    <i class="fas fa-plus-square text-white me-1"></i>Adaugă fișă
                </a>
            </div>
        </div>

        <div class="card-body px-0 py-3">

            @include ('errors')

            <div class="table-responsive rounded">
                <table class="table table-striped table-hover table-sm rounded">
                    <thead class="text-white rounded" style="background-color:#e66800;">
                        <tr class="" style="padding:2rem">
                            <th>Nr. Crt.</th>
                            <th>Număr</th>
                            <th>Nume</th>
                            <th>Telefon</th>
                            <th class="text-center">Chestionar</th>
                            <th class="text-end">Acțiuni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fise_de_tratament as $fisa_de_tratament)
                            <tr>
                                <td align="">
                                    {{ ($fise_de_tratament ->currentpage()-1) * $fise_de_tratament ->perpage() + $loop->index + 1 }}
                                </td>
                                <td>
                                    <b>{{ $fisa_de_tratament->fisa_numar }}</b>
                                </td>
                                <td>
                                    <b>{{ $fisa_de_tratament->nume }}</b>
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->telefon }}
                                </td>
                                <td class="text-center">
                                    @if ($fisa_de_tratament->chestionar_evaluare_stare_generala)
                                        <a href="{{ $fisa_de_tratament->path() }}/chestionar-evaluare-stare-generala/{{ $fisa_de_tratament->chestionar_evaluare_stare_generala->id }}/modifica">
                                            <span class="badge bg-primary">Modifică</span>
                                        </a>
                                    @else
                                        <a href="{{ $fisa_de_tratament->path() }}/chestionar-evaluare-stare-generala/adauga">
                                            <span class="badge bg-success">Adaugă</span>
                                        </a>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ $fisa_de_tratament->path() }}"
                                        class="flex me-1"
                                    >
                                        <span class="badge bg-success">Vizualizează</span>
                                    </a>
                                    <a href="{{ $fisa_de_tratament->path() }}/modifica"
                                        class="flex me-1"
                                    >
                                        <span class="badge bg-primary">Modifică</span>
                                    </a>
                                    <div style="flex" class="">
                                        <a
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#stergeFisaDeTratament{{ $fisa_de_tratament->id }}"
                                            title="Șterge Fișa de tratament"
                                            >
                                            <span class="badge bg-danger">Șterge</span>
                                        </a>
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
                        {{$fise_de_tratament->appends(Request::except('page'))->links()}}
                    </ul>
                </nav>

        </div>
    </div>

    {{-- Modalele pentru stergere fisa_de_tratament --}}
    @foreach ($fise_de_tratament as $fisa_de_tratament)
        <div class="modal fade text-dark" id="stergeFisaDeTratament{{ $fisa_de_tratament->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Fișa de tratament: <b>{{ $fisa_de_tratament->fisa_numar }}</b></h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align:left;">
                    Ești sigur ca vrei să ștergi Fișa de tratament?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Renunță</button>

                    <form method="POST" action="{{ $fisa_de_tratament->path() }}">
                        @method('DELETE')
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-danger text-white"
                            >
                            Șterge Fișa de tratament
                        </button>
                    </form>

                </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
