@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.rental_requests'))
@section('content')
    <form method="POST" action="{{ route('admin.rental_requests.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
            <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="200px">
        </div>
        <div class="row">

            <div class="form-group col-md-6">
                <label for="name">@lang('trans.name')</label>
                <input type="text" name="name" id="name" class="form-control" required
                    value="{{ old('name') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="email">@lang('trans.email')</label>
                <input type="text" name="email" id="email" class="form-control" required
                    value="{{ old('email') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="phone">@lang('trans.phone')</label>
                <input type="hidden" name="country_code" id="country_code" class="form-control" required
                    value="{{ old('country_code') }}">
                <input type="hidden" name="phone_code" id="phone_code" class="form-control" required
                    value="{{ old('phone_code') }}">
                <input type="tel" name="phone" id="phone" class="form-control" required
                    value="{{ old('phone') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="sub_total">@lang('trans.sub_total')</label>
                <input type="number" step="0.001" min="0" name="sub_total" id="sub_total" class="form-control"
                    required value="{{ old('sub_total') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="vat">@lang('trans.vat')</label>
                <input type="number" step="0.001" min="0" name="vat" id="vat" class="form-control"
                    required value="{{ old('vat') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="net_total">@lang('trans.net_total')</label>
                <input type="number" step="0.001" min="0" name="net_total" id="net_total" class="form-control"
                    required value="{{ old('net_total') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="rental_id">@lang('trans.rental')</label>
                <select class="form-control" required id="rental_id" name="rental_id">
                    <option disabled hidden selected>@lang('trans.Select')</option>
                    @foreach ($Rentals as $Rental)
                        <option value="{{ $Rental->id }}">{{ $Rental->title() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="payment_id">@lang('trans.payment')</label>
                <select class="form-control" required id="payment_id" name="payment_id">
                    <option disabled hidden selected>@lang('trans.Select')</option>
                    @foreach ($Payments as $Payment)
                        <option value="{{ $Payment->id }}">{{ $Payment->title() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-sm-12 my-4">
                    <div class="text-center p-20">
                        <button type="submit" class="main-btn">{{ __('trans.add') }}</button>
                        <button type="reset" class="btn btn-secondary">{{ __('trans.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @include('phone')
@endsection
