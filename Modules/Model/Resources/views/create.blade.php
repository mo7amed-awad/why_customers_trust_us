@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.models'))
@section('content')
    <form method="POST" action="{{ route('admin.models.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
            <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="200px">
        </div>
        <div class="row">

            <div class="form-group col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input type="text" name="title_ar" id="title_ar" class="form-control" required
                    value="{{ old('title_ar') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input type="text" name="title_en" id="title_en" class="form-control" required
                    value="{{ old('title_en') }}">
            </div>


            <div class="form-group col-md-6">
                <label for="brand_id">@lang('trans.brand')</label>
                <select class="form-control" required id="brand_id" name="brand_id">
                    <option disabled hidden selected>@lang('trans.Select')</option>
                    @foreach ($Brands as $Brand)
                        <option value="{{ $Brand->id }}">{{ $Brand->title() }}</option>
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
@endsection
