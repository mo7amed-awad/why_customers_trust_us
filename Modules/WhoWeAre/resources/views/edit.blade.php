@extends('Admin.layout')
@section('pagetitle', __('trans.about'))
@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.whoweare.update', $Model) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <label>@lang('trans.desc_ar')</label>
                <textarea rows="7" name="desc_ar" class="form-control mceNoEditor">{{ $Model->desc_ar }}</textarea>
            </div>

            <div class="col-md-6 col-sm-12">
                <label>@lang('trans.desc_en')</label>
                <textarea rows="7" name="desc_en" class="form-control mceNoEditor">{{ $Model->desc_en }}</textarea>
            </div>

            {{-- الصورة --}}
            <div class="col-md-6 col-sm-12">
                <label for="image">@lang('trans.image')</label>

                <div class="my-2">
                    <img id="imagePreview"
                         src="{{ $Model->image ? asset($Model->image) : '' }}"
                         alt="Image Preview"
                         style="max-width: 200px; border-radius: 10px; {{ $Model->image ? '' : 'display: none;' }}">
                </div>

                <input class="form-control w-100" id="image" type="file" name="image" accept="image/*">
            </div>

            <div class="col-12 my-4">
                <button type="submit" class="main-btn w-100">{{ __('trans.Submit') }}</button>
            </div>

        </div>
    </form>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection