@extends('Admin.layout')
@section('pagetitle', __('trans.car-features'))
@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.car-features.store') }}" enctype="multipart/form-data">
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

            {{-- TYPE --}}
            <div class="col-md-6 mb-3">
                <label for="type">@lang('trans.type')</label>
                <select id="type" name="type" required class="form-control">
                    <option value="" disabled selected>@lang('trans.select_type')</option>

                    <option value="text">@lang('trans.text')</option>
                    <option value="number">@lang('trans.number')</option>
                    <option value="checkbox">@lang('trans.checkbox')</option>


                </select>
            </div>

            <div class="form-group col-md-6">
                <label>@lang('trans.icon')</label>
                <input type="file" name="icon" class="form-control" accept="image/*" id="main-icon">
                <div id="main-icon-preview" class="mt-2"></div>
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
