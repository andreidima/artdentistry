@csrf

<div class="row mb-0 d-flex border-radius: 0px 0px 40px 40px" id="app">
    <div class="col-lg-12 px-2 mb-0">
        <div class="row">
            <div class="col-lg-12 mb-2">
                <label for="serviciu_id" class="mb-0 ps-3">Categorie:</label>
                <select name="serviciu_id"
                    class="form-select form-select-sm rounded-pill {{ $errors->has('serviciu_id') ? 'is-invalid' : '' }}"
                >
                        <option value='' selected>Selectează</option>
                    @foreach ($categorii as $categorie)
                        <option
                            value='{{ $categorie->id }}'
                            {{ ($categorie->id == old('serviciu_id', $serviciu->serviciu_id)) ? 'selected' : '' }}
                        >{{ $categorie->nume }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 mb-2">
                <label for="nume" class="mb-0 ps-3">Nume:*</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('nume') ? 'is-invalid' : '' }}"
                    name="nume"
                    placeholder=""
                    value="{{ old('nume', $serviciu->nume) }}"
                    required>
            </div>
            <div class="col-lg-12 mb-2">
                <label for="pret" class="mb-0 ps-3">Preț:</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-pill {{ $errors->has('pret') ? 'is-invalid' : '' }}"
                    name="pret"
                    placeholder=""
                    value="{{ old('pret', $serviciu->pret) }}">
            </div>
            <div class="col-lg-12 mb-2">
                <label for="descriere" class="mb-0 ps-3">Descriere:</label>
                <textarea class="form-control form-control-sm {{ $errors->has('descriere') ? 'is-invalid' : '' }}"
                    name="descriere" rows="2">{{ old('descriere', $serviciu->descriere) }}</textarea>
            </div>
            <div class="col-lg-12 mb-2">
                <label for="observatii" class="mb-0 ps-3">Observații:</label>
                <textarea class="form-control form-control-sm {{ $errors->has('observatii') ? 'is-invalid' : '' }}"
                    name="observatii" rows="2">{{ old('observatii', $serviciu->observatii) }}</textarea>
            </div>
        </div>

        <div class="row py-2 justify-content-center">
            <div class="col-lg-8 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-white btn-sm me-2 rounded-pill">{{ $buttonText }}</button>
                <a class="btn btn-secondary btn-sm rounded-pill" href="/servicii">Renunță</a>
            </div>
        </div>
    </div>
</div>
