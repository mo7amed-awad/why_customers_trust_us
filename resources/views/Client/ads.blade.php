@extends('Client.layouts.layout')

@section('content')


<nav id="navBar">

</nav>


<form action="{{ route('client.ads', $slug) }}" method="GET" class="container my-lg-5 my-3 ">
    @csrf
    <div class="row  ">

        {{--Filter--}}
        <div class="col-lg-3  ">
            <div class="row ">
                <div class="col-12 border rounded-3 bg-white">
                    <nav class="navbar navbar-expand-lg second-navbar filter ">
                        <div class="container nav-container">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                                <i class="fa-solid fa-bars text-black"></i>
                            </button>
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbarLabel2">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel2"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body header">
                                    <ul class="navbar-nav flex-column flex-grow-1 gap-2 m-auto  mb-2 mb-lg-0 my-3 ">
                                        <div class="offcanvas-body header">
                                            <ul class="navbar-nav flex-column flex-grow-1 m-auto  mb-2 mb-lg-0 my-3 ">
                                                @switch($slug)
                                                    @case('cars')
                                                        @include('filters.cars-filters')
                                                        @break

                                                    @case('spare-parts')
                                                        @include('filters.cars-filters')
                                                        @break

                                                    @case('accessories')
                                                        @include('filters.accessories-filters')
                                                        @break

                                                    @case('plates')
                                                        @include('filters.accessories-filters')
                                                        @break
                                                @endswitch
                                                    <!-- Action Buttons -->
                                                <div class="mb-3 w-100 d-flex justify-content-center flex-column gap-2 mt-3">
                                                    <button type="submit"
                                                            class="btn bg-primary bg-opacity-25 primary-color text-white w-100 btn rounded-3 fw-semibold py-2">
                                                        <span>{{ __('front.advanced_search') }}</span>
                                                    </button>
                                                </div>
                                            </ul>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

        </div>

        {{--Result--}}
        <div class="col-lg-9">
            <!-- Results Header with Sort and Active Filters -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary form-select dropdown-toggle rounded-3 px-5" type="button"
                                id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('front.sort_by') }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end overflow-hidden">
                            <li>
                                <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">
                                    {{ __('front.latest') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}">
                                    {{ __('front.oldest') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">
                                    {{ __('front.price_low_high') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">
                                    {{ __('front.price_high_low') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            @php
                $half = ceil($items->count() / 2);
                $itemsFirstHalf = $items->slice(0, $half);
                $itemsSecondHalf = $items->slice($half);
            @endphp

            <div class="row gy-3 slider2 slider-title regular">
                @foreach($itemsFirstHalf as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 ">
                        @include($cardView, ['item' => $item])
                    </div>
                @endforeach
            </div>


            <div class="row align-items-center py-2">
                <div class="col-12">
                    <div class="d-flex header-div services px-0 justify-content-center overflow-hidden align-items-center position-relative bg-primary-color rounded-3">
                        <div class="position-absolute top-0 bottom-0 end-0 start-0 px-lg-5 px-2 d-flex align-items-center justify-content-center">
                            <div class="row justify-content-center w-100 h-100">
                                <div class="col-lg-5 col-md-6 d-lg-flex justify-content-center gap-2 h-100">
                                    <div class="img-circle h-100 overflow-hidden position-relative w-100 d-flex justify-content-center">
                                        <img class="w-auto h-100" style="max-height: 100%;" data-aos="fade-right" data-aos-duration="1500" src="{{asset('assets/imgs/home/person.png')}}" />
                                    </div>
                                </div>
                                <div class="col-lg-7 d-flex flex-column justify-content-center text-white">
                                    <h4 class="fs-24 py-2 fw-bolder lh-base w-75" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">
                                        {{ __('front.platform_title') }}
                                        <br>
                                        {{ __('front.platform_subtitle') }}
                                    </h4>
                                    <p class="py-2 mb-0 fs-18" data-aos="fade-up" data-aos-duration="500" data-aos-delay="600">
                                        {{ __('front.platform_description') }}
                                    </p>
                                    <div class="w-100 py-2" data-aos="fade-up" data-aos-duration="500" data-aos-delay="1000">
                                        @if (!auth('user')->check())
                                            <a href="{{ route('client.register', ['lang' => app()->getLocale()]) }}"
                                               class="btn bg-black bg-opacity-25 py-2 px-5 text-white rounded-pill gap-2">
                                                <span>{{ __('front.become_member') }}</span>
                                                <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 17.59L17.59 19L7 8.41V15H5V5H15V7H8.41L19 17.59Z"
                                                  fill="white"/>
                                        </svg>
                                    </span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-3 slider2 slider-title regular">
                @foreach($itemsSecondHalf as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 ">
                        @include($cardView, ['item' => $item])
                    </div>
                @endforeach
            </div>


        </div>

    </div>
</form>

<footer id="footer">
</footer>

@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const rangeMin = document.querySelector('.range-min-price');
            const rangeMax = document.querySelector('.range-max-price');
            const priceMinValue = document.querySelector('.price-min-value');
            const priceMaxValue = document.querySelector('.price-max-value');
            const progress = document.querySelector('.progress-price');

            function formatPrice(value) {
                const millions = value / 1000000;
                return millions.toFixed(1);
            }

            function updateSlider() {
                let minVal = parseInt(rangeMin.value);
                let maxVal = parseInt(rangeMax.value);

                const gap = 50000;

                if (maxVal < gap) {
                    maxVal = gap;
                    rangeMax.value = maxVal;
                }

                if (minVal > maxVal - gap) {
                    minVal = maxVal - gap;
                    rangeMin.value = minVal;
                }

                priceMinValue.textContent = formatPrice(minVal);
                priceMaxValue.textContent = formatPrice(maxVal);

                const minPercent = (minVal / rangeMin.max) * 100;
                const maxPercent = (maxVal / rangeMax.max) * 100;

                progress.style.left = minPercent + '%';
                progress.style.right = (100 - maxPercent) + '%';
            }

            rangeMin.addEventListener('input', updateSlider);
            rangeMax.addEventListener('input', updateSlider);

            updateSlider();
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const brandRadios = document.querySelectorAll('.brand-radio');
            const modelItems = document.querySelectorAll('.model-item');

            // Function to filter models based on selected brand
            function filterModels(brandId) {
                modelItems.forEach(item => {
                    if (brandId && item.dataset.brandId === brandId) {
                        item.style.display = 'flex';
                        item.classList.remove('d-none');
                    } else if (!brandId) {
                        item.style.display = 'flex';
                        item.classList.remove('d-none');
                    } else {
                        item.style.display = 'none';
                        item.classList.add('d-none');
                        // Uncheck hidden models
                        const checkbox = item.querySelector('input[type="checkbox"]');
                        if (checkbox) checkbox.checked = false;
                    }
                });
            }

            // Initial filter on page load
            const selectedBrand = document.querySelector('.brand-radio:checked');
            if (selectedBrand) {
                filterModels(selectedBrand.value);
            }

            // Add event listeners to brand radios
            brandRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    filterModels(this.value);
                });
            });
        });
    </script>
@endpush
@endsection