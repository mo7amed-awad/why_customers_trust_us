@extends('Admin.layout')
@section('pagetitle', __('trans.privacy'))
@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.privacy.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">

            {{-- Title (AR -> EN/UR) --}}
            <div class="col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('trans.title_ar')"
                    class="form-control">
            </div>
            <div class="col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input id="title_en" type="text" name="title_en" required placeholder="@lang('trans.title_en')"
                    class="form-control">
            </div>

            {{-- Description (AR -> EN/UR) --}}
            <div class="col-md-6 col-sm-12">
                <label>@lang('trans.desc_ar')</label>
                <textarea rows="7" name="desc_ar" placeholder="@lang('trans.desc_ar')" class="form-control mceNoEditor"></textarea>
            </div>
            <div class="col-md-6 col-sm-12">
                <label>@lang('trans.desc_en')</label>
                <textarea rows="7" name="desc_en" placeholder="@lang('trans.desc_en')" class="form-control mceNoEditor"></textarea>
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
