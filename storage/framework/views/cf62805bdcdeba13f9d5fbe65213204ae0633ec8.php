<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($model->id); ?>">
        <td><?php echo e($models->firstItem()+$key); ?>.</td>
        <td><?php echo e($model->name); ?></td>
        <td><?php echo e($model->phonecode); ?></td>
        <td><?php echo e($model->currency); ?></td>
        <td><?php echo e($model->currency_symbol); ?></td>
        <td width="250px">
            <a href="<?php echo e(route("country.show", $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Show Country" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="11">
        Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $models->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\e-class\resources\views/countries/_search.blade.php ENDPATH**/ ?>