@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app1">
    <div class="col-lg-12 mb-0">
        <div class="row mb-0 align-items-center">
            <div class="col-lg-12 mb-4">
                <label for="cod_de_bare" class="mb-0 ps-3">Cod de bare:</label>
                <input
                    type="text"
                    class="form-control bg-white rounded-pill {{ $errors->has('cod_de_bare') ? 'is-invalid' : '' }}"
                    name="cod_de_bare"
                    placeholder=""
                    value="{{ $eticheta->cod_de_bare ?? (App\Models\Eticheta::max('cod_de_bare') ?? 99999) + 1 }}"
                    required
                    readonly>
            </div>
            <div class="col-lg-12 mb-4">
                <label for="operator" class="mb-0 ps-3">Operator:</label>
                <input
                    type="text"
                    class="form-control bg-white rounded-pill {{ $errors->has('operator') ? 'is-invalid' : '' }}"
                    name="operator"
                    placeholder=""
                    value="{{ old('operator', $eticheta->operator) }}"
                    required>
            </div>
            <div class="col-lg-12 mb-4">
                <label for="data" class="mb-0 ps-1">Data:</label>
                    <vue2-datepicker
                        data-veche="{{ old('data', ($eticheta->data ?? \Carbon\Carbon::now())) }}"
                        nume-camp-db="data"
                        tip="date"
                        value-type="YYYY-MM-DD"
                        format="DD-MM-YYYY"
                        :latime="{ width: '125px' }"
                    ></vue2-datepicker>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 py-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white me-2 rounded-3 shadow">{{ $buttonText }}</button>
                <a class="btn btn-secondary rounded-3 shadow" href="/etichete">Renunță</a>
            </div>
        </div>
    </div>
</div>
