@csrf


<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 mb-0">

        <div class="row mb-5 d-flex text-center" style="">
            <div class="col-12">
                <h3 class="m-0">BULETIN ECOCARDIOGRAFIC</h3>
            </div>
        </div>

        <div class="row mb-4 rounded-3 d-flex align-items-center" style="">
            <div class="col-lg-12 align-items-left">
                <div class="row">
                    <div class="col-auto align-self-center">
                        Nume
                        <b>{{ $programare->nume }}</b>, varsta
                    </div>
                    <div class="col-lg-2">
                        <input
                            type="text"
                            id="varsta"
                            name="varsta"
                            class="form-control bg-white rounded-3 {{ $errors->has('varsta') ? 'is-invalid' : '' }}"
                            value="{{ old('varsta', $buletin_ecocardiografic->varsta) }}">
                    </div>

                    <input
                        type="hidden"
                        name="programare_id"
                        value="{{ $programare->id }}">
                </div>
            </div>
        </div>

        <div class="row mb-2 rounded-3 d-flex align-items-center" style="">
            <div class="col-lg-12  align-items-left">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="dtdvs_1" class="col-form-label">DTDVS(mm)</label>
                    </div>
                    <div class="col-lg-2">
                        <input
                            type="text"
                            id="dtdvs_1"
                            name="dtdvs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtdvs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('dtdvs_1', $buletin_ecocardiografic->dtdvs_1) }}">
                    </div>
                    <div class="col-lg-2">
                        <input
                            type="text"
                            id="dtdvs_2"
                            name="dtdvs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtdvs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('dtdvs_2', $buletin_ecocardiografic->dtdvs_2) }}">
                    </div>
                    <div class="col-lg-2">
                        <label for="dtdvs_1" class="col-form-label"> < 55mm </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <label for="dtsvs_1" class="col-form-label">DTSVS(mm)</label>
                    </div>
                    <div class="col-lg-2">
                        <input
                            type="text"
                            id="dtsvs_1"
                            name="dtsvs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtsvs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('dtsvs_1', $buletin_ecocardiografic->dtsvs_1) }}">
                    </div>
                    <div class="col-lg-2">
                        <input
                            type="text"
                            id="dtsvs_2"
                            name="dtsvs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtsvs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('dtsvs_2', $buletin_ecocardiografic->dtsvs_2) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <label for="sivd_1" class="col-form-label">SIVd(mm)</label>
                    </div>
                    <div class="col-lg-2">
                        <input
                            type="text"
                            id="sivd_1"
                            name="sivd_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('sivd_1') ? 'is-invalid' : '' }}"
                            value="{{ old('sivd_1', $buletin_ecocardiografic->sivd_1) }}">
                    </div>
                    <div class="col-lg-2">
                        <input
                            type="text"
                            id="sivd_2"
                            name="sivd_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('sivd_2') ? 'is-invalid' : '' }}"
                            value="{{ old('sivd_2', $buletin_ecocardiografic->sivd_2) }}">
                    </div>
                    <div class="col-lg-2">
                        <label for="sivd_1" class="col-form-label">5-13mm</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white me-3 rounded-3">{{ $buttonText }}</button>
                <a class="btn btn-secondary rounded-3" href="{{ Session::get('cardiologie_programare_return_url') }}">Renunță</a>
            </div>
        </div>
    </div>
</div>
