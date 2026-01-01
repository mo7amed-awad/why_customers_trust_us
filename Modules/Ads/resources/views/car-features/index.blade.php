@extends(ucfirst(activeGuard()) . '.layout')

@section('pagetitle', __('trans.about'))
@section('content')

    <div class="row">
        @if (hasPermission('add_ads'))
            <div class="my-2 col-6 text-sm-start">
                <a href="{{ route(activeGuard() . '.car-features.create') }}" class="main-btn">@lang('trans.add_new')</a>
            </div>
        @endif
        @if (hasPermission('delete_ads'))
            <div class="my-2 col-6 text-sm-end">
                <button type="button" id="DeleteSelected" onclick="DeleteSelected('car-features')" class="btn btn-danger"
                        disabled>@lang('trans.Delete_Selected')</button>
            </div>
        @endif
    </div>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
            <th>#</th>
            <th>@lang('trans.title_ar')</th>
            <th>@lang('trans.title_en')</th>
            <th>@lang('trans.type')</th>
            <th>@lang('trans.icon')</th>
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
                <td>{{ $Model->title_ar }}</td>
                <td>{{ $Model->title_en }}</td>
                <td>{{ __("trans.".$Model->type) }}</td>
                <td>
                    @if($Model->icon)
                        <img src="{{ asset($Model->icon) }}" alt="icon" width="40" height="40" style="object-fit: contain;">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    @if (hasPermission('edit_ads'))
                        <a href="{{ route(activeGuard() . '.car-features.edit', $Model) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                    @endif
                    @if (hasPermission('delete_ads'))
                        <form class="formDelete" method="POST"
                              action="{{ route(activeGuard() . '.car-features.destroy', $Model) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip"
                                    title="Delete">
                                <i class="fa-solid fa-eraser"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @push('scripts')
        <script>
            function DeleteSelected(resource) {
                let selected = [];
                $('.DTcheckbox:checked').each(function() {
                    selected.push($(this).val());
                });

                if(selected.length === 0) return;

                if(!confirm("هل أنت متأكد من حذف العناصر المحددة؟")) return;

                $.ajax({
                    url: "{{ route('admin.car-features.deleteSelected') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: selected
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // إعادة تحميل الصفحة بعد الحذف
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        alert('حدث خطأ: ' + (xhr.responseJSON?.message || 'غير معروف'));
                    }
                });
            }

            $(document).ready(function() {
                // تفعيل زر الحذف عند اختيار عنصر واحد على الأقل
                $('.DTcheckbox, #ToggleSelectAll').on('change', function() {
                    let anyChecked = $('.DTcheckbox:checked').length > 0;
                    $('#DeleteSelected').prop('disabled', !anyChecked);
                });

                // زرار تحديد كل العناصر
                $('#ToggleSelectAll').on('change', function() {
                    $('.DTcheckbox').prop('checked', $(this).prop('checked')).trigger('change');
                });
            });
        </script>


    @endpush
@endsection
