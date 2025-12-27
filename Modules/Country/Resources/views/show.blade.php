@extends(ucfirst(activeGuard()) . '.layout')
@section('pagetitle', __('trans.countries'))
@section('content')

    <table class="table">
        <tr>
            <td colspan="2" class="text-center">
                <img src="{{ asset($Model->image ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file"
                    height="200px">
            </td>
        </tr>
        <tr>
            <td class="text-center">
                {{ $Model['title_en'] }}
            </td>
            <td class="text-center">
                {{ $Model['title_ar'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                {{ $Model['currancy_code_ar'] }}
            </td>
            <td class="text-center">
                {{ $Model['currancy_code_en'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                {{ __('trans.currancy_value') }}
            </td>
            <td class="text-center">
                {{ $Model['currancy_value'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                {{ __('trans.phone_code') }}
            </td>
            <td class="text-center">
                {{ $Model['phone_code'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                {{ __('trans.country_code') }}
            </td>
            <td class="text-center">
                {{ $Model['country_code'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                {{ __('trans.length') }}
            </td>
            <td class="text-center">
                {{ $Model['length'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                {{ __('trans.decimals') }}
            </td>
            <td class="text-center">
                {{ $Model['decimals'] }}
            </td>
        </tr>
    </table>

@endsection
