@extends(ucfirst(activeGuard()) . '.layout')

@section('pagetitle', __('trans.ourvision'))

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        {{-- الصورة --}}
                        @if ($Model->image)
                            <div class="text-center mb-4">
                                <img src="{{ asset($Model->image) }}"
                                     alt="About Image"
                                     class="img-fluid rounded shadow-sm"
                                     style="max-width: 500px; max-height: 300px; object-fit: cover;">
                            </div>
                        @endif

                        {{-- الوصف بالإنجليزية --}}
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="mb-0">@lang('trans.desc_en')</h5>
                            </div>
                            <div class="p-3 bg-light rounded border">
                                <p class="mb-0 text-justify" style="line-height: 1.8; white-space: pre-wrap;">{{ $Model->desc_en }}</p>
                            </div>
                        </div>

                        {{-- الوصف بالعربية --}}
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="mb-0">@lang('trans.desc_ar')</h5>
                            </div>
                            <div class="p-3 bg-light rounded border" dir="rtl">
                                <p class="mb-0 text-justify" style="line-height: 1.8; white-space: pre-wrap;">{{ $Model->desc_ar }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer bg-light text-center">
                        <a href="{{ route(activeGuard() . '.ourvision.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            @lang('trans.back')
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection