@extends('Client.layouts.layout')

@section('content')

<div class="d-none" id="navBar">
</div>
<div class="container vh-100 overflow-hidden">
    <div class="row flex-md-row flex-column-reverse h-100 justify-content-lg-between justify-content-center overflow py-4">
        <div
                class="col-lg-5 rounded-3 p-5 col-12 d-lg-flex flex-column d-none position-relative overflow-hidden img-login justify-content-center"
                data-aos="fade-up" data-aos-duration="1500">

            <img src="{{ asset(setting('logo')) }}"
                 style="max-width: 120px;"
                 class="img-fluid"
                 alt="{{ __('front.trusted_sellers_alt') }}">

            <h5 class="text-white fs-32 lh-base fw-semibold">
                {{ __('front.create_account_title') }}
            </h5>

            <p class="text-white fs-20 fw-medium lh-base">
                {{ __('front.create_account_description') }}
            </p>
        </div>

        <div class="col-lg-6 col-md-8 col-12 h-100 form-scroll" style="overflow: auto;">

            <div class="w-100 d-flex justify-content-center align-items-start h-100" >
                <form class="w-100 d-flex flex-column justify-content-center my-auto p-lg-5 p-3 rounded-4 text-black bg-white"
                      action="{{ route('client.otp') }}"
                      method="POST">
                    @csrf

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{ __('front.name') }}</label>
                            <div class="input-group mb-3">
                                <input type="text"
                                       name="name"
                                       class="form-control border rounded-2 w-100"
                                       placeholder="{{ __('front.enter_name') }}"
                                       maxlength="25"
                                       value="{{ old('name') }}">
                                <div class="invalid-feedback"></div>
                                @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">{{ __('front.email') }}</label>
                            <div class="input-group mb-3">
                                <input type="email"
                                       name="email"
                                       class="form-control border rounded-2 w-100"
                                       placeholder="{{ __('front.enter_email') }}"
                                       maxlength="30"
                                       value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Phone -->
                        <div class="col-lg-12">
                            <label for="phone" class="form-label fw-semibold">{{ __('front.phone') }}</label>
                            <div class="input-group w-100 mb-3">
                                <input type="tel"
                                       name="phone"
                                       id="phone"
                                       class="form-control phone rounded-2 py-2 border"
                                       placeholder="{{ __('front.enter_phone') }}"
                                       maxlength="10"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="invalid-feedback"></div>
                            </div>
                            <input type="hidden" name="country_code" id="country_code">
                        </div>

                        <!-- Password -->
                        <div class="col-md-12 mt-3">
                            <label for="password" class="form-label fw-semibold">{{ __('front.password') }}</label>
                            <div class="password-container input-group mb-3">
                                <input type="password"
                                       name="password"
                                       class="form-control border rounded-2 py-2"
                                       id="password"
                                       placeholder="{{ __('front.enter_password') }}">
                                @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button type="button" class="toggle-password TogglePasswordBtns" tabindex="-1">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <div class="invalid-feedback"></div>
                            </div>
{{--                            <p class="fs-14 lh-sm mb-0 py-1 text-secondary">--}}
{{--                                {{ __('front.password_requirements') }}--}}
{{--                            </p>--}}
                        </div>

                        <!-- Password Confirmation -->
                        <div class="col-md-12">
                            <label for="password_confirmation" class="form-label fw-semibold">{{ __('front.password_confirmation') }}</label>
                            <div class="password-container input-group mb-3">
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control border rounded-2 py-2"
                                       id="password_confirmation"
                                       placeholder="{{ __('front.enter_password_confirmation') }}">
                                @error('password_confirmation')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button type="button" class="toggle-password TogglePasswordBtns" tabindex="-1">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <!-- Agree Checkbox -->
                        <div class="col-12 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="agreeCheck" name="agree" >
                                <label class="form-check-label" for="agreeCheck">
                                    {{ __('front.agree_to') }}
                                    <span class="primary-color">{{ __('front.terms_and_conditions') }}</span>
                                </label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="bg-primary-color btn text-white px-5 py-2 my-3 w-100 rounded-2">
                            {{ __('front.register_now') }}
                        </button>
                    </div>

                    <div class="col-md-12">
                        <div class="text-secondary text-center">
                            <span>{{ __('front.already_have_account') }}</span>
                            <span class="px-1">
                <a class="primary-color text-decoration-underline" href="login.html">
                    {{ __('front.login') }}
                </a>
            </span>
                        </div>
                    </div>
                </form>
            </div>


        </div>


    </div>

</div>



<div class="d-none" id="footer">
</div>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const agreeCheck = document.getElementById('agreeCheck');
            const submitBtn = document.querySelector('button[type="submit"]');

            submitBtn.disabled = true;
            submitBtn.classList.add('disabled');

            agreeCheck.addEventListener('change', function () {
                if (this.checked) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('disabled');
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('disabled');
                }
            });
        });
    </script>

@endpush
@endsection

