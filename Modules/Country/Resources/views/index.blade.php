@extends(ucfirst(activeGuard()) . '.layout')

@section('pagetitle', __('trans.countries'))
@section('content')

    <div class="row">
        @if (hasPermission('add_countries'))
            <div class="my-2 col-6 text-sm-start">
                <a href="{{ route(activeGuard() . '.countries.create') }}" class="main-btn">@lang('trans.add_new')</a>
            </div>
        @endif
    </div>

    <table class="table table-bordered dataTable table-striped" id="DataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('trans.title_ar')</th>
                <th>@lang('trans.title_en')</th>
                <th>@lang('trans.currancy_code_ar')</th>
                <th>@lang('trans.currancy_code_en')</th>
                <th>@lang('trans.currancy_value')</th>
                <th>@lang('trans.phone_code')</th>
                <th>@lang('trans.country_code')</th>
                <th>@lang('trans.length')</th>
                <th>@lang('trans.decimals')</th>
                <th>@lang('trans.status')</th>
                <th>@lang('trans.image')</th>
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
                url: '{{ route('admin.datatable-countries') }}',
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
                    data: 'title_ar',
                    name: 'title_ar'
                },
                {
                    data: 'title_en',
                    name: 'title_en'
                },
                {
                    data: 'currancy_code_ar',
                    name: 'currancy_code_ar'
                },
                {
                    data: 'currancy_code_en',
                    name: 'currancy_code_en'
                },
                {
                    data: 'currancy_value',
                    name: 'currancy_value'
                },
                {
                    data: 'phone_code',
                    name: 'phone_code'
                },
                {
                    data: 'country_code',
                    name: 'country_code'
                },
                {
                    data: 'length',
                    name: 'length'
                },
                {
                    data: 'decimals',
                    name: 'decimals'
                },
                {
                    data: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'image',
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
