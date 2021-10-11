@extends ('layouts.app')

@section('content')
<div class="container card" style="border-radius: 40px 40px 40px 40px;">
        <div class="row card-header align-items-center" style="border-radius: 40px 40px 0px 0px;">
            <div class="col-lg-12">
                <h4 class="mb-0"><a href="{{ route('vizualizare-ramificatii-servicii') }}"><i class="fas fa-tooth me-1"></i>Vizualizare ramificații servicii</a></h4>
            </div>
        </div>

        <div class="card-body px-0 py-3">

            @include ('errors')

            <div class="table-responsive rounded">
                <table class="table table-striped table-hover table-sm rounded">
                    <thead class="text-white rounded" style="background-color:#e66800;">
                        <tr class="" style="padding:2rem">
                            <th>Nr. Crt.</th>
                            <th>Categorie</th>
                            <th>Servicii</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($servicii_categorii as $serviciu_categorie)
                            <tr>
                                <td align="">
                                    {{ ($servicii_categorii ->currentpage()-1) * $servicii_categorii ->perpage() + $loop->index + 1 }}
                                </td>
                                <td>
                                    <b>{{ $serviciu_categorie->nume }}</b>
                                </td>
                                <td>
                                    @foreach ($serviciu_categorie->servicii as $serviciu)
                                        <p class="m-0">
                                            {{ $serviciu->nume }}
                                        </p>
                                    @endforeach
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
                        {{$servicii_categorii->appends(Request::except('page'))->links()}}
                    </ul>
                </nav>

        </div>
    </div>


@endsection
