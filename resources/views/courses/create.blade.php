@extends('layouts.admin.app')
@section('title', 'Add New Course')
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
		<h1>Add New Course</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route("course.index") }}" data-toggle="tooltip" data-placement="left" title="{{ $view_all_title }}" class="btn btn-primary btn-sm">{{ $view_all_title }}</a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route("course.store") }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="instructor" class="col-sm-2 control-label">Instructor <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="instructor_slug" class="form-control" id="instructor">
                                    <option value="" selected>Select instructor</option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->slug }}" {{ old('instructor_slug')==$instructor->slug?'selected':'' }}>{{ $instructor->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first("institute_slug") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="institute" class="col-sm-2 control-label">Institute <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="institute_slug" class="form-control" id="institute">
                                    <option value="" selected>Select institute</option>
                                    @foreach ($institutes as $institute)
                                        <option value="{{ $institute->slug }}" {{ old('institute_slug')==$institute->slug?'selected':'' }}>{{ $institute->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first("institute_slug") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-sm-2 control-label">Category <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="category_slug" class="form-control" id="category">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}" {{ old('category_slug')==$category->slug?'selected':'' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first("category_slug") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="title" value="{{ old("title") }}" placeholder="Enter title">
                            <span style="color: red">{{ $errors->first("title") }}</span></div></div>

                        <div class="form-group">
                            <label for="short_description" class="col-sm-2 control-label">Short Description</label>
                            <div class="col-sm-8">
                                <textarea name="short_description" class="form-control" id="short_description" rows="5" placeholder="Enter short_description"></textarea>
                                <span style="color: red">{{ $errors->first("short_description") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="requirements" class="col-sm-2 control-label">Requirements</label>
                        <div class="col-sm-8">
                            <textarea class="form-control ckeditor" id="requirements" rows="5" name="requirements" placeholder="Enter requirements">{{ old("requirements") }}</textarea>
                        <span style="color: red">{{ $errors->first("requirements") }}</span></div></div>

                        <div class="form-group">
                        <label for="full_description" class="col-sm-2 control-label">Full Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control ckeditor" id="full_description" rows="5" name="full_description" placeholder="Enter full_description">{{ old("full_description") }}</textarea>
                        <span style="color: red">{{ $errors->first("full_description") }}</span></div></div>

                        <div class="form-group">
                            <label for="thumbnail" class="col-sm-2 control-label">Thumbnail <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imgInput" name="thumbnail" accept="image/*">
                                <span style="color: red">{{ $errors->first("thumbnail") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Preview </label>
                            <div class="col-sm-8">
                                <img src="{{ asset('public/default.png') }}" id="preview"  width="100px" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_youtube_url" class="col-sm-2 control-label">Youtube Video URL</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="youtube_url" class="cmn-toggle cmn-toggle-round-flat" name="is_youtube_url" value="1" type="checkbox">
                                    <label for="youtube_url"></label>
                                </div>
                                <span style="color: red">{{ $errors->first("is_youtube_url") }}</span>
                            </div>
                        </div>

                        <div class="form-group upload-video-field">
                            <label for="video" class="col-sm-2 control-label">Upload Video </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="video" accept="video/*">
                                <span style="color: red">{{ $errors->first("video") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="duration" class="col-sm-2 control-label">Duration </label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control" name="duration" accept="video/*" placeholder="Enter video duration">
                                <span style="color: red">{{ $errors->first("duration") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_paid" class="col-sm-2 control-label">Paid</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="paid" class="cmn-toggle cmn-toggle-round-flat" name="is_paid" value="1" type="checkbox">
                                    <label for="paid"></label>
                                </div>
                                <span style="color: red">{{ $errors->first("is_paid") }}</span>
                            </div>
                        </div>

                        <span id="if-paid" style="display: none">
                            <div class="form-group">
                                <label for="price" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control numberonly" name="price" value="{{ old("price") }}" placeholder="Enter price">
                                    <span style="color: red">{{ $errors->first("price") }}</span>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="discount_type" class="col-sm-2 control-label">Discount Type</label>
                                <div class="col-sm-8">
                                    <select name="discount_type" id="discount_type" class="form-control">
                                        <option value="" selected>Select discount type</option>
                                        <option value="percent">Percent(%)</option>
                                        <option value="fix">Fixed</option>
                                    </select>
                                    <span style="color: red">{{ $errors->first("discount_type") }}</span>
                                </div>
                            </div>
    
                            <div class="custome-discount"></div>
                        </span>

                        <div class="form-group">
                            <label for="is_featured" class="col-sm-2 control-label">Featured</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="featured" class="cmn-toggle cmn-toggle-round-flat" name="is_featured" value="1" type="checkbox">
                                    <label for="featured"></label>
                                </div>
                                <span style="color: red">{{ $errors->first("is_featured") }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="status" class="cmn-toggle cmn-toggle-round-flat" @if(old('status')) checked @endif name="status" type="checkbox">
                                    <label for="status"></label>
                                </div>
                                <span style="color: red">{{ $errors->first("status") }}</span>
                            </div>
                        </div>



                        {{-- <div class="form-group">
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

                                <span id="custom-learn-fields"></span>
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

                                <span id="custom-course-include-fields"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tags" class="col-sm-2 control-label">Tags</label>
                            <div class="col-sm-8 input-group">
                                <input type="text" class="form-control" name="tags[]" data-role="tagsinput" placeholder="Write tag label press enter">
                                <span style="color: red">{{ $errors->first("tags") }}</span>
                            </div>
                        </div> --}}

                        {{--  <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status">
                                    <option value="1" {{ old("status")==1?"selected":"" }}>Active</option>
                                    <option value="0" {{ old("status")==0?"selected":"" }}>In Active</option>
                                </select>
                                <span style="color: red">{{ $errors->first("status") }}</span>
                            </div>
                        </div> --}}

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
        $(document).on('click', '#youtube_url', function(){
            if($('input[name="is_youtube_url"]').is(':checked'))
            {
                var html = '';
                html =  '<label for="video_url" class="col-sm-2 control-label">Youtube Video URL </label>'+
                        '<div class="col-sm-8">'+
                            '<input type="text" class="form-control" name="video_url" accept="video/*" placeholder="Enter video url">'+
                            '<span style="color: red">{{ $errors->first("video_url") }}</span>'+
                        '</div>';
                
                $('.upload-video-field').html(html);
            }else
            {
                var html = '';
                html =  '<label for="video" class="col-sm-2 control-label">Upload Video </label>'+
                            '<div class="col-sm-8">'+
                                '<input type="file" class="form-control" name="video" accept="video/*">'+
                                '<span style="color: red">{{ $errors->first("video") }}</span>'+
                            '</div>';
                
                $('.upload-video-field').html(html);
            }
        });

        $(document).on('click', '#paid', function(){
            if($('input[name="is_paid"]').is(':checked'))
            {
                $('#if-paid').css('display', 'block');
            }else
            {
                $('#if-paid').css('display', 'none');
            }
        });

        $(document).on('change', '#discount_type', function(){
            var discount_type = $(this).val();
            
            var html = '';
            if(discount_type){
                html += '<div class="form-group">'+
                            '<label for="discount" class="col-sm-2 control-label">Discount </label>'+
                            '<div class="col-sm-8">'+
                                '<input type="number" class="form-control" name="discount" id="discount" placeholder="Enter discount value">'+
                                '<span style="color: red">{{ $errors->first("discount") }}</span>'+
                            '</div>'+
                        '</div>';
                $('.custome-discount').html(html);    
            }else{
                $('.custome-discount').html("");    
            }
        });


        /* $(document).on('click', '#add-more-learns-btn', function(){
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
        }); */
    </script>
@endpush
