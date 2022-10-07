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
                    <form id="add-course-class-form" data-course-form="<?php echo e(route('courseclass.store')); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="course_id" id="course-id" value="<?php echo e($model->id); ?>">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="chapter_id" class="col-sm-3 control-label">Chapter Name <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select id="chapter_id" class="form-control" name="chapter_id">
                                            <option value="" selected>Select Chapter</option>
                                            <?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($chapter->id); ?>" <?php echo e(old('chapter_id')==$chapter->id?'selected':''); ?>><?php echo e($chapter->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span style="color: red" id="error-chapter_id"><?php echo e($errors->first("chapter_id")); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">Title <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="title" class="form-control" name="title" placeholder="Enter title" value="<?php echo e(old("title")); ?>">
                                        <span style="color: red" id="error-title"><?php echo e($errors->first("title")); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detail" class="col-sm-3 control-label">Detail</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="detail" rows="5" name="detail" placeholder="Enter detail" ><?php echo e(old("detail")); ?></textarea>
                                        <span style="color: red" id="error-detail"><?php echo e($errors->first("detail")); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type" class="col-sm-3 control-label">Type <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <?php $types = ['Video', 'Audio', 'Image', 'Zip', 'Pdf / Powerpoint / Notepad'] ?> 
                                        <select id="type" class="form-control file-type" name="type">
                                            <option value="" selected>Select Type</option>
                                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type); ?>" <?php echo e(old('type')==$type?'selected':''); ?>><?php echo e($type); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span style="color: red" id="error-type"><?php echo e($errors->first("type")); ?></span>
                                    </div>
                                </div>
                                <span id="class-custom"></span>
                            
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-8">
                                        <div class="switch">
                                            <input id="ci_status" class="cmn-toggle cmn-toggle-round-flat" value="1" <?php if(old('status')): ?> checked <?php endif; ?> name="status" type="checkbox">
                                            <label for="ci_status"></label>
                                        </div>
                                        <span style="color: red"><?php echo e($errors->first("status")); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="featured" class="col-sm-3 control-label">Featured</label>
                                    <div class="col-sm-8">
                                        <div class="switch">
                                            <input id="is_featured" class="cmn-toggle cmn-toggle-round-flat" value="1" <?php if(old('is_featured')): ?> checked <?php endif; ?> name="is_featured" type="checkbox">
                                            <label for="is_featured"></label>
                                        </div>
                                        <span style="color: red"><?php echo e($errors->first("is_featured")); ?></span>
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
                        <?php echo csrf_field(); ?>

                        <?php echo e(method_field('PATCH')); ?>

                        <input type="hidden" name="course_id" id="course-id" value="<?php echo e($model->id); ?>">
                        <div class="box box-info edit-course-class-details"></div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/courseincludes/classes/modals.blade.php ENDPATH**/ ?>