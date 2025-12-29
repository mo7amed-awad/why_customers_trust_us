@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.category'))
@section('content')


    <div class="row">
        @if (hasPermission('add_category'))
            <div class="my-2 col-6 text-sm-start">
                <a href="{{ route(activeGuard() . '.category.create') }}" class="main-btn">@lang('trans.add_new')</a>
            </div>
        @endif
    </div>
    <table class="table table-bordered dataTable table-striped" id="DataTable">
        <thead>
        <tr>
            <th>#</th>
            <th>@lang('trans.title_ar')</th>
            <th>@lang('trans.title_en')</th>

            @if (hasPermission('edit_category'))
                <th>@lang('trans.status')</th>
            @endif

            <th>@lang('trans.actions')</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection


@push('js')
    <script>
        $('#DataTable').DataTable({
            stateSave: true,
            processing: true,
            serverSide: true,

            oLanguage: {
                sUrl: $('meta[name="DT_Lang"]').attr('content')
            },

            ajax: {
                url: '{{ route('admin.datatable-category') }}',
                data: function (d) {
                    if (d.order && d.order.length) {
                        d.sort_column = d.columns[d.order[0].column].name;
                        d.sort_direction = d.order[0].dir;
                    } else {
                        d.sort_column = 'id';
                        d.sort_direction = 'desc';
                    }
                }
            },

            columns: [
                {
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

                    @if (hasPermission('edit_category'))
                {
                    data: 'status',
                    orderable: false,
                    searchable: false
                },
                    @endif
                {
                    data: 'actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
@endpush
