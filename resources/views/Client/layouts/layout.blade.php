@php($title = setting('title_' . lang()))
@php($keywords = setting('keywords_' . lang()))
@php($desc = setting('desc_' . lang()))
@php($logo = setting('logo'))
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url()->full() }}">
    <link rel="sitemap" href="/sitemap.xml" title="Sitemap" type="application/xml">
    <link href="{{ asset($title) }}" rel="shortcut icon">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1">
    <meta name="description" content="{{ strip_tags($desc) }}">
    <meta name="keywords" content="{{ strip_tags(setting('keywords_'.lang())) }}">
    <meta name="author" content="{{ $title }}">
    <meta name="image" content="{{ asset($title) }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ strip_tags($desc) }}">
    <meta property="og:locale" content="en">
    <meta property="og:image" content="{{ asset($logo) }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:site_name" content="{{ $title }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="{{ $title }}">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ strip_tags($desc) }}">
    <meta name="twitter:site" content="{{ $title }}">
    <link rel="sitemap" href="/sitemap.xml" title="Sitemap" type="application/xml">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <include expiration='7d' path='*.css' />
    <include expiration='7d' path='*.js' />
    <include expiration='3d' path='*.gif' />
    <include expiration='3d' path='*.jpeg' />
    <include expiration='3d' path='*.jpg' />
    <include expiration='3d' path='*.png' />
    <include expiration='3d' path='*.webp' />
    <include expiration='3d' path='*.ico' />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
          integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link
            href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Cairo:wght@200..1000&family=Changa:wght@200..800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap"
            rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.10/build/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    @stack('css')

    <title>@hasSection('title') {{ $title }} - @yield('title') @else {{ $title }} @endif</title>

</head>


<body>
@yield('content')

@stack('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.10/build/css/intlTelInput.min.css" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.10/build/js/intlTelInput.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('assets/js/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/js/phone.js') }}"></script>
<script src="{{asset('assets/js/multiple-image-video(MIV).js')}}"></script>

<script>
    window.csrfToken = "{{ csrf_token() }}";
    window.logo = "{{ asset(setting('logo'))}}";
    window.isAuthenticated = {{ auth('user')->check() ? 'true' : 'false' }};
    window.description = "{{ setting(app()->getLocale() == 'ar' ? 'desc_ar' : 'desc_en') }}";
    window.x = "{{ setting('x') }}";
    window.tiktok = "{{ setting('tiktok') }}";
    window.linkedin = "{{ setting('linkedin') }}";
    window.phone = "{{ setting('phone') }}";
    window.email = "{{ setting('email') }}";
    window.whatsapp = "{{ setting('whatsapp') }}";
    window.location_map_url = "{{ setting('location_map_url') }}";
    window.address = "{{ setting(app()->getLocale() == 'ar' ? 'location_ar' : 'location_en') }}";
</script>
<script src="{{ asset('assets/js/index.js') }}"></script>

<script>
    $(document).ready(() => {
        $(".loading-screen").fadeOut(1000);
    });
    const lang = document.documentElement.lang.toLowerCase();
    var Diriction = false;
    if (lang == "ar") {
        Diriction = true;
    }
    $(".slider-scoop").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        lazyLoad: true,
        speed: 1000,
        autoplay: true,
        arrows: true,
        dots: false,
        rtl: Diriction,
        autoplaySpeed: 1500,
        prevArrow: `<button class="prev-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-left"></i></button>`,
        nextArrow: `<button class="next-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-right"></i></button>`,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                },
            },
            {
                breakpoint: 919,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,

                },
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,

                },
            }
        ],
    });
    $(".slider-services").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        arrows: false,
        dots: true,
        rtl: Diriction,
        prevArrow: `<button class="prev-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-left"></i></button>`,
        nextArrow: `<button class="next-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-right"></i></button>`,
        autoplaySpeed: 900,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    infinite: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                },
            }
        ],
    });
    $(".slider-main").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        arrows: false,
        dots: true,
        rtl: Diriction,
        prevArrow: `<button class="prev-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-left"></i></button>`,
        nextArrow: `<button class="next-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-right"></i></button>`,
        autoplaySpeed: 900,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    infinite: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                },
            }
        ],
    });
    $(".slider-adv").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        arrows: false,
        dots: true,
        rtl: Diriction,
        prevArrow: `<button class="prev-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-left"></i></button>`,
        nextArrow: `<button class="next-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-right"></i></button>`,
        autoplaySpeed: 900,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    infinite: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                },
            }
        ],
    });
    $(".slider-blogs").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        dots: false,
        rtl: Diriction,
        prevArrow: `<button class="prev-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-left"></i></button>`,
        nextArrow: `<button class="next-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-right"></i></button>`,
        autoplaySpeed: 900,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    infinite: true,
                },
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    infinite: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                },
            }
        ],
    });
    document.addEventListener("DOMContentLoaded", () => {

        const headerElements = document.querySelectorAll('.welcome-text');

        const dynamicTexts = Array.from(headerElements).map(header => header.textContent.trim());
        headerElements.forEach(header => {
            header.textContent = "";
            header.style.display = "block";
        });
        headerElements.forEach((header, index) => {
            new Typed(header, {
                strings: [dynamicTexts[index]],
                typeSpeed: 30,
                loop: false,
            });
        });
        $(".tabslider").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            arrows: false,
            dots: true,
            rtl: Diriction,
            prevArrow: `<button class="prev-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-left"></i></button>`,
            nextArrow: `<button class="next-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-right"></i></button>`,
            autoplaySpeed: 900,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        infinite: true,
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                    },
                }
            ],
        });

    });

    $(".brands").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        autoplay: true,
        arrows: false,
        dots: false,
        rtl: Diriction,
        autoplaySpeed: 0,
        cssEase: 'linear',
        speed: 1500,
        centerMode: true,
        prevArrow: `<button class="prev-button border btn rounded-circle text-black "><i class="fa-solid fa-arrow-left"></i></button>`,
        nextArrow: `<button class="next-button border btn rounded-circle text-black"><i class="fa-solid fa-arrow-right"></i></button>`,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    infinite: true,
                },
            },

            {
                breakpoint: 719,
                settings: {
                    slidesToShow: 2,
                    centerMode: false,

                },
            },
        ]
    });
    $('.nav-pills button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
        e.target
        e.relatedTarget
        $('.tabslider').slick('setPosition');
    });
</script>
</body>

</html>