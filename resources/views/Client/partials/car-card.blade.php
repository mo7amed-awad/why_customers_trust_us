<div class="col-lg-4 col-md-4 col-sm-6 ">
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
                        <div
                                class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center addtosave"
                                style="width: 40px; height:40px">
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                        stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                    </a>
                </div>
                <div class=" d-flex gap-2 align-items-center justify-content-between">
                    <div class="">
                        <h6 class="text-white py-1 lh-base  mb-0 ">{{ __('front.starting_from') }}</h6>
                        <h3 class="fs-24 fw-bold text-white">BHD {{ number_format($car->price, 2) }}</h3>
                    </div>

                    <div class="text-black fw-semibold d-flex align-items-center gap-1 ">
                    <span class="d-flex align-items-center"><svg width="13" height="12" viewBox="0 0 13 12"
                                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M2.11394 11.6479L3.61194 7.19591L-6.26519e-05 4.77391H4.42394L6.00594 -8.86917e-05L7.61594 4.77391H12.0119L8.39994 7.19591L9.92594 11.6479L6.00594 8.80591L2.11394 11.6479Z"
                                fill="#FACC15" />
                      </svg>
                    </span>
                        <span class="d-flex align-items-center fs-14" style="color: #FACC15;">4.5</span>
                    </div>
                </div>
            </div>

            <img src="{{ asset($car->images->first()->image ?? 'assets/imgs/services/1.jpg') }}" class="w-100 h-100 object-fit-cover">
        </div>
        <div class="card-body row gy-3">
            <div class="col-12">
                <h5 class="card-title">{{$car->title}}</h5>
            </div>
            <div class=" col-6 text-center">
                <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16"
                                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M12.6667 2.66699H3.33333C2.59695 2.66699 2 3.26395 2 4.00033V13.3337C2 14.07 2.59695 14.667 3.33333 14.667H12.6667C13.403 14.667 14 14.07 14 13.3337V4.00033C14 3.26395 13.403 2.66699 12.6667 2.66699Z"
                                stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10.667 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                              stroke-linejoin="round" />
                        <path d="M5.33301 1.33301V3.99967" stroke="#AFAD9C" stroke-width="1.33333"
                              stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2 6.66699H14" stroke="#AFAD9C" stroke-width="1.33333" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                    <span class="text-black-50  lh-base fs-14"> {{ $car->carDetails->manufacture_year ?? 'N/A' }}</span>

                </h2>

            </div>
            <div class=" col-6 text-center">
                <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16"
                                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M10.5 14H0.5C0.225 14 0 14.225 0 14.5V15.5C0 15.775 0.225 16 0.5 16H10.5C10.775 16 11 15.775 11 15.5V14.5C11 14.225 10.775 14 10.5 14ZM15.4125 3.35313L12.8813 0.821875C12.6875 0.628125 12.3688 0.628125 12.175 0.821875L11.8219 1.175C11.6281 1.36875 11.6281 1.6875 11.8219 1.88125L13 3.05938V5C13 5.87813 13.6531 6.60313 14.5 6.725V11.75C14.5 12.1625 14.1625 12.5 13.75 12.5C13.3375 12.5 13 12.1625 13 11.75V10.75C13 9.23125 11.7688 8 10.25 8H10V2C10 0.896875 9.10312 0 8 0H3C1.89688 0 1 0.896875 1 2V13H10V9.5H10.25C10.9406 9.5 11.5 10.0594 11.5 10.75V11.6187C11.5 12.7969 12.3438 13.8688 13.5156 13.9906C14.8594 14.125 16 13.0688 16 11.75V4.76875C16 4.2375 15.7875 3.72813 15.4125 3.35313ZM8 6H3V2H8V6Z"
                                fill="#AFAD9C" />
                    </svg>

                    <span class="text-black-50 lh-base fs-14">
                        {{ $car->carDetails->fuel_type
                            ? __('front.fuel_' . $car->carDetails->fuel_type)
                            : 'N/A'
                        }}
                    </span>
                </h2>

            </div>
            <div class=" col-6 text-center">
                <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16"
                                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M15.9221 12.0745L12.039 3.1856C11.901 2.86949 11.6001 2.66699 11.269 2.66699H8.55818L8.62624 3.31033C8.64013 3.44144 8.53707 3.55588 8.40513 3.55588H7.59513C7.46318 3.55588 7.36013 3.44144 7.37402 3.31033L7.44207 2.66699H4.73124C4.39985 2.66699 4.09902 2.86949 3.96096 3.1856L0.0779043 12.0745C-0.17904 12.6631 0.23096 13.3337 0.84846 13.3337H6.31624L6.60263 10.6203C6.62652 10.3942 6.81707 10.2225 7.04457 10.2225H8.95568C9.18318 10.2225 9.37374 10.3942 9.39763 10.6203L9.68402 13.3337H15.1518C15.7693 13.3337 16.1793 12.6631 15.9221 12.0745ZM7.23346 4.64366C7.23923 4.58905 7.26501 4.5385 7.30584 4.50177C7.34667 4.46505 7.39965 4.44474 7.45457 4.44477H8.54596C8.65957 4.44477 8.75513 4.5306 8.76707 4.64366L8.89485 5.85421C8.91568 6.05116 8.76124 6.22255 8.56346 6.22255H7.43735C7.23929 6.22255 7.08513 6.05116 7.10596 5.85421L7.23346 4.64366ZM8.76791 9.33366H7.23207C6.96818 9.33366 6.76235 9.10505 6.79013 8.84255L6.93096 7.50921C6.95485 7.2831 7.1454 7.11144 7.3729 7.11144H8.62707C8.85457 7.11144 9.04513 7.2831 9.06902 7.50921L9.20985 8.84255C9.23763 9.10505 9.03179 9.33366 8.76791 9.33366Z"
                                fill="#AFAD9C" />
                    </svg>

                    <span class="text-black-50  lh-base fs-14"> {{ $car->carDetails->mileage ?? 'N/A' }}</span>

                </h2>

            </div>
            <div class=" col-6 text-center">
                <h2 class="d-flex align-items-center gap-2"><svg width="16" height="16" viewBox="0 0 16 16"
                                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M15.2316 9.86546L13.9004 9.09671C14.0348 8.37171 14.0348 7.62796 13.9004 6.90296L15.2316 6.13421C15.3848 6.04671 15.4535 5.86546 15.4035 5.69671C15.0566 4.58421 14.466 3.57796 13.6941 2.74046C13.5754 2.61233 13.3816 2.58108 13.2316 2.66858L11.9004 3.43733C11.341 2.95608 10.6973 2.58421 10.0004 2.34046V0.806084C10.0004 0.631084 9.87851 0.477959 9.70664 0.440459C8.55976 0.184209 7.38476 0.196709 6.29414 0.440459C6.12226 0.477959 6.00039 0.631084 6.00039 0.806084V2.34358C5.30664 2.59046 4.66289 2.96233 4.10039 3.44046L2.77226 2.67171C2.61914 2.58421 2.42851 2.61233 2.30976 2.74358C1.53789 3.57796 0.947262 4.58421 0.600387 5.69983C0.547262 5.86858 0.619137 6.04983 0.772262 6.13733L2.10351 6.90608C1.96914 7.63108 1.96914 8.37483 2.10351 9.09983L0.772262 9.86858C0.619137 9.95608 0.550387 10.1373 0.600387 10.3061C0.947262 11.4186 1.53789 12.4248 2.30976 13.2623C2.42851 13.3905 2.62226 13.4217 2.77226 13.3342L4.10351 12.5655C4.66289 13.0467 5.30664 13.4186 6.00351 13.6623V15.1998C6.00351 15.3748 6.12539 15.528 6.29726 15.5655C7.44414 15.8217 8.61914 15.8092 9.70976 15.5655C9.88164 15.528 10.0035 15.3748 10.0035 15.1998V13.6623C10.6973 13.4155 11.341 13.0436 11.9035 12.5655L13.2348 13.3342C13.3879 13.4217 13.5785 13.3936 13.6973 13.2623C14.4691 12.428 15.0598 11.4217 15.4066 10.3061C15.4535 10.1342 15.3848 9.95296 15.2316 9.86546ZM8.00039 10.4998C6.62226 10.4998 5.50039 9.37796 5.50039 7.99983C5.50039 6.62171 6.62226 5.49983 8.00039 5.49983C9.37851 5.49983 10.5004 6.62171 10.5004 7.99983C10.5004 9.37796 9.37851 10.4998 8.00039 10.4998Z"
                                fill="#AFAD9C" />
                    </svg>
                    <span class="text-black-50 lh-base fs-14">
                        {{ $car->carDetails->transmission
                            ? __('front.' . $car->carDetails->transmission)
                            : 'N/A'
                        }}
                    </span>
                </h2>

            </div>
            <div class="d-flex justify-content-between align-items-center mb-2 col-12">
                <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                  {{ $car->carDetails->engine ?? 'N/A' }}
                </span>
                <a class="btn primary-color d-flex align-items-center gap-2"
                   href="detailsPage.html"><span>التفاصيل</span><span><i
                                class="fa-solid fa-arrow-right arrow"></i></span></a>
            </div>

        </div>
    </div>
</div>
