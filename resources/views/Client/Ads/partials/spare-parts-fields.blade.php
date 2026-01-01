{{-- BRAND --}}
<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label for="brandSelect" class="form-label fw-bold primary-color">{{ __('front.brand') }}</label>
            <p class="text-black-50">{{ __('front.brands_examples') }}</p>
        </div>

        <div class="col-lg-9">
            <select name="brand_id"
                    id="brandSelect"
                    class="form-select form-control bg-transparent py-2 rounded-3 text-secondary"
                    required>

                <option value="">{{ __('front.choose_brand') }}</option>

                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                            @selected(old('brand_id') == $brand->id)>
                        {{ $brand->trans('title') }}
                    </option>
                @endforeach
            </select>

            @error('brand_id')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>


{{-- MODEL --}}
<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label for="modelSelect" class="form-label fw-bold primary-color">{{ __('front.model') }}</label>
            <p class="text-black-50">{{ __('front.models_examples') }}</p>
        </div>

        <div class="col-lg-9">
            <select name="model_id"
                    id="modelSelect"
                    class="form-select form-control bg-transparent py-2 rounded-3 text-secondary"
                    required>

                <option value="">{{ __('front.choose_model') }}</option>

                @foreach($models as $model)
                    <option value="{{ $model->id }}"
                            data-brand="{{ $model->brand_id }}"
                            @selected(old('model_id') == $model->id)>
                        {{ $model->trans('title') }}
                    </option>
                @endforeach
            </select>

            @error('model_id')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>


{{-- TYPE --}}
<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label class="form-label fw-bold primary-color">{{ __('front.type') }}</label>
            <p class="text-black-50">{{ __('front.type_examples') }}</p>
        </div>

        <div class="col-lg-9">
            <select name="type_id"
                    class="form-select form-control bg-transparent py-2 rounded-3 text-secondary"
                    required>

                <option value="">{{ __('front.choose_type') }}</option>

                @foreach($sparePartsTypes as $sparePartsType)
                    <option value="{{ $sparePartsType->id }}"
                            @selected(old('spare_part_type_id') == $sparePartsType->id)>
                        {{ $sparePartsType->trans('title') }}
                    </option>
                @endforeach

            </select>

            @error('spare_part_type_id')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
