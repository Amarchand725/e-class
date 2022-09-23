 @include('flash_msgs')

{!! Form::open([
    'route' => 'crud.store'
]) !!}

<div class="form-group">
    {!! Form::label('title', 'Database Name:', ['class' => 'control-label']) !!}
    {!! Form::text('dbname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Table Name:', ['class' => 'control-label']) !!}
    {!! Form::textarea('tbname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Model Name:', ['class' => 'control-label']) !!}
    {!! Form::textarea('modelname', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New Task', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}