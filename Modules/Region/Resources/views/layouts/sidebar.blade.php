<li class="nav-item @if(str_contains(Route::currentRouteName(), 'regions')) active @endif">
    <a href="{{ route('admin.regions.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-photo-film mx-2"></i>
        </span>
        <span class="text">{{ __('trans.regions') }}</span>
    </a>
</li>