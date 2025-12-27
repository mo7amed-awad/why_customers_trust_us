@extends(ucfirst(activeGuard()) . '.layout')

@section('pagetitle', __('trans.terms'))
@section('content')

    <div class="row">
        @if (hasPermission('add_terms'))
            <div class="my-2 col-6 text-sm-start">
                <a href="{{ route(activeGuard() . '.terms.create') }}" class="main-btn">@lang('trans.add_new')</a>
            </div>
        @endif
        @if (hasPermission('delete_terms'))
            <div class="my-2 col-6 text-sm-end">
                <button type="button" id="DeleteSelected" onclick="DeleteSelected('terms')" class="btn btn-danger"
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
                    <td>
                        @if (hasPermission('edit_terms'))
                            <a href="{{ route(activeGuard() . '.terms.edit', $Model) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        @endif
                        @if (hasPermission('delete_terms'))
                            <form class="formDelete" method="POST"
                                action="{{ route(activeGuard() . '.terms.destroy', $Model) }}">
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

@endsection
