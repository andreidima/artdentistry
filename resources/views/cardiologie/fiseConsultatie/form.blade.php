@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px">
    <div class="col-lg-12 mb-0">

        <div class="row mb-4 d-flex text-center" style="">
            <div class="col-12">
                <h3 class="m-0">FIȘĂ CONSULTAȚIE</h3>
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
                            value="{{ old('varsta', $fisa_consultatie->varsta) }}">
                        <label for="varsta" class="col-form-label ps-1">,</label>
                    </div>
                    <div class="col-lg-2 px-1 d-flex" id="app">
                        <label for="data" class="col-form-label pe-1">data</label>
                        <vue2-datepicker
                            data-veche="{{ old('data', ($fisa_consultatie->data ?? \Carbon\Carbon::now()->toDateString())) }}"
                            class="{{ $errors->has('data') ? 'form-control is-invalid' : '' }}"
                            nume-camp-db="data"
                            tip="date"
                            value-type="YYYY-MM-DD"
                            format="DD-MM-YYYY"
                            :latime="{ width: '125px' }"
                        ></vue2-datepicker>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row mb-2 rounded-3" style="">
            <div class="col-lg-6 py-1 mb-4 align-items-center">
                <label for="motive_prezentare" class="mb-0 ps-3">Motivele prezentării: evaluare cardiovasculară</label>
                <textarea class="form-control bg-white {{ $errors->has('motive_prezentare') ? 'is-invalid' : '' }}"
                    name="motive_prezentare" rows="3">{{ old('motive_prezentare', $fisa_consultatie->motive_prezentare) }}</textarea>
            </div>
            <div class="col-lg-6 py-1 mb-4 align-items-center">
                <label for="factori_de_risc_cardiovasculari" class="mb-0 ps-3">Factori de risc cardiovasculari:</label>
                <textarea class="form-control bg-white {{ $errors->has('factori_de_risc_cardiovasculari') ? 'is-invalid' : '' }}"
                    name="factori_de_risc_cardiovasculari" rows="3">{{ old('factori_de_risc_cardiovasculari', $fisa_consultatie->factori_de_risc_cardiovasculari) }}</textarea>
            </div>
            <div class="col-lg-6 py-1 mb-4 align-items-center">
                <label for="antecedente_personale_patologice" class="mb-0 ps-3">Antecedente personale patologice:</label>
                <textarea class="form-control bg-white {{ $errors->has('antecedente_personale_patologice') ? 'is-invalid' : '' }}"
                    name="antecedente_personale_patologice" rows="3">{{ old('antecedente_personale_patologice', $fisa_consultatie->antecedente_personale_patologice) }}</textarea>
            </div>
            <div class="col-lg-6 py-1 mb-4 align-items-center">
                <label for="diagnostic" class="mb-0 ps-3">Diagnostic:</label>
                <textarea class="form-control bg-white {{ $errors->has('diagnostic') ? 'is-invalid' : '' }}"
                    name="diagnostic" rows="3">{{ old('diagnostic', $fisa_consultatie->diagnostic) }}</textarea>
            </div>
            <div class="col-lg-6 py-1 mb-4 align-items-center">
                <label for="examen_clinic" class="mb-0 ps-3">Examen clinic:</label>
                <textarea class="form-control bg-white {{ $errors->has('examen_clinic') ? 'is-invalid' : '' }}"
                    name="examen_clinic" rows="3">{{ old('examen_clinic', $fisa_consultatie->examen_clinic) }}</textarea>
            </div>
            <div class="col-lg-6 py-1 mb-4 align-items-center">
                <label for="ekg" class="mb-0 ps-3">EKG:</label>
                <textarea class="form-control bg-white {{ $errors->has('ekg') ? 'is-invalid' : '' }}"
                    name="ekg" rows="3">{{ old('ekg', $fisa_consultatie->ekg) }}</textarea>
            </div>
            <div class="col-lg-6 py-1 mb-4 align-items-center">
                <label for="tratament_efectuat" class="mb-0 ps-3">Tratament efectuat:</label>
                <textarea class="form-control bg-white {{ $errors->has('tratament_efectuat') ? 'is-invalid' : '' }}"
                    name="tratament_efectuat" rows="3">{{ old('tratament_efectuat', $fisa_consultatie->tratament_efectuat) }}</textarea>
            </div>
        </div> --}}

        <div class="row mb-2 rounded-3" style="">
            <div class="col-lg-12 py-1 mb-4 align-items-center">
                <label for="" class="mb-0 ps-3">Tratament recomandat conform schemei:</label>
                {{-- @php
                    echo count($fisa_consultatie->medicamente['nume']);
                    dd($fisa_consultatie->medicamente['nume']);
                @endphp --}}

                    <div class="row" id="medicamente">

                                        <div class="form-group col-lg-12 justify-content-end m-0">
                                                <script type="application/javascript">
                                                    medicamenteNumeVechi={!! json_encode(\Illuminate\Support\Arr::flatten(old('medicamente.nume', ($fisa_consultatie->medicamente['nume'] ?? [])))) !!}
                                                    medicamenteDimineataVechi={!! json_encode(\Illuminate\Support\Arr::flatten(old('medicamente.dimineata', ($fisa_consultatie->medicamente['dimineata'] ?? [])))) !!}
                                                    medicamentePranzVechi={!! json_encode(\Illuminate\Support\Arr::flatten(old('medicamente.pranz', ($fisa_consultatie->medicamente['pranz'] ?? [])))) !!}
                                                    medicamenteSearaVechi={!! json_encode(\Illuminate\Support\Arr::flatten(old('medicamente.seara', ($fisa_consultatie->medicamente['seara'] ?? [])))) !!}

                                                    numarMedicamente = {!! json_encode(intval(old('numar_medicamente', (count($fisa_consultatie->medicamente['nume']) ?? 0)))) !!}
                                                </script>
                                            <div>
                                                <div v-for="medicament in numar_medicamente" :key="medicament">
                                                    <div class="form-row align-items-start mb-2" style="background-color:#005757; border-radius: 10px 10px 10px 10px;">
                                                        <div class="col-lg-2">
                                                            <div class="row">
                                                                <div class="form-group col-lg-12 mb-0 pb-0">
                                                                    Medicament @{{ medicament }}:
                                                                    <br>
                                                                    <button  type="button" class="btn m-0 p-0 mb-1" @click="stergeMedicament(medicament-1)">
                                                                        <span class="px-1" style="background-color:red; color:white; border-radius:20px">
                                                                            Șterge medicamentul
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <input type="text"
                                                                        class="form-control"
                                                                        :name="'medicamente[nume][' + medicament + ']'"
                                                                        v-model="medicamente_nume[medicament-1]">
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="text"
                                                                        class="form-control"
                                                                        :name="'medicamente[dimineata][' + medicament + ']'"
                                                                        v-model="medicamente_dimineata[medicament-1]">
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="text"
                                                                        class="form-control"
                                                                        :name="'medicamente[pranz][' + medicament + ']'"
                                                                        v-model="medicamente_pranz[medicament-1]">
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <input type="text"
                                                                        class="form-control"
                                                                        :name="'medicamente[seara][' + medicament + ']'"
                                                                        v-model="medicamente_seara[medicament-1]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="hidden" name="numar_medicamente" v-model="numar_medicamente">
                                                    <button type="button" class="btn btn-success" @click="numar_medicamente++">Adaugă medicament</button>
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
