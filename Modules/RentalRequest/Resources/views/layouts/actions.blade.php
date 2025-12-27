@if (hasPermission('edit_rental_requests'))
    <a href="{{ route(activeGuard() . '.rental_requests.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
@endif
@if (hasPermission('delete_rental_requests'))
    <form class="formDelete" method="POST" action="{{ route(activeGuard() . '.rental_requests.destroy', $Model) }}">
        @csrf
        @method('delete')
        <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
            <i class="fa-solid fa-eraser"></i>
        </button>
    </form>
@endif
