<li class="nav-item @if(str_contains(Route::currentRouteName(), 'spare-part-type')) active @endif">
    <a href="{{ route(activeGuard().'.spare-part-types.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-newspaper mx-2"></i>
        </span>
        <span class="text">{{ __('trans.spare-part-types') }}</span>
    </a>
</li>