<!-- Add Course class Modal -->
<div class="modal fade" id="add-course-class-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #337ab7; color:white">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Course Class</h5>
                <button type="button" style="margin-top: -20px; color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form id="add-course-class-form" data-course-form="{{ route('courseclass.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf
                        <input type="hidden" name="course_id" id="course-id" value="{{ $model->id }}">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="chapter_id" class="col-sm-3 control-label">Chapter Name <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select id="chapter_id" class="form-control" name="chapter_id">
                                            <option value="" selected>Select Chapter</option>
                                            @foreach ($coursechapters as $chapter)
                                                <option value="{{ $chapter->id }}" {{ old('chapter_id')==$chapter->id?'selected':'' }}>{{ $chapter->name }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color: red" id="error-chapter_id">{{ $errors->first("chapter_id") }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Title <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="title" class="form-control" name="title" placeholder="Enter title" value="{{ old("title") }}">
                                        <span style="color: red" id="error-title">{{ $errors->first("title") }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detail" class="col-sm-3 control-label">Detail</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="detail" rows="5" name="detail" placeholder="Enter detail" >{{ old("detail") }}</textarea>
                                        <span style="color: red" id="error-detail">{{ $errors->first("detail") }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="col-sm-3 control-label">Type <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        @php $types = ['Video', 'Audio', 'Image', 'Zip', 'Pdf / Powerpoint / Notepad'] @endphp 
                                        <select id="type" class="form-control" name="type">
                                            <option value="" selected>Select Type</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type }}" {{ old('type')==$type?'selected':'' }}>{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color: red" id="error-type">{{ $errors->first("type") }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="attachment" class="col-sm-3 control-label">Attachment </label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="imgInput" name="attachment" accept="image/*">
                                        <span style="color: red">{{ $errors->first("attachment") }}</span>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="image" class="col-sm-3 control-label">Preview </label>
                                    <div class="col-sm-8">
                                        <img src="{{ asset('public/default.png') }}" id="preview"  width="100px" alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-8">
                                        <div class="switch">
                                            <input id="ci_status" class="cmn-toggle cmn-toggle-round-flat" value="1" @if(old('status')) checked @endif name="status" type="checkbox">
                                            <label for="ci_status"></label>
                                        </div>
                                        <span style="color: red">{{ $errors->first("status") }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="featured" class="col-sm-3 control-label">Featured</label>
                                    <div class="col-sm-8">
                                        <div class="switch">
                                            <input id="is_featured" class="cmn-toggle cmn-toggle-round-flat" value="1" @if(old('is_featured')) checked @endif name="is_featured" type="checkbox">
                                            <label for="is_featured"></label>
                                        </div>
                                        <span style="color: red">{{ $errors->first("is_featured") }}</span>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="status" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-success pull-left">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

 <!-- Edit Course class Modal -->
 <div class="modal fade" id="edit-course-class-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #337ab7; color:white">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Course class</h5>
                <button type="button" style="margin-top: -20px; color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form id="update-course-class-form" class="form-horizontal" enctype="multipart/form-data" method="put" accept-charset="utf-8">
                        @csrf

                        {{ method_field('PATCH') }}
                        <input type="hidden" name="course_id" id="course-id" value="{{ $model->id }}">
                        <div class="box box-info edit-course-class-details"></div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>