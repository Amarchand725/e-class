
<?php $__env->startSection('title', 'Show UserProfile'); ?>
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
            <h1>Show UserProfile</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route("userprofile.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr><th width="200px">Profile</th><td><?php echo e($model->profile_image); ?></td></tr>
                            <tr><th>Role</th><td><?php echo e($model->roles->first()->name); ?></td></tr>
                            <tr><th>User</th><td><?php echo e($model->name); ?></td></tr>
                            <tr><th>First_name</th><td><?php echo e($model->first_name); ?></td></tr>
                            <tr><th>Last_name</th><td><?php echo e($model->last_name); ?></td>
                            </tr><tr><th>Email</th><td><?php echo e($model->email); ?></td></tr>
                            <tr><th>Mobile</th><td><?php echo e($model->mobile); ?></td></tr>
                            
                            <tr><th>Country</th><td><?php echo e($model->country_id); ?></td></tr>
                            <tr><th>State</th><td><?php echo e($model->state_id); ?></td></tr>
                            <tr><th>City</th><td><?php echo e($model->city_id); ?></td></tr>
                            <tr><th>Address</th><td><?php echo e($model->address); ?></td></tr>
                            
                            <tr><th>Facebook_url</th><td><?php echo e($model->facebook_url); ?></td></tr>
                            <tr><th>Twitter_url</th><td><?php echo e($model->twitter_url); ?></td></tr>
                            <tr><th>Youtube_url</th><td><?php echo e($model->youtube_url); ?></td></tr>
                            <tr><th>Linked_in_url</th><td><?php echo e($model->linked_in_url); ?></td></tr>
                            <tr><th>Details</th><td><?php echo e($model->details); ?></td></tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if($model->status): ?>
                                        <span class="label label-success">Active</span>
                                    <?php else: ?>
                                        <span class="label label-danger">In-Active</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/userprofiles/show.blade.php ENDPATH**/ ?>