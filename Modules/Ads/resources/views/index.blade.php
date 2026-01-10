@extends(ucfirst(activeGuard()) . '.layout')

@section('pagetitle', __('trans.ads'))
@section('content')


    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
                <th>#</th>
                <th>@lang('trans.category_name')</th>
                <th>@lang('trans.subcategory_name')</th>
                <th>@lang('trans.title')</th>
                <th>@lang('trans.description')</th>
                <th>@lang('trans.is_active')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Models as $Model)
                <tr>
                    <td>
                        <input type="checkbox" class="DTcheckbox" value="{{ $Model->id }}">
                    </td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $Model->category->trans('title') }}</td>
                    <td>{{ $Model->subCategory->trans('title') }}</td>
                    <td>{{ $Model->title }}</td>
                    <td>{{ $Model->description }}</td>
                    <td>
                        <span
                                class="badge toggle-active {{ $Model->is_active ? 'bg-success' : 'bg-danger' }}"
                                data-id="{{ $Model->id }}"
                                style="cursor: pointer;"
                        >
                            {{ $Model->is_active ? __('trans.active') : __('trans.inactive') }}
                        </span>
                    </td>
                    <td>
                        @if (hasPermission('show_ads'))
                            <a href="{{ route(activeGuard() . '.ads.show', $Model) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.toggle-active').click(function() {
                    let badge = $(this);
                    let id = badge.data('id');

                    $.ajax({
                        url: "{{ route('admin.ads.toggleActive') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(response) {
                            if(response.is_active) {
                                badge.removeClass('bg-danger').addClass('bg-success').text("{{ __('trans.active') }}");
                            } else {
                                badge.removeClass('bg-success').addClass('bg-danger').text("{{ __('trans.inactive') }}");
                            }
                        },
                        error: function() {
                            alert('حدث خطأ، حاول مرة أخرى');
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
