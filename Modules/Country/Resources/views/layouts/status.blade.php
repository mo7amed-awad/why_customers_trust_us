@if(hasPermission('edit_countries'))
    <input class="toggle" type="checkbox" onclick="toggleswitch({{ $Model->id }},'countries')" @if ($Model->status) checked @endif>
@else
    @if($Model->status)
        @lang('trans.active')
    @else
        @lang('trans.not-active')
    @endif
@endif
