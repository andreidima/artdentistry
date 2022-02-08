@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app1">
    <div class="col-lg-12 mb-0">
        <div class="row mb-0 align-items-center">
            <div class="col-lg-4 py-1 mb-4 rounded-3" style="background-color: rgb(213, 255, 255)">
                <h4 class="text-center text-white rounded-3" style="background-color: darkcyan">Pacient înregistrat</h4>
                <label for="fisa_de_tratament_id" class="mb-0 ps-3">Fișa de tratament:</label>
                <select name="fisa_de_tratament_id"
                    class="form-select bg-white rounded-pill {{ $errors->has('fisa_de_tratament_id') ? 'is-invalid' : '' }}"
                >
                        <option value='' selected></option>
                    @foreach ($fise_de_tratament as $fisa_de_tratament)
                        <option
                            value='{{ $fisa_de_tratament->id }}'
                            {{ ($fisa_de_tratament->id == old('fisa_de_tratament_id', $programare->fisa_de_tratament_id)) ? 'selected' : '' }}
                        >{{ $fisa_de_tratament->fisa_numar }} - {{ $fisa_de_tratament->nume }} </option>
                    @endforeach
                </select>
                {{-- <small class="ps-3">
                    *daca clientul are deja o fisa creata
                </small> --}}
            </div>
            <div class="col-lg-1 mb-4 text-center">
                SAU
            </div>
            <div class="col-lg-7 py-2 mb-4 rounded-3" style="background-color: rgb(213, 255, 255)">
                <h4 class="text-center text-white rounded-3" style="background-color: darkcyan">Pacient nou</h4>

                <div class="row">
                    <div class="col-lg-8">
                        <label for="nume" class="mb-0 ps-3">Nume:</label>
                        <input
                            type="text"
                            class="form-control bg-white rounded-pill {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                            name="nume"
                            placeholder=""
                            value="{{ old('nume', $programare->nume) }}"
                            required>
                    </div>
                    <div class="col-lg-4">
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
            </div>
        </div>
        <div class="row mb-5 align-items-center justify-content-center">
            <div class="col-lg-3 mb-0">
                <label for="data" class="mb-0 ps-1">Data:</label>
                    <vue2-datepicker
                        data-veche="{{ old('data', ($programare->data ?? '')) }}"
                        nume-camp-db="data"
                        tip="date"
                        value-type="YYYY-MM-DD"
                        format="DD-MM-YYYY"
                        :latime="{ width: '125px' }"
                    ></vue2-datepicker>
            </div>
            <div class="col-lg-2 mb-0 text-lg-center">
                <label for="ora" class="mb-0 ps-1">Ora:</label>
                    <vue2-datepicker
                        data-veche="{{ old('ora', ($programare->ora ?? '')) }}"
                        nume-camp-db="ora"
                        tip="time"
                        value-type="HH:mm"
                        format="HH:mm"
                        :hours="[8,9,10,11,12,13,14,15,16,17,18,19,20]"
                        :minute-step="10"
                        :latime="{ width: '90px' }"
                    ></vue2-datepicker>
            </div>
        </div>
        <div class="row mb-0 align-items-center">
            <div class="col-lg-9 mb-4">
                <label for="evolutie_si_tratament" class="mb-0 ps-3">Evoluție și tratament:</label>
                <input
                    type="text"
                    class="form-control bg-white rounded-pill {{ $errors->has('evolutie_si_tratament') ? 'is-invalid' : '' }}"
                    name="evolutie_si_tratament"
                    placeholder=""
                    value="{{ old('evolutie_si_tratament', $programare->evolutie_si_tratament) }}"
                    required>
            </div>
            <div class="col-lg-3 mb-4">
                <label for="cod" class="mb-0 ps-3">Cod:</label>
                <input
                    type="text"
                    class="form-control bg-white rounded-pill {{ $errors->has('cod') ? 'is-invalid' : '' }}"
                    name="cod"
                    placeholder=""
                    value="{{ old('cod', $programare->cod) }}"
                    required>
            </div>
            <div class="col-lg-12 mb-4">
                <label for="observatii" class="mb-0 ps-3">Observații:</label>
                <textarea class="form-control bg-white {{ $errors->has('observatii') ? 'is-invalid' : '' }}"
                    name="observatii" rows="2">{{ old('observatii', $programare->observatii) }}</textarea>
            </div>
            <div class="col-lg-12 mb-4">
                <label for="semnatura" class="mb-0 ps-3">Semnătura:</label>
                @if ($programare->semnatura)
                    <br>
                    Semnătura actuala este:
                    <img src="{{ $programare->semnatura }}"/>
                    <br>
                    Dacă dorești să o schimbi, desenează alta:
                @endif
                            <vue-signature-pad
                                nume-camp-db="semnatura">
                            </vue-signature-pad>
            </div>

            <div class="col-lg-12 py-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white me-2 rounded-3 shadow">{{ $buttonText }}</button>
                <a class="btn btn-secondary rounded-3 shadow" href="{{ Session::get('programare_return_url') }}">Renunță</a>
            </div>
        </div>
    </div>
</div>
