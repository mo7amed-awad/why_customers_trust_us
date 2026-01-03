<div class="card property-card p-1 ">
    <div class="img-card sevices-fade d-flex align-items-center justify-content-center rounded-0 overflow-hidden position-relative">
        <div class="sevices-fade p-2 top-0 bottom-0 start-0 end-0 position-absolute d-flex flex-column justify-content-between" style="z-index: 1;">
            <div class=" d-flex gap-2 align-items-center justify-content-between">
                @if($car->is_new)
                    <h6 class="fs-14 text-white py-1 lh-base px-3 rounded-pill mb-0 bg-primary-color">
                        {{ __('New') }}
                    </h6>
                @else
                    <h6 class="fs-14 text-white py-1 lh-base px-3 rounded-pill mb-0" style="background-color: #6c757d;">
                        {{ __('Used') }}
                    </h6>
                @endif
                <a href="washList.html" tabindex="-1">
                    <div class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave" style="width: 40px; height:40px">
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
                    <h6 class="text-white py-1 lh-base  mb-0 "> {{ __('front.starting_from') }}</h6>
                    <h3 class="fs-24 fw-bold text-white">BHD {{ number_format($accessory->price, 2) }}</h3>
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

        <img src="{{ asset($accessory->images->first()->image ?? 'assets/imgs/services/1.jpg') }}" class="w-100 h-100 object-fit-cover">
    </div>
    <div class="card-body row gap-2">
        <div class="col-12">
            <h5 class="card-title">{{$accessory->title}}</h5>
        </div>
        <div class=" col-12 d-flex gap-2 flex-wrap justify-content-between">
            <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">{{ $accessory->subCategory->trans('title') ?? 'N/A' }}</span>
        </div>

        <div class="d-flex justify-content-end align-items-center mb-2 col-12">
            <a class="btn primary-color d-flex align-items-center gap-2" href="detailsPage.html"><span>التفاصيل</span><span><i class="fa-solid fa-arrow-right arrow"></i></span></a>
        </div>

    </div>
</div>
