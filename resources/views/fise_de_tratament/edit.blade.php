@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#e66800">
                    <h6 class="ms-2 my-0" style="color:white"><i class="fas fa-file-alt mr-1"></i>Schimbă datele fișei</h6>
                </div>

                @include ('errors')

                <div class="card-body py-2 border border-secondary"
                    style="border-radius: 0px 0px 40px 40px;"
                >
                    <form  class="needs-validation" novalidate method="POST" action="{{ $fisa_de_tratament->path() }}">
                        @method('PATCH')


                                @include ('fise_de_tratament.form', [
                                    'buttonText' => 'Modifică Fișa'
                                ])

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
