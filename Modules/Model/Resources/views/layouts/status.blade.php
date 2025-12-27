@if (hasPermission('edit_models'))
    <input class="toggle" type="checkbox" onclick="toggleswitch({{ $Model->id }},'models')"
        @if ($Model->status) checked @endif>
@else
    @if ($Model->status)
        @lang('trans.active')
    @else
        @lang('trans.not-active')
    @endif
@endif
