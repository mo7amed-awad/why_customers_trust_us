@extends('Admin.layout')
@section('pagetitle', __('trans.about'))
@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.spare-part-types.store') }}" enctype="multipart/form-data">
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
