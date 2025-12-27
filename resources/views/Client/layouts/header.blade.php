<header class="position-absolute w-100" style="z-index: 10;">
    <nav class="navbar navbar-expand-lg bg-transparent mt-md-0 py-1">
        <div class="container d-flex align-items-lg-center justify-content-between">
            <a class="navbar-brand m-3" href="{{ route('client.home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" title="Company Logo">
            </a>

            <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-start  text-white border-0" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header d-lg-none">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body w-100">
                    <div class="navbar-nav ff-Montserrat d-flex flex-lg-row gap-md-3 mx-lg-auto">
                        <a class="nav-link text-white fw-500 nav-hover-link" href="{{ route('client.home') }}">{{ __('trans.home') }}</a>
                        <a class="nav-link text-white fw-500 nav-hover-link" href="{{ route('client.home') }}#about">{{ __('trans.about_us') }}</a>
                        <a class="nav-link text-white fw-500 nav-hover-link" href="{{ route('client.services') }}">{{ __('trans.Our Services') }}</a>
                        <a class="nav-link text-white fw-500 nav-hover-link" href="{{ route('client.home') }}#contact">{{ __('trans.contact_us') }}</a>
                        <div class="nav-link  fw-400 nav-hover-link fs-sm d-lg-none d-flex">
                            <a class="text-decoration-none" role="button" href="{{ str_contains(url()->full(), '/ar') ? str_replace('/ar', '/en', url()->full()) : str_replace('/en', '/ar', url()->full()) }}">
                                <span class="fs-arbic lan font-almarai">{{ lang('ar') ? 'English' : "العربية" }}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 30 30" fill="none">
                                        <path d="M3.75 15H10M3.75 15C3.75 21.2132 8.7868 26.25 15 26.25M3.75 15C3.75 8.7868 8.7868 3.75 15 3.75M10 15H20M10 15C10 21.2132 12.2386 26.25 15 26.25M10 15C10 8.7868 12.2386 3.75 15 3.75M20 15H26.25M20 15C20 8.7868 17.7614 3.75 15 3.75M20 15C20 21.2132 17.7614 26.25 15 26.25M26.25 15C26.25 8.7868 21.2132 3.75 15 3.75M26.25 15C26.25 21.2132 21.2132 26.25 15 26.25" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex gap-4 align-items-center d-none d-lg-flex mt-3 mt-lg-0">
                <a class="text-white LanguageMenu d-flex gap-1 text-decoration-none" role="button" href="{{ str_contains(url()->full(), '/ar') ? str_replace('/ar', '/en', url()->full()) : str_replace('/en', '/ar', url()->full()) }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 30 30" fill="none">
                            <path d="M3.75 15H10M3.75 15C3.75 21.2132 8.7868 26.25 15 26.25M3.75 15C3.75 8.7868 8.7868 3.75 15 3.75M10 15H20M10 15C10 21.2132 12.2386 26.25 15 26.25M10 15C10 8.7868 12.2386 3.75 15 3.75M20 15H26.25M20 15C20 8.7868 17.7614 3.75 15 3.75M20 15C20 21.2132 17.7614 26.25 15 26.25M26.25 15C26.25 8.7868 21.2132 3.75 15 3.75M26.25 15C26.25 21.2132 21.2132 26.25 15 26.25" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="text-white fs-arbic font-almarai lan">{{ lang('ar') ? 'English' : "العربية" }}</span>
                </a>
            </div>
        </div>
    </nav>
</header>
