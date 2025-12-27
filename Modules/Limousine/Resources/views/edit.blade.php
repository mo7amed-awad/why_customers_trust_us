@extends('Admin.layout')
@section('pagetitle', __('trans.limousines'))

@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.limousines.update', $Model) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="text-center">
            <img src="{{ asset($Model->image ?? setting('logo')) }}" class="rounded mx-auto text-center" id="image-preview"
                height="200px">
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input type="text" name="title_ar" id="title_ar" class="form-control" required
                    value="{{ $Model['title_ar'] }}">
            </div>

            <div class="form-group col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input type="text" name="title_en" id="title_en" class="form-control" required
                    value="{{ $Model['title_en'] }}">
            </div>

            <div class="col-md-6 col-sm-12">
                <label for="desc_ar">@lang('trans.desc_ar')</label>
                <textarea rows="7" id="desc_ar" name="desc_ar" placeholder="@lang('trans.desc_ar')" class="form-control mceNoEditor">{!! $Model['desc_ar'] !!}</textarea>
            </div>

            <div class="col-md-6 col-sm-12">
                <label for="desc_en">@lang('trans.desc_en')</label>
                <textarea rows="7" id="desc_en" name="desc_en" placeholder="@lang('trans.desc_en')" class="form-control mceNoEditor">{!! $Model['desc_en'] !!}</textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="visibility">@lang('trans.visibility')</label>
                <select class="form-control" required id="visibility" name="status">
                    <option {{ $Model['status'] == 1 ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                    <option {{ $Model['status'] == 0 ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
                </select>
            </div>

            <div class="col-md-6 col-sm-12">
                <label for="image">{{ __('trans.image') }}</label>
                <input class="form-control w-100" id="image" type="file" name="image"
                    onchange="document.getElementById('image-preview').src = window.URL.createObjectURL(this.files[0])">
            </div>

            <div class="col-12 my-4">
                <div class="button-group my-4">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>

    @include('select2')
@endsection
