@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 mb-0">

        <div class="row mb-5" style="">
            <div class="col-11 mx-auto bg-white rounded-3 py-2">
                <h5 class="m-0 text-center">
                    Decizie nr. 15/2016
                    <br>
                    privind elementele acordului pacientului informat
                    <br>
                    <br>
                    Publicată în Monitorul Oficial, Partea I nr. 1040 din 23.12.2016
                </h5>

                <br>

                <p>
                    În temeiul art. 534 din Legea nr. 95/2006 privind reforma în domeniul sănătății, republicată, cu modificările și completările ulterioare, având în vedere prevederile art. 660 din același act normativ,
                </p>
                <p>
                    Consiliul național al Colegiului Medicilor Dentiști din România adoptă următoarea decizie:
                </p>
                <b>Art. 1.</b> - Pentru a supune pacientul la metode de prevenție, diagnostic și tratament, cu potențial de risc pentru acesta, medicul dentist va solicita acordul scris, în condițiile legii.
                <br>
                <b>Art. 2.</b> - Acordul scris al pacientului, necesar potrivit art. 660 din Legea nr. 95/2006 privind reforma în domeniul sănătății, republicată, cu modificările și completările ulterioare, trebuie să conțină în mod obligatoriu cel puțin următoarele elemente:
                <ul>
                    <li>numele, prenumele și domiciliul sau, după caz, reședința pacientului;</li>
                    <li>actul medical la care urmează a fi supus;</li>
                    <li>descrierea, pe scurt, a informațiilor ce i-au fost furnizate de către medicul dentist;</li>
                    <li>acordul exprimat fără echivoc pentru efectuarea actului medical;</li>
                    <li>semnătura și data exprimării acordului.</li>
                </ul>
                <b>Art. 3.</b> - Elementele acordului pacientului informat sunt prevăzute în modelul recomandat din anexa care face parte integrantă din prezenta decizie.
                <br>
                <b>Art. 4.</b> - Acordul scris constituie anexă la documentația de evidență primară.
                <br>
                <b>Art. 5.</b> - La data intrării în vigoare a prezentei decizii se abrogă Decizia Consiliului național al Colegiului Medicilor Dentiști din România nr. 2/2013, nepublicată în Monitorul Oficial al României, Partea I.
                <br>
                <b>Art. 6.</b> - Prezenta decizie se publică în Monitorul Oficial al României, Partea I.

                <br>
                <br>

                <h5 class="m-0 text-center">
                    Președintele Colegiului Medicilor Dentiști din România,
                    <br>
                    Ecaterina IONESCU
                </h5>
                București, 19 noiembrie 2016.
                <br>
                Nr. 15.
                <br>

            </div>
        </div>


        <div class="row mb-4" style="">
            <div class="col-12 text-center">
                <span class="fs-2 text-white px-2 rounded-3" style="background-color:#e66800">
                    Acordul pacientului informat
                </span>
            </div>
        </div>


        {{-- Este necesar de transmis si fisa pentru care se completeaza chestionarul --}}
        <input
            type="hidden"
            name="fisa_de_tratament_id"
            value="{{ $fisa_de_tratament->id }}">


        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <div class="col-lg-12 d-flex align-items-left">
                1. Date pacient
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="nume" class="col-form-label">1.1. Nume și prenume:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="nume"
                            name="nume"
                            class="form-control bg-white rounded-3 {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                            value="{{ old('nume', $chestionar->nume) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="domiciliu" class="col-form-label">1.2. Domiciliu/reședință:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="domiciliu"
                            name="domiciliu"
                            class="form-control bg-white rounded-3 {{ $errors->has('domiciliu') ? 'is-invalid' : '' }}"
                            value="{{ old('domiciliu', $chestionar->domiciliu) }}">
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid; background-color:#fff9f5">
            <div class="col-lg-12 d-flex align-items-left">
                2. Reprezentantul legal al pacientului*
                <br>
                *Se utilizează în cazul minorilor sau al majorilor fără discernământ.
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="reprezentant_legal_nume" class="col-form-label">2.1. Nume și prenume:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="reprezentant_legal_nume"
                            name="reprezentant_legal_nume"
                            class="form-control bg-white rounded-3 {{ $errors->has('reprezentant_legal_nume') ? 'is-invalid' : '' }}"
                            value="{{ old('reprezentant_legal_nume', $chestionar->reprezentant_legal_nume) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="reprezentant_legal_domiciliu" class="col-form-label">2.2. Domiciliu/reședință:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="reprezentant_legal_domiciliu"
                            name="reprezentant_legal_domiciliu"
                            class="form-control bg-white rounded-3 {{ $errors->has('reprezentant_legal_domiciliu') ? 'is-invalid' : '' }}"
                            value="{{ old('reprezentant_legal_domiciliu', $chestionar->reprezentant_legal_domiciliu) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-md-auto">
                        <label for="reprezentant_legal_calitate" class="col-form-label">2.3. Calitate:</label>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            id="reprezentant_legal_calitate"
                            name="reprezentant_legal_calitate"
                            class="form-control bg-white rounded-3 {{ $errors->has('reprezentant_legal_calitate') ? 'is-invalid' : '' }}"
                            value="{{ old('reprezentant_legal_calitate', $chestionar->reprezentant_legal_calitate) }}">
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <div class="col-md-auto">
                <label for="act_medical" class="col-form-label">3. Actul medical<br>(descriere)</label>
            </div>
            <div class="col">
                <textarea
                    id="act_medical"
                    name="act_medical"
                    class="form-control bg-white rounded-3 {{ $errors->has('act_medical') ? 'is-invalid' : '' }}"
                    {{-- value="{{ old('act_medical', $chestionar->act_medical) }}" --}}
                    rows="3"
                >{{ old('act_medical', $chestionar->act_medical) }}</textarea>
            </div>
        </div>


        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid; background-color:#fff9f5">
            <div class="col-lg-12 mb-2 d-flex align-items-left">
                4. Au fost furnizate pacientului următoarele informații în legătura cu actul medical:
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            4.1. Date despre starea de sănătate
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="date_stare_sanatate" id="date_stare_sanatate_da"
                                    {{ old('date_stare_sanatate', $chestionar->date_stare_sanatate) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="date_stare_sanatate_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="date_stare_sanatate" id="date_stare_sanatate_nu"
                                    {{ old('date_stare_sanatate', $chestionar->date_stare_sanatate) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="date_stare_sanatate_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            4.2. Diagnostic
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="diagnostic" id="diagnostic_da"
                                    {{ old('diagnostic', $chestionar->diagnostic) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="diagnostic_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="diagnostic" id="diagnostic_nu"
                                    {{ old('diagnostic', $chestionar->diagnostic) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="diagnostic_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            4.3. Prognostic
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="prognostic" id="prognostic_da"
                                    {{ old('prognostic', $chestionar->prognostic) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="prognostic_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="prognostic" id="prognostic_nu"
                                    {{ old('prognostic', $chestionar->prognostic) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="prognostic_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            4.4. Natura și scopul actului medical propus
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="natura_scop_act_medical" id="natura_scop_act_medical_da"
                                    {{ old('natura_scop_act_medical', $chestionar->natura_scop_act_medical) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="natura_scop_act_medical_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="natura_scop_act_medical" id="natura_scop_act_medical_nu"
                                    {{ old('natura_scop_act_medical', $chestionar->natura_scop_act_medical) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="natura_scop_act_medical_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            4.5. Intervențiile și strategia terapeutică propuse
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="interventie_si_strategie" id="interventie_si_strategie_da"
                                    {{ old('interventie_si_strategie', $chestionar->interventie_si_strategie) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="interventie_si_strategie_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="interventie_si_strategie" id="interventie_si_strategie_nu"
                                    {{ old('interventie_si_strategie', $chestionar->interventie_si_strategie) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="interventie_si_strategie_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <div class="d-flex align-items-left">
                            <div class="me-4">
                                4.6. Beneficiile și consecințele actului medical, insistându-se asupra următoarelor:
                            </div>
                            <div class="col-auto d-flex">
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" value="1" name="beneficii_si_consecinte" id="beneficii_si_consecinte_da"
                                        {{ old('beneficii_si_consecinte', $chestionar->beneficii_si_consecinte) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="beneficii_si_consecinte_da">
                                        DA
                                    </label>
                                </div>
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" value="0" name="beneficii_si_consecinte" id="beneficii_si_consecinte_nu"
                                        {{ old('beneficii_si_consecinte', $chestionar->beneficii_si_consecinte) == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="beneficii_si_consecinte_nu">
                                        NU
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="ps-4">
                            <textarea
                                id="beneficii_si_consecinte_detaliat"
                                name="beneficii_si_consecinte_detaliat"
                                class="form-control bg-white rounded-3 {{ $errors->has('beneficii_si_consecinte_detaliat') ? 'is-invalid' : '' }}"
                                rows="3"
                            >{{ old('beneficii_si_consecinte_detaliat', $chestionar->beneficii_si_consecinte_detaliat) }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <div class="d-flex align-items-left">
                            <div class="me-4">
                                4.7. Riscurile potențiale ale actului medical, insistându-se asupra următoarelor:
                            </div>
                            <div class="col-auto d-flex">
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" value="1" name="riscuri" id="riscuri_da"
                                        {{ old('riscuri', $chestionar->riscuri) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="riscuri_da">
                                        DA
                                    </label>
                                </div>
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" value="0" name="riscuri" id="riscuri_nu"
                                        {{ old('riscuri', $chestionar->riscuri) == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="riscuri_nu">
                                        NU
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="ps-4">
                            <textarea
                                id="riscuri_detaliat"
                                name="riscuri_detaliat"
                                class="form-control bg-white rounded-3 {{ $errors->has('riscuri_detaliat') ? 'is-invalid' : '' }}"
                                rows="3"
                            >{{ old('riscuri_detaliat', $chestionar->riscuri_detaliat) }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <div class="d-flex align-items-left">
                            <div class="me-4">
                                4.8. Alternative viabile de tratament și riscurile acestora, insistându-se asupra următoarelor:
                            </div>
                            <div class="col-auto d-flex">
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" value="1" name="alternative_tratament" id="alternative_tratament_da"
                                        {{ old('alternative_tratament', $chestionar->alternative_tratament) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="alternative_tratament_da">
                                        DA
                                    </label>
                                </div>
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" value="0" name="alternative_tratament" id="alternative_tratament_nu"
                                        {{ old('alternative_tratament', $chestionar->alternative_tratament) == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="alternative_tratament_nu">
                                        NU
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="ps-4">
                            <textarea
                                id="alternative_tratament_detaliat"
                                name="alternative_tratament_detaliat"
                                class="form-control bg-white rounded-3 {{ $errors->has('alternative_tratament_detaliat') ? 'is-invalid' : '' }}"
                                rows="3"
                            >{{ old('alternative_tratament_detaliat', $chestionar->alternative_tratament_detaliat) }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            4.9. Riscurile neefectuării tratamentului
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="riscuri_neefectuare_tratament" id="riscuri_neefectuare_tratament_da"
                                    {{ old('riscuri_neefectuare_tratament', $chestionar->riscuri_neefectuare_tratament) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="riscuri_neefectuare_tratament_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="riscuri_neefectuare_tratament" id="riscuri_neefectuare_tratament_nu"
                                    {{ old('riscuri_neefectuare_tratament', $chestionar->riscuri_neefectuare_tratament) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="riscuri_neefectuare_tratament_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex align-items-left">
                        <div class="me-4">
                            4.10. Riscurile nerespectării recomandărilor medicale
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="riscuri_nerespectare_recomandari_medicale" id="riscuri_nerespectare_recomandari_medicale_da"
                                    {{ old('riscuri_nerespectare_recomandari_medicale', $chestionar->riscuri_nerespectare_recomandari_medicale) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="riscuri_nerespectare_recomandari_medicale_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="riscuri_nerespectare_recomandari_medicale" id="riscuri_nerespectare_recomandari_medicale_nu"
                                    {{ old('riscuri_nerespectare_recomandari_medicale', $chestionar->riscuri_nerespectare_recomandari_medicale) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="riscuri_nerespectare_recomandari_medicale_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <div class="col-lg-12 mb-2 d-flex align-items-left">
                5. Consimțământ pentru recoltare
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-left">
                        <div class="me-4">
                            5.1. Pacientul este de acord cu recoltarea, păstrarea și folosirea produselor biologice
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="consimtamant_recoltare_pastrare_folosire_produse_biologice" id="consimtamant_recoltare_pastrare_folosire_produse_biologice_da"
                                    {{ old('consimtamant_recoltare_pastrare_folosire_produse_biologice', $chestionar->consimtamant_recoltare_pastrare_folosire_produse_biologice) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="consimtamant_recoltare_pastrare_folosire_produse_biologice_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="consimtamant_recoltare_pastrare_folosire_produse_biologice" id="consimtamant_recoltare_pastrare_folosire_produse_biologice_nu"
                                    {{ old('consimtamant_recoltare_pastrare_folosire_produse_biologice', $chestionar->consimtamant_recoltare_pastrare_folosire_produse_biologice) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="consimtamant_recoltare_pastrare_folosire_produse_biologice_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid; background-color:#fff9f5">
            <div class="col-lg-12 mb-2 d-flex align-items-left">
                6. Alte informații care au fost furnizate pacientului
            </div>
            <div class="col-lg-12 ps-5 align-items-left">
                <div class="row">
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            6.1. Informații despre serviciile medicale disponibile
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="informatii_servicii_medicale_disponibile" id="informatii_servicii_medicale_disponibile_da"
                                    {{ old('informatii_servicii_medicale_disponibile', $chestionar->informatii_servicii_medicale_disponibile) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="informatii_servicii_medicale_disponibile_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="informatii_servicii_medicale_disponibile" id="informatii_servicii_medicale_disponibile_nu"
                                    {{ old('informatii_servicii_medicale_disponibile', $chestionar->informatii_servicii_medicale_disponibile) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="informatii_servicii_medicale_disponibile_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            6.2. Informații despre identitatea și statutul profesional al personalului care îl va trata*
                            <br>
                            *Identificat în tabelul cu personalul medical care acordă îngrijiri de sănătate pacientului
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="informatii_identitatea_si_statutul_profesional_al_personalului" id="informatii_identitatea_si_statutul_profesional_al_personalului_da"
                                    {{ old('informatii_identitatea_si_statutul_profesional_al_personalului', $chestionar->informatii_identitatea_si_statutul_profesional_al_personalului) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="informatii_identitatea_si_statutul_profesional_al_personalului_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="informatii_identitatea_si_statutul_profesional_al_personalului" id="informatii_identitatea_si_statutul_profesional_al_personalului_nu"
                                    {{ old('informatii_identitatea_si_statutul_profesional_al_personalului', $chestionar->informatii_identitatea_si_statutul_profesional_al_personalului) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="informatii_identitatea_si_statutul_profesional_al_personalului_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 d-flex align-items-left">
                        <div class="me-4">
                            6.3. Informații despre regulile/practicile din unitatea medicală, pe care trebuie să le respecte
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="informatii_reguli_unitatea_medicala" id="informatii_reguli_unitatea_medicala_da"
                                    {{ old('informatii_reguli_unitatea_medicala', $chestionar->informatii_reguli_unitatea_medicala) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="informatii_reguli_unitatea_medicala_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="informatii_reguli_unitatea_medicala" id="informatii_reguli_unitatea_medicala_nu"
                                    {{ old('informatii_reguli_unitatea_medicala', $chestionar->informatii_reguli_unitatea_medicala) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="informatii_reguli_unitatea_medicala_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex align-items-left">
                        <div class="me-4">
                            6.4. Pacientul a fost încunoștințat că are dreptul la o a doua opinie medicală
                        </div>
                        <div class="col-auto d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="1" name="instiintare_a_doua_opinie_medicala" id="instiintare_a_doua_opinie_medicala_da"
                                    {{ old('instiintare_a_doua_opinie_medicala', $chestionar->instiintare_a_doua_opinie_medicala) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="instiintare_a_doua_opinie_medicala_da">
                                    DA
                                </label>
                            </div>
                            <div class="form-check me-4">
                                <input class="form-check-input" type="radio" value="0" name="instiintare_a_doua_opinie_medicala" id="instiintare_a_doua_opinie_medicala_nu"
                                    {{ old('instiintare_a_doua_opinie_medicala', $chestionar->instiintare_a_doua_opinie_medicala) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="instiintare_a_doua_opinie_medicala_nu">
                                    NU
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4 rounded-3" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="me-4">
                    7. Pacientul dorește să fie informat în continuare despre starea sa de sănătate
                </div>
                <div class="col-auto d-flex">
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="1" name="informare_in_continuare" id="informare_in_continuare_da"
                            {{ old('informare_in_continuare', $chestionar->informare_in_continuare) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="informare_in_continuare_da">
                            DA
                        </label>
                    </div>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="radio" value="0" name="informare_in_continuare" id="informare_in_continuare_nu"
                            {{ old('informare_in_continuare', $chestionar->informare_in_continuare) == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="informare_in_continuare_nu">
                            NU
                        </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4 rounded-3 align-items-center" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid; background-color:#fff9f5">
            <div class="col-lg-12 mb-2 d-flex align-items-left">
                I) ACCEPT EFECTUAREA ACTULUI MEDICAL
            </div>
            <div class="col-auto">
                I) Subsemnatul/(a)
            </div>
            <div class="col-auto">
                <input
                    type="text"
                    id="acceptare_subsemnat"
                    name="acceptare_subsemnat"
                    class="form-control bg-white rounded-3 {{ $errors->has('acceptare_subsemnat') ? 'is-invalid' : '' }}"
                    value="{{ old('acceptare_subsemnat', $chestionar->acceptare_subsemnat) }}">
            </div>
            <div class="col-auto">
                * declar că am înțeles toate informațiile furnizate de către
            </div>
            <div class="col-auto d-flex align-items-center">
                <input
                    type="text"
                    id="acceptare_informatii_furnizate_de"
                    name="acceptare_informatii_furnizate_de"
                    class="me-2 form-control bg-white rounded-3 {{ $errors->has('acceptare_informatii_furnizate_de') ? 'is-invalid' : '' }}"
                    value="{{ old('acceptare_informatii_furnizate_de', $chestionar->acceptare_informatii_furnizate_de) }}">
                **,
            </div>
            <div class="col-auto">
            </div>
            <div class="col-auto">
                mai sus-enumerate, că am prezentat medicului dentist doar informații adevărate și că îmi exprim acordul informat pentru efectuarea actului medical.
                <br>
                * Numele și prenumele pacientului/reprezentantului legal.
                <br>
                ** Numele și prenumele medicului dentist care a informat pacientul.
            </div>
            <div class="col-lg-12 mb-2 align-items-center">
                <vue-signature-pad
                    semnatura-veche="{{ old('acceptare_semnatura', ($chestionar->acceptare_semnatura ?? '')) }}"
                    nume-camp-db="acceptare_semnatura">
                </vue-signature-pad>
            </div>
            <div class="col-auto">
                Data
            </div>
            <div class="col-auto">
                <input
                    type="text"
                    id="acceptare_data"
                    name="acceptare_data"
                    class="form-control bg-white rounded-3 {{ $errors->has('acceptare_data') ? 'is-invalid' : '' }}"
                    value="{{ old('acceptare_data', $chestionar->acceptare_data) }}">
            </div>
            <div class="col-auto">
                ora
            </div>
            <div class="col-auto mb-2 d-flex align-items-center">
                <input
                    type="text"
                    id="acceptare_ora"
                    name="acceptare_ora"
                    class="me-2 form-control bg-white rounded-3 {{ $errors->has('acceptare_ora') ? 'is-invalid' : '' }}"
                    value="{{ old('acceptare_ora', $chestionar->acceptare_ora) }}">
            </div>
        </div>


        <div class="row mb-4 rounded-3 align-items-center" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <div class="col-lg-12 mb-2 d-flex align-items-left">
                II) REFUZ EFECTUAREA ACTULUI MEDICAL
            </div>
            <div class="col-auto">
                II) Subsemnatul/(a)
            </div>
            <div class="col-auto">
                <input
                    type="text"
                    id="refuz_subsemnat"
                    name="refuz_subsemnat"
                    class="form-control bg-white rounded-3 {{ $errors->has('refuz_subsemnat') ? 'is-invalid' : '' }}"
                    value="{{ old('refuz_subsemnat', $chestionar->refuz_subsemnat) }}">
            </div>
            <div class="col-auto">
                * declar că am înțeles toate informațiile furnizate de către
            </div>
            <div class="col-auto d-flex align-items-center">
                <input
                    type="text"
                    id="refuz_informatii_furnizate_de"
                    name="refuz_informatii_furnizate_de"
                    class="me-2 form-control bg-white rounded-3 {{ $errors->has('refuz_informatii_furnizate_de') ? 'is-invalid' : '' }}"
                    value="{{ old('refuz_informatii_furnizate_de', $chestionar->refuz_informatii_furnizate_de) }}">
                **,
            </div>
            <div class="col-auto">
            </div>
            <div class="col-auto">
                mai sus-enumerate, că mi s-au explicat consecințele refuzului actului medical și că îmi exprim refuzul pentru efectuarea actului medical.
                <br>
                * Numele și prenumele pacientului/reprezentantului legal.
                <br>
                ** Numele și prenumele medicului dentist care a informat pacientul.
            </div>
            <div class="col-lg-12 mb-2 align-items-center">
                <vue-signature-pad
                    semnatura-veche="{{ old('refuz_semnatura', ($chestionar->refuz_semnatura ?? '')) }}"
                    nume-camp-db="refuz_semnatura">
                </vue-signature-pad>
            </div>
            <div class="col-auto">
                Data
            </div>
            <div class="col-auto">
                <input
                    type="text"
                    id="refuz_data"
                    name="refuz_data"
                    class="form-control bg-white rounded-3 {{ $errors->has('refuz_data') ? 'is-invalid' : '' }}"
                    value="{{ old('refuz_data', $chestionar->refuz_data) }}">
            </div>
            <div class="col-auto">
                ora
            </div>
            <div class="col-auto mb-2 d-flex align-items-center">
                <input
                    type="text"
                    id="refuz_ora"
                    name="refuz_ora"
                    class="me-2 form-control bg-white rounded-3 {{ $errors->has('refuz_ora') ? 'is-invalid' : '' }}"
                    value="{{ old('refuz_ora', $chestionar->refuz_ora) }}">
            </div>
        </div>


        <div class="row mb-4 rounded-3 align-items-center" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid; background-color:#fff9f5">
            <div class="col-lg-12 mb-2 d-flex align-items-left">
                <div class="row">
                    <div class="col-auto d-flex align-items-center">
                        Tabel cu personalul medical
                        care acordă îngrijiri de sănătate d-nei/d-rei/d-lui
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="ingrijiri_sanatate_nume"
                            name="ingrijiri_sanatate_nume"
                            class="form-control bg-white rounded-3 {{ $errors->has('ingrijiri_sanatate_nume') ? 'is-invalid' : '' }}"
                            value="{{ old('ingrijiri_sanatate_nume', $chestionar->ingrijiri_sanatate_nume) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 align-items-left">
                <div class="table-responsive rounded">
                    <table class="table table-striped table-hover table-sm rounded">
                        <tr>
                            <th>
                                Nr. crt.
                            </th>
                            <th>
                                Nume și prenume
                            </th>
                            <th>
                                Profesie
                            </th>
                            <th>
                                Grad profesional/specialitate
                            </th>
                        </tr>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_nume_1"
                                    name="personal_medical_nume_1"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_nume_1') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_nume_1', $chestionar->personal_medical_nume_1) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_profesie_1"
                                    name="personal_medical_profesie_1"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_profesie_1') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_profesie_1', $chestionar->personal_medical_profesie_1) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_grad_profesional_1"
                                    name="personal_medical_grad_profesional_1"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_grad_profesional_1') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_grad_profesional_1', $chestionar->personal_medical_grad_profesional_1) }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_nume_2"
                                    name="personal_medical_nume_2"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_nume_2') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_nume_2', $chestionar->personal_medical_nume_2) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_profesie_2"
                                    name="personal_medical_profesie_2"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_profesie_2') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_profesie_2', $chestionar->personal_medical_profesie_2) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_grad_profesional_2"
                                    name="personal_medical_grad_profesional_2"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_grad_profesional_2') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_grad_profesional_2', $chestionar->personal_medical_grad_profesional_2) }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_nume_3"
                                    name="personal_medical_nume_3"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_nume_3') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_nume_3', $chestionar->personal_medical_nume_3) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_profesie_3"
                                    name="personal_medical_profesie_3"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_profesie_3') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_profesie_3', $chestionar->personal_medical_profesie_3) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_grad_profesional_3"
                                    name="personal_medical_grad_profesional_3"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_grad_profesional_3') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_grad_profesional_3', $chestionar->personal_medical_grad_profesional_3) }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_nume_4"
                                    name="personal_medical_nume_4"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_nume_4') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_nume_4', $chestionar->personal_medical_nume_4) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_profesie_4"
                                    name="personal_medical_profesie_4"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_profesie_4') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_profesie_4', $chestionar->personal_medical_profesie_4) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_grad_profesional_4"
                                    name="personal_medical_grad_profesional_4"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_grad_profesional_4') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_grad_profesional_4', $chestionar->personal_medical_grad_profesional_4) }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_nume_5"
                                    name="personal_medical_nume_5"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_nume_5') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_nume_5', $chestionar->personal_medical_nume_5) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_profesie_5"
                                    name="personal_medical_profesie_5"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_profesie_5') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_profesie_5', $chestionar->personal_medical_profesie_5) }}">
                            </td>
                            <td>
                                <input
                                    type="text"
                                    id="personal_medical_grad_profesional_5"
                                    name="personal_medical_grad_profesional_5"
                                    class="form-control bg-white rounded-3 {{ $errors->has('personal_medical_grad_profesional_5') ? 'is-invalid' : '' }}"
                                    value="{{ old('personal_medical_grad_profesional_5', $chestionar->personal_medical_grad_profesional_5) }}">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mb-4 rounded-3 align-items-center" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <div class="col-lg-12 mb-2 d-flex align-items-left">
                <div class="form-check">
                    {{-- <input type="hidden" name="gdpr" value="0"> --}}
                    <input type="checkbox" class="form-check-input {{ $errors->has('gdpr') ? 'is-invalid' : '' }}" name="gdpr" id="gdpr" value="1" required
                    {{ old('gdpr', ($chestionar->gdpr ?? "0")) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="gdpr">
                        * Sunt de acord cu prelucrarea datelor mele personale în conformitate cu Regulamentul (UE) 2016-679 - privind protecţia persoanelor fizice în ceea ce priveşte
                        prelucrarea datelor cu caracter personal şi privind libera circulaţie a acestor date şi de abrogare a Directivei 95/46/CE ale cărei prevederi le-am citit şi le cunosc.
                    </label>
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
