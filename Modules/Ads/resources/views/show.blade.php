@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.ads'))
@section('content')

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        @if($ad->images->count() > 0)
                            <div id="mainImageContainer" class="position-relative">
                                <img id="mainImage" src="{{ asset($ad->images->first()->image) }}"
                                     class="w-100 rounded-top" style="height: 500px; object-fit: cover;"
                                     alt="{{ $ad->title }}">

                                @if($ad->is_new)
                                    <span class="badge bg-success position-absolute top-0 start-0 m-3 fs-6">
                                        {{ __('trans.new') }}
                                    </span>
                                @endif
                            </div>

                            @if($ad->images->count() > 1)
                                <div class="p-3 bg-light">
                                    <div class="row g-2">
                                        @foreach($ad->images as $image)
                                            <div class="col-2">
                                                <img src="{{ asset($image->image) }}"
                                                     class="img-thumbnail cursor-pointer thumbnail-image w-100"
                                                     style="height: 80px; object-fit: cover; cursor: pointer;"
                                                     onclick="changeMainImage('{{ asset($image->image) }}')"
                                                     alt="{{ __('trans.image') }} {{ $loop->iteration }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @else
                            <img src="{{ asset('images/no-image.png') }}" class="w-100" style="height: 500px; object-fit: cover;" alt="{{ __('trans.no_image') }}">
                        @endif
                    </div>
                </div>

                <!-- الوصف -->
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <!-- عنوان الإعلان -->
                        <div class="mb-4">
                            <h2 class="mb-2">{{ $ad->title }}</h2>
                            <div class="d-flex align-items-center gap-3 text-muted">
                                <span>
                                    <i class="fas fa-hashtag me-1"></i>
                                    {{ __('trans.ad_number') }}:
                                    <strong>{{ $ad->order_number }}</strong>
                                </span>
                                <span>
                                    <i class="fas fa-eye me-1"></i>
                                    {{ $ad->views ?? 0 }} {{ __('trans.views') }}
                                </span>
                            </div>
                        </div>

                        <hr>

                        <!-- الوصف -->
                        <div class="mt-4">
                            <h5 class="mb-3"><i class="fas fa-align-right me-2 text-primary"></i> {{ __('trans.description') }}</h5>
                            <p class="text-secondary lh-lg" style="white-space: pre-line;">{{ $ad->description }}</p>
                        </div>
                    </div>
                </div>

                @if($ad->type == \App\Enums\AdTypesEnum::CAR && $ad->car)
                    @include('ads::partials.car-details', ['car' => $ad->car])
                @elseif($ad->type == \App\Enums\AdTypesEnum::SPARE_PART && $ad->sparePart)
                    @include('ads::partials.spare-part-details', ['sparePart' => $ad->sparePart])
                @elseif($ad->type == \App\Enums\AdTypesEnum::LICENSE_PLATE && $ad->plate)
                    @include('ads::partials.plate-details', ['plate' => $ad->plate])
                @elseif($ad->type == \App\Enums\AdTypesEnum::ACCESSORY && $ad->accessory)
                    @include('ads::partials.accessory-details', ['accessory' => $ad->accessory])
                @endif
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm sticky-top" style="top: 20px;">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="text-primary mb-2">
                                {{ number_format($ad->price) }} {{ __('trans.price_currency') }}
                            </h3>
                            @if($ad->negotiable)
                                <span class="badge bg-info">{{ __('trans.negotiable') }}</span>
                            @endif
                        </div>

                        <hr>

                        <h6 class="mb-3">
                            <i class="fas fa-user me-2"></i>
                            {{ __('trans.seller') }}
                        </h6>
                        <div class="mb-3">
                            <p class="mb-2"><strong>{{ __('trans.name') }}:</strong> {{ $ad->user->name }}{{ $ad->user->name }}</p>
                        </div>

                        <hr>

                        <div class="d-grid gap-2">
                            <a href="tel:{{ $ad->user->phone_code }}{{ $ad->user->phone }}" class="btn btn-success btn-lg">
                                <i class="fas fa-phone me-2"></i> {{ __('trans.call_now') }}
                            </a>
                            <a href="https://wa.me/{{ $ad->user->phone_code }}{{ $ad->user->phone }}"
                               target="_blank" class="btn btn-outline-success btn-lg">
                                <i class="fab fa-whatsapp me-2"></i>{{ __('trans.whatsapp') }}
                            </a>
                        </div>

                        <hr>

                        <h6 class="mb-3"><i class="fas fa-user me-2"></i>{{ __('trans.seller_info') }}</h6>
                        <div class="mb-3">
                            <p class="mb-2"><strong>{{ __('trans.name') }}:</strong> {{ $ad->owner_name }}{{ $ad->owner_name }}</p>
                            <p class="mb-0"><strong>{{ __('trans.address') }}:</strong> {{ $ad->address }}</p>
                        </div>

                        <hr>

                        <!-- أزرار التواصل -->
                        <div class="d-grid gap-2">
                            <a href="tel:{{ $ad->phone_code }}{{ $ad->owner_phone }}" class="btn btn-success btn-lg">
                                <i class="fas fa-phone me-2"></i> {{ __('trans.call_now') }}
                            </a>
                            <a href="https://wa.me/{{ $ad->phone_code }}{{ $ad->owner_phone }}"
                               target="_blank" class="btn btn-outline-success btn-lg">
                                <i class="fab fa-whatsapp me-2"></i>{{ __('trans.whatsapp') }}
                            </a>
                        </div>

                        <hr>

                        <div class="small text-muted">
                            <p class="mb-1"><i class="fas fa-layer-group me-2"></i>{{ $ad->category->trans('title') }}</p>
                            <p class="mb-1"><i class="fas fa-folder me-2"></i>{{ $ad->subcategory->trans('title') }}</p>
                            <p class="mb-0"><i class="fas fa-clock me-2"></i>{{ $ad->created_at->diffForHumans() }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .thumbnail-image:hover {
                opacity: 0.7;
                border-color: #0d6efd !important;
            }

            .sticky-top {
                z-index: 1020;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function changeMainImage(imageSrc) {
                document.getElementById('mainImage').src = imageSrc;
            }
        </script>
    @endpush

@endsection