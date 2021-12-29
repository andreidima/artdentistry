@csrf

<div class="row mb-0 p-3 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 mb-0">

        <div class="row mb-0">
            <div class="col-lg-12 d-flex align-items-left">
                <div class="me-4">
                    Este posibil să fiți gravidă?
                </div>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" value="1" name="gravida" id="gravida"
                        {{ old('gravida', $chestionar->gravida) == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gravida">
                        DA
                    </label>
                </div>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" value="0" name="gravida" id="gravida"
                        {{ old('gravida', $chestionar->gravida) == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gravida">
                        NU
                    </label>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="varsta_sarcina" class="col-form-label">Dacă sunteți gravidă ce vârstă are sarcina?</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            id="varsta_sarcina"
                            name="varsta_sarcina"
                            class="form-control bg-white rounded-3 {{ $errors->has('varsta_sarcina') ? 'is-invalid' : '' }}" aria-describedby="varsta_sarcinaHelpInline"
                            value="{{ old('varsta_sarcina', $chestionar->varsta_sarcina) }}">
                    </div>
                    <div class="col-auto">
                        <span id="varsta_sarcinaHelpInline" class="form-text">
                            săptămâni
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-5 d-flex align-items-left">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="data_menstruatie" class="col-form-label">Data ultimei menstruații</label>
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

        <div class="row">
            <div class="col-lg-12 mb-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white me-3 rounded-3">{{ $buttonText }}</button>
                <a class="btn btn-secondary rounded-3" href="/fise-de-tratament">Renunță</a>
            </div>
        </div>
    </div>
</div>
