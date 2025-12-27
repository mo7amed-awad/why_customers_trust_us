<li class="nav-item @if(str_contains(Route::currentRouteName(), 'users')) active @endif">
    <a href="{{ route(activeGuard().'.users.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-users mx-2"></i>
        </span>
        <span class="text">{{ __('trans.users') }}</span>
    </a>
</li>