@extends('Client.layouts.layout')

@section('content')

<div class="d-none" id="navBar">
</div>
<div class="container vh-100 overflow-hidden ">
    <div class="row flex-md-row flex-column-reverse h-100 justify-content-lg-between justify-content-center overflow py-4">
        <div
            class="col-lg-5  rounded-3 p-5 col-12 d-lg-flex flex-column d-none position-relative  overflow-hidden img-login justify-content-center" data-aos="fade-up" data-aos-duration="1500">

            <img src="assets/imgs/home/logo-login.png" style="max-width: 120px;" class="img-fluid">
            <h5 class="text-white fs-32  lh-base fw-semibold">Create your account</h5>
            <p class="text-white fs-20 fw-medium  lh-base">
                Register in just a few steps to access detailed car listings, compare features, and connect with trusted
                sellers effortlessly.
            </p>
        </div>
        <div class="col-lg-6 col-md-8 col-12 h-100 form-scroll" style="overflow: auto;">

            <div class="w-100 d-flex justify-content-center align-items-start h-100" >
                <form class="w-100 d-flex flex-column justify-content-center  my-auto p-lg-5 p-3 rounded-4  p-lg-5 p-3 text-black bg-white" >


                    <div class=" col-md-12">
                        <label for="exampleInputPassword1" class="form-label">
                            <span> كلمة المرور</span>

                        </label>
                        <div class="password-container">
                            <input type="password" class="form-control border rounded-2 py-2" id="exampleInputPassword1">
                            <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i
                                    class="fa-regular fa-eye"></i></button>

                        </div>
                        <div class="col-12 py-2">
                            <p class="fs-14 lh-sm mb-0 py-1 text-secondary">
                                يجب ألا يقل طول كلمة المرور عن اثني عشر حرفًا. لجعلها أقوى، استخدم أحرفًا كبيرة وصغيرة وأرقامًا ورموزًا مثل ! " ? $ % ^ & ).
                            </p>
                        </div>

                    </div>
                    <div class=" col-md-12">
                        <label for="exampleInputPassword1" class="form-label">
                            <span>تاكيد كلمة المرور</span>

                        </label>
                        <div class="password-container ">
                            <input type="password" class="form-control border rounded-2 py-2 " id="exampleInputPassword1">
                            <button class="toggle-password TogglePasswordBtns" tabindex="-1"><i
                                    class="fa-regular fa-eye"></i></button>

                        </div>

                    </div>

                    <div class="col-md-12">
                        <a  class="bg-primary-color btn text-white px-5 py-2  my-md-5 my-3  w-100 rounded-2" data-bs-toggle="modal" data-bs-target="#confirm">
                            تغيير كلمة المرور</a>
                    </div>

                </form>
            </div>


        </div>





    </div>

</div>



<div class="d-none" id="footer">
</div>
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content py-4">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center flex-column align-items-center ">
                <div class="w-50 d-flex justify-content-center py-2"><img style="width: 50px;" class="img-fluid"
                                                                          src="assets/imgs/home/sucess.gif" />
                </div>

                <div class=" w-75 d-flex flex-column align-items-center">
                    <h5 class="py-2 mb-0">تم تغيير كلمة المرور بنجاح!</h5>
                    <p class="fs-6 text-center py-2">يرجى تسجيل الدخول مجددًا لمتابعة حجوزاتك بسهولة</p>
                    <a href="login.html"
                       class="btn bg-primary-color  px-5 btn m-auto text-white rounded-2 gap-2 my-2 py-2 w-100"> تسجيل الدخول </a>
                </div>
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
@endpush
@endsection