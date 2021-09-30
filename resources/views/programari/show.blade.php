@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#e66800">
                    <h6 class="ms-2 my-0" style="color:white"><i class="fas fa-calendar-check me-1"></i>Programări / {{ $programare->pacient->nume ?? '' }}</h6>
                </div>

                <div class="card-body py-2 border border-secondary"
                    style="border-radius: 0px 0px 40px 40px;"
                    id="app1"
                >

            @include ('errors')

                    <div class="table-responsive col-md-12 mx-auto">
                        <table class="table table-sm table-striped table-hover"
                        >
                            <tr>
                                <td class="pe-4">
                                    Pacient
                                </td>
                                <td>
                                    {{ $programare->pacient->nume }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Servicii
                                </td>
                                <td>
                                    @foreach ($programare->servicii->sortBy('nume') as $serviciu)
                                        {{ $serviciu->nume }}
                                        <br />
                                    @endforeach
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
                                    Ora început
                                </td>
                                <td>
                                    {{ $programare->ora_inceput ? \Carbon\Carbon::parse($programare->ora_inceput)->isoFormat('HH:mm') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ora sfârșit
                                </td>
                                <td>
                                    {{ $programare->ora_sfarsit ? \Carbon\Carbon::parse($programare->ora_sfarsit)->isoFormat('HH:mm') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Preț total
                                </td>
                                <td>
                                    {{ $programare->pret_total }}
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
                            <a class="btn btn-primary text-white btn-sm rounded-pill" href="/programari">Pagină programări</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
