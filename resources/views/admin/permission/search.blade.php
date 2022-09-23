@foreach($permissions as $key=>$permission)
    <tr id="id-{{ $permission->id }}">
        <td>{{  $permissions->firstItem()+$key }}.</td>
        <td>{{$permission->name}}</td>
        <td>{{$permission->guard_name}}</td>
        <td>
            @can('permission-edit')
                <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('permission-delete')
                <a class="btn btn-danger btn-xs delete-btn" data-permission-id="{{ $permission->id }}"><i class="fa fa-trash"></i> Delete</a>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="4">
        Displying {{$permissions->firstItem()}} to {{$permissions->lastItem()}} of {{$permissions->total()}} records
        <div class="d-flex justify-content-center">
            {!! $permissions->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
