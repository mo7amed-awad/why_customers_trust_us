@extends('Client.layouts.layout')
@section('content')
    <section class="py-5 section-background" style="background-image: url('{{ asset('assets/images/section-bg.png') }}')">
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-md-12 section-content justify-content-center align-items-center d-flex flex-column mt-5">
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    @if(lang('ar'))
                        {{ 'خدمة ليموزين العميد' }}
                    @elseif(lang('en'))
                        {{ 'Al Ameed Limousine Service' }}
                    @endif
                </h1>
                <p class="text-white col-xl-8 col-lg-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    @if(lang('ar'))
                        {{ 'سافر براحة وأناقة مع خدمة الليموزين الاحترافية لدينا - موثوقة وأنيقة ومتاحة في أي وقت تحتاج إليها.' }}
                    @elseif(lang('en'))
                        {{ 'Travel in comfort and style with our professional limousine service — reliable, elegant, and available anytime you need it.' }}
                    @endif
                </p>
            </div>
        </div>
    </section>


    @if($Services->count())
    <section class="position-relative">

        <div class="container py-5">
            <div class="heading py-md-4 d-flex flex-column justify-content-md-center align-items-md-center text-md-center">
                <h2 class="text-primary fw-bold" data-aos="zoom-in-up" data-aos-duration="800">
                    <span class="text-heading text-primary">{{ __('trans.Our Services') }}</span>
                </h2>
            </div>


            <div class="row g-4 mt-2 pb-5">

                @foreach ($Services as $Service)
                    <div class="col-lg-4 col-md-6 col-6" data-aos="fade-up" data-aos-delay="0">
                        @include('Client.layouts.service-card',['Service'=>$Service])
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    @endif

@endsection
