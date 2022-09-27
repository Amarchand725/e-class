
<?php $__env->startSection('title', 'Show Category'); ?>
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
            <h1>Show Category</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route("category.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
<label for="parent_id" class="col-sm-2 control-label">Parent_id</label>
<div class="col-sm-8"><?php if($model->status): ?><span class="label label-success">Active</span><?php else: ?><span class="label label-danger">In-Active</span><?php endif; ?><div><?php echo e($model->parent_id); ?></div></div></div><div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-8"><?php if($model->status): ?><span class="label label-success">Active</span><?php else: ?><span class="label label-danger">In-Active</span><?php endif; ?><div><?php echo e($model->name); ?></div></div></div><div class="form-group">
<label for="description" class="col-sm-2 control-label">Description</label>
<div class="col-sm-8"><?php if($model->status): ?><span class="label label-success">Active</span><?php else: ?><span class="label label-danger">In-Active</span><?php endif; ?><div><?php echo e($model->description); ?></div></div></div><div class="form-group">
<label for="icon" class="col-sm-2 control-label">Icon</label>
<div class="col-sm-8"><?php if($model->status): ?><span class="label label-success">Active</span><?php else: ?><span class="label label-danger">In-Active</span><?php endif; ?><div><?php echo e($model->icon); ?></div></div></div><div class="form-group">
<label for="status" class="col-sm-2 control-label">Status</label>
<div class="col-sm-8"><?php if($model->status): ?><span class="label label-success">Active</span><?php else: ?><span class="label label-danger">In-Active</span><?php endif; ?><div><?php echo e($model->status); ?></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/categories/show.blade.php ENDPATH**/ ?>