@extends('Client.layouts.layout')

@section('header')
<div class="cart-header">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('client.home') }}" class="text-decoration-none text-accent fw-semibold">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15 19L8 12L15 5" stroke="#0D0D0D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            {{ __('trans.back') }}
        </a>
    </div>
</div>
@endsection

@section('content')

@php
    $rentalDetails = session('rental_details', [
        'pickup_location' => __('trans.not_selected'),
        'pickup_date' => null,
        'pickup_time' => null,
        'return_location' => __('trans.not_selected'),
        'return_date' => null,
        'return_time' => null,
    ]);

    $pickupDateTime = $rentalDetails['pickup_date'] && $rentalDetails['pickup_time']
        ? \Carbon\Carbon::parse($rentalDetails['pickup_date'].' '.$rentalDetails['pickup_time'])->format('D, d. M, Y | H:i')
        : __('trans.not_selected');

    $returnDateTime = $rentalDetails['return_date'] && $rentalDetails['return_time']
        ? \Carbon\Carbon::parse($rentalDetails['return_date'].' '.$rentalDetails['return_time'])->format('D, d. M, Y | H:i')
        : __('trans.not_selected');

    $rentalDays = ($rentalDetails['pickup_date'] && $rentalDetails['return_date'])
        ? \Carbon\Carbon::parse($rentalDetails['pickup_date'])->diffInDays(\Carbon\Carbon::parse($rentalDetails['return_date'])) + 1
        : 0;
@endphp

<section class="bg-white">
    <form action="{{ route('client.rent') }}" method="POST">
        @csrf
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="cart-section mb-5">
                        <div class="col-12 mb-3 position-relative">

                            <div class="slider-for">
                                @foreach ($Rental->Images as $Image)
                                    <div class="height-350">
                                        <img src="{{ $Image->image }}" class="img-fluid w-100 h-100 rounded-2 object-fit-cover" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center mb-3 align-items-center position-relative">
                                <div class="position-absolute bottom-0 mb-3 col-11 p-2 bg-dark-50 rounded-3 d-flex overflow-auto thumbnail-wrapper">
                                    @foreach ($Rental->Images as $Image)
                                        <div class="height-100 mx-2 thumb-item" data-index="{{ $loop->index }}">
                                            <img height="100%" style="min-width:100px" src="{{ $Image->image }}" class="img-fluid rounded-2 w-100 h-100 object-fit-cover" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <h4 class="text-accent fw-semibold mb-4">{{ __('trans.personal_details') }}</h4>
                        <input hidden id="rental_id" name="rental_id" value="{{ $Rental->id }}">
                        <div class="row checkout-form mb-4">
                            <div class="col-lg-6 mb-4">
                                <label for="name" class="text-heading fw-semibold mb-2">{{ __('trans.name') }}</label>
                                <input type="text" class="form-control border-light" id="name" name="name" required>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="email" class="text-heading fw-semibold mb-2">{{ __('trans.email') }}</label>
                                <input type="email" class="form-control border-light" id="email" name="email" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="phone" class="text-heading fw-semibold mb-2">{{ __('trans.phone') }}</label>
                                <input type="tel" class="form-control border-light phone" id="phone" name="phone" required>
                            </div>
                        </div>

                        
                        <div>
                            <h4 class="text-accent fw-semibold">{{ __('trans.your_order') }}</h4>
                            <div class="cart-item border">
                                <div>
                                    <div class="d-flex flex-row flex-wrap gap-3 align-items-center">
                                        <div class="car-img">
                                            <img src="{{ asset($Rental->Image?->image ?? setting('logo')) }}" class="w-100 h-100 object-fit-cover" alt="{{ $Rental->title() }}">
                                        </div>
                                        <div class="cart-info mt-4 mt-md-0">
                                            <h5 class="fw-semibold text-accent">{{ $Rental->title() }}</h5>
                                            <p class="price mt-2">
                                                <span class="item-price text-primary">{{ $rentalDays }} {{ __('trans.rental_days') }} * BHD {{ format_number($Rental->price) }}</span>
                                            </p>
                                        </div>
                                        <div class="row flex-wrap justify-content-between mb-3 w-100">
                                            @foreach ($Rental->Specifications as $Specification)
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

                                    <div class="d-flex flex-column gap-4 mt-4">
                                        {{-- Pickup --}}
                                        <div class="d-flex gap-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <span>
                                                    <!-- Pickup SVG -->
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-info fw-semibold">{{ __('trans.pickup') }}</div>
                                                <div class="fw-accent fw-semibold">{{ $rentalDetails['pickup_location'] }}</div>
                                                <div class="text-accent">{{ $pickupDateTime }}</div>
                                            </div>
                                        </div>

                                        {{-- Return --}}
                                        <div class="d-flex gap-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <span>
                                                    <!-- Return SVG -->
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-info fw-semibold">{{ __('trans.return') }}</div>
                                                <div class="fw-accent fw-semibold">{{ $rentalDetails['return_location'] }}</div>
                                                <div class="text-accent">{{ $returnDateTime }}</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Summary & Payment --}}
                <div class="col-md-6 mt-5 mt-md-0">
                    <h4 class="text-accent fw-semibold">{{ __('trans.summary') }}</h4>
                    <div class="summary-box mb-4 bg-light-soft">
                        @php($subtotal = $Rental->price * $rentalDays)
                        <div class="d-flex justify-content-between">
                            <p class="text-accent-alt fw-medium">{{ __('trans.subtotal') }}</p>
                            <p class="text-accent-alt fw-semibold">
                                <span id="subtotal"> BHD {{ format_number($subtotal) }}</span>
                            </p>
                        </div>
                        @php($vat = $Rental->price/100*setting('vat'))
                        <div class="d-flex justify-content-between">
                            <p class="text-accent-alt fw-medium">{{ __('trans.estimated_vat') }}</p>
                            <p class="text-accent-alt fw-semibold">
                                <span id="vat"> BHD {{ format_number($vat) }}</span>
                            </p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between total">
                            <p class="text-accent-alt fw-semibold fs-5">{{ __('trans.total') }} <small class="fw-400 fs-14">({{ __('trans.inclusive_vat') }})</small></p>
                            <p class="fs-5 text-accent-alt">
                                <span id="total"> BHD {{ format_number($subtotal + $vat) }}</span>
                            </p>
                        </div>
                    </div>

                    <h4 class="text-accent fw-semibold">{{ __('trans.payment_method') }}</h4>
                    <div class="card rounded-4 border">
                        <div class="card-body">
                            <form action="">
                                @foreach ($Payments as $Payment)
                                    <label for="payment-{{ $loop->index }}" class="d-flex justify-content-between p-2 pb-3 rounded-0 border-bottom mb-3 form-check-label cursor-pointer px-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <input id="payment-{{ $loop->index }}" class="form-check-input fs-5 mt-n1" type="radio" name="payment_id" value="{{ $Payment->id }}" @checked($loop->first)>
                                            <div><img width="30px" src="{{ asset($Payment->image) }}" alt="{{ $Payment->title() }}"></div>
                                            <span class="text-heading fw-semibold">{{ $Payment->title() }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </form>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-flex gap-3 mt-4 mt-md-4">
                        <button class="btn btn-primary rounded-3 flex-fill">{{ __('trans.submit') }}</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</section>

@endsection
