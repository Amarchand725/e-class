@foreach($roles as $key=>$role)
    <tr id="id-{{ $role->id }}">
        <td>{{  $roles->firstItem()+$key }}.</td>
        <td>{{ $role->name }}</td>
        <td>{!! $role->description !!}</td>
        <td>
            @can('role-edit')
                <a class="btn btn-primary btn-xs" href="{{ route('role.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('role-delete')
                <button class="btn btn-danger btn-xs delete" data-role-id="{{ $role->id }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="4">
        Displying {{$roles->firstItem()}} to {{$roles->lastItem()}} of {{$roles->total()}} records
        <div class="d-flex justify-content-center">
            {!! $roles->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
