@extends(ucfirst(activeGuard()) . '.layout')

@section('pagetitle', __('trans.regions'))
@section('content')

    <div class="row">
        @if (hasPermission('add_regions'))
            <div class="my-2 col-6 text-sm-start">
                <a href="{{ route(activeGuard() . '.regions.create') }}" class="main-btn">@lang('trans.add_new')</a>
            </div>
        @endif
    </div>

    <table class="table table-bordered dataTable table-striped" id="DataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('trans.country')</th>
                <th>@lang('trans.title_ar')</th>
                <th>@lang('trans.title_en')</th>
                <th>@lang('trans.status')</th>
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
                url: '{{ route('admin.datatable-regions') }}',
                data: function(d) {
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
                    data: 'country',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title_ar',
                    name: 'title_ar'
                },
                {
                    data: 'title_en',
                    name: 'title_en'
                },
                {
                    data: 'status',
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
    </script>
@endpush
