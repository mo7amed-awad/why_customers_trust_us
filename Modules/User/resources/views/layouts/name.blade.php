@if($Model->deleted_at)
    <i class="fa-solid fa-circle-dot text-danger"></i>
@endif
{{ $Model->name }}