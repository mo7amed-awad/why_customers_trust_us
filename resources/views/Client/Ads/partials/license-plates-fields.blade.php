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
            <label class="form-label fw-bold primary-color">{{ __('front.usage_type') }}</label>
        </div>
        <div class="col-lg-9">
            <div class="d-flex flex-wrap gap-2">

                <div class="form-check px-0">
                    <input type="radio"
                           class="form-check-input"
                           name="usage_type"
                           id="usage_private"
                           value="private"
                           required
                            @checked(old('usage_type', 'private') == 'private')>
                    <label class="form-check-label" for="usage_private">{{ __('front.private') }}</label>
                </div>

                <div class="form-check">
                    <input type="radio"
                           class="form-check-input"
                           name="usage_type"
                           id="usage_commercial"
                           value="commercial"
                            @checked(old('usage_type') == 'commercial')>
                    <label class="form-check-label" for="usage_commercial">{{ __('front.commercial') }}</label>
                </div>

                <div class="form-check">
                    <input type="radio"
                           class="form-check-input"
                           name="usage_type"
                           id="usage_government"
                           value="government"
                            @checked(old('usage_type') == 'government')>
                    <label class="form-check-label" for="usage_government">{{ __('front.government') }}</label>
                </div>

                <div class="form-check">
                    <input type="radio"
                           class="form-check-input"
                           name="usage_type"
                           id="usage_diplomatic"
                           value="diplomatic"
                            @checked(old('usage_type') == 'diplomatic')>
                    <label class="form-check-label" for="usage_diplomatic">{{ __('front.diplomatic') }}</label>
                </div>

                <div class="form-check">
                    <input type="radio"
                           class="form-check-input"
                           name="usage_type"
                           id="usage_antique"
                           value="antique"
                            @checked(old('usage_type') == 'antique')>
                    <label class="form-check-label" for="usage_antique">{{ __('front.antique') }}</label>
                </div>

            </div>
            @error('usage_type')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
