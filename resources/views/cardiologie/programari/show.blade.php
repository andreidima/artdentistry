@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#00b7ff">
                    <h6 class="ms-2 my-0" style="color:white"><i class="fas fa-calendar-check me-1"></i>Cardiologie / Programări / {{ $programare->nume ?? '' }}</h6>
                </div>

                <div class="card-body py-2 border border-secondary"
                    style="border-radius: 0px 0px 40px 40px;"
                    id="app"
                >

            @include ('errors')

                    <div class="table-responsive col-md-12 mx-auto">
                        <table class="table table-sm table-striped table-hover"
                        >
                                <td class="pe-4">
                                    Pacient
                                </td>
                                <td>
                                    {{ $programare->nume }}
                                </td>
                            </tr>
                            <tr>
                                <td class="">
                                    Telefon
                                </td>
                                <td>
                                    {{ $programare->telefon }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Data
                                </td>
                                <td>
                                    {{ $programare->data ? \Carbon\Carbon::parse($programare->data)->isoFormat('DD.MM.YYYY') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ora
                                </td>
                                <td>
                                    {{ $programare->ora ? \Carbon\Carbon::parse($programare->ora)->isoFormat('HH:mm') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notiță
                                </td>
                                <td>
                                    {{ $programare->notita }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Semnătura
                                </td>
                                <td>
                                    <img src="{{ $programare->semnatura }}"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Observații
                                </td>
                                <td>
                                    {{ $programare->observatii }}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-row mb-2 px-2">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <a class="btn btn-primary text-white rounded-pill" href="{{ url()->previous() }}">Înapoi</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
