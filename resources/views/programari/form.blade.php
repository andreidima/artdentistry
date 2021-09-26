@csrf

<div class="row mb-0 d-flex border-radius: 0px 0px 40px 40px" id="app1">
    <div class="col-lg-12 px-2 mb-0">
        <div class="row">
            <div class="col-lg-12 mb-2">
                <label for="pacient_id" class="mb-0 ps-3">Pacient*:</label>
                <select name="pacient_id"
                    class="form-select form-select-sm rounded-pill {{ $errors->has('pacient_id') ? 'is-invalid' : '' }}"
                >
                        <option value='' selected>Selectează</option>
                    @foreach ($pacienti as $pacient)
                        <option
                            value='{{ $pacient->id }}'
                            {{ ($pacient->id == old('pacient_id', $programare->pacient_id)) ? 'selected' : '' }}
                        >{{ $pacient->nume }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 mb-2">
                <label for="data" class="mb-0 ps-1">Data:</label>
                    <vue2-datepicker
                        data-veche="{{ old('data', ($programare->data ?? '')) }}"
                        nume-camp-db="data"
                        tip="date"
                        value-type="YYYY-MM-DD"
                        format="DD-MM-YYYY"
                        :latime="{ width: '125px' }"
                    ></vue2-datepicker>
            </div>
            <div class="col-lg-4 mb-2 text-lg-center">
                <label for="ora_inceput" class="mb-0 ps-1">Ora sosire:</label>
                    <vue2-datepicker
                        data-veche="{{ old('ora_inceput', ($programare->ora_inceput ?? '')) }}"
                        nume-camp-db="ora_inceput"
                        tip="time"
                        value-type="HH:mm"
                        format="HH:mm"
                        :latime="{ width: '90px' }"
                    ></vue2-datepicker>
            </div>
            <div class="col-lg-4 mb-2 text-lg-end">
                <label for="ora_plecare" class="mb-0 pe-2">Ora plecare:</label>
                    <vue2-datepicker
                        data-veche="{{ old('ora_plecare', ($programare->ora_plecare ?? '')) }}"
                        nume-camp-db="ora_plecare"
                        tip="time"
                        value-type="HH:mm"
                        format="HH:mm"
                        :latime="{ width: '90px' }"
                    ></vue2-datepicker>
            </div>
            <div class="col-lg-12 mb-2">
                <label for="pret_total" class="mb-0 ps-3">Preț total:</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('pret_total') ? 'is-invalid' : '' }}"
                    name="pret_total"
                    placeholder=""
                    value="{{ old('pret_total', $programare->pret_total) }}"
                    required>
            </div>
            <div class="col-lg-12 mb-2">
                <label for="observatii" class="mb-0 ps-3">Observații:</label>
                <textarea class="form-control form-control-sm {{ $errors->has('observatii') ? 'is-invalid' : '' }}"
                    name="observatii" rows="2">{{ old('observatii', $programare->observatii) }}</textarea>
            </div>
        </div>

        <div class="row py-2 justify-content-center">
            <div class="col-lg-8 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white btn-sm me-2 rounded-pill">{{ $buttonText }}</button>
                <a class="btn btn-secondary btn-sm rounded-pill" href="/programari">Renunță</a>
            </div>
        </div>
    </div>
</div>
