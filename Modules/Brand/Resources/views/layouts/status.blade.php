@if (hasPermission('edit_brands'))
    <input class="toggle" type="checkbox" onclick="toggleswitch({{ $Model->id }},'brands')"
        @if ($Model->status) checked @endif>
@else
    @if ($Model->status)
        @lang('trans.active')
    @else
        @lang('trans.not-active')
    @endif
@endif
