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
