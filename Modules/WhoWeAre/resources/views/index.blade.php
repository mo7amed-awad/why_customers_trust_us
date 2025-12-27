@extends(ucfirst(activeGuard()) . '.layout')

@section('pagetitle', __('trans.about'))
@section('content')

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
                <th>#</th>
                <th>@lang('trans.desc_ar')</th>
                <th>@lang('trans.desc_en')</th>
                <th>@lang('trans.image')</th>
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
                    <td>{{ $Model->desc_ar }}</td>
                    <td>{{ $Model->desc_en }}</td>
                    <td>
                        @if($Model->image)
                            <img src="{{ asset($Model->image) }}"
                                 width="80" height="80" style="object-fit: cover; border-radius: 8px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>
                        @if (hasPermission('show_about'))
                            <a href="{{ route(activeGuard() . '.whoweare.show', $Model) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        @endif
                        @if (hasPermission('edit_about'))
                            <a href="{{ route(activeGuard() . '.whoweare.edit', $Model) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
