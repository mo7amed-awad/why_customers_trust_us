<li class="nav-item @if(str_contains(Route::currentRouteName(), 'spare-part-type')) active @endif">
    <a href="{{ route(activeGuard().'.car-features.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-newspaper mx-2"></i>
        </span>
        <span class="text">{{ __('trans.car-features') }}</span>
    </a>
</li>