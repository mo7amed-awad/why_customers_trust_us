<li class="nav-item @if (str_contains(Route::currentRouteName(), 'models')) active @endif">
    <a href="{{ route('admin.models.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-photo-film mx-2"></i>
        </span>
        <span class="text">{{ __('trans.models') }}</span>
    </a>
</li>
