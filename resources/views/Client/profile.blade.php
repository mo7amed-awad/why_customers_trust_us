@extends('Client.layouts.layout')
@section('content')


<div class="" id="navBar">

</div>

<div class="container py-lg-5 py-3 pt-50">
    <div class="row justify-content-between gap-lg-0 gap-3">

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
                                <button class="nav-link active my-1" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true">
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
                                <button class="nav-link my-1" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false">
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
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
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
                                <span class="d-flex align-items-center">حذف الحساب</span> </a>

                        </div>
                    </form>
                </div>

                {{--Change Password--}}
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                     tabindex="0">
                    <div class="row py-2">
                        <div class="col-12 justify-content-center">
                            <h2 class="fw-semibold ">
                                My Account
                            </h2>
                        </div>
                    </div>
                    <form class="row form-img form-bg p-lg-3 rounded-3" style="background-image: url('{{asset('assets/imgs/home/bg-form.png')}}'); background-color: #E9ECFD;">
                        <div class=" col-12  p-2 d-flex justify-content-end ">
                            <a class=" btn  rounded-2 px-5 gap-2 d-flex align-items-center py-2 editProfile"><span><i
                                            class="fa-solid fa-pen-to-square"></i></span><span class="text-decoration-underline">Edit</span>
                            </a>
                        </div>
                        <div class=" col-md-12">
                            <label for="exampleInputPassword1" class="form-label">
                                <span> كلمة المرور</span>

                            </label>
                            <div class="password-container ">
                                <input type="password" class="form-control border rounded-2 py-2 " id="exampleInputPassword1"
                                       placeholder="llllllllllllll" readonly>
                                <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i
                                            class="fa-regular fa-eye"></i></button>

                            </div>
                        </div>

                        <div class=" col-md-12">
                            <label for="exampleInputPassword2" class="form-label">
                                <span>تاكيد كلمة المرور</span>

                            </label>
                            <div class="password-container ">
                                <input type="password" class="form-control border rounded-2 py-2 " id="exampleInputPassword2"
                                       placeholder="llllllllllllll" readonly>
                                <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i
                                            class="fa-regular fa-eye"></i></button>

                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <a class=" btn  rounded-2 px-5 gap-2 d-flex align-items-center py-2 editProfile change d-none">save
                                change</span>
                            </a>
                        </div>
                        <div class="col-12 d-flex justify-content-center py-2">
                            <a class="text-danger text-decoration-underline fw-semibold" data-bs-toggle="modal"
                               data-bs-target="#delete-account">
                                <span class="d-flex align-items-center">حذف الحساب</span> </a>

                        </div>
                    </form>

                </div>

                {{--Favorites Items--}}
                <div class="tab-pane fade " id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab"
                     tabindex="0">
                    <div class="row py-2">
                        <div class="col-12 justify-content-center">
                            <h2 class="fw-semibold ">
                                My Account
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
@endpush
@endsection