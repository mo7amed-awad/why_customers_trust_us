@if (hasPermission('edit_testimonials'))
    <a href="{{ route(activeGuard() . '.testimonials.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
@endif
@if (hasPermission('delete_testimonials'))
    <form class="formDelete" method="POST" action="{{ route(activeGuard() . '.testimonials.destroy', $Model) }}">
        @csrf
        @method('delete')
        <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
            <i class="fa-solid fa-eraser"></i>
        </button>
    </form>
@endif
