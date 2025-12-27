@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.countries'))
@section('content')
    <form method="POST" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data">
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
                <label for="currancy_code_ar">@lang('trans.currancy_code_ar')</label>
                <input type="text" name="currancy_code_ar" id="currancy_code_ar" class="form-control" required
                    value="">
            </div>
            <div class="form-group col-md-6">
                <label for="currancy_code_en">@lang('trans.currancy_code_en')</label>
                <input type="text" name="currancy_code_en" id="currancy_code_en" class="form-control" required
                    value="">
            </div>

            <div class="form-group col-md-6">
                <label for="currancy_value">@lang('trans.currancy_value')</label>
                <input type="number" step="0.01" min="0" name="currancy_value" id="currancy_value"
                    class="form-control" required value="">
            </div>

            <div class="form-group col-md-6">
                <label for="phone_code">@lang('trans.phone_code')</label>
                <input type="text" name="phone_code" id="phone_code" class="form-control" required value="">
            </div>

            <div class="form-group col-md-6">
                <label for="country_code">@lang('trans.country_code')</label>
                <input type="text" name="country_code" id="country_code" class="form-control" required value="">
            </div>

            <div class="form-group col-md-6">
                <label for="length">@lang('trans.length')</label>
                <input type="number" min="6" max="10" name="length" id="length" class="form-control"
                    required value="">
            </div>

            <div class="form-group col-md-6">
                <label for="decimals">@lang('trans.decimals')</label>
                <input type="number" min="1" max="3" name="decimals" id="decimals" class="form-control"
                    required value="">
            </div>


            <div class="col-md-6 col-sm-12">
                <label for="image">{{ __('trans.image') }}</label>
                <input class="form-control w-100" id="image" type="file" name="image"
                    onchange="document.getElementById('file').src = window.URL.createObjectURL(this.files[0])">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-md-6">

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
