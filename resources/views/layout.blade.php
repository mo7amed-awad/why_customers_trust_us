<!DOCTYPE html>
<html lang="{{ lang() }}" dir="{{ lang('ar') ? 'rtl' : 'ltr' }}" data-bs-theme="">
    <head>
        <meta charset="utf-8">
        <title>{{ setting('title_'.lang()) }}</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf_token" value="{{ csrf_token() }}" content="{{ csrf_token() }}"/>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
        <meta name="twitter:site" content="{{ setting('title_'.lang()) }}">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset(setting('logo')) }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset(setting('logo')) }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(setting('logo')) }}">

        <link rel="canonical" href="{{ url()->full() }}">
        <link href="{{ asset(setting('logo')) }}" rel="shortcut icon">

        @stack('main-css')
        <style>
            :root {
                --main--color: {{ setting('main_color') }};
            }
            .field-icon {
                @if(lang('en'))
                margin-left: 95%;
                @else
                margin-right: 95%;
                @endif
            }
        </style>
    </head>
    <body class="{{ lang() == 'ar' ? 'text-right' : '' }}" dir="{{ lang('ar') ? 'rtl' : 'ltr' }}">

        @yield('main-content')

        @stack('main-js')
        @include('sweetalert::alert')
    </body>
</html>