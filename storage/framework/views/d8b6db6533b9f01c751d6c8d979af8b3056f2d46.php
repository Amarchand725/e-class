<section id="student" class="student-main-block">
    <div class="container-xl">
        <h4 class="student-heading">Recent Blogs</h4>
        <div id="blog-post-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = latestBlogs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block-<?php echo e($blog->id); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="#">
                                    <?php if($blog->extension=='jpg' || $blog->extension=='png' || $blog->extension=='jpeg'): ?>
                                        <img data-src="<?php echo e(asset('public/admin/images/blogs')); ?>/<?php echo e($blog->attachment); ?>" alt="blog" class="img-fluid owl-lazy">
                                    <?php else: ?>
                                        <img style="border-radius: 50%;" src="<?php echo e(asset('public/default.png')); ?>" width="50  px" height="50px" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="view-user-img">
                                <a href="" title="">
                                    <?php if($blog->hasCreatedBy->hasUserProfile): ?>
                                        <img src="<?php echo e(asset('public/users')); ?>/<?php echo e($blog->hasCreatedBy->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="tooltip">
                                <div class="tooltip-icon">
                                    <i data-feather="share-2"></i>
                                </div>
                                <span class="tooltiptext">
                                    <div class="instructor-home-social-icon">
                                        <ul>
                                            <li><a href="https://facebook.com/"><i data-feather="facebook"></i></a></li>
                                            <li><a href="#"><i data-feather="twitter"></i></a></li>
                                            <li><a href="https://www.youtube.com/watch?v=2cbvZf1jIJM"><i data-feather="youtube"></i></a></li>
                                            <li><a href="https://www.youtube.com/watch?v=ImtZ5yENzgE"><i data-feather="linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </span>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading">
                                    <a href="">
                                        <?php echo e($blog->title); ?>

                                    </a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="#"><?php echo e($blog->hasCreatedBy->roles->first()->name); ?></a></span></h6>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-date">
                                                <a href="#">
                                                    <i data-feather="calendar"></i>
                                                    <?php echo e(date('d-m-Y', strtotime($blog->created_at))); ?>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-time">
                                                <a href="#">
                                                    <i data-feather="clock"></i>
                                                    <?php echo e(date('H:i:s A', strtotime($blog->created_at))); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-<?php echo e($blog->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($blog->title); ?></h5>
                                <div class="row btm-20">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-date">
                                            <a href="#"><i data-feather="calendar"></i> <?php echo e(date('d-m-Y', strtotime($blog->created_at))); ?></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="view-time">
                                            <a href="#"><i data-feather="clock"></i> 12<?php echo e(date('H:is A', strtotime($blog->created_at))); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-des">
                                    <p style="text-align: justify !important"><?php echo $blog->description; ?></p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/layouts/blogs.blade.php ENDPATH**/ ?>