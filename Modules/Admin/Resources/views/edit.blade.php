@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.admins'))

@section('content')

    <form action="{{ route(activeGuard() . '.admins.update', $Model) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="text-center">
            <img src="{{ asset($Model->image ?? setting('logo')) }}" class="rounded mx-auto text-center" id="image"
                style="max-width: 100%;max-height: 200px">
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <label for="name">{{ __('trans.name') }}</label>
                <input type="text" name="name" value="{{ old('name', $Model->name) }}" required id="name"
                    class="form-control">
            </div>
            <div class="col-md-6">
                <label for="phone">{{ __('trans.phone') }}</label>
                <label for="phone">@lang('trans.phone')</label>
                <input type="hidden" name="country_code" id="country_code" value="{{ $Model->country_code }}">
                <input type="hidden" name="phone_code" id="phone_code" value="{{ $Model->phone_code }}">
                <input type="tel" name="phone" id="phone" class="form-control" required value="{{ $Model->phone }}">
            </div>
            <div class="col-md-6">
                <label for="password">{{ __('trans.password') }}</label>
                <input class="form-control w-100" type="password" name="password">
            </div>
            <div class="col-md-6">
                <label for="password_confirmation">{{ __('trans.confirmPassword') }}</label>
                <input class="form-control w-100" type="password" name="password_confirmation">
            </div>
            <div class="col-md-6">
                <label for="email">{{ __('trans.email') }}</label>
                <input class="form-control w-100" type="text" name="email" value="{{ old('email', $Model->email) }}">
            </div>
            <div class="col-md-6">
                <label for="image">{{ __('trans.image') }}</label>
                <input class="form-control w-100" id="image" type="file" name="image"
                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
            </div>


            <div class="my-3">
                <h3>
                    @lang('trans.permissions')
                </h3>
                <div class="row">
                    @foreach ($Permissions as $type => $AllPermissions)
                        <div class="col-6 col-md-4 col-lg-3 col-xxl-2">
                            <div class="card common-table-card mb-4">
                                <div class="card-body">
                                    <ul class="multiple-checkbox">
                                        <!--List Step-1 -->
                                        <li>
                                            <input type="checkbox" class="custom-control-input" @checked($Model->Permissions->where('type', $type)->count() == $AllPermissions->count())
                                                id="all-{{ $type }}">
                                            <label style="color: red;" class="custom-control-label"
                                                for="all-{{ $type }}">@lang('trans.' . $type)</label>
                                            <ul class="mx-3">
                                                <!--List Step-2 -->
                                                @foreach ($AllPermissions as $Permission)
                                                    <li>
                                                        <input type="checkbox" class="custom-control-input"
                                                            value="{{ $Permission->id }}" @checked($Model->Permissions->where('id', $Permission->id)->count() > 0)
                                                            name="permissions[]" id="all-{{ $Permission->id }}">
                                                        <label class="custom-control-label"
                                                            for="all-{{ $Permission->id }}">{{ lang('ar') ? $Permission->title_ar : $Permission->title_en }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 my-4">
                <div class="button-group my-4 text-center">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>

    @include('phone')
@endsection




@push('js')
    <script>
        $(document).on('change', 'input[type="checkbox"]', function(e) {
            var checked = $(this).prop("checked");
            var container = $(this).parent();
            var siblings = container.siblings();

            container.find('input[type="checkbox"]').prop({
                indeterminate: false,
                checked: checked
            });

            function checkSiblings(el) {

                var parent = el.parent().parent();
                var all = true;

                el.siblings().each(function() {
                    return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
                });

                if (all && checked) {

                    parent.children('input[type="checkbox"]').prop({
                        indeterminate: false,
                        checked: checked
                    });

                    checkSiblings(parent);

                } else if (all && !checked) {

                    parent.children('input[type="checkbox"]').prop("checked", checked);
                    parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find(
                        'input[type="checkbox"]:checked').length > 0));
                    checkSiblings(parent);

                } else {

                    el.parents("li").children('input[type="checkbox"]').prop({
                        indeterminate: true,
                        checked: false
                    });

                }

            }

            checkSiblings(container);
        });
    </script>
@endpush

@push('css')
    <style>
        .multiple-checkbox {
            padding-left: 20px;
        }

        .multiple-checkbox li {
            margin-top: 4px;
        }

        .multiple-checkbox .custom-control-label {
            font-weight: 600;
            color: #666;
        }

        .custom-control-label::before {
            border-radius: 3px;
        }

        .custom-control-input:checked~.custom-control-label::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3e%3c/svg%3e")
        }

        .custom-control-input:indeterminate~.custom-control-label::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 4'%3e%3cpath stroke='%23fff' d='M0 2h4'/%3e%3c/svg%3e") !important;
            border-radius: 3px;
            color: #fff;
            border-color: #007bff;
            background-color: #007bff;
        }
    </style>
@endpush
