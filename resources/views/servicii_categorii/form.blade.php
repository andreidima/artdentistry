@csrf

<div class="row mb-0 d-flex border-radius: 0px 0px 40px 40px" id="app1">
    <div class="col-lg-12 px-2 mb-0">
        <div class="row">
            <div class="col-lg-12 mb-2">
                <label for="nume" class="mb-0 ps-3">Nume:*</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                    name="nume"
                    placeholder=""
                    value="{{ old('nume', $serviciu_categorie->nume) }}"
                    required>
            </div>
            <div class="col-lg-12 mb-2">
                <label for="descriere" class="mb-0 ps-3">Descriere:</label>
                <textarea class="form-control form-control-sm {{ $errors->has('descriere') ? 'is-invalid' : '' }}"
                    name="descriere" rows="2">{{ old('descriere', $serviciu_categorie->descriere) }}</textarea>
            </div>
            <div class="col-lg-12 mb-2">
                <label for="observatii" class="mb-0 ps-3">Observații:</label>
                <textarea class="form-control form-control-sm {{ $errors->has('observatii') ? 'is-invalid' : '' }}"
                    name="observatii" rows="2">{{ old('observatii', $serviciu_categorie->observatii) }}</textarea>
            </div>
        </div>

        <div class="row py-2 justify-content-center">
            <div class="col-lg-8 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white btn-sm me-2 rounded-pill">{{ $buttonText }}</button>
                <a class="btn btn-secondary btn-sm rounded-pill" href="/servicii-categorii">Renunță</a>
            </div>
        </div>
    </div>
</div>
