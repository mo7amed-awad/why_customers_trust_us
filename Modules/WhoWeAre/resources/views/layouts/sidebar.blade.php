<li class="nav-item @if(str_contains(Route::currentRouteName(), 'whoweare')) active @endif">
    <a href="{{ route(activeGuard().'.whoweare.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-newspaper mx-2"></i>
        </span>
        <span class="text">{{ __('trans.whoweare') }}</span>
    </a>
</li>