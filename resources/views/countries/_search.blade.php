@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{  $models->firstItem()+$key }}.</td>
        <td>{{ $model->name }}</td>
        <td>{{ $model->phonecode }}</td>
        <td>{{ $model->currency }}</td>
        <td>{{ $model->currency_symbol }}</td>
        <td width="250px">
            <a href="{{ route("country.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show Country" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="11">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>