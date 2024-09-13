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

        <div class="row mb-2 rounded-3" style="" id="fisaConsultatieCardiologie">
            {{-- <script type="application/javascript">
                motive_prezentare={!! json_encode(old('motive_prezentare', $fisa_consultatie->motive_prezentare)) !!}
                factori_de_risc_cardiovasculari={!! json_encode(old('factori_de_risc_cardiovasculari', $fisa_consultatie->factori_de_risc_cardiovasculari)) !!}
                antecedente_personale_patologice={!! json_encode(old('antecedente_personale_patologice', $fisa_consultatie->antecedente_personale_patologice)) !!}
                diagnostic={!! json_encode(old('diagnostic', $fisa_consultatie->diagnostic)) !!}
                examen_clinic={!! json_encode(old('examen_clinic', $fisa_consultatie->examen_clinic)) !!}
                ekg={!! json_encode(old('ekg', $fisa_consultatie->ekg)) !!}
                tratament_efectuat={!! json_encode(old('tratament_efectuat', $fisa_consultatie->tratament_efectuat)) !!}

                programareUltimaDeLaAcelasiPacient={!! json_encode($programareUltimaDeLaAcelasiPacient) !!}
            </script> --}}
            {{-- <div class="col-lg-6 py-1 mb-4 align-items-center" v-on:focus="programareAutocomplete = programareUltimaDeLaAcelasiPacient;" v-click-outside="programareAutocomplete = ''"> --}}
            {{-- <div class="col-lg-6 py-1 mb-4 align-items-center" v-click-outside="programareAutocomplete = ''">
                <label for="motive_prezentare" class="mb-0 ps-3">Motivele prezentării: evaluare cardiovasculară</label>
                <textarea class="form-control bg-white {{ $errors->has('motive_prezentare') ? 'is-invalid' : '' }}"
                    name="motive_prezentare" rows="3" v-model="motive_prezentare" v-on:focus="motivePrezentareAutocomplete = programareUltimaDeLaAcelasiPacient.fisa_consultatie.motive_prezentare;"></textarea>
                <div v-cloak v-if="!motive_prezentare || (motivePrezentareAutocomplete && motivePrezentareAutocomplete.toLowerCase().includes(motive_prezentare.toLowerCase()))"
                    class="panel-footer">
                    <div class="list-group">
                        <button class="list-group-item list-group-item list-group-item-action py-0"
                            v-on:click="motive_prezentare = motivePrezentareAutocomplete"
                            >
                                @{{ programareUltimaDeLaAcelasiPacient.fisa_consultatie.motive_prezentare }}
                        </button>
                        </li>
                    </div>
                </div>
            </div> --}}
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
        </div>
@php
    // echo $fisa_consultatie->medicamente ? 'da' : 'nu';
    // dd($fisa_consultatie->medicamente['nume'], \Illuminate\Support\Arr::flatten($fisa_consultatie->medicamente['nume']));
    // dd(is_array($fisa_consultatie->medicamente));
@endphp
        <div class="row mb-5 rounded-3" style="background-color:#90deff">
            <div class="col-lg-12 py-2 px-4 mb-0 align-items-center">
                <label for="" class="mb-0 ps-3">Tratament recomandat conform schemei:</label>
                <div class="row mb-0" id="medicamente">
                    <div class="form-group col-lg-12 mb-0 justify-content-end">
                            <script type="application/javascript">
                                medicamenteNumeVechi={!! json_encode(\Illuminate\Support\Arr::flatten(old('medicamente.nume', ($fisa_consultatie->medicamente['nume'] ?? [])))) !!}
                                medicamenteDimineataVechi={!! json_encode(\Illuminate\Support\Arr::flatten(old('medicamente.dimineata', ($fisa_consultatie->medicamente['dimineata'] ?? [])))) !!}
                                medicamentePranzVechi={!! json_encode(\Illuminate\Support\Arr::flatten(old('medicamente.pranz', ($fisa_consultatie->medicamente['pranz'] ?? [])))) !!}
                                medicamenteSearaVechi={!! json_encode(\Illuminate\Support\Arr::flatten(old('medicamente.seara', ($fisa_consultatie->medicamente['seara'] ?? [])))) !!}

                                // Se verifica daca „is_array($fisa_consultatie->medicamente)”, pentru ca la create este o colectie goala, iar la edit este un array
                                numarMedicamente = {!! json_encode(intval(old('numar_medicamente', (is_array($fisa_consultatie->medicamente) ? count($fisa_consultatie->medicamente['nume']) : 0)))) !!}
                                </script>

                                {{-- numarMedicamente = {!! json_encode(intval(old('numar_medicamente', ($fisa_consultatie->medicamente->count() ? count($fisa_consultatie->medicamente['nume']) : 0)))) !!}
                                numarMedicamente = {!! json_encode(intval(old('numar_medicamente', (count(\Illuminate\Support\Arr::flatten($fisa_consultatie->medicamente)) ?? 0)))) !!} --}}
                        <div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row mb-0">
                                        <div class="col-lg-3 text-center border border-dark border-1">
                                            Medicament
                                        </div>
                                        <div class="col-lg-2 text-center border border-dark border-1">
                                            Dimineata
                                        </div>
                                        <div class="col-lg-2 text-center border border-dark border-1">
                                            Prânz
                                        </div>
                                        <div class="col-lg-2 text-center border border-dark border-1">
                                            Seara
                                        </div>
                                        <div class="col-lg-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-for="medicament in numar_medicamente" :key="medicament">
                                <div class="row align-items-start mb-0">
                                    {{-- <div class="col-lg-2">
                                        <div class="row">
                                            <div class="form-group col-lg-12 mb-0 pb-0">
                                                <span class="text-white"> Medicament @{{ medicament }}:</span>
                                                <br>
                                                <button  type="button" class="btn m-0 p-0 mb-1" @click="stergeMedicament(medicament-1)">
                                                    <span class="px-1" style="background-color:red; color:white; border-radius:20px">
                                                        Șterge medicamentul
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12">
                                        <div class="row">
                                            {{-- <div class="col-lg-3">
                                                <span class="text-white"> Medicament @{{ medicament }}:</span>
                                                <br>
                                                <button  type="button" class="btn m-0 p-0 mb-1" @click="stergeMedicament(medicament-1)">
                                                    <span class="px-1" style="background-color:red; color:white; border-radius:20px">
                                                        Șterge medicamentul
                                                    </span>
                                                </button>
                                            </div> --}}
                                            <div class="col-lg-3 border border-dark border-1">
                                                <input type="text"
                                                    class="form-control"
                                                    :name="'medicamente[nume][' + medicament + ']'"
                                                    v-model="medicamente_nume[medicament-1]">
                                            </div>
                                            <div class="col-lg-2 border border-dark border-1">
                                                <input type="text"
                                                    class="form-control"
                                                    :name="'medicamente[dimineata][' + medicament + ']'"
                                                    v-model="medicamente_dimineata[medicament-1]">
                                            </div>
                                            <div class="col-lg-2 border border-dark border-1">
                                                <input type="text"
                                                    class="form-control"
                                                    :name="'medicamente[pranz][' + medicament + ']'"
                                                    v-model="medicamente_pranz[medicament-1]">
                                            </div>
                                            <div class="col-lg-2 border border-dark border-1">
                                                <input type="text"
                                                    class="form-control"
                                                    :name="'medicamente[seara][' + medicament + ']'"
                                                    v-model="medicamente_seara[medicament-1]">
                                            </div>
                                            <div class="col-lg-1 d-flex align-items-center border border-dark border-1">
                                                {{-- <span class="text-white"> Medicament @{{ medicament }}:</span> --}}
                                                <button  type="button" class="btn m-0 p-0 mb-1" @click="stergeMedicament(medicament-1)">
                                                    <span class="px-1 badge" style="background-color:red; color:white; border-radius:20px">
                                                        Șterge
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10 d-flex justify-content-center py-1">
                                    <input type="hidden" name="numar_medicamente" v-model="numar_medicamente">
                                    <button type="button" class="btn btn-success text-white" @click="numar_medicamente++">Adaugă medicament</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-primary text-white me-3 rounded-3">{{ $buttonText }}</button>
                <a class="btn btn-lg btn-secondary rounded-3" href="{{ Session::get('cardiologie_programare_return_url') }}">Renunță</a>
            </div>
        </div>
    </div>
</div>
