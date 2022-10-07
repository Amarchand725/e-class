<section id="instructor-home" class="instructor-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">Institute</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="instructor-button txt-rgt">
                </div>
            </div>
        </div>
        
        <div id="institute-home-slider" class="instructor-home-main-slider owl-carousel">
            <?php $__currentLoopData = institutes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="instructor-home-block text-center">
                        <div class="instructor-home-block-one">
                            <a href="<?php echo e(route('institute.single', $institute->slug)); ?>" title="">
                                <img src="<?php echo e(asset('public/admin/images/institutes')); ?>/<?php echo e($institute->logo); ?>"  class="img-fluid" />
                            </a>
                            <div class="instructor-home-hover-icon">
                                <ul>
                                    <li>
                                        <div class="instructor-home-btn">
                                            <a href="ins/16/1.html" class="btn btn-primary" title="View Page"><i data-feather="eye"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>  
                            <div class="instructor-home-dtl">
                                <h4 class="instructor-home-heading">
                                    <a href="#" title=""><?php echo e($institute->name); ?></a>
                                </h4>
                                <p>
                                    <a href="#" class="__cf_email__" data-cfemail="<?php echo e($institute->email); ?>"><?php echo e($institute->email); ?></a>
                                </p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/layouts/institutes.blade.php ENDPATH**/ ?>