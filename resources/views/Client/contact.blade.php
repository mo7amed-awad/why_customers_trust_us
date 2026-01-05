@extends('Client.layouts.layout')

@section('content')
<div class="" id="navBar">
</div>
<div class="container-fluid mb-lg-5 mb-md-4 mb-3">
    <div class="row   align-items-center ">
        <div
                class="col-12 d-flex  header-div services px-0 justify-content-center overflow-hidden align-items-cnter position-relative">
            <img class="w-100 w-100 object-fit-cover" src="assets/imgs/home/about-cover.jpg" />
            <div
                    class="layer position-absolute  top-0 bottom-0 end-0 start-0 px-lg-5 px-2 d-flex align-items-center justify-content-center text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h3 class="text-white fw-semibold py-2" data-aos="fade-up" data-aos-duration="1500">
                            Top Car Brands
                        </h3>
                        <p class="text-white" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">
                            Explore a variety of trusted car brands to find the one that fits your style and needs.
                        </p>

                    </div>

                </div>
            </div>


        </div>



    </div>

</div>
<div class="container py-lg-5 py-3">
    <div class="row py-2">
        <div class="col-12">
            <h5 class="fs-20 fw-semibold mb-3" data-aos="fade-down" data-aos-duration="1500">We're always ready to assist you! If you have any questions, feedback, or need support, just drop us a message. </h5>
            <p class="text-secondary">we'll get back to you promptly. Your questions matter to us, and we can't wait to hear from you! You can also reach us </p>
        </div>
    </div>
    <div class="row">
        <div class=" col-12 overflow-hidden" >
            <div class="rounded-4  "  style="border:0; height: 500px;">
                <iframe class="h-100 w-100 rounded-4 "
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3627.014155615924!2d46.73502440000001!3d24.623197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f044bb22c04a5%3A0x9c6229404ccc4bd!2z2LTYp9ix2Lkg2KfZhNmB2LHYstiv2YLYjCDYutio2YrYsdip2Iwg2KfZhNix2YrYp9i2IDEyNjY02Iwg2KfZhNiz2LnZiNiv2YrYqQ!5e0!3m2!1sar!2seg!4v1715511184439!5m2!1sar!2seg"
                        style="border:0; " allowfullscreen=""  loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<div class=" bg-img-section mb-5" style="background-image: url(assets/imgs/home/bg-contactus.jpg); background-position: center;">
    <div class="layer  py-lg-5 py-md-4 py-3">
        <div class="container    py-lg-5 py-3 overflow-hidden" id="contactus" >
            <div
                    class="row gap-md-0 gap-5  rounded-3 justify-content-center py-lg-5 py-3 pe-lg-5 align-items-center ">
                <div class="col-lg-5 col-md-6 col-12 overflow-hidden">
                    <div class="col-12 overflow-hidden" >
                        <h4 class="fw-bold fs-38 text-white">
                            Let’s Connect! Your Home Deserves the Best
                        </h4>
                        <p class="text-white">We’d love to hear from you! Whether it’s a question about our products or assistance with
                            your
                            order, we’re here for you.</p>
                        <ul class="p-0 fs-6 py-lg-4 py-2">
                            <li class=" py-2">
                                <a href="mailto:ScoobCar@gmail.com" target="_blank" class="d-flex gap-2 align-items-center">
                      <span class="bg-white d-flex justify-content-center align-items-center rounded-circle"
                            style="height: 40px; width: 40px;">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                                  d="M2.6001 5.59973L9.51312 9.52435C12.0388 10.9582 13.1614 10.9582 15.6871 9.52435L22.6001 5.59973"
                                  stroke="#891625" stroke-width="1.5" stroke-linejoin="round" />
                          <path
                                  d="M11.1001 20.0997C10.6338 20.0936 10.1669 20.0847 9.69893 20.0729C6.55043 19.9938 4.97618 19.9542 3.84506 18.8181C2.71393 17.682 2.68124 16.1484 2.61587 13.0811C2.59485 12.0948 2.59484 11.1144 2.61586 10.1282C2.68124 7.06086 2.71392 5.52721 3.84505 4.39112C4.97618 3.25503 6.55043 3.21546 9.69892 3.13631C11.6394 3.08753 13.5608 3.08754 15.5013 3.13632C18.6498 3.21547 20.224 3.25505 21.3551 4.39114C22.4863 5.52722 22.519 7.06087 22.5843 10.1282C22.594 10.5822 22.5992 10.7962 22.6 11.0997"
                                  stroke="#891625" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          <path
                                  d="M19.6001 17.5997C19.6001 18.4281 18.9285 19.0997 18.1001 19.0997C17.2717 19.0997 16.6001 18.4281 16.6001 17.5997C16.6001 16.7713 17.2717 16.0997 18.1001 16.0997C18.9285 16.0997 19.6001 16.7713 19.6001 17.5997ZM19.6001 17.5997V18.0997C19.6001 18.9281 20.2717 19.5997 21.1001 19.5997C21.9285 19.5997 22.6001 18.9281 22.6001 18.0997V17.5997C22.6001 15.1144 20.5854 13.0997 18.1001 13.0997C15.6148 13.0997 13.6001 15.1144 13.6001 17.5997C13.6001 20.085 15.6148 22.0997 18.1001 22.0997"
                                  stroke="#891625" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </span>
                                    <span class="text-white">ScoobCar@gmail.com</span>
                                </a>
                            </li>
                            <li class=" py-2 d-flex gap-2 align-items-center text-white">
                    <span class="bg-white d-flex justify-content-center align-items-center rounded-circle"
                          style="height: 40px; width: 40px;">
                      <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" transform="translate(0.600098 0.599731)" fill="white" />
                        <path
                                d="M9.75835 6.31196L9.35569 5.40598C9.09241 4.81361 8.96077 4.51741 8.7639 4.29074C8.51717 4.00667 8.19556 3.79767 7.83577 3.68758C7.54868 3.59973 7.22455 3.59973 6.5763 3.59973C5.628 3.59973 5.15385 3.59973 4.75582 3.78202C4.28696 3.99675 3.86353 4.46301 3.69482 4.95033C3.5516 5.36402 3.59263 5.78916 3.67467 6.63943C4.548 15.6899 9.50991 20.6518 18.5604 21.5251C19.4107 21.6072 19.8359 21.6482 20.2495 21.505C20.7369 21.3363 21.2031 20.9128 21.4179 20.444C21.6001 20.0459 21.6001 19.5718 21.6001 18.6235C21.6001 17.9752 21.6001 17.6511 21.5123 17.364C21.4022 17.0042 21.1932 16.6826 20.9091 16.4359C20.6825 16.239 20.3863 16.1074 19.7939 15.8441L18.8879 15.4414C18.2464 15.1563 17.9256 15.0138 17.5997 14.9828C17.2877 14.9531 16.9732 14.9969 16.6812 15.1106C16.3761 15.2294 16.1065 15.4541 15.5671 15.9035C15.0303 16.3509 14.7619 16.5746 14.4339 16.6944C14.1431 16.8006 13.7587 16.84 13.4525 16.7948C13.107 16.7439 12.8425 16.6026 12.3134 16.3198C10.6674 15.4402 9.75962 14.5325 8.87996 12.8864C8.59723 12.3574 8.45587 12.0928 8.40496 11.7474C8.35983 11.4411 8.39917 11.0567 8.50539 10.766C8.62521 10.438 8.8489 10.1696 9.29628 9.63273C9.74571 9.09341 9.97043 8.82375 10.0892 8.51864C10.2029 8.22667 10.2467 7.91213 10.217 7.60021C10.186 7.27425 10.0435 6.95349 9.75835 6.31196Z"
                                stroke="#891625" stroke-width="2" stroke-linecap="round" />
                      </svg>

                    </span>
                                <a href="tel:(+973) 12345678" target="_blank" class="d-flex gap-2 align-items-center text-white">
                                    (+973)-12345678
                                </a>
                                -
                                <a href="tel:(+973) 12345678" target="_blank" class="d-flex gap-2 align-items-center text-white">
                                    (+973)-12345678
                                </a>
                            </li>

                            <li class=" py-2">
                                <a href="https://maps.app.goo.gl/WBLB5w2nFc1kxicU9" target="_blank"
                                   class="d-flex gap-2 align-items-center">
                      <span class="bg-white d-flex justify-content-center align-items-center rounded-circle"
                            style="height: 40px; width: 40px;">
                        <svg width="17" height="23" viewBox="0 0 17 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                                  d="M11.1001 8.59973C11.1001 9.98043 9.9808 11.0997 8.6001 11.0997C7.2194 11.0997 6.1001 9.98043 6.1001 8.59973C6.1001 7.21902 7.2194 6.09973 8.6001 6.09973C9.9808 6.09973 11.1001 7.21902 11.1001 8.59973Z"
                                  stroke="#891625" stroke-width="2" />
                          <path
                                  d="M9.8575 17.0933C9.5202 17.4181 9.0694 17.5997 8.6003 17.5997C8.1311 17.5997 7.6803 17.4181 7.343 17.0933C4.2544 14.1005 0.115287 10.7572 2.13381 5.90346C3.2252 3.27905 5.84504 1.59973 8.6003 1.59973C11.3555 1.59973 13.9753 3.27906 15.0667 5.90346C17.0827 10.7511 12.9537 14.1108 9.8575 17.0933Z"
                                  stroke="#891625" stroke-width="2" />
                          <path
                                  d="M14.6001 19.5997C14.6001 20.7043 11.9138 21.5997 8.6001 21.5997C5.28639 21.5997 2.6001 20.7043 2.6001 19.5997"
                                  stroke="#891625" stroke-width="2" stroke-linecap="round" />
                        </svg>

                      </span>
                                    <span class="text-white">PO. Box 23215, Sharjah, Behind Al Futtaim</span>
                                </a>
                            </li>
                        </ul>
                        <div class="">
                            <h4 class="fs-20 text-white">Follow Us</h4>
                            <ul class="social d-flex px-0 mb-0 social-form gap-4">
                                <li>
                                    <a target="_blank" href="#">
                                        <i class="fab fa-facebook-f icon"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"><i class="fa-brands fa-x-twitter icon">
                                        </i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"><i class="fa-brands fa-instagram icon">
                                        </i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"><i class="fa-brands fa-whatsapp icon"></i></a>

                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-6 " data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500">
                    <form class="row p-4 bg-white border  bg-opacity-10 rounded-4 gy-3 text-white" action="sucess-en.html">
                        <div class="col-12 overflow-hidden" data-aos="fade-up" data-aos-duration="1500">
                        </div>
                        <div class=" col-lg-6">
                            <label for="email" class="form-label fw-semibold ">Full Name</label>
                            <div class="input-group ">
                                <input type="text" placeholder="Enter your full name" class="form-control rounded-3  border  py-2  bg-white"
                                       id="name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="email" class="form-label fw-semibold ">Email</label>
                            <div class="input-group ">
                                <input type="text" placeholder="Enter your email" class="form-control rounded-3  border py-2 bg-white" id="email"
                                       required>
                            </div>
                        </div>
                        <div class=" col-lg-12">
                            <label for="phonenumber" class="form-label fw-semibold ">Phone Number</label>
                            <div class="input-group  w-100">
                                <input type="tel" placeholder="Enter your phone number" name="phone" id="phone"
                                       class="form-control phone rounded-3 py-2   border bg-white" />
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <label for="Notes" class="form-label fw-semibold ">Message</label>
                            <div class="input-group ">
              <textarea style="resize: none;" class="form-control rounded-3  border p- bg-white" id="Notes" rows="3"
                        placeholder="Write your message here"></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <button type="submit" class="bg-primary-color text-white py-2 w-100 rounded-4 my-2 btn fw-medium">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




<div id="footer">


</div>

@endsection