@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 mb-0">
        <div class="row mb-0 align-items-center">
            <div class="col-lg-7 mb-4">
                <label for="nume" class="mb-0 ps-3">Nume:</label>
                <input
                    type="text"
                    class="form-control bg-white rounded-pill {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                    name="nume"
                    placeholder=""
                    value="{{ old('nume', $programare->nume) }}"
                    required>
            </div>
            <div class="col-lg-5 mb-4">
                <label for="telefon" class="mb-0 ps-3">Telefon:</label>
                <input
                    type="text"
                    class="form-control bg-white rounded-pill {{ $errors->has('telefon') ? 'is-invalid' : '' }}"
                    name="telefon"
                    placeholder=""
                    value="{{ old('telefon', $programare->telefon) }}"
                    required>
            </div>
        </div>
        <div class="row mb-5 align-items-center justify-content-center">
            <div class="col-lg-2 mb-4">
                <label for="data" class="mb-0 ps-1">Data:</label>
                    <vue2-datepicker
                        data-veche="{{ old('data', ($programare->data ?? '')) }}"
                        class="{{ $errors->has('data') ? 'form-control is-invalid' : '' }}"
                        nume-camp-db="data"
                        tip="date"
                        value-type="YYYY-MM-DD"
                        format="DD-MM-YYYY"
                        :latime="{ width: '125px' }"
                    ></vue2-datepicker>
            </div>
            <div class="col-lg-2 mb-4">
                <label for="ora" class="mb-0 ps-1">Ora:</label>
                    <vue2-datepicker
                        data-veche="{{ old('ora', ($programare->ora ?? '')) }}"
                        class="{{ $errors->has('ora') ? 'form-control is-invalid' : '' }}"
                        nume-camp-db="ora"
                        tip="time"
                        value-type="HH:mm"
                        format="HH:mm"
                        :hours="[8,9,10,11,12,13,14,15,16,17,18,19,20]"
                        :minute-step="10"
                        :latime="{ width: '90px' }"
                    ></vue2-datepicker>
            </div>
            <div class="col-lg-6 mb-4">
                <label for="notita" class="mb-0 ps-3">Notiță:</label>
                <input
                    type="text"
                    class="form-control bg-white rounded-pill {{ $errors->has('notita') ? 'is-invalid' : '' }}"
                    name="notita"
                    placeholder=""
                    value="{{ old('notita', $programare->notita) }}"
                    required>
            </div>
            <div class="col-lg-2 mb-0">
                <div class="">
                    Confirmare:
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="confirmare" id="confirmare_da"
                            {{ old('confirmare', $programare->confirmare) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="confirmare_da"><i class="fas fa-thumbs-up text-success fs-4"></i></i></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="confirmare" id="confirmare_nu"
                            {{ old('confirmare', $programare->confirmare) == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="confirmare_nu"><i class="fas fa-thumbs-down text-danger fs-4"></i></i></label>
                    </div>
                    <div class="form-check px-4">
                        {{-- Daca nu este nici 0, nici 1, inseamna ca este nesetat (null sau gol) --}}
                        <input class="form-check-input" type="radio" value="" name="confirmare" id="confirmare_nesetat"
                            {{ is_null(old('confirmare', $programare->confirmare)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="confirmare_nesetat"><i class="fas fa-question text-dark fs-4"></i></label>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <label for="observatii" class="mb-0 ps-3">Observații:</label>
                <textarea class="form-control bg-white {{ $errors->has('observatii') ? 'is-invalid' : '' }}"
                    name="observatii" rows="3">{{ old('observatii', $programare->observatii) }}</textarea>
            </div>
            <div class="col-lg-12 mb-4">
                <label for="semnatura" class="mb-0 ps-3">Semnătura:</label>
                            <vue-signature-pad
                                semnatura-veche="{{ old('semnatura', ($programare->semnatura ?? '')) }}"
                                nume-camp-db="semnatura">
                            </vue-signature-pad>
            </div>

            <div class="col-lg-12 border-start border-warning" style="border-width:5px !important"
            >
                <div class="form-check">
                    <input type="checkbox" class="form-check-input {{ $errors->has('gdpr') ? 'is-invalid' : '' }}" name="gdpr" id="gdpr" value="1" required
                    {{ old('gdpr', ($programare->gdpr ?? "0")) === "1" ? 'checked' : '' }}>
                    <label class="form-check-label" for="gdpr">
                        * Sunt de acord cu prelucrarea datelor mele personale în conformitate cu Regulamentul (UE) 2016-679 - privind protecţia persoanelor fizice în ceea ce priveşte
                        prelucrarea datelor cu caracter personal şi privind libera circulaţie a acestor date şi de abrogare a Directivei 95/46/CE ale cărei prevederi le-am citit şi le cunosc.
                    </label>
                </div>
            </div>

            <div class="col-lg-12 border-start border-warning" style="border-width:5px !important"
            >
                <div class="form-check">
                    <input type="checkbox" class="form-check-input {{ $errors->has('covid_19') ? 'is-invalid' : '' }}" name="covid_19" id="covid_19" value="1" required
                    {{ old('covid_19', ($programare->covid_19 ?? "0")) === "1" ? 'checked' : '' }}>
                    <label class="form-check-label" for="covid_19">
                        * Confirm că am consultat și voi respecta instrucțiunile guvernamentale privind Covid-19
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 py-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white me-2 rounded-3 shadow">{{ $buttonText }}</button>
                <a class="btn btn-secondary rounded-3 shadow" href="{{ Session::get('cardiologie_programare_return_url') }}">Renunță</a>
            </div>
        </div>
    </div>
</div>
