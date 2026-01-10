<div class="card shadow-sm mt-4">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0"><i class="fas fa-id-card me-2"></i>تفاصيل اللوحة</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @if($plate->plate_number)
                <div class="col-md-12">
                    <div class="detail-item p-4 bg-light rounded text-center">
                        <small class="text-muted d-block mb-2">رقم اللوحة</small>
                        <h3 class="mb-0 font-monospace text-primary">{{ $plate->plate_number }}</h3>
                    </div>
                </div>
            @endif

            @if($plate->plate_type)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">نوع اللوحة</small>
                        <strong>{{ $plate->plate_type }}</strong>
                    </div>
                </div>
            @endif

            @if($plate->city)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">المدينة</small>
                        <strong>{{ $plate->city }}</strong>
                    </div>
                </div>
            @endif

            @if($plate->category)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الفئة</small>
                        <strong>{{ $plate->category }}</strong>
                    </div>
                </div>
            @endif

            @if($plate->characters)
                <div class="col-md-6">
                    <div class="detail-item p-3 bg-light rounded">
                        <small class="text-muted d-block mb-1">الأحرف</small>
                        <strong>{{ $plate->characters }}</strong>
                    </div>
                </div>
            @endif

            @if($plate->is_distinctive)
                <div class="col-md-12">
                    <div class="alert alert-success mb-0">
                        <i class="fas fa-star me-2"></i>
                        <strong>لوحة مميزة</strong>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>