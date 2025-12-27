@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.bid_requests'))
@section('content')
    <form method="POST" action="{{ route('admin.bid_requests.update', $Model) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">


            <div class="form-group col-md-6">
                <label for="name">@lang('trans.name')</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $Model['name']) }}">
            </div>
            <div class="form-group col-md-6">
                <label for="email">@lang('trans.email')</label>
                <input type="text" name="email" id="email" class="form-control" required value="{{ old('email', $Model['email']) }}">
            </div>


            <div class="form-group col-md-6">
                <label for="phone">@lang('trans.phone')</label>
                <input type="hidden" name="country_code" id="country_code" class="form-control" required value="{{ old('country_code',$Model->country_code) }}">
                <input type="hidden" name="phone_code" id="phone_code" class="form-control" required value="{{ old('phone_code',$Model->phone_code) }}">
                <input type="tel" name="phone" id="phone" class="form-control" required value="{{ old('phone',$Model->phone) }}">
            </div>

            <div class="form-group col-md-6">
                <label for="bid">@lang('trans.bid')</label>
                <input type="number" step="0.001" min="0" name="bid" id="bid" class="form-control" required value="{{ old('bid',$Model->bid) }}">
            </div>

            <div class="form-group col-md-6">
                <label for="bidding_id">@lang('trans.bidding')</label>
                <select class="form-control" required id="bidding_id" name="bidding_id">
                    <option disabled hidden selected>@lang('trans.Select')</option>
                    @foreach ($Biddings as $Bidding)
                        <option @selected($Bidding->id == $Model->bidding_id) value="{{ $Bidding->id }}">{{ $Bidding->title() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <div class="button-group my-4">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>

    @include('phone')
@endsection
