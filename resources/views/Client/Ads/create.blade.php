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

        @if($category->slug == 'cars')
            @include('Client.Ads.partials.car-fields')
        @elseif($category->slug == 'spare-parts')
            @include('Client.Ads.partials.spare-parts-fields')
        @elseif($category->slug == 'license-plates')
            @include('Client.Ads.partials.license-plates-fields')
        @endif

        <div class="col-md-11 d-flex align-items-center justify-content-end">
            <button type="submit"
                    class="btn rounded-3 px-5 py-2 bg-primary-color justify-content-center text-white fw-medium">
                {{ __('front.post_now') }}
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
            document.addEventListener('DOMContentLoaded', function () {
                const addImgBtn = document.querySelector('.add-img');
                const imageUpload = document.getElementById('imageUpload');
                const gallery = document.querySelector('.gallery');
                const MAX_IMAGES = 7;

                // ده المخزن اللي هيشيل كل الصور
                let filesStore = new DataTransfer();

                addImgBtn.addEventListener('click', () => {
                    imageUpload.click();
                });

                imageUpload.addEventListener('change', () => {
                    Array.from(imageUpload.files).forEach(file => {
                        if (filesStore.files.length < MAX_IMAGES) {
                            filesStore.items.add(file);
                        }
                    });

                    imageUpload.files = filesStore.files;
                    renderGallery();
                });

                function renderGallery() {
                    gallery.innerHTML = '';

                    Array.from(filesStore.files).forEach((file, index) => {
                        const col = document.createElement('div');
                        col.className = 'col-md-2 col-4';

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            col.innerHTML = `
                    <div class="img-picture border rounded-3 position-relative">
                        <img src="${e.target.result}" class="w-100 h-100 rounded-3">
                        <button type="button"
                                class="btn btn-danger btn-sm position-absolute remove-img"
                                style="top:5px;right:5px;">
                            <i class="fa-solid fa-times"></i>
                        </button>
                        <span class="badge bg-primary position-absolute"
                              style="bottom:5px;left:5px;">${index + 1}</span>
                    </div>
                `;
                            gallery.appendChild(col);
                        };
                        reader.readAsDataURL(file);

                        col.addEventListener('click', e => {
                            if (e.target.closest('.remove-img')) {
                                removeImage(index);
                            }
                        });
                    });

                    updateCounter();
                }

                function removeImage(index) {
                    const newStore = new DataTransfer();

                    Array.from(filesStore.files).forEach((file, i) => {
                        if (i !== index) newStore.items.add(file);
                    });

                    filesStore = newStore;
                    imageUpload.files = filesStore.files;
                    renderGallery();
                }

                function updateCounter() {
                    let counter = document.querySelector('.image-counter');
                    if (!counter) {
                        counter = document.createElement('small');
                        counter.className = 'image-counter text-muted d-block mt-2';
                        addImgBtn.parentElement.appendChild(counter);
                    }
                    counter.textContent = `${filesStore.files.length} / ${MAX_IMAGES} صور`;
                }
            });
        </script>
    @endpush

@endsection