<li class="nav-item @if (str_contains(Route::currentRouteName(), 'biddings')) active @endif">
    <a href="{{ route(activeGuard() . '.biddings.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-layer-group mx-2"></i>
        </span>
        <span class="text">{{ __('trans.biddings') }}</span>
    </a>
</li>
