@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#e66800">
                    <h6 class="ms-2 my-0" style="color:white"><i class="fas fa-tooth me-1"></i>Servicii / {{ $serviciu->nume }}</h6>
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
                                    Categorie
                                </td>
                                <td>
                                    {{ $serviciu->categorie->nume ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Nume
                                </td>
                                <td>
                                    {{ $serviciu->nume }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Preț
                                </td>
                                <td>
                                    {{ $serviciu->pret }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Descriere
                                </td>
                                <td>
                                    {{ $serviciu->descriere }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-4">
                                    Observații
                                </td>
                                <td>
                                    {{ $serviciu->observatii }}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-row mb-2 px-2">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <a class="btn btn-primary text-white btn-sm rounded-pill" href="/servicii">Pagină servicii</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
