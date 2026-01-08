@extends('Client.layouts.layout')

@section('content')

    <div class="d-none" id="navBar">
    </div>
    <div class="container vh-100 overflow-hidden ">
        <div class="row flex-md-row flex-column-reverse h-100 justify-content-lg-between justify-content-center overflow py-4">
            <div
                    class="col-lg-5  rounded-3 p-5 col-12 d-lg-flex flex-column d-none position-relative  overflow-hidden img-login justify-content-center" data-aos="fade-up" data-aos-duration="1500">

                <img src="{{asset(setting('logo'))}}" style="max-width: 120px;" class="img-fluid">
                <h5 class="text-white fs-32  lh-base fw-semibold">{{__('front.create_account_title')}}</h5>
                <p class="text-white fs-20 fw-medium  lh-base">
                    {{__('front.create_account_description')}}
                </p>
            </div>
            <div class="col-lg-6 col-md-8 col-12 h-100 form-scroll" style="overflow: auto;">

                <div class="w-100 d-flex justify-content-center align-items-start h-100" >
                    <form class="w-100 d-flex flex-column justify-content-center my-auto p-lg-5 p-3 rounded-4 text-black bg-white"
                          method="POST" action="{{ route('client.password.update') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id ?? '' }}">


                        <div class="col-md-12">
                            <label for="password" class="form-label">
                                <span>{{ __('front.password') }}</span>
                            </label>
                            <div class="password-container">
                                <input type="password" name="password" class="form-control border rounded-2 py-2" id="password" required>
                                <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i class="fa-regular fa-eye"></i></button>
                            </div>
                            <div class="col-12 py-2">
                                <p class="fs-14 lh-sm mb-0 py-1 text-secondary">
                                    {{ __('front.password_requirements') }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="password_confirmation" class="form-label">
                                <span>{{ __('front.password_confirm') }}</span>
                            </label>
                            <div class="password-container">
                                <input type="password" name="password_confirmation" class="form-control border rounded-2 py-2" id="password_confirmation" required>
                                <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i class="fa-regular fa-eye"></i></button>
                            </div>
                            @error('password_confirmation')
                            <p class="text-danger fs-14">{{ $message }}</p>
                            @enderror
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
            document.addEventListener('DOMContentLoaded', function() {
                // Toggle password visibility
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

                const form = document.querySelector('form');
                const password = document.getElementById('password');
                const passwordConfirm = document.getElementById('password_confirmation');
                const submitBtn = form.querySelector('button[type="submit"]');

                // إنشاء عنصر لعرض الخطأ تحت حقل تأكيد كلمة المرور
                let errorMsg = document.createElement('p');
                errorMsg.classList.add('text-danger', 'fs-14', 'mt-2', 'mb-0');
                errorMsg.style.display = 'none';
                passwordConfirm.closest('.password-container').parentNode.appendChild(errorMsg);

                function checkPasswords() {
                    // التحقق من أن الحقلين ممتلئين
                    if(password.value && passwordConfirm.value) {
                        if(password.value !== passwordConfirm.value) {
                            errorMsg.textContent = '{{ __("front.passwords_do_not_match") }}';
                            errorMsg.style.display = 'block';
                            passwordConfirm.setCustomValidity('{{ __("front.passwords_do_not_match") }}');
                            submitBtn.disabled = true;
                            submitBtn.style.opacity = '0.6';
                            submitBtn.style.cursor = 'not-allowed';
                            return false;
                        } else {
                            errorMsg.style.display = 'none';
                            passwordConfirm.setCustomValidity('');
                            submitBtn.disabled = false;
                            submitBtn.style.opacity = '1';
                            submitBtn.style.cursor = 'pointer';
                            return true;
                        }
                    } else {
                        // لو أحد الحقول فاضي
                        errorMsg.style.display = 'none';
                        passwordConfirm.setCustomValidity('');
                        submitBtn.disabled = true;
                        submitBtn.style.opacity = '0.6';
                        submitBtn.style.cursor = 'not-allowed';
                        return false;
                    }
                }

                // تحقق عند الكتابة في أي حقل
                password.addEventListener('input', checkPasswords);
                passwordConfirm.addEventListener('input', checkPasswords);

                // منع إرسال الفورم بشكل نهائي إذا كانت كلمات المرور غير متطابقة
                form.addEventListener('submit', function(e) {
                    // التحقق مرة أخرى عند الإرسال
                    if(!password.value || !passwordConfirm.value) {
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();
                        alert('{{ __("front.please_fill_all_fields") }}');
                        return false;
                    }

                    if(password.value !== passwordConfirm.value) {
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();
                        errorMsg.textContent = '{{ __("front.passwords_do_not_match") }}';
                        errorMsg.style.display = 'block';
                        passwordConfirm.focus();
                        return false;
                    }
                }, true); // استخدام capture phase

                // تعطيل الزر في البداية
                checkPasswords();
            });
        </script>
    @endpush
@endsection