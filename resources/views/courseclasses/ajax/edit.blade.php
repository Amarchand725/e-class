<div class="box-body">
	<input type="hidden" name="course_id" value="{{ $model->course_id }}">
	<div class="form-group">
		<label for="chapter_id" class="col-sm-3 control-label">Chapter Name <span style="color:red">*</span></label>
		<div class="col-sm-8">
			<select id="chapter_id" class="form-control" name="chapter_id">
				<option value="" selected>Select Chapter</option>
				@foreach ($coursechapters as $chapter)
					<option value="{{ $chapter->id }}" {{ $model->chapter_id==$chapter->id?'selected':'' }}>{{ $chapter->name }}</option>
				@endforeach
			</select>
			<span style="color: red" id="error-chapter_id">{{ $errors->first("chapter_id") }}</span>
		</div>
	</div>
	<div class="form-group">
		<label for="title" class="col-sm-3 control-label">Title <span style="color:red">*</span></label>
		<div class="col-sm-8">
			<input type="text" id="title" class="form-control" name="title" placeholder="Enter title" value="{{ $model->title }}">
			<span style="color: red" id="error-title">{{ $errors->first("title") }}</span>
		</div>
	</div>
	<div class="form-group">
		<label for="detail" class="col-sm-3 control-label">Detail </label>
		<div class="col-sm-8">
			<textarea class="form-control" id="detail" rows="5" name="detail" placeholder="Enter detail" >{{ $model->detail }}</textarea>
			<span style="color: red" id="error-detail">{{ $errors->first("detail") }}</span>
		</div>
	</div>
	<div class="form-group">
		<label for="type" class="col-sm-3 control-label">Type <span style="color:red">*</span></label>
		<div class="col-sm-8">
			@php $types = ['Video', 'Audio', 'Image', 'Zip', 'Pdf / Powerpoint / Notepad'] @endphp 
			<select id="type" class="form-control edit-file-type" name="type">
				<option value="" selected>Select Type</option>
				@foreach ($types as $type)
					<option value="{{ $type }}" {{ $model->type==$type?'selected':'' }}>{{ $type }}</option>
				@endforeach
			</select>
			<span style="color: red" id="error-type">{{ $errors->first("type") }}</span>
		</div>
	</div>
	
	<span id="edit-class-custom">
		@if($model->type=='Video')
			<div class="form-group">
				<label for="lecture" class="col-sm-3 control-label">Exist Lecture </label>
				<div class="col-sm-8">
					<video width="220" height="140" controls>
						<source src="{{ asset('public/admin/course_class/lectures') }}/{{ $model->lecture }}" type="video/mp4">
						<source src="{{ asset('public/admin/course_class/lectures') }}/{{ $model->lecture }}" type="video/ogg">
						Your browser does not support the video tag.
					</video>
				</div>
			</div>
		@elseif($model->type=='Image')
			<div class="form-group">
				<label for="image" class="col-sm-3 control-label">Exist Image </label>
				<div class="col-sm-8">
					<img id="preview" src="{{ asset('public/admin/course_class/attachments') }}/{{ $model->attachment }}" width="100px" alt="">
				</div>
			</div>
		@else 
			<div class="form-group">
				<label for="image" class="col-sm-3 control-label">Exist Attachment </label>
				<div class="col-sm-8">
					<a href="{{ asset('public/admin/course_class/attachments') }}/{{ $model->attachment }}" download><i class="fa fa-download"></i> {{ $model->attachment }}</a>
				</div>
			</div>
		@endif
	</span>

	<div class="form-group">
		<label for="status" class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
			<button type="submit" class="btn btn-success pull-left">Save</button>
		</div>
	</div>
</div>