<li class="nav-item @if(str_contains(Route::currentRouteName(), 'admins')) active @endif">
    <a class="collapsed" href="{{ route(activeGuard().'.admins.index') }}" class="">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-user-gear mx-2"></i>
        </span>
        <span class="text">{{ __('trans.admins') }}</span>
    </a>
</li>