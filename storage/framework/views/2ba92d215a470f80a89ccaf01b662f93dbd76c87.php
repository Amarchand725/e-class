<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($permission->id); ?>">
        <td><?php echo e($permissions->firstItem()+$key); ?>.</td>
        <td><?php echo e(Str::ucfirst($permission->name)); ?></td>
        <td>
            <ul>
                <?php $__currentLoopData = $permission->havePermissionUrls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e(Str::ucfirst($permission_url->permission)); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </td>
        <td>
            <a href="<?php echo e(route('permission.edit', $permission->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($permission->id); ?>" data-del-url="<?php echo e(route("permission.destroy", $permission->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="4">
        Displying <?php echo e($permissions->firstItem()); ?> to <?php echo e($permissions->lastItem()); ?> of <?php echo e($permissions->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $permissions->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\e-class\resources\views/admin/permission/search.blade.php ENDPATH**/ ?>