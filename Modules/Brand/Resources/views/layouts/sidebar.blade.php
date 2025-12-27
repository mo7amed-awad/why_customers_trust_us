<li class="nav-item @if (str_contains(Route::currentRouteName(), 'brands')) active @endif">
    <a href="{{ route('admin.brands.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-photo-film mx-2"></i>
        </span>
        <span class="text">{{ __('trans.brands') }}</span>
    </a>
</li>
