
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('slider.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo e(route('slider.create')); ?>" data-toggle="tooltip" data-placement="left" title="Add New Slider" class="btn btn-primary btn-sm">Add New Slider</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-11">
                            <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                            <input type="hidden" id="status" value="All" class="form-control">
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>TITLE</th><th>SUB_TITLE</th><th>DESCRIPTION</th><th>IMAGE</th><th>STATUS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="id-<?php echo e($model->id); ?>">
                                    <td><?php echo e($models->firstItem()+$key); ?>.</td>
                                    <td>
                                        <?php if($model->image): ?>
                                            <img style="border-radius: 50%;" src="<?php echo e(asset('public/admin/images/sliders')); ?>/<?php echo e($model->image); ?>" width="50px" height="50px" alt="">
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($model->title); ?></td>
                                    <td><?php echo e($model->sub_title); ?></td>
                                    <td><?php echo e($model->description); ?></td>
                                    <td>
                                        <?php if($model->status): ?>
                                            <span class="label label-success">Active</span>
                                        <?php else: ?>
                                            <span class="label label-danger">In-Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td width="250px">
                                        <a href="<?php echo e(route("slider.show", $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Show Slider" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                        <a href="<?php echo e(route("slider.edit", $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Slider" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a>
                                        <button data-toggle="tooltip" data-placement="top" title="Delete Slider" class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route("slider.destroy", $model->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="10">
                                    Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $models->links('pagination::bootstrap-4'); ?>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/sliders/index.blade.php ENDPATH**/ ?>