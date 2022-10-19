
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('role.index')); ?>">
    <section class="content-header">
        <div class="content-header-left">
            <h1>All Roles</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route('role.create')); ?>" class="btn btn-primary btn-sm">Add New Role</a>
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
                            </div>
                            <div class="d-flex col-sm-5" style="display: none">
                                <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                    <option value="All" selected>Search by status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="id-<?php echo e($role->id); ?>">
                                        <td><?php echo e($roles->firstItem()+$key); ?>.</td>
                                        <td><?php echo e($role->name); ?></td>
                                        <td><?php echo $role->description; ?></td>
                                        <td>
                                            
                                                <a class="btn btn-primary btn-xs" href="<?php echo e(route('role.edit', $role->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
                                            
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="4">
                                        Displying <?php echo e($roles->firstItem()); ?> to <?php echo e($roles->lastItem()); ?> of <?php echo e($roles->total()); ?> records
                                        <div class="d-flex justify-content-center">
                                            <?php echo $roles->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/admin/role/index.blade.php ENDPATH**/ ?>