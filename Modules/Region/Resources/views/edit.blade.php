@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.regions'))
@section('content')
    <form method="POST" action="{{ route('admin.regions.update', $Model) }}" enctype="multipart/form-data">
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
                <label for="country_id">@lang('trans.country')</label>
                <select class="form-control" required id="country_id" name="country_id">
                    <option disabled hidden selected>@lang('trans.Select')</option>
                    @foreach ($Countries as $Country)
                        <option @selected($Country->id == $Model->country_id) value="{{ $Country->id }}">{{ $Country->title() }}</option>
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
