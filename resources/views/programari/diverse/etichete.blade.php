@extends ('layouts.app')

@section('content')
<div class="container card" style="border-radius: 40px 40px 40px 40px;">
        <div class="row card-header align-items-center" style="border-radius: 40px 40px 0px 0px;">
            <div class="col-lg-12">
                <h4 class="mb-0">
                    <i class="fas fa-calendar-check me-1 fs-4"></i>Programări
                    /
                    {{ $programare->fisa_de_tratament->nume ?? '' }}
                </h4>
            </div>
        </div>

        <div class="col-lg-8 mx-auto">
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
                                <th class="text-end">Acțiuni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programare->etichete as $eticheta)
                                <tr>
                                    <td align="">
                                        {{ $loop->iteration }}
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
                                    <td class="d-flex justify-content-end">
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
                                    </td>
                                </tr>
                            @empty
                                {{-- <div>Nu s-au gasit rezervări în baza de date. Încearcă alte date de căutare</div> --}}
                            @endforelse
                            </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    {{-- Modalele pentru stergere eticheta de la programare --}}
    @foreach ($programare->etichete as $eticheta)
        <div class="modal fade text-dark" id="stergeEticheta{{ $eticheta->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Eticheta: <b>{{ $eticheta->cod_de_bare ?? '' }}</b></h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align:left;">
                    Ești sigur ca vrei să scoți Eticheta de la această Programare?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Renunță</button>

                    <a class="btn" href="/programari/etichete/{{ $programare->id }}/{{ $eticheta->id }}/scoate">
                            Scoate Eticheta
                    </a>
                    {{-- <form method="POST" action="/programari/{{ $programare->id }}/etichete/{{ $eticheta->id }}/scoate">
                        @method('DELETE')
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-danger text-white"
                            >
                            Scoate Eticheta
                        </button>
                    </form> --}}

                </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
