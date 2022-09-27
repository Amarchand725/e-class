@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{ $model->user_id }}</td><td>{{ $model->first_name }}</td><td>{{ $model->last_name }}</td><td>{{ $model->email }}</td><td>{{ $model->mobile }}</td><td>{{ $model->role_id }}</td><td>{{ $model->password }}</td><td>{{ $model->address }}</td><td>{{ $model->country_id }}</td><td>{{ $model->state_id }}</td><td>{{ $model->city_id }}</td><td>{{ $model->profile_image }}</td><td>{{ $model->facebook_url }}</td><td>{{ $model->twitter_url }}</td><td>{{ $model->youtube_url }}</td><td>{{ $model->linked_in_url }}</td><td>{{ $model->details }}</td><td>@if($model->status)<span class="label label-success">Active</span>@else<span class="label label-danger">In-Active</span>@endif</td><td width="250px"><a href="{{ route("userprofile.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show UserProfile" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a><a href="{{ route("userprofile.edit", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Edit UserProfile" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a><button data-toggle="tooltip" data-placement="top" title="Delete UserProfile" class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route("userprofile.destroy", $model->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button></td>
    </tr>
@endforeach
<tr>
    <td colspan="22">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
