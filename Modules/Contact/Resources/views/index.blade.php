@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.contact'))
@section('content')


    <div class="row">
        @if (hasPermission('delete_contacts'))
            <div class="my-2 text-sm-end">
                <button type="button" id="DeleteSelected" onclick="DeleteSelected('contacts')" class="btn btn-danger"
                    disabled>@lang('trans.Delete_Selected')</button>
            </div>
        @endif
    </div>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                @if (hasPermission('delete_contacts'))
                    <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
                @endif
                <th>#</th>
                <th>@lang('trans.time')</th>
                <th>@lang('trans.name')</th>
                <th>@lang('trans.email')</th>
                <th>@lang('trans.phone')</th>
                <th>@lang('trans.phone_code')</th>
                <th>@lang('trans.subject')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Models as $Model)
                <tr>
                    @if (hasPermission('delete_contacts'))
                        <td>
                            <input type="checkbox" class="DTcheckbox" value="{{ $Model->id }}">
                        </td>
                    @endif
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $Model->created_at->format('F j, Y, g:i a') }}</td>
                    <td>{{ $Model->name }}</td>
                    <td>{{ $Model->email }}</td>
                    <td>{{ $Model->phone }}</td>
                    <td>{{ $Model->phone_code }}</td>
                    <td>{{ $Model->subject }}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#ContactModal-{{ $Model->id }}"><i
                                class="fas fa-eye"></i></a>

                        <div class="modal fade" id="ContactModal-{{ $Model->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-4">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-bold">Contact Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            @if (lang() == 'ar') style="margin-right: 62%" @endif
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex py-3">
                                                <span class="text-muted me-3 w-25">@lang('trans.name')</span>
                                                <span class="flex-grow-1">{{ $Model['name'] }}</span>
                                            </div>
                                            <div class="list-group-item d-flex py-3">
                                                <span class="text-muted me-3 w-25">@lang('trans.phone')</span>
                                                <span class="flex-grow-1">{{ $Model['phone'] }}</span>
                                            </div>
                                            <div class="list-group-item d-flex py-3">
                                                <span class="text-muted me-3 w-25">@lang('trans.email')</span>
                                                <span class="flex-grow-1">{{ $Model['email'] }}</span>
                                            </div>
                                            <div class="list-group-item d-flex py-3">
                                                <span class="text-muted me-3 w-25">@lang('trans.subject')</span>
                                                <span class="flex-grow-1">{{ $Model['subject'] }}</span>
                                            </div>
                                            <div class="list-group-item d-flex py-3">
                                                <span class="text-muted me-3 w-25">@lang('trans.message')</span>
                                                <span class="flex-grow-1">{{ $Model['message'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
