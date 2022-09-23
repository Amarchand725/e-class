@extends('layouts.admin.app')

@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>Page Section</h1>
    </div>
    @can('page-create')
	<div class="content-header-right">
		<a href="{{ route('page.create') }}" class="btn btn-primary btn-sm">Add Page</a>
	</div>
	@endcan
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
				</div>
			@endif

			<div class="box box-info">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Title</th>
								<th>Description</th>
								<th>Created by</th>
                                <th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($models as $model)
								<tr id="id-{{ $model->id }}">
									<td>{{$model->id}}.</td>
									<td>{!! $model->title !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->description,60) !!}</td>
                                    <td>{{$model->hasCreatedBy->name}}</td>
									<td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else 
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										@can('page-edit')
											<a href="{{route('page.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit page" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('page-delete')
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete page" data-page-id="{{ $model->id }}"><i class="fa fa-trash"></i> Delete</a>
										@endcan

                                        <a href="{{route('page_setting.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Page Setting" class="btn btn-info btn-xs"><i class="fa fa-cog"></i> Setting</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@push('js')
<script>
    $('.delete-btn').on('click', function(){
        var id = $(this).attr('data-page-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{ url('page') }}/"+id,
                    type : 'DELETE',
                    data: {
                            "_token": "{{ csrf_token() }}",
                        },
                    success : function(response){
                        if(response){
                            $('#id-'+id).hide();
                            Swal.fire(
                                'Deleted!',
                                'Slider has been deleted.',
                                'success'
                            ) 
                        }else{
                            Swal.fire(
                                'Not Deleted!',
                                'Sorry! Something went wrong.',
                                'danger'
                            ) 
                        }
                    }
                });
            }
        })
    });

    $(document).ready(function() {
        $("#example1").DataTable();
    });
</script>
@endpush