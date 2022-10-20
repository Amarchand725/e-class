@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{ $model->logo }}</td><td>{{ $model->name }}</td><td>{{ $model->email }}</td><td>{{ $model->mobile }}</td><td>{{ $model->skill }}</td><td>{{ $model->address }}</td><td>{{ $model->affilated_by }}</td><td>{{ $model->about }}</td><td>{{ $model->is_verified }}</td><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td><td width="250px"><a href="{{ route("institute.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Institute" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a><a href="{{ route("institute.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Institute" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a><button data-toggle="tooltip" data-placement="top" title="Delete Institute" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("institute.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button></td>
    </tr>
@endforeach
<tr>
    <td colspan="14">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
