@if (hasPermission('edit_biddings'))
    <a href="{{ route(activeGuard() . '.biddings.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
@endif
@if (hasPermission('delete_biddings'))
    <form class="formDelete" method="POST" action="{{ route(activeGuard() . '.biddings.destroy', $Model) }}">
        @csrf
        @method('delete')
        <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
            <i class="fa-solid fa-eraser"></i>
        </button>
    </form>
@endif
