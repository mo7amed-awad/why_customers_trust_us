@php
    $icons = [
        "settings" => "fa-solid fa-gears",
        "app" => "fa-solid fa-mobile-button",
        "contact" => "fa-solid fa-share-nodes",
        "seo" => "fa-brands fa-google-plus-g",
        "location" => "fa-solid fa-location",
    ];
    $exploded_url = isset(explode("settings/",url()->full())[1]) ? explode("settings/",url()->full())[1] : NULL;
@endphp


@foreach (Settings()->unique('type') as $item)
    <li class="nav-item {{ str_contains($exploded_url, $item->type) ? 'active' : '' }}">
        <a href="{{ route(activeGuard().'.settings.index',['type'=>"$item->type"]) }}">
            <span class="icon text-center">
                <i style="width: 20px;" class="{{ $icons[$item->type] }} mx-2"></i>
            </span>
            <span class="text">{{ __('trans.'.$item->type.'') }}</span>
        </a>
    </li>
@endforeach