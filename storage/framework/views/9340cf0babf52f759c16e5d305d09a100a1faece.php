<section id="trusted" class="trusted-main-block">
    <div class="container-xl">
        <div class="patners-block">
            <h6 class="patners-heading btm-40">Trusted By Companies</h6>
            <div id="patners-slider" class="patners-slider owl-carousel">
                <?php $__currentLoopData = trustCompanies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-patners-img">
                        <a href="<?php echo e($company->website_link); ?>" target="_blank">
                            <img data-src="<?php echo e(asset('public/admin/images/trust-companies')); ?>/<?php echo e($company->logo); ?>" class="img-fluid owl-lazy" alt="<?php echo e($company->name); ?>">
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/layouts/trusted-companies.blade.php ENDPATH**/ ?>