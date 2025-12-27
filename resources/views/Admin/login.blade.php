<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ setting('title_'.lang()) }}</title>
    <link rel="canonical" href="{{ url()->full() }}">
    <link rel="sitemap" href="/sitemap.xml" title="Sitemap" type="application/xml">
    <link href="{{ asset(setting('logo')) }}" rel="shortcut icon">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1">
    <meta name="description" content="{{ strip_tags(setting('desc')) }}">
    <meta name="keywords" content="{{ strip_tags(setting('keywords')) }}">
    <meta name="author" content="{{ setting('title_'.lang()) }}">
    <meta name="image" content="{{ asset(setting('logo')) }}">
    <meta property="og:title" content="{{ setting('title_'.lang()) }}">
    <meta property="og:description" content="{{ strip_tags(setting('desc')) }}">
    <meta property="og:locale" content="en">
    <meta property="og:image" content="{{ asset(setting('logo')) }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:site_name" content="{{ setting('title_'.lang()) }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="{{ setting('title_'.lang()) }}">
    <meta name="twitter:title" content="{{ setting('title_'.lang()) }}">
    <meta name="twitter:description" content="{{ strip_tags(setting('desc')) }}">
    <meta name="twitter:site" content="@{{ setting('title_'.lang()) }}">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="shortcut icon" href="{{ asset('login_assets/assets_' .lang() . '/images/favicon_1.ico') }}">

    <title>@lang('trans.dashboardTitle')</title>

    <style>
        :root {
            --main--color: {{ setting('main_color') }};
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/menu.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/phone.css') }}" rel="stylesheet" type="text/css" />
</head>

<body @if(app()->isLocale('ar')) dir="rtl" @endif>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    
    <div class="wrapper-page" style="    width: 540px;max-width: 100%;">
        <div class=" card-box">
            <div class="panel-heading">
                <div class="text-center">
                    <img src="{{ asset(setting('logo')) }}" alt="logo" style="max-height: 100px">
                </div>
                <h3 class="text-center"> @lang('trans.Login') <strong class="text-inverse">@lang('trans.management')</strong> </h3>
            </div>
            <div class="panel-body">
                <ul class="text-danger">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    @endif
                </ul>
                <form class="form-horizontal m-t-20" action="{{route('admin.login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="">
                            <label for="phone" class="form-label">@lang('trans.phone')</label>
                            <input class="form-control" type="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="">
                            <label for="password" class="form-label">@lang('trans.Password')</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="">
                            <div class="">
                                <input id="checkbox-signup" name="remember" type="checkbox">
                                <label for="checkbox-signup">
                                    @lang('trans.remember')
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="">
                            <button class="btn btn-inverse btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">@lang('trans.login')</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/phone.js') }}"></script>
</body>
</html>