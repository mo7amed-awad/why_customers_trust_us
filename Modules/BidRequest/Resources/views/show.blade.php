@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.bid_requests'))
@section('content')

    <table class="table">

        <tr>
            <td class="text-center">
                {{ $Model['email'] }}
            </td>
            <td class="text-center">
                {{ $Model['name'] }}
            </td>
        </tr>
    </table>

@endsection
