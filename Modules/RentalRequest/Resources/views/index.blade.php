@extends(ucfirst(activeGuard()) . '.layout')

@section('pagetitle', __('trans.rental_requests'))
@section('content')

    <div class="row">
        @if (hasPermission('add_rental_requests'))
            <div class="my-2 col-6 text-sm-start">
                <a href="{{ route(activeGuard() . '.rental_requests.create') }}" class="main-btn">@lang('trans.add_new')</a>
            </div>
        @endif
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row g-3">

                <div class="col-md-2">
                    <label>@lang('trans.from')</label>
                    <input type="date" id="from_date" class="form-control">
                </div>

                <div class="col-md-2">
                    <label>@lang('trans.to')</label>
                    <input type="date" id="to_date" class="form-control">
                </div>

                <div class="col-md-2">
                    <label>@lang('trans.name')</label>
                    <input type="text" id="filter_name" class="form-control" placeholder="@lang('trans.name')">
                </div>

                <div class="col-md-2">
                    <label>@lang('trans.phone')</label>
                    <input type="text" id="filter_phone" class="form-control" placeholder="@lang('trans.phone')">
                </div>

                <div class="col-md-2">
                    <label>@lang('trans.email')</label>
                    <input type="text" id="filter_email" class="form-control" placeholder="@lang('trans.email')">
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-secondary w-100" id="resetFilters">
                        @lang('trans.reset')
                    </button>
                </div>

            </div>
        </div>
    </div>


    <table class="table table-bordered dataTable table-striped" id="DataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('trans.rental')</th>
                <th>@lang('trans.payment')</th>
                <th>@lang('trans.name')</th>
                <th>@lang('trans.phone')</th>
                <th>@lang('trans.email')</th>
                <th>@lang('trans.sub_total')</th>
                <th>@lang('trans.vat')</th>
                <th>@lang('trans.net_total')</th>
                <th>@lang('trans.paid')</th>
                <th>@lang('trans.datetime')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection



@push('js')
    <script>
        var table = $('#DataTable').DataTable({
            stateSave: true,
            oLanguage: {
                sUrl: $('meta[name="DT_Lang"]').attr('content')
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        stripHtml: false,
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.datatable-rental_requests') }}',
                data: function(d) {

                    d.from_date = $('#from_date').val();
                    d.to_date = $('#to_date').val();
                    d.name = $('#filter_name').val();
                    d.phone = $('#filter_phone').val();
                    d.email = $('#filter_email').val();

                    if (d.order && d.order.length > 0) {
                        d.sort_column = d.columns[d.order[0].column].name ?? 'id';
                        d.sort_direction = d.order[0].dir;
                    } else {
                        d.sort_column = 'id';
                        d.sort_direction = 'desc';
                    }
                }
            },

            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'rental',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'payment',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'sub_total',
                    name: 'sub_total'
                },
                {
                    data: 'vat',
                    name: 'vat'
                },
                {
                    data: 'net_total',
                    name: 'net_total'
                },
                {
                    data: 'paid',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'actions',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#from_date, #to_date').on('change', function() {
            table.draw();
        });

        $('#filter_name, #filter_phone, #filter_email').on('keyup', function() {
            table.draw();
        });

        $('#resetFilters').on('click', function() {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#filter_name').val('');
            $('#filter_phone').val('');
            $('#filter_email').val('');
            table.draw();
        });
    </script>
@endpush
