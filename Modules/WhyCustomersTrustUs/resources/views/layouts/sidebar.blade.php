<li class="nav-item @if (str_contains(Route::currentRouteName(), 'whycustomerstrustus')) active @endif">
    <a href="{{ route(activeGuard() . '.whycustomerstrustus.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-layer-group mx-2"></i>
        </span>
        <span class="text">{{ __('trans.whycustomerstrustus') }}</span>
    </a>
</li>
