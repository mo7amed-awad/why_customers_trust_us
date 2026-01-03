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
<div class="container  section-top  position-relative" id="home">

    <div class="row ">

        <div id="carouselExampleDark" class="carousel carousel-dark slide p-0">
            <div class="carousel-inner position-relative rounded-3" >
                <div class="layer position-absolute top-0 end-0 bottom-0 start-0">
                </div>

                <div class="carousel-item active" data-bs-interval="10000">
                    <div class="img-slider d-flex align-items-center justify-content-center">
                        <img src="{{asset('assets/imgs/home/slider.png')}}" class="d-block w-100 h-100 object-fit-cover" alt="...">
                    </div>
                    <div
                            class="carousel-caption text-white d-md-block h-100 top-0 bottom-0 d-flex justify-content-center align-items-center">
                        <div class="container h-100">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="col-lg-8">
                                    <h4 class="h4-home py-2 fw-semibold  text-white fw-bold">
                                        المنصة الشاملة للسيارات
                                    </h4>
                                    <p class="text-white py-2" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">
                                        كل خدمات السيارت في مكان واحد
                                    </p>
                                </div>
                                <div class="col-md-3 col-sm-6 align-items-end">
                                    <button type="submit" class="btn bg-white bg-opacity-25 py-2 px-5 btn text-white rounded-pill gap-2">
                        <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19 17.59L17.59 19L7 8.41V15H5V5H15V7H8.41L19 17.59Z" fill="white"/>
</svg>

                        </span>
                                        <span>Find A Car</span>
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="carousel-item " >
                    <div class="img-slider d-flex align-items-center justify-content-center">
                        <img src="{{asset('assets/imgs/home/slider.png')}}" class="d-block w-100 h-100 object-fit-cover" alt="...">
                    </div>
                    <div
                            class="carousel-caption text-white d-md-block h-100 top-0 bottom-0 d-flex justify-content-center align-items-center">
                        <div class="container h-100">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="col-lg-8">
                                    <h4 class="h4-home py-2 fw-semibold  text-white fw-bold">
                                        المنصة الشاملة للسيارات
                                    </h4>
                                    <p class="text-white py-2" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">
                                        كل خدمات السيارت في مكان واحد
                                    </p>
                                </div>
                                <div class="col-md-3 col-sm-6 align-items-end">
                                    <button type="submit" class="btn bg-white bg-opacity-25 py-2 px-5 btn text-white rounded-pill gap-2">
                        <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19 17.59L17.59 19L7 8.41V15H5V5H15V7H8.41L19 17.59Z" fill="white"/>
</svg>

                        </span>
                                        <span>Find A Car</span>
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <i class="fa-solid fa-circle-chevron-left fs-2"></i>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <i class="fa-solid fa-circle-chevron-right fs-2"></i>
            </button>
        </div>
    </div>
</div>

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
            <a class="bg-transparent  py-2   rounded-2  text-black d-flex gap-3" href="services.html">
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
                    <button class="nav-link active rounded-pill" data-bs-toggle="pill" data-bs-target="#all-cars">All Cars</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill" data-bs-toggle="pill" data-bs-target="#new-cars">New Cars</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill" data-bs-toggle="pill" data-bs-target="#used-cars">Used Cars</button>
                </li>
            </ul>

        </div>
        <div class="tab-content py-2">
            <!-- All Cars -->
            <div class="tab-pane fade show active" id="all-cars">
                <div class="row gy-4">
                    @foreach($cars as $car)
                        @include('Client.partials.car-card', ['car' => $car])
                    @endforeach
                </div>
            </div>

            <!-- New Cars -->
            <div class="tab-pane fade" id="new-cars">
                <div class="row gy-4">
                    @foreach($cars->where('is_new', 1) as $car)
                        @include('Client.partials.car-card', ['car' => $car])
                    @endforeach
                </div>
            </div>

            <!-- Used Cars -->
            <div class="tab-pane fade" id="used-cars">
                <div class="row gy-4">
                    @foreach($cars->where('is_new', 0) as $car)
                        @include('Client.partials.car-card', ['car' => $car])
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
        <div class="col-md-8 col-sm-7   overflow-hidden ">
            <h2 class="fw-semibold">الخدمات</h2>
            <p class="text-secondary" data-aos="fade-up" data-aos-duration="1500">
                Explore our curated selection of the most popular and trusted cars, chosen to match your style, budget, and
                driving needs.
            </p>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
            <a class="bg-transparent  py-2  rounded-2  text-black d-flex gap-3" href="services.html">
                <span class="fs-18">جميع اقسام</span>
                <span class="">
            <i class="fa-solid fa-chevron-right arrow fs-12"></i>
          </span>
            </a>
        </div>
    </div>

    <div class="row py-5 slider-services overflow-hidden">

        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="img-card flex-column p-3 d-flex align-items-start shadow-sm rounded-4 h-auto gap-2  bg-white">
                <div class="overflow-hidden p-1 rounded-2 bg-Secondary-color" style="height: 40px;width: 40px;">
                    <img class="w-100" src="assets/imgs/home/logo.png">
                </div>
                <div class="">
                    <h5 class="fs-18  mb-0 fw-bold lh-base">
                        الصيانة والإصلاح
                    </h5>
                    <p class="mb-0 text-black-50 lh-base fw-medium py-3">
                        ننفّذ مشاريع البناء بكفاءة عالية باستخدام أدوات حديثة وخبرات قوية لضمان جودة تنفيذ تفوق التوقعات.
                    </p>
                    <a class=" primary-color d-flex align-items-center gap-2"
                       href="detailsPage.html"><span>التفاصيل</span><span><i
                                    class="fa-solid fa-arrow-right arrow"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="img-card flex-column p-3 d-flex align-items-start shadow-sm rounded-4 h-auto gap-2  bg-white">
                <div class="overflow-hidden p-1 rounded-2 bg-Secondary-color" style="height: 40px;width: 40px;">
                    <img class="w-100" src="assets/imgs/home/logo.png">
                </div>
                <div class="">
                    <h5 class="fs-18  mb-0 fw-bold lh-base">
                        الصيانة والإصلاح
                    </h5>
                    <p class="mb-0 text-black-50 lh-base fw-medium py-3">
                        ننفّذ مشاريع البناء بكفاءة عالية باستخدام أدوات حديثة وخبرات قوية لضمان جودة تنفيذ تفوق التوقعات.
                    </p>
                    <a class=" primary-color d-flex align-items-center gap-2"
                       href="detailsPage.html"><span>التفاصيل</span><span><i
                                    class="fa-solid fa-arrow-right arrow"></i></span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row    py-2 align-items-center gy-3 justify-content-between">
        <div class="col-md-8 col-sm-7   overflow-hidden ">
            <h2 class="fw-semibold">Top Cars for You</h2>
            <p class="text-secondary" data-aos="fade-up" data-aos-duration="1500">
                Explore our curated selection of the most popular and trusted cars, chosen to match your style, budget, and
                driving needs.
            </p>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
            <a class="bg-transparent  py-2 px-5 border-2  rounded-2 btn primary-color border-color fw-bold"
               href="services.html">View All</a>
        </div>
    </div>

    <div class="row py-5  slider-main overflow-hidden">

        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gy-3">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M12.6667 2.66699H3.33333C2.59695 2.66699 2 3.26395 2 4.00033V13.3337C2 14.07 2.59695 14.667 3.33333 14.667H12.6667C13.403 14.667 14 14.07 14 13.3337V4.00033C14 3.26395 13.403 2.66699 12.6667 2.66699Z"
                                        stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.667 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M5.33301 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M2 6.66699H14" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M10.5 14H0.5C0.225 14 0 14.225 0 14.5V15.5C0 15.775 0.225 16 0.5 16H10.5C10.775 16 11 15.775 11 15.5V14.5C11 14.225 10.775 14 10.5 14ZM15.4125 3.35313L12.8813 0.821875C12.6875 0.628125 12.3688 0.628125 12.175 0.821875L11.8219 1.175C11.6281 1.36875 11.6281 1.6875 11.8219 1.88125L13 3.05938V5C13 5.87813 13.6531 6.60313 14.5 6.725V11.75C14.5 12.1625 14.1625 12.5 13.75 12.5C13.3375 12.5 13 12.1625 13 11.75V10.75C13 9.23125 11.7688 8 10.25 8H10V2C10 0.896875 9.10312 0 8 0H3C1.89688 0 1 0.896875 1 2V13H10V9.5H10.25C10.9406 9.5 11.5 10.0594 11.5 10.75V11.6187C11.5 12.7969 12.3438 13.8688 13.5156 13.9906C14.8594 14.125 16 13.0688 16 11.75V4.76875C16 4.2375 15.7875 3.72813 15.4125 3.35313ZM8 6H3V2H8V6Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.9221 12.0745L12.039 3.1856C11.901 2.86949 11.6001 2.66699 11.269 2.66699H8.55818L8.62624 3.31033C8.64013 3.44144 8.53707 3.55588 8.40513 3.55588H7.59513C7.46318 3.55588 7.36013 3.44144 7.37402 3.31033L7.44207 2.66699H4.73124C4.39985 2.66699 4.09902 2.86949 3.96096 3.1856L0.0779043 12.0745C-0.17904 12.6631 0.23096 13.3337 0.84846 13.3337H6.31624L6.60263 10.6203C6.62652 10.3942 6.81707 10.2225 7.04457 10.2225H8.95568C9.18318 10.2225 9.37374 10.3942 9.39763 10.6203L9.68402 13.3337H15.1518C15.7693 13.3337 16.1793 12.6631 15.9221 12.0745ZM7.23346 4.64366C7.23923 4.58905 7.26501 4.5385 7.30584 4.50177C7.34667 4.46505 7.39965 4.44474 7.45457 4.44477H8.54596C8.65957 4.44477 8.75513 4.5306 8.76707 4.64366L8.89485 5.85421C8.91568 6.05116 8.76124 6.22255 8.56346 6.22255H7.43735C7.23929 6.22255 7.08513 6.05116 7.10596 5.85421L7.23346 4.64366ZM8.76791 9.33366H7.23207C6.96818 9.33366 6.76235 9.10505 6.79013 8.84255L6.93096 7.50921C6.95485 7.2831 7.1454 7.11144 7.3729 7.11144H8.62707C8.85457 7.11144 9.04513 7.2831 9.06902 7.50921L9.20985 8.84255C9.23763 9.10505 9.03179 9.33366 8.76791 9.33366Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.2316 9.86546L13.9004 9.09671C14.0348 8.37171 14.0348 7.62796 13.9004 6.90296L15.2316 6.13421C15.3848 6.04671 15.4535 5.86546 15.4035 5.69671C15.0566 4.58421 14.466 3.57796 13.6941 2.74046C13.5754 2.61233 13.3816 2.58108 13.2316 2.66858L11.9004 3.43733C11.341 2.95608 10.6973 2.58421 10.0004 2.34046V0.806084C10.0004 0.631084 9.87851 0.477959 9.70664 0.440459C8.55976 0.184209 7.38476 0.196709 6.29414 0.440459C6.12226 0.477959 6.00039 0.631084 6.00039 0.806084V2.34358C5.30664 2.59046 4.66289 2.96233 4.10039 3.44046L2.77226 2.67171C2.61914 2.58421 2.42851 2.61233 2.30976 2.74358C1.53789 3.57796 0.947262 4.58421 0.600387 5.69983C0.547262 5.86858 0.619137 6.04983 0.772262 6.13733L2.10351 6.90608C1.96914 7.63108 1.96914 8.37483 2.10351 9.09983L0.772262 9.86858C0.619137 9.95608 0.550387 10.1373 0.600387 10.3061C0.947262 11.4186 1.53789 12.4248 2.30976 13.2623C2.42851 13.3905 2.62226 13.4217 2.77226 13.3342L4.10351 12.5655C4.66289 13.0467 5.30664 13.4186 6.00351 13.6623V15.1998C6.00351 15.3748 6.12539 15.528 6.29726 15.5655C7.44414 15.8217 8.61914 15.8092 9.70976 15.5655C9.88164 15.528 10.0035 15.3748 10.0035 15.1998V13.6623C10.6973 13.4155 11.341 13.0436 11.9035 12.5655L13.2348 13.3342C13.3879 13.4217 13.5785 13.3936 13.6973 13.2623C14.4691 12.428 15.0598 11.4217 15.4066 10.3061C15.4535 10.1342 15.3848 9.95296 15.2316 9.86546ZM8.00039 10.4998C6.62226 10.4998 5.50039 9.37796 5.50039 7.99983C5.50039 6.62171 6.62226 5.49983 8.00039 5.49983C9.37851 5.49983 10.5004 6.62171 10.5004 7.99983C10.5004 9.37796 9.37851 10.4998 8.00039 10.4998Z"
                                        fill="#AFAD9C" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 col-12">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gy-3">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M12.6667 2.66699H3.33333C2.59695 2.66699 2 3.26395 2 4.00033V13.3337C2 14.07 2.59695 14.667 3.33333 14.667H12.6667C13.403 14.667 14 14.07 14 13.3337V4.00033C14 3.26395 13.403 2.66699 12.6667 2.66699Z"
                                        stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.667 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M5.33301 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M2 6.66699H14" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M10.5 14H0.5C0.225 14 0 14.225 0 14.5V15.5C0 15.775 0.225 16 0.5 16H10.5C10.775 16 11 15.775 11 15.5V14.5C11 14.225 10.775 14 10.5 14ZM15.4125 3.35313L12.8813 0.821875C12.6875 0.628125 12.3688 0.628125 12.175 0.821875L11.8219 1.175C11.6281 1.36875 11.6281 1.6875 11.8219 1.88125L13 3.05938V5C13 5.87813 13.6531 6.60313 14.5 6.725V11.75C14.5 12.1625 14.1625 12.5 13.75 12.5C13.3375 12.5 13 12.1625 13 11.75V10.75C13 9.23125 11.7688 8 10.25 8H10V2C10 0.896875 9.10312 0 8 0H3C1.89688 0 1 0.896875 1 2V13H10V9.5H10.25C10.9406 9.5 11.5 10.0594 11.5 10.75V11.6187C11.5 12.7969 12.3438 13.8688 13.5156 13.9906C14.8594 14.125 16 13.0688 16 11.75V4.76875C16 4.2375 15.7875 3.72813 15.4125 3.35313ZM8 6H3V2H8V6Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.9221 12.0745L12.039 3.1856C11.901 2.86949 11.6001 2.66699 11.269 2.66699H8.55818L8.62624 3.31033C8.64013 3.44144 8.53707 3.55588 8.40513 3.55588H7.59513C7.46318 3.55588 7.36013 3.44144 7.37402 3.31033L7.44207 2.66699H4.73124C4.39985 2.66699 4.09902 2.86949 3.96096 3.1856L0.0779043 12.0745C-0.17904 12.6631 0.23096 13.3337 0.84846 13.3337H6.31624L6.60263 10.6203C6.62652 10.3942 6.81707 10.2225 7.04457 10.2225H8.95568C9.18318 10.2225 9.37374 10.3942 9.39763 10.6203L9.68402 13.3337H15.1518C15.7693 13.3337 16.1793 12.6631 15.9221 12.0745ZM7.23346 4.64366C7.23923 4.58905 7.26501 4.5385 7.30584 4.50177C7.34667 4.46505 7.39965 4.44474 7.45457 4.44477H8.54596C8.65957 4.44477 8.75513 4.5306 8.76707 4.64366L8.89485 5.85421C8.91568 6.05116 8.76124 6.22255 8.56346 6.22255H7.43735C7.23929 6.22255 7.08513 6.05116 7.10596 5.85421L7.23346 4.64366ZM8.76791 9.33366H7.23207C6.96818 9.33366 6.76235 9.10505 6.79013 8.84255L6.93096 7.50921C6.95485 7.2831 7.1454 7.11144 7.3729 7.11144H8.62707C8.85457 7.11144 9.04513 7.2831 9.06902 7.50921L9.20985 8.84255C9.23763 9.10505 9.03179 9.33366 8.76791 9.33366Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.2316 9.86546L13.9004 9.09671C14.0348 8.37171 14.0348 7.62796 13.9004 6.90296L15.2316 6.13421C15.3848 6.04671 15.4535 5.86546 15.4035 5.69671C15.0566 4.58421 14.466 3.57796 13.6941 2.74046C13.5754 2.61233 13.3816 2.58108 13.2316 2.66858L11.9004 3.43733C11.341 2.95608 10.6973 2.58421 10.0004 2.34046V0.806084C10.0004 0.631084 9.87851 0.477959 9.70664 0.440459C8.55976 0.184209 7.38476 0.196709 6.29414 0.440459C6.12226 0.477959 6.00039 0.631084 6.00039 0.806084V2.34358C5.30664 2.59046 4.66289 2.96233 4.10039 3.44046L2.77226 2.67171C2.61914 2.58421 2.42851 2.61233 2.30976 2.74358C1.53789 3.57796 0.947262 4.58421 0.600387 5.69983C0.547262 5.86858 0.619137 6.04983 0.772262 6.13733L2.10351 6.90608C1.96914 7.63108 1.96914 8.37483 2.10351 9.09983L0.772262 9.86858C0.619137 9.95608 0.550387 10.1373 0.600387 10.3061C0.947262 11.4186 1.53789 12.4248 2.30976 13.2623C2.42851 13.3905 2.62226 13.4217 2.77226 13.3342L4.10351 12.5655C4.66289 13.0467 5.30664 13.4186 6.00351 13.6623V15.1998C6.00351 15.3748 6.12539 15.528 6.29726 15.5655C7.44414 15.8217 8.61914 15.8092 9.70976 15.5655C9.88164 15.528 10.0035 15.3748 10.0035 15.1998V13.6623C10.6973 13.4155 11.341 13.0436 11.9035 12.5655L13.2348 13.3342C13.3879 13.4217 13.5785 13.3936 13.6973 13.2623C14.4691 12.428 15.0598 11.4217 15.4066 10.3061C15.4535 10.1342 15.3848 9.95296 15.2316 9.86546ZM8.00039 10.4998C6.62226 10.4998 5.50039 9.37796 5.50039 7.99983C5.50039 6.62171 6.62226 5.49983 8.00039 5.49983C9.37851 5.49983 10.5004 6.62171 10.5004 7.99983C10.5004 9.37796 9.37851 10.4998 8.00039 10.4998Z"
                                        fill="#AFAD9C" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 col-12">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gy-3">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M12.6667 2.66699H3.33333C2.59695 2.66699 2 3.26395 2 4.00033V13.3337C2 14.07 2.59695 14.667 3.33333 14.667H12.6667C13.403 14.667 14 14.07 14 13.3337V4.00033C14 3.26395 13.403 2.66699 12.6667 2.66699Z"
                                        stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.667 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M5.33301 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M2 6.66699H14" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M10.5 14H0.5C0.225 14 0 14.225 0 14.5V15.5C0 15.775 0.225 16 0.5 16H10.5C10.775 16 11 15.775 11 15.5V14.5C11 14.225 10.775 14 10.5 14ZM15.4125 3.35313L12.8813 0.821875C12.6875 0.628125 12.3688 0.628125 12.175 0.821875L11.8219 1.175C11.6281 1.36875 11.6281 1.6875 11.8219 1.88125L13 3.05938V5C13 5.87813 13.6531 6.60313 14.5 6.725V11.75C14.5 12.1625 14.1625 12.5 13.75 12.5C13.3375 12.5 13 12.1625 13 11.75V10.75C13 9.23125 11.7688 8 10.25 8H10V2C10 0.896875 9.10312 0 8 0H3C1.89688 0 1 0.896875 1 2V13H10V9.5H10.25C10.9406 9.5 11.5 10.0594 11.5 10.75V11.6187C11.5 12.7969 12.3438 13.8688 13.5156 13.9906C14.8594 14.125 16 13.0688 16 11.75V4.76875C16 4.2375 15.7875 3.72813 15.4125 3.35313ZM8 6H3V2H8V6Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.9221 12.0745L12.039 3.1856C11.901 2.86949 11.6001 2.66699 11.269 2.66699H8.55818L8.62624 3.31033C8.64013 3.44144 8.53707 3.55588 8.40513 3.55588H7.59513C7.46318 3.55588 7.36013 3.44144 7.37402 3.31033L7.44207 2.66699H4.73124C4.39985 2.66699 4.09902 2.86949 3.96096 3.1856L0.0779043 12.0745C-0.17904 12.6631 0.23096 13.3337 0.84846 13.3337H6.31624L6.60263 10.6203C6.62652 10.3942 6.81707 10.2225 7.04457 10.2225H8.95568C9.18318 10.2225 9.37374 10.3942 9.39763 10.6203L9.68402 13.3337H15.1518C15.7693 13.3337 16.1793 12.6631 15.9221 12.0745ZM7.23346 4.64366C7.23923 4.58905 7.26501 4.5385 7.30584 4.50177C7.34667 4.46505 7.39965 4.44474 7.45457 4.44477H8.54596C8.65957 4.44477 8.75513 4.5306 8.76707 4.64366L8.89485 5.85421C8.91568 6.05116 8.76124 6.22255 8.56346 6.22255H7.43735C7.23929 6.22255 7.08513 6.05116 7.10596 5.85421L7.23346 4.64366ZM8.76791 9.33366H7.23207C6.96818 9.33366 6.76235 9.10505 6.79013 8.84255L6.93096 7.50921C6.95485 7.2831 7.1454 7.11144 7.3729 7.11144H8.62707C8.85457 7.11144 9.04513 7.2831 9.06902 7.50921L9.20985 8.84255C9.23763 9.10505 9.03179 9.33366 8.76791 9.33366Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.2316 9.86546L13.9004 9.09671C14.0348 8.37171 14.0348 7.62796 13.9004 6.90296L15.2316 6.13421C15.3848 6.04671 15.4535 5.86546 15.4035 5.69671C15.0566 4.58421 14.466 3.57796 13.6941 2.74046C13.5754 2.61233 13.3816 2.58108 13.2316 2.66858L11.9004 3.43733C11.341 2.95608 10.6973 2.58421 10.0004 2.34046V0.806084C10.0004 0.631084 9.87851 0.477959 9.70664 0.440459C8.55976 0.184209 7.38476 0.196709 6.29414 0.440459C6.12226 0.477959 6.00039 0.631084 6.00039 0.806084V2.34358C5.30664 2.59046 4.66289 2.96233 4.10039 3.44046L2.77226 2.67171C2.61914 2.58421 2.42851 2.61233 2.30976 2.74358C1.53789 3.57796 0.947262 4.58421 0.600387 5.69983C0.547262 5.86858 0.619137 6.04983 0.772262 6.13733L2.10351 6.90608C1.96914 7.63108 1.96914 8.37483 2.10351 9.09983L0.772262 9.86858C0.619137 9.95608 0.550387 10.1373 0.600387 10.3061C0.947262 11.4186 1.53789 12.4248 2.30976 13.2623C2.42851 13.3905 2.62226 13.4217 2.77226 13.3342L4.10351 12.5655C4.66289 13.0467 5.30664 13.4186 6.00351 13.6623V15.1998C6.00351 15.3748 6.12539 15.528 6.29726 15.5655C7.44414 15.8217 8.61914 15.8092 9.70976 15.5655C9.88164 15.528 10.0035 15.3748 10.0035 15.1998V13.6623C10.6973 13.4155 11.341 13.0436 11.9035 12.5655L13.2348 13.3342C13.3879 13.4217 13.5785 13.3936 13.6973 13.2623C14.4691 12.428 15.0598 11.4217 15.4066 10.3061C15.4535 10.1342 15.3848 9.95296 15.2316 9.86546ZM8.00039 10.4998C6.62226 10.4998 5.50039 9.37796 5.50039 7.99983C5.50039 6.62171 6.62226 5.49983 8.00039 5.49983C9.37851 5.49983 10.5004 6.62171 10.5004 7.99983C10.5004 9.37796 9.37851 10.4998 8.00039 10.4998Z"
                                        fill="#AFAD9C" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 col-12">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gy-3">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M12.6667 2.66699H3.33333C2.59695 2.66699 2 3.26395 2 4.00033V13.3337C2 14.07 2.59695 14.667 3.33333 14.667H12.6667C13.403 14.667 14 14.07 14 13.3337V4.00033C14 3.26395 13.403 2.66699 12.6667 2.66699Z"
                                        stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.667 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M5.33301 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M2 6.66699H14" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M10.5 14H0.5C0.225 14 0 14.225 0 14.5V15.5C0 15.775 0.225 16 0.5 16H10.5C10.775 16 11 15.775 11 15.5V14.5C11 14.225 10.775 14 10.5 14ZM15.4125 3.35313L12.8813 0.821875C12.6875 0.628125 12.3688 0.628125 12.175 0.821875L11.8219 1.175C11.6281 1.36875 11.6281 1.6875 11.8219 1.88125L13 3.05938V5C13 5.87813 13.6531 6.60313 14.5 6.725V11.75C14.5 12.1625 14.1625 12.5 13.75 12.5C13.3375 12.5 13 12.1625 13 11.75V10.75C13 9.23125 11.7688 8 10.25 8H10V2C10 0.896875 9.10312 0 8 0H3C1.89688 0 1 0.896875 1 2V13H10V9.5H10.25C10.9406 9.5 11.5 10.0594 11.5 10.75V11.6187C11.5 12.7969 12.3438 13.8688 13.5156 13.9906C14.8594 14.125 16 13.0688 16 11.75V4.76875C16 4.2375 15.7875 3.72813 15.4125 3.35313ZM8 6H3V2H8V6Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.9221 12.0745L12.039 3.1856C11.901 2.86949 11.6001 2.66699 11.269 2.66699H8.55818L8.62624 3.31033C8.64013 3.44144 8.53707 3.55588 8.40513 3.55588H7.59513C7.46318 3.55588 7.36013 3.44144 7.37402 3.31033L7.44207 2.66699H4.73124C4.39985 2.66699 4.09902 2.86949 3.96096 3.1856L0.0779043 12.0745C-0.17904 12.6631 0.23096 13.3337 0.84846 13.3337H6.31624L6.60263 10.6203C6.62652 10.3942 6.81707 10.2225 7.04457 10.2225H8.95568C9.18318 10.2225 9.37374 10.3942 9.39763 10.6203L9.68402 13.3337H15.1518C15.7693 13.3337 16.1793 12.6631 15.9221 12.0745ZM7.23346 4.64366C7.23923 4.58905 7.26501 4.5385 7.30584 4.50177C7.34667 4.46505 7.39965 4.44474 7.45457 4.44477H8.54596C8.65957 4.44477 8.75513 4.5306 8.76707 4.64366L8.89485 5.85421C8.91568 6.05116 8.76124 6.22255 8.56346 6.22255H7.43735C7.23929 6.22255 7.08513 6.05116 7.10596 5.85421L7.23346 4.64366ZM8.76791 9.33366H7.23207C6.96818 9.33366 6.76235 9.10505 6.79013 8.84255L6.93096 7.50921C6.95485 7.2831 7.1454 7.11144 7.3729 7.11144H8.62707C8.85457 7.11144 9.04513 7.2831 9.06902 7.50921L9.20985 8.84255C9.23763 9.10505 9.03179 9.33366 8.76791 9.33366Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.2316 9.86546L13.9004 9.09671C14.0348 8.37171 14.0348 7.62796 13.9004 6.90296L15.2316 6.13421C15.3848 6.04671 15.4535 5.86546 15.4035 5.69671C15.0566 4.58421 14.466 3.57796 13.6941 2.74046C13.5754 2.61233 13.3816 2.58108 13.2316 2.66858L11.9004 3.43733C11.341 2.95608 10.6973 2.58421 10.0004 2.34046V0.806084C10.0004 0.631084 9.87851 0.477959 9.70664 0.440459C8.55976 0.184209 7.38476 0.196709 6.29414 0.440459C6.12226 0.477959 6.00039 0.631084 6.00039 0.806084V2.34358C5.30664 2.59046 4.66289 2.96233 4.10039 3.44046L2.77226 2.67171C2.61914 2.58421 2.42851 2.61233 2.30976 2.74358C1.53789 3.57796 0.947262 4.58421 0.600387 5.69983C0.547262 5.86858 0.619137 6.04983 0.772262 6.13733L2.10351 6.90608C1.96914 7.63108 1.96914 8.37483 2.10351 9.09983L0.772262 9.86858C0.619137 9.95608 0.550387 10.1373 0.600387 10.3061C0.947262 11.4186 1.53789 12.4248 2.30976 13.2623C2.42851 13.3905 2.62226 13.4217 2.77226 13.3342L4.10351 12.5655C4.66289 13.0467 5.30664 13.4186 6.00351 13.6623V15.1998C6.00351 15.3748 6.12539 15.528 6.29726 15.5655C7.44414 15.8217 8.61914 15.8092 9.70976 15.5655C9.88164 15.528 10.0035 15.3748 10.0035 15.1998V13.6623C10.6973 13.4155 11.341 13.0436 11.9035 12.5655L13.2348 13.3342C13.3879 13.4217 13.5785 13.3936 13.6973 13.2623C14.4691 12.428 15.0598 11.4217 15.4066 10.3061C15.4535 10.1342 15.3848 9.95296 15.2316 9.86546ZM8.00039 10.4998C6.62226 10.4998 5.50039 9.37796 5.50039 7.99983C5.50039 6.62171 6.62226 5.49983 8.00039 5.49983C9.37851 5.49983 10.5004 6.62171 10.5004 7.99983C10.5004 9.37796 9.37851 10.4998 8.00039 10.4998Z"
                                        fill="#AFAD9C" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 col-12">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gy-3">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M12.6667 2.66699H3.33333C2.59695 2.66699 2 3.26395 2 4.00033V13.3337C2 14.07 2.59695 14.667 3.33333 14.667H12.6667C13.403 14.667 14 14.07 14 13.3337V4.00033C14 3.26395 13.403 2.66699 12.6667 2.66699Z"
                                        stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.667 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M5.33301 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M2 6.66699H14" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M10.5 14H0.5C0.225 14 0 14.225 0 14.5V15.5C0 15.775 0.225 16 0.5 16H10.5C10.775 16 11 15.775 11 15.5V14.5C11 14.225 10.775 14 10.5 14ZM15.4125 3.35313L12.8813 0.821875C12.6875 0.628125 12.3688 0.628125 12.175 0.821875L11.8219 1.175C11.6281 1.36875 11.6281 1.6875 11.8219 1.88125L13 3.05938V5C13 5.87813 13.6531 6.60313 14.5 6.725V11.75C14.5 12.1625 14.1625 12.5 13.75 12.5C13.3375 12.5 13 12.1625 13 11.75V10.75C13 9.23125 11.7688 8 10.25 8H10V2C10 0.896875 9.10312 0 8 0H3C1.89688 0 1 0.896875 1 2V13H10V9.5H10.25C10.9406 9.5 11.5 10.0594 11.5 10.75V11.6187C11.5 12.7969 12.3438 13.8688 13.5156 13.9906C14.8594 14.125 16 13.0688 16 11.75V4.76875C16 4.2375 15.7875 3.72813 15.4125 3.35313ZM8 6H3V2H8V6Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.9221 12.0745L12.039 3.1856C11.901 2.86949 11.6001 2.66699 11.269 2.66699H8.55818L8.62624 3.31033C8.64013 3.44144 8.53707 3.55588 8.40513 3.55588H7.59513C7.46318 3.55588 7.36013 3.44144 7.37402 3.31033L7.44207 2.66699H4.73124C4.39985 2.66699 4.09902 2.86949 3.96096 3.1856L0.0779043 12.0745C-0.17904 12.6631 0.23096 13.3337 0.84846 13.3337H6.31624L6.60263 10.6203C6.62652 10.3942 6.81707 10.2225 7.04457 10.2225H8.95568C9.18318 10.2225 9.37374 10.3942 9.39763 10.6203L9.68402 13.3337H15.1518C15.7693 13.3337 16.1793 12.6631 15.9221 12.0745ZM7.23346 4.64366C7.23923 4.58905 7.26501 4.5385 7.30584 4.50177C7.34667 4.46505 7.39965 4.44474 7.45457 4.44477H8.54596C8.65957 4.44477 8.75513 4.5306 8.76707 4.64366L8.89485 5.85421C8.91568 6.05116 8.76124 6.22255 8.56346 6.22255H7.43735C7.23929 6.22255 7.08513 6.05116 7.10596 5.85421L7.23346 4.64366ZM8.76791 9.33366H7.23207C6.96818 9.33366 6.76235 9.10505 6.79013 8.84255L6.93096 7.50921C6.95485 7.2831 7.1454 7.11144 7.3729 7.11144H8.62707C8.85457 7.11144 9.04513 7.2831 9.06902 7.50921L9.20985 8.84255C9.23763 9.10505 9.03179 9.33366 8.76791 9.33366Z"
                                        fill="#AFAD9C" />
                            </svg>

                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class=" col-6 text-center">
                        <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M15.2316 9.86546L13.9004 9.09671C14.0348 8.37171 14.0348 7.62796 13.9004 6.90296L15.2316 6.13421C15.3848 6.04671 15.4535 5.86546 15.4035 5.69671C15.0566 4.58421 14.466 3.57796 13.6941 2.74046C13.5754 2.61233 13.3816 2.58108 13.2316 2.66858L11.9004 3.43733C11.341 2.95608 10.6973 2.58421 10.0004 2.34046V0.806084C10.0004 0.631084 9.87851 0.477959 9.70664 0.440459C8.55976 0.184209 7.38476 0.196709 6.29414 0.440459C6.12226 0.477959 6.00039 0.631084 6.00039 0.806084V2.34358C5.30664 2.59046 4.66289 2.96233 4.10039 3.44046L2.77226 2.67171C2.61914 2.58421 2.42851 2.61233 2.30976 2.74358C1.53789 3.57796 0.947262 4.58421 0.600387 5.69983C0.547262 5.86858 0.619137 6.04983 0.772262 6.13733L2.10351 6.90608C1.96914 7.63108 1.96914 8.37483 2.10351 9.09983L0.772262 9.86858C0.619137 9.95608 0.550387 10.1373 0.600387 10.3061C0.947262 11.4186 1.53789 12.4248 2.30976 13.2623C2.42851 13.3905 2.62226 13.4217 2.77226 13.3342L4.10351 12.5655C4.66289 13.0467 5.30664 13.4186 6.00351 13.6623V15.1998C6.00351 15.3748 6.12539 15.528 6.29726 15.5655C7.44414 15.8217 8.61914 15.8092 9.70976 15.5655C9.88164 15.528 10.0035 15.3748 10.0035 15.1998V13.6623C10.6973 13.4155 11.341 13.0436 11.9035 12.5655L13.2348 13.3342C13.3879 13.4217 13.5785 13.3936 13.6973 13.2623C14.4691 12.428 15.0598 11.4217 15.4066 10.3061C15.4535 10.1342 15.3848 9.95296 15.2316 9.86546ZM8.00039 10.4998C6.62226 10.4998 5.50039 9.37796 5.50039 7.99983C5.50039 6.62171 6.62226 5.49983 8.00039 5.49983C9.37851 5.49983 10.5004 6.62171 10.5004 7.99983C10.5004 9.37796 9.37851 10.4998 8.00039 10.4998Z"
                                        fill="#AFAD9C" />
                            </svg>
                            <span class="text-black-50  lh-base fs-14"> 2023</span>

                        </h2>

                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2 col-12">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row    py-2 align-items-center gy-3 justify-content-between">
        <div class="col-md-8 col-sm-7   overflow-hidden ">
            <h2 class="fw-semibold">قطع غيار</h2>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
            <a class="bg-transparent  py-2  rounded-2  text-black d-flex gap-3" href="services.html">
                <span class="fs-18">جميع اقسام</span>
                <span class="">
            <i class="fa-solid fa-chevron-right arrow fs-12"></i>
          </span>
            </a>
        </div>
    </div>

    <div class="row py-5  slider-main overflow-hidden">

        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gap-2">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-12 d-flex gap-2 flex-wrap justify-content-between">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12 ">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mb-2 col-12">
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gap-2">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-12 d-flex gap-2 flex-wrap justify-content-between">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12 ">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mb-2 col-12">
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gap-2">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-12 d-flex gap-2 flex-wrap justify-content-between">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12 ">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mb-2 col-12">
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gap-2">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-12 d-flex gap-2 flex-wrap justify-content-between">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12 ">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mb-2 col-12">
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card property-card p-1 ">

                <div
                        class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
                    <div
                            class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between"
                            style="z-index: 1;">
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <h6 class="fs-14 text-white py-1 lh-base px-3  rounded-pill mb-0 bg-primary-color">New
                            </h6>
                            <a href="washList.html" tabindex="-1">
                                <div
                                        class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                        style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                                stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                        <div class=" d-flex gap-2 align-items-center justify-content-between">
                            <div class="">
                                <h6 class="text-white py-1 lh-base  mb-0 ">يبدأ من
                                </h6>
                                <h3 class="fs-24 fw-bold text-white">BHD 28,000.00</h3>
                            </div>

                            <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                  <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                              fill="#FACC15" />
                    </svg>
                  </span>
                                <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                            </div>
                        </div>
                    </div>

                    <img src="assets/imgs/services/1.jpg" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body row gap-2">
                    <div class="col-12">
                        <h5 class="card-title">Modern Family Home</h5>
                    </div>
                    <div class=" col-12 d-flex gap-2 flex-wrap justify-content-between">
              <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12 ">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                2.5L 4-cylinder
              </span>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mb-2 col-12">
                        <a class="btn primary-color d-flex align-items-center gap-2"
                           href="detailsPage.html"><span>التفاصيل</span><span><i
                                        class="fa-solid fa-arrow-right arrow"></i></span></a>
                    </div>

                </div>
            </div>
      </div>
    </div>
  </div>
<div class="container-fluid py-lg-5 py-3 overflow-hidden">
    <div class="row py-4  justify-content-center">
      <div class="col-lg-10 overflow-hidden ">
        <h3 class="fw-semibold  text-center fs-32" data-aos="zoom-in-up" data-aos-duration="1500">
          Why Customers Trust Us
        </h3>
        <p class="lh-base text-secondary py-lg-4 py-2 text-center" data-aos="fade-up" data-aos-duration="1500">
          Experience unmatched convenience, affordability, and reliability with our trusted car rental service & car
          accessories
        </p>
      </div>
      <div class="col-12  position-relative  bg-primary-color ">
        <div class="position-absolute layer top-0 bottom-0 start-0 end-0" style="z-index: unset;"></div>
        <div class="row justify-content-center py-5 ">
          <div class="col-11 overflow-hidden">
            <div class="row    slider-scoop   py-5">
              <div class=" col-md-4 col-sm-6 ">
                <div class="card bg-secondary border-0 rounded-3 position-relative overflow-hidden">
                  <div class="img-card  d-flex align-items-center justify-content-center rounded-0 overflow-hidden ">
                    <img src="assets/imgs/home/about-cover.jpg" class="rounded-1 w-100 h-100 object-fit-cover">
                  </div>
                  <div
                    class="card-body position-absolute start-0 end-0 bottom-0 w-100  text-white layer top-0 d-flex align-items-end">
                    <div class="">
                      <h3 class="fw-bold  fs-18 mb-0 text-white ">Verified & Trusted Listings</h3>
                      <p class="py-2">We work with trusted dealers and private sellers to ensure you see only real,
                        accurate listings.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-md-4 col-sm-6 ">
                <div class="card bg-secondary border-0 rounded-3 position-relative overflow-hidden">
                  <div class="img-card  d-flex align-items-center justify-content-center rounded-0 overflow-hidden ">
                    <img src="assets/imgs/home/about-cover.jpg" class="rounded-1 w-100 h-100 object-fit-cover">
                  </div>
                  <div
                    class="card-body position-absolute start-0 end-0 bottom-0 w-100  text-white layer top-0 d-flex align-items-end">
                    <div class="">
                      <h3 class="fw-bold  fs-18 mb-0 text-white ">Verified & Trusted Listings</h3>
                      <p class="py-2">We work with trusted dealers and private sellers to ensure you see only real,
                        accurate listings.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-md-4 col-sm-6 ">
                <div class="card bg-secondary border-0 rounded-3 position-relative overflow-hidden">
                  <div class="img-card  d-flex align-items-center justify-content-center rounded-0 overflow-hidden ">
                    <img src="assets/imgs/home/about-cover.jpg" class="rounded-1 w-100 h-100 object-fit-cover">
                  </div>
                  <div
                    class="card-body position-absolute start-0 end-0 bottom-0 w-100  text-white layer top-0 d-flex align-items-end">
                    <div class="">
                      <h3 class="fw-bold  fs-18 mb-0 text-white ">Verified & Trusted Listings</h3>
                      <p class="py-2">We work with trusted dealers and private sellers to ensure you see only real,
                        accurate listings.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-md-4 col-sm-6 ">
                <div class="card bg-secondary border-0 rounded-3 position-relative overflow-hidden">
                  <div class="img-card  d-flex align-items-center justify-content-center rounded-0 overflow-hidden ">
                    <img src="assets/imgs/home/about-cover.jpg" class="rounded-1 w-100 h-100 object-fit-cover">
                  </div>
                  <div
                    class="card-body position-absolute start-0 end-0 bottom-0 w-100  text-white layer top-0 d-flex align-items-end">
                    <div class="">
                      <h3 class="fw-bold  fs-18 mb-0 text-white ">Verified & Trusted Listings</h3>
                      <p class="py-2">We work with trusted dealers and private sellers to ensure you see only real,
                        accurate listings.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-md-4 col-sm-6 ">
                <div class="card bg-secondary border-0 rounded-3 position-relative overflow-hidden">
                  <div class="img-card  d-flex align-items-center justify-content-center rounded-0 overflow-hidden ">
                    <img src="assets/imgs/home/about-cover.jpg" class="rounded-1 w-100 h-100 object-fit-cover">
                  </div>
                  <div
                    class="card-body position-absolute start-0 end-0 bottom-0 w-100  text-white layer top-0 d-flex align-items-end">
                    <div class="">
                      <h3 class="fw-bold  fs-18 mb-0 text-white ">Verified & Trusted Listings</h3>
                      <p class="py-2">We work with trusted dealers and private sellers to ensure you see only real,
                        accurate listings.</p>
                    </div>
                  </div>
                </div>
              </div>
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
        <img class=" w-100 h-100 object-fit-cover" src="assets/imgs/home/about-cover.jpg" alt="Contact Banner"
          width="1920" height="600" loading="lazy">
        <div class=" position-absolute layer  top-0 bottom-0 end-0 start-0 px-lg-5 px-2 d-flex align-items-center ">
          <div class="row  gap-lg-4 gap-2">
            <div class="col-lg-8">
              <h3 class="text-white fw-semibold py-lg-3 py-2" data-aos="fade-up" data-aos-duration="1500">Our Commitment
              </h3>
              <p class="text-white" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1000">
                At Key link business support , we are driven by our commitment to integrity and customer satisfaction.
                We strive to create lasting relationships with our clients, understanding their unique needs and
                challenges. Our approach is built on trust, transparency, and a results-oriented mindset.

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

