@php
    use \Carbon\Carbon;
@endphp

@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#e66800">
                    <h6 class="ms-2 my-0" style="color:white"><i class="fas fa-receipt me-1"></i>Rețete / {{ $reteta->seria }}{{ $reteta->numar }}</h6>
                </div>

                <div class="card-body py-2 border border-secondary"
                    style="border-radius: 0px 0px 40px 40px;"
                >

                    <div class="table-responsive col-md-12 mx-auto">
                        <table class="table table-sm table-striped table-hover"
                        >
                            <tr>
                                <td>
                                    Data
                                </td>
                                <td>
                                    {{ $reteta->data ? Carbon::parse($reteta->data)->isoFormat('DD.MM.YYYY') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Seria număr
                                </td>
                                <td>
                                    {{ $reteta->serie }}{{ $reteta->numar }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pacient
                                </td>
                                <td>
                                    {{ $reteta->pacient_nume }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Vârsta
                                </td>
                                <td>
                                    {{ $reteta->pacient_varsta }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CNP
                                </td>
                                <td>
                                    {{ $reteta->pacient_cnp }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Adresa
                                </td>
                                <td>
                                    {{ $reteta->pacient_adresa }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Localitate
                                </td>
                                <td>
                                    {{ $reteta->pacient_localitate }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Diagnostic
                                </td>
                                <td>
                                   {{ $reteta->pacient_diagnostic }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Diagnostic descriptiv
                                </td>
                                <td>
                                   {{ $reteta->pacient_diagnostic_descriptiv }}
                                </td>
                            </tr>
                            @foreach ($reteta->medicamente as $medicament)
                                @if ($loop->first)
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            &nbsp;
                                            <br>
                                            &nbsp;
                                            <br>
                                            MEDICAMENTE
                                            <br>
                                            &nbsp;
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>
                                        Denumire
                                    </td>
                                    <td>
                                    {{ $medicament->denumire }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Concentrație
                                    </td>
                                    <td>
                                    {{ $medicament->concentratie }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Forma farmaceutica
                                    </td>
                                    <td>
                                    {{ $medicament->forma_farmaceutica }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mod administrare
                                    </td>
                                    <td>
                                    {{ $medicament->mod_administrare }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Cantitate
                                    </td>
                                    <td>
                                    {{ $medicament->cantitate }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Durată tratament
                                    </td>
                                    <td>
                                    {{ $medicament->durata_tratament }}
                                    </td>
                                </tr>
                                @if (!$loop->last)
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>

                    <div class="form-row mb-2 px-2">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <a class="btn btn-lg btn-secondary rounded-3" href="{{ Session::get('retetaReturnUrl') }}">Înapoi</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
