@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 mb-0">

        <div class="row mb-4 py-2" style="background-color: rgb(221, 255, 252)">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="me-4">
                    Este posibil să fiți gravidă?
                </div>
                <div class="col-auto d-flex">
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="1" name="gravida" id="gravida"
                            {{ old('gravida', $chestionar->gravida) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gravida">
                            DA
                        </label>
                    </div>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="0" name="gravida" id="gravida"
                            {{ old('gravida', $chestionar->gravida) == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gravida">
                            NU
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row align-items-center">
                    <div class="col-md-auto">
                        <label for="varsta_sarcina" class="col-form-label">Dacă sunteți gravidă ce vârstă are sarcina?</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="varsta_sarcina"
                            name="varsta_sarcina"
                            class="form-control bg-white rounded-3 {{ $errors->has('varsta_sarcina') ? 'is-invalid' : '' }}"
                            value="{{ old('varsta_sarcina', $chestionar->varsta_sarcina) }}">
                    </div>
                    <div class="col-auto">
                        <label for="varsta_sarcina" class="col-form-label">
                            săptămâni
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="data_menstruatie" class="col-form-label">Data ultimei menstruații</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="data_menstruatie"
                            name="data_menstruatie"
                            class="form-control bg-white rounded-3 {{ $errors->has('data_menstruatie') ? 'is-invalid' : '' }}"
                            value="{{ old('data_menstruatie', $chestionar->data_menstruatie) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 py-2" style="background-color: rgb(221, 255, 252)">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Suferiți de alergii sau intoleranțe medicamentoase sau nemedicamentoase?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="alergii_intolerante" id="alergii_intolerante"
                                {{ old('alergii_intolerante', $chestionar->alergii_intolerante) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="alergii_intolerante">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="alergii_intolerante" id="alergii_intolerante"
                                {{ old('alergii_intolerante', $chestionar->alergii_intolerante) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="alergii_intolerante">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="alergic_la" class="col-form-label">sunt alergic(a) la:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="alergic_la"
                            name="alergic_la"
                            class="form-control bg-white rounded-3 {{ $errors->has('alergic_la') ? 'is-invalid' : '' }}"
                            value="{{ old('alergic_la', $chestionar->alergic_la) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row align-items-center">
                    <div class="col-md-auto">
                        <label for="intoleranta_la" class="col-form-label">am intoleranță la:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="intoleranta_la"
                            name="intoleranta_la"
                            class="form-control bg-white rounded-3 {{ $errors->has('intoleranta_la') ? 'is-invalid' : '' }}"
                            value="{{ old('intoleranta_la', $chestionar->intoleranta_la) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 py-2" style="background-color: rgb(221, 255, 252)">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Urmați vreun tratament medical (medicamentos, fitoterapie, homeopatie)?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="tratament_medical" id="tratament_medical"
                                {{ old('tratament_medical', $chestionar->tratament_medical) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratament_medical">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="tratament_medical" id="tratament_medical"
                                {{ old('tratament_medical', $chestionar->tratament_medical) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratament_medical">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="in_tratament_cu" class="col-form-label">sunt în tratament cu (produsul, doza):</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="in_tratament_cu"
                            name="in_tratament_cu"
                            class="form-control bg-white rounded-3 {{ $errors->has('in_tratament_cu') ? 'is-invalid' : '' }}"
                            value="{{ old('in_tratament_cu', $chestionar->in_tratament_cu) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 py-2" style="background-color: rgb(221, 255, 252)">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Ați urmat vreun tratament cu antibiotice în ultimele două săptămâni?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="tratament_antibiotice" id="tratament_antibiotice"
                                {{ old('tratament_antibiotice', $chestionar->tratament_antibiotice) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratament_antibiotice">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="tratament_antibiotice" id="tratament_antibiotice"
                                {{ old('tratament_antibiotice', $chestionar->tratament_antibiotice) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratament_antibiotice">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-auto">
                        <label for="antibiotic" class="col-form-label">am urmat un tratament cu antibioticul</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="antibiotic"
                            name="antibiotic"
                            class="form-control bg-white rounded-3 {{ $errors->has('antibiotic') ? 'is-invalid' : '' }}"
                            value="{{ old('antibiotic', $chestionar->antibiotic) }}">
                    </div>
                    <div class="col-auto">
                        <label for="doza" class="col-form-label">doza</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="doza"
                            name="doza"
                            class="form-control bg-white rounded-3 {{ $errors->has('doza') ? 'is-invalid' : '' }}"
                            value="{{ old('doza', $chestionar->doza) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-auto">
                        <label for="afectiunea" class="col-form-label">pentru afecțiunea</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="afectiunea"
                            name="afectiunea"
                            class="form-control bg-white rounded-3 {{ $errors->has('afectiunea') ? 'is-invalid' : '' }}"
                            value="{{ old('afectiunea', $chestionar->afectiunea) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 py-2" style="background-color: rgb(221, 255, 252)">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-auto me-4">
                        Suferiți sau ați suferit de vreo afecțiune acută sau cronică?
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-auto">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="hidden" name="boli_profesionale" value="0" />
                            <input class="form-check-input" type="checkbox" value="1" name="boli_profesionale" id="boli_profesionale"
                                {{ old('boli_profesionale', $chestionar->boli_profesionale) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="boli_profesionale">
                               boli profesionale
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli de inimă:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="angina_pectorala">
                                        angina pectorală
                                    </label>
                                    <input class="form-check-input" type="hidden" name="angina_pectorala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="angina_pectorala" id="angina_pectorala"
                                        {{ old('angina_pectorala', $chestionar->angina_pectorala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="infarct_miocardic">
                                        infarct miocardic
                                    </label>
                                    <input class="form-check-input" type="hidden" name="infarct_miocardic" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="infarct_miocardic" id="infarct_miocardic"
                                        {{ old('infarct_miocardic', $chestionar->infarct_miocardic) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="vulvulopatii">
                                        vulvulopatii
                                    </label>
                                    <input class="form-check-input" type="hidden" name="vulvulopatii" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="vulvulopatii" id="vulvulopatii"
                                        {{ old('vulvulopatii', $chestionar->vulvulopatii) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="endocardita">
                                        endocardita
                                    </label>
                                    <input class="form-check-input" type="hidden" name="endocardita" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="endocardita" id="endocardita"
                                        {{ old('endocardita', $chestionar->endocardita) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="durere_sufocare_palpitatii">
                                        durere sufocare sau palpitații la efort
                                    </label>
                                    <input class="form-check-input" type="hidden" name="durere_sufocare_palpitatii" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="durere_sufocare_palpitatii" id="durere_sufocare_palpitatii"
                                        {{ old('durere_sufocare_palpitatii', $chestionar->durere_sufocare_palpitatii) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_de_inima_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_de_inima_altele"
                                            name="boli_de_inima_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_de_inima_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_de_inima_altele', $chestionar->boli_de_inima_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white me-3 rounded-3">{{ $buttonText }}</button>
                <a class="btn btn-secondary rounded-3" href="/fise-de-tratament">Renunță</a>
            </div>
        </div>
    </div>
</div>
