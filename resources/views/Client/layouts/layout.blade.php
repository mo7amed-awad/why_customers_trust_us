<!DOCTYPE html>
<html lang="{{ lang() }}" dir="{{ lang('ar') ? 'rtl' : 'ltr' }}" style="overflow-x: hidden;">
    <head>
        @include('Client.layouts.css')
    </head>
    <body style="direction:{{ lang('en') ? 'ltr' : 'rtl' }}">
        
        @hasSection('header')
            @yield('header')
        @else
            @include('Client.layouts.header')
        @endif

        @yield('content')
        
        @include('Client.layouts.footer')



        <button type="button" title="Back to top" class="back-to-top btn btn-primary rounded-circle py-2 px-2">
            <span data-toggle="tooltip" data-placement="bottom" title="Whatsapp">
                <img src="{{ asset('assets/images/arrow-up.svg') }}" alt="Back to top arrow" class="" width="18" data-toggle="tooltip" data-placement="bottom" title="Whatsapp" />
            </span>
        </button>

        <a href="https://wa.me/{{ setting('whatsapp') }}" class="whats-app btn btn-info py-2 px-2 mb-2 rounded-circle" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Whatsapp">
            <i class="bi bi-whatsapp my-float"></i>
        </a>


        @include('Client.layouts.js')

        @include('phone')
    </body>
</html>