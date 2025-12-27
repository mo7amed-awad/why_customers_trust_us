@if(hasPermission('edit_payments'))
    <input class="toggle" type="checkbox" onclick="toggleswitch({{ $Model->id }},'payments')" @if ($Model->status) checked @endif>
@else
    @if($Model->status)
        @lang('trans.active')
    @else
        @lang('trans.not-active')
    @endif
@endif
