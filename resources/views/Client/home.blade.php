@extends('Client.layouts.layout')
@section('content')
    <!-- loader -->
    <div class="loader-bg">
        <div class="banter-loader">
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
            <div class="banter-loader__box"></div>
        </div>
    </div>
    <!-- loader -->

    @include('Client.layouts.rental-search-form')


    <section class="py-5 overflow-hidden mt-5" id="about">
        <div class="container">
            <div class="row align-items-center">

                <!-- Right Column -->
                <div class="col-md-12 col-lg-6" data-aos="fade-right">
                    <h2 class="text-primary fw-bold mb-4">
                        <span class="text-dark">{{ __('trans.about_us') }}</span>
                    </h2>
                    <ul>
                        @foreach ($Abouts as $About)
                            <li class="text-light-custom lh-160 fs-18" data-aos="fade-up" data-aos-delay="100">
                                <p><b>{{ $About->title() }}</b></p>
                                <p>{!! nl2br($About->desc()) !!}</p>
                            </li>
                        @endforeach
                    </ul>


                </div>

                <!-- Left Column -->
                <div class="col-md-12 col-lg-6 mt-5 mt-lg-0 d-flex mx-auto justify-content-center align-items-center"
                    data-aos="fade-left">
                    <div class="image-container rounded-4">
                        <img src="assets/images/about.png" class="img-fluid rounded-4" alt="">
                    </div>

                </div>

            </div>
        </div>
    </section>

    @if ($Services->count())
        <section class="position-relative">

            <div class="container py-5">
                <div class="heading py-md-4 d-flex flex-column justify-content-md-center align-items-md-center text-md-center">
                    <h2 class="text-primary fw-bold" data-aos="zoom-in-up" data-aos-duration="800">
                        <span class="text-heading text-primary">{{ __('trans.Our Services') }}</span>
                    </h2>
                </div>


                <div class="row g-4 mt-2 pb-5">

                    @foreach ($Services as $Service)
                        <div class="col-lg-4 col-md-6 col-6" data-aos="fade-up" data-aos-delay="0">
                            @include('Client.layouts.service-card', ['Service' => $Service])
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
    @endif



    @if ($Rentals->count())
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center mb-3">
                    <div class="col-lg-10 col-md-8">
                        <h2 class="text-primary fw-bold mb-3">
                            @if (lang('en'))
                                Top <span class="text-dark"> Cars for You</span>
                            @elseif(lang('ar'))
                                أفضل <span class="text-dark">السيارات المناسبة لك</span>
                            @endif
                        </h2>
                        <p class="text-light-custom lh-160 fs-18" data-aos="fade-up" data-aos-delay="100">
                            @if (lang('en'))
                                Explore our curated selection of the most popular and trusted cars, chosen to match your
                                style, budget, and driving needs.
                            @elseif(lang('ar'))
                                استكشف مجموعتنا المختارة بعناية من السيارات الأكثر شعبية وموثوقية، والتي تم اختيارها لتتناسب
                                مع أسلوبك وميزانيتك واحتياجات القيادة الخاصة بك.
                            @endif
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-4">
                        <a href="{{ route('client.rental') }}" class="btn btn-outline-primary rounded-2 col-12">{{ __('trans.viewAll') }}</a>
                    </div>
                </div>

                <div class="row py-4">
                    <div class="row py-4">
                        @foreach ($Rentals as $Rental)
                            <div class="col-lg-4 col-md-6 col-11 mb-5 mx-auto">
                                @include('Client.layouts.rental-card', ['Rental' => $Rental])
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif

    @if ($Testimonials->count())
        <section class="py-5 section-background-three bg-secondary"
            style="background-image: url('assets/images/section-bg.png');">
            <div class="container">
                <div class="d-flex justify-content-start text-white section-content flex-column">
                    <div class="d-flex flex-column justify-content-start align-items-start mt-4">
                        <h2 class="text-bold text-white">{{ __('trans.whatCustomersSay') }}</h2>
                    </div>
                    <div class="row mt-4 d-flex align-items-center testimonial-slider">
                        @foreach ($Testimonials as $Testimonial)
                            <div class="col-lg-4 col-md-6 mb-4 mx-2 py-5">
                                <div class="testimonial-card border-0 bg-white rounded-4 shadow-sm mx-2 mx-md-0 card h-100 position-relative">
                                    <!-- Quote Icon Positioned -->
                                    <div class="quote-icon text-white rounded-circle d-inline-flex align-items-center justify-content-center position-absolute">
                                        <span class="mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M17.5616 0.727889L17.1484 3.72089C16.074 3.63889 15.2889 3.85756 14.7931 4.37689C14.2972 4.89622 13.9942 5.59322 13.884 6.46789C13.7738 7.34256 13.7463 8.28556 13.8014 9.29689H17.5616V17.9479H10.4956V7.65689C10.4956 5.14222 11.1292 3.25622 12.3964 1.99889C13.6912 0.741557 15.4129 0.31789 17.5616 0.727889ZM7.06597 0.727889L6.65275 3.72089C5.57839 3.63889 4.79329 3.85756 4.29743 4.37689C3.80157 4.89622 3.49855 5.59322 3.38836 6.46789C3.27817 7.34256 3.25062 8.28556 3.30571 9.29689H7.06597V17.9479H0V7.65689C0 5.14222 0.633595 3.25622 1.90079 1.99889C3.19552 0.741557 4.91725 0.31789 7.06597 0.727889Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </div>

                                    <!-- Content -->
                                    <div class="card-body mt-4 d-flex flex-column text-info">
                                        <p>{!! nl2br($Testimonial->desc()) !!}</p>
                                    </div>
                                    <div class="card-footer bg-white rounded-bottom-4">
                                        <div class="fw-600 text-dark"> {{ $Testimonial->title() }} </div>
                                        <div>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 15 15" fill="none">
                                                    <path
                                                        d="M7.5 1.25L9.43125 5.1625L13.75 5.79375L10.625 8.8375L11.3625 13.1375L7.5 11.1062L3.6375 13.1375L4.375 8.8375L1.25 5.79375L5.56875 5.1625L7.5 1.25Z"
                                                        fill="#F0BF00" stroke="#F0BF00" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 15 15" fill="none">
                                                    <path
                                                        d="M7.5 1.25L9.43125 5.1625L13.75 5.79375L10.625 8.8375L11.3625 13.1375L7.5 11.1062L3.6375 13.1375L4.375 8.8375L1.25 5.79375L5.56875 5.1625L7.5 1.25Z"
                                                        fill="#F0BF00" stroke="#F0BF00" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 15 15" fill="none">
                                                    <path
                                                        d="M7.5 1.25L9.43125 5.1625L13.75 5.79375L10.625 8.8375L11.3625 13.1375L7.5 11.1062L3.6375 13.1375L4.375 8.8375L1.25 5.79375L5.56875 5.1625L7.5 1.25Z"
                                                        fill="#F0BF00" stroke="#F0BF00" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 15 15" fill="none">
                                                    <path
                                                        d="M7.5 1.25L9.43125 5.1625L13.75 5.79375L10.625 8.8375L11.3625 13.1375L7.5 11.1062L3.6375 13.1375L4.375 8.8375L1.25 5.79375L5.56875 5.1625L7.5 1.25Z"
                                                        fill="#F0BF00" stroke="#F0BF00" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 15 15" fill="none">
                                                    <path
                                                        d="M7.5 1.25L9.43125 5.1625L13.75 5.79375L10.625 8.8375L11.3625 13.1375L7.5 11.1062L3.6375 13.1375L4.375 8.8375L1.25 5.79375L5.56875 5.1625L7.5 1.25Z"
                                                        stroke="#F0BF00" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if ($FAQs->count())
        <section class="py-5 overflow-hidden">
            <div class="container">
                <div class="heading py-4 d-flex flex-column justify-content-md-center align-items-md-center text-md-center">
                    <h2 class="text-heading fw-bold" data-aos="zoom-in-up" data-aos-duration="1000">
                        <span class="text-primary">{{ __('trans.faq') }}</span>
                    </h2>
                    <h4 class="text-info fw-500 col-lg-7 lh-150" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="1000">
                        {{ lang('en') ? 'Everything you need to know — right here.' : 'كل ما تحتاج إلى معرفته - هنا.' }}
                    </h4>
                </div>

                <div class="col-lg-8 mt-5 d-flex flex-column justify-content-center mx-auto">
                    <div class="accordion faq-accordion" id="accordionExample">

                        @foreach ($FAQs as $FAQ)
                            <div class="accordion-item mb-4 rounded-4" data-aos="fade-up" data-aos-delay="0">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold text-shark py-4 {{ $loop->first ? '' : 'collapsed' }}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $loop->iteration }}" aria-expanded="true"
                                        aria-controls="collapse-{{ $loop->iteration }}">
                                        {{ $FAQ->title() }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-primary">
                                        <p class="fs-15 lh-150">
                                            {!! nl2br($FAQ->desc()) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </section>
    @endif

    <section id="contact" class="py-5 section-background-contact bg-secondary mb-5 overflow-hidden"
        style="background-image: url('assets/images/contact-bg.jpg')">
        <div class="container">
            <div class="row d-flex text-white section-content">
                <div class="col-lg-4 mt-4">
                    <div>
                        <h4 class="text-white fw-semibold mt-3">
                            {{ __('trans.contacts-details') }}
                        </h4>
                        <p class="text-white fw-400">
                            @if (lang('en'))
                                {{ 'We\'d love to hear from you—whether you have questions, feedback, or need help.' }}
                            @elseif(lang('ar'))
                                {{ ' يسعدنا أن نسمع منك - سواء كان لديك أسئلة أو تعليقات أو تحتاج إلى مساعدة.' }}
                            @endif
                        </p>
                    </div>
                    <div>
                        <ul class="list-unstyled m-0 p-0 mt-4">
                            <li class="d-flex gap-3 mb-4 align-items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                        viewBox="0 0 42 42" fill="none">
                                        <circle cx="21" cy="21" r="21" fill="white" />
                                        <rect width="24" height="24" transform="translate(9.6001 9.5997)"
                                            fill="white" />
                                        <path
                                            d="M18.7586 15.3119L18.3559 14.406C18.0927 13.8136 17.961 13.5174 17.7641 13.2907C17.5174 13.0066 17.1958 12.7976 16.836 12.6876C16.5489 12.5997 16.2248 12.5997 15.5765 12.5997C14.6282 12.5997 14.1541 12.5997 13.7561 12.782C13.2872 12.9967 12.8638 13.463 12.6951 13.9503C12.5518 14.364 12.5929 14.7891 12.6749 15.6394C13.5482 24.6899 18.5102 29.6518 27.5606 30.5251C28.4109 30.6072 28.8361 30.6482 29.2497 30.505C29.7371 30.3363 30.2033 29.9128 30.4181 29.444C30.6003 29.0459 30.6003 28.5718 30.6003 27.6235C30.6003 26.9752 30.6003 26.6511 30.5125 26.364C30.4024 26.0042 30.1934 25.6826 29.9093 25.4359C29.6827 25.239 29.3865 25.1074 28.7941 24.8441L27.8881 24.4414C27.2466 24.1563 26.9258 24.0138 26.5999 23.9828C26.2879 23.9531 25.9734 23.9969 25.6814 24.1106C25.3763 24.2294 25.1067 24.4541 24.5673 24.9035C24.0305 25.3509 23.7621 25.5746 23.4341 25.6944C23.1433 25.8006 22.7589 25.84 22.4527 25.7948C22.1072 25.7439 21.8427 25.6026 21.3136 25.3198C19.6676 24.4402 18.7599 23.5325 17.8802 21.8864C17.5975 21.3574 17.4561 21.0928 17.4052 20.7474C17.3601 20.4411 17.3994 20.0567 17.5056 19.766C17.6255 19.438 17.8491 19.1696 18.2965 18.6327C18.746 18.0934 18.9707 17.8237 19.0895 17.5186C19.2032 17.2266 19.247 16.9121 19.2173 16.6002C19.1863 16.2742 19.0437 15.9535 18.7586 15.3119Z"
                                            stroke="#CD2E29" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <div class="d-flex flex-row flex-wrap text-white gap-3">
                                    <a class="text-decoration-none text-white fs-15" href="tel:{{ setting('phone') }}"
                                        dir="ltr">{{ setting('phone') }}</a>
                                </div>
                            </li>

                            <li class="d-flex gap-3 mb-4 align-items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                        viewBox="0 0 42 42" fill="none">
                                        <circle cx="21" cy="21" r="21" fill="white" />
                                        <path
                                            d="M11.6001 14.5997L18.5131 18.5243C21.0388 19.9582 22.1614 19.9582 24.6871 18.5243L31.6001 14.5997"
                                            stroke="#CD2E29" stroke-width="1.5" stroke-linejoin="round" />
                                        <path
                                            d="M20.1001 29.0997C19.6338 29.0936 19.1669 29.0847 18.6989 29.0729C15.5504 28.9938 13.9762 28.9542 12.8451 27.8181C11.7139 26.682 11.6812 25.1484 11.6159 22.0811C11.5948 21.0948 11.5948 20.1144 11.6159 19.1281C11.6812 16.0608 11.7139 14.5272 12.845 13.3911C13.9762 12.255 15.5504 12.2154 18.6989 12.1363C20.6394 12.0875 22.5608 12.0875 24.5013 12.1363C27.6498 12.2154 29.224 12.255 30.3551 13.3911C31.4863 14.5272 31.519 16.0608 31.5843 19.1281C31.594 19.5822 31.5992 19.7962 31.6 20.0997"
                                            stroke="#CD2E29" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M28.6001 26.5997C28.6001 27.4281 27.9285 28.0997 27.1001 28.0997C26.2717 28.0997 25.6001 27.4281 25.6001 26.5997C25.6001 25.7713 26.2717 25.0997 27.1001 25.0997C27.9285 25.0997 28.6001 25.7713 28.6001 26.5997ZM28.6001 26.5997V27.0997C28.6001 27.9281 29.2717 28.5997 30.1001 28.5997C30.9285 28.5997 31.6001 27.9281 31.6001 27.0997V26.5997C31.6001 24.1144 29.5854 22.0997 27.1001 22.0997C24.6148 22.0997 22.6001 24.1144 22.6001 26.5997C22.6001 29.085 24.6148 31.0997 27.1001 31.0997"
                                            stroke="#CD2E29" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div class="d-flex flex-row flex-wrap text-white gap-3">
                                    <a class="text-decoration-none text-white fs-15"
                                        href="mailto:{{ setting('phone') }}">{{ setting('email') }}</a>
                                </div>
                            </li>

                            <li class="d-flex gap-3 mb-4 align-items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                        viewBox="0 0 42 42" fill="none">
                                        <circle cx="21" cy="21" r="21" fill="white" />
                                        <path
                                            d="M24.1001 18.5997C24.1001 19.9804 22.9808 21.0997 21.6001 21.0997C20.2194 21.0997 19.1001 19.9804 19.1001 18.5997C19.1001 17.219 20.2194 16.0997 21.6001 16.0997C22.9808 16.0997 24.1001 17.219 24.1001 18.5997Z"
                                            stroke="#CD2E29" stroke-width="2" />
                                        <path
                                            d="M22.8575 27.0933C22.5202 27.4181 22.0694 27.5997 21.6003 27.5997C21.1311 27.5997 20.6803 27.4181 20.343 27.0933C17.2544 24.1005 13.1153 20.7572 15.1338 15.9034C16.2252 13.279 18.845 11.5997 21.6003 11.5997C24.3555 11.5997 26.9753 13.279 28.0667 15.9034C30.0827 20.7511 25.9537 24.1108 22.8575 27.0933Z"
                                            stroke="#CD2E29" stroke-width="2" />
                                        <path
                                            d="M27.6001 29.5997C27.6001 30.7043 24.9138 31.5997 21.6001 31.5997C18.2864 31.5997 15.6001 30.7043 15.6001 29.5997"
                                            stroke="#CD2E29" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <div class="d-flex flex-row flex-wrap text-white gap-3">
                                    <a class="text-decoration-none text-white fs-15"
                                        href="">{!! nl2br(setting('location_' . lang())) !!}</a>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <div class="mt-5">
                        <h4 class="text-white fw-semibold mt-4">
                            {{ __('trans.followUs') }}
                        </h4>
                        <div class="d-flex align-items-center mb-4 mb-md-0">
                            <ul class="list-unstyled mb-0 mt-0 m-0 p-0 gap-3 d-flex flex-wrap align-items-center">
                                <li>
                                    <a href="{{ setting('tiktok') }}" class="text-decoration-none links-hover"
                                        target="_blank" rel="noopener noreferrer">
                                        <span class="text-white fs-5 rounded-2 link-primary links-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z"
                                                    stroke="white" stroke-width="2" stroke-linejoin="round" />
                                                <path
                                                    d="M10.5359 11.0075C9.71585 10.8916 7.84666 11.0834 6.93011 12.7782C6.01355 14.4729 6.9373 16.2368 7.51374 16.9069C8.08298 17.5338 9.89226 18.721 11.8114 17.5619C12.2871 17.2746 12.8797 17.0603 13.552 14.8153L13.4738 5.98145C13.3441 6.95419 14.4186 9.23575 17.478 9.5057"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1" height="25"
                                        viewBox="0 0 1 25" fill="none">
                                        <line x1="0.5" y1="25" x2="0.5" stroke="white" />
                                    </svg>
                                </span>
                                <li>
                                    <a href="{{ setting('x') }}" class="text-decoration-none links-hover"
                                        target="_blank" rel="noopener noreferrer">
                                        <span class="text-white fs-5 rounded-2 link-primary links-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M3 21L10.5484 13.4516M21 3L13.4516 10.5484M13.4516 10.5484L8 3H3L10.5484 13.4516M13.4516 10.5484L21 21H16L10.5484 13.4516"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1" height="25"
                                        viewBox="0 0 1 25" fill="none">
                                        <line x1="0.5" y1="25" x2="0.5" stroke="white" />
                                    </svg>
                                </span>
                                <li>
                                    <a href="https://wa.me/{{ setting('whatsapp') }}" class="text-decoration-none links-hover" target="_blank"
                                        rel="noopener noreferrer">
                                        <span class="text-white fs-5 rounded-2 link-primary links-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.3789 2.27907 14.6926 2.78382 15.8877C3.06278 16.5481 3.20226 16.8784 3.21953 17.128C3.2368 17.3776 3.16334 17.6521 3.01642 18.2012L2 22L5.79877 20.9836C6.34788 20.8367 6.62244 20.7632 6.87202 20.7805C7.12161 20.7977 7.45185 20.9372 8.11235 21.2162C9.30745 21.7209 10.6211 22 12 22Z"
                                                    stroke="white" stroke-width="2" stroke-linejoin="round" />
                                                <path
                                                    d="M8.58815 12.3773L9.45909 11.2956C9.82616 10.8397 10.2799 10.4153 10.3155 9.80826C10.3244 9.65494 10.2166 8.96657 10.0008 7.58986C9.91601 7.04881 9.41086 7 8.97332 7C8.40314 7 8.11805 7 7.83495 7.12931C7.47714 7.29275 7.10979 7.75231 7.02917 8.13733C6.96539 8.44196 7.01279 8.65187 7.10759 9.07169C7.51023 10.8548 8.45481 12.6158 9.91948 14.0805C11.3842 15.5452 13.1452 16.4898 14.9283 16.8924C15.3481 16.9872 15.558 17.0346 15.8627 16.9708C16.2477 16.8902 16.7072 16.5229 16.8707 16.165C17 15.8819 17 15.5969 17 15.0267C17 14.5891 16.9512 14.084 16.4101 13.9992C15.0334 13.7834 14.3451 13.6756 14.1917 13.6845C13.5847 13.7201 13.1603 14.1738 12.7044 14.5409L11.6227 15.4118"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1" height="25"
                                        viewBox="0 0 1 25" fill="none">
                                        <line x1="0.5" y1="25" x2="0.5" stroke="white" />
                                    </svg>
                                </span>
                                <li>
                                    <a href="{{ setting('snampchat') }}" class="text-decoration-none links-hover"
                                        target="_blank" rel="noopener noreferrer">
                                        <span class="text-white fs-5 rounded-2 link-primary links-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M6.57556 7.42444C6.57556 4.42861 9.00416 2 12 2C14.9958 2 17.4244 4.42861 17.4244 7.42444C17.4244 12.1722 17.6611 14.5456 22 16.4444C19.7778 17 19.2222 17.5556 18.6667 19.7778C14.7778 19.7778 14.2222 22 12 22C9.77778 22 9.22222 19.7778 5.33333 19.7778C4.77778 17.5556 4.22222 17 2 16.4444C6.33889 14.5456 6.57556 12.1722 6.57556 7.42444Z"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M2 16C5.82356 13.9171 5.82356 11.9503 2.95589 9" stroke="white"
                                                    stroke-width="2" stroke-linecap="round" />
                                                <path d="M22 16C18.1764 13.9171 18.1764 11.9503 21.0441 9" stroke="white"
                                                    stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1" height="25"
                                        viewBox="0 0 1 25" fill="none">
                                        <line x1="0.5" y1="25" x2="0.5" stroke="white" />
                                    </svg>
                                </span>
                                <li>
                                    <a href="{{ setting('instagram') }}" class="text-decoration-none links-hover"
                                        target="_blank" rel="noopener noreferrer">
                                        <span class="text-white fs-5 rounded-2 link-primary links-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                viewBox="0 0 22 22" fill="none">
                                                <path
                                                    d="M1 11C1 6.28595 1 3.92893 2.46447 2.46447C3.92893 1 6.28595 1 11 1C15.714 1 18.0711 1 19.5355 2.46447C21 3.92893 21 6.28595 21 11C21 15.714 21 18.0711 19.5355 19.5355C18.0711 21 15.714 21 11 21C6.28595 21 3.92893 21 2.46447 19.5355C1 18.0711 1 15.714 1 11Z"
                                                    stroke="white" stroke-width="2" stroke-linejoin="round" />
                                                <path
                                                    d="M15.7374 10.9998C15.7374 13.6159 13.6166 15.7366 11.0005 15.7366C8.38443 15.7366 6.26367 13.6159 6.26367 10.9998C6.26367 8.3837 8.38443 6.26294 11.0005 6.26294C13.6166 6.26294 15.7374 8.3837 15.7374 10.9998Z"
                                                    stroke="white" stroke-width="2" />
                                                <path d="M16.7979 5.21039L16.7875 5.21039" stroke="white"
                                                    stroke-width="1.33333" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>
                <div class="col-lg-8 mt-4">
                    <div class="card rounded-3 py-3 bg-white-50 border-white" data-aos="fade-up"
                        data-aos-duration="1000">
                        <div class="card-body py-4">
                            <form action="{{ route('client.contact') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label for="name" class="text-white fw-400 mb-1">{{ __('trans.name') }}</label>
                                        <input type="text" class="form-control border-0 border-bottom rounded-3" id="name" name="name" required>
                                    </div>

                                    <div class="col-lg-6 mb-4">
                                        <label for="email" class="text-white fw-400 mb-1">{{ __('trans.email') }}</label>
                                        <input type="email" class="form-control border-0 border-bottom rounded-3" id="email" name="email" required>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="phone" class="text-white fw-400 mb-1">{{ __('trans.phone') }}</label>
                                        <input type="hidden" id="country_code" name="country_code" value="BH">
                                        <input type="hidden" id="phone_code" name="phone_code" value="973">
                                        <input type="tel" class="form-control border-0 border-bottom rounded-3" id="phone" name="phone" required>
                                    </div>

                                    <div class="col-lg-6 mb-4">
                                        <label for="subject" class="text-white fw-400 mb-1">{{ __('trans.subject') }}</label>
                                        <input type="text" class="form-control border-0 border-bottom rounded-3" id="subject" name="subject" required>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label for="message" class="text-white fw-400 mb-1">{{ __('trans.message') }}</label>
                                        <textarea id="message" name="message" class="form-control border-0 border-bottom rounded-3" rows="3"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary fw-semibold px-5 rounded-3 mt-2">{{ __('trans.Submit') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
