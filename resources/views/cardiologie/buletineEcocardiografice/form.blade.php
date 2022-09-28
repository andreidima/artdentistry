@csrf


<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 mb-0">

        <div class="row mb-5 d-flex text-center" style="">
            <div class="col-12">
                <h3 class="m-0">BULETIN ECOCARDIOGRAFIC</h3>
            </div>
        </div>

        <div class="row mb-5 rounded-3 d-flex align-items-center" style="">
            <div class="col-lg-12 align-items-left">
                <div class="row">
                    <div class="col-auto align-self-center">
                        Nume
                        <b>{{ $programare->nume }}</b>, varsta
                    </div>
                    <div class="col-lg-1 px-0">
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
            <div class="col-lg-6 align-items-center border-start border-2 border-dark">
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0 border-top border-2 border-dark">
                        <label for="dtdvs_1" class="col-form-label">DTDVS(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0 border-top border-2 border-dark">
                        <input
                            type="text"
                            id="dtdvs_1"
                            name="dtdvs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtdvs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('dtdvs_1', $buletin_ecocardiografic->dtdvs_1) }}">
                    </div>
                    <div class="col-lg-2 px-0 border-top border-2 border-dark">
                        <input
                            type="text"
                            id="dtdvs_2"
                            name="dtdvs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtdvs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('dtdvs_2', $buletin_ecocardiografic->dtdvs_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-top border-end border-dark border-2">
                        <label for="dtdvs_1" class="col-form-label"> < 55mm </label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="dtsvs_1" class="col-form-label">DTSVS(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="dtsvs_1"
                            name="dtsvs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtsvs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('dtsvs_1', $buletin_ecocardiografic->dtsvs_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="dtsvs_2"
                            name="dtsvs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtsvs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('dtsvs_2', $buletin_ecocardiografic->dtsvs_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="sivd_1" class="col-form-label">SIVd(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="sivd_1"
                            name="sivd_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('sivd_1') ? 'is-invalid' : '' }}"
                            value="{{ old('sivd_1', $buletin_ecocardiografic->sivd_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="sivd_2"
                            name="sivd_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('sivd_2') ? 'is-invalid' : '' }}"
                            value="{{ old('sivd_2', $buletin_ecocardiografic->sivd_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="sivd_1" class="col-form-label">5-13mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="sivs_1" class="col-form-label">SIVs(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="sivs_1"
                            name="sivs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('sivs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('sivs_1', $buletin_ecocardiografic->sivs_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="sivs_2"
                            name="sivs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('sivs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('sivs_2', $buletin_ecocardiografic->sivs_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="ppvsd_1" class="col-form-label">PPVSd(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ppvsd_1"
                            name="ppvsd_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('ppvsd_1') ? 'is-invalid' : '' }}"
                            value="{{ old('ppvsd_1', $buletin_ecocardiografic->ppvsd_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ppvsd_2"
                            name="ppvsd_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('ppvsd_2') ? 'is-invalid' : '' }}"
                            value="{{ old('ppvsd_2', $buletin_ecocardiografic->ppvsd_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="ppvsd_1" class="col-form-label">5-13mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="ppvss_1" class="col-form-label">PPVSs(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ppvss_1"
                            name="ppvss_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('ppvss_1') ? 'is-invalid' : '' }}"
                            value="{{ old('ppvss_1', $buletin_ecocardiografic->ppvss_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ppvss_2"
                            name="ppvss_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('ppvss_2') ? 'is-invalid' : '' }}"
                            value="{{ old('ppvss_2', $buletin_ecocardiografic->ppvss_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="dsm_1" class="col-form-label">DSM(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="dsm_1"
                            name="dsm_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('dsm_1') ? 'is-invalid' : '' }}"
                            value="{{ old('dsm_1', $buletin_ecocardiografic->dsm_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="dsm_2"
                            name="dsm_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('dsm_2') ? 'is-invalid' : '' }}"
                            value="{{ old('dsm_2', $buletin_ecocardiografic->dsm_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="dsm_1" class="col-form-label">0-7mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="fs_1" class="col-form-label">FS(%)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="fs_1"
                            name="fs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('fs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('fs_1', $buletin_ecocardiografic->fs_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="fs_2"
                            name="fs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('fs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('fs_2', $buletin_ecocardiografic->fs_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="fs_1" class="col-form-label">25%</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="fe_1" class="col-form-label">FE(%)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="fe_1"
                            name="fe_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('fe_1') ? 'is-invalid' : '' }}"
                            value="{{ old('fe_1', $buletin_ecocardiografic->fe_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="fe_2"
                            name="fe_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('fe_2') ? 'is-invalid' : '' }}"
                            value="{{ old('fe_2', $buletin_ecocardiografic->fe_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="fe_1" class="col-form-label">60-70%</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="fevol_1" class="col-form-label">Fevol(%)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="fevol_1"
                            name="fevol_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('fevol_1') ? 'is-invalid' : '' }}"
                            value="{{ old('fevol_1', $buletin_ecocardiografic->fevol_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="fevol_2"
                            name="fevol_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('fevol_2') ? 'is-invalid' : '' }}"
                            value="{{ old('fevol_2', $buletin_ecocardiografic->fevol_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="vtdvs_1" class="col-form-label">VTDVS(ml)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="vtdvs_1"
                            name="vtdvs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('vtdvs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('vtdvs_1', $buletin_ecocardiografic->vtdvs_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="vtdvs_2"
                            name="vtdvs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('vtdvs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('vtdvs_2', $buletin_ecocardiografic->vtdvs_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="vtsvs_1" class="col-form-label">VTSVS(ml)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="vtsvs_1"
                            name="vtsvs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('vtsvs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('vtsvs_1', $buletin_ecocardiografic->vtsvs_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="vtsvs_2"
                            name="vtsvs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('vtsvs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('vtsvs_2', $buletin_ecocardiografic->vtsvs_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="as_1" class="col-form-label">AS(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="as_1"
                            name="as_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('as_1') ? 'is-invalid' : '' }}"
                            value="{{ old('as_1', $buletin_ecocardiografic->as_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="as_2"
                            name="as_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('as_2') ? 'is-invalid' : '' }}"
                            value="{{ old('as_2', $buletin_ecocardiografic->as_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="as_1" class="col-form-label">25-45mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="ad_1" class="col-form-label">AD(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            {{-- id="ad_1" --}}
                            name="ad_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('ad_1') ? 'is-invalid' : '' }}"
                            value="{{ old('ad_1', $buletin_ecocardiografic->ad_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            {{-- id="ad_2" --}}
                            name="ad_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('ad_2') ? 'is-invalid' : '' }}"
                            value="{{ old('ad_2', $buletin_ecocardiografic->ad_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="ad_1" class="col-form-label">25-45mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="dtdvd_1" class="col-form-label">DTDVD(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="dtdvd_1"
                            name="dtdvd_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtdvd_1') ? 'is-invalid' : '' }}"
                            value="{{ old('dtdvd_1', $buletin_ecocardiografic->dtdvd_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="dtdvd_2"
                            name="dtdvd_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtdvd_2') ? 'is-invalid' : '' }}"
                            value="{{ old('dtdvd_2', $buletin_ecocardiografic->dtdvd_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="dtdvd_1" class="col-form-label">< 30mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="pavdd_1" class="col-form-label">PAVDd(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="pavdd_1"
                            name="pavdd_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('pavdd_1') ? 'is-invalid' : '' }}"
                            value="{{ old('pavdd_1', $buletin_ecocardiografic->pavdd_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="pavdd_2"
                            name="pavdd_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('pavdd_2') ? 'is-invalid' : '' }}"
                            value="{{ old('pavdd_2', $buletin_ecocardiografic->pavdd_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="pavdd_1" class="col-form-label">< 5mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="vci_cu_colaps_1" class="col-form-label">VCI-cu colaps</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="vci_cu_colaps_1"
                            name="vci_cu_colaps_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('vci_cu_colaps_1') ? 'is-invalid' : '' }}"
                            value="{{ old('vci_cu_colaps_1', $buletin_ecocardiografic->vci_cu_colaps_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="vci_cu_colaps_2"
                            name="vci_cu_colaps_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('vci_cu_colaps_2') ? 'is-invalid' : '' }}"
                            value="{{ old('vci_cu_colaps_2', $buletin_ecocardiografic->vci_cu_colaps_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="rdap_1" class="col-form-label">RDAP(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="rdap_1"
                            name="rdap_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('rdap_1') ? 'is-invalid' : '' }}"
                            value="{{ old('rdap_1', $buletin_ecocardiografic->rdap_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="rdap_2"
                            name="rdap_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('rdap_2') ? 'is-invalid' : '' }}"
                            value="{{ old('rdap_2', $buletin_ecocardiografic->rdap_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="rdap_1" class="col-form-label">< 22mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="ap_inel_1" class="col-form-label">AP inel(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ap_inel_1"
                            name="ap_inel_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('ap_inel_1') ? 'is-invalid' : '' }}"
                            value="{{ old('ap_inel_1', $buletin_ecocardiografic->ap_inel_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ap_inel_2"
                            name="ap_inel_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('ap_inel_2') ? 'is-invalid' : '' }}"
                            value="{{ old('ap_inel_2', $buletin_ecocardiografic->ap_inel_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="ao_inel_1" class="col-form-label">Ao inel(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ao_inel_1"
                            name="ao_inel_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('ao_inel_1') ? 'is-invalid' : '' }}"
                            value="{{ old('ao_inel_1', $buletin_ecocardiografic->ao_inel_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ao_inel_2"
                            name="ao_inel_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('ao_inel_2') ? 'is-invalid' : '' }}"
                            value="{{ old('ao_inel_2', $buletin_ecocardiografic->ao_inel_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="ao_asc_1" class="col-form-label">Ao asc(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ao_asc_1"
                            name="ao_asc_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('ao_asc_1') ? 'is-invalid' : '' }}"
                            value="{{ old('ao_asc_1', $buletin_ecocardiografic->ao_asc_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ao_asc_2"
                            name="ao_asc_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('ao_asc_2') ? 'is-invalid' : '' }}"
                            value="{{ old('ao_asc_2', $buletin_ecocardiografic->ao_asc_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="ao_asc_1" class="col-form-label">< 45mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="ao_crosa_1" class="col-form-label">Ao crosa(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ao_crosa_1"
                            name="ao_crosa_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('ao_crosa_1') ? 'is-invalid' : '' }}"
                            value="{{ old('ao_crosa_1', $buletin_ecocardiografic->ao_crosa_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="ao_crosa_2"
                            name="ao_crosa_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('ao_crosa_2') ? 'is-invalid' : '' }}"
                            value="{{ old('ao_crosa_2', $buletin_ecocardiografic->ao_crosa_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="desc_cusp_ao_1" class="col-form-label">Desc. Cusp. AO</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="desc_cusp_ao_1"
                            name="desc_cusp_ao_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('desc_cusp_ao_1') ? 'is-invalid' : '' }}"
                            value="{{ old('desc_cusp_ao_1', $buletin_ecocardiografic->desc_cusp_ao_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="desc_cusp_ao_2"
                            name="desc_cusp_ao_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('desc_cusp_ao_2') ? 'is-invalid' : '' }}"
                            value="{{ old('desc_cusp_ao_2', $buletin_ecocardiografic->desc_cusp_ao_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                        <label for="desc_cusp_ao_1" class="col-form-label">16-26mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="unde_e_1" class="col-form-label">unda E(m/sec)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="unde_e_1"
                            name="unde_e_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('unde_e_1') ? 'is-invalid' : '' }}"
                            value="{{ old('unde_e_1', $buletin_ecocardiografic->unde_e_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="unde_e_2"
                            name="unde_e_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('unde_e_2') ? 'is-invalid' : '' }}"
                            value="{{ old('unde_e_2', $buletin_ecocardiografic->unde_e_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0">
                        <label for="unda_a_1" class="col-form-label">unda A (m/sec)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="unda_a_1"
                            name="unda_a_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('unda_a_1') ? 'is-invalid' : '' }}"
                            value="{{ old('unda_a_1', $buletin_ecocardiografic->unda_a_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="unda_a_2"
                            name="unda_a_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('unda_a_2') ? 'is-invalid' : '' }}"
                            value="{{ old('unda_a_2', $buletin_ecocardiografic->unda_a_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-end border-dark border-2">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-0 border-bottom border-2 border-dark">
                        <label for="e_a_1" class="col-form-label">E/A</label>
                    </div>
                    <div class="col-lg-2 px-0 border-bottom border-dark border-2">
                        <input
                            type="text"
                            id="e_a_1"
                            name="e_a_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('e_a_1') ? 'is-invalid' : '' }}"
                            value="{{ old('e_a_1', $buletin_ecocardiografic->e_a_1) }}">
                    </div>
                    <div class="col-lg-2 px-0 border-bottom border-dark border-2">
                        <input
                            type="text"
                            id="e_a_2"
                            name="e_a_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('e_a_2') ? 'is-invalid' : '' }}"
                            value="{{ old('e_a_2', $buletin_ecocardiografic->e_a_2) }}">
                    </div>
                    <div class="col-lg-2 px-0 text-center border-bottom border-end border-dark border-2">
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
