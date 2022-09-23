@foreach($models as $key=>$menu)
    <tr id="id-{{ $menu->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{ Str::ucfirst($menu->menu_of) }}</td>
        <td>{!! $menu->icon !!}</td>
        <td>{{ Str::ucfirst($menu->label) }}</td>
        <td>{{ isset($menu->hasParent)?$menu->hasParent->menu:'--' }}</td>
        <td>{{$menu->menu}}</td>
        <td>
            @if($menu->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $menu->id }}" data-del-url="{{ route('menu.destroy', $menu->id) }}"><i class="fa fa-trash"></i> Delete</button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
