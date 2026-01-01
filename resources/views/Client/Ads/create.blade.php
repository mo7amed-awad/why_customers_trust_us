@extends('Client.layouts.layout')

@push('css')
    <style>
        .img-picture {
            height: 150px;
            overflow: hidden;
            position: relative;
        }

        .img-picture img {
            object-fit: cover;
        }

        .cam {
            width: 100%;
            height: 150px;
            border: 2px dashed #ddd;
            cursor: pointer;
            transition: all 0.3s;
        }

        .cam:hover {
            border-color: #007bff;
            background-color: #f8f9fa;
        }

        .remove-img {
            z-index: 10;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            padding: 0 !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-img:hover {
            background-color: #dc3545 !important;
            transform: scale(1.1);
        }
    </style>
    @endpush
@section('content')

<div class="" id="navBar">
</div>
<div class="container py-lg-5 py-md-4 py-3 mb-5">
    <form class="row gap-3"
          action="{{ route('client.ads.store', ['lang' => app()->getLocale(), 'subcategorySlug' => $subcategory->slug]) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <x-ads-shared-fields :category="$category" :subcategory="$subcategory" />

        <input type="hidden" name="images_data" id="imagesData">

    @if($category->slug == 'cars')
            @include('client.ads.partials.car-fields')
        @elseif($category->slug == 'spare-parts')
            @include('client.ads.partials.spare-parts-fields')
        @endif


        <div class="col-md-11 d-flex align-items-center justify-content-end">
            <button type="submit" class="btn rounded-3 px-5 py-2 bg-primary-color justify-content-center text-white fw-medium">
                Post Now
            </button>
        </div>
    </form>

</div>


<div class="" id="footer">
</div>

    @push('scripts')

        <script>
            const brandSelect = document.getElementById('brandSelect');
            const modelSelect = document.getElementById('modelSelect');
            const allModels = Array.from(modelSelect.querySelectorAll('option')).slice(1);


            brandSelect.addEventListener('change', function() {
                const brandId = this.value;

                modelSelect.innerHTML = '<option selected>{{ __("front.choose_model") }}</option>';

                allModels.forEach(option => {
                    if(option.dataset.brand === brandId) {
                        modelSelect.appendChild(option);
                    }
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const addImgBtn = document.querySelector('.add-img');
                const imageUpload = document.getElementById('imageUpload');
                const gallery = document.querySelector('.gallery');
                const MAX_IMAGES = 7;
                let uploadedImages = [];

                addImgBtn.addEventListener('click', function() {
                    if (uploadedImages.length >= MAX_IMAGES) {
                        alert('الحد الأقصى هو ' + MAX_IMAGES + ' صور فقط');
                        return;
                    }
                    imageUpload.click();
                });

                imageUpload.addEventListener('change', function(e) {
                    const files = Array.from(e.target.files);
                    const remainingSlots = MAX_IMAGES - uploadedImages.length;

                    if (files.length > remainingSlots) {
                        alert('يمكنك إضافة ' + remainingSlots + ' صورة فقط. الحد الأقصى ' + MAX_IMAGES + ' صور');
                        return;
                    }

                    files.forEach(file => {
                        if (uploadedImages.length < MAX_IMAGES) {
                            addImageToGallery(file);
                        }
                    });

                    imageUpload.value = '';
                });

                function addImageToGallery(file) {
                    const reader = new FileReader();

                    reader.onload = function(event) {
                        const imageData = {
                            file: file,
                            dataUrl: event.target.result,
                            id: Date.now() + Math.random()
                        };

                        uploadedImages.push(imageData);
                        renderGallery();
                        updateHiddenInput(); // إضافة هذا السطر
                    };

                    reader.readAsDataURL(file);
                }

                function renderGallery() {
                    gallery.innerHTML = '';

                    uploadedImages.forEach((image, index) => {
                        const col = document.createElement('div');
                        col.className = 'col-md-2 col-4';
                        col.setAttribute('data-image-id', image.id);

                        col.innerHTML = `
                <div class="img-picture border rounded-3 position-relative">
                    <img src="${image.dataUrl}" class="w-100 h-100 rounded-3" style="object-fit: cover;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute remove-img" style="top: 5px; right: 5px; padding: 2px 8px;">
                        <i class="fa-solid fa-times"></i>
                    </button>
                    <span class="position-absolute badge bg-primary" style="bottom: 5px; left: 5px;">${index + 1}</span>
                </div>
            `;

                        gallery.appendChild(col);
                    });

                    updateImageCounter();
                }

                // دالة لتحديث الحقل المخفي بالصور
                function updateHiddenInput() {
                    const imagesArray = uploadedImages.map(img => ({
                        name: img.file.name,
                        type: img.file.type,
                        data: img.dataUrl
                    }));

                    const hiddenInput = document.getElementById('imagesData');
                    if (hiddenInput) {
                        hiddenInput.value = JSON.stringify(imagesArray);
                    }
                }

                function updateImageCounter() {
                    const counter = uploadedImages.length;
                    const remaining = MAX_IMAGES - counter;

                    let counterElement = document.querySelector('.image-counter');
                    if (!counterElement) {
                        counterElement = document.createElement('small');
                        counterElement.className = 'image-counter text-muted d-block mt-2';
                        addImgBtn.parentElement.appendChild(counterElement);
                    }

                    counterElement.textContent = `${counter} / ${MAX_IMAGES} صور`;

                    if (remaining === 0) {
                        counterElement.classList.add('text-danger');
                        counterElement.classList.remove('text-muted');
                    } else {
                        counterElement.classList.add('text-muted');
                        counterElement.classList.remove('text-danger');
                    }
                }

                gallery.addEventListener('click', function(e) {
                    const removeBtn = e.target.closest('.remove-img');
                    if (removeBtn) {
                        const imageCol = removeBtn.closest('[data-image-id]');
                        const imageId = parseFloat(imageCol.getAttribute('data-image-id'));

                        uploadedImages = uploadedImages.filter(img => img.id !== imageId);
                        renderGallery();
                        updateHiddenInput(); // إضافة هذا السطر
                    }
                });

                updateImageCounter();
            });
        </script>
    @endpush

@endsection