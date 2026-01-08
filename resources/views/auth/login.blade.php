@extends('Client.layouts.layout')

@section('content')

<div class="d-none" id="navBar">
</div>
<div class="container vh-100 overflow-hidden ">
    <div
            class="row flex-md-row flex-column-reverse h-100 justify-content-lg-between justify-content-center overflow py-4">
        <div
                class="col-lg-5  rounded-3 p-5 col-12 d-lg-flex flex-column d-none position-relative  overflow-hidden img-login justify-content-center "
                data-aos="fade-up" data-aos-duration="1500">
            <img src="{{asset(setting('logo'))}}" style="max-width: 120px;" class="img-fluid">
            <h5 class="text-white fs-32  lh-base fw-semibold">{{ __('front.login_title') }}</h5>
            <p class="text-white fs-20 fw-medium  lh-base">
                {{ __('front.login_description') }}
            </p>
        </div>
        <div class="col-lg-6 col-md-8 col-12 h-100 form-scroll" style="overflow: auto;">
            <div class="w-100 d-flex justify-content-center align-items-start h-100">
                <form method="POST" action="{{ route('client.login.store') }}" class="w-100 d-flex flex-column justify-content-center my-auto p-lg-5 p-3 rounded-4 text-black bg-white">
                    @csrf

                    <div class="col-md-12">
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

                    <div class="col-12">
                        <label for="exampleInputPassword1" class="form-label">{{ __('front.password') }}</label>
                        <div class="password-container mb-1">
                            <input type="password" name="password" class="form-control border rounded-2 py-2" id="exampleInputPassword1">
                            <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i class="fa-regular fa-eye"></i></button>
                        </div>
                        @error('password')
                        <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end py-2">
                        <a
                                href="{{route('client.password.request')}}"
                                class="primary-color fs-18 text-decoration-underline" style="font-size: 14px;">
                            {{ __('front.forgot_password') }}
                        </a>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="bg-primary-color btn text-white px-5 py-2 my-3 w-100 rounded-2">
                            {{ __('front.login_button') }}
                        </button>
                    </div>

                    <div class="col-12">
                        <div class="text-secondary text-center">
                            <span>{{ __('front.dont_have_account') }} </span>
                            <span class="px-1">
                <a class="primary-color text-decoration-underline" href="{{ route('client.register') }}">
                    {{ __('front.create_account') }}
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

        document.querySelectorAll('.TogglePasswordBtns').forEach(function (TogglePasswordBtn) {
            TogglePasswordBtn.addEventListener('click', function (e) {
                e.preventDefault();
                var passwordInput = this.previousElementSibling;
                passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
                var eyeIcon = this.querySelector('i');
                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endpush
@endsection