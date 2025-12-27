@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.models'))
@section('content')
    <form method="POST" action="{{ route('admin.models.update', $Model) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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



            <div class="form-group col-md-6">
                <label for="brand_id">@lang('trans.brand')</label>
                <select class="form-control" required id="brand_id" name="brand_id">
                    <option disabled hidden selected>@lang('trans.Select')</option>
                    @foreach ($Brands as $Brand)
                        <option @selected($Brand->id == $Model->brand_id) value="{{ $Brand->id }}">{{ $Brand->title() }}</option>
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
@endsection
