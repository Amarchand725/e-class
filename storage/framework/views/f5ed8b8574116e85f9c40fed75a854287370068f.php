
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
                            <tr><th>Country_code</th><td><?php echo e($model->country_code); ?></td></tr>
                            <tr><th>Currency</th><td><?php echo e($model->currency); ?></td></tr>
                            <tr><th>Currency_symbol</th><td><?php echo e($model->currency_symbol); ?></td></tr>
                            <tr><th>Description</th><td><?php echo e($model->description); ?></td></tr>
                            <tr>
                                <th>Flag</th>
                                <td>
                                    <?php if($model->flag): ?>
                                        <img style="border-radius: 50%;" src="<?php echo e(asset('public/admin/images/countries')); ?>/<?php echo e($model->flag); ?>" width="50px" height="50px" alt="">
                                    <?php else: ?>
                                        <img style="border-radius: 50%;" src="<?php echo e(asset('public/default.png')); ?>" width="50px" height="50px" alt="">
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr><th>Status</th><td><?php if($model->status): ?><span class="label label-success">Active</span><?php else: ?><span class="label label-danger">In-Active</span><?php endif; ?></td></tr>
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