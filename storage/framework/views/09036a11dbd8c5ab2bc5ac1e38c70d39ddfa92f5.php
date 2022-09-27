<section id="home-background-slider" class="background-slider-block owl-carousel">
    <?php $__currentLoopData = slider(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="lazy item home-slider-img">
            <div id="home" class="home-main-block"
                style="background-image: url('public/admin/images/sliders/<?php echo e($slider->image); ?>')">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="home-dtl">
                                <div class="home-heading"><?php echo e($slider->title); ?></div>
                                <p class="btm-10"><?php echo e($slider->sub_title); ?></p>
                                <p class="btm-20"><?php echo e($slider->description); ?></p>
                            </div>
                            <?php if($key==0): ?>
                                <div class="home-search">
                                    <form method="GET" id="searchform" action="https://eclass.mediacity.co.in/demo/public/search">
                                        <div class="search">
                                            <input type="text" name="searchTerm" class="searchTerm"
                                                placeholder="Search Courses">
                                            <button type="submit" class="searchButton">Search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
</section>
<?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/layouts/slider.blade.php ENDPATH**/ ?>