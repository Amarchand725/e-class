
<?php $__env->startSection('title', 'Show Slider'); ?>
<?php $__env->startPush('css'); ?>
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Show Slider</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route("slider.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-8">
                                <img src="<?php echo e(asset('public/admin/images/sliders')); ?>/<?php echo e($model->image); ?>" width="100px" alt="">
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-8">
                                <div><?php echo e($model->title); ?></div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="sub_title" class="col-sm-2 control-label">Sub_title</label>
                            <div class="col-sm-8">
                                <div><?php echo e($model->sub_title); ?></div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <div><?php echo e($model->description); ?></div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                <?php if($model->status): ?>
                                    <span class="label label-success">Active</span>
                                <?php else: ?>
                                    <span class="label label-danger">In-Active</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/sliders/show.blade.php ENDPATH**/ ?>