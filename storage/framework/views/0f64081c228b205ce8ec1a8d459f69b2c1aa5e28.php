<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingelevenxxx">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeleven-<?php echo e($child->slug); ?>" aria-expanded="false" aria-controls="collapseelevenxxx">
                    <?php echo $child->icon; ?>

                    <label class="sub-cate" data-url=""><?php echo e($child->name); ?></label>
                    <?php if(count($child->haveChildren)): ?>
                        <i class="fa fa-chevron-down pull-right"></i>
                    <?php endif; ?>
                </a>
            </h4>
        </div>

        <div id="collapseeleven-<?php echo e($child->slug); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingelevenxxx">
            <div class="panel-body sub-cat">
                <?php if(count($child->haveChildren)): ?>
                    <?php echo $__env->make('web-views.website.category.manage-child',['childs' => $child->haveChildren], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/category/manage-child.blade.php ENDPATH**/ ?>