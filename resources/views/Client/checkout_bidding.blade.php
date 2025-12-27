@extends('Client.layouts.layout')

@section('content')
    <!-- NavBar -->
    <main-header></main-header>
    <!-- NavBar -->

    <section class="py-5 section-background" style="background-image: url('{{ asset('assets/images/section-bg.png') }}')">
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-md-12 section-content justify-content-center align-items-center d-flex flex-column mt-5">
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    @if(lang('en'))
                        {{ 'Al Ameed Car Bidding' }}
                    @elseif(lang('ar'))
                        {{ 'مزاد العميد للسيارات' }}
                    @endif
                </h1>
                <p class="text-white col-xl-7 col-lg-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    @if(lang('en'))
                        {{ 'Discover exclusive car deals and bid easily — convenient, transparent, and tailored for you.' }}
                    @elseif(lang('ar'))
                        {{ 'اكتشف عروض السيارات الحصرية وقدم عروضك بسهولة - مريحة وشفافة ومصممة خصيصًا لك.' }}
                    @endif
                </p>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-3">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h5 class="text-success fw-bold">{{ $Bidding->title() }}</h5>
                    <span class="text-primary fw-medium">{{ __('trans.AuctionID') }}: {{ $Bidding->id }}</span>
                </div>
                <div class="col-lg-5 d-flex justify-content-md-end mt-3 mt-md-0 align-items-md-end flex-column">
                    <div class="bg-light-soft p-3 py-4 rounded-3 text-center col-lg-7">
                        <h6 class="text-primary fw-semibold mb-">
                            <svg class="mt-n1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.75 13.25C20.75 18.08 16.83 22 12 22C7.17 22 3.25 18.08 3.25 13.25C3.25 8.42 7.17 4.5 12 4.5C16.83 4.5 20.75 8.42 20.75 13.25Z" stroke="#CD2E29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 8V13" stroke="#CD2E29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9 2H15" stroke="#CD2E29" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            {{ __('trans.TimeLeft') }}:
                        </h6>
                        <span class="text-info" id="bidCountdown"></span>

                        <script>
                            let bidTime = new Date("{{ $Bidding->bid_time }}").getTime();

                            let countdown = setInterval(function() {
                                let now = new Date().getTime();
                                let distance = bidTime - now;

                                if (distance < 0) {
                                    clearInterval(countdown);
                                    document.getElementById("bidCountdown").innerHTML = "EXPIRED";
                                    return;
                                }

                                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                document.getElementById("bidCountdown").innerHTML =
                                    `${days}D: ${hours}H: ${minutes}M: ${seconds}S`;
                            }, 1000);
                        </script>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-xl-7 col-lg-6">
                    <div class="col-12 mb-3 position-relative">

                        <div class="slider-for">
                            @foreach ($Bidding->Images as $Image)
                                <div class="height-350">
                                    <img src="{{ $Image->image }}" class="img-fluid w-100 h-100 rounded-2 object-fit-cover" />
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mb-3 align-items-center position-relative">
                            <div class="position-absolute bottom-0 mb-3 col-11 p-2 bg-dark-50 rounded-3 d-flex overflow-auto thumbnail-wrapper">
                                @foreach ($Bidding->Images as $Image)
                                    <div class="height-100 mx-2 thumb-item" data-index="{{ $loop->index }}">
                                        <img height="100%" style="min-width:100px" src="{{ $Image->image }}" class="img-fluid rounded-2 w-100 h-100 object-fit-cover" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h5 class="fw-semibold text-success">{{ __('trans.VehicleSpecification') }}</h5>

                        <div class="row flex-wrap justify-content-between mb-3 w-100">
                            @foreach ($Bidding->Specifications as $Specification)
                                <div class="col-6 col-md-4 col-xxl-3 d-flex flex-column text-center gap-1">
                                    <span style="background: red;border-radius: 50%;width: min-content;margin: auto;padding: 6px 10px;" >
                                        <img style="height:auto" width="25px" src="{{ asset($Specification->image) }}">
                                    </span>
                                    <span class="text-info fw-500 fs-14">{{ $Specification->title() }}</span>
                                    <span class="text-info fw-500 fs-14">{{ $Specification->pivot->{'title_'.lang()} }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6">

                    <div class="card bg-secondary-light border-0 rounded-3 px-3 py-4">
                        {!! nl2br(e($Bidding->desc())) !!}
                    </div>
                    
                    <br>
                    <br>
                    <br>

                    <div class="card bg-secondary-light border-0 rounded-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-success fw-semibold fs-18">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none">
                                        <path d="M21.7705 16.8045L13.6829 9.62256L12.1025 11.203L19.2844 19.2905C19.9591 20.0558 21.1365 20.092 21.8565 19.372C22.5765 18.652 22.5357 17.4746 21.7705 16.8045Z" fill="#CD2E29" />
                                        <path d="M12.0979 18.5749C12.0979 17.7644 11.4413 17.1123 10.6353 17.1123H4.67601C3.86999 17.1123 3.21338 17.7644 3.21338 18.5749V19.227H12.0979V18.5749Z" fill="#CD2E29" />
                                        <path d="M12.2201 19.6799H3.09105C2.28503 19.6799 1.62842 20.332 1.62842 21.1426V22.2973C1.62842 22.5735 1.85483 22.7999 2.13105 22.7999H13.1801C13.4609 22.7999 13.6828 22.5735 13.6828 22.2973V21.1426C13.6828 20.332 13.0261 19.6799 12.2201 19.6799Z" fill="#CD2E29" />
                                        <path d="M5.94141 8.07666L10.5631 3.45496L14.8813 7.77316L10.2596 12.3949L5.94141 8.07666Z" fill="#CD2E29" />
                                        <path d="M15.2923 7.54764C15.7175 7.97286 16.4057 7.97289 16.8309 7.54764C17.2562 7.12242 17.2561 6.43422 16.8309 6.009L12.338 1.51613C12.1254 1.30351 11.8457 1.19721 11.5687 1.2C11.2918 1.19721 11.012 1.30351 10.7994 1.51613C10.3742 1.94138 10.3742 2.62955 10.7994 3.0548L15.2923 7.54764Z" fill="#CD2E29" />
                                        <path d="M8.49098 14.3485C8.9162 14.7737 9.6044 14.7737 10.0297 14.3485C10.4549 13.9232 10.4548 13.235 10.0297 12.8098L5.53678 8.31697C5.32416 8.10434 5.0444 7.99805 4.77025 7.99805C4.49049 7.99805 4.21074 8.10434 3.99811 8.31697C3.57289 8.74219 3.57289 9.43039 3.99811 9.85561L8.49098 14.3485Z" fill="#CD2E29" />
                                    </svg>
                                    {{ __('trans.Auction') }}
                                </div>
                                <h6 class="text-success fw-semibold fs-18 mb-0">
                                    3 {{ __('trans.Bids') }}
                                </h6>
                            </div>
                            @if(now()->lt($Bidding->bid_time))
                            <hr>
                            <form class="row" action="{{ route('client.bid') }}" method="POST">
                                @csrf
                                <input type="hidden" id="bidding_id" name="bidding_id" value="{{ $Bidding->id }}">
                                <div class="col-lg-12 mb-4">
                                    <label for="name" class="text-heading fw-semibold mb-2">{{ __('trans.name') }}</label>
                                    <input type="text" class="form-control border-primary" id="name" name="name" required>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label for="phone" class="text-heading fw-semibold mb-2">{{ __('trans.phone') }}</label>
                                    
                                    <input type="hidden" id="country_code" name="country_code" value="BH">
                                    <input type="hidden" id="phone_code" name="phone_code" value="973">
                                    <input type="tel" class="form-control border-primary" id="phone" name="phone" required>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <label for="email" class="text-heading fw-semibold mb-2">{{ __('trans.email') }}</label>
                                    <input type="email" class="form-control border-primary" id="email" name="email" required>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <label for="bid" class="text-heading fw-semibold mb-2">{{ __('trans.EnterBid') }}</label>
                                    <input type="number" min="0" step="0.001" class="form-control border-primary" id="bid" name="bid" required>
                                </div>

                                <button type="submit" class="btn btn-primary rounded-3 w-100">{{ __('trans.BidNow') }}</button>

                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
