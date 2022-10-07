
<?php $__env->startSection('title', 'Edit Course'); ?>
<?php $__env->startPush('css'); ?>
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }

        /*  bhoechie tab */
        div.bhoechie-tab-container{
        z-index: 10;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: 4px;
        -moz-border-radius: 4px;
        border:1px solid #ddd;
        margin-top: 20px;
        margin-left: 50px;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
        }
        div.bhoechie-tab-menu{
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group{
        margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a{
        margin-bottom: 0;
        }
        div.bhoechie-tab-menu div.list-group>a .glyphicon,
        div.bhoechie-tab-menu div.list-group>a .fa {
        color: #5A55A3;
        }
        div.bhoechie-tab-menu div.list-group>a:first-child{
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a:last-child{
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
        }
        div.bhoechie-tab-menu div.list-group>a.active,
        div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
        div.bhoechie-tab-menu div.list-group>a.active .fa{
        background-color: #5A55A3;
        background-image: #5A55A3;
        color: #ffffff;
        }
        div.bhoechie-tab-menu div.list-group>a.active:after{
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -13px;
        border-left: 0;
        border-bottom: 13px solid transparent;
        border-top: 13px solid transparent;
        border-left: 10px solid #5A55A3;
        }

        div.bhoechie-tab-content{
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        padding: 20px;
        padding-top: 10px;
        }

        div.bhoechie-tab div.bhoechie-tab-content:not(.active){
        display: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Course</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route("course.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
	</div>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bhoechie-tab-menu">
                        <div class="list-group">
                            <a href="#" class="list-group-item active">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Course
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> CourseInclude
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> WhatLearns
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Course Chapter
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Course Class
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Question
                            </a>
                            
                            <a href="#" class="list-group-item">
                                <h4 class="glyphicon glyphicon-th-large"></h4> Announcement
                            </a>
                            
                        </div>
                    </div>
              </div>
            </div>
        </div>
		<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 bhoechie-tab">
            <!-- COURSE -->
            <div class="bhoechie-tab-content active">
                <form action="<?php echo e(route("course.update", $model->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <?php echo csrf_field(); ?>
                    <?php echo e(method_field('PATCH')); ?>

                    <div class="box box-info">
                        <div class="box-body">
                            <input type="hidden" id="page_url" value="<?php echo e(route('course.index')); ?>">
                            <section class="content-header">
                                <div class="content-header-left">
                                    <h1>Edit Course</h1>
                                </div>
                            </section>
                            <hr />
                            <div class="form-group">
                                <label for="instructor" class="col-sm-2 control-label">Instructor <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="instructor_slug" class="form-control" id="instructor">
                                        <option value="" selected>Select instructor</option>
                                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($instructor->slug); ?>" <?php echo e($model->instructor_slug==$instructor->slug?'selected':''); ?>><?php echo e($instructor->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first("institute_slug")); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="institute" class="col-sm-2 control-label">Institute <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="institute_slug" class="form-control" id="institute">
                                        <option value="" selected>Select institute</option>
                                        <?php $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($institute->slug); ?>" <?php echo e($model->institute_slug==$institute->slug?'selected':''); ?>><?php echo e($institute->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first("institute_slug")); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-sm-2 control-label">Category <span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="category_slug" class="form-control" id="category">
                                        <option value="" selected>Select Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->slug); ?>" <?php echo e($model->category_slug==$category->slug?'selected':''); ?>><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first("category_slug")); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="title" value="<?php echo e($model->title); ?>" placeholder="Enter title">
                            <span style="color: red"><?php echo e($errors->first("title")); ?></span></div></div>

                            <div class="form-group">
                            <label for="short_description" class="col-sm-2 control-label">Short Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="requirements" rows="10" name="short_description" placeholder="Enter short_description"><?php echo e($model->short_description); ?></textarea>
                            <span style="color: red"><?php echo e($errors->first("short_description")); ?></span></div></div>

                            <div class="form-group">
                            <label for="requirements" class="col-sm-2 control-label">Requirements</label>
                            <div class="col-sm-8">
                                <textarea class="form-control ckeditor" id="requirements" rows="10" name="requirements"><?php echo e($model->requirements); ?></textarea>
                            <span style="color: red"><?php echo e($errors->first("requirements")); ?></span></div></div>

                            <div class="form-group">
                            <label for="full_description" class="col-sm-2 control-label">Full Description</label>
                            <div class="col-sm-8"><textarea class="form-control ckeditor" rows="10" id="full_description" name="full_description"><?php echo e($model->full_description); ?></textarea>
                            <span style="color: red"><?php echo e($errors->first("full_description")); ?></span></div></div>

                            <div class="form-group">
                            <label for="thumbnail" class="col-sm-2 control-label">Thumbnail <?php if(!$model->thumbnail): ?> <span style="color:red">*</span> <?php endif; ?></label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imgInput" accept="image/*" name="thumbnail">
                            <span style="color: red"><?php echo e($errors->first("thumbnail")); ?></span></div></div>

                            <?php if($model->thumbnail): ?>
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">Exist Thumbnail </label>
                                    <div class="col-sm-8">
                                        <img id="preview" src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($model->thumbnail); ?>" width="100px" alt="">
                                    </div>
                                </div>
                            <?php else: ?> 
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">Preview</label>
                                    <div class="col-sm-8">
                                        <img id="preview" src="<?php echo e(asset('public/default.png')); ?>" width="100px" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($model->video): ?>
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">Exist Video </label>
                                    <div class="col-sm-8">
                                        <video width="320" height="240" controls>
                                            <source src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($model->video); ?>" type="video/mp4">
                                            <source src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($model->video); ?>" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="is_youtube_url" class="col-sm-2 control-label">Youtube Video URL</label>
                                <div class="col-sm-8">
                                    <div class="switch">
                                        <input id="youtube_url" <?php if($model->video_url): ?> checked <?php endif; ?> class="cmn-toggle cmn-toggle-round-flat" name="is_youtube_url" value="1" type="checkbox">
                                        <label for="youtube_url"></label>
                                    </div>
                                    <span style="color: red"><?php echo e($errors->first("is_youtube_url")); ?></span>
                                </div>
                            </div>

                            <div class="form-group upload-video-field">
                                <?php if($model->video_url): ?>
                                    <label for="video_url" class="col-sm-2 control-label">Youtube Video URL </label>
                                    <div class="col-sm-8">
                                        <input type="text" value="<?php echo e($model->video_url); ?>" class="form-control" name="video_url" accept="video/*" placeholder="Enter video url">
                                        <span style="color: red"><?php echo e($errors->first("video_url")); ?></span>
                                    </div>
                                <?php else: ?> 
                                    <label for="video" class="col-sm-2 control-label">Upload Video </label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="video" accept="video/*">
                                        <span style="color: red"><?php echo e($errors->first("video")); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="duration" class="col-sm-2 control-label">Duration </label>
                                <div class="col-sm-8">
                                    <input type="time" value="<?php echo e($model->duration); ?>" class="form-control" name="duration" accept="video/*" placeholder="Enter video duration">
                                    <span style="color: red"><?php echo e($errors->first("duration")); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is_paid" class="col-sm-2 control-label">Paid</label>
                                <div class="col-sm-8">
                                    <div class="switch">
                                        <input id="paid" <?php if($model->is_paid): ?> checked <?php endif; ?> class="cmn-toggle cmn-toggle-round-flat" name="is_paid" value="1" type="checkbox">
                                        <label for="paid"></label>
                                    </div>
                                    <span style="color: red"><?php echo e($errors->first("is_paid")); ?></span>
                                </div>
                            </div>

                            <span id="if-paid" <?php if(!$model->is_paid): ?> style="display: none" <?php endif; ?>>
                                <div class="form-group">
                                    <label for="price" class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control numberonly" name="price" value="<?php echo e($model->retail_price); ?>" placeholder="Enter price">
                                        <span style="color: red"><?php echo e($errors->first("price")); ?></span>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label for="discount_type" class="col-sm-2 control-label">Discount Type</label>
                                    <div class="col-sm-8">
                                        <select name="discount_type" id="discount_type" class="form-control">
                                            <option value="" selected>Select discount type</option>
                                            <option value="percent" <?php echo e($model->discount_type=='percent'?'selected':''); ?>>Percent(%)</option>
                                            <option value="fix" <?php echo e($model->discount_type=='fix'?'selected':''); ?>>Fixed</option>
                                        </select>
                                        <span style="color: red"><?php echo e($errors->first("discount_type")); ?></span>
                                    </div>
                                </div>
        
                                <div class="custome-discount">
                                    <?php if($model->discount): ?>
                                    <div class="form-group">
                                        <label for="discount" class="col-sm-2 control-label">Discount </label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" value="<?php echo e($model->discount); ?>" name="discount" id="discount" placeholder="Enter discount value">
                                            <span style="color: red"><?php echo e($errors->first("discount")); ?></span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </span>

                            <div class="form-group">
                                <label for="is_featured" class="col-sm-2 control-label">Featured</label>
                                <div class="col-sm-8">
                                    <div class="switch">
                                        <input id="featured" <?php if($model->is_featured): ?> checked <?php endif; ?> class="cmn-toggle cmn-toggle-round-flat" name="is_featured" value="1" type="checkbox">
                                        <label for="featured"></label>
                                    </div>
                                    <span style="color: red"><?php echo e($errors->first("is_featured")); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-8">
                                    <div class="switch">
                                        <input id="status" class="cmn-toggle cmn-toggle-round-flat" value="1" <?php if($model->status): ?> checked <?php endif; ?> name="status" type="checkbox">
                                        <label for="status"></label>
                                    </div>
                                    <span style="color: red"><?php echo e($errors->first("status")); ?></span>
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

            <!-- COURSE INCLUDES-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="<?php echo e(route('course.index')); ?>">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Includes</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="<?php echo e($model->id); ?>" title="Add New Course" class="btn btn-primary btn-sm add-course-include-btn">Add New Course Include</button>
                            </div>
                        </section>
                        <hr />
                        <section class="content">
                            <div class="row">
                                <div class="col-sm-1">Search:</div>
                                <div class="d-flex col-sm-9">
                                    <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                                    <input type="hidden" id="status" value="All" class="form-control">
                                </div>
                                <div class="d-flex col-sm-9">
                                    <a href="" class="btn btn"></a>
                                </div>
                            </div>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Icon</th>
                                        <th>Detail</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-include-body">
                                    <?php $__currentLoopData = $includes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$include): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="id-<?php echo e($include->id); ?>">
                                            <td><?php echo e($includes->firstItem()+$key); ?>.</td>
                                            <td><?php echo $include->icon; ?></td>
                                            <td><?php echo $include->detail; ?></td>
                                            <td>
                                                <div class="switch">
                                                    <input id="inc_status-<?php echo e($include->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-include-status-btn" data-include-id="<?php echo e($include->id); ?>" data-update-action="<?php echo e(route('courseinclude.update', $include->id)); ?>" <?php if($include->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                                                    <label for="inc_status-<?php echo e($include->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="<?php echo e(route('courseinclude.update', $include->id)); ?>" data-course-id="<?php echo e($include->course_id); ?>" data-course-includes="<?php echo e($include); ?>" data-placement="top" title="Edit Course include" class="btn btn-primary btn-xs edit-course-include-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course include" class="btn btn-danger btn-xs delete-course-include" data-slug="<?php echo e($include->id); ?>" data-del-url="<?php echo e(route("courseinclude.destroy", $include->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="15">
                                            Displying <?php echo e($includes->firstItem()); ?> to <?php echo e($includes->lastItem()); ?> of <?php echo e($includes->total()); ?> records
                                            <div class="d-flex justify-content-center">
                                                <?php echo $includes->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE WHATLEARNS-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="<?php echo e(route('whatlearn.index')); ?>">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>WhatLearns</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="<?php echo e($model->id); ?>" title="Add New WhatLearn" class="btn btn-primary btn-sm add-course-whatlearn-btn">Add New WhatLearn</button>
                            </div>
                        </section>
                        <hr />
                        <section class="content">
                            <div class="row">
                                <div class="col-sm-1">Search:</div>
                                <div class="d-flex col-sm-9">
                                    <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                                    <input type="hidden" id="status" value="All" class="form-control">
                                </div>
                                <div class="d-flex col-sm-9">
                                    <a href="" class="btn btn"></a>
                                </div>
                            </div>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Detail</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-whatlearn-body">
                                    <?php $__currentLoopData = $whatlearns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$whatlearn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="id-<?php echo e($whatlearn->id); ?>">
                                            <td><?php echo e($whatlearns->firstItem()+$key); ?>.</td>
                                            <td><?php echo $whatlearn->detail; ?></td>
                                            <td>
                                                <div class="switch">
                                                    <input id="inc_status-<?php echo e($whatlearn->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-whatlearn-status-btn" data-whatlearn-id="<?php echo e($whatlearn->id); ?>" data-update-action="<?php echo e(route('whatlearn.update', $whatlearn->id)); ?>" <?php if($whatlearn->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                                                    <label for="inc_status-<?php echo e($whatlearn->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="<?php echo e(route('whatlearn.update', $whatlearn->id)); ?>" data-course-id="<?php echo e($whatlearn->course_id); ?>" data-course-whatlearns="<?php echo e($whatlearn); ?>" data-placement="top" title="Edit Course whatlearn" class="btn btn-primary btn-xs edit-course-whatlearn-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course whatlearn" class="btn btn-danger btn-xs delete-course-whatlearn" data-slug="<?php echo e($whatlearn->id); ?>" data-del-url="<?php echo e(route("whatlearn.destroy", $whatlearn->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="15">
                                            Displying <?php echo e($whatlearns->firstItem()); ?> to <?php echo e($whatlearns->lastItem()); ?> of <?php echo e($whatlearns->total()); ?> records
                                            <div class="d-flex justify-content-center">
                                                <?php echo $whatlearns->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE CHAPTERS-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="<?php echo e(route('coursechapter.index')); ?>">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Chapters</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="<?php echo e($model->id); ?>" title="Add New coursechapter" class="btn btn-primary btn-sm add-course-chapter-btn">Add New coursechapter</button>
                            </div>
                        </section>
                        <hr />
                        <section class="content">
                            <div class="row">
                                <div class="col-sm-1">Search:</div>
                                <div class="d-flex col-sm-9">
                                    <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                                    <input type="hidden" id="status" value="All" class="form-control">
                                </div>
                                <div class="d-flex col-sm-9">
                                    <a href="" class="btn btn"></a>
                                </div>
                            </div>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Chapter</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-chapter-body">
                                    <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$coursechapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="id-<?php echo e($coursechapter->id); ?>">
                                            <td><?php echo e($coursechapters->firstItem()+$key); ?>.</td>
                                            <td><?php echo $coursechapter->name; ?></td>
                                            <td>
                                                <div class="switch">
                                                    <input id="inc_status-<?php echo e($coursechapter->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-chapter-status-btn" data-chapter-id="<?php echo e($coursechapter->id); ?>" data-update-action="<?php echo e(route('coursechapter.update', $coursechapter->id)); ?>" <?php if($coursechapter->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                                                    <label for="inc_status-<?php echo e($coursechapter->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="<?php echo e(route('coursechapter.update', $coursechapter->id)); ?>" data-course-id="<?php echo e($coursechapter->course_id); ?>" data-course-chapters="<?php echo e($coursechapter); ?>" data-placement="top" title="Edit Course coursechapter" class="btn btn-primary btn-xs edit-course-chapter-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course coursechapter" class="btn btn-danger btn-xs delete-course-chapter" data-slug="<?php echo e($coursechapter->id); ?>" data-del-url="<?php echo e(route("coursechapter.destroy", $coursechapter->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="15">
                                            Displying <?php echo e($coursechapters->firstItem()); ?> to <?php echo e($coursechapters->lastItem()); ?> of <?php echo e($coursechapters->total()); ?> records
                                            <div class="d-flex justify-content-center">
                                                <?php echo $coursechapters->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE CLASSES-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="<?php echo e(route('courseclass.index')); ?>">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Classes</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="<?php echo e($model->id); ?>" title="Add New courseclass" class="btn btn-primary btn-sm add-course-class-btn">Add New Course Class</button>
                            </div>
                        </section>
                        <hr />
                        <section class="content">
                            <div class="row">
                                <div class="col-sm-1">Search:</div>
                                <div class="d-flex col-sm-9">
                                    <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                                    <input type="hidden" id="status" value="All" class="form-control">
                                </div>
                                <div class="d-flex col-sm-9">
                                    <a href="" class="btn btn"></a>
                                </div>
                            </div>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Chapter</th>
                                        <th>Title</th>
                                        <th>STATUS</th>
                                        <th>FEATURED</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-class-body">
                                    <?php $__currentLoopData = $courseclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$courseclass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="id-<?php echo e($courseclass->id); ?>">
                                            <td><?php echo e($courseclasses->firstItem()+$key); ?>.</td>
                                            <td><?php echo $courseclass->hasChapter->name??'N/A'; ?></td>
                                            <td><?php echo $courseclass->title; ?></td>
                                            <td>
                                                <div class="switch">
                                                    <input id="class_status-<?php echo e($courseclass->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-class-status-btn" data-class-id="<?php echo e($courseclass->id); ?>" data-update-action="<?php echo e(route('courseclass.update', $courseclass->id)); ?>" <?php if($courseclass->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                                                    <label for="class_status-<?php echo e($courseclass->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="switch">
                                                    <input id="is_featured-<?php echo e($courseclass->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-class-featured-btn" data-class-id="<?php echo e($courseclass->id); ?>" data-update-action="<?php echo e(route('courseclass.update', $courseclass->id)); ?>" value="1" <?php if($courseclass->is_featured): ?> checked <?php endif; ?> name="is_featured" type="checkbox">
                                                    <label for="is_featured-<?php echo e($courseclass->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="<?php echo e(route('courseclass.update', $courseclass->id)); ?>" data-edit-class-url="<?php echo e(route('courseclass.edit', $courseclass->id)); ?>" data-class-id="<?php echo e($courseclass->course_id); ?>"  data-placement="top" title="Edit Course courseclass" class="btn btn-primary btn-xs edit-course-class-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course courseclass" class="btn btn-danger btn-xs delete-course-class" data-slug="<?php echo e($courseclass->id); ?>" data-del-url="<?php echo e(route("courseclass.destroy", $courseclass->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="15">
                                            Displying <?php echo e($courseclasses->firstItem()); ?> to <?php echo e($courseclasses->lastItem()); ?> of <?php echo e($courseclasses->total()); ?> records
                                            <div class="d-flex justify-content-center">
                                                <?php echo $courseclasses->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE QUESTION-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="<?php echo e(route('courseclass.index')); ?>">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Questions</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="<?php echo e($model->id); ?>" title="Add New coursequestion" class="btn btn-primary btn-sm add-course-question-btn">Add New Course Question</button>
                            </div>
                        </section>
                        <hr />
                        <section class="content">
                            <div class="row">
                                <div class="col-sm-1">Search:</div>
                                <div class="d-flex col-sm-9">
                                    <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                                    <input type="hidden" id="status" value="All" class="form-control">
                                </div>
                                <div class="d-flex col-sm-9">
                                    <a href="" class="btn btn"></a>
                                </div>
                            </div>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>QUESTION</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-question-body">
                                    <?php $__currentLoopData = $coursequestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$coursequestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="id-<?php echo e($coursequestion->id); ?>">
                                            <td><?php echo e($coursequestions->firstItem()+$key); ?>.</td>
                                            <td><?php echo $coursequestion->question; ?></td>
                                            <td>
                                                <div class="switch">
                                                    <input id="question_status-<?php echo e($coursequestion->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-question-status-btn" data-question-id="<?php echo e($coursequestion->id); ?>" data-update-action="<?php echo e(route('coursequestion.update', $coursequestion->id)); ?>" <?php if($coursequestion->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                                                    <label for="question_status-<?php echo e($coursequestion->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="<?php echo e(route('coursequestion.update', $coursequestion->id)); ?>" data-course-questions="<?php echo e($coursequestion); ?>" data-question-id="<?php echo e($coursequestion->course_id); ?>"  data-placement="top" title="Edit Course coursequestion" class="btn btn-primary btn-xs edit-course-question-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course coursequestion" class="btn btn-danger btn-xs delete-course-question" data-slug="<?php echo e($coursequestion->id); ?>" data-del-url="<?php echo e(route("coursequestion.destroy", $coursequestion->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="15">
                                            Displying <?php echo e($coursequestions->firstItem()); ?> to <?php echo e($coursequestions->lastItem()); ?> of <?php echo e($coursequestions->total()); ?> records
                                            <div class="d-flex justify-content-center">
                                                <?php echo $coursequestions->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>

            <!-- COURSE ANNOUNCEMENT-->
            <div class="bhoechie-tab-content">
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" id="page_url" value="<?php echo e(route('courseannouncement.index')); ?>">
                        <section class="content-header">
                            <div class="content-header-left">
                                <h1>Course Announcement</h1>
                            </div>
                            <div class="content-header-right">
                                <button type="button" data-toggle="tooltip" data-placement="left" data-course-id="<?php echo e($model->id); ?>" title="Add New courseannouncement" class="btn btn-primary btn-sm add-course-announcement-btn">Add New Course Announcement</button>
                            </div>
                        </section>
                        <hr />
                        <section class="content">
                            <div class="row">
                                <div class="col-sm-1">Search:</div>
                                <div class="d-flex col-sm-9">
                                    <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                                    <input type="hidden" id="status" value="All" class="form-control">
                                </div>
                                <div class="d-flex col-sm-9">
                                    <a href="" class="btn btn"></a>
                                </div>
                            </div>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>announcement</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="course-announcement-body">
                                    <?php $__currentLoopData = $courseannouncements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$courseannouncement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="id-<?php echo e($courseannouncement->id); ?>">
                                            <td><?php echo e($courseannouncements->firstItem()+$key); ?>.</td>
                                            <td><?php echo $courseannouncement->announcement; ?></td>
                                            <td>
                                                <div class="switch">
                                                    <input id="announcement_status-<?php echo e($courseannouncement->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-announcement-status-btn" data-announcement-id="<?php echo e($courseannouncement->id); ?>" data-update-action="<?php echo e(route('courseannouncement.update', $courseannouncement->id)); ?>" <?php if($courseannouncement->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                                                    <label for="announcement_status-<?php echo e($courseannouncement->id); ?>"></label>
                                                </div>
                                            </td>
                                            <td width="250px">  
                                                <button data-toggle="tooltip" data-update-action="<?php echo e(route('courseannouncement.update', $courseannouncement->id)); ?>" data-course-announcements="<?php echo e($courseannouncement); ?>" data-announcement-id="<?php echo e($courseannouncement->course_id); ?>"  data-placement="top" title="Edit Course courseannouncement" class="btn btn-primary btn-xs edit-course-announcement-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
                                                <button data-toggle="tooltip" data-placement="top" title="Delete Course courseannouncement" class="btn btn-danger btn-xs delete-course-announcement" data-slug="<?php echo e($courseannouncement->id); ?>" data-del-url="<?php echo e(route("courseannouncement.destroy", $courseannouncement->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="15">
                                            Displying <?php echo e($courseannouncements->firstItem()); ?> to <?php echo e($courseannouncements->lastItem()); ?> of <?php echo e($courseannouncements->total()); ?> records
                                            <div class="d-flex justify-content-center">
                                                <?php echo $courseannouncements->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
		</div>
	</div>    

    <?php echo $__env->make('web-views.website.courseincludes.announcements.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('web-views.website.courseincludes.questions.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('web-views.website.courseincludes.classes.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('web-views.website.courseincludes.chapters.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('web-views.website.courseincludes.whatlearns.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('web-views.website.courseincludes.includes.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/website/js/course-include/course-announcement-functions.js')); ?>"></script>
    <script src="<?php echo e(asset('public/website/js/course-include/course-question-functions.js')); ?>"></script>
    <script src="<?php echo e(asset('public/website/js/course-include/course-class-functions.js')); ?>"></script>
    <script src="<?php echo e(asset('public/website/js/course-include/course-chapter-functions.js')); ?>"></script>
    <script src="<?php echo e(asset('public/website/js/course-include/course-whatlearn-functions.js')); ?>"></script>
    <script src="<?php echo e(asset('public/website/js/course-include/course-include-functions.js')); ?>"></script>
    <script>
        $(document).on('click', '#youtube_url', function(){
            if($('input[name="is_youtube_url"]').is(':checked'))
            {
                var html = '';
                html =  '<label for="video_url" class="col-sm-2 control-label">Youtube Video URL </label>'+
                        '<div class="col-sm-8">'+
                            '<input type="text" class="form-control" name="video_url" accept="video/*" placeholder="Enter video url">'+
                            '<span style="color: red"><?php echo e($errors->first("video_url")); ?></span>'+
                        '</div>';
                
                $('.upload-video-field').html(html);
            }else
            {
                var html = '';
                html =  '<label for="video" class="col-sm-2 control-label">Upload Video </label>'+
                            '<div class="col-sm-8">'+
                                '<input type="file" class="form-control" name="video" accept="video/*">'+
                                '<span style="color: red"><?php echo e($errors->first("video")); ?></span>'+
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
                                '<span style="color: red"><?php echo e($errors->first("discount")); ?></span>'+
                            '</div>'+
                        '</div>';
                $('.custome-discount').html(html);    
            }else{
                $('.custome-discount').html("");    
            }
        });
        
        $(function() {
            $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
        });

        course_attachment.onchange = evt => {
            const [file] = course_attachment.files
            if (file) {
                class_preview.src = URL.createObjectURL(file)
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/courses/edit.blade.php ENDPATH**/ ?>