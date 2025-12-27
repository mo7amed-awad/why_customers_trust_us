<li class="nav-item @if (str_contains(Route::currentRouteName(), 'whychooseus')) active @endif">
    <a href="{{ route(activeGuard() . '.whychooseus.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-layer-group mx-2"></i>
        </span>
        <span class="text">{{ __('trans.whychooseus') }}</span>
    </a>
</li>
