<!-- Price Filter -->
<div class="py-3 border-bottom">
    <h5 class="py-2 fw-bold mb-3">{{ __('front.price') }}</h5>
    <div class="px-2">
        <div class="wrapper-price w-100">
            <div class="slider-price position-relative"
                 style="height: 5px; background: #e5e7eb; border-radius: 5px;">
                <div class="progress-price"
                     style="position: absolute; height: 5px; background: #3b82f6; border-radius: 5px; left: 0; right: 0;">
                </div>
            </div>
            <div class="range-input-price position-relative">
                <input type="range"
                       name="price_min"
                       class="range-min-price position-absolute w-100"
                       min="0"
                       max="10000000"
                       value="{{ request('price_min', 0) }}"
                       step="50000"
                       style="pointer-events: all; -webkit-appearance: none; appearance: none; background: transparent; height: 5px;">
                <input type="range"
                       name="price_max"
                       class="range-max-price position-absolute w-100"
                       min="0"
                       max="10000000"
                       value="{{ request('price_max', 10000000) }}"
                       step="50000"
                       style="pointer-events: all; -webkit-appearance: none; appearance: none; background: transparent; height: 5px;">
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
            <div class="d-flex gap-1">
                <span class="text-muted small d-block mb-1">{{ __('front.price') }}</span>
                <span class="fs-6">
                    <span class="price-min-value">{{ number_format(request('price_min', 0) / 1000000, 1) }}</span>
                    <span> : </span>
                    <span class="price-max-value">{{ number_format(request('price_max', 10000000) / 1000000, 1) }}</span>
                    <span> {{ __('front.million') }}</span>
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Accordion Filters -->
<div class="row">
    <div class="accordion col-12" id="accordionExample">

        <!-- Brand Filter -->
        <div class="accordion-item border-0 border-bottom">
            <div class="accordion-header lh-base">
                <button class="collapsed accordion-button px-0 fw-medium"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseBrand"
                        aria-expanded="false"
                        aria-controls="collapseBrand">
                    <h5 class="pb-2 fw-semibold mb-0">{{ __('front.brand') }}</h5>
                </button>
            </div>
            <div id="collapseBrand"
                 class="accordion-collapse collapse"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body px-0">
                    <div class="py-2">
                        @foreach($brands as $brand)
                            <div class="d-flex align-items-center justify-content-between px-2 py-2">
                                <div class="d-flex align-items-center gap-2">
                                    <input type="radio"
                                           id="brand_{{ $brand->id }}"
                                           name="brand"
                                           value="{{ $brand->id }}"
                                           class="brand-radio"
                                           data-brand-id="{{ $brand->id }}"
                                           {{ request('brand') == $brand->id ? 'checked' : '' }}
                                           style="width: 18px; height: 18px;">
                                    <label for="brand_{{ $brand->id }}" class="fs-6 mb-0">
                                        {{ $brand->trans('title') }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Model Filter -->
        <div class="accordion-item border-0 border-bottom">
            <div class="accordion-header lh-base">
                <button class="collapsed accordion-button px-0 fw-medium"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseModel"
                        aria-expanded="false"
                        aria-controls="collapseModel">
                    <h5 class="pb-2 fw-semibold mb-0">{{ __('front.model') }}</h5>
                </button>
            </div>
            <div id="collapseModel"
                 class="accordion-collapse collapse"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body px-0">
                    <div class="py-2" id="modelsContainer">
                        @foreach($models as $model)
                            <div class="d-flex align-items-center justify-content-between px-2 py-2 model-item"
                                 data-brand-id="{{ $model->brand_id }}"
                                 style="display: none !important;">
                                <div class="d-flex align-items-center gap-2">
                                    <input type="checkbox"
                                           id="model_{{ $model->id }}"
                                           name="model[]"
                                           value="{{ $model->id }}"
                                           {{ in_array($model->id, (array)request('model', [])) ? 'checked' : '' }}
                                           style="width: 18px; height: 18px;">
                                    <label for="model_{{ $model->id }}" class="fs-6 mb-0">
                                        {{ $model->trans('title') }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

