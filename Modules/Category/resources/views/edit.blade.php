@extends('Admin.layout')
@section('pagetitle', __('trans.edit_category'))

@section('content')
    <form method="POST" action="{{ route(activeGuard().'.category.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            {{-- Main Category  --}}
            <div class="col-12">
                <h4 class="mb-3">القسم الرئيسي</h4>
            </div>

            <div class="form-group col-md-6">
                <label>الاسم بالعربي</label>
                <input type="text" name="title_ar" class="form-control" value="{{ $category->title_ar }}" required>
            </div>
            <div class="form-group col-md-6">
                <label>الاسم بالانجليزي</label>
                <input type="text" name="title_en" class="form-control" value="{{ $category->title_en }}" required>
            </div>

            <div class="form-group col-md-6">
                <label>الصورة الرئيسية</label>
                <input type="file" name="image" class="form-control" accept="image/*" id="main-image">
                <div id="main-image-preview" class="mt-2">
                    @if($category->image)
                        <img src="{{ asset($category->image) }}" class="preview-img" alt="Current Image">
                    @endif
                </div>
            </div>

            <div class="form-group col-md-6">
                <label>الأيقونة (اختياري)</label>
                <input type="file" name="icon" class="form-control" accept="image/*" id="main-icon">
                <div id="main-icon-preview" class="mt-2">
                    @if($category->icon)
                        <img src="{{ asset($category->icon) }}" class="preview-img" alt="Current Icon">
                    @endif
                </div>
            </div>

            <div class="col-12 my-4">
                <hr>
            </div>

            {{-- Sub Categories --}}
            <div class="col-12">
                <h4 class="mb-3">الأقسام الفرعية</h4>

                <div id="subcats-wrapper">
                    {{-- Existing subcategories --}}
                    @foreach($category->subcategories as $subcat)
                        <div class="subcat-item border p-3 mb-3 rounded" data-id="{{ $subcat->id }}">
                            <div class="d-flex justify-content-between">
                                <h6>قسم فرعي</h6>
                                <button type="button" class="btn btn-danger btn-sm remove-subcat">حذف</button>
                            </div>

                            <input type="hidden" name="existing_subcategories[{{ $subcat->id }}][id]" value="{{ $subcat->id }}">

                            <div class="row mt-2">
                                <div class="form-group col-md-6">
                                    <label>الاسم بالعربي</label>
                                    <input type="text" name="existing_subcategories[{{ $subcat->id }}][title_ar]" class="form-control" value="{{ $subcat->title_ar }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>الاسم بالإنجليزي</label>
                                    <input type="text" name="existing_subcategories[{{ $subcat->id }}][title_en]" class="form-control" value="{{ $subcat->title_en }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>الوصف بالعربي</label>
                                    <input type="text" name="existing_subcategories[{{ $subcat->id }}][desc_ar]" class="form-control" value="{{ $subcat->desc_ar }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>الوصف بالانجليزي</label>
                                    <input type="text" name="existing_subcategories[{{ $subcat->id }}][desc_en]" class="form-control" value="{{ $subcat->desc_en }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-dark mt-3" id="add-subcat">
                    + إضافة قسم فرعي
                </button>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="main-btn w-100">
                    @lang('trans.update')
                </button>
            </div>
        </div>

        {{-- Hidden input to track deleted subcategories --}}
        <input type="hidden" name="deleted_subcategories" id="deleted-subcategories" value="">
    </form>

    {{-- Template for new subcategory --}}
    <template id="subcat-template">
        <div class="subcat-item border p-3 mb-3 rounded">
            <div class="d-flex justify-content-between">
                <h6>قسم فرعي جديد</h6>
                <button type="button" class="btn btn-danger btn-sm remove-subcat">حذف</button>
            </div>

            <div class="row mt-2">
                <div class="form-group col-md-6">
                    <label>الاسم بالعربي</label>
                    <input type="text" name="new_subcategories[INDEX][title_ar]" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>الاسم بالإنجليزي</label>
                    <input type="text" name="new_subcategories[INDEX][title_en]" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label>الوصف بالعربي</label>
                    <input type="text" name="new_subcategories[INDEX][desc_ar]" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>الوصف بالانجليزي</label>
                    <input type="text" name="new_subcategories[INDEX][desc_en]" class="form-control">
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
        // Track deleted subcategories
        let deletedSubcats = [];

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
                const item = e.target.closest('.subcat-item');
                const subcatId = item.getAttribute('data-id');

                if(subcatId) {
                    deletedSubcats.push(subcatId);
                    document.getElementById('deleted-subcategories').value = deletedSubcats.join(',');
                }

                item.remove();
            }
        });
    </script>
@endsection