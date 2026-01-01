<!DOCTYPE html>
<html lang="{{ lang() }}" dir="{{ lang('ar') ? 'rtl' : 'ltr' }}">
<head>
    <title>{{ setting('title_'.lang()) }}</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf_token" value="{{ csrf_token() }}" content="{{ csrf_token() }}"/>
    <meta name="DT_Lang" value="{{ DT_Lang() }}" content="{{ DT_Lang() }}"/>
    <link rel="icon" href="{{ asset(setting('logo')) }}" type="image/x-icon">

    <style>
        :root {
            --main--color: {{ setting('main_color') }};
        }
        .sidebar-nav-wrapper .sidebar-nav ul .nav-item a::before {
            @if (lang('en'))
                left: 0 !important;
            @else
                right: 0 !important;
            @endif
        }


        .breadcrumbs {
            --color-text: #5d5d5d;
            width: 100%;
            padding: 10px;
        }

        .breadcrumbs__list {
            list-style: none;
        }

        .breadcrumbs li {
            display: inline;
        }

        .breadcrumbs li:first-child a::before {
            content: "\f015";
            font-family: FontAwesome;
            padding: 2px;
        }

        .breadcrumbs li:first-child a::before,
        .breadcrumbs li+li::before {
            font-size: 15px;
            color: var(--color-text);
        }

        .breadcrumbs li+li::before {
            padding: 8px;
            font-family: FontAwesome;
        }

        .breadcrumbs li a {
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            line-height: 19px;
            color: var(--color-text);
            text-transform: capitalize;
            transition: color 0.24s linear;
        }

        @media (hover: hover) {
            .breadcrumbs li a:hover {
                color: var(--primary-color);
            }
        }

        .cke_notifications_area{
            display: none !important;
        }
    </style>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('css')
    @stack('css')
    @if (lang('ar'))
        <link rel="stylesheet" href="{{ asset('css/ar.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/en.css') }}">
    @endif
</head>

<body>
    <aside class="sidebar-nav-wrapper active">
        <div class="navbar-logo">
            <a href="{{ route('admin.home') }}">
                <img src="{{ asset(setting('logo')) }}" alt="logo" style="max-width: 100%" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>

                <li class="nav-item @if(str_contains(Route::currentRouteName(), 'home')) active @endif">
                    <a href="{{ route('admin.home') }}">
                        <span class="icon text-center">
                            <i style="width: 20px;" class="fa-solid fa-chart-simple mx-2"></i>
                        </span>
                        <span class="text">{{ __('trans.dashboardTitle') }}</span>
                    </a>
                </li>



                <hr>

                    @if(hasPermission('show_category'))
                        @include('category::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_brands'))
                        @include('brand::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_models'))
                        @include('model::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_whoweare'))
                        @include('whoweare::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_whychooseus'))
                        @include('whychooseus::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_whycustomerstrustus'))
                        @include('whycustomerstrustus::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_ourvision'))
                        @include('ourvision::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_ourmission'))
                        @include('ourmission::layouts.sidebar')
                    @endif

                <hr>
                    @if(hasPermission('show_ads'))
                        @include('ads::layouts.sidebar')
                        @include('ads::spare-part-types.layouts.sidebar')
                        @include('ads::car-features.layouts.sidebar')
                    @endif
                <hr>
                    @if(hasPermission('show_contact_us'))
                        @include('contact::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_settings'))
                        @include('setting::layouts.sidebar')
                    @endif


                <hr>
                    @if(hasPermission('show_about'))
                        @include('about::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_terms'))
                        @include('term::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_privacy'))
                        @include('privacy::layouts.sidebar')
                    @endif

                <hr>
                
                    @if(hasPermission('show_admins'))
                        @include('admin::layouts.sidebar')
                    @endif

                    @if(hasPermission('show_users'))
                        @include('user::layouts.sidebar')
                    @endif

                <hr>


                @if (lang('en'))
                <li class="nav-item">
                    <a href="{{ route('lang', 'ar') }}">
                        <span class="icon text-center">
                            <img src="{{ asset('lang.png') }}" style="width: 20px;" class="mx-2">
                        </span>
                        <span class="text">العربية</span>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('lang', 'en') }}">
                        <span class="icon text-center">
                            <img src="{{ asset('lang.png') }}" style="border-radius: 50%;width: 20px;" class="mx-2">
                        </span>
                        <span class="text">English</span>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}">
                        <span class="icon text-center">
                            <i style="width: 20px;" class="fa-solid fa-right-from-bracket mx-2"></i>
                        </span>
                        <span class="text">@lang('trans.logout')</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="overlay"></div>


    <main class="main-wrapper active">
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6" style="z-index: 100">
                        <div class="header-left">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn main-btn btn-hover">
                                    <i class="lni lni-menu"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>{{ auth()->user()->name }}</h6>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="{{ route('admin.profile.show') }}"> <i class="lni lni-user"></i> {{ __('trans.myProfile') }}</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lni lni-exit"></i> {{ __('trans.logout') }}</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <style>
            .breadcrumbs li + li::before {
                content: "\{{lang('ar') ? 'f053' : 'f054' }}";
            }
        </style>

        <section class="section">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="breadcrumbs">
                           <div class="">
                                <ul class="breadcrumbs__list">
                                    <li>
                                        <a href="{{ route('admin.home') }}">@lang('trans.home')</a>
                                    </li>
                                    @hasSection('href')
                                    <li><a href="@yield('href')">@yield('href-title')</a></li>
                                    @endif

                                    @if(str_contains(Route::currentRouteName(), 'create'))

                                        @hasSection('href')
                                            <li><a href="@yield('href')">@yield('href-title')</a></li>
                                        @endif
                                        @if(substr_count(Route::currentRouteName(), '.') <= 2)
                                        <li><a href="{{ route(str_replace("create", "index", Route::currentRouteName())) }}">@yield('pagetitle')</a></li>
                                        @endif
                                        <li><a>@lang('trans.add')</a></li>
                                    @elseif(str_contains(Route::currentRouteName(), 'edit'))

                                        @hasSection('href')
                                            <li><a href="@yield('href')">@yield('href-title')</a></li>
                                        @endif

                                        @if(substr_count(Route::currentRouteName(), '.') <= 2)
                                        <li><a href="{{ route(str_replace("edit", "index", Route::currentRouteName())) }}">@yield('pagetitle')</a></li>
                                        @endif
                                        <li><a>@lang('trans.edit')</a></li>
                                    @else
                                        @if(Route::currentRouteName() == 'admin.invoices.show')
                                            <li><a href="{{ route(str_replace("show", "index", Route::currentRouteName())) }}">@yield('pagetitle')</a></li>
                                        @else
                                            <li><a>@yield('pagetitle')</a></li>
                                        @endif
                                    @endif

                                </ul>
                           </div>
                        </div>
                    </div>
                </div>

                <div class="card-styles">
                    @yield('content')
                </div>
            </div>
        </section>

    </main>




    @include('sweetalert::alert')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    {{-- datatables  --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


    @yield('js')
    @stack('js')
    @stack('scripts')

</body>
</html>
