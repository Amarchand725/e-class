

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Add Slider -->
    <?php echo $__env->make('web-views.layouts.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Add Slider -->

    <!-- learning-work start -->
    <?php echo $__env->make('web-views.layouts.learning-work', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- learning-work end -->

    <!-- fact start -->
    <?php echo $__env->make('web-views.layouts.fact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- fact end -->

    <!-- Discount -->
    <?php echo $__env->make('web-views.layouts.discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Discount -->

    <!-- learning-courses start -->
    
    <!-- learning-courses end -->

    <!-- Featured Courses -->
    <?php echo $__env->make('web-views.layouts.featured-courses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Featured Courses -->

    <!-- Subscription Bundle start -->
    <?php echo $__env->make('web-views.layouts.subscription-bundles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Subscription Bundle end -->

    <!-- Best Selling Bundle start -->
    
     <!-- Best Selling Bundle start -->

    <!-- Zoom start -->
    <?php echo $__env->make('web-views.layouts.zoom-liv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Zoom end -->

    <!-- google class room start -->
    <section id="student" class="student-main-block">
        <div class="container"></div>
    </section>
    <!-- google class room end -->

    <!-- Featured Instructor -->
    <?php echo $__env->make('web-views.layouts.featured-instructors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Featured Instructor -->

    <!-- Blogs -->
    <?php echo $__env->make('web-views.layouts.blogs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Blogs -->

    <!-- recommendations start -->
    <?php echo $__env->make('web-views.layouts.recommendations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- recommendations end -->

    <!-- categories start -->
    <?php echo $__env->make('web-views.layouts.featured-categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- categories end -->

    <!-- testimonial start -->
    <?php echo $__env->make('web-views.layouts.testomonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- testimonial end -->

    <!-- video start -->
    <?php echo $__env->make('web-views.layouts.video-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- video end -->

    <!-- instructor start -->
    <?php echo $__env->make('web-views.layouts.instructors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- instructor -->

    <!-- Get start -->
    <?php echo $__env->make('web-views.layouts.get-start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Get start -->

    <!-- Institute -->
    <?php echo $__env->make('web-views.layouts.institutes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- instructor end -->

    <!-- trusted companies -->
    <?php echo $__env->make('web-views.layouts.trusted-companies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- trusted companies -->

    <section id="trusted" class="trusted-main-block">
        <div class="container-fluid" id="adsense"></div>
    </section>
    <!-- testimonial end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/website/index.blade.php ENDPATH**/ ?>