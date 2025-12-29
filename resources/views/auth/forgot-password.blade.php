@extends('Client.layouts.layout')

@section('content')

<div class="d-none" id="navBar">
</div>
<div class="container vh-100 overflow-hidden ">
    <div class="row flex-md-row flex-column-reverse h-100 justify-content-lg-between justify-content-center overflow py-4">
        <div
                class="col-lg-5  rounded-3 p-5 col-12 d-lg-flex flex-column d-none position-relative  overflow-hidden img-login justify-content-center" data-aos="fade-up" data-aos-duration="1500">

            <img src="{{asset(setting('logo'))}}" style="max-width: 120px;" class="img-fluid">
            <h5 class="text-white fs-32  lh-base fw-semibold"> {{ __('front.forget_password_title') }}</h5>
            <p class="text-white fs-20 fw-medium  lh-base">
                {{ __('front.forget_password_description') }}
            </p>
        </div>
        <div class="col-lg-6 col-md-8 col-12 h-100 form-scroll" style="overflow: auto;">

            <div class="w-100 d-flex justify-content-center align-items-start h-100" >
                <form action="{{ route('client.password.phone') }}" method="POST" class="w-100 d-flex flex-column justify-content-center  my-auto p-lg-5 p-3 rounded-4  p-lg-5 p-3 rounded-2 text-black bg-white" >
                    @csrf
                    <div class="col-md-12">
                        <label for="phone" class="form-label">{{ __('front.phone') }}</label>
                        <div class="input-group mb-3">
                            <input type="tel" name="phone" id="phone"
                                   class="form-control rounded-2 border py-2 w-100 phone">
                        </div>
                        @error('phone')
                        <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="country_code" id="country_code" value="{{ old('country_code', '973') }}">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="bg-primary-color btn text-white px-5 py-2 my-md-5 my-3 w-100 rounded-2">
                            {{ __('front.change_password') }}
                        </button>
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