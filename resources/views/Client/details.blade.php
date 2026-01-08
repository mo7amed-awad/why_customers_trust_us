@extends('Client.layouts.layout')
@push('css')
    <style>
        /* LTR (English) */
        html[dir="ltr"] .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            padding: 0 8px;
            color: #6c757d;
        }

        /* RTL (Arabic) */
        html[dir="rtl"] .breadcrumb-item + .breadcrumb-item::before {
            content: "<";
            padding: 0 8px;
            color: #6c757d;
        }

    </style>
    <style>
        .heart-icon {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .heart-icon .heart-path {
            transition: all 0.3s ease;
            fill: none !important;
            stroke: #4B5563 !important;
        }

        .heart-icon.favorited {
            background-color: #a9a9a9   !important;
        }

        .heart-icon.favorited .heart-path {
            fill: #EF4444 !important;
            stroke: #EF4444 !important;
        }

        .heart-icon:hover {
            transform: scale(1.1);
        }
    </style>

    <style>
        /* أزرار التنقل */
        .slick-prev, .slick-next {
            width: 40px;
            height: 40px;
            background: rgba(0,0,0,0.5);
            border-radius: 50%;
            z-index: 1000;
        }

        .slick-prev {
            left: 10px;
        }

        .slick-next {
            right: 10px;
        }

        .slick-prev:hover, .slick-next:hover {
            background: rgba(0,0,0,0.8);
        }

        .slider-nav .slick-slide {
            opacity: 0.6;
            transition: opacity 0.3s;
        }

        .slider-nav .slick-slide.slick-current {
            opacity: 1;
            border: 2px solid #007bff;
        }
    </style>
@endpush
@section('content')
<nav id="navBar">

</nav>
<div class="container py-lg-5 py-md-4 py-3 section-top">
    <div class="row flex-lg-row flex-column-reverse py-2">
        <div class="col-lg-12">
            <h4 class="fw-semibold fs-24">
                {{ $item->title }}
            </h4>

            <nav aria-label="breadcrumb"
                 data-aos="fade-up"
                 data-aos-duration="1500"
                 data-aos-delay="700">

                <ol class="breadcrumb mb-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('client.home') }}">
                            {{ __('front.home') }}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('client.ads', ['slug' => $item->category->slug]) }}">
                            {{ $item->category->trans('title') }}
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $item->subCategory->trans('title') }}
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Stats and Share Section -->

    </div>
    <div class="row gy-3 py-2   justify-content-between">

        <div class="col-lg-7 overflow-hidden position-relative">
            <div class="row bg-white py-3 gap-3 px-2 rounded-3 border-color border mb-3">

                {{--First Row--}}
                <div class="d-flex justify-content-between col-12 align-items-center  gap-3">

                    <!-- Left Side: Stats -->
                    <div class="d-flex gap-4 align-items-center ">
                        <div class="d-flex align-items-center gap-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M5.41 21L6.12 17H2.12L2.47 15H6.47L7.53 9H3.53L3.88 7H7.88L8.59 3H10.59L9.88 7H15.88L16.59 3H18.59L17.88 7H21.88L21.53 9H17.53L16.47 15H20.47L20.12 17H16.12L15.41 21H13.41L14.12 17H8.12L7.41 21H5.41ZM9.52999 9L8.47 15H14.47L15.53 9H9.52999Z"
                                        fill="#2983C6" fill-opacity="0.4" />
                            </svg>

                            <span class="text-muted small">{{$item->order_number}}</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M7 4.5C7.66304 4.5 8.29893 4.76339 8.76777 5.23223C9.23661 5.70107 9.5 6.33696 9.5 7C9.5 7.3283 9.43534 7.65339 9.3097 7.95671C9.18406 8.26002 8.99991 8.53562 8.76777 8.76777C8.53562 8.99991 8.26002 9.18406 7.95671 9.3097C7.65339 9.43534 7.3283 9.5 7 9.5C6.33696 9.5 5.70107 9.23661 5.23223 8.76777C4.76339 8.29893 4.5 7.66304 4.5 7C4.5 6.33696 4.76339 5.70107 5.23223 5.23223C5.70107 4.76339 6.33696 4.5 7 4.5ZM7 0C8.85652 0 10.637 0.737498 11.9497 2.05025C13.2625 3.36301 14 5.14348 14 7C14 12.25 7 20 7 20C7 20 0 12.25 0 7C0 5.14348 0.737498 3.36301 2.05025 2.05025C3.36301 0.737498 5.14348 0 7 0ZM7 2C5.67392 2 4.40215 2.52678 3.46447 3.46447C2.52678 4.40215 2 5.67392 2 7C2 8 2 10 7 16.71C12 10 12 8 12 7C12 5.67392 11.4732 4.40215 10.5355 3.46447C9.59785 2.52678 8.32608 2 7 2Z"
                                        fill="#8E8E93" />
                            </svg>

                            <span class="text-muted small">{{ explode(' ', $item->address)[0] ?? '' }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M19 3H18V1H16V3H8V1H6V3H5C4.46957 3 3.96086 3.21071 3.58579 3.58579C3.21071 3.96086 3 4.46957 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.11 3 19 3ZM19 19H5V9H19V19ZM19 7H5V5H19M7 11H12V16H7"
                                        fill="#8E8E93" />
                            </svg>

                            <span class="text-muted small">{{ $item->created_at_human }}</span>
                        </div>
                    </div>

                    <!-- Right Side: Share Section -->
                    <div class="d-flex align-items-center gap-3 bg-light p-1 rounded-pill">
                        <div class="d-flex gap-4 align-items-center ">
                            <div class="d-flex align-items-center gap-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M12.5 9C13.2956 9 14.0587 9.31607 14.6213 9.87868C15.1839 10.4413 15.5 11.2044 15.5 12C15.5 12.7956 15.1839 13.5587 14.6213 14.1213C14.0587 14.6839 13.2956 15 12.5 15C11.7044 15 10.9413 14.6839 10.3787 14.1213C9.81607 13.5587 9.5 12.7956 9.5 12C9.5 11.2044 9.81607 10.4413 10.3787 9.87868C10.9413 9.31607 11.7044 9 12.5 9ZM12.5 4.5C17.5 4.5 21.77 7.61 23.5 12C21.77 16.39 17.5 19.5 12.5 19.5C7.5 19.5 3.23 16.39 1.5 12C3.23 7.61 7.5 4.5 12.5 4.5ZM3.68 12C4.48825 13.6503 5.74331 15.0407 7.30248 16.0133C8.86165 16.9858 10.6624 17.5013 12.5 17.5013C14.3376 17.5013 16.1383 16.9858 17.6975 16.0133C19.2567 15.0407 20.5117 13.6503 21.32 12C20.5117 10.3497 19.2567 8.95925 17.6975 7.98675C16.1383 7.01424 14.3376 6.49868 12.5 6.49868C10.6624 6.49868 8.86165 7.01424 7.30248 7.98675C5.74331 8.95925 4.48825 10.3497 3.68 12Z"
                                            fill="#8E8E93" />
                                </svg>


                                <span class="text-muted small">250</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M9.5 21.5C9.23478 21.5 8.98043 21.3946 8.79289 21.2071C8.60536 21.0196 8.5 20.7652 8.5 20.5V17.5H4.5C3.96957 17.5 3.46086 17.2893 3.08579 16.9142C2.71071 16.5391 2.5 16.0304 2.5 15.5V3.5C2.5 2.96957 2.71071 2.46086 3.08579 2.08579C3.46086 1.71071 3.96957 1.5 4.5 1.5H20.5C21.0304 1.5 21.5391 1.71071 21.9142 2.08579C22.2893 2.46086 22.5 2.96957 22.5 3.5V15.5C22.5 16.0304 22.2893 16.5391 21.9142 16.9142C21.5391 17.2893 21.0304 17.5 20.5 17.5H14.4L10.7 21.21C10.5 21.4 10.25 21.5 10 21.5H9.5ZM10.5 15.5V18.58L13.58 15.5H20.5V3.5H4.5V15.5H10.5ZM6.5 6.5H18.5V8.5H6.5V6.5ZM6.5 10.5H15.5V12.5H6.5V10.5Z"
                                            fill="#8E8E93" />
                                </svg>


                                <span class="text-muted small">250</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{--Second Row--}}
                <div class="d-flex justify-content-between col-12 align-items-center gap-3">

                    <div class="d-flex align-items-center w-100 justify-content-between">
                        <!-- Left Side: Stats -->
                        <div class="d-flex gap-3 justify-content-between">
                            {{--Favorite--}}
                            <a href="#" class="addtosave" data-id="{{ $item->id }}" tabindex="-1">
                                <div class="fs-14 text-white p-lg-2 px-2 bg-white bg-opacity-75 rounded-circle fw-bold d-flex align-items-center justify-content-center heart-icon {{ $item->isFavorited() ? 'favorited' : '' }}"
                                     style="width: 40px; height:40px">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="heart-path"
                                              d="M13.5276 1.74118C13.1871 1.40051 12.7828 1.13027 12.3378 0.945899C11.8929 0.761524 11.4159 0.666626 10.9343 0.666626C10.4526 0.666626 9.97568 0.761524 9.53071 0.945899C9.08573 1.13027 8.68145 1.40051 8.34094 1.74118L7.63428 2.44784L6.92761 1.74118C6.23981 1.05338 5.30696 0.666982 4.33428 0.666982C3.36159 0.666982 2.42874 1.05338 1.74094 1.74118C1.05315 2.42897 0.666748 3.36182 0.666748 4.33451C0.666748 5.3072 1.05315 6.24005 1.74094 6.92784L2.44761 7.63451L7.63428 12.8212L12.8209 7.63451L13.5276 6.92784C13.8683 6.58734 14.1385 6.18305 14.3229 5.73808C14.5073 5.29311 14.6022 4.81617 14.6022 4.33451C14.6022 3.85285 14.5073 3.37591 14.3229 2.93094C14.1385 2.48597 13.8683 2.08168 13.5276 1.74118Z"
                                              stroke="#4B5563" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            <button
                                    class="btn btn-sm btn-outline-primary rounded-circle d-flex align-items-center justify-content-center p-0 like-btn"
                                    data-ad-id="{{ $item->id }}"
                                    style="width: 32px; height: 32px;">
                                <i class="{{ $item->isLiked() ? 'fas' : 'far' }} fa-thumbs-up" style="font-size: 14px;"></i>
                            </button>

                            <div class="d-flex gap-2 align-items-center">
                                <button class="btn btn-sm  rounded-circle d-flex align-items-center justify-content-center p-0"
                                        style="width: 32px; height: 32px;">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M15.3508 7.45198L15.8476 9.93593H22.3556V17.3878H18.1825L17.6857 14.9038H8.6938V7.45198H15.3508ZM17.3876 4.96802H6.20984V26.0817H8.6938V17.3878H15.6489L16.1457 19.8718H24.8395V7.45198H17.8844"
                                                fill="#2983C6" />
                                    </svg>

                                </button>
                                <span class="fw-medium">الإبلاغ عن هذا الاعلان</span>
                            </div>
                        </div>


                                <!-- Right Side: Share Section -->
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted small">مشاركة</span>

                            <div class="d-flex gap-2">

                                <!-- Facebook -->
                                <a target="_blank"
                                   href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                   class="btn btn-sm btn-primary rounded-circle d-flex align-items-center justify-content-center p-0"
                                   style="width:32px;height:32px;">
                                    <i class="fab fa-facebook-f text-white" style="font-size:14px;"></i>
                                </a>

                                <!-- Twitter / X -->
                                <a target="_blank"
                                   href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                                   class="btn btn-sm btn-info rounded-circle d-flex align-items-center justify-content-center p-0"
                                   style="width:32px;height:32px;">
                                    <i class="fab fa-twitter text-white" style="font-size:14px;"></i>
                                </a>

                                <!-- LinkedIn -->
                                <a target="_blank"
                                   href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                   class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center p-0"
                                   style="width:32px;height:32px;background:#0077b5;">
                                    <i class="fab fa-linkedin-in text-white" style="font-size:14px;"></i>
                                </a>

                                <!-- WhatsApp -->
                                <a target="_blank"
                                   href="https://wa.me/?text={{ urlencode(url()->current()) }}"
                                   class="btn btn-sm btn-success rounded-circle d-flex align-items-center justify-content-center p-0"
                                   style="width:32px;height:32px;">
                                    <i class="fab fa-whatsapp text-white" style="font-size:14px;"></i>
                                </a>

                            </div>
                        </div>

                    </div>
                </div>

                {{--Images--}}
                <div class="row gy-3 justify-content-between py-2 overflow-hidden">



                    <div class="col-12 d-flex flex-column overflow-hidden " data-aos="fade-left" data-aos-duration="1500">
                        <div id="ProductImage" class="carousel slide position-relative h-100">
                                @php
                                    $images = $item->images;
                                    $totalImages = $images->count();
                                @endphp
                                <div class="position-absolute start-0 py-2 d-flex gap-2 align-items-center justify-content-between p-2 bottom-0 end-0" style="z-index: 1111;">
                                    <div class="fs-14 text-white py-2 px-5 bg-black bg-opacity-25 rounded-pill fw-bold d-flex align-items-center justify-content-center addtosave" style="height:40px">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.751 16.752H4.40784V4.40881H16.751M16.751 2.64551H4.40784C3.94018 2.64551 3.49168 2.83128 3.16099 3.16197C2.83031 3.49265 2.64453 3.94116 2.64453 4.40881V16.752C2.64453 17.2196 2.83031 17.6681 3.16099 17.9988C3.49168 18.3295 3.94018 18.5153 4.40784 18.5153H16.751C17.2186 18.5153 17.6671 18.3295 17.9978 17.9988C18.3285 17.6681 18.5143 17.2196 18.5143 16.752V4.40881C18.5143 3.94116 18.3285 3.49265 17.9978 3.16197C17.6671 2.83128 17.2186 2.64551 16.751 2.64551ZM12.3074 10.8361L9.8829 13.9571L8.15486 11.8764L5.73032 14.9886H15.4285L12.3074 10.8361Z" fill="white" />
                                        </svg>
                                        <span class="current-slide">1</span>/{{ $totalImages }}
                                    </div>
                                </div>
                            <div class="carousel-inner rounded-3 h-100">
                                @foreach($images as $index => $image)
                                    <div class="carousel-item position-relative h-100 {{ $index === 0 ? 'active' : '' }}">
                                        <div class="d-flex align-items-center justify-content-center h-div h-100 w-100">
                                            <img data-fancybox="gallery" data-src="{{asset($image->image)}}" src="{{asset($image->image)}}"
                                                 data-caption="Image #{{ $index + 1 }}" class="d-block w-100 h-100 object-fit-cover" alt="Image">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex  " data-aos="fade-right" data-aos-duration="1500" >
                        <div class="d-flex gap-2 image-slide overflow-auto" style="max-height: 444px;">
                            @foreach($images as $index => $image)
                            <div style="height:120px; min-height: 120px;" data-bs-target="#ProductImage" data-bs-slide-to="{{$index}}"
                                 class=" p-1" aria-label="Image 2">
                                <div class="w-100 h-100 overflow-hidden rounded-3">
                                    <img src="{{asset($image->image)}}" class="w-100 h-100 object-fit-cover rounded-3" alt="Image">
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            {{--Brand Name--}}
            <div class="row bg-white py-3  px-2 rounded-3 border-color border mb-3">
                <div class="col-12 mb-3">
                    <h1 class="fs-20">{{$item->title}}</h1>
                </div>

                <div class="col-12 mb-3">
                    <p class="text-secondary">{{$item->description}}</p>
                </div>

                @if($type == \App\Enums\AdTypesEnum::CAR)
                <div class="  col-lg-3 col-6 text-center">
                    <h2 class="fw-semibold  fs-18 mb-0 "> <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_208_2398)">
                                <path
                                        d="M20.4595 11.7997C20.4595 14.0664 19.7929 16.0886 18.4595 17.8664C18.3262 18.0442 18.1484 18.1442 17.9262 18.1664C17.704 18.1886 17.504 18.133 17.3262 17.9997C17.1484 17.8664 17.0484 17.6997 17.0262 17.4997C17.004 17.2997 17.0595 17.1108 17.1929 16.933C18.3484 15.4219 18.9262 13.7108 18.9262 11.7997C18.9262 10.2886 18.5484 8.8886 17.7929 7.59971C17.0373 6.31082 16.004 5.2886 14.6929 4.53305C13.3818 3.77749 11.9706 3.39971 10.4595 3.39971C8.94842 3.39971 7.53731 3.77749 6.2262 4.53305C4.91509 5.2886 3.88176 6.31082 3.1262 7.59971C2.37064 8.8886 1.99287 10.2886 1.99287 11.7997C1.99287 13.7108 2.57064 15.4219 3.7262 16.933C3.85953 17.1108 3.91509 17.2997 3.89287 17.4997C3.87065 17.6997 3.77064 17.8664 3.59287 17.9997C3.41509 18.133 3.21509 18.1886 2.99287 18.1664C2.77064 18.1442 2.59287 18.0442 2.45953 17.8664C1.1262 16.0886 0.459534 14.0664 0.459534 11.7997C0.459534 10.0219 0.903978 8.36638 1.79287 6.83305C2.68176 5.29971 3.89287 4.0886 5.4262 3.19971C6.95953 2.31082 8.63731 1.86638 10.4595 1.86638C12.2818 1.86638 13.9595 2.31082 15.4929 3.19971C17.0262 4.0886 18.2373 5.29971 19.1262 6.83305C20.0151 8.36638 20.4595 10.0219 20.4595 11.7997ZM15.3929 7.13305C15.5706 7.26638 15.6595 7.44416 15.6595 7.66638C15.6595 7.8886 15.5706 8.06638 15.3929 8.19971L12.8595 10.7997C13.0818 11.1997 13.1929 11.6219 13.1929 12.0664C13.1929 12.8219 12.9262 13.4664 12.3929 13.9997C11.8595 14.533 11.2151 14.7997 10.4595 14.7997C9.70398 14.7997 9.05953 14.533 8.5262 13.9997C7.99287 13.4664 7.7262 12.8219 7.7262 12.0664C7.7262 11.3108 7.99287 10.6664 8.5262 10.133C9.05953 9.59971 9.70398 9.33305 10.4595 9.33305C10.904 9.33305 11.3262 9.44416 11.7262 9.66638L14.3262 7.13305C14.4595 6.95527 14.6373 6.86638 14.8595 6.86638C15.0818 6.86638 15.2595 6.95527 15.3929 7.13305ZM11.6595 12.0664C11.6595 11.7553 11.5373 11.4886 11.2929 11.2664C11.0484 11.0442 10.7706 10.933 10.4595 10.933C10.1484 10.933 9.87065 11.0442 9.6262 11.2664C9.38176 11.4886 9.25953 11.7553 9.25953 12.0664C9.25953 12.3775 9.38176 12.6553 9.6262 12.8997C9.87065 13.1442 10.1484 13.2664 10.4595 13.2664C10.7706 13.2664 11.0484 13.1442 11.2929 12.8997C11.5373 12.6553 11.6595 12.3775 11.6595 12.0664Z"
                                        fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_208_2398">
                                    <rect width="20" height="20" fill="white" transform="matrix(1 0 0 -1 0.459534 19.9998)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </h2>
                    <p class="text-secondary fw-medium  lh-base fs-14">
                        {{ $item->carDetails->mileage ?? 'N/A' }}
                    </p>
                </div>
                <div class="  col-lg-3 col-6 text-center">
                    <h2 class="fw-semibold  fs-18 mb-0 ">
                        <svg width="16" height="16" viewBox="0 0 16 16"
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

                    </h2>
                    <p class="text-secondary fw-medium  lh-base fs-14">
                        {{ $item->carDetails->manufacture_year ?? 'N/A' }}
                    </p>
                </div>
                <div class="  col-lg-3 col-6 text-center">
                    <h2 class="fw-semibold  fs-18 mb-0 "><svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                              xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_208_2411)">
                                <path
                                        d="M11.9708 3.73309C11.9708 3.55531 11.9152 3.41087 11.8041 3.29976C11.693 3.18864 11.5485 3.13309 11.3708 3.13309H5.1041C4.92632 3.13309 4.78188 3.18864 4.67077 3.29976C4.55966 3.41087 4.5041 3.55531 4.5041 3.73309V8.73309C4.5041 8.91087 4.55966 9.06642 4.67077 9.19976C4.78188 9.33309 4.92632 9.39976 5.1041 9.39976H11.3708C11.5485 9.39976 11.693 9.33309 11.8041 9.19976C11.9152 9.06642 11.9708 8.91087 11.9708 8.73309V3.73309ZM10.7041 8.13309H5.7041V4.39976H10.7041V8.13309ZM19.1708 4.39976L16.6374 3.19975C16.5041 3.11087 16.3485 3.08864 16.1708 3.13309C15.993 3.17753 15.8708 3.27753 15.8041 3.43309C15.7374 3.58864 15.7263 3.75531 15.7708 3.93309C15.8152 4.11087 15.9263 4.22198 16.1041 4.26642L17.0374 4.79976L16.9708 4.99975C16.9708 5.39976 17.093 5.75531 17.3374 6.06642C17.5819 6.37753 17.8819 6.59976 18.2374 6.73309V14.3331C18.2374 14.5109 18.1708 14.6664 18.0374 14.7998C17.9041 14.9331 17.7597 14.9998 17.6041 14.9998C17.4485 14.9998 17.3041 14.9331 17.1708 14.7998C17.0374 14.6664 16.9708 14.5109 16.9708 14.3331V9.33309C16.9708 8.62198 16.7152 7.97753 16.2041 7.39976C15.693 6.82198 15.1263 6.46642 14.5041 6.33309V2.46642C14.5041 1.79976 14.2597 1.22198 13.7708 0.733088C13.2819 0.2442 12.7041 -0.000246048 12.0374 -0.000246048H4.5041C3.83743 -0.000246048 3.24855 0.2442 2.73743 0.733088C2.22632 1.22198 1.97077 1.79976 1.97077 2.46642V16.4664L1.1041 16.9331C0.837435 17.0664 0.704102 17.2442 0.704102 17.4664V19.3331C0.704102 19.5109 0.770768 19.6664 0.904102 19.7998C1.03743 19.9331 1.19299 19.9998 1.37077 19.9998H15.1041C15.2819 19.9998 15.4263 19.9331 15.5374 19.7998C15.6485 19.6664 15.7041 19.5109 15.7041 19.3331V17.4664C15.7041 17.2442 15.593 17.0664 15.3708 16.9331L14.5041 16.4664V7.59976C14.8152 7.73309 15.093 7.96642 15.3374 8.29976C15.5819 8.63309 15.7041 8.97753 15.7041 9.33309V14.3331C15.7041 14.8664 15.893 15.322 16.2708 15.6998C16.6485 16.0775 17.093 16.2664 17.6041 16.2664C18.1152 16.2664 18.5597 16.0775 18.9374 15.6998C19.3152 15.322 19.5041 14.8664 19.5041 14.3331V4.99975C19.5041 4.73309 19.393 4.53309 19.1708 4.39976ZM14.5041 18.7331H1.97077V17.8664L2.9041 17.3998C3.12632 17.3109 3.23743 17.1331 3.23743 16.8664V2.46642C3.23743 2.15531 3.35966 1.87753 3.6041 1.63309C3.84855 1.38864 4.14855 1.26642 4.5041 1.26642H12.0374C12.3485 1.26642 12.6263 1.38864 12.8708 1.63309C13.1152 1.87753 13.2374 2.15531 13.2374 2.46642V16.8664C13.2374 17.1331 13.3485 17.3109 13.5708 17.3998L14.5041 17.8664V18.7331Z"
                                        fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_208_2411">
                                    <rect width="20" height="20" fill="white" transform="matrix(1 0 0 -1 0.104126 19.9998)" />
                                </clipPath>
                            </defs>
                        </svg>

                    </h2>
                    <p class="text-secondary fw-medium  lh-base fs-14">
                        {{ $item->carDetails->fuel_type
                           ? __('front.fuel_' . $item->carDetails->fuel_type)
                           : 'N/A'
                       }}
                    </p>
                </div>
                <div class="  col-lg-3 col-6 text-center">
                    <h2 class="fw-semibold  fs-18 mb-0 "><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                              xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M2.40644 0.86639C1.78422 0.86639 1.25088 1.08861 0.806437 1.53306C0.361993 1.9775 0.139771 2.52195 0.139771 3.16639C0.139771 3.81083 0.361993 4.35528 0.806437 4.79972C1.25088 5.24417 1.78422 5.46639 2.40644 5.46639C3.02866 5.46639 3.56199 5.24417 4.00644 4.79972C4.45088 4.35528 4.6731 3.81083 4.6731 3.16639C4.6731 2.52195 4.45088 1.9775 4.00644 1.53306C3.56199 1.08861 3.02866 0.86639 2.40644 0.86639ZM2.40644 2.13306C2.6731 2.13306 2.91755 2.23306 3.13977 2.43306C3.36199 2.63306 3.4731 2.8775 3.4731 3.16639C3.4731 3.45528 3.36199 3.69972 3.13977 3.89972C2.91755 4.09972 2.6731 4.19972 2.40644 4.19972C2.13977 4.19972 1.89533 4.09972 1.6731 3.89972C1.45088 3.69972 1.33977 3.45528 1.33977 3.16639C1.33977 2.8775 1.45088 2.63306 1.6731 2.43306C1.89533 2.23306 2.13977 2.13306 2.40644 2.13306ZM2.40644 12.5331C1.78422 12.5331 1.25088 12.7553 0.806437 13.1997C0.361993 13.6442 0.139771 14.1886 0.139771 14.8331C0.139771 15.4775 0.361993 16.0219 0.806437 16.4664C1.25088 16.9108 1.78422 17.1331 2.40644 17.1331C3.02866 17.1331 3.56199 16.9108 4.00644 16.4664C4.45088 16.0219 4.6731 15.4775 4.6731 14.8331C4.6731 14.1886 4.45088 13.6442 4.00644 13.1997C3.56199 12.7553 3.02866 12.5331 2.40644 12.5331ZM2.40644 13.7997C2.6731 13.7997 2.91755 13.8997 3.13977 14.0997C3.36199 14.2997 3.4731 14.5442 3.4731 14.8331C3.4731 15.1219 3.36199 15.3664 3.13977 15.5664C2.91755 15.7664 2.6731 15.8664 2.40644 15.8664C2.13977 15.8664 1.89533 15.7664 1.6731 15.5664C1.45088 15.3664 1.33977 15.1219 1.33977 14.8331C1.33977 14.5442 1.45088 14.2997 1.6731 14.0997C1.89533 13.8997 2.13977 13.7997 2.40644 13.7997ZM9.0731 0.86639C8.45088 0.86639 7.91755 1.08861 7.4731 1.53306C7.02866 1.9775 6.80644 2.52195 6.80644 3.16639C6.80644 3.81083 7.02866 4.35528 7.4731 4.79972C7.91755 5.24417 8.45088 5.46639 9.0731 5.46639C9.69533 5.46639 10.2287 5.24417 10.6731 4.79972C11.1175 4.35528 11.3398 3.81083 11.3398 3.16639C11.3398 2.52195 11.1175 1.9775 10.6731 1.53306C10.2287 1.08861 9.69533 0.86639 9.0731 0.86639ZM9.0731 2.13306C9.33977 2.13306 9.58422 2.23306 9.80644 2.43306C10.0287 2.63306 10.1398 2.8775 10.1398 3.16639C10.1398 3.45528 10.0287 3.69972 9.80644 3.89972C9.58422 4.09972 9.33977 4.19972 9.0731 4.19972C8.80644 4.19972 8.56199 4.09972 8.33977 3.89972C8.11755 3.69972 8.00644 3.45528 8.00644 3.16639C8.00644 2.8775 8.11755 2.63306 8.33977 2.43306C8.56199 2.23306 8.80644 2.13306 9.0731 2.13306ZM9.0731 12.5331C8.45088 12.5331 7.91755 12.7553 7.4731 13.1997C7.02866 13.6442 6.80644 14.1886 6.80644 14.8331C6.80644 15.4775 7.02866 16.0219 7.4731 16.4664C7.91755 16.9108 8.45088 17.1331 9.0731 17.1331C9.69533 17.1331 10.2287 16.9108 10.6731 16.4664C11.1175 16.0219 11.3398 15.4775 11.3398 14.8331C11.3398 14.1886 11.1175 13.6442 10.6731 13.1997C10.2287 12.7553 9.69533 12.5331 9.0731 12.5331ZM9.0731 13.7997C9.33977 13.7997 9.58422 13.8997 9.80644 14.0997C10.0287 14.2997 10.1398 14.5442 10.1398 14.8331C10.1398 15.1219 10.0287 15.3664 9.80644 15.5664C9.58422 15.7664 9.33977 15.8664 9.0731 15.8664C8.80644 15.8664 8.56199 15.7664 8.33977 15.5664C8.11755 15.3664 8.00644 15.1219 8.00644 14.8331C8.00644 14.5442 8.11755 14.2997 8.33977 14.0997C8.56199 13.8997 8.80644 13.7997 9.0731 13.7997ZM15.7398 0.86639C15.1175 0.86639 14.5842 1.08861 14.1398 1.53306C13.6953 1.9775 13.4731 2.52195 13.4731 3.16639C13.4731 3.81083 13.6953 4.35528 14.1398 4.79972C14.5842 5.24417 15.1175 5.46639 15.7398 5.46639C16.362 5.46639 16.8953 5.24417 17.3398 4.79972C17.7842 4.35528 18.0064 3.81083 18.0064 3.16639C18.0064 2.52195 17.7842 1.9775 17.3398 1.53306C16.8953 1.08861 16.362 0.86639 15.7398 0.86639ZM15.7398 2.13306C16.0064 2.13306 16.2509 2.23306 16.4731 2.43306C16.6953 2.63306 16.8064 2.8775 16.8064 3.16639C16.8064 3.45528 16.6953 3.69972 16.4731 3.89972C16.2509 4.09972 16.0064 4.19972 15.7398 4.19972C15.4731 4.19972 15.2287 4.09972 15.0064 3.89972C14.7842 3.69972 14.6731 3.45528 14.6731 3.16639C14.6731 2.8775 14.7842 2.63306 15.0064 2.43306C15.2287 2.23306 15.4731 2.13306 15.7398 2.13306ZM15.7398 12.5331C15.1175 12.5331 14.5842 12.7553 14.1398 13.1997C13.6953 13.6442 13.4731 14.1886 13.4731 14.8331C13.4731 15.4775 13.6953 16.0219 14.1398 16.4664C14.5842 16.9108 15.1175 17.1331 15.7398 17.1331C16.362 17.1331 16.8953 16.9108 17.3398 16.4664C17.7842 16.0219 18.0064 15.4775 18.0064 14.8331C18.0064 14.1886 17.7842 13.6442 17.3398 13.1997C16.8953 12.7553 16.362 12.5331 15.7398 12.5331ZM15.7398 13.7997C16.0064 13.7997 16.2509 13.8997 16.4731 14.0997C16.6953 14.2997 16.8064 14.5442 16.8064 14.8331C16.8064 15.1219 16.6953 15.3664 16.4731 15.5664C16.2509 15.7664 16.0064 15.8664 15.7398 15.8664C15.4731 15.8664 15.2287 15.7664 15.0064 15.5664C14.7842 15.3664 14.6731 15.1219 14.6731 14.8331C14.6731 14.5442 14.7842 14.2997 15.0064 14.0997C15.2287 13.8997 15.4731 13.7997 15.7398 13.7997ZM1.80644 4.79972V13.1331C1.80644 13.3108 1.86199 13.4664 1.9731 13.5997C2.08422 13.7331 2.22866 13.7997 2.40644 13.7997C2.58422 13.7997 2.72866 13.7331 2.83977 13.5997C2.95088 13.4664 3.00644 13.3331 3.00644 13.1997V4.79972C3.00644 4.66639 2.95088 4.53306 2.83977 4.39972C2.72866 4.26639 2.58422 4.19972 2.40644 4.19972C2.22866 4.19972 2.08422 4.26639 1.9731 4.39972C1.86199 4.53306 1.80644 4.66639 1.80644 4.79972ZM8.4731 4.79972V13.1331C8.4731 13.3108 8.52866 13.4664 8.63977 13.5997C8.75088 13.7331 8.89533 13.7997 9.0731 13.7997C9.25088 13.7997 9.39533 13.7331 9.50644 13.5997C9.61755 13.4664 9.6731 13.3331 9.6731 13.1997V4.79972C9.6731 4.66639 9.61755 4.53306 9.50644 4.39972C9.39533 4.26639 9.25088 4.19972 9.0731 4.19972C8.89533 4.19972 8.75088 4.26639 8.63977 4.39972C8.52866 4.53306 8.4731 4.66639 8.4731 4.79972ZM15.1398 4.79972V8.13306C15.1398 8.22195 15.1175 8.28861 15.0731 8.33306C15.0287 8.3775 14.9842 8.39972 14.9398 8.39972H2.40644C2.22866 8.39972 2.08422 8.45528 1.9731 8.56639C1.86199 8.6775 1.80644 8.82195 1.80644 8.99972C1.80644 9.1775 1.86199 9.32195 1.9731 9.43306C2.08422 9.54417 2.22866 9.59972 2.40644 9.59972H14.9398C15.3398 9.59972 15.6731 9.46639 15.9398 9.19972C16.2064 8.93306 16.3398 8.5775 16.3398 8.13306V4.86639C16.3398 4.68861 16.2842 4.53306 16.1731 4.39972C16.062 4.26639 15.9175 4.19972 15.7398 4.19972C15.562 4.19972 15.4175 4.26639 15.3064 4.39972C15.1953 4.53306 15.1398 4.66639 15.1398 4.79972Z"
                                    fill="black" />
                        </svg>

                    </h2>
                    <p class="text-secondary fw-medium  lh-base fs-14">
                        {{ $item->carDetails->transmission
                              ? __('front.' . $item->carDetails->transmission)
                              : 'N/A'
                          }}
                    </p>
                </div>
                @elseif($type == \App\Enums\AdTypesEnum::LICENSE_PLATE)
                    <div class=" col-12 d-flex gap-2 flex-wrap justify-content-between">
                        @php
                            $digitTranslations = [
                                1 => 'front.one_digit',
                                2 => 'front.two_digits',
                                3 => 'front.three_digits',
                                4 => 'front.four_digits',
                                5 => 'front.five_digits',
                                6 => 'front.six_digits',
                            ];
                        @endphp

                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                {{ __($digitTranslations[$item->plateDetails->digit_count] ?? '') }}
            </span>
                        <span class="bg-Secondary-color p-2 rounded-2 text-dark price-badge text-muted fs-12">
                {{ __('front.' . $item->plateDetails->usage_type) }}
            </span>
                    </div>
                @endif



            </div>

            {{--Details--}}
            @if($type == \App\Enums\AdTypesEnum::CAR)
                <div class="row bg-white py-3 gap-3 px-2 rounded-3 border-color border mb-3">

                <div class="col-lg-12 ">
                    <h6 class="fs-24 fw-bold mb-0 py-2">
                        {{ __('front.details_and_addons') }}
                    </h6>
                    <ul class="row px-0 py-2 Car-Details justify-content-between gy-3">
                        @forelse($item->carDetails->features as $feature)
                            <li class="col-lg-4 col-md-6 d-flex align-items-center gap-2">

                                @if($feature->icon)
                                    <img src="{{ asset( $feature->icon) }}"
                                         alt="{{ app()->getLocale() == 'ar' ? $feature->title_ar : $feature->title_en }}"
                                         width="20">
                                @endif

                                <span class="fw-semibold">
                        {{ app()->getLocale() == 'ar' ? $feature->title_ar : $feature->title_en }}
                    </span>

                                <span class="text-muted">
                        : {{ $feature->pivot->value }}
                    </span>
                            </li>
                        @empty
                            <li class="col-12 text-muted">
                                {{ __('front.no_addons_for_car') }}
                            </li>
                        @endforelse
                    </ul>


                </div>
            </div>
            @endif

            {{--Comment--}}
            <form id="commentForm" class="row bg-white py-3 gap-3 px-2 rounded-3 border-color border mb-3">
                <h3 class="fs-24 fw-semibold">
                    {{ __('front.leave_review') }}
                </h3>
                <div class="col-12">
                    <label for="Notes" class="form-label fw-semibold mb-3">
                        {{ __('front.review') }}
                    </label>
                    <div class="input-group mb-3">
            <textarea style="resize: none;" class="form-control rounded-4 bg-white border p-3" id="Notes"
                      rows="5" placeholder="{{ __('front.your_review') }}"></textarea>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center">
                    <button type="submit" class="bg-primary-color text-white py-2 w-auto px-5 rounded-3 my-2 btn fw-medium">
                        {{ __('front.send_review') }}
                    </button>
                </div>
            </form>

            {{--Comments--}}
            <div id="commentsContainer" class="row bg-white py-3 gap-3 px-2 rounded-3 border-color border mb-3">
                <h3 class="fw-semibold" id="commentsCount">
                    {{ __('front.reviews', ['count' => $item->comments->count()]) }}
                </h3>

                <div class="comments-list">
                    @foreach($item->comments as $comment)
                        <div class="col-lg-12 align-items-center d-flex justify-content-between py-2 border-bottom item">
                            <div class="py-2 w-100">
                                <div class="d-flex gap-3 position-relative">
                                    <div
                                            class="bg-white img rounded-circle primary-color img-card overflow-hidden d-flex justify-content-center align-items-center"
                                            style="width:40px;height:40px ">
                                    </div>
                                    <div class="fw-medium d-flex flex-column gap-2" style="flex: 1;">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h1 class="fs-18 fw-medium mb-2">{{$comment->user->name}}</h1>
                                                <h6 class="mb-0">{{ $comment->created_at_human }}</h6>
                                            </div>
                                        </div>
                                        <p class="text-secondary mb-2">{{$comment->content}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-5  col-12">

            {{--side--}}
            <div class="row gap-3 ">
                <div class="col-12">
                    <div class="border rounded-3 h-100 bg-white py-4 gap-3 px-2 border-color border">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-24 mb-0 py-2">
                                    {{ __('front.price') }}
                                    @if($item->negotiable)
                                        : {{ __('front.negotiable') }}
                                    @endif
                                </h6>

                                <p class="primary-color">
                                        <span class="fw-bold">{{ number_format($item->price) }}</span>
                                        <span>{{ __('front.price_currency') }}</span>
                                </p>
                            </div>

                            <div>
                                {{-- SVG --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    @php
                        $phoneCode = $item->user->phone_code ?? '';
                        $phone     = $item->user->phone ?? '';
                        $fullPhone = $phoneCode . $phone;
                    @endphp
                    <div class="border rounded-3  h-100 bg-white py-3 gap-3 px-2  border-color border mb-3">
                        <h6 class="fs-24 fw-bold mb-0 py-2">{{ __('front.ad_owner') }}</h6>
                        <div class="d-flex py-2 align-items-center gap-2 flex-column">
                            <h3 class="fw-medium text-dark mb-0">{{$item->user->name}}</h3>
                        </div>
                        <div class="d-flex  gap-2">
                            <a class="fs-16 text-white text-center fw-semibold bg-primary-color w-100 d-flex gap-2 align-items-center justify-content-center py-2 rounded-3"
                               href="tel:{{ $fullPhone }}" target="_blank"><span><i class="fa-solid fa-phone"></i></span><span>{{ __('front.call') }}</span></a>
                            <a class="fs-16 text-white text-center fw-semibold bg-whatsapp w-100 d-flex gap-2 align-items-center justify-content-center py-2 rounded-3"
                               href="https://wa.me/{{ ltrim($fullPhone, '+') }}" target="_blank"><span><i class="fa-brands fa-whatsapp"></i></span><span>{{ __('front.whatsapp') }}</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    @php
                        $phoneCode = $item->phone_code ?? '';
                        $phone     = $item->owner_phone ?? '';
                        $fullPhone = $phoneCode . $phone;
                    @endphp
                    <div class="border rounded-3  h-100 bg-white py-3 gap-3 px-2  border-color border mb-3">
                        <div class="d-flex py-2 align-items-center gap-2">
                            <h3 class="fw-medium text-dark mb-0">{{$item->owner_name}}</h3>
                        </div>
                        <div class="d-flex  gap-2">
                            <a class="fs-16 text-white text-center fw-semibold bg-primary-color w-100 d-flex gap-2 align-items-center justify-content-center py-2 rounded-3"
                               href="tel:{{ $fullPhone }}" target="_blank"><span><i class="fa-solid fa-phone"></i></span><span>{{ __('front.call') }}</span></a>
                            <a class="fs-16 text-white text-center fw-semibold bg-whatsapp w-100 d-flex gap-2 align-items-center justify-content-center py-2 rounded-3"
                               href="https://wa.me/{{ ltrim($fullPhone, '+') }}" target="_blank"><span><i class="fa-brands fa-whatsapp"></i></span><span>{{ __('front.whatsapp') }}</span></a>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

<div class="container py-lg-5 py-md-4 py-3 section-top overflow-hidden position-relative">
    <div class="row py-lg-5 py-2 justify-content-between align-items-center">
        <div class="col-9">
            <h3 class="fw-semibold py-2" data-aos="fade-down" data-aos-duration="1500">{{ __('front.may_also_like') }}</h3>
            <p class="text-secondary" data-aos="fade-up" data-aos-duration="1500">{{ __('front.may_also_like_desc') }} </p>
        </div>
    </div>
    <div class="row  py-lg-5 py-3  service-slider">
        @if($type == \App\Enums\AdTypesEnum::LICENSE_PLATE)
            @foreach($items as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    @include('Client.partials.plate-card',['item'=>$item])
                </div>
            @endforeach
        @elseif($type==\App\Enums\AdTypesEnum::ACCESSORY)
            @foreach($items as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    @include('Client.partials.accessory-card',['item'=>$item])
                </div>
            @endforeach
        @elseif($type==\App\Enums\AdTypesEnum::SPARE_PART)
            @foreach($items as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    @include('Client.partials.spare-part-card',['item'=>$item])
                </div>
            @endforeach
        @else
            @foreach($items as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    @include('Client.partials.car-card',['item'=>$item])
                </div>
            @endforeach
        @endif
    </div>
</div>


<footer id="footer">
</footer>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.addtosave').click(function(e) {
                e.preventDefault();

                var link = $(this);
                var heartIcon = link.find('.heart-icon');
                var heartPath = link.find('.heart-path');
                var adId = link.data('id');

                $.ajax({
                    url: "{{ route('client.favorites.toggle') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        ad_id: adId
                    },
                    success: function(response) {
                        if(response.status == 'added') {
                            heartIcon.addClass('favorited');
                            heartPath.attr('fill', '#EF4444');
                            heartPath.attr('stroke', '#EF4444');
                        } else {
                            heartIcon.removeClass('favorited');
                            heartPath.attr('fill', 'none');
                            heartPath.attr('stroke', '#4B5563');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 401) {
                            window.location.href = "{{ route('login') }}";
                        } else {
                            alert('حدث خطأ، الرجاء المحاولة مرة أخرى');
                        }
                    }

                });
            });
        });
    </script>

    Favorit
    <script>
        document.querySelectorAll('.like-btn').forEach(button => {
            button.addEventListener('click', function() {
                const adId = this.dataset.adId;
                const icon = this.querySelector('i');

                fetch(`{{ route('client.like.toggle') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ ad_id: adId })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.liked) {
                            icon.classList.remove('far');
                            icon.classList.add('fas');
                        } else {
                            icon.classList.remove('fas');
                            icon.classList.add('far');
                        }
                    })
                    .catch(err => console.error(err));
            });
        });
    </script>

    Like
    <script>
    </script>

    Comment
    <script>
        document.getElementById('commentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const textarea = document.getElementById('Notes');
            const content = textarea.value.trim();
            if(!content) return alert('Please write a comment.');

            const lang = '{{ app()->getLocale() }}';
            const adId = {{ $item->id }};

            fetch(`/${lang}/ads/${adId}/comment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ content })
            })
                .then(res => {
                    if(!res.ok) throw new Error('Failed to post comment');
                    return res.json();
                })
                .then(data => {
                    const commentHTML = `
        <div class="col-lg-12 align-items-center d-flex justify-content-between py-2 border-bottom item">
            <div class="py-2 w-100">
                <div class="d-flex gap-3 position-relative">
                    <div class="bg-white img rounded-circle primary-color img-card overflow-hidden d-flex justify-content-center align-items-center" style="width:40px;height:40px "></div>
                    <div class="fw-medium d-flex flex-column gap-2" style="flex: 1;">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h1 class="fs-18 fw-medium mb-2">${data.user_name}</h1>
                                <h6 class="mb-0">${data.created_at_human}</h6>
                            </div>
                        </div>
                        <p class="text-secondary mb-2">${data.content}</p>
                    </div>
                </div>
            </div>
        </div>
    `;

                    // استخدم insertAdjacentHTML بدل prepend
                    document.querySelector('#commentsContainer .comments-list').insertAdjacentHTML('afterbegin', commentHTML);

                    const countElem = document.getElementById('commentsCount');
                    let currentCount = parseInt(countElem.textContent.match(/\d+/)[0]);
                    countElem.textContent = `Reviews (${currentCount + 1})`;

                    textarea.value = '';
                })
                .catch(err => console.error(err));
        });
    </script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            $('.slider-for').slick({
                slidesToShow: 1,
                rtl: false,
                slidesToScroll: 1,
                arrows: true,
                fade: true,
                asNavFor: '.slider-nav',
                prevArrow: `<button class="prev-button btn rounded-2 bg-primary-color text-white"><i class="fa-solid fa-chevron-left"></i></button>`,
                nextArrow: `<button class="next-button btn rounded-2 bg-primary-color text-white"><i class="fa-solid fa-chevron-right"></i></button>`,
            });
            $('.slider-nav').slick({
                slidesToShow: 5,
                rtl: false,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                arrows: false,
                centerMode: false,
                focusOnSelect: true,
            });

            $('.slider-for').on('afterChange', function(event, slick, currentSlide){
                $('.current-slide').text(currentSlide + 1);
            });

        });
    </script>

@endpush
@endsection
