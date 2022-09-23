@foreach($models as $model)
{index}
    <hr>
@endforeach
{{ $models->appends($_GET)->links() }}