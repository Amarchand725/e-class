@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{ $model->created_by }}</td><td>{{ $model->title }}</td><td>{{ $model->slug }}</td><td>{{ $model->price }}</td><td>{{ $model->short_description }}</td><td>{{ $model->requirements }}</td><td>{{ $model->full_description }}</td><td>{{ $model->is_featured }}</td><td>{{ $model->thumbnail }}</td><td>{{ $model->video }}</td><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td><td width="250px"><a href="{{ route("course.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Course" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a><a href="{{ route("course.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Course" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a><button data-toggle="tooltip" data-placement="top" title="Delete Course" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("course.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button></td>
    </tr>
@endforeach
<tr>
    <td colspan="15">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
