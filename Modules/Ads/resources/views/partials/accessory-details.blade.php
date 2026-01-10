<div class="card shadow-sm mt-4">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0"><i class="fas fa-puzzle-piece me-2"></i>تفاصيل الإكسسوار</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @if($accessory->brand)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الماركة</small>
                        <strong>{{ $accessory->brand }}</strong>
                    </div>
                </div>
            @endif

            @if($accessory->model)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الموديل</small>
                        <strong>{{ $accessory->model }}</strong>
                    </div>
                </div>
            @endif

            @if($accessory->type)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">النوع</small>
                        <strong>{{ $accessory->type }}</strong>
                    </div>
                </div>
            @endif

            @if($accessory->material)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">المادة</small>
                        <strong>{{ $accessory->material }}</strong>
                    </div>
                </div>
            @endif

            @if($accessory->color)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">اللون</small>
                        <strong>{{ $accessory->color }}</strong>
                    </div>
                </div>
            @endif

            @if($accessory->compatible_cars)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">السيارات المتوافقة</small>
                        <strong>{{ $accessory->compatible_cars }}</strong>
                    </div>
                </div>
            @endif

            @if($accessory->warranty)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الضمان</small>
                        <strong>{{ $accessory->warranty }}</strong>
                    </div>
                </div>
            @endif

            @if($accessory->condition)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الحالة</small>
                        <strong>{{ $accessory->condition }}</strong>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>