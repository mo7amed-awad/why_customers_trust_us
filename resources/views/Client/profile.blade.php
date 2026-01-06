@extends('Client.layouts.layout')
@push('css')
    <style>
        #confirm_password.is-invalid {
            border-color: #dc3545;
            background-image: none;
        }

        #deleteAccountError {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-body .alert {
            margin-bottom: 1rem;
        }
    </style>
@endpush
@section('content')


<div class="" id="navBar">

</div>

<div class="container py-lg-5 py-3 pt-50">
    <div class="row justify-content-between gap-lg-0 gap-3">


        @php
            $passwordError = $errors->hasAny(['current_password', 'new_password', 'new_password_confirmation']);
        @endphp

        <div class="col-lg-4 ">
            <nav class="navbar navbar-expand-lg second-navbar py-0">
                <div class=" nav-container w-100 px-lg-3">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
                            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars text-black"></i>
                    </button>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar2"
                         aria-labelledby="offcanvasNavbarLabel2">
                        <div class="offcanvas-header">

                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body header">
                            <ul class="nav flex-column flex-grow-1 rounded-2 nav-pills profile profile bg-light  px-4 py-5"
                                id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <div class="d-flex justify-content-center">
                                    <img src="{{asset(setting('logo'))}}" alt="Logo" />

                                </div>
                                <button class="nav-link {{ !$passwordError ? 'active' : '' }} my-1" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                        aria-selected="{{ !$passwordError ? 'true' : 'false' }}">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class=" img  img-card overflow-hidden d-flex justify-content-center align-items-center"
                                             style="width:20px;height:30px ">
                                            <i class="fa-regular fa-user fs-5"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            {{ __('front.my_profile') }}
                                        </div>
                                    </div>
                                </button>
                                <button class="nav-link {{ $passwordError ? 'active' : '' }} my-1" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="{{ $passwordError ? 'true' : 'false' }}">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="img  img-card overflow-hidden d-flex justify-content-center align-items-center"
                                             style="width:20px;height:30px ">
                                            <i class="fa-solid fa-lock fs-5"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            {{ __('front.change_password') }}
                                        </div>
                                    </div>
                                </button>
                                <button class="nav-link my-1" id="v-pills-orders-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders"
                                        aria-selected="false">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="img  img-card overflow-hidden d-flex justify-content-center align-items-center"
                                             style="width:20px;height:30px ">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M9.0072 17C9.0072 18.1046 8.11177 19 7.0072 19C5.90263 19 5.0072 18.1046 5.0072 17C5.0072 15.8954 5.90263 15 7.0072 15C8.11177 15 9.0072 15.8954 9.0072 17Z"
                                                        stroke="#2240E7" stroke-width="1.5" />
                                                <path
                                                        d="M19.0072 17C19.0072 18.1046 18.1118 19 17.0072 19C15.9026 19 15.0072 18.1046 15.0072 17C15.0072 15.8954 15.9026 15 17.0072 15C18.1118 15 19.0072 15.8954 19.0072 17Z"
                                                        stroke="#2240E7" stroke-width="1.5" />
                                                <path
                                                        d="M2.0072 10H18.0072M2.0072 10C2.0072 10.78 1.98721 13.04 2.0112 15.26C2.04717 15.98 2.16708 16.58 5.00891 17M2.0072 10C2.22304 8.26 3.16232 6.2 3.64195 5.42M9.0072 10V5M14.9973 17H9.00187M2.02319 5H12.2394C12.2394 5 12.779 5 13.2586 5.048C14.158 5.132 14.9134 5.54 15.6688 6.56C16.4687 7.64 17.0837 9.008 17.8991 9.74C19.2541 10.9564 21.8321 10.58 21.976 13.16C22.012 14.48 22.012 15.92 21.952 16.16C21.8557 16.8667 21.3108 16.9821 20.633 17C20.0448 17.0156 19.3357 16.9721 18.9903 17"
                                                        stroke="#2240E7" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column">
                                            {{ __('front.favorite_items') }}
                                        </div>
                                    </div>
                                </button>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-lg-8">

            <div class="tab-content " id="v-pills-tabContent">

                 {{--Profile--}}
                <div class="tab-pane fade {{ !$passwordError ? 'show active' : '' }}" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                     tabindex="0">
                    <div class="row py-2">
                        <div class="col-12 justify-content-center">
                            <h2 class="fw-semibold">
                                {{ __('front.my_account') }}
                            </h2>
                        </div>
                    </div>
                    <form id="profileForm" class="row rounded-2 form-img form-bg p-lg-3 rounded-3"
                          style="background-image: url('{{asset('assets/imgs/home/bg-form.png')}}'); background-color: #E9ECFD;">

                        <div class="col-12 p-2 d-flex justify-content-end">
                            <a href="#" class="btn rounded-2 px-5 gap-2 d-flex align-items-center py-2 editProfile">
                                <span><i class="fa-solid fa-pen-to-square"></i></span>
                                <span class="text-decoration-underline"> {{ __('front.edit') }}</span>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label fw-medium">{{ __('front.name') }}</label>
                            <input type="text" class="form-control border rounded-2 py-2" id="name" name="name" value="{{$user->name}}" readonly>
                        </div>

                        <div class=" col-md-6">
                            <label for="tel" class="form-label fw-medium ">{{ __('front.phone') }}</label>
                            <div class="input-group mb-3">
                                <input type="tel" name="phone" class="phone form-control border rounded-2 py-2  rounded-0 phone" readonly
                                       placeholder="{{$user->phone}}">
                                <input type="hidden" name="country_code" id="country_code" value="{{ old('country_code', '973') }}">

                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label fw-medium">{{ __('front.email') }}</label>
                            <input type="email" class="form-control border rounded-2 py-2" id="email" name="email" value="{{$user->email}}" readonly>
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn rounded-2 px-5 gap-2 d-flex align-items-center saveProfile d-none">
                                {{ __('front.save_changes') }}
                            </button>
                        </div>
                        <div class="col-12 d-flex justify-content-center py-2">
                            <a class="text-danger text-decoration-underline fw-semibold" data-bs-toggle="modal"
                               data-bs-target="#delete-account">
                                <span class="d-flex align-items-center">{{ __('front.delete_account') }}</span> </a>
                        </div>
                    </form>
                </div>

                {{--Change Password--}}
                <div class="tab-pane fade {{ $passwordError ? 'show active' : '' }}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                     tabindex="0">
                    <div class="row py-2">
                        <div class="col-12 justify-content-center">
                            <h2 class="fw-semibold">
                                {{ __('front.change_password') }}
                            </h2>
                        </div>
                    </div>
                    <form class="row form-img form-bg p-lg-3 rounded-3"
                          style="background-image: url('{{asset('assets/imgs/home/bg-form.png')}}'); background-color: #E9ECFD;"
                          method="POST"
                          action="{{ route('client.change_password') }}">
                        @csrf
                        <!-- Current Password -->
                        <div class="col-md-12 mb-3">
                            <label for="current_password" class="form-label">
                                <span>{{ __('front.current_password') }}</span>
                            </label>
                            <div class="password-container">
                                <input type="password" name="current_password" class="form-control border rounded-2 py-2"
                                       id="current_password"
                                       placeholder="{{ __('front.password_placeholder') }}" required>
                                <button type="button" class="toggle-password TogglePasswordBtns">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="col-md-12 mb-3">
                            <label for="new_password" class="form-label">
                                <span>{{ __('front.new_password') }}</span>
                            </label>
                            <div class="password-container">
                                <input type="password" name="new_password" class="form-control border rounded-2 py-2"
                                       id="new_password"
                                       placeholder="{{ __('front.new_password_ph') }}" required>
                                <button type="button" class="toggle-password TogglePasswordBtns">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="col-md-12 mb-3">
                            <label for="new_password_confirmation" class="form-label">
                                <span>{{ __('front.password_confirm') }}</span>
                            </label>
                            <div class="password-container">
                                <input type="password" name="new_password_confirmation" class="form-control border rounded-2 py-2"
                                       id="new_password_confirmation"
                                       placeholder="{{ __('front.password_confirm_ph') }}" required>
                                <button type="button" class="toggle-password TogglePasswordBtns">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            @error('new_password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn rounded-2 px-5 gap-2 d-flex align-items-center py-2">
                                {{ __('front.save_changes') }}
                            </button>
                        </div>

                    </form>

                </div>

                {{--Favorites Items--}}
                <div class="tab-pane fade " id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab"
                     tabindex="0">
                    <div class="row py-2">
                        <div class="col-12 justify-content-center">
                            <h2 class="fw-semibold">
                                {{ __('front.favorites_items') }}
                            </h2>

                        </div>
                    </div>
                    <div class="row py-2 gy-4  overflow-hidden">

                    {{--Card--}}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div id="footer">


</div>
{{-- Modal حذف الحساب --}}
<div class="modal fade" id="delete-account" tabindex="-1" aria-labelledby="deleteAccountLabel" aria-hidden="true"
     data-confirm-delete="{{ __('front.confirm_delete_account') }}"
     data-enter-password="{{ __('front.enter_password') }}"
     data-confirm-final="{{ __('front.confirm_delete_final') }}"
     data-deleting="{{ __('front.deleting') }}"
     data-delete-error="{{ __('front.delete_error') }}"
     data-connection-error="{{ __('front.connection_error') }}"
     >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold text-danger" id="deleteAccountLabel">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    {{ __('front.delete_account_confirm') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="deleteAccountError" class="alert alert-danger d-none" role="alert">
                    <i class="fa-solid fa-exclamation-circle me-2"></i>
                    <span id="deleteAccountErrorMessage"></span>
                </div>

                <div class="alert alert-warning" role="alert">
                    <i class="fa-solid fa-exclamation-circle me-2"></i>
                    <strong>{{ __('front.delete_warning') }}</strong>
                </div>
                <p class="mb-3">{{ __('front.will_delete') }}</p>
                <ul class="text-end">
                    <li>{{ __('front.personal_data') }}</li>
                    <li>{{ __('front.associated_info') }}</li>
                </ul>
                <form id="deleteAccountForm" action="{{ route('client.profile.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label fw-medium">
                            {{ __('front.enter_password_to_confirm') }}
                        </label>
                        <input type="password" class="form-control" id="confirm_password"
                               name="password" required placeholder="{{ __('front.password') }}">
                        <div class="invalid-feedback">
                            {{ __('front.password_required') }}
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="confirmDelete" required>
                        <label class="form-check-label" for="confirmDelete">
                            {{ __('front.confirm_delete_checkbox') }}
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                    <i class="fa-solid fa-times me-2"></i>{{ __('front.cancel') }}
                </button>
                <button type="button" class="btn btn-danger px-4" id="confirmDeleteBtn">
                    <i class="fa-solid fa-trash me-2"></i>{{ __('front.delete_account_permanently') }}
                </button>
            </div>
        </div>
    </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editBtn = document.querySelector('.editProfile');
        const saveBtn = document.querySelector('.saveProfile');
        const inputs = document.querySelectorAll('#profileForm input');

        editBtn.addEventListener('click', function(e) {
            e.preventDefault();
            inputs.forEach(input => input.removeAttribute('readonly'));
            editBtn.classList.add('d-none');
            saveBtn.classList.remove('d-none');
        });

        // إرسال البيانات للباك إند
        document.querySelector('#profileForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            // إضافة الـ CSRF token للـ FormData
            formData.append('_token', '{{ csrf_token() }}');

            fetch("{{ route('client.profile.update') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json' // مهم لـ Laravel
                },
                body: formData
            })
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return res.json();
                })
                .then(data => {
                    if(data.success){
                        alert('تم تحديث البيانات بنجاح!');
                        inputs.forEach(input => input.setAttribute('readonly', true));
                        saveBtn.classList.add('d-none');
                        editBtn.classList.remove('d-none');
                    } else {
                        alert('حدث خطأ ما!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('حدث خطأ ما!');
                });
        });
    });
</script>
@php
    $phoneCodeMap = [
        '973' => 'bh', '966' => 'sa', '971' => 'ae', '974' => 'qa',
        '965' => 'kw', '968' => 'om', '20' => 'eg', '213' => 'dz',
        '964' => 'iq', '962' => 'jo', '961' => 'lb', '218' => 'ly',
        '212' => 'ma', '222' => 'mr', '970' => 'ps', '249' => 'sd',
        '963' => 'sy', '216' => 'tn', '967' => 'ye', '252' => 'so',
        '253' => 'dj', '269' => 'km',
    ];

    $phoneCode = str_replace(['+', ' '], '', $user->phone_code ?? '973');
    $countryCode = $phoneCodeMap[$phoneCode] ?? 'bh';
@endphp

<script>
    window.userPhoneCode = "{{ $countryCode }}";
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForm = document.getElementById('deleteAccountForm');
        const confirmBtn = document.getElementById('confirmDeleteBtn');
        const confirmCheckbox = document.getElementById('confirmDelete');
        const passwordInput = document.getElementById('confirm_password');
        const errorDiv = document.getElementById('deleteAccountError');
        const errorMessage = document.getElementById('deleteAccountErrorMessage');
        const modal = document.getElementById('delete-account');

        // الترجمات من Laravel
        const translations = {
            confirmDeleteAccount: "{{ __('front.confirm_delete_account') }}",
            enterPassword: "{{ __('front.enter_password') }}",
            confirmDeleteFinal: "{{ __('front.confirm_delete_final') }}",
            deleting: "{{ __('front.deleting') }}",
            deleteError: "{{ __('front.delete_error') }}",
            connectionError: "{{ __('front.connection_error') }}"
        };

        if (modal) {
            modal.addEventListener('show.bs.modal', function() {
                errorDiv.classList.add('d-none');
                passwordInput.value = '';
                confirmCheckbox.checked = false;
                passwordInput.classList.remove('is-invalid');
            });
        }

        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                errorDiv.classList.add('d-none');
                this.classList.remove('is-invalid');
            });
        }

        if (confirmBtn) {
            confirmBtn.addEventListener('click', function(e) {
                e.preventDefault();

                errorDiv.classList.add('d-none');
                passwordInput.classList.remove('is-invalid');

                if (!confirmCheckbox.checked) {
                    errorMessage.textContent = translations.confirmDeleteAccount;
                    errorDiv.classList.remove('d-none');
                    return;
                }

                if (!passwordInput.value) {
                    passwordInput.classList.add('is-invalid');
                    errorMessage.textContent = translations.enterPassword;
                    errorDiv.classList.remove('d-none');
                    return;
                }

                if (!confirm(translations.confirmDeleteFinal)) {
                    return;
                }

                confirmBtn.disabled = true;
                const originalContent = confirmBtn.innerHTML;
                confirmBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>' + translations.deleting;

                const formData = new FormData(deleteForm);

                fetch(deleteForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    credentials: 'same-origin'
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw data;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect || '/';
                        } else {
                            errorMessage.textContent = data.message || translations.deleteError;
                            errorDiv.classList.remove('d-none');
                            passwordInput.classList.add('is-invalid');
                            passwordInput.focus();

                            confirmBtn.disabled = false;
                            confirmBtn.innerHTML = originalContent;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);

                        errorMessage.textContent = error.message || translations.connectionError;
                        errorDiv.classList.remove('d-none');
                        passwordInput.classList.add('is-invalid');
                        passwordInput.focus();

                        confirmBtn.disabled = false;
                        confirmBtn.innerHTML = originalContent;
                    });
            });
        }
    });
</script>@endpush
@endsection