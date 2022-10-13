
<?php $__env->startSection('title', 'Show Country'); ?>
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
            <h1>Show Country</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route("country.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr><th>Name</th><td><?php echo e($model->name); ?></td></tr>
                            <tr><th>Phone Code</th><td><?php echo e($model->phonecode); ?></td></tr>
                            <tr><th>Currency</th><td><?php echo e($model->currency); ?></td></tr>
                            <tr><th>Currency_symbol</th><td><?php echo e($model->currency_symbol); ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/countries/show.blade.php ENDPATH**/ ?>