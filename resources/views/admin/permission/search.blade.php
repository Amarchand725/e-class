@foreach($permissions as $key=>$permission)
    <tr id="id-{{ $permission->id }}">
        <td>{{  $permissions->firstItem()+$key }}.</td>
        <td>{{ Str::ucfirst($permission->name) }}</td>
        <td>
            <ul>
                @foreach ($permission->havePermissionUrls as $permission_url)
                    <li>{{ Str::ucfirst($permission_url->permission) }}</li>
                @endforeach
            </ul>
        </td>
        <td>
            <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $permission->id }}" data-del-url="{{ route("permission.destroy", $permission->id) }}"><i class="fa fa-trash"></i> Delete</button>
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