<li class="nav-item @if(str_contains(Route::currentRouteName(), 'ads')) active @endif">
    <a href="{{ route(activeGuard().'.ads.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-newspaper mx-2"></i>
        </span>
        <span class="text">{{ __('trans.ads') }}</span>
    </a>
</li>