
<?php $__env->startSection('title', 'Show Bundle'); ?>
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
            <h1>Show Bundle</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route("bundle.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <th width="200px">Courses</th>
                                <td>
                                    <?php $__currentLoopData = json_decode($model->course_ids); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i> <span class="badge badge-info"><?php echo e(App\Models\Course::where('id', $course_id)->first()->title); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Banner</th>
                                <td>
                                    <?php if($model->banner): ?>
                                        <img src="<?php echo e(asset('public/admin/bundle/banners')); ?>/<?php echo e($model->banner); ?>" width="200px" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="200px" alt="">
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><?php echo e($model->title); ?></td>
                            </tr>
                            <tr>
                                <th>Short_detail</th>
                                <td><?php echo e($model->short_detail); ?></td>
                            </tr>
                            <tr>
                                <th>Details</th>
                                <td><?php echo $model->details; ?></td>
                            </tr>
                            
                            <tr>
                                <th>Is Paid</th>
                                <td>
                                    <?php if($model->is_paid): ?>
                                        <span class="label label-info">Paid</span>
                                    <?php else: ?>
                                        <span class="label label-danger">FREE</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Is Featured</th>
                                <td>
                                    <?php if($model->is_featured): ?>
                                        <span class="label label-success">Featured</span>
                                    <?php else: ?>
                                        <span class="label label-danger">Not Featured</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Start_from</th>
                                <td> <span class="badge badge-info"><?php echo e(date("d, M-Y", strtotime($model->start_from))); ?></span></td>
                            </tr>
                            <tr>
                                <th>End_date</th>
                                <td><span class="badge badge-info"><?php echo e(date("d, M-Y", strtotime($model->end_date))); ?></span></td>
                            </tr>
                            <tr>
                                <th>Retail_price</th>
                                <td>$<?php echo e(number_format($model->retail_price,2)); ?></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>$<?php echo e(number_format($model->price, 2)); ?></td>
                            </tr>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/bundles/show.blade.php ENDPATH**/ ?>