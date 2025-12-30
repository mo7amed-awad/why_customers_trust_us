@extends('Client.layouts.layout')

@section('content')
<nav id="navBar">

</nav>


<!-- end section  -->
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
<div class="container my-lg-5 my-3 ">

    <div class="row gy-3 overflow-hidden">
        @foreach($categories as $category)
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class=" rounded-3 overflow-hidden bg-linear-gradient ">
                <div class=" d-flex align-items-center justify-content-center img-card overflow-hidden">
                    <img src="{{asset($category->image)}}">
                </div>
                <h3 class="text-center py-2 text-white">{{$category->trans('title')}}</h3>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row py-2">
        <div class="col-md-12 d-flex justify-content-center">
            <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center gap-3 flex-wrap bg-white rounded-pill p-2">
                    <li class="page-item"><a class="page-link " href="#"><i class="fa-solid fa-chevron-left"></i></a></li>
                    <li class="page-item"><a class="page-link rounded-circle" href="#">1</a></li>
                    <li class="page-item"><a class="page-link active rounded-circle" href="#">2</a></li>
                    <li class="page-item"><a class="page-link rounded-circle" href="#">3</a></li>
                    <li class="page-item"><a class="page-link " href="#"><i class="fa-solid fa-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>




<footer id="footer">
</footer>




@push('scripts')

<script>

    AOS.init({
        once: true
    })


    // Price Range Slider
    const rangeMinPrice = document.querySelector(".range-min-price");
    const rangeMaxPrice = document.querySelector(".range-max-price");
    const progressPrice = document.querySelector(".progress-price");
    const priceMinValue = document.querySelector(".price-min-value");
    const priceMaxValue = document.querySelector(".price-max-value");

    let priceGap = 1;

    function updatePriceSlider() {
        let minVal = parseInt(rangeMinPrice.value);
        let maxVal = parseInt(rangeMaxPrice.value);

        if (maxVal - minVal < priceGap) {
            if (event.target.classList.contains("range-min-price")) {
                rangeMinPrice.value = maxVal - priceGap;
                minVal = maxVal - priceGap;
            } else {
                rangeMaxPrice.value = minVal + priceGap;
                maxVal = minVal + priceGap;
            }
        }

        // Update display
        priceMinValue.textContent = minVal;
        priceMaxValue.textContent = maxVal;

        // Update progress bar
        const minPercent = (minVal / rangeMinPrice.max) * 100;
        const maxPercent = (maxVal / rangeMaxPrice.max) * 100;
        progressPrice.style.left = minPercent + "%";
        progressPrice.style.right = (100 - maxPercent) + "%";
    }

    if (rangeMinPrice && rangeMaxPrice) {
        rangeMinPrice.addEventListener("input", updatePriceSlider);
        rangeMaxPrice.addEventListener("input", updatePriceSlider);

        // Initialize on page load
        updatePriceSlider();
    }

</script>
@endpush
@endsection