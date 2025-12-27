<li class="nav-item @if (str_contains(Route::currentRouteName(), 'bid_requests')) active @endif">
    <a href="{{ route('admin.bid_requests.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-photo-film mx-2"></i>
        </span>
        <span class="text">{{ __('trans.bid_requests') }}</span>
    </a>
</li>
