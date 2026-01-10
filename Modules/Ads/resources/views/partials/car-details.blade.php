<div class="card shadow-sm mt-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-car me-2"></i>تفاصيل السيارة</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @if($car->brand)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الماركة</small>
                        <strong>{{ $car->brand }}</strong>
                    </div>
                </div>
            @endif

            @if($car->model)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الموديل</small>
                        <strong>{{ $car->model }}</strong>
                    </div>
                </div>
            @endif

            @if($car->year)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">سنة الصنع</small>
                        <strong>{{ $car->year }}</strong>
                    </div>
                </div>
            @endif

            @if($car->mileage)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الكيلومترات</small>
                        <strong>{{ number_format($car->mileage) }} كم</strong>
                    </div>
                </div>
            @endif

            @if($car->fuel_type)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">نوع الوقود</small>
                        <strong>{{ $car->fuel_type }}</strong>
                    </div>
                </div>
            @endif

            @if($car->transmission)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">ناقل الحركة</small>
                        <strong>{{ $car->transmission }}</strong>
                    </div>
                </div>
            @endif

            @if($car->color)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">اللون</small>
                        <strong>{{ $car->color }}</strong>
                    </div>
                </div>
            @endif

            @if($car->engine_size)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">سعة المحرك</small>
                        <strong>{{ $car->engine_size }}</strong>
                    </div>
                </div>
            @endif

            @if($car->body_type)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">نوع الهيكل</small>
                        <strong>{{ $car->body_type }}</strong>
                    </div>
                </div>
            @endif

            @if($car->condition)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الحالة</small>
                        <strong>{{ $car->condition }}</strong>
                    </div>
                </div>
            @endif
        </div>

        {{-- الميزات --}}
        @if($car->features && $car->features->count() > 0)
            <hr class="my-4">
            <h6 class="mb-3"><i class="fas fa-star me-2"></i>الميزات</h6>
            <div class="row g-2">
                @foreach($car->features as $feature)
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-2 bg-light rounded">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>{{ $feature->name ?? $feature->pivot->feature_id }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>