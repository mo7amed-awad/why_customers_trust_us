@if(hasPermission('edit_regions'))
    <input class="toggle" type="checkbox" onclick="toggleswitch({{ $Model->id }},'regions')" @if ($Model->status) checked @endif>
@else
    @if($Model->status)
        @lang('trans.active')
    @else
        @lang('trans.not-active')
    @endif
@endif
