<li class="nav-item @if(str_contains(Route::currentRouteName(), 'terms')) active @endif">
    <a href="{{ route(activeGuard().'.terms.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-newspaper mx-2"></i>
        </span>
        <span class="text">{{ __('trans.terms') }}</span>
    </a>
</li>