
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('menu.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo e(route('menu.create')); ?>" class="btn btn-primary btn-sm">Add New Menu</a>
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
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="menu_of" id="status" class="form-control js-example-basic-single">
                                <option value="All" selected>Search menu of</option>
                                <option value="admin">Admin</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(Str::lower($role->name)); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <option value="general">General</option>
                            </select>
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Menu of</th>
                                <th>Icon</th>
                                <th>Label</th>
                                <th>Parent</th>
                                <th>Menu</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="id-<?php echo e($menu->id); ?>" class="id-<?php echo e($menu->id); ?>">
                                    <td><?php echo e($models->firstItem()+$key); ?>.</td>
                                    <td><?php echo e(Str::ucfirst($menu->menu_of)); ?></td>
                                    <td><?php echo $menu->icon; ?></td>
                                    <td><?php echo e(Str::ucfirst($menu->label)); ?></td>
                                    <td><?php echo e(isset($menu->hasParent)?$menu->hasParent->menu:'--'); ?></td>
                                    <td><?php echo e($menu->menu); ?></td>
                                    <td>
                                        <?php if($menu->status): ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">In-Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('menu.edit', $menu->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <?php if($menu->menu != 'Menu' && $menu->menu != 'Role' && $menu->menu != 'Page'): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($menu->id); ?>" data-del-url="<?php echo e(route('menu.destroy', $menu->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="6">
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/admin/menus/index.blade.php ENDPATH**/ ?>