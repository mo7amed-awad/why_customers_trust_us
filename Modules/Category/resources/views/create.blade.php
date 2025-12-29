@extends('Admin.layout')
@section('pagetitle', __('trans.category'))

@section('content')
    <form method="POST" action="{{ route(activeGuard().'.category.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">

            {{-- Main Category  --}}
            <div class="col-12">
                <h4 class="mb-3">القسم الرئيسي</h4>
            </div>

            <div class="form-group col-md-6">
                <label>الاسم بالعربي</label>
                <input type="text" name="title_ar" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label>الاسم بالانجليزي</label>
                <input type="text" name="title_en" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label>الصورة الرئيسية</label>
                <input type="file" name="image" class="form-control" accept="image/*" id="main-image">
                <div id="main-image-preview" class="mt-2"></div>
            </div>

            <div class="form-group col-md-6">
                <label>الأيقونة (اختياري)</label>
                <input type="file" name="icon" class="form-control" accept="image/*" id="main-icon">
                <div id="main-icon-preview" class="mt-2"></div>
            </div>

            <div class="col-12 my-4">
                <hr>
            </div>

            {{-- Sub Categories --}}
            <div class="col-12">
                <h4 class="mb-3">الأقسام الفرعية</h4>

                <div id="subcats-wrapper"></div>

                <button type="button" class="btn btn-dark mt-3" id="add-subcat">
                    + إضافة قسم فرعي
                </button>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="main-btn w-100">
                    @lang('trans.submit')
                </button>
            </div>
        </div>
    </form>

    {{-- Template for subcategory --}}
    <template id="subcat-template">
        <div class="subcat-item border p-3 mb-3 rounded">
            <div class="d-flex justify-content-between">
                <h6>قسم فرعي</h6>
                <button type="button" class="btn btn-danger btn-sm remove-subcat">حذف</button>
            </div>

            <div class="row mt-2">
                <div class="form-group col-md-6">
                    <label>الاسم بالعربي</label>
                    <input type="text" name="subcategories[INDEX][title_ar]" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>الاسم بالإنجليزي</label>
                    <input type="text" name="subcategories[INDEX][title_en]" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label>الوصف بالعربي</label>
                    <input type="text" name="subcategories[INDEX][desc_ar]" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>الوصف بالانجليزي</label>
                    <input type="text" name="subcategories[INDEX][desc_en]" class="form-control">
                </div>
            </div>
        </div>
    </template>

    <style>
        .preview-img {
            max-width: 200px;
            max-height: 200px;
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 5px;
            background: #f9f9f9;
        }
    </style>

    <script>
        // Image preview function
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" class="preview-img" alt="Preview">`;
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = '';
            }
        }

        // Main image preview
        document.getElementById('main-image').addEventListener('change', function() {
            previewImage(this, 'main-image-preview');
        });

        // Main icon preview
        document.getElementById('main-icon').addEventListener('change', function() {
            previewImage(this, 'main-icon-preview');
        });

        // Subcategories logic
        let index = 0;
        const wrapper = document.getElementById('subcats-wrapper');
        const addBtn   = document.getElementById('add-subcat');
        const template = document.getElementById('subcat-template').innerHTML;

        addBtn.onclick = () => {
            const html = template.replace(/INDEX/g, index);
            wrapper.insertAdjacentHTML('beforeend', html);
            index++;
        };

        document.addEventListener('click', function(e){
            if(e.target.classList.contains('remove-subcat')){
                e.target.closest('.subcat-item').remove();
            }
        });
    </script>
@endsection