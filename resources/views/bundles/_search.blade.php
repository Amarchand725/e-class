@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{ $model->course_ids }}</td><td>{{ $model->title }}</td><td>{{ $model->short_detail }}</td><td>{{ $model->details }}</td><td>{{ $model->banner }}</td><td>{{ $model->is_paid }}</td><td>{{ $model->is_featured }}</td><td>{{ date("d, M-Y", strtotime($model->start_from)) }}</td><td>{{ date("d, M-Y", strtotime($model->end_date)) }}</td><td>{{ $model->retail_price }}</td><td>{{ $model->price }}</td><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td><td width="250px"><a href="{{ route("bundle.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Bundle" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a><a href="{{ route("bundle.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Bundle" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a><button data-toggle="tooltip" data-placement="top" title="Delete Bundle" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("bundle.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button></td>
    </tr>
@endforeach
<tr>
    <td colspan="16">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
