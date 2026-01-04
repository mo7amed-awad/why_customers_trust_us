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
                                        {{ __('front.home_platform_title') }}
                                    </h4>
                                    <p class="text-white py-2" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">
                                        {{ __('front.home_platform_description') }}
                                    </p>
                                </div>
                                <div class="col-md-3 col-sm-6 align-items-end">
                                    <a href="{{ route('client.ads', ['slug' => 'cars']) }}"
                                       class="btn bg-white bg-opacity-25 py-2 px-5 text-white rounded-pill gap-2 d-inline-flex align-items-center">
        <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 17.59L17.59 19L7 8.41V15H5V5H15V7H8.41L19 17.59Z" fill="white"/>
            </svg>
        </span>
                                        <span>{{ __('front.find_a_car') }}</span>
                                    </a>
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
