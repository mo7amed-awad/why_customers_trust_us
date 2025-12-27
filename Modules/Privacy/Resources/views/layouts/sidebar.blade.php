<li class="nav-item @if(str_contains(Route::currentRouteName(), 'privacy')) active @endif">
    <a href="{{ route(activeGuard().'.privacy.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-shield-halved mx-2"></i>
        </span>
        <span class="text">{{ __('trans.privacy') }}</span>
    </a>
</li>