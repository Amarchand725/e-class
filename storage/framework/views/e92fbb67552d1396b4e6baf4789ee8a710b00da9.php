<section id="testimonial" class="testimonial-main-block">
    <div class="container-xl">
        <h4>Home Testimonial</h4>
        <div id="testimonial-slider" class="testimonial-slider-main-block owl-carousel">
            <div class="item testimonial-block text-center">
                <?php $__currentLoopData = reviews(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="testimonial-block-one">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="testimonial-img">
                                    <?php if($review->hasUser->hasUserProfile->profile_image): ?>
                                        <img src="<?php echo e(asset('public/admin/images/profiles')); ?>/<?php echo e($review->hasUser->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid owl-lazy" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid owl-lazy" alt="">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="testimonial-name">
                                    <h5 class="testimonial-heading"><?php echo e($review->hasUser->name); ?></h5>
                                    <p class="testimonial-para"></p>
                                </div>
                                <div class="testimonial-rating">
                                    <?php
                                    for($j=1; $j<=5; $j++){
                                    ?>
                                        <?php if($j<=$review->rate): ?>
                                            <i class='fa fa-star' style='color:orange'></i>
                                        <?php else: ?>
                                            <i class='fa fa-star'></i>
                                        <?php endif; ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <p><?php echo $review->review; ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/layouts/testomonials.blade.php ENDPATH**/ ?>