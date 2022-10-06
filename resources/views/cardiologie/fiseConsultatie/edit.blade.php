@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#00b7ff">
                    <h6 class="ms-2 my-0" style="color:white">Cardiologie / Programare: {{ $programare->nume }} / Fișă consultație</h6></h6>
                </div>

                @include ('errors')

                <div class="card-body py-2 border border-secondary"
                    style="border-radius: 0px 0px 40px 40px; background-color:#daf4ff"
                >
                    <form  class="needs-validation" novalidate method="POST" action="{{ $programare->path() }}/fisa-consultatie/{{ $fisa_consultatie->id }}">
                        @method('PATCH')


                                @include ('cardiologie.fiseConsultatie.form', [
                                    'buttonText' => 'Salvează'
                                ])

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
