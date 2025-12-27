@extends('Client.layouts.layout')
@section('content')
    <section class="py-5 section-background" style="background-image: url('{{ asset('assets/images/section-bg.png') }}')">
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-md-12 section-content justify-content-center align-items-center d-flex flex-column mt-5">
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    {{ lang('ar') ? 'خدمات الليموزين الفاخرة' : 'Al Ameed Limousine Service' }}
                </h1>
                <p class="text-white col-xl-8 col-lg-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    {{ lang('ar')
                        ? 'سافر براحة وأناقة مع خدمتنا الاحترافية للليموزين — موثوقة وأنيقة ومتاحة في أي وقت تحتاجه.'
                        : 'Travel in comfort and style with our professional limousine service — reliable, elegant, and available anytime you need it.' }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-12" data-aos="fade-up">

                    @foreach ($Limousines as $Limousine)
                        <div class="mb-5">
                            <h2 class="fw-semibold text-primary" data-aos="fade-right" data-aos-delay="100">
                                {{ $Limousine->title() }}
                            </h2>
                            <p class="text-light-custom fs-18 fw-500">
                                {!! nl2br($Limousine->desc()) !!}
                            </p>
                        </div>
                    @endforeach

                    <div class="mb-5" data-aos="fade-up" data-aos-delay="400">
                        <h4 class="text-accent-alt fw-semibold mb-4">
                            <span class="text-primary">{{ lang('ar') ? 'احجز' : 'Book' }}</span>
                            {{ lang('ar') ? 'الليموزين الخاص بك' : 'Your Limousine' }}
                        </h4>
                        <p class="text-light-custom fs-18 fw-500 lh-160">
                            {{ lang('ar')
                                ? 'يمكنك إجراء الحجز بسهولة من خلال موقعنا الإلكتروني أو الاتصال بفريقنا للحصول على المساعدة.'
                                : 'Make your reservation easily through our website or contact our team for assistance.' }}
                        </p>
                        <div class="d-flex flex-column mt-4">
                            <a href="tel:{{ setting('phone') }}"
                                class="text-decoration-none d-flex gap-3 align-items-center mb-4">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                        viewBox="0 0 42 42" fill="none">
                                        <circle cx="21" cy="21" r="21" fill="#CD2E29" />
                                        <rect width="24" height="24" transform="translate(9.6001 9.59961)"
                                            fill="#CD2E29" />
                                        <path
                                            d="M18.7586 15.3118L18.3559 14.4059C18.0927 13.8135 17.961 13.5173 17.7641 13.2906C17.5174 13.0065 17.1958 12.7975 16.836 12.6875C16.5489 12.5996 16.2248 12.5996 15.5765 12.5996C14.6282 12.5996 14.1541 12.5996 13.7561 12.7819C13.2872 12.9966 12.8638 13.4629 12.6951 13.9502C12.5518 14.3639 12.5929 14.789 12.6749 15.6393C13.5482 24.6898 18.5102 29.6517 27.5606 30.525C28.4109 30.6071 28.8361 30.6481 29.2497 30.5049C29.7371 30.3362 30.2033 29.9127 30.4181 29.4439C30.6003 29.0458 30.6003 28.5717 30.6003 27.6234C30.6003 26.9751 30.6003 26.651 30.5125 26.3639C30.4024 26.0041 30.1934 25.6825 29.9093 25.4358C29.6827 25.2389 29.3865 25.1073 28.7941 24.844L27.8881 24.4413C27.2466 24.1562 26.9258 24.0137 26.5999 23.9827C26.2879 23.953 25.9734 23.9968 25.6814 24.1105C25.3763 24.2293 25.1067 24.454 24.5673 24.9034C24.0305 25.3508 23.7621 25.5745 23.4341 25.6943C23.1433 25.8005 22.7589 25.8399 22.4527 25.7947C22.1072 25.7438 21.8427 25.6025 21.3136 25.3197C19.6676 24.4401 18.7599 23.5324 17.8802 21.8863C17.5975 21.3573 17.4561 21.0927 17.4052 20.7473C17.3601 20.441 17.3994 20.0566 17.5056 19.7659C17.6255 19.4379 17.8491 19.1695 18.2965 18.6326C18.746 18.0933 18.9707 17.8236 19.0895 17.5185C19.2032 17.2265 19.247 16.912 19.2173 16.6001C19.1863 16.2741 19.0437 15.9534 18.7586 15.3118Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <div>
                                    <p class="fw-medium text-accent-alt mb-0">{{ setting('phone') }}</p>
                                </div>
                            </a>
                            <a href="mailto:{{ setting('email') }}"
                                class="text-decoration-none d-flex gap-3 align-items-center mb-4">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                        viewBox="0 0 42 42" fill="none">
                                        <circle cx="21" cy="21" r="21" fill="#CD2E29" />
                                        <path
                                            d="M11.6001 14.5996L18.5131 18.5242C21.0388 19.9581 22.1614 19.9581 24.6871 18.5242L31.6001 14.5996"
                                            stroke="white" stroke-width="1.5" stroke-linejoin="round" />
                                        <path
                                            d="M20.1001 29.0996C19.6338 29.0935 19.1669 29.0846 18.6989 29.0728C15.5504 28.9937 13.9762 28.9541 12.8451 27.818C11.7139 26.6819 11.6812 25.1483 11.6159 22.081C11.5948 21.0947 11.5948 20.1143 11.6159 19.128C11.6812 16.0607 11.7139 14.5271 12.845 13.391C13.9762 12.2549 15.5504 12.2153 18.6989 12.1362C20.6394 12.0874 22.5608 12.0874 24.5013 12.1362C27.6498 12.2153 29.224 12.2549 30.3551 13.391C31.4863 14.5271 31.519 16.0607 31.5843 19.128C31.594 19.5821 31.5992 19.7961 31.6 20.0996"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M28.6001 26.5996C28.6001 27.428 27.9285 28.0996 27.1001 28.0996C26.2717 28.0996 25.6001 27.428 25.6001 26.5996C25.6001 25.7712 26.2717 25.0996 27.1001 25.0996C27.9285 25.0996 28.6001 25.7712 28.6001 26.5996ZM28.6001 26.5996V27.0996C28.6001 27.928 29.2717 28.5996 30.1001 28.5996C30.9285 28.5996 31.6001 27.928 31.6001 27.0996V26.5996C31.6001 24.1143 29.5854 22.0996 27.1001 22.0996C24.6148 22.0996 22.6001 24.1143 22.6001 26.5996C22.6001 29.0849 24.6148 31.0996 27.1001 31.0996"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <div>
                                    <p class="fw-medium text-accent-alt mb-0">{{ setting('email') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
