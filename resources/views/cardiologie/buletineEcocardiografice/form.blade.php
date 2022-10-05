@csrf


<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 mb-0">

        <div class="row mb-4 d-flex text-center" style="">
            <div class="col-12">
                <h3 class="m-0">BULETIN ECOCARDIOGRAFIC</h3>
            </div>
        </div>

        <div class="row mb-4 rounded-3 d-flex align-items-center" style="">
            <div class="col-lg-12 align-items-center">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-3 px-1 d-flex">
                            {{-- Cheia straina ce se salveaza in tabelul cardiologie buletine ecocardiografice --}}
                            <input
                                type="hidden"
                                name="programare_id"
                                value="{{ $programare->id }}">
                        <label for="nume" class="col-form-label pe-1">Nume</label>
                        <input
                            type="text"
                            class="form-control rounded-3 {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                            value="{{ old('nume', $programare->nume) }}"
                            disabled>
                        <label for="nume" class="col-form-label ps-1">,</label>
                    </div>
                    <div class="col-lg-2 px-1 d-flex">
                        <label for="varsta" class="col-form-label pe-1">vârsta</label>
                        <input
                            type="text"
                            name="varsta"
                            class="form-control rounded-3 {{ $errors->has('varsta') ? 'is-invalid' : '' }}"
                            value="{{ old('varsta', $buletin_ecocardiografic->varsta) }}">
                        <label for="varsta" class="col-form-label ps-1">,</label>
                    </div>
                    <div class="col-lg-2 px-1 d-flex">
                        <label for="data" class="col-form-label pe-1">data</label>
                        <vue2-datepicker
                            data-veche="{{ old('data', ($buletin_ecocardiografic->data ?? \Carbon\Carbon::now()->toDateString())) }}"
                            class="{{ $errors->has('data') ? 'form-control is-invalid' : '' }}"
                            nume-camp-db="data"
                            tip="date"
                            value-type="YYYY-MM-DD"
                            format="DD-MM-YYYY"
                            :latime="{ width: '125px' }"
                        ></vue2-datepicker>
                    </div>
                </div>
                {{-- <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">
                            Nume
                            <input
                                type="text"
                                id="varsta"
                                name="varsta"
                                class="form-control bg-white rounded-3 {{ $errors->has('varsta') ? 'is-invalid' : '' }}"
                                value="{{ old('varsta', $buletin_ecocardiografic->varsta) }}"
                                >
                            <span class="badge bg-info"><b>{{ $programare->nume }}</b></span>, varsta
                        </h5>
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
                </div> --}}
            </div>
        </div>

        <div class="row mb-2 rounded-3" style="">
            <div class="col-lg-6 py-1 mb-4 align-items-center" style="background-color: #acffcc">
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
                        <label for="dtdvs_1" class="col-form-label">DTDVS(mm)</label>
                    </div>
                    <div class="col-lg-2 px-0 ">
                        <input
                            type="text"
                            id="dtdvs_1"
                            name="dtdvs_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtdvs_1') ? 'is-invalid' : '' }}"
                            value="{{ old('dtdvs_1', $buletin_ecocardiografic->dtdvs_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="dtdvs_2"
                            name="dtdvs_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('dtdvs_2') ? 'is-invalid' : '' }}"
                            value="{{ old('dtdvs_2', $buletin_ecocardiografic->dtdvs_2) }}">
                    </div>
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="dtdvs_1" class="col-form-label"> < 55mm </label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="sivd_1" class="col-form-label">5-13mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="ppvsd_1" class="col-form-label">5-13mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="dsm_1" class="col-form-label">0-7mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="fs_1" class="col-form-label">25%</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="fe_1" class="col-form-label">60-70%</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="as_1" class="col-form-label">25-45mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="ad_1" class="col-form-label">25-45mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="dtdvd_1" class="col-form-label">< 30mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="pavdd_1" class="col-form-label">< 5mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="rdap_1" class="col-form-label">< 22mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="ao_asc_1" class="col-form-label">< 45mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                        <label for="desc_cusp_ao_1" class="col-form-label">16-26mm</label>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
                        <label for="unda_e_1" class="col-form-label">unda E(m/sec)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="unda_e_1"
                            name="unda_e_1"
                            class="form-control bg-white roundad-3 {{ $errors->has('unda_e_1') ? 'is-invalid' : '' }}"
                            value="{{ old('unda_e_1', $buletin_ecocardiografic->unda_e_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="unda_e_2"
                            name="unda_e_2"
                            class="form-control bg-white roundad-3 {{ $errors->has('unda_e_2') ? 'is-invalid' : '' }}"
                            value="{{ old('unda_e_2', $buletin_ecocardiografic->unda_e_2) }}">
                    </div>
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
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
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 ps-0 pe-1 text-end">
                        <label for="e_a_1" class="col-form-label">E/A</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="e_a_1"
                            name="e_a_1"
                            class="form-control bg-white rounded-3 {{ $errors->has('e_a_1') ? 'is-invalid' : '' }}"
                            value="{{ old('e_a_1', $buletin_ecocardiografic->e_a_1) }}">
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="e_a_2"
                            name="e_a_2"
                            class="form-control bg-white rounded-3 {{ $errors->has('e_a_2') ? 'is-invalid' : '' }}"
                            value="{{ old('e_a_2', $buletin_ecocardiografic->e_a_2) }}">
                    </div>
                    <div class="col-lg-2 ps-1 pe-0 text-start">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 py-1 mb-4 align-items-center" style="background-color: #fee3ff">
                <div class="row justify-content-start">
                    <div class="col-lg-12 px-1 py-2">
                        <h5>VALVA MITRALA</h5>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_mitrala_insertie" class="col-form-label">Insertie</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_mitrala_insertie"
                            name="valva_mitrala_insertie"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_insertie') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_insertie', $buletin_ecocardiografic->valva_mitrala_insertie) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_mitrala_aspect" class="col-form-label">Aspect</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_mitrala_aspect"
                            name="valva_mitrala_aspect"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_aspect') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_aspect', $buletin_ecocardiografic->valva_mitrala_aspect) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_mitrala_mobilitate" class="col-form-label">Mobilitate</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_mitrala_mobilitate"
                            name="valva_mitrala_mobilitate"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_mobilitate') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_mobilitate', $buletin_ecocardiografic->valva_mitrala_mobilitate) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_mitrala_dpmax" class="col-form-label">&Delta;Pmax(mmHg)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_mitrala_dpmax"
                            name="valva_mitrala_dpmax"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_dpmax') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_dpmax', $buletin_ecocardiografic->valva_mitrala_dpmax) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_mitrala_dpmediu" class="col-form-label">&Delta;Pmediu(mmHg)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_mitrala_dpmediu"
                            name="valva_mitrala_dpmediu"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_dpmediu') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_dpmediu', $buletin_ecocardiografic->valva_mitrala_dpmediu) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_mitrala_vmax" class="col-form-label">Vmax(m/s)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_mitrala_vmax"
                            name="valva_mitrala_vmax"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_vmax') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_vmax', $buletin_ecocardiografic->valva_mitrala_vmax) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_mitrala_som" class="col-form-label">SOM(cm<sup>2</sup>)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_mitrala_som"
                            name="valva_mitrala_som"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_som') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_som', $buletin_ecocardiografic->valva_mitrala_som) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_mitrala_pht" class="col-form-label">PHT(ms)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_mitrala_pht"
                            name="valva_mitrala_pht"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_pht') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_pht', $buletin_ecocardiografic->valva_mitrala_pht) }}">
                    </div>
                </div>
                <div class="row justify-content-start mb-5">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_mitrala_som_2d" class="col-form-label">SOM 2D(cm<sup>2</sup>)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_mitrala_som_2d"
                            name="valva_mitrala_som_2d"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_mitrala_som_2d') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_mitrala_som_2d', $buletin_ecocardiografic->valva_mitrala_som_2d) }}">
                    </div>
                </div>

                <div class="row justify-content-start">
                    <div class="col-lg-12 px-1 py-2">
                        <h5>VALVA AORTICA</h5>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_aortica_insertie" class="col-form-label">Insertie</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_aortica_insertie"
                            name="valva_aortica_insertie"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_aortica_insertie') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_aortica_insertie', $buletin_ecocardiografic->valva_aortica_insertie) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_aortica_aspect" class="col-form-label">Aspect</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_aortica_aspect"
                            name="valva_aortica_aspect"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_aortica_aspect') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_aortica_aspect', $buletin_ecocardiografic->valva_aortica_aspect) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_aortica_mobilitate" class="col-form-label">Mobilitate</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_aortica_mobilitate"
                            name="valva_aortica_mobilitate"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_aortica_mobilitate') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_aortica_mobilitate', $buletin_ecocardiografic->valva_aortica_mobilitate) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_aortica_dpmax" class="col-form-label">&Delta;Pmax(mmHg)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_aortica_dpmax"
                            name="valva_aortica_dpmax"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_aortica_dpmax') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_aortica_dpmax', $buletin_ecocardiografic->valva_aortica_dpmax) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_aortica_dpmediu" class="col-form-label">&Delta;Pmediu(mmHg)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_aortica_dpmediu"
                            name="valva_aortica_dpmediu"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_aortica_dpmediu') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_aortica_dpmediu', $buletin_ecocardiografic->valva_aortica_dpmediu) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_aortica_vmax" class="col-form-label">Vmax(m/s)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_aortica_vmax"
                            name="valva_aortica_vmax"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_aortica_vmax') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_aortica_vmax', $buletin_ecocardiografic->valva_aortica_vmax) }}">
                    </div>
                </div>
                <div class="row justify-content-start mb-5">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_aortica_soacont" class="col-form-label">SOAcont(cm<sup>2</sup>)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_aortica_soacont"
                            name="valva_aortica_soacont"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_aortica_soacont') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_aortica_soacont', $buletin_ecocardiografic->valva_aortica_soacont) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-12 px-1 py-2">
                        <h5>VALVA TRICUSPIDA</h5>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_tricuspida_insertie" class="col-form-label">Insertie</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_tricuspida_insertie"
                            name="valva_tricuspida_insertie"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_tricuspida_insertie') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_tricuspida_insertie', $buletin_ecocardiografic->valva_tricuspida_insertie) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_tricuspida_aspect" class="col-form-label">Aspect</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_tricuspida_aspect"
                            name="valva_tricuspida_aspect"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_tricuspida_aspect') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_tricuspida_aspect', $buletin_ecocardiografic->valva_tricuspida_aspect) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-3 px-1 text-end">
                        <label for="valva_tricuspida_mobilitate" class="col-form-label">Mobilitate</label>
                    </div>
                    <div class="col-lg-9 ps-0 pe-2">
                        <input
                            type="text"
                            id="valva_tricuspida_mobilitate"
                            name="valva_tricuspida_mobilitate"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_tricuspida_mobilitate') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_tricuspida_mobilitate', $buletin_ecocardiografic->valva_tricuspida_mobilitate) }}">
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-lg-6 px-1 text-end">
                        <label for="valva_tricuspida_dpmax" class="col-form-label">&Delta;Pmax(mmHg)</label>
                    </div>
                    <div class="col-lg-2 px-0">
                        <input
                            type="text"
                            id="valva_tricuspida_dpmax"
                            name="valva_tricuspida_dpmax"
                            class="form-control bg-white rounded-3 {{ $errors->has('valva_tricuspida_dpmax') ? 'is-invalid' : '' }}"
                            value="{{ old('valva_tricuspida_dpmax', $buletin_ecocardiografic->valva_tricuspida_dpmax) }}">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 py-1 mb-4 align-items-center" style="background-color: #ffebbe">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-3 d-flex align-items-center">
                        <label for="im" class="mb-0 pe-1">IM (grad)</label>
                        <select name="im" class="form-select bg-white rounded-3 {{ $errors->has('im') ? 'is-invalid' : '' }}" style="width: 120px">
                            <option value='' selected>Selectează</option>
                            <option value='I' {{ (old('im', $buletin_ecocardiografic->im) === 'I') ? 'selected' : '' }}> I </option>
                            <option value='II' {{ (old('im', $buletin_ecocardiografic->im) === 'II') ? 'selected' : '' }}> II </option>
                            <option value='III' {{ (old('im', $buletin_ecocardiografic->im) === 'III') ? 'selected' : '' }}> III </option>
                            <option value='IV' {{ (old('im', $buletin_ecocardiografic->im) === 'IV') ? 'selected' : '' }}> IV </option>
                        </select>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center">
                        <label for="ia" class="mb-0 pe-1">IA (grad)</label>
                        <select name="ia" class="form-select bg-white rounded-3 {{ $errors->has('im') ? 'is-invalid' : '' }}" style="width: 120px">
                            <option value='' selected>Selectează</option>
                            <option value='I' {{ (old('ia', $buletin_ecocardiografic->ia) === 'I') ? 'selected' : '' }}> I </option>
                            <option value='II' {{ (old('ia', $buletin_ecocardiografic->ia) === 'II') ? 'selected' : '' }}> II </option>
                            <option value='III' {{ (old('ia', $buletin_ecocardiografic->ia) === 'III') ? 'selected' : '' }}> III </option>
                            <option value='IV' {{ (old('ia', $buletin_ecocardiografic->ia) === 'IV') ? 'selected' : '' }}> IV </option>
                        </select>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center">
                        <label for="ip" class="mb-0 pe-1">IP (grad)</label>
                        <select name="ip" class="form-select bg-white rounded-3 {{ $errors->has('im') ? 'is-invalid' : '' }}" style="width: 120px">
                            <option value='' selected>Selectează</option>
                            <option value='I' {{ (old('ip', $buletin_ecocardiografic->ip) === 'I') ? 'selected' : '' }}> I </option>
                            <option value='II' {{ (old('ip', $buletin_ecocardiografic->ip) === 'II') ? 'selected' : '' }}> II </option>
                            <option value='III' {{ (old('ip', $buletin_ecocardiografic->ip) === 'III') ? 'selected' : '' }}> III </option>
                            <option value='IV' {{ (old('ip', $buletin_ecocardiografic->ip) === 'IV') ? 'selected' : '' }}> IV </option>
                        </select>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center">
                        <label for="it" class="mb-0 pe-1">IT (grad)</label>
                        <select name="it" class="form-select bg-white rounded-3 {{ $errors->has('im') ? 'is-invalid' : '' }}" style="width: 120px">
                            <option value='' selected>Selectează</option>
                            <option value='I' {{ (old('it', $buletin_ecocardiografic->it) === 'I') ? 'selected' : '' }}> I </option>
                            <option value='II' {{ (old('it', $buletin_ecocardiografic->it) === 'II') ? 'selected' : '' }}> II </option>
                            <option value='III' {{ (old('it', $buletin_ecocardiografic->it) === 'III') ? 'selected' : '' }}> III </option>
                            <option value='IV' {{ (old('it', $buletin_ecocardiografic->it) === 'IV') ? 'selected' : '' }}> IV </option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-12 py-1 mb-4 align-items-center" style="background-color: #ffebbe">
                <vue-tiptap
                text-vechi="{{ old('concluzii') == '' ? $buletin_ecocardiografic->concluzii : old('concluzii') }}"
                nume-camp-db="concluzii"
                ></vue-tiptap>
            </div> --}}



            <div class="col-lg-12 py-1 mb-4 align-items-center" style="background-color: #cfbeff">
                <label for="concluzii" class="mb-0">Concluzii:</label>
                <tinymce-vue
                inputvalue="{{ old('concluzii') == '' ? $buletin_ecocardiografic->concluzii : old('concluzii') }}"
                inputname="concluzii"
                ></tinymce-vue>
            </div>
        </div>


    {{-- TinyMCE --}}
    {{-- <script src="https://cdn.tiny.cloud/1/qfvel52dls643trvhfl7htj92heo6mggf0lwt3uha1vnos13/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    <textarea id="mytextarea" name="concluzii">Hello, World!</textarea> --}}

        <div class="row">
            <div class="col-lg-12 mb-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white me-3 rounded-3">{{ $buttonText }}</button>
                <a class="btn btn-secondary rounded-3" href="{{ Session::get('cardiologie_programare_return_url') }}">Renunță</a>
            </div>
        </div>
    </div>
</div>
