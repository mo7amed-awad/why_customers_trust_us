<li class="nav-item @if (str_contains(Route::currentRouteName(), 'category')) active @endif">
    <a href="{{ route(activeGuard() . '.category.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-layer-group mx-2"></i>
        </span>
        <span class="text">{{ __('trans.category') }}</span>
    </a>
</li>
