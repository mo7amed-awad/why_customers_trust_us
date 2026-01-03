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

{{-- FUEL TYPE --}}
<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label class="form-label fw-bold primary-color">{{ __('front.fuel_type') }}</label>
            <p class="text-black-50">{{ __('front.fuel_type_examples') }}</p>
        </div>

        <div class="col-lg-9">
            <select name="fuel_type"
                    class="form-select form-control bg-transparent py-2 rounded-3 text-secondary"
                    required>

                <option value="">{{ __('front.choose_fuel_type') }}</option>

                <option value="gasoline" @selected(old('fuel_type')=='gasoline')>{{ __('front.fuel_gasoline') }}</option>
                <option value="diesel"   @selected(old('fuel_type')=='diesel')>{{ __('front.fuel_diesel') }}</option>
                <option value="gas"      @selected(old('fuel_type')=='gas')>{{ __('front.fuel_gas') }}</option>
                <option value="electric" @selected(old('fuel_type')=='electric')>{{ __('front.fuel_electric') }}</option>
                <option value="hybrid"   @selected(old('fuel_type')=='hybrid')>{{ __('front.fuel_hybrid') }}</option>
            </select>

            @error('fuel_type')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

{{-- TRANSMISSION --}}
<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label class="form-label fw-bold primary-color">{{ __('front.transmission') }}</label>
            <p class="text-black-50">{{ __('front.transmission_examples') }}</p>
        </div>

        <div class="col-lg-9">
            <select name="transmission"
                    class="form-select form-control bg-transparent py-2 rounded-3 text-secondary"
                    required>

                <option value="">{{ __('front.choose_transmission') }}</option>

                <option value="manual"           @selected(old('transmission')=='manual')>{{ __('front.manual') }}</option>
                <option value="automatic"        @selected(old('transmission')=='automatic')>{{ __('front.automatic') }}</option>
                <option value="cvt"               @selected(old('transmission')=='cvt')>{{ __('front.cvt') }}</option>
                <option value="semi_automatic"    @selected(old('transmission')=='semi_automatic')>{{ __('front.semi_automatic') }}</option>
            </select>

            @error('transmission')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row g-3 align-items-center">

        {{-- MILEAGE --}}
        <div class="col-lg-6">
            <label class="form-label fw-bold primary-color">{{ __('front.mileage') }}</label>
            <input type="number"
                   name="mileage"
                   class="form-control bg-transparent py-2 rounded-3"
                   placeholder="{{ __('front.mileage_placeholder') }}"
                   value="{{ old('mileage') }}"
                   min="0"
                   required>

            @error('mileage')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- ENGINE --}}
        <div class="col-lg-6">
            <label class="form-label fw-bold primary-color">{{ __('front.engine') }}</label>
            <input type="text"
                   name="engine"
                   class="form-control bg-transparent py-2 rounded-3"
                   placeholder="{{ __('front.engine_placeholder') }}"
                   value="{{ old('engine') }}"
                   required>

            @error('engine')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

    </div>
</div>


<div class="row g-3">
    @foreach($features as $feature)
        <div class="col-md-4">
            <div class="card p-2 h-100">
                <div class="d-flex align-items-center mb-2">
                    @if($feature->icon)
                        <img src="{{ $feature->icon }}" alt="{{ $feature->trans('title') }}" class="me-2" style="width:24px; height:24px;">
                    @endif
                    <span class="fw-bold">{{ $feature->trans('title') }}</span>
                </div>

                @if($feature->type === 'text')
                    <input type="text" name="features[{{ $feature->id }}]" class="form-control" value="{{ old('features.'.$feature->id) }}">
                @elseif($feature->type === 'number')
                    <input type="number" name="features[{{ $feature->id }}]" class="form-control" value="{{ old('features.'.$feature->id) }}">
                @elseif($feature->type === 'checkbox')
                    <div class="form-check">
                        <input type="hidden" name="features[{{ $feature->id }}]" value="0"/>
                        <input type="checkbox" id="feature_{{ $feature->id }}" name="features[{{ $feature->id }}]" value="1" class="form-check-input" @checked(old('features.'.$feature->id))>
                        <label class="form-check-label" for="feature_{{ $feature->id }}">{{ $feature->trans('title') }}</label>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
