<ul>
    <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(route('user.category-wise-course', $child->slug)); ?>" title="Web Devlopment"><?php echo $child->icon; ?> <?php echo e($child->name); ?>

                <?php if(count($child->haveChildren) > 0): ?> <i data-feather="chevron-right" class="float-right"></i> <?php endif; ?>
            </a>
            <?php if(count($child->haveChildren)): ?>
                <?php echo $__env->make('web-views.layouts.manage-child-categories',['childs' => $child->haveChildren], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/layouts/manage-child-categories.blade.php ENDPATH**/ ?>