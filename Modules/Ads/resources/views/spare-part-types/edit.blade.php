@extends('Admin.layout')
@section('pagetitle', __('trans.about'))
@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.spare-part-types.update', $Model) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            {{-- Title (AR -> EN/UR) --}}
            <div class="col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('trans.title_ar')"
                    class="form-control" value="{{ $Model['title_ar'] }}">
            </div>
            <div class="col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input id="title_en" type="text" name="title_en" required placeholder="@lang('trans.title_en')"
                    class="form-control" value="{{ $Model['title_en'] }}">
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
