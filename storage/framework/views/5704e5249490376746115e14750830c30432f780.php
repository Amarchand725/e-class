<section id="facts" class="fact-main-block">
    <div class="container-xl">
        <div class="row">
            <?php $__currentLoopData = facts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="facts-block text-center">
                        <div class="facts-block-one">
                            <div class="facts-block-img">
                                <img src="<?php echo e(asset('public/admin/images/facts')); ?>/<?php echo e($fact->image); ?>" class="img-fluid" alt="" />
                                <div class="facts-count"><?php echo e($fact->counter); ?></div>
                            </div>
                            <h5 class="facts-title"><a href="#" title=""><?php echo e($fact->title); ?></a></h5>
                            <p><?php echo e($fact->description); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/layouts/fact.blade.php ENDPATH**/ ?>