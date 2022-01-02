@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 mb-0">

        <div class="row mb-5 d-flex text-center" style="">
            <div class="col-12">
                <h6 class="m-0">
                    Decizia Consiliului Național al C.M.D.R. 16 06 2007
                </h6>
                <h3 class="m-0">CHESTIONAR EVALUARE STARE GENERALĂ</h3>
                CITIȚI CU ATENȚIE ȘI COMPLETAȚI CORECT *
            </div>
        </div>

        <div class="row mb-5 rounded-3 d-flex align-items-center" style="">
            <div class="col-auto">
                Nume
                <b>{{ $fisa_de_tratament->nume }}</b>,
                sex
                <b>{{ $fisa_de_tratament->sex }}</b>,
                data nașterii
                @if ($fisa_de_tratament->varsta)
                    <b>{{ \Carbon\Carbon::now()->subYears($fisa_de_tratament->varsta)->year }}</b>,
                @endif
                C.N.P.
                <b>{{ $fisa_de_tratament->cnp }}</b>

                {{-- Este necesar de transmis si fisa pentru care se completeaza chestionarul --}}
                <input
                    type="hidden"
                    name="fisa_de_tratament_id"
                    value="{{ $fisa_de_tratament->id }}">
            </div>
        </div>


        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="me-4">
                    Este posibil să fiți gravidă?
                </div>
                <div class="col-auto d-flex">
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="1" name="gravida" id="gravida_da"
                            {{ old('gravida', $chestionar->gravida) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gravida_da">
                            DA
                        </label>
                    </div>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="0" name="gravida" id="gravida_nu"
                            {{ old('gravida', $chestionar->gravida) == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gravida_nu">
                            NU
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row align-items-center">
                    <div class="col-md-auto">
                        <label for="varsta_sarcina" class="col-form-label">dacă sunteți gravidă ce vârstă are sarcina?</label>
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
                        <label for="data_menstruatie" class="col-form-label">data ultimei menstruații</label>
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

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Suferiți de alergii sau intoleranțe medicamentoase sau nemedicamentoase?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="alergii_intolerante" id="alergii_intolerante_da"
                                {{ old('alergii_intolerante', $chestionar->alergii_intolerante) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="alergii_intolerante_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="alergii_intolerante" id="alergii_intolerante_nu"
                                {{ old('alergii_intolerante', $chestionar->alergii_intolerante) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="alergii_intolerante_nu">
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

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Urmați vreun tratament medical (medicamentos, fitoterapie, homeopatie)?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="tratament_medical" id="tratament_medical_da"
                                {{ old('tratament_medical', $chestionar->tratament_medical) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratament_medical_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="tratament_medical" id="tratament_medical_nu"
                                {{ old('tratament_medical', $chestionar->tratament_medical) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratament_medical_nu">
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

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Ați urmat vreun tratament cu antibiotice în ultimele două săptămâni?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="tratament_antibiotice" id="tratament_antibiotice_da"
                                {{ old('tratament_antibiotice', $chestionar->tratament_antibiotice) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratament_antibiotice_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="tratament_antibiotice" id="tratament_antibiotice_nu"
                                {{ old('tratament_antibiotice', $chestionar->tratament_antibiotice) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratament_antibiotice_nu">
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

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid">
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
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli vasculare:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="arteriopatii">
                                        arteriopatii
                                    </label>
                                    <input class="form-check-input" type="hidden" name="arteriopatii" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="arteriopatii" id="arteriopatii"
                                        {{ old('arteriopatii', $chestionar->arteriopatii) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="varice">
                                        varice
                                    </label>
                                    <input class="form-check-input" type="hidden" name="varice" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="varice" id="varice"
                                        {{ old('varice', $chestionar->varice) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="tromboflebite">
                                        (trombo)flebite
                                    </label>
                                    <input class="form-check-input" type="hidden" name="tromboflebite" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="tromboflebite" id="tromboflebite"
                                        {{ old('tromboflebite', $chestionar->tromboflebite) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="embolii">
                                        embolii
                                    </label>
                                    <input class="form-check-input" type="hidden" name="embolii" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="embolii" id="embolii"
                                        {{ old('embolii', $chestionar->embolii) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hipertensiune_arteriala">
                                        hipertensiune arterială
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hipertensiune_arteriala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hipertensiune_arteriala" id="hipertensiune_arteriala"
                                        {{ old('hipertensiune_arteriala', $chestionar->hipertensiune_arteriala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hipotensiune_arteriala">
                                        hipotensiune arterială
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hipotensiune_arteriala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hipotensiune_arteriala" id="hipotensiune_arteriala"
                                        {{ old('hipotensiune_arteriala', $chestionar->hipotensiune_arteriala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_vasculare_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_vasculare_altele"
                                            name="boli_vasculare_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_vasculare_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_vasculare_altele', $chestionar->boli_vasculare_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli ale plămânilor și ale căilor respiratorii:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="tbc">
                                        TBC
                                    </label>
                                    <input class="form-check-input" type="hidden" name="tbc" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="tbc" id="tbc"
                                        {{ old('tbc', $chestionar->tbc) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="bronsita_cronica">
                                        bronsită cronică
                                    </label>
                                    <input class="form-check-input" type="hidden" name="bronsita_cronica" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="bronsita_cronica" id="bronsita_cronica"
                                        {{ old('bronsita_cronica', $chestionar->bronsita_cronica) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="astm">
                                        astm
                                    </label>
                                    <input class="form-check-input" type="hidden" name="astm" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="astm" id="astm"
                                        {{ old('astm', $chestionar->astm) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="silicoza">
                                        silicoză
                                    </label>
                                    <input class="form-check-input" type="hidden" name="silicoza" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="silicoza" id="silicoza"
                                        {{ old('silicoza', $chestionar->silicoza) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_plamani_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_plamani_altele"
                                            name="boli_plamani_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_plamani_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_plamani_altele', $chestionar->boli_plamani_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli digestive:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="gastrita">
                                        gastrită
                                    </label>
                                    <input class="form-check-input" type="hidden" name="gastrita" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="gastrita" id="gastrita"
                                        {{ old('gastrita', $chestionar->gastrita) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="ulcer">
                                        ulcer
                                    </label>
                                    <input class="form-check-input" type="hidden" name="ulcer" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="ulcer" id="ulcer"
                                        {{ old('ulcer', $chestionar->ulcer) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="reflux_esofagian">
                                        reflux esofagian
                                    </label>
                                    <input class="form-check-input" type="hidden" name="reflux_esofagian" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="reflux_esofagian" id="reflux_esofagian"
                                        {{ old('reflux_esofagian', $chestionar->reflux_esofagian) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hernie_hiatala">
                                        hernie hiatală
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hernie_hiatala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hernie_hiatala" id="hernie_hiatala"
                                        {{ old('hernie_hiatala', $chestionar->hernie_hiatala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_digestive_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_digestive_altele"
                                            name="boli_digestive_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_digestive_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_digestive_altele', $chestionar->boli_digestive_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli hepatice:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hepatita">
                                        hepatită
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hepatita" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hepatita" id="hepatita"
                                        {{ old('hepatita', $chestionar->hepatita) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="ciroza">
                                        ciroză
                                    </label>
                                    <input class="form-check-input" type="hidden" name="ciroza" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="ciroza" id="ciroza"
                                        {{ old('ciroza', $chestionar->ciroza) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_hepatice_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_hepatice_altele"
                                            name="boli_hepatice_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_hepatice_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_hepatice_altele', $chestionar->boli_hepatice_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli renale:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="insuficienta_renala">
                                        insuficiență renală
                                    </label>
                                    <input class="form-check-input" type="hidden" name="insuficienta_renala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="insuficienta_renala" id="insuficienta_renala"
                                        {{ old('insuficienta_renala', $chestionar->insuficienta_renala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_renale_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_renale_altele"
                                            name="boli_renale_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_renale_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_renale_altele', $chestionar->boli_renale_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli metabolice:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="diabet_zaharat">
                                        diabet zaharat
                                    </label>
                                    <input class="form-check-input" type="hidden" name="diabet_zaharat" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="diabet_zaharat" id="diabet_zaharat"
                                        {{ old('diabet_zaharat', $chestionar->diabet_zaharat) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="guta">
                                        gută
                                    </label>
                                    <input class="form-check-input" type="hidden" name="guta" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="guta" id="guta"
                                        {{ old('guta', $chestionar->guta) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_metabolice_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_metabolice_altele"
                                            name="boli_metabolice_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_metabolice_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_metabolice_altele', $chestionar->boli_metabolice_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli endocrine:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hipertiroidism">
                                        hipertiroidism
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hipertiroidism" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hipertiroidism" id="hipertiroidism"
                                        {{ old('hipertiroidism', $chestionar->hipertiroidism) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="feocromocitom">
                                        feocromocitom
                                    </label>
                                    <input class="form-check-input" type="hidden" name="feocromocitom" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="feocromocitom" id="feocromocitom"
                                        {{ old('feocromocitom', $chestionar->feocromocitom) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_endocrine_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_endocrine_altele"
                                            name="boli_endocrine_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_endocrine_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_endocrine_altele', $chestionar->boli_endocrine_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli neurologice:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="epilepsie">
                                        epilepsie
                                    </label>
                                    <input class="form-check-input" type="hidden" name="epilepsie" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="epilepsie" id="epilepsie"
                                        {{ old('epilepsie', $chestionar->epilepsie) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_neurologice_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_neurologice_altele"
                                            name="boli_neurologice_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_neurologice_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_neurologice_altele', $chestionar->boli_neurologice_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli ale scheletului:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="afectiuni_ale_coloanei">
                                        afecțiuni ale coloanei
                                    </label>
                                    <input class="form-check-input" type="hidden" name="afectiuni_ale_coloanei" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="afectiuni_ale_coloanei" id="afectiuni_ale_coloanei"
                                        {{ old('afectiuni_ale_coloanei', $chestionar->afectiuni_ale_coloanei) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_ale_scheletului_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_ale_scheletului_altele"
                                            name="boli_ale_scheletului_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_ale_scheletului_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_ale_scheletului_altele', $chestionar->boli_ale_scheletului_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli psihice:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="depresii">
                                        depresii
                                    </label>
                                    <input class="form-check-input" type="hidden" name="depresii" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="depresii" id="depresii"
                                        {{ old('depresii', $chestionar->depresii) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="fobii">
                                        fobii
                                    </label>
                                    <input class="form-check-input" type="hidden" name="fobii" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="fobii" id="fobii"
                                        {{ old('fobii', $chestionar->fobii) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_psihice_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_psihice_altele"
                                            name="boli_psihice_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_psihice_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_psihice_altele', $chestionar->boli_psihice_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        boli hematologice:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="sangerari_echimoze">
                                        sângerați ușor sau faceți echimoze(vânătăi) la traumatiste minore sau periaj dentar
                                    </label>
                                    <input class="form-check-input" type="hidden" name="sangerari_echimoze" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="sangerari_echimoze" id="sangerari_echimoze"
                                        {{ old('sangerari_echimoze', $chestionar->sangerari_echimoze) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hemofilie">
                                        hemofilie
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hemofilie" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hemofilie" id="hemofilie"
                                        {{ old('hemofilie', $chestionar->hemofilie) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="anemie">
                                        anemie
                                    </label>
                                    <input class="form-check-input" type="hidden" name="anemie" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="anemie" id="anemie"
                                        {{ old('anemie', $chestionar->anemie) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="leucemie_limfom">
                                        leucemie, limfom
                                    </label>
                                    <input class="form-check-input" type="hidden" name="leucemie_limfom" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="leucemie_limfom" id="leucemie_limfom"
                                        {{ old('leucemie_limfom', $chestionar->leucemie_limfom) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="boli_hematologice_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="boli_hematologice_altele"
                                            name="boli_hematologice_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('boli_hematologice_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('boli_hematologice_altele', $chestionar->boli_hematologice_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="alte_boli" class="col-form-label">alte boli:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="alte_boli"
                            name="alte_boli"
                            class="form-control bg-white rounded-3 {{ $errors->has('alte_boli') ? 'is-invalid' : '' }}"
                            value="{{ old('alte_boli', $chestionar->alte_boli) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Suferiți de vreuna dintre următoarele boli infecțioase?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="boli_infectioase" id="boli_infectioase_da"
                                {{ old('boli_infectioase', $chestionar->boli_infectioase) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="boli_infectioase_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="boli_infectioase" id="boli_infectioase_nu"
                                {{ old('boli_infectioase', $chestionar->boli_infectioase) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="boli_infectioase_nu">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        sufăr de:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto d-flex">
                                <div class="me-4">
                                    hepatită cronică virală
                                </div>
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hepatita_cronica_virala_a">
                                        A
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hepatita_cronica_virala_a" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hepatita_cronica_virala_a" id="hepatita_cronica_virala_a"
                                        {{ old('hepatita_cronica_virala_a', $chestionar->hepatita_cronica_virala_a) == '1' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hepatita_cronica_virala_b">
                                        B
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hepatita_cronica_virala_b" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hepatita_cronica_virala_b" id="hepatita_cronica_virala_b"
                                        {{ old('hepatita_cronica_virala_b', $chestionar->hepatita_cronica_virala_b) == '1' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="hepatita_cronica_virala_c">
                                        C
                                    </label>
                                    <input class="form-check-input" type="hidden" name="hepatita_cronica_virala_c" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="hepatita_cronica_virala_c" id="hepatita_cronica_virala_c"
                                        {{ old('hepatita_cronica_virala_c', $chestionar->hepatita_cronica_virala_c) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto d-flex">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="infectie_cu_virusul_hiv">
                                        infecție cu virusul hiv
                                    </label>
                                    <input class="form-check-input" type="hidden" name="infectie_cu_virusul_hiv" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="infectie_cu_virusul_hiv" id="infectie_cu_virusul_hiv"
                                        {{ old('infectie_cu_virusul_hiv', $chestionar->infectie_cu_virusul_hiv) == '1' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="sida">
                                        SIDA
                                    </label>
                                    <input class="form-check-input" type="hidden" name="sida" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="sida" id="sida"
                                        {{ old('sida', $chestionar->sida) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="alte_infectii_cronice">
                                        Alte infecții cronice
                                    </label>
                                    <input class="form-check-input" type="hidden" name="alte_infectii_cronice" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="alte_infectii_cronice" id="alte_infectii_cronice"
                                        {{ old('alte_infectii_cronice', $chestionar->alte_infectii_cronice) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Ați primit vreodată sânge sau produse din sânge?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="primire_sange" id="primire_sange_da"
                                {{ old('primire_sange', $chestionar->primire_sange) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="primire_sange_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="primire_sange" id="primire_sange_nu"
                                {{ old('primire_sange', $chestionar->primire_sange) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="primire_sange_nu">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="primire_sange_cu_ce_ocazie" class="col-form-label">cu ce ocazie?</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="primire_sange_cu_ce_ocazie"
                            name="primire_sange_cu_ce_ocazie"
                            class="form-control bg-white rounded-3 {{ $errors->has('primire_sange_cu_ce_ocazie') ? 'is-invalid' : '' }}"
                            value="{{ old('primire_sange_cu_ce_ocazie', $chestionar->primire_sange_cu_ce_ocazie) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Vi s-au mai efectuat tratamente stomatologice?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="tratamente_stomatologice" id="tratamente_stomatologice_da"
                                {{ old('tratamente_stomatologice', $chestionar->tratamente_stomatologice) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratamente_stomatologice_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="tratamente_stomatologice" id="tratamente_stomatologice_nu"
                                {{ old('tratamente_stomatologice', $chestionar->tratamente_stomatologice) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tratamente_stomatologice_nu">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        mi s-au efectuat tratamente stomatologice:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="fara_anestezie">
                                        fără anestezie
                                    </label>
                                    <input class="form-check-input" type="hidden" name="fara_anestezie" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="fara_anestezie" id="fara_anestezie"
                                        {{ old('fara_anestezie', $chestionar->fara_anestezie) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="cu_anestezie_locala">
                                        cu anestezie locală
                                    </label>
                                    <input class="form-check-input" type="hidden" name="cu_anestezie_locala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="cu_anestezie_locala" id="cu_anestezie_locala"
                                        {{ old('cu_anestezie_locala', $chestionar->cu_anestezie_locala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="cu_anestezie_locala_si_sedare_inhalatorie">
                                        cu anestezie locală și sedare inhalatorie
                                    </label>
                                    <input class="form-check-input" type="hidden" name="cu_anestezie_locala_si_sedare_inhalatorie" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="cu_anestezie_locala_si_sedare_inhalatorie" id="cu_anestezie_locala_si_sedare_inhalatorie"
                                        {{ old('cu_anestezie_locala_si_sedare_inhalatorie', $chestionar->cu_anestezie_locala_si_sedare_inhalatorie) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="cu_anestezie_generala">
                                        cu anestezie generală
                                    </label>
                                    <input class="form-check-input" type="hidden" name="cu_anestezie_generala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="cu_anestezie_generala" id="cu_anestezie_generala"
                                        {{ old('cu_anestezie_generala', $chestionar->cu_anestezie_generala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-auto me-4">
                        La tratamentele și anesteziile stomatologice anterioare au apărut accidente sau incidente
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="accidente_sau_incidente" id="accidente_sau_incidente_da"
                                {{ old('accidente_sau_incidente', $chestionar->accidente_sau_incidente) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="accidente_sau_incidente_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="accidente_sau_incidente" id="accidente_sau_incidente_nu"
                                {{ old('accidente_sau_incidente', $chestionar->accidente_sau_incidente) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="accidente_sau_incidente_nu">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        au apărut:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="lesin">
                                        leșin
                                    </label>
                                    <input class="form-check-input" type="hidden" name="lesin" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="lesin" id="lesin"
                                        {{ old('lesin', $chestionar->lesin) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="greata">
                                        greață
                                    </label>
                                    <input class="form-check-input" type="hidden" name="greata" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="greata" id="greata"
                                        {{ old('greata', $chestionar->greata) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="alergii">
                                        alergii
                                    </label>
                                    <input class="form-check-input" type="hidden" name="alergii" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="alergii" id="alergii"
                                        {{ old('alergii', $chestionar->alergii) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <label class="col-form-label" for="accidente_sau_incidente_altele">
                                            altele
                                        </label>
                                    </div>
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="accidente_sau_incidente_altele"
                                            name="accidente_sau_incidente_altele"
                                            class="form-control bg-white rounded-3 {{ $errors->has('accidente_sau_incidente_altele') ? 'is-invalid' : '' }}"
                                            value="{{ old('accidente_sau_incidente_altele', $chestionar->accidente_sau_incidente_altele) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-auto me-4">
                        Vi s-au efectuat intervenții chirurgicale?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="interventii_chirurgicale" id="interventii_chirurgicale_da"
                                {{ old('interventii_chirurgicale', $chestionar->interventii_chirurgicale) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="interventii_chirurgicale_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="interventii_chirurgicale" id="interventii_chirurgicale_nu"
                                {{ old('interventii_chirurgicale', $chestionar->interventii_chirurgicale) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="interventii_chirurgicale_nu">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="interventii_chirurgicale_detaliat" class="col-form-label">mi s-au efectuat următoarele intervenții chirurgicale:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="interventii_chirurgicale_detaliat"
                            name="interventii_chirurgicale_detaliat"
                            class="form-control bg-white rounded-3 {{ $errors->has('interventii_chirurgicale_detaliat') ? 'is-invalid' : '' }}"
                            value="{{ old('interventii_chirurgicale_detaliat', $chestionar->interventii_chirurgicale_detaliat) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5">
                <div class="row">
                    <div class="col-md-auto">
                        am primit următoarele tipuri de anestezie:
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="anestezie_loco_regionala">
                                        loco-regională
                                    </label>
                                    <input class="form-check-input" type="hidden" name="anestezie_loco_regionala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="anestezie_loco_regionala" id="anestezie_loco_regionala"
                                        {{ old('anestezie_loco_regionala', $chestionar->anestezie_loco_regionala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="anestezie_sedare_inhalatorie">
                                        anestezie sedare inhalatorie
                                    </label>
                                    <input class="form-check-input" type="hidden" name="anestezie_sedare_inhalatorie" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="anestezie_sedare_inhalatorie" id="anestezie_sedare_inhalatorie"
                                        {{ old('anestezie_sedare_inhalatorie', $chestionar->anestezie_sedare_inhalatorie) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="anestezie_sedare_intravenoasa">
                                        sedare intravenoasă
                                    </label>
                                    <input class="form-check-input" type="hidden" name="anestezie_sedare_intravenoasa" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="anestezie_sedare_intravenoasa" id="anestezie_sedare_intravenoasa"
                                        {{ old('anestezie_sedare_intravenoasa', $chestionar->anestezie_sedare_intravenoasa) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-check me-4">
                                    <label class="form-check-label" for="anestezie_generala">
                                        generală
                                    </label>
                                    <input class="form-check-input" type="hidden" name="anestezie_generala" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" name="anestezie_generala" id="anestezie_generala"
                                        {{ old('anestezie_generala', $chestionar->anestezie_generala) == '1' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="me-4">
                    Fumați
                </div>
                <div class="col-auto d-flex">
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="1" name="fumat" id="fumat_da"
                            {{ old('fumat', $chestionar->fumat) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="fumat_da">
                            DA
                        </label>
                    </div>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="0" name="fumat" id="fumat_nu"
                            {{ old('fumat', $chestionar->fumat) == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="fumat_nu">
                            NU
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="fumat_nr_tigari" class="col-form-label">fumez</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="fumat_nr_tigari"
                            name="fumat_nr_tigari"
                            class="form-control bg-white rounded-3 {{ $errors->has('fumat_nr_tigari') ? 'is-invalid' : '' }}"
                            value="{{ old('fumat_nr_tigari', $chestionar->fumat_nr_tigari) }}">
                    </div>
                    <div class="col-auto">
                        <label for="fumat_nr_tigari" class="col-form-label">
                            țigarete (țigarete, pipă) pe zi de
                        </label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="fumat_nr_ani"
                            name="fumat_nr_ani"
                            class="form-control bg-white rounded-3 {{ $errors->has('fumat_nr_ani') ? 'is-invalid' : '' }}"
                            value="{{ old('fumat_nr_ani', $chestionar->fumat_nr_ani) }}">
                    </div>
                    <div class="col-auto">
                        <label for="fumat_nr_ani" class="col-form-label">
                            ani
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="me-4">
                    Consumați regulat băuturi alcolice
                </div>
                <div class="col-auto d-flex">
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="1" name="bauturi_alcolice" id="bauturi_alcolice_da"
                            {{ old('bauturi_alcolice', $chestionar->bauturi_alcolice) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bauturi_alcolice_da">
                            DA
                        </label>
                    </div>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="0" name="bauturi_alcolice" id="bauturi_alcolice_nu"
                            {{ old('bauturi_alcolice', $chestionar->bauturi_alcolice) == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bauturi_alcolice_nu">
                            NU
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="bauturi_alcolice_tip" class="col-form-label">ce tip?</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="bauturi_alcolice_tip"
                            name="bauturi_alcolice_tip"
                            class="form-control bg-white rounded-3 {{ $errors->has('bauturi_alcolice_tip') ? 'is-invalid' : '' }}"
                            value="{{ old('bauturi_alcolice_tip', $chestionar->bauturi_alcolice_tip) }}">
                    </div>
                    <div class="col-auto">
                        <label for="bauturi_alcolice_cantitate" class="col-form-label">
                            ce cantitate?
                        </label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="bauturi_alcolice_cantitate"
                            name="bauturi_alcolice_cantitate"
                            class="form-control bg-white rounded-3 {{ $errors->has('bauturi_alcolice_cantitate') ? 'is-invalid' : '' }}"
                            value="{{ old('bauturi_alcolice_cantitate', $chestionar->bauturi_alcolice_cantitate) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row align-items-center">
                    <div class="col-auto">
                        aveți probleme dacă întrerupeți consumul?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="bauturi_alcolice_probleme" id="bauturi_alcolice_probleme_da"
                                {{ old('bauturi_alcolice_probleme', $chestionar->bauturi_alcolice_probleme) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="bauturi_alcolice_probleme_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="bauturi_alcolice_probleme" id="bauturi_alcolice_probleme_nu"
                                {{ old('bauturi_alcolice_probleme', $chestionar->bauturi_alcolice_probleme) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="bauturi_alcolice_probleme_nu">
                                NU
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="me-4">
                    Consumați droguri?
                </div>
                <div class="col-auto d-flex">
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="1" name="droguri" id="droguri_da"
                            {{ old('droguri', $chestionar->droguri) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="droguri_da">
                            DA
                        </label>
                    </div>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="0" name="droguri" id="droguri_nu"
                            {{ old('droguri', $chestionar->droguri) == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="droguri_nu">
                            NU
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="droguri_tip" class="col-form-label">ce tip?</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="droguri_tip"
                            name="droguri_tip"
                            class="form-control bg-white rounded-3 {{ $errors->has('droguri_tip') ? 'is-invalid' : '' }}"
                            value="{{ old('droguri_tip', $chestionar->droguri_tip) }}">
                    </div>
                    <div class="col-auto">
                        <label for="droguri_cantitate" class="col-form-label">
                            ce cantitate?
                        </label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="droguri_cantitate"
                            name="droguri_cantitate"
                            class="form-control bg-white rounded-3 {{ $errors->has('droguri_cantitate') ? 'is-invalid' : '' }}"
                            value="{{ old('droguri_cantitate', $chestionar->droguri_cantitate) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row align-items-center">
                    <div class="col-auto">
                        sunteți dependent?
                    </div>
                    <div class="col-auto d-flex">
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="1" name="droguri_dependenta" id="droguri_dependenta_da"
                                {{ old('droguri_dependenta', $chestionar->droguri_dependenta) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="droguri_dependenta_da">
                                DA
                            </label>
                        </div>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="radio" value="0" name="droguri_dependenta" id="droguri_dependenta_nu"
                                {{ old('droguri_dependenta', $chestionar->droguri_dependenta) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="droguri_dependenta_nu">
                                NU
                            </label>
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
