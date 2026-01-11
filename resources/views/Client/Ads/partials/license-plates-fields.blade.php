{{-- Digit Count --}}
<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label for="digit_count" class="form-label fw-bold primary-color" style="text-wrap: nowrap;">
                {{ __('front.digit_count') }}
            </label>
        </div>
        <div class="col-lg-9">
            <div class="input-group bg-transparent border rounded-3 flex-grow-1">
                <select name="digit_count" id="digit_count" class="form-select bg-transparent border-0" required>
                    <option value="">-- {{ __('front.select_digit_count') }} --</option>
                    <option value="3" @selected(old('digit_count') == '3')>{{ __('front.three_digits') }}</option>
                    <option value="4" @selected(old('digit_count') == '4')>{{ __('front.four_digits') }}</option>
                    <option value="5" @selected(old('digit_count') == '5')>{{ __('front.five_digits') }}</option>
                    <option value="6" @selected(old('digit_count') == '6')>{{ __('front.six_digits') }}</option>
                </select>
            </div>
            @error('digit_count')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

    </div>
</div>

{{-- Usage Type --}}
<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label for="usage_type" class="form-label fw-bold primary-color">
                {{ __('front.usage_type') }}
            </label>
        </div>

        <div class="col-lg-9">
            <div class="input-group bg-transparent border rounded-3 flex-grow-1">
                <select name="usage_type"
                        id="usage_type"
                        class="form-select bg-transparent border-0"
                        required>

                    <option value="">
                        -- {{ __('front.select_usage_type') }} --
                    </option>

                    @php
                        $usageTypes = [
                            'public_shared',
                            'public_transport',
                            'taxi',
                            'motorcycle',
                            'tourist_bus',
                            'contracting',
                            'private_plate',
                            'private_passengers',
                            'shared_private',
                            'commercial_transport',
                            'semi_trailer',
                            'antique',
                            'rental',
                            'on_demand_taxi',
                            'public_passengers',
                        ];
                    @endphp

                    @foreach ($usageTypes as $type)
                        <option value="{{ $type }}" @selected(old('usage_type') == $type)>
                            {{ __('front.'.$type) }}
                        </option>
                    @endforeach

                </select>
            </div>

            @error('usage_type')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
