@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-7">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#e66800">
                    <h6 class="ms-2 my-0" style="color:white"><i class="fas fa-calendar-check me-1"></i>Programări / {{ $programare->fisa_de_tratament->nume ?? '' }}</h6>
                </div>

                <div class="card-body py-2 border border-secondary"
                    style="border-radius: 0px 0px 40px 40px;"
                    id="app"
                >

            @include ('errors')

                    <div class="form-row mb-2 px-2">
                        <div class="table-responsive col-md-12 mx-auto">
                            <table class="table table-sm table-striped table-hover"
                            >
                                <tr>
                                    <td class="pe-4">
                                        Pacient
                                    </td>
                                    <td>
                                        {{ $programare->fisa_de_tratament->nume }}
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
                                        Evoluție și tratament
                                    </td>
                                    <td>
                                        {{ $programare->tratament }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Cod
                                    </td>
                                    <td>
                                        {{ $programare->cod }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-row mb-2 px-2">
                        <div class="col-lg-12">
                            <vue-signature-pad>
                            </vue-signature-pad>
                        </div>
                    </div>

                    <div class="form-row mb-2 px-2">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <a class="btn btn-primary text-white rounded-pill" href="/programari">Pagină programări</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
