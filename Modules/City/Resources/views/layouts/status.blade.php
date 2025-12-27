@if(hasPermission('edit_cities'))
    <input class="toggle" type="checkbox" onclick="toggleswitch({{ $Model->id }},'cities')" @if ($Model->status) checked @endif>
@else
    @if($Model->status)
        @lang('trans.active')
    @else
        @lang('trans.not-active')
    @endif
@endif
