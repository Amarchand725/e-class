<!-- Add Course Chapter Modal -->
<div class="modal fade" id="add-course-chapter-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #337ab7; color:white">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Course Include</h5>
                <button type="button" style="margin-top: -20px; color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form id="add-course-chapter-form" data-course-form="<?php echo e(route('coursechapter.store')); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="course_id" id="course-id" value="<?php echo e($model->id); ?>">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter your chapter name" value="<?php echo e(old("name")); ?>">
                                        <span style="color: red" id="error-name"><?php echo e($errors->first("name")); ?></span>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-8">
                                        <div class="switch">
                                            <input id="c_chapter_status" class="cmn-toggle cmn-toggle-round-flat" value="1" <?php if(old('status')): ?> checked <?php endif; ?> name="status" type="checkbox">
                                            <label for="c_chapter_status"></label>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

 <!-- Edit Course Chapter Modal -->
 <div class="modal fade" id="edit-course-chapter-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #337ab7; color:white">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Course chapter</h5>
                <button type="button" style="margin-top: -20px; color:white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form id="update-course-chapter-form" class="form-horizontal" enctype="multipart/form-data" method="put" accept-charset="utf-8">
                        <?php echo csrf_field(); ?>

                        <?php echo e(method_field('PATCH')); ?>

                        <input type="hidden" name="course_id" id="course-id" value="<?php echo e($model->id); ?>">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="detail" class="col-sm-2 control-label">Detail <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter your chapter name" value="<?php echo e($model->name); ?>">
                                        <span style="color: red" id="error-detail"><?php echo e($errors->first("detail")); ?></span>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/courseincludes/chapters/modals.blade.php ENDPATH**/ ?>