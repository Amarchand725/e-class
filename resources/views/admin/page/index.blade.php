@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('page.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>All Pages</h1>
    </div>
    {{-- @can('page-create') --}}
	<div class="content-header-right">
		<a href="{{ route('page.create') }}" class="btn btn-primary btn-sm">Add Page</a>
	</div>
	{{-- @endcan --}}
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
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Title</th>
								<th>Meta Title</th>
								<th>Meta Keyword</th>
								<th>Meta Description</th>
								<th>Description</th>
                                <th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->slug }}">
									<td>{{  $models->firstItem()+$key }}.</td>
									<td>{!! $model->title??'N/A' !!}</td>
									<td>{!! $model->meta_title??'N/A' !!}</td>
									<td>{!! $model->meta_keyword??'N/A' !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->meta_description??'N/A',60) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->description,60) !!}</td>
									<td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										@can('page-edit')
											<a href="{{route('page.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit page" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										{{-- @can('page-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->slug }}" data-del-url="{{ url('page', $model->slug) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan --}}

                                        <a href="{{route('page_setting.show', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Page Setting" class="btn btn-info btn-xs"><i class="fa fa-cog"></i> Setting</a>
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="8">
									Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $models->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@push('js')
@endpush
