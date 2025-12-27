@if (hasPermission('edit_rentals'))
    <a href="{{ route(activeGuard() . '.rentals.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
@endif
@if (hasPermission('delete_rentals'))
    <form class="formDelete" method="POST" action="{{ route(activeGuard() . '.rentals.destroy', $Model) }}">
        @csrf
        @method('delete')
        <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
            <i class="fa-solid fa-eraser"></i>
        </button>
    </form>
@endif
