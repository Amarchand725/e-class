@foreach($models as $key=>$model)
<tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{ $model->name }}</td>
        <td>{{ $model->hasState->name }}</td>
        <td>{{ $model->hasState->hasCountry->name }}</td>
        
        <td width="250px">
            <a href="{{ route("city.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show City" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>