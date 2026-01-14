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
                       min="100000"
                       max="200000"
                       value="{{ request('price_min', 100000) }}"
                       step="5000"
                       style="pointer-events: all; -webkit-appearance: none; appearance: none; background: transparent; height: 5px;">
                <input type="range"
                       name="price_max"
                       class="range-max-price position-absolute w-100"
                       min="100000"
                       max="200000"
                       value="{{ request('price_max', 200000) }}"
                       step="5000"
                       style="pointer-events: all; -webkit-appearance: none; appearance: none; background: transparent; height: 5px;">
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
            <div class="d-flex gap-1">
                <span class="text-muted small d-block mb-1">{{ __('front.price') }}</span>
                <span class="fs-6">
                        <span class="price-min-value">{{ number_format(request('price_min', 100000)) }}</span>
                        <span> : </span>
                        <span class="price-max-value">{{ number_format(request('price_max', 200000)) }}</span>
                    </span>
            </div>
        </div>
    </div>
</div>
