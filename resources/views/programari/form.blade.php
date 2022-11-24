@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="programare">
    <div class="col-lg-12 mb-0">
        <div class="row mb-0 align-items-center">
            <div class="col-lg-5 py-1 mb-4 rounded-3" style="background-color: rgb(213, 255, 255)">
                <script type="application/javascript">
                    fisaDeTratamentIdVechi={!! json_encode(old('fisa_de_tratament_id', ($programare->fisa_de_tratament->id ?? ""))) !!}
                    fiseDeTratament={!! json_encode($fise_de_tratament) !!}
                </script>
                <h4 class="text-center text-white rounded-3" style="background-color: darkcyan">Pacient înregistrat</h4>
                <label for="fisa_de_tratament_id" class="mb-0 ps-3">Fișa de tratament:</label>
                {{-- <select name="fisa_de_tratament_id"
                    class="form-select bg-white rounded-pill {{ $errors->has('fisa_de_tratament_id') ? 'is-invalid' : '' }}"
                >
                        <option value='' selected></option>
                    @foreach ($fise_de_tratament as $fisa_de_tratament)
                        <option
                            value='{{ $fisa_de_tratament->id }}'
                            {{ ($fisa_de_tratament->id == old('fisa_de_tratament_id', $programare->fisa_de_tratament_id)) ? 'selected' : '' }}
                        >{{ $fisa_de_tratament->fisa_numar }} - {{ $fisa_de_tratament->nume }} </option>
                    @endforeach
                </select> --}}
                {{-- <small class="ps-3">
                    *daca clientul are deja o fisa creata
                </small> --}}
                        <input
                            type="hidden"
                            v-model="fisa_de_tratament_id"
                            name="fisa_de_tratament_id">
                        <input
                            type="text"
                            v-model="fisa_de_tratament_nume_autocomplete"
                            v-on:keyup="autoComplete()"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('fisa_de_tratament_nume_autocomplete') ? 'is-invalid' : '' }}"
                            name="fisa_de_tratament_nume_autocomplete"
                            placeholder=""
                            value="{{ old('fisa_de_tratament_nume_autocomplete') }}"
                            autocomplete="off"
                            required>
                        <div v-cloak v-if="fise_de_tratament_lista_autocomplete.length" class="panel-footer">
                            <div class="list-group">
                                    <button class="list-group-item list-group-item list-group-item-action py-0"
                                        v-for="fisa_de_tratament in fise_de_tratament_lista_autocomplete"
                                        v-on:click="
                                            fisa_de_tratament_nume_autocomplete = fisa_de_tratament.nume;
                                            fisa_de_tratament_id = fisa_de_tratament.id;

                                            fise_de_tratament_lista_autocomplete = ''
                                        ">
                                            @{{ fisa_de_tratament.fisa_numar }} - @{{ fisa_de_tratament.nume }}
                                    </button>
                                </li>
                            </div>
                        </div>
                        <small class="ps-3">
                            Introdu minim 3 caractere
                        </small>
            </div>
            <div class="col-lg-1 mb-4 text-center">
                SAU
            </div>
            <div class="col-lg-6 py-2 mb-4 rounded-3" style="background-color: rgb(213, 255, 255)">
                <h4 class="text-center text-white rounded-3" style="background-color: darkcyan">Pacient nou</h4>

                <div class="row">
                    <div class="col-lg-7">
                        <label for="nume" class="mb-0 ps-3">Nume:</label>
                        <input
                            type="text"
                            class="form-control bg-white rounded-pill {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                            name="nume"
                            placeholder=""
                            value="{{ old('nume', $programare->nume) }}"
                            required>
                    </div>
                    <div class="col-lg-5">
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
            <div class="col-lg-2 mb-0">
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
            <div class="col-lg-2 mb-0">
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
            <div class="col-lg-6 mb-0">
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
        </div>

        <div class="row mb-5 align-items-center justify-content-center">
            <div class="col-lg-12 text-end"  id="">
                <input class="btn btn-primary text-white me-2 rounded-3 shadow" type="button" value="Adaugă Rezultatele Consultației" v-on:click="rezultate_consultatie = !rezultate_consultatie">
            </div>
        </div>


        <script type="application/javascript">
            rezultateConsultatie = @json(old('rezultateConsultatie') ?? false);
        </script>
        <div v-cloak v-if="rezultate_consultatie" class="row justify-content-center">
                        {{-- Daca validarea da eroare, se intoarce inapoi cu modificariGlobale=true, ca sa nu fie ascunse optiunile de modificari globale --}}
                        <input
                            type="hidden"
                            name="rezultateConsultatie"
                            value="true">

            <div class="col-lg-9 mb-4">
                <label for="tratament" class="mb-0 ps-3">Tratament:</label>
                <textarea class="form-control bg-white {{ $errors->has('tratament') ? 'is-invalid' : '' }}"
                    name="tratament" rows="3">{{ old('tratament', $programare->tratament) }}</textarea>
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
                    name="observatii" rows="3">{{ old('observatii', $programare->observatii) }}</textarea>
            </div>
            <div class="col-lg-12 mb-4">
                <label for="semnatura" class="mb-0 ps-3">Semnătura:</label>
                {{-- @if ($programare->semnatura)
                    <br>
                    Semnătura actuala este:
                    <img src="{{ $programare->semnatura }}"/>
                    <br>
                    Dacă dorești să o schimbi, desenează alta:
                @endif --}}
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
                <a class="btn btn-secondary rounded-3 shadow" href="{{ Session::get('programare_return_url') }}">Renunță</a>
            </div>
        </div>
    </div>
</div>
