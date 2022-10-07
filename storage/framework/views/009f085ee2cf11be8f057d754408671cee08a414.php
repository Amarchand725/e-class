<section id="learning-work" class="learning-work-main-block">
    <div class="container-xl">
        <div class="row">
            <?php $__currentLoopData = learningLabels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $learning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4">
                    <div class="learning-work-block">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="learning-work-icon">
                                    <?php echo $learning->icon; ?>

                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="learning-work-dtl">
                                    <div class="work-heading"><?php echo e($learning->label); ?></div>
                                    <p><?php echo e($learning->message); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/layouts/learning-work.blade.php ENDPATH**/ ?>