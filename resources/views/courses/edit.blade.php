@extends('layouts.admin.app')
@section('title', 'Edit Course')
@push('css')
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }
    </style>
@endpush
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Course</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("course.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("course.update", $model->id) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
                {{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="title" value="{{ $model->title }}" placeholder="Enter title">
                        <span style="color: red">{{ $errors->first("title") }}</span></div></div>

                        <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Sale Price</label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="sale_price" value="{{ $model->sale_price }}" placeholder="Enter sale price">
                        <span style="color: red">{{ $errors->first("sale_price") }}</span></div></div>

                        <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Actual Price</label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="price" value="{{ $model->price }}" placeholder="Enter price">
                        <span style="color: red">{{ $errors->first("sale_price") }}</span></div></div>

                        <div class="form-group">
                        <label for="short_description" class="col-sm-2 control-label">Short Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="requirements" rows="10" name="short_description" placeholder="Enter short_description">{{ $model->short_description }}</textarea>
                        <span style="color: red">{{ $errors->first("short_description") }}</span></div></div>

                        <div class="form-group">
                        <label for="requirements" class="col-sm-2 control-label">Requirements</label>
                        <div class="col-sm-8">
                            <textarea class="form-control ckeditor" id="requirements" rows="10" name="requirements">{{ $model->requirements }}</textarea>
                        <span style="color: red">{{ $errors->first("requirements") }}</span></div></div>

                        <div class="form-group">
                        <label for="full_description" class="col-sm-2 control-label">Full Description</label>
                        <div class="col-sm-8"><textarea class="form-control ckeditor" rows="10" id="full_description" name="full_description">{{ $model->full_description }}</textarea>
                        <span style="color: red">{{ $errors->first("full_description") }}</span></div></div>

                        <div class="form-group">
                            <label for="is_featured" class="col-sm-2 control-label">Is Featured</label>
                            <div class="col-sm-8">
                                <div class="form-group form-check">
                                    <input type="checkbox" value="1" @if($model->is_featured) checked @endif class="form-check-input" id="is_featured" name="is_featured">
                                    <label class="form-check-label" for="is_featured">Check if featured</label>
                                </div>
                                <span style="color: red">{{ $errors->first("is_featured") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="thumbnail" class="col-sm-2 control-label">Thumbnail @if(!$model->thumbnail) <span style="color:red">*</span> @endif</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="imgInput" accept="image/*" name="thumbnail">
                        <span style="color: red">{{ $errors->first("thumbnail") }}</span></div></div>

                        @if($model->thumbnail)
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Thumbnail </label>
								<div class="col-sm-8">
									<img id="preview" src="{{ asset('public/admin/images/courses') }}/{{ $model->thumbnail }}" width="100px" alt="">
								</div>
							</div>
						@endif

                        @if($model->video)
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Video </label>
								<div class="col-sm-8">
									<video width="320" height="240" controls>
                                        <source src="{{ asset('public/admin/images/courses') }}/{{ $model->video }}" type="video/mp4">
                                        <source src="{{ asset('public/admin/images/courses') }}/{{ $model->video }}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
								</div>
							</div>
						@endif

                        <div class="form-group">
                        <label for="video" class="col-sm-2 control-label">Video</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="video" accept="video/*">
                        <span style="color: red">{{ $errors->first("video") }}</span></div></div>

                        <div class="form-group">
                            <label for="learn" class="col-sm-2 control-label">Whatlearn</label>
                            <div class="col-sm-8">
                                <div class="col-sm-12">
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" name="learns[]" placeholder="Enter whatlearn">
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" class="btn btn-success" id="add-more-learns-btn"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>

                                <span id="custom-learn-fields">
                                    @if(count($model->haveWhatLearns))
                                        @foreach ($model->haveWhatLearns as $what_learn)
                                            <div class="col-sm-12 custom" style="margin-top:5px !important">
                                                <div class="col-sm-11">
                                                    <input type="text" class="form-control" value="{{ $what_learn->title }}" name="learns[]" placeholder="Enter whatlearn">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" id="remove-more-learns-btn"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="learn" class="col-sm-2 control-label">Course Includes</label>
                            <div class="col-sm-8">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label for="" class="control-label">Icon <span style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="icons[]" value="{{ old('icon') }}" placeholder="e.g <i class='fa fa-user' aria-hidden='true'></i>" required>
                                                <a href="https://fontawesome.com/v4/icons/" style="margin-top: 5px" target="_blank" class="btn btn-success">Choose Icon</a><br />
                                                <span style="color: red">{{ $errors->first('icons') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="" class="control-label">Include <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="includes[]" placeholder="Enter what include this course">
                                    </div>
                                    <div class="col-sm-1">
                                        <label for=""> </label>
                                        <button style="margin-top:6px" type="button" class="btn btn-success" id="add-more-include-btn"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <span id="custom-course-include-fields">
                                    @if(count($model->haveCourseIncludes))
                                        @foreach ($model->haveCourseIncludes as $include)
                                            <div class="col-sm-12 custom" style="margin-top:5px !important">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="icons[]" value="{{ $include->icon }}" placeholder="e.g <i class=fa fa-user aria-hidden=true></i>" required>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" value="{{ $include->title }}" name="includes[]" placeholder="Enter what include this course">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" id="remove-more-include-btn"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tags" class="col-sm-2 control-label">Tags</label>
                            <div class="col-sm-8 input-group">
                                @php $tags = ''; @endphp
                                @if(count($model->haveTags))
                                    @foreach ($model->haveTags as $tag)
                                        @php $tags .= $tag->tag.',' @endphp
                                    @endforeach
                                @endif

                                <input type="text" class="form-control" name="tags[]" value="{{ $tags }}" data-role="tagsinput" placeholder="Write tag label press enter">
                                <span style="color: red">{{ $errors->first("tags") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
                        <div class="col-sm-8"><select class="form-control" name="status"><option value="1" {{ $model->status==1?"selected":"" }}>Active</option><option value="0" {{ $model->status==0?"selected":"" }}>In Active</option></select><span style="color: red">{{ $errors->first("status") }}</span></div></div><label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6"><button type="submit" class="btn btn-success pull-left">Save</button></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
    <script>
        $(document).on('click', '#add-more-learns-btn', function(){
            var html = '';
            html += '<div class="col-sm-12 custom" style="margin-top:5px !important" >'+
                        '<div class="col-sm-11">'+
                            '<input type="text" class="form-control" name="learns[]" placeholder="Enter whatlearn">'+
                        '</div>'+
                        '<div class="col-sm-1">'+
                            '<button type="button" class="btn btn-danger" id="remove-more-learns-btn"><i class="fa fa-times"></i></button>'+
                        '</div>'+
                    '</div>';
            $('#custom-learn-fields').append(html);
        });

        $(document).on('click', '#remove-more-learns-btn', function(){
            $(this).parents('.custom').remove();
        });

        $(document).on('click', '#add-more-include-btn', function(){
            var html = '';
            html += '<div class="col-sm-12 custom" style="margin-top:5px !important">'+
                        '<div class="col-sm-6">'+
                            '<input type="text" class="form-control" name="icons[]" value="" placeholder="e.g <i class=fa fa-user aria-hidden=true></i>" required>'+
                        '</div>'+
                        '<div class="col-sm-5">'+
                            '<input type="text" class="form-control" name="includes[]" placeholder="Enter what include this course">'+
                        '</div>'+
                        '<div class="col-sm-1">'+
                            '<button type="button" class="btn btn-danger" id="remove-more-include-btn"><i class="fa fa-times"></i></button>'+
                        '</div>'+
                    '</div>';
            $('#custom-course-include-fields').append(html);
        });

        $(document).on('click', '#remove-more-include-btn', function(){
            $(this).parents('.custom').remove();
        });
    </script>
@endpush
