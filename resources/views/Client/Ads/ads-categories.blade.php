@extends('Client.layouts.layout')

@section('content')

<div class="" id="navBar">

</div>

<div class="container py-lg-5 py-3">
    <div class="row">
        <div class="col-12 d-flex justify-content-between  border-bottom">
            <h2>{{ __('front.publish_your_ad') }}</h2>

            <a class="navbar-brand overflow-hidden  text-center  m-0" href="{{route('client.home')}}">

                <img class="img-fluid w-auto" src="{{asset(setting('logo'))}}">
            </a>

        </div>
    </div>
    <div class="row py-4">
        <div class="col-12">
            <h3 class="primary-color fw-bold">{{ __('front.choose_category') }}</h3>

        </div>
    </div>
    <div class="row   regular py-2 overflow-hidden gy-4">
        @foreach($categories as $category)
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="img-card  justify-content-start h-auto p-3 d-flex  shadow-sm rounded-2 h-auto gap-2  bg-white ">
                <div class="overflow-hidden p-1 rounded-2 bg-Secondary-color" style="height: 40px;width: 40px;">
                    <img class="w-100" src="{{asset($category->icon)}}">
                </div>
                <div class="d-flex justify-content-between w-100">
                    <h5 class="fs-18  mb-0 fw-bold lh-base">
                        {{$category->trans('title')}}
                    </h5>

                    <a class=" primary-color d-flex align-items-center gap-2" href="detailsPage.html"><span><i class="fa-solid fa-arrow-right arrow"></i></span></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div id="footer">


</div>

@endsection