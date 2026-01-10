<div class="card shadow-sm mt-4">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>تفاصيل قطعة الغيار</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @if($sparePart->part_name)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">اسم القطعة</small>
                        <strong>{{ $sparePart->part_name }}</strong>
                    </div>
                </div>
            @endif

            @if($sparePart->manufacturer)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الشركة المصنعة</small>
                        <strong>{{ $sparePart->manufacturer }}</strong>
                    </div>
                </div>
            @endif

            @if($sparePart->part_number)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">رقم القطعة</small>
                        <strong>{{ $sparePart->part_number }}</strong>
                    </div>
                </div>
            @endif

            @if($sparePart->compatible_cars)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">السيارات المتوافقة</small>
                        <strong>{{ $sparePart->compatible_cars }}</strong>
                    </div>
                </div>
            @endif

            @if($sparePart->condition)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الحالة</small>
                        <strong>{{ $sparePart->condition }}</strong>
                    </div>
                </div>
            @endif

            @if($sparePart->warranty)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الضمان</small>
                        <strong>{{ $sparePart->warranty }}</strong>
                    </div>
                </div>
            @endif

            @if($sparePart->origin)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">بلد المنشأ</small>
                        <strong>{{ $sparePart->origin }}</strong>
                    </div>
                </div>
            @endif

            @if($sparePart->year)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">السنة</small>
                        <strong>{{ $sparePart->year }}</strong>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>