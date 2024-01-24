@csrf

@php
    use \Carbon\Carbon;
@endphp

<script type="application/javascript">
    medicamente =  {!! json_encode(old('medicamente', $reteta->medicamente()->get()) ?? []) !!}
</script>

<div class="row mb-0 px-3 d-flex border-radius: 0px 0px 40px 40px">
    <div class="col-lg-12 px-4 py-2 mb-0">
        <div class="row mb-4 pt-2 rounded-3 justify-content-center align-items-end" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <div class="col-lg-2 mb-4" id="app">
                <label for="data" class="mb-0 ps-1">Data:</label>
                    <vue2-datepicker
                        data-veche="{{ old('data', ($reteta->data ?? '')) }}"
                        class="{{ $errors->has('data') ? 'form-control is-invalid' : '' }}"
                        nume-camp-db="data"
                        tip="date"
                        value-type="YYYY-MM-DD"
                        format="DD-MM-YYYY"
                        :latime="{ width: '125px' }"
                    ></vue2-datepicker>
            </div>
        </div>
        <div class="row mb-4 pt-2 rounded-3 justify-content-center" style="border:1px solid #e9ecef; border-left:0.25rem #e66800 solid; background-color:#fff9f5">
            <div class="col-lg-3 mb-4">
                <label for="pacient_nume" class="mb-0 ps-3">Nume<span class="text-danger">*</span></label>
                <input
                    type="text"
                    name="pacient_nume"
                    value="{{ old('pacient_nume', $reteta->pacient_nume) }}"
                    class="form-control bg-white rounded-pill {{ $errors->has('pacient_nume') ? 'is-invalid' : '' }}">
            </div>
            <div class="col-lg-2 mb-4">
                <label for="pacient_varsta" class="mb-0 ps-3">Vârsta</label>
                <input
                    type="text"
                    name="pacient_varsta"
                    value="{{ old('pacient_varsta', $reteta->pacient_varsta) }}"
                    class="form-control bg-white rounded-pill {{ $errors->has('pacient_varsta') ? 'is-invalid' : '' }}">
            </div>
            <div class="col-lg-2 mb-4">
                <label for="pacient_cnp" class="mb-0 ps-3">CNP</label>
                <input
                    type="text"
                    name="pacient_cnp"
                    value="{{ old('pacient_cnp', $reteta->pacient_cnp) }}"
                    class="form-control bg-white rounded-pill {{ $errors->has('pacient_cnp') ? 'is-invalid' : '' }}">
            </div>
            <div class="col-lg-3 mb-4">
                <label for="pacient_adresa" class="mb-0 ps-3">Adresa</label>
                <input
                    type="text"
                    name="pacient_adresa"
                    value="{{ old('pacient_adresa', $reteta->pacient_adresa) }}"
                    class="form-control bg-white rounded-pill {{ $errors->has('pacient_adresa') ? 'is-invalid' : '' }}">
            </div>
            <div class="col-lg-2 mb-4">
                <label for="pacient_localitate" class="mb-0 ps-3">Localitate</label>
                <input
                    type="text"
                    name="pacient_localitate"
                    value="{{ old('pacient_localitate', $reteta->pacient_localitate) }}"
                    class="form-control bg-white rounded-pill {{ $errors->has('pacient_localitate') ? 'is-invalid' : '' }}">
            </div>
            <div class="col-lg-4 mb-4">
                <label for="pacient_diagnostic" class="mb-0 ps-3">Diagnostic</label>
                <select class="form-select bg-white rounded-3 {{ $errors->has('pacient_diagnostic') ? 'is-invalid' : '' }}"
                    name="pacient_diagnostic">
                    <option selected></option>
                    <option value="K00 - Tulburări de odontogeneză și de erupție" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K00 - Tulburări de odontogeneză și de erupție" ? 'selected' : '' }}>K00 - Tulburări de odontogeneză și de erupție</option>
                    <option value="K01 - Dinți incluși și inclavați" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K01 - Dinți incluși și inclavați" ? 'selected' : '' }}>K01 - Dinți incluși și inclavați</option>
                    <option value="K02 - Carii dentare" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K02 - Carii dentare" ? 'selected' : '' }}>K02 - Carii dentare</option>
                    <option value="K03 - Alte boli ale țesutului dentar" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K03 - Alte boli ale țesutului dentar" ? 'selected' : '' }}>K03 - Alte boli ale țesutului dentar</option>
                    <option value="K04 - Boala pulpei și țesuturilor periapicale" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K04 - Boala pulpei și țesuturilor periapicale" ? 'selected' : '' }}>K04 - Boala pulpei și țesuturilor periapicale</option>
                    <option value="K05 - Gingivita și bolile periodontale" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K05 - Gingivita și bolile periodontale" ? 'selected' : '' }}>K05 - Gingivita și bolile periodontale</option>
                    <option value="K06 - Alte afecțiuni ale gingiei și crestei alveolare edentate" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K06 - Alte afecțiuni ale gingiei și crestei alveolare edentate" ? 'selected' : '' }}>K06 - Alte afecțiuni ale gingiei și crestei alveolare edentate</option>
                    <option value="K07 - Anomalii dento-faciale [inclusiv malocluzia]" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K07 - Anomalii dento-faciale [inclusiv malocluzia]" ? 'selected' : '' }}>K07 - Anomalii dento-faciale [inclusiv malocluzia]</option>
                    <option value="K08 - Alte afecțiuni ale dinților și paradontiului" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K08 - Alte afecțiuni ale dinților și paradontiului" ? 'selected' : '' }}>K08 - Alte afecțiuni ale dinților și paradontiului</option>
                    <option value="K09 - Chisturile regiunii bucale, neclasificate altundeva" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K09 - Chisturile regiunii bucale, neclasificate altundeva" ? 'selected' : '' }}>K09 - Chisturile regiunii bucale, neclasificate altundeva</option>
                    <option value="K10 - Alte boli ale maxilarelor" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K10 - Alte boli ale maxilarelor" ? 'selected' : '' }}>K10 - Alte boli ale maxilarelor</option>
                    <option value="K11 - Bolile glandelor salivare" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K11 - Bolile glandelor salivare" ? 'selected' : '' }}>K11 - Bolile glandelor salivare</option>
                    <option value="K12 - Stomatite și afecțiuni înrudite" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K12 - Stomatite și afecțiuni înrudite" ? 'selected' : '' }}>K12 - Stomatite și afecțiuni înrudite</option>
                    <option value="K13 - Alte boli ale buzelor și mucoasei bucale" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K13 - Alte boli ale buzelor și mucoasei bucale" ? 'selected' : '' }}>K13 - Alte boli ale buzelor și mucoasei bucale</option>
                    <option value="K14 - Bolile limbii" {{ old('pacient_diagnostic', $reteta->pacient_diagnostic ?? '') == "K14 - Bolile limbii" ? 'selected' : '' }}>K14 - Bolile limbii</option>
                </select>
            </div>
            <div class="col-lg-8 mb-4">
                <label for="pacient_diagnostic_descriptiv" class="mb-0 ps-3">Diagnostic descriptiv</label>
                <input
                    type="text"
                    name="pacient_diagnostic_descriptiv"
                    value="{{ old('pacient_diagnostic_descriptiv', $reteta->pacient_diagnostic_descriptiv) }}"
                    class="form-control bg-white rounded-pill {{ $errors->has('pacient_diagnostic_descriptiv') ? 'is-invalid' : '' }}">
            </div>
        </div>
        <div class="row mb-4 pt-2 rounded-3 justify-content-center align-items-end" style="border:1px solid #e9ecef; border-left:0.25rem darkcyan solid; background-color:rgb(241, 250, 250)">
            <div class="col-lg-12 mb-0" id="retetaMedicamente">
                <div class="row mb-4 mx-1 align-items-end" v-for="(medicament, index) in medicamente" style="border: 1px solid darkcyan">
                    <div class="col-lg-4 mb-2">
                        <input type="hidden" :name="'medicamente[' + index + '][id]'" v-model="medicamente[index].id">

                        <label for="denumire" class="mb-0 ps-3">Denumire<span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control bg-white rounded-3 {{ $errors->has('denumire') ? 'is-invalid' : '' }}"
                            :name="'medicamente[' + index + '][denumire]'"
                            v-model="medicamente[index].denumire">
                    </div>
                    <div class="col-lg-4 mb-2">
                        <label for="concentratie" class="mb-0 ps-3">Concentrație</label>
                        <input
                            type="text"
                            class="form-control bg-white rounded-3 {{ $errors->has('concentratie') ? 'is-invalid' : '' }}"
                            :name="'medicamente[' + index + '][concentratie]'"
                            v-model="medicamente[index].concentratie">
                    </div>
                    <div class="col-lg-4 mb-2">
                        <label for="forma_farmaceutica" class="mb-0 ps-3">Forma farmaceutică</label>
                        <input
                            type="text"
                            class="form-control bg-white rounded-3 {{ $errors->has('forma_farmaceutica') ? 'is-invalid' : '' }}"
                            :name="'medicamente[' + index + '][forma_farmaceutica]'"
                            v-model="medicamente[index].forma_farmaceutica">
                    </div>
                    <div class="col-lg-4 mb-2">
                        <label for="mod_administrare" class="mb-0 ps-3">Mod de administrare</label>
                        <input
                            type="text"
                            class="form-control bg-white rounded-3 {{ $errors->has('mod_administrare') ? 'is-invalid' : '' }}"
                            :name="'medicamente[' + index + '][mod_administrare]'"
                            v-model="medicamente[index].mod_administrare">
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="cantitate" class="mb-0 ps-3">Cantitate</label>
                        <input
                            type="text"
                            class="form-control bg-white rounded-3 {{ $errors->has('cantitate') ? 'is-invalid' : '' }}"
                            :name="'medicamente[' + index + '][cantitate]'"
                            v-model="medicamente[index].cantitate">
                    </div>
                    <div class="col-lg-4 mb-2">
                        <label for="durata_tratament" class="mb-0 ps-3">Durată tratament</label>
                        <input
                            type="text"
                            class="form-control bg-white rounded-3 {{ $errors->has('durata_tratament') ? 'is-invalid' : '' }}"
                            :name="'medicamente[' + index + '][durata_tratament]'"
                            v-model="medicamente[index].durata_tratament">
                    </div>
                    <div class="col-lg-2 mb-2 text-end">
                        <button type="button" class="btn btn-danger text-white" @click="medicamente.splice(index,1)">Șterge</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-4 text-center">
                        <button type="button" ref="submit" class="btn btn-success text-white rounded-3"
                            v-on:click="this.medicamente.push({});">
                            Adaugă medicament
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-0 d-flex justify-content-center">
                <button type="submit" ref="submit" class="btn btn-lg btn-primary text-white me-3 rounded-3">{{ $buttonText }}</button>
                <a class="btn btn-lg btn-secondary rounded-3" href="{{ Session::get('retetaReturnUrl') }}">Renunță</a>
            </div>
        </div>
    </div>
</div>
