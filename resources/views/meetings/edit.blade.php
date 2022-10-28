@extends('layouts.admin.app')
@section('title', 'Edit Meeting')
@push('css')
@endpush
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Meeting</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("meeting.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("meeting.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                {{ method_field('PATCH') }}

				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="course_slug" class="col-sm-2 control-label">Courses</label>
                            <div class="col-sm-8">
                                <select name="course_slug" id="course_slug" class="form-control">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->slug }}" {{ $course->slug==$model->course_slug?'selected':'' }}>{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first("course_slug") }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="course_chapter" class="col-sm-2 control-label">Chapters</label>
                            <div class="col-sm-8">
                                <select name="course_chapter" id="course_chapter" class="form-control">
                                    <option value="">Select Chapter</option>
                                    @foreach ($chapters as $chapter)
                                        <option value="{{ $chapter->id }}" {{ $model->course_chapter==$chapter->id?'selected':'' }}>{{ $chapter->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first("course_chapter") }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="chapter_class" class="col-sm-2 control-label">Classes</label>
                            <div class="col-sm-8">
                                <select name="chapter_class" id="chapter_class" class="form-control">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}" {{ $model->chapter_class==$class->id?'selected':'' }}>{{ $class->title }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first("chapter_class") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meeting_url" class="col-sm-2 control-label">Zoom Meeting URL <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="meeting_url" value="{{ $model->meeting_url }}" placeholder="Enter meeting_url">
                            <span style="color: red">{{ $errors->first("meeting_url") }}</span></div></div>

                        <div class="form-group">
                            <label for="meeting_from" class="col-sm-2 control-label">Meeting From</label>
                            <div class="col-sm-8">
                                <select name="meeting_from" id="meeting_from" class="form-control">
                                    <option value="zoom" {{ $model->meeting_from=='zoom'?'selected':'' }}>Zoom</option>
                                </select>
                                <span style="color: red">{{ $errors->first("meeting_from") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Zoom Email <span style="color:red">*</span></label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="email" value="{{ $model->email }}" placeholder="Enter email">
                                <span style="color: red">{{ $errors->first("email") }}</span></div></div>
                        
                        <div class="form-group">
                            <label for="start_date" class="col-sm-2 control-label">Start Date <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="date" class="form-control" name="start_date" value="{{ $model->start_date }}" placeholder="Enter start_date">
                            <span style="color: red">{{ $errors->first("start_date") }}</span></div></div>

                        <div class="form-group">
                            <label for="start_time" class="col-sm-2 control-label">Start Time <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="time" class="form-control" name="start_time" value="{{ $model->start_time }}" placeholder="Enter start_time">
                            <span style="color: red">{{ $errors->first("start_time") }}</span></div></div>
                        
                        <div class="form-group">
                            <label for="topic" class="col-sm-2 control-label">Topic <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="topic" value="{{ $model->topic }}" placeholder="Enter topic">
                            <span style="color: red">{{ $errors->first("topic") }}</span></div></div>

                        <div class="form-group">
                            <label for="agenda" class="col-sm-2 control-label">Agenda</label>
                            <div class="col-sm-8">
                                <textarea name="agenda" class="form-control ckeditor" id="agenda" rows="5" placeholder="Enter agenda">{{ $model->agenda }}</textarea>
                                <span style="color: red">{{ $errors->first("agenda") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail" class="col-sm-2 control-label">Thumbnail @if(empty($model->thumbnail)) <span style="color:red">*</span> @endif</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imgInput" name="thumbnail" accept="image/*">
                                <span style="color: red">{{ $errors->first("thumbnail") }}</span>
                            </div>
                        </div>
                        @if($model->thumbnail)
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Thumbnail </label>
								<div class="col-sm-8">
									<img id="preview" src="{{ asset('public/admin/images/meetings') }}/{{ $model->thumbnail }}" width="100px" alt="">
								</div>
							</div>
                        @else 
                            <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">Preview</label>
                                <div class="col-sm-8">
                                    <img id="preview" src="{{ asset('public/default.png') }}" width="100px" alt="">
                                </div>
                            </div>
						@endif

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="status" class="cmn-toggle cmn-toggle-round-flat" value="1" @if($model->status) checked @endif name="status" type="checkbox">
                                    <label for="status"></label>
                                </div>
                                <span style="color: red">{{ $errors->first("status") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success pull-left">Save</button>
                            </div>
                        </div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
    <script>
        $(document).on('change', '#course_slug', function(){
            var course_slug = $(this).val();
            $.ajax({
                url : "{{ route('get-chapters') }}",
                data : {'course_slug' : course_slug},
                type : 'GET',
                success : function(result){
                    var html = '';
                    jQuery.each(result, function(index, val) {
                        html +='<option value="'+val.id+'">'+val.name+'</option>';
                    });

                    $('#course_chapter').html(html);
                }
            });
        });
        $(document).on('change', '#course_chapter', function(){
            var chapter_id = $(this).val();
            $.ajax({
                url : "{{ route('get-classes') }}",
                data : {'chapter_id' : chapter_id},
                type : 'GET',
                success : function(result){
                    var html = '';
                    jQuery.each(result, function(index, val) {
                        html +='<option value="'+val.id+'">'+val.title+'</option>';
                    });

                    $('#chapter_class').html(html);
                }
            });
        });
    </script>
@endpush
