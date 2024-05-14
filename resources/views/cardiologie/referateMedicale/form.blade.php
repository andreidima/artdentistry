@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px">
    <div class="col-lg-12 mb-0">

        <div class="row mb-4 d-flex text-center" style="">
            <div class="col-12">
                <h3 class="m-0">REFERAT MEDICAL</h3>
            </div>
        </div>

        <div class="row mb-4 rounded-3 d-flex align-items-center" style="">
            <div class="col-lg-12 align-items-center">
                <div class="row">
                    <div class="col-lg-3 mb-4">
                        <label for="numar_inregistrare" class="ps-3">Număr înregistrare</label>
                        <input
                            type="text"
                            name="numar_inregistrare"
                            class="form-control rounded-3 {{ $errors->has('numar_inregistrare') ? 'is-invalid' : '' }}"
                            value="{{ old('numar_inregistrare', $referat_medical->numar_inregistrare) }}">
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-3 mb-4">
                            {{-- Cheia straina ce se salveaza in tabelul cardiologie referate medicale --}}
                            <input
                                type="hidden"
                                name="programare_id"
                                value="{{ $programare->id }}">
                        <label for="nume" class="ps-3">Nume</label>
                        <input
                            type="text"
                            class="form-control rounded-3 {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                            value="{{ old('nume', $programare->nume) }}"
                            disabled>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <label for="cnp" class="ps-3">CNP</label>
                        <input
                            type="text"
                            name="cnp"
                            class="form-control rounded-3 {{ $errors->has('cnp') ? 'is-invalid' : '' }}"
                            value="{{ old('cnp', $referat_medical->cnp) }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="adresa" class="ps-3">Adresa</label>
                        <input
                            type="text"
                            name="adresa"
                            class="form-control rounded-3 {{ $errors->has('adresa') ? 'is-invalid' : '' }}"
                            value="{{ old('adresa', $referat_medical->adresa) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <label for="diagnostic_clinic" class="mb-0 ps-3">Diagnostic clinic</label>
                        <textarea class="form-control bg-white {{ $errors->has('diagnostic_clinic') ? 'is-invalid' : '' }}"
                            name="diagnostic_clinic" rows="3">{{ old('diagnostic_clinic', $referat_medical->diagnostic_clinic) }}</textarea>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="simptomatologie" class="mb-0 ps-3">Simptomatologie</label>
                        <textarea class="form-control bg-white {{ $errors->has('simptomatologie') ? 'is-invalid' : '' }}"
                            name="simptomatologie" rows="3">{{ old('simptomatologie', $referat_medical->simptomatologie) }}</textarea>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <label for="inaltime" class="ps-3">Înălțime (cm)</label>
                        <input
                            type="text"
                            name="inaltime"
                            class="form-control rounded-3 {{ $errors->has('inaltime') ? 'is-invalid' : '' }}"
                            value="{{ old('inaltime', $referat_medical->inaltime) }}">
                    </div>
                    <div class="col-lg-3 mb-4">
                        <label for="greutate" class="ps-3">Greutate (Kg)</label>
                        <input
                            type="text"
                            name="greutate"
                            class="form-control rounded-3 {{ $errors->has('greutate') ? 'is-invalid' : '' }}"
                            value="{{ old('greutate', $referat_medical->greutate) }}">
                    </div>
                    <div class="col-lg-3 mb-4">
                        <label for="ta" class="ps-3">TA (mmHg)</label>
                        <input
                            type="text"
                            name="ta"
                            class="form-control rounded-3 {{ $errors->has('ta') ? 'is-invalid' : '' }}"
                            value="{{ old('ta', $referat_medical->ta) }}">
                    </div>
                    <div class="col-lg-3 mb-4">
                        <label for="av" class="ps-3">AV (b/min)</label>
                        <input
                            type="text"
                            name="av"
                            class="form-control rounded-3 {{ $errors->has('av') ? 'is-invalid' : '' }}"
                            value="{{ old('av', $referat_medical->av) }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="examen_obiectiv_detaliat" class="mb-0 ps-3">Examen obiectiv detaliat</label>
                        <textarea class="form-control bg-white {{ $errors->has('examen_obiectiv_detaliat') ? 'is-invalid' : '' }}"
                            name="examen_obiectiv_detaliat" rows="3">{{ old('examen_obiectiv_detaliat', $referat_medical->examen_obiectiv_detaliat) }}</textarea>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="investigatii_clinice_paraclinice" class="mb-0 ps-3">Investigații clinice, paraclinice</label>
                        <textarea class="form-control bg-white {{ $errors->has('investigatii_clinice_paraclinice') ? 'is-invalid' : '' }}"
                            name="investigatii_clinice_paraclinice" rows="3">{{ old('investigatii_clinice_paraclinice', $referat_medical->investigatii_clinice_paraclinice) }}</textarea>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="tratamente_urmate" class="mb-0 ps-3">Tratamente urmate</label>
                        <textarea class="form-control bg-white {{ $errors->has('tratamente_urmate') ? 'is-invalid' : '' }}"
                            name="tratamente_urmate" rows="3">{{ old('tratamente_urmate', $referat_medical->tratamente_urmate) }}</textarea>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="observatii" class="mb-0 ps-3">Observații</label>
                        <textarea class="form-control bg-white {{ $errors->has('observatii') ? 'is-invalid' : '' }}"
                            name="observatii" rows="3">{{ old('observatii', $referat_medical->observatii) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-primary text-white me-3 rounded-3">{{ $buttonText }}</button>
                <a class="btn btn-lg btn-secondary rounded-3" href="{{ Session::get('cardiologie_programare_return_url') }}">Renunță</a>
            </div>
        </div>
    </div>
</div>
