<li class="nav-item @if (str_contains(Route::currentRouteName(), 'ourmission')) active @endif">
    <a href="{{ route(activeGuard() . '.ourmission.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-layer-group mx-2"></i>
        </span>
        <span class="text">{{ __('trans.ourmission') }}</span>
    </a>
</li>
