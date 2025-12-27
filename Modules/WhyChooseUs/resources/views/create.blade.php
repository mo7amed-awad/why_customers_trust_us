@extends('Admin.layout')
@section('pagetitle', __('trans.whychooseus'))
@section('content')
    <form method="POST" action="{{ route(activeGuard() . '.whychooseus.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input type="text" name="title_ar" id="title_ar" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input type="text" name="title_en" id="title_en" class="form-control" required>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="desc_ar">@lang('trans.desc_ar')</label>
                <textarea rows="7" id="desc_ar" name="desc_ar" placeholder="@lang('trans.desc_ar')" class="form-control mceNoEditor"></textarea>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="desc_en">@lang('trans.desc_en')</label>
                <textarea rows="7" id="desc_en" name="desc_en" placeholder="@lang('trans.desc_en')" class="form-control mceNoEditor"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="visibility">@lang('trans.visibility')</label>
                <select class="form-control" required id="visibility" name="status">
                    <option selected value="1">@lang('trans.visible')</option>
                    <option value="0">@lang('trans.hidden')</option>
                </select>
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

    <script>
        // إظهار الصورة عند اختيارها
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
            if (this.files && this.files[0]) {
                preview.src = URL.createObjectURL(this.files[0]);
                preview.style.display = 'block';
            }
        });

        document.getElementById('icon').addEventListener('change', function(e) {
            const preview = document.getElementById('icon-preview');
            if (this.files && this.files[0]) {
                preview.src = URL.createObjectURL(this.files[0]);
                preview.style.display = 'block';
            }
        });
    </script>

    @include('select2')
@endsection