<section id="categories" class="categories-main-block">
    <div class="container-xl">
        <h3 class="categories-heading">Featured Categories</h3>
        <div class="row">
            <?php $__currentLoopData = mainCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                    <div class="cat-container btm-20 text-center">
                        <a href="browse/categorya943.html?id=2&amp;category=devlopment">
                            <div class="cat-img">
                                <img src="<?php echo e(asset('public/admin/images/categories')); ?>/<?php echo e($category->thumbnail); ?>">
                            </div>
                            <div class="cat-dtl">
                                <div>
                                    <span>
                                        <h5 class="cat-name"><?php echo $category->icon; ?> <?php echo e($category->name); ?></h5>
                                        <div class="cat-img-count">5 Courses</div>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/layouts/featured-categories.blade.php ENDPATH**/ ?>