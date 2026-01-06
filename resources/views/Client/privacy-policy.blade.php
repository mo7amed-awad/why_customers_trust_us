@extends('Client.layouts.layout')

@section('content')

<nav id="navBar">

</nav>


<div class="container-fluid mb-lg-5 mb-md-4 mb-3">
    <div class="row   align-items-center">
        <div
                class="col-12 d-flex  header-div services px-0 justify-content-center overflow-hidden align-items-cnter position-relative">
            <img class="w-100 w-100 object-fit-cover" src="{{asset('assets/imgs/home/about-cover.jpg')}}" />
            <div
                    class="layer position-absolute  top-0 bottom-0 end-0 start-0 px-lg-5 px-2 d-flex align-items-center justify-content-center text-center">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-10">
                        <h3 class="text-white fw-semibold py-2" data-aos="fade-up" data-aos-duration="1500">
                            {{ __('front.privacy_policy_title') }}
                        </h3>
                        <p class="text-white" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">{{ __('front.terms_hint') }} </p>

                    </div>

                </div>
            </div>


        </div>



    </div>

</div>
<div class="container py-lg-5 py-3 mb-lg-5 mb-3 section-top">
    <div class="row py-2">
        <h1 class=" fw-semibold fs-24" >    {{ __('front.privacy_policy_title') }}</h1>
    </div>
    @foreach($privacy as $item)
        <div class="row ">
        <h6 class="py-2 fw-bold">{{$item->trans('title')}}</h6>
        <p class="fs-6">{{$item->trans('desc')}}</p>

    </div>
    @endforeach
</div>


<footer id="footer">
</footer>

@endsection