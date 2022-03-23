@if($trashed == 0)
<a href="{{ route('suppliers.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary edit btn-xs">
    Edit
</a>
<a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-dark btn-xs">
    Trash
</a>

@endif
@if($trashed == 1)
<a href="{{ route('suppliers.forceDelete',$id) }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger btn-xs">
    Delete
</a>
<a href="{{ route('suppliers.restore',$id) }}" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Restore" class="btn btn-warning btn-xs">
    Restore
</a>
@endif
