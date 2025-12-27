@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.brands'))
@section('content')
    <form method="POST" action="{{ route('admin.brands.update', $Model) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="text-center">
            <img src="{{ asset($Model->image ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file"
                height="200px">
        </div>
        <div class="row">


            <div class="form-group col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input type="text" name="title_ar" id="title_ar" class="form-control" required
                    value="{{ old('title_ar', $Model['title_ar']) }}">
            </div>
            <div class="form-group col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input type="text" name="title_en" id="title_en" class="form-control" required
                    value="{{ old('title_en', $Model['title_en']) }}">
            </div>


            <div class="col-md-6 col-sm-12">
                <label for="image">{{ __('trans.image') }}</label>
                <input class="form-control w-100" id="image" type="file" name="image"
                    onchange="document.getElementById('file').src = window.URL.createObjectURL(this.files[0])">
            </div>


            <div class="col-md-6">

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
@endsection
