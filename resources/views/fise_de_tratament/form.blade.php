@csrf

<div class="row mb-0 d-flex border-radius: 0px 0px 40px 40px" id="app1">
    <div class="col-lg-12 px-4 py-2 mb-0">
        <div class="row px-2 py-2 align-items-center d-flex justify-content-center"
            style="background-color:lightyellow; border-left:6px solid; border-color:goldenrod"
        >
            <div class="col-lg-12 d-flex justify-content-center">
                <h4 for="fisa_numar" class="text-white p-2" style="background-color:#e66800"
                >FIȘĂ DE TRATAMENT</h4>
            </div>
            <div class="col-lg-1 mb-2">
                <label for="fisa_numar" class="mb-0 ps-3">Număr:</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('fisa_numar') ? 'is-invalid' : '' }}"
                    name="fisa_numar"
                    placeholder=""
                    value="{{ old('fisa_numar', $fisa_de_tratament->fisa_numar) }}"
                    >
            </div>
            <div class="col-lg-2 mb-2">
                <label for="medic_curant" class="mb-0 ps-3">Medic curant:</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('medic_curant') ? 'is-invalid' : '' }}"
                    name="medic_curant"
                    placeholder=""
                    value="{{ old('medic_curant', $fisa_de_tratament->medic_curant) }}"
                    >
            </div>
            <div class="col-lg-1 mb-2 justify-content-center">
                <label for="data" class="mb-0 ps-1">Data:</label>
                    <vue2-datepicker
                        data-veche="{{ old('data', ($fisa_de_tratament->data ?? '')) }}"
                        nume-camp-db="data"
                        tip="date"
                        value-type="YYYY-MM-DD"
                        format="DD-MM-YYYY"
                        :latime="{ width: '125px' }"
                    ></vue2-datepicker>
            </div>
        </div>
        <div class="row px-2 py-2 mb-0"
            style="background-color:#ddffff; border-left:6px solid; border-color:#2196F3; border-radius: 0px 0px 0px 0px"
            >
            <div class="col-lg-12">
                <div class="row mb-2 d-flex justify-content-center">
                    <div class="col-lg-3 mb-2">
                        <label for="nume" class="mb-0 ps-3">Nume:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                            name="nume"
                            placeholder=""
                            value="{{ old('nume', $fisa_de_tratament->nume) }}"
                            >
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="telefon" class="mb-0 ps-3">Telefon:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('telefon') ? 'is-invalid' : '' }}"
                            name="telefon"
                            placeholder=""
                            value="{{ old('telefon', $fisa_de_tratament->telefon) }}"
                            >
                    </div>
                    <div class="col-lg-1 mb-2">
                        <label for="varsta" class="mb-0 ps-3">Vârsta:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('varsta') ? 'is-invalid' : '' }}"
                            name="varsta"
                            placeholder=""
                            value="{{ old('varsta', $fisa_de_tratament->varsta) }}"
                            >
                    </div>
                    <div class="col-lg-1 mb-2">
                        <label for="sex" class="mb-0 ps-3">Sex:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('sex') ? 'is-invalid' : '' }}"
                            name="sex"
                            placeholder=""
                            value="{{ old('sex', $fisa_de_tratament->sex) }}"
                            >
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="cnp" class="mb-0 ps-3">CNP:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('cnp') ? 'is-invalid' : '' }}"
                            name="cnp"
                            placeholder=""
                            value="{{ old('cnp', $fisa_de_tratament->cnp) }}"
                            >
                    </div>
                </div>
                <div class="row mb-2 d-flex justify-content-center">
                    <div class="col-lg-2 mb-2">
                        <label for="strada" class="mb-0 ps-3">Strada:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('strada') ? 'is-invalid' : '' }}"
                            name="strada"
                            placeholder=""
                            value="{{ old('strada', $fisa_de_tratament->strada) }}"
                            >
                    </div>
                    <div class="col-lg-1 mb-2">
                        <label for="scara" class="mb-0 ps-3">Scara:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('scara') ? 'is-invalid' : '' }}"
                            name="scara"
                            placeholder=""
                            value="{{ old('scara', $fisa_de_tratament->scara) }}"
                            >
                    </div>
                    <div class="col-lg-1 mb-2">
                        <label for="numar" class="mb-0 ps-3">Număr:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('numar') ? 'is-invalid' : '' }}"
                            name="numar"
                            placeholder=""
                            value="{{ old('numar', $fisa_de_tratament->numar) }}"
                            >
                    </div>
                    <div class="col-lg-1 mb-2">
                        <label for="bloc" class="mb-0 ps-3">Bloc:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('bloc') ? 'is-invalid' : '' }}"
                            name="bloc"
                            placeholder=""
                            value="{{ old('bloc', $fisa_de_tratament->bloc) }}"
                            >
                    </div>
                    <div class="col-lg-1 mb-2">
                        <label for="apartament" class="mb-0 ps-3">Ap.:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('apartament') ? 'is-invalid' : '' }}"
                            name="apartament"
                            placeholder=""
                            value="{{ old('apartament', $fisa_de_tratament->apartament) }}"
                            >
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="oras" class="mb-0 ps-3">Oraș:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('oras') ? 'is-invalid' : '' }}"
                            name="oras"
                            placeholder=""
                            value="{{ old('oras', $fisa_de_tratament->oras) }}"
                            >
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="sector" class="mb-0 ps-3">Sector:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('sector') ? 'is-invalid' : '' }}"
                            name="sector"
                            placeholder=""
                            value="{{ old('sector', $fisa_de_tratament->sector) }}"
                            >
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="judet" class="mb-0 ps-3">Județ:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('judet') ? 'is-invalid' : '' }}"
                            name="judet"
                            placeholder=""
                            value="{{ old('judet', $fisa_de_tratament->judet) }}"
                            >
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-2 mb-2">
                        <label for="asigurare_medicala" class="mb-0 ps-3">Asigurare medicală:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('asigurare_medicala') ? 'is-invalid' : '' }}"
                            name="asigurare_medicala"
                            placeholder=""
                            value="{{ old('asigurare_medicala', $fisa_de_tratament->asigurare_medicala) }}"
                            >
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="ocupatie" class="mb-0 ps-3">Ocupație:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('ocupatie') ? 'is-invalid' : '' }}"
                            name="ocupatie"
                            placeholder=""
                            value="{{ old('ocupatie', $fisa_de_tratament->ocupatie) }}"
                            >
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="loc_munca" class="mb-0 ps-3">Loc muncă:</label>
                        <input
                            type="text"
                            class="form-control form-control-sm rounded-pill {{ $errors->has('loc_munca') ? 'is-invalid' : '' }}"
                            name="loc_munca"
                            placeholder=""
                            value="{{ old('loc_munca', $fisa_de_tratament->loc_munca) }}"
                            >
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-2 py-2 mb-0"
            style="background-color:#B8FFB8; border-left:6px solid; border-color:mediumseagreen; border-radius: 0px 0px 0px 0px"
            >
            <div class="col-lg-12 mb-2">
                <label class="px-1" style="background-color:mediumseagreen; color:white">
                    STATUS DENTAR
                </label>
            </div>
            {{-- <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_11" class="col-form-label col-form-label-sm pe-1">11</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_11') ? 'is-invalid' : '' }}"
                    name="status_dentar_11"
                    placeholder=""
                    value="{{ old('status_dentar_11', $fisa_de_tratament->status_dentar_11) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_12" class="col-form-label col-form-label-sm pe-1">12</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_12') ? 'is-invalid' : '' }}"
                    name="status_dentar_12"
                    placeholder=""
                    value="{{ old('status_dentar_12', $fisa_de_tratament->status_dentar_12) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_15" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_15') ? 'is-invalid' : '' }}"
                    name="status_dentar_15"
                    placeholder=""
                    value="{{ old('status_dentar_15', $fisa_de_tratament->status_dentar_15) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_16" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_16') ? 'is-invalid' : '' }}"
                    name="status_dentar_16"
                    placeholder=""
                    value="{{ old('status_dentar_16', $fisa_de_tratament->status_dentar_16) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_17" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_17') ? 'is-invalid' : '' }}"
                    name="status_dentar_17"
                    placeholder=""
                    value="{{ old('status_dentar_17', $fisa_de_tratament->status_dentar_17) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_18" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_18') ? 'is-invalid' : '' }}"
                    name="status_dentar_18"
                    placeholder=""
                    value="{{ old('status_dentar_18', $fisa_de_tratament->status_dentar_18) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_21" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_21') ? 'is-invalid' : '' }}"
                    name="status_dentar_21"
                    placeholder=""
                    value="{{ old('status_dentar_21', $fisa_de_tratament->status_dentar_21) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_22" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_22') ? 'is-invalid' : '' }}"
                    name="status_dentar_22"
                    placeholder=""
                    value="{{ old('status_dentar_22', $fisa_de_tratament->status_dentar_22) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_23" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_23') ? 'is-invalid' : '' }}"
                    name="status_dentar_23"
                    placeholder=""
                    value="{{ old('status_dentar_23', $fisa_de_tratament->status_dentar_23) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_24" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_24') ? 'is-invalid' : '' }}"
                    name="status_dentar_24"
                    placeholder=""
                    value="{{ old('status_dentar_24', $fisa_de_tratament->status_dentar_24) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_25" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_25') ? 'is-invalid' : '' }}"
                    name="status_dentar_25"
                    placeholder=""
                    value="{{ old('status_dentar_25', $fisa_de_tratament->status_dentar_25) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_26" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_26') ? 'is-invalid' : '' }}"
                    name="status_dentar_26"
                    placeholder=""
                    value="{{ old('status_dentar_26', $fisa_de_tratament->status_dentar_26) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_27" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_27') ? 'is-invalid' : '' }}"
                    name="status_dentar_27"
                    placeholder=""
                    value="{{ old('status_dentar_27', $fisa_de_tratament->status_dentar_27) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_28" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_28') ? 'is-invalid' : '' }}"
                    name="status_dentar_28"
                    placeholder=""
                    value="{{ old('status_dentar_28', $fisa_de_tratament->status_dentar_28) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_31" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_31') ? 'is-invalid' : '' }}"
                    name="status_dentar_31"
                    placeholder=""
                    value="{{ old('status_dentar_31', $fisa_de_tratament->status_dentar_31) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_32" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_32') ? 'is-invalid' : '' }}"
                    name="status_dentar_32"
                    placeholder=""
                    value="{{ old('status_dentar_32', $fisa_de_tratament->status_dentar_32) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_33" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_33') ? 'is-invalid' : '' }}"
                    name="status_dentar_33"
                    placeholder=""
                    value="{{ old('status_dentar_33', $fisa_de_tratament->status_dentar_33) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_34" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_34') ? 'is-invalid' : '' }}"
                    name="status_dentar_34"
                    placeholder=""
                    value="{{ old('status_dentar_34', $fisa_de_tratament->status_dentar_34) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_35" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_35') ? 'is-invalid' : '' }}"
                    name="status_dentar_35"
                    placeholder=""
                    value="{{ old('status_dentar_35', $fisa_de_tratament->status_dentar_35) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_36" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_36') ? 'is-invalid' : '' }}"
                    name="status_dentar_36"
                    placeholder=""
                    value="{{ old('status_dentar_36', $fisa_de_tratament->status_dentar_36) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_37" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_37') ? 'is-invalid' : '' }}"
                    name="status_dentar_37"
                    placeholder=""
                    value="{{ old('status_dentar_37', $fisa_de_tratament->status_dentar_37) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_38" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_38') ? 'is-invalid' : '' }}"
                    name="status_dentar_38"
                    placeholder=""
                    value="{{ old('status_dentar_38', $fisa_de_tratament->status_dentar_38) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_41" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_41') ? 'is-invalid' : '' }}"
                    name="status_dentar_41"
                    placeholder=""
                    value="{{ old('status_dentar_41', $fisa_de_tratament->status_dentar_41) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_42" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_42') ? 'is-invalid' : '' }}"
                    name="status_dentar_42"
                    placeholder=""
                    value="{{ old('status_dentar_42', $fisa_de_tratament->status_dentar_42) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_43" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_43') ? 'is-invalid' : '' }}"
                    name="status_dentar_43"
                    placeholder=""
                    value="{{ old('status_dentar_43', $fisa_de_tratament->status_dentar_43) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_44" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_44') ? 'is-invalid' : '' }}"
                    name="status_dentar_44"
                    placeholder=""
                    value="{{ old('status_dentar_44', $fisa_de_tratament->status_dentar_44) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_45" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_45') ? 'is-invalid' : '' }}"
                    name="status_dentar_45"
                    placeholder=""
                    value="{{ old('status_dentar_45', $fisa_de_tratament->status_dentar_45) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_46" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_46') ? 'is-invalid' : '' }}"
                    name="status_dentar_46"
                    placeholder=""
                    value="{{ old('status_dentar_46', $fisa_de_tratament->status_dentar_46) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_47" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_47') ? 'is-invalid' : '' }}"
                    name="status_dentar_47"
                    placeholder=""
                    value="{{ old('status_dentar_47', $fisa_de_tratament->status_dentar_47) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_48" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_48') ? 'is-invalid' : '' }}"
                    name="status_dentar_48"
                    placeholder=""
                    value="{{ old('status_dentar_48', $fisa_de_tratament->status_dentar_48) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div>
            <div class="col-lg-3 mb-2 d-flex">
                <label for="status_dentar_13" class="col-form-label col-form-label-sm pe-1">13</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_13') ? 'is-invalid' : '' }}"
                    name="status_dentar_13"
                    placeholder=""
                    value="{{ old('status_dentar_13', $fisa_de_tratament->status_dentar_13) }}"
                    >
            </div> --}}
        </div>

        <div class="row px-2 py-2 mb-0"
            style="background-color:#B8FFB8; border-left:6px solid; border-color:mediumseagreen; border-radius: 0px 0px 0px 0px"
            >

            @php
                // $status_dentar_dinti = array (
                //     11, 12, 13, 14, 15,
                //     21, 22, 23, 24, 25
                // );
                $status_dentar_dinti = array (
                    11, 12
                );
            @endphp

            @foreach ($status_dentar_dinti as $status_dentar_dinte)
                <div class="col-lg-3 mb-2 d-flex">
                    <label for="status_dentar_{{ $status_dentar_dinte }}" class="col-form-label col-form-label-sm pe-1">{{ $status_dentar_dinte }}</label>
                    <input
                        type="text"
                        class="form-control form-control-sm rounded-pill {{ $errors->has('status_dentar_' . $status_dentar_dinte) ? 'is-invalid' : '' }}"
                        name="status_dentar_{{ $status_dentar_dinte }}"
                        placeholder=""
                        value="{{ old('status_dentar_' . $status_dentar_dinte, $fisa_de_tratament->{'status_dentar_' . $status_dentar_dinte}) }}"
                        {{-- value="{{ old('status_dentar_' . $status_dentar_dinte, ${'fisa_de_tratament->status_dentar_' . $status_dentar_dinte}) }}" --}}
                        {{-- value="{{ old('status_dentar_' . $status_dentar_dinte, $fisa_de_tratament->status_dentar_11) }}" --}}
                        >
                </div>
            @endforeach
        </div>




        <div>
            <div class="col-lg-12 mb-2">
                <label for="observatii" class="mb-0 ps-3">Observații:</label>
                <textarea class="form-control form-control-sm {{ $errors->has('observatii') ? 'is-invalid' : '' }}"
                    name="observatii" rows="2">{{ old('observatii', $fisa_de_tratament->observatii) }}</textarea>
            </div>
        </div>

        <div class="row py-2 justify-content-center">
            <div class="col-lg-8 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white btn-sm me-2 rounded-pill">{{ $buttonText }}</button>
                <a class="btn btn-secondary btn-sm rounded-pill" href="/fise-de-tratament">Renunță</a>
            </div>
        </div>
    </div>
</div>
