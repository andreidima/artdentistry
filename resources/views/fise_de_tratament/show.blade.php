@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#e66800">
                    <h6 class="ms-2 my-0" style="color:white"><i class="fas fa-file-alt me-1"></i>Schimbă datele fișei de tratament</h6>
                </div>

                <div class="card-body py-2 border border-secondary"
                    style="border-radius: 0px 0px 40px 40px;"
                    id="app"
                >

            @include ('errors')

                    <div class="table-responsive col-md-12 mx-auto">
                        <table class="table table-sm table-striped table-hover"
                        >
                            <tr>
                                <td class="pe-4">
                                    Număr
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->fisa_numar }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Medic curant
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->medic_curant }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Data
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->data ? \Carbon\Carbon::parse($fisa_de_tratament->data)->isoFormat('DD.MM.YYYY') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Nume
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->nume }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Telefon
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->telefon }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Vârsta
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->varsta }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Sex
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->sex }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    CNP
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->cnp }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Strada
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->strada }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Scara
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->scara }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Număr
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->numar }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Bloc
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->bloc }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Ap.
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->apartament }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Oraș
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->oras }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Sector
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->sector }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Județ
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->judet }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Asigurare medicală
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->asigurare_medicala }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Ocupație
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->ocupatie }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Loc de muncă
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->loc_de_munca }}
                                </td>
                            </tr>

                                @php
                                    $status_dentar_dinti = array (
                                        11, 12, 13, 14, 15, 16, 17, 18,
                                        21, 22, 23, 24, 25, 26, 27, 28,
                                        31, 32, 33, 34, 35, 36, 37, 38,
                                        41, 42, 43, 44, 45, 46, 47, 48,
                                        51, 52, 53, 54, 55,
                                        61, 62, 63, 64, 65,
                                        71, 72, 73, 74, 75,
                                        81, 82, 83, 84, 85,
                                    );
                                @endphp

                                @foreach ($status_dentar_dinti as $status_dentar_dinte)

                                    <tr>
                                        <td class="pe-4">
                                            Status dentar dinte {{ $status_dentar_dinte }}
                                        </td>
                                        <td>
                                            {{ $fisa_de_tratament->{'status_dentar_' . $status_dentar_dinte} }}
                                        </td>
                                    </tr>

                                @endforeach

                            <tr>
                                <td class="pe-4">
                                    Diagnostic Odontal
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->diagnostic_odontal }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Diagnostic Paradontal
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->diagnostic_paradontal }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Diagnostic Edentație
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->diagnostic_edentatie }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Sector
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->sector }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Diagnostic Mucoasă
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->diagnostic_mucoasa }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Diagnostic complex
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->diagnostic_complex }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Plan complex tratament
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->plan_complex_tratament }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Deviz provizoriu
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->deviz_provizoriu }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Observații
                                </td>
                                <td>
                                    {{ $fisa_de_tratament->observatii }}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-row mb-2 px-2">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <a class="btn btn-primary text-white btn-sm rounded-pill" href="{{ url()->previous() }}">Înapoi</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
