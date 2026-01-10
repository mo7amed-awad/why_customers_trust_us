@extends('Client.layouts.layout')

@section('content')

    <div class="d-none" id="navBar">
    </div>
    <div class="container vh-100 overflow-hidden ">
        <div
                class="row flex-md-row flex-column-reverse h-100 justify-content-lg-between justify-content-center overflow py-4">
            <div
                    class="col-lg-5  rounded-3 p-5 col-12 d-lg-flex flex-column d-none position-relative  overflow-hidden img-login justify-content-center" data-aos="fade-up" data-aos-duration="1500">

                <img src="{{asset(setting('logo'))}}" style="max-width: 120px;" class="img-fluid">
                <h5 class="text-white fs-32  lh-base fw-semibold">{{ __('front.create_account_title') }}</h5>
                <p class="text-white fs-20 fw-medium  lh-base">
                    {{ __('front.create_account_description') }}
                </p>
            </div>
            <div class="col-lg-6 col-md-8 col-12 h-100 form-scroll" style="overflow: auto;">

                <div class="w-100 d-flex justify-content-center align-items-start h-100">
                    <form method="POST" action="{{ route('client.create.password') }}" class="w-100 d-flex flex-column justify-content-center  my-auto p-lg-5 p-3 rounded-4 text-black bg-white">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="code" id="finalCode">
                        <input type="hidden" id="sentOtp" value="{{ $otp }}">

                        <div class="col-md-12">
                            <div class="mb-3 d-flex gap-2" dir="ltr">
                                @for($i=1; $i<=6; $i++)
                                    <input type="text" data-id="{{ $i }}" maxlength="1" class="verify form-control rounded-2 py-3 px-1 text-center fs-4" style="direction: ltr;">
                                @endfor
                            </div>

                            <div class="otp fs-6 fw-semibold text-center d-none">
                                <span>00</span>
                                <span>:</span>
                                <span class="counter">60</span>
                            </div>

                            <div class="d-flex justify-content-center my-md-3">
                                <a type="button" class="text-secondary fw-medium text-decoration-underline resend" style="cursor: pointer;">
                <span>
                    <svg width="17" height="19" viewBox="0 0 17 19" fill="none">
                        <path d="M7.9751 18.95C5.95843 18.7 4.2876 17.8208 2.9626 16.3125C1.6376 14.8042 0.975098 13.0333 0.975098 11C0.975098 9.9 1.19176 8.84583 1.6251 7.8375C2.05843 6.82917 2.6751 5.95 3.4751 5.2L4.9001 6.625C4.26676 7.19167 3.7876 7.85 3.4626 8.6C3.1376 9.35 2.9751 10.15 2.9751 11C2.9751 12.4667 3.44176 13.7625 4.3751 14.8875C5.30843 16.0125 6.50843 16.7 7.9751 16.95V18.95ZM9.9751 18.95V16.95C11.4251 16.6833 12.6209 15.9917 13.5626 14.875C14.5043 13.7583 14.9751 12.4667 14.9751 11C14.9751 9.33333 14.3918 7.91667 13.2251 6.75C12.0584 5.58333 10.6418 5 8.9751 5H8.9001L10.0001 6.1L8.6001 7.5L5.1001 4L8.6001 0.5L10.0001 1.9L8.9001 3H8.9751C11.2084 3 13.1001 3.775 14.6501 5.325C16.2001 6.875 16.9751 8.76667 16.9751 11C16.9751 13.0167 16.3126 14.7792 14.9876 16.2875C13.6626 17.7958 11.9918 18.6833 9.9751 18.95Z"
                              fill="#8B8C8E" />
                    </svg>
                </span>
                                    <span class="text-decoration-underline">{{ __('front.resend') }}</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" id="ConfirmCreation" class="bg-primary-color rounded-2 btn text-white px-5 py-2 my-3 w-100 disabled" disabled>
                                {{ __('front.confirm') }}
                            </button>
                        </div>

                        <div class="col-md-12">
                            <div class="text-secondary text-center">
                                <span><a class="primary-color text-decoration-underline" href="{{ route('client.register') }}">{{ __('front.create_account') }}</a></span>
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
            let countdownRunning = false;
            const resendBtn = document.querySelector('.resend');

            function toggleResendButton(enable) {
                if (enable) {
                    resendBtn.style.pointerEvents = 'auto';
                    resendBtn.style.opacity = '1';
                } else {
                    resendBtn.style.pointerEvents = 'none';
                    resendBtn.style.opacity = '0.5';
                }
            }

            function startCountdown() {
                if (countdownRunning) return;
                countdownRunning = true;

                const otpDiv = document.querySelector('.otp');
                const counterSpan = document.querySelector('.counter');
                let seconds = 60;

                otpDiv.classList.remove('d-none');
                toggleResendButton(false);

                const interval = setInterval(() => {
                    seconds--;
                    counterSpan.textContent = seconds.toString().padStart(2, '0');

                    if (seconds <= 0) {
                        clearInterval(interval);
                        otpDiv.classList.add('d-none');
                        toggleResendButton(true);
                        countdownRunning = false;
                    }
                }, 1000);
            }

            function setupOTPInputs() {
                const inputs = document.querySelectorAll('.verify');
                const confirmBtn = document.getElementById('ConfirmCreation');
                const finalCodeInput = document.getElementById('finalCode');

                inputs.forEach((input, index) => {
                    input.addEventListener('input', function(e) {
                        const value = this.value;

                        if (!/^\d*$/.test(value)) {
                            this.value = '';
                            return;
                        }

                        if (value.length === 1 && index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }

                        updateFinalCode();
                    });

                    input.addEventListener('keydown', function(e) {
                        if (e.key === 'Backspace' && !this.value && index > 0) {
                            inputs[index - 1].focus();
                        }
                    });

                    input.addEventListener('paste', function(e) {
                        e.preventDefault();
                        const pastedData = e.clipboardData.getData('text').replace(/\D/g, '');

                        if (pastedData) {
                            const digits = pastedData.split('').slice(0, 6);
                            digits.forEach((digit, i) => {
                                if (inputs[i]) {
                                    inputs[i].value = digit;
                                }
                            });

                            const lastFilledIndex = Math.min(digits.length - 1, inputs.length - 1);
                            inputs[lastFilledIndex].focus();

                            updateFinalCode();
                        }
                    });
                });

                function updateFinalCode() {
                    let code = '';
                    inputs.forEach(input => {
                        code += input.value;
                    });

                    finalCodeInput.value = code;

                    const sentOtp = document.getElementById('sentOtp').value;

                    if (code.length === 6) {
                        if (code === sentOtp) {
                            confirmBtn.classList.remove('disabled');
                            confirmBtn.disabled = false;

                            document.querySelectorAll('.verify').forEach(input => {
                                input.classList.remove('border-danger');
                            });
                        } else {
                            confirmBtn.classList.add('disabled');
                            confirmBtn.disabled = true;

                            document.querySelectorAll('.verify').forEach(input => {
                                input.classList.add('border-danger');
                            });
                        }
                    } else {
                        confirmBtn.classList.add('disabled');
                        confirmBtn.disabled = true;
                    }
                }
            }

            startCountdown();
            setupOTPInputs();

            resendBtn.addEventListener('click', function(e) {
                e.preventDefault();

                if (countdownRunning) {
                    alert('يرجى الانتظار حتى انتهاء العد التنازلي');
                    return;
                }

                const email = document.querySelector('input[name="email"]').value;

                console.log('Email:', email);
                console.log('Route:', "{{ route('client.password.otp') }}");

                fetch("{{ route('client.password.otp') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email: email })
                })
                    .then(res => {
                        console.log('Response status:', res.status);
                        console.log('Response headers:', res.headers);

                        if (!res.ok) {
                            return res.json().then(errorData => {
                                throw new Error(errorData.message || 'خطأ في السيرفر');
                            });
                        }

                        return res.json();
                    })
                    .then(data => {
                        console.log('Response data:', data);

                        if (data.success && data.otp) {
                            // تحديث الـ OTP المخزن
                            document.getElementById('sentOtp').value = data.otp;

                            // مسح المدخلات
                            document.getElementById('finalCode').value = '';
                            document.querySelectorAll('.verify').forEach(input => {
                                input.value = '';
                                input.classList.remove('border-danger');
                            });
                            document.querySelector('[data-id="1"]').focus();

                            // تعطيل الزر
                            const confirmBtn = document.getElementById('ConfirmCreation');
                            confirmBtn.classList.add('disabled');
                            confirmBtn.disabled = true;

                            alert('تم إرسال رمز التحقق الجديد بنجاح!');
                            startCountdown();
                        } else {
                            alert('حدث خطأ: ' + (data.message || 'يرجى المحاولة مرة أخرى'));
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        alert('حدث خطأ في الاتصال' );
                    });
            });

        </script>
    @endpush

@endsection