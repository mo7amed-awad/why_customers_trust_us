@extends('Admin.layout')
@section('pagetitle', __('trans.car-features'))
@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.spare-part-types.update', $Model) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            {{-- Title (AR) --}}
            <div class="col-md-6 mb-3">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('trans.title_ar')"
                       class="form-control" value="{{ $Model->title_ar }}">
            </div>

            {{-- Title (EN) --}}
            <div class="col-md-6 mb-3">
                <label for="title_en">@lang('trans.title_en')</label>
                <input id="title_en" type="text" name="title_en" required placeholder="@lang('trans.title_en')"
                       class="form-control" value="{{ $Model->title_en }}">
            </div>

            {{-- TYPE --}}
            <div class="col-md-6 mb-3">
                <label for="type">@lang('trans.type')</label>
                <select id="type" name="type" required class="form-control">
                    <option value="" disabled selected>@lang('trans.select_type')</option>

                    <option value="text" {{ $Model->type == 'text' ? 'selected' : '' }}>
                        @lang('trans.text')
                    </option>
                    <option value="number" {{ $Model->type == 'number' ? 'selected' : '' }}>
                        @lang('trans.number')
                    </option>
                    <option value="checkbox" {{ $Model->type == 'checkbox' ? 'selected' : '' }}>
                        @lang('trans.checkbox')
                    </option>

                </select>
            </div>

            {{-- ICON (اسم الصورة أو رفع صورة) --}}
            <div class="col-md-6 mb-3">
                <label for="icon">@lang('trans.icon')</label>
                <input id="icon" type="file" name="icon" class="form-control">

                {{-- لو الصورة موجودة أصلاً --}}
                @if($Model->icon)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/icons/'.$Model->icon) }}" alt="icon"
                             style="width:50px;height:50px;object-fit:contain;border:1px solid #ddd;padding:5px;">
                    </div>
                @endif
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
