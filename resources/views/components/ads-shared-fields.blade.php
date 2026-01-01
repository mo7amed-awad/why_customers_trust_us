<div class="col-lg-11 border-bottom py-lg-4 py-2">
    <div class="row gap-lg-0 gap-3">
        <div class="col-lg-3"> <label for="name" class="form-label fw-bold primary-color">{{ __('front.section') }}</label>
            <p class="text-black-50">
                {{ $category->trans('title') }} - {{ $subcategory->trans('title') }}
            </p>

        </div>
        <div class="col-lg-9">
            <div class="row gy-3">
                <div class="col-12">
                    <h3 for="name" class="form-label fs-18 fw-bold primary-color">{{ __('front.upload_images') }}</h3>
                </div>
                <div class="col-2">
                    <input type="file" id="imageUpload" name="images[]" multiple accept="image/*" style="display: none;">
                    <a class="cam fs-2 add-img d-flex align-items-center justify-content-center rounded-3"
                       href="javascript:void(0)">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </a>
                </div>
                <div class="col-lg-10 ">
                    <div class="row gallery gy-3">
                        <div class="col-md-2  col-4">
                            <div class="img-picture border rounded-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label class="form-label fw-bold primary-color" style="text-wrap: nowrap;">
                {{ __('front.ad_name') }}
            </label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control bg-transparent border rounded-3 text-dark" name="title" value="{{ old('title') }}" maxlength="70" required >
            <small class="text-secondary">{{ __('front.full_name_placeholder') }}</small>
            @error('title')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="col-md-10 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label for="Notes" class="form-label fw-bold primary-color" style="text-wrap: nowrap;">
                {{ __('front.description') }}
            </label>
        </div>
        <div class="col-lg-9">
            <div class="input-group">
                <textarea style="resize: none;"
                          class="form-control bg-transparent rounded-3 p-3 text-dark"
                          id="Notes" rows="5"
                          name="description"
                          maxlength="255"
                          required
                          placeholder="{{ __('front.description_placeholder') }}">{{ old('description') }}</textarea>
                @error('description')
                <small class="text-danger d-block mt-1">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label class="form-label fw-bold primary-color" style="text-wrap: nowrap;">
                {{ __('front.address') }}
            </label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control bg-transparent border rounded-3 text-dark" name="address" value="{{ old('address') }}" maxlength="70" required >
            <small class="text-secondary">{{ __('front.address_placeholder') }}</small>
            @error('address')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label class="form-label fw-bold primary-color">{{ __('front.price') }}</label>
        </div>
        <div class="col-lg-9 d-flex align-items-center gap-3">

            <!-- Price input -->
            <div class="input-group bg-transparent border rounded-3 flex-grow-1">
                <div class="input-group-prepend border-0">
                    <span class="input-group-text border-0 bg-transparent gap-2 text-secondary">
                        {{ __('front.currency') }}
                    </span>
                </div>

                <input type="number"
                       class="form-control bg-transparent border-0"
                       name="price"
                       value="{{ old('price') }}"
                       required
                       placeholder="{{ __('front.price_placeholder') }}"
                       aria-label="price" aria-describedby="basic-addon1">
            </div>

            <!-- Negotiable checkbox -->
            <div class="form-check mb-0">
                <input class="form-check-input"
                       type="checkbox"
                       id="negotiable"
                       name="negotiable"
                       value="1"
                        @checked(old('negotiable') == 1)>
                <label class="form-check-label text-secondary" for="negotiable">
                    {{ __('front.negotiable') }}
                </label>
            </div>
        </div>

        <!-- Error message under the price field -->
        @error('price')
        <div class="col-lg-9 offset-lg-2">
            <small class="text-danger d-block mt-1">{{ $message }}</small>
        </div>
        @enderror

    </div>
</div>

<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label for="owner_name" class="form-label fw-bold primary-color" style="text-wrap: nowrap;">
                {{ __('front.name') }}
            </label>
        </div>
        <div class="col-lg-9">
            <div class="input-group bg-transparent border rounded-3 flex-grow-1">
                <input type="text" id="owner_name" name="owner_name" class="form-control bg-transparent border-0" placeholder="{{ __('front.name_placeholder') }}" value="{{ old('owner_name') }}" maxlength="70" required >
                @error('owner_name')
                <small class="text-danger d-block mt-1">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label for="phone" class="form-label fw-bold primary-color" style="text-wrap: nowrap;">
                {{ __('front.phone') }}
            </label>
        </div>

        <div class="col-lg-9">
            <div class="input-group">
                <input type="tel"
                       placeholder="{{ __('front.phone_placeholder') }}"
                       name="owner_phone"
                       id="phone"
                       required
                       class="form-control phone rounded-3 py-2 border bg-transparent"
                       value="{{ old('owner_phone') }}">

                <input type="hidden"
                       name="country_code"
                       id="country_code"
                       value="{{ old('country_code', '973') }}">
            </div>

            @error('owner_phone')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="col-md-11 border-bottom py-lg-4 py-2">
    <div class="row justify-content-between gap-lg-0 gap-3">
        <div class="col-lg-2">
            <label class="form-label fw-bold primary-color">{{ __('front.condition') }}</label>
        </div>

        <div class="col-lg-9">
            <div class="d-flex flex-wrap gap-2">

                <div class="form-check px-0">
                    <input type="radio"
                           class="form-check-input"
                           name="is_new"
                           id="condition_new"
                           value="1"
                           required
                            @checked(old('is_new', '1') == '1')>
                    <label class="form-check-label" for="condition_new">{{ __('front.new') }}</label>
                </div>

                <div class="form-check">
                    <input type="radio"
                           class="form-check-input"
                           name="is_new"
                           id="condition_used"
                           value="0"
                            @checked(old('is_new') == '0')>
                    <label class="form-check-label" for="condition_used">{{ __('front.used') }}</label>
                </div>

            </div>

            @error('is_new')
            <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>


