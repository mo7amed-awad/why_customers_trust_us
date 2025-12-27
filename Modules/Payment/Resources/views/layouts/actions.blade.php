@if(hasPermission('edit_payments'))
    <a href="{{ route(activeGuard() . '.payments.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
@endif
@if(hasPermission('delete_payments'))
    <form class="formDelete" method="POST" action="{{ route(activeGuard() . '.payments.destroy', $Model) }}">
        @csrf
        @method('delete')
        <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
            <i class="fa-solid fa-eraser"></i>
        </button>
    </form>
@endif
