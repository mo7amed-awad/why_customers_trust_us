@extends('Client.layouts.layout')

@section('content')

<div
        class="loading-screen bg-white position-fixed top-0 start-0 end-0 bottom-0 bg-white justify-content-center align-items-center">
    <img class="" src="{{asset('assets/imgs/home/loading.gif')}}">
</div>

<div class="" id="navBar">

</div>

{{--Search--}}
<div class="container-fluid  section-top mb-5" id="home">

    <div class="row   align-items-center ">
        <div
                class="col-12 d-flex  home-div px-0 rounded-0 justify-content-center overflow-hidden align-items-center position-relative">
            <img class="w-100 h-100 object-fit-cover" src="{{asset('assets/imgs/home/slider.jpg')}}" />
            <div
                    class="layer position-absolute  top-0 bottom-0 end-0 start-0 px-lg-5 px-2 d-flex align-items-end justify-content-center text-center">

                <div class="row justify-content-center w-100 py-5 gap-3">
                    <div class="col-lg-8">
                        <h4 class="h4-home py-2 fw-semibold welcome-text text-white fw-bold">
                            Find the Perfect Car for You
                        </h4>
                        <p class="text-white py-2" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">
                            Explore a wide range of new and used cars from trusted sellers. Compare features, view detailed specs,
                            and drive away with confidence knowing you’ve made the right choice.
                        </p>
                    </div>
                    <div class=" col-lg-10 ">
                        <div class="card h-100 rounded-3 overflow-hidden shadow-sm  position-relative" data-aos="zoom-in-up"
                             data-aos-duration="1500">
                            <div class="card-body  h-100 d-flex">
                                <form class=" row d-flex flex-md-nowrap py-lg-4 py-2 gy-3 w-100 text-start align-items-end">
                                    <div class="col-md-3 col-sm-6 ">
                                        <label for="phonenumber" class="form-label fs-14 primary-color">Brand Name</label>
                                        <div class="input-group  align-items-center">
                                            <select class="form-select rounded-3" aria-label="Default select example">
                                                <option selected>All Brands</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 ">
                                        <label for="phonenumber" class="form-label fs-14 primary-color">Model Car</label>
                                        <div class="input-group  align-items-center">
                                            <select class="form-select rounded-3" aria-label="Default select example">
                                                <option selected>All Models</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 ">
                                        <label for="phonenumber" class="form-label fs-14 primary-color">Price</label>
                                        <div class="input-group ">
                                            <input type="text" class="form-control rounded-3  border  py-2  " placeholder="Price" id="Price"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 align-items-end">
                                        <button type="submit" class="btn bg-primary-color  w-100 btn text-white rounded-2 gap-2">
                        <span><svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                   xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6018 17L21.6018 21" stroke="#F8F8F8" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round" />
                            <path
                                    d="M19.6018 11C19.6018 6.58172 16.0201 3 11.6018 3C7.18353 3 3.60181 6.58172 3.60181 11C3.60181 15.4183 7.18353 19 11.6018 19C16.0201 19 19.6018 15.4183 19.6018 11Z"
                                    stroke="#F8F8F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </span>
                                            <span>Find A Car</span>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{--Who We Are--}}
<div class="container   py-lg-5 py-3 ">
    <div class="row  justify-content-lg-between   justify-content-center  gap-md-0 gap-3">
        <div class="col-lg-6 col-md-4 d-flex justify-content-center">
            <div
                    class=" img-container bg-img  w-100 rounded-4  position-relative d-flex justify-content-center align-items-start overflow-hidden"
                    data-aos="zoom-in" data-aos-duration="2500">
                <img class="w-100 h-100 object-fit-cover rounded-4" src="{{asset($whoWeAre->image ?? setting('logo'))}}">
            </div>
        </div>
        <div class="col-lg-5 col-md-6 col-12" data-aos="fade-up" data-aos-duration="1500">
            <h2 class="lh-base fs-32 fw-bold mb-0">
                {{ __('front.who_we_are') }}
            </h2>

            @php
                $descriptions = $whoWeAre ? explode("\n", $whoWeAre->trans('desc')) : [];
            @endphp

            @foreach($descriptions as $desc)
            <p class="text-secondary py-2 fs-18" style="max-width: 90%;">{{ $desc }}</p>
            @endforeach

            <div class="w-100 py-2 " data-aos="fade-up" data-aos-duration="2500" data-aos-delay="500">
                <a class="text-white px-5 py-2  rounded-2 btn bg-primary-color fw-bold" href="aboutUs.html">
                    Learn More
                </a>
            </div>
        </div>


    </div>

</div>

{{--Find A Car--}}
@include('Client.find-car')

{{--Categories--}}
<div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row    py-2 align-items-center gy-3 justify-content-between">
        <div class="col-md-8 col-sm-7   overflow-hidden ">
            <h2 class="fw-semibold">{{ __('front.advertisement_categories') }} </h2>

        </div>
        <div class="col-md-3 d-flex justify-content-end">
            <a class="bg-transparent  py-2   rounded-2  text-black d-flex gap-3" href="{{route('client.all-categories')}}">
                <span class="fs-18">{{ __('front.all_categories') }}</span>
                <span class="">
            <i class="fa-solid fa-chevron-right arrow fs-12"></i>
          </span>
            </a>
        </div>
    </div>

    <div class="row py-5  slider-adv overflow-hidden">
        @foreach($categories as $category)
            <div class="col-5ths">
                <div class="rounded-3 overflow-hidden bg-linear-gradient">
                    <div class="d-flex align-items-center justify-content-center img-card overflow-hidden">
                        <img src="{{asset($category->image)}}">
                    </div>
                    <h3 class="text-center py-2 text-white">{{$category->trans('title')}}</h3>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{--Cars--}}
<div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row    py-2 align-items-center gy-3 justify-content-between">
        <div class="col-md-8 col-sm-7   overflow-hidden ">
            <h2 class="fw-semibold">{{ __('front.cars') }}</h2>

        </div>
        <div class="col-md-3 d-flex justify-content-end">
            <a class="bg-transparent  py-2   rounded-2  text-black d-flex gap-3" href="{{ route('client.ads', ['slug' => 'cars']) }}">
                <span class="fs-18">{{ __('front.all_cars') }}</span>
                <span class="">
            <i class="fa-solid fa-chevron-right arrow fs-12"></i>
          </span>
            </a>
        </div>
    </div>
    <div class="row  gap-3 py-2   justify-content-sm-between   justify-content-center align-items-md-center gy-3">
        <div class="col-12">
            <ul class="nav nav-pills products gap-2" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-pill" data-bs-toggle="pill" data-bs-target="#all-cars">{{ __('front.all_cars') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill" data-bs-toggle="pill" data-bs-target="#new-cars">{{ __('front.new_cars') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill" data-bs-toggle="pill" data-bs-target="#used-cars">{{ __('front.used_cars') }}</button>
                </li>
            </ul>

        </div>
        <div class="tab-content py-2">
            <!-- All Cars -->
            <div class="tab-pane fade show active" id="all-cars">
                <div class="row gy-4">
                    @foreach($cars as $car)
                        <div class="col-lg-4 col-md-4 col-sm-6 ">
                            @include('Client.partials.car-card', ['item' => $car])
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- New Cars -->
            <div class="tab-pane fade" id="new-cars">
                <div class="row gy-4">
                    @foreach($cars->where('is_new', 1) as $car)
                        <div class="col-lg-4 col-md-4 col-sm-6 ">
                            @include('Client.partials.car-card', ['item' => $car])
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Used Cars -->
            <div class="tab-pane fade" id="used-cars">
                <div class="row gy-4">
                    @foreach($cars->where('is_new', 0) as $car)
                        <div class="col-lg-4 col-md-4 col-sm-6 ">
                            @include('Client.partials.car-card', ['item' => $car])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</div>

{{--Brands--}}
<div class="container  py-lg-5 py-3 overflow-hidden position-relative">
    <div class="row py-2">
        <div class="col-12 d-flex justify-content-between">
            <h3 class="fs-32 fw-semibold mb-3"> {{ __('front.top_car_brands') }}</h3>
            <!-- <a class="text-secondary fw-semibold" href="brands.html">See all</a> -->
        </div>
    </div>
    <div class="row   brands regular py-5 ">
        @foreach($brands as $brand)
            <div class="">
                <div class=" overflow-hidden">
                    <div class=" d-flex align-items-center justify-content-center img-slider overflow-hidden">
                        <img src="{{asset($brand->image)}}">
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

{{--Why Choose Us--}}
<div class="py-lg-5 py-3 text-white mb-5" style="background-image: url({{asset('assets/imgs/home/blue-card.png')}});">
    <div class="container  py-lg-5 py-3 ">
        <div class="row ">
            <div class="col-lg-9 col-md-10 col-11">
                <h3 class="lh-base fw-semibold h4-home">{{ __('front.why_choose_us') }}</h3>
                <p class="lh-base fs-18">
                    {{ __('front.who_we_are_desc') }}
                </p>
                <ul class="package px-0 row pt-4 gy-3">
                    @foreach($whyChooseUs as $item)
                        <li class="py-1  col-sm-6">
                            <div class="d-flex gap-2">
                                <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                                          stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.75 12L10.58 14.83L16.25 9.17004" stroke="white" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                  </svg>
                                </span>
                                <span class="px-0 fw-bold">{{$item->trans('title')}}</span>
                            </div>
                            <p>{{$item->trans('desc')}}</p>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

{{--Services--}}
<div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row    py-2 align-items-center gy-3 justify-content-between">
        <div class="col-md-8 col-sm-7 overflow-hidden">
            <h2 class="fw-semibold">{{ __('front.services') }}</h2>
            <p class="text-secondary" data-aos="fade-up" data-aos-duration="1500">
                {{ __('front.services_description') }}
            </p>
        </div>

    </div>

    <div class="row py-5 slider-services overflow-hidden">

        @foreach($services as $service)
            <div class="col-lg-4 col-md-4 col-sm-6 ">
                <div class="img-card flex-column p-3 d-flex align-items-start shadow-sm rounded-4 h-auto gap-2  bg-white">
                    <div class="overflow-hidden p-1 rounded-2 bg-Secondary-color" style="height: 40px;width: 40px;">
                        <img class="w-100" src="{{$service->image}}">
                    </div>
                    <div class="">
                        <h5 class="fs-18  mb-0 fw-bold lh-base">
                            {{$service->trans('title')}}
                        </h5>
                        <p class="mb-0 text-black-50 lh-base fw-medium py-3">
                            {{$service->trans('desc')}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{--Spare Parts--}}
<div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row py-2 align-items-center gy-3 justify-content-between">
        <div class="col-md-8 col-sm-7 overflow-hidden">
            <h2 class="fw-semibold">{{ __('front.spare_parts') }}</h2>
        </div>

        <div class="col-md-3 d-flex justify-content-end">
            <a class="bg-transparent py-2 rounded-2 text-black d-flex gap-3" href="{{ route('client.ads', ['slug' => 'spare-parts']) }}">
                <span class="fs-18">{{ __('front.all_spare_parts') }}</span>
                <span>
                <i class="fa-solid fa-chevron-right arrow fs-12"></i>
            </span>
            </a>
        </div>
    </div>

    <div class="row py-5  slider-main overflow-hidden">
        @foreach($spareParts as $sparePart)
            <div class="col-lg-4 col-md-4 col-sm-6 ">
                @include('Client.partials.spare-part-card', ['item' => $sparePart])
            </div>
        @endforeach
    </div>
  </div>

{{--Accessories--}}
<div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row py-2 align-items-center gy-3 justify-content-between">
        <div class="col-md-8 col-sm-7 overflow-hidden">
            <h2 class="fw-semibold">
                {{ __('front.accessories') }}
            </h2>
        </div>

        <div class="col-md-3 d-flex justify-content-end">
            <a class="bg-transparent py-2 rounded-2 text-black d-flex gap-3" href="{{ route('client.ads', ['slug' => 'accessories']) }}">
            <span class="fs-18">
                {{ __('front.all_accessories') }}
            </span>
                <span>
                <i class="fa-solid fa-chevron-right arrow fs-12"></i>
            </span>
            </a>
        </div>
    </div>


    <div class="row py-5  slider-main overflow-hidden">
        @foreach($accessories as $accessory)
            <div class="col-lg-4 col-md-4 col-sm-6 ">
                @include('Client.partials.accessory-card', ['item' => $accessory])
            </div>
        @endforeach
    </div>
  </div>

{{--Plates--}}
<div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row py-2 align-items-center gy-3 justify-content-between">
        <div class="col-md-8 col-sm-7 overflow-hidden">
            <h2 class="fw-semibold">
                {{ __('front.car_plates') }}
            </h2>
        </div>

        <div class="col-md-3 d-flex justify-content-end">
            <a class="bg-transparent py-2 rounded-2 text-black d-flex gap-3" href="{{ route('client.ads', ['slug' => 'plates']) }}">
            <span class="fs-18">
                {{ __('front.all_car_plates') }}
            </span>
                <span>
                <i class="fa-solid fa-chevron-right arrow fs-12"></i>
            </span>
            </a>
        </div>
    </div>

    <div class="row py-5  slider-main overflow-hidden">
        @foreach($plates as $plate)
            <div class="col-lg-4 col-md-4 col-sm-6 ">
                @include('Client.partials.plate-card', ['item' => $plate])
            </div>
        @endforeach
    </div>
  </div>

{{--Why Customers Trust Us--}}
<div class="container-fluid py-lg-5 py-3 overflow-hidden">
    <div class="row py-4  justify-content-center">
        <div class="col-lg-10 overflow-hidden">
            <h3 class="fw-semibold text-center fs-32" data-aos="zoom-in-up" data-aos-duration="1500">
                {{ __('front.trust_title') }}
            </h3>
            <p class="lh-base text-secondary py-lg-4 py-2 text-center" data-aos="fade-up" data-aos-duration="1500">
                {{ __('front.trust_description') }}
            </p>
        </div>
      <div class="col-12  position-relative  bg-primary-color ">
        <div class="position-absolute layer top-0 bottom-0 start-0 end-0" style="z-index: unset;"></div>
        <div class="row justify-content-center py-5 ">
          <div class="col-11 overflow-hidden">
            <div class="row    slider-scoop   py-5">
                @foreach($WhyCustomersTrustUs as $item)
                    <div class=" col-md-4 col-sm-6 ">
                        <div class="card bg-secondary border-0 rounded-3 position-relative overflow-hidden">
                            <div class="img-card  d-flex align-items-center justify-content-center rounded-0 overflow-hidden ">
                                <img src="{{$item->image}}" class="rounded-1 w-100 h-100 object-fit-cover">
                            </div>
                            <div
                                    class="card-body position-absolute start-0 end-0 bottom-0 w-100  text-white layer top-0 d-flex align-items-end">
                                <div class="">
                                    <h3 class="fw-bold  fs-18 mb-0 text-white ">{{$item->trans('title')}}</h3>
                                    <p class="py-2">{{$item->trans('desc')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>





  </div>

<div class="container-fluid  footer-banner overflow-hidden">
    <div class="row   align-items-center  ">
      <div
        class="col-12 d-flex  header-div services px-0 justify-content-center overflow-hidden align-items-center position-relative">
        <img class=" w-100 h-100 object-fit-cover" src="{{asset('assets/imgs/home/about-cover.jpg')}}" alt="Contact Banner"
          width="1920" height="600" loading="lazy">
        <div class=" position-absolute layer  top-0 bottom-0 end-0 start-0 px-lg-5 px-2 d-flex align-items-center ">
          <div class="row  gap-lg-4 gap-2">
            <div class="col-lg-8">
                <h3 class="text-white fw-semibold py-lg-3 py-2" data-aos="fade-up" data-aos-duration="1500">
                    {{ __('front.our_commitment') }}
                </h3>
                <p class="text-white" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1000">
                    {{ __('front.our_commitment_description') }}
                </p>
            </div>

          </div>
        </div>


      </div>



    </div>

  </div>

<div id="footer">
</div>

@endsection

