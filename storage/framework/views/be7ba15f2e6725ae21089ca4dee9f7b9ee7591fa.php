<section id="instructor-home-two" class="instructor-home-main-block">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h4 class="student-heading">Featured Instructor</h4>
            </div>
        </div>
        
        <div id="instructor-home-slider-two" class="instructor-home-main-slider owl-carousel">
            <?php $__currentLoopData = instructors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($instructor->is_featured): ?>
                    <div class="item">
                        <div class="instructor-home-block text-center">
                            <div class="instructor-home-block-one">
                                <a href="<?php echo e(route('user.profile', $instructor->slug)); ?>" title="<?php echo e($instructor->name); ?>">
                                    <?php if($instructor->hasUserProfile): ?>
                                        <img src="<?php echo e(asset('public/admin/images/profiles')); ?>/<?php echo e($instructor->hasUserProfile->profile_image); ?>" class="img-fluid user-img-one" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php endif; ?>
                                </a>
                                <div class="instructor-home-hover-icon">
                                    <ul>
                                        <li>
                                            <div class="tooltip">
                                                <div class="tooltip-icon">
                                                    <i data-feather="share-2"></i>
                                                </div>
                                                <span class="tooltiptext">
                                                    <div class="instructor-home-social-icon">
                                                        <ul>
                                                            <li><a href="<?php echo e($instructor->hasUserProfile->facebook_url); ?>" target="_blank"><i data-feather="facebook"></i></a></li>
                                                            <li><a href="<?php echo e($instructor->hasUserProfile->twitter_url); ?>" target="_blank"><i data-feather="twitter"></i></a></li>
                                                            <li><a href="<?php echo e($instructor->hasUserProfile->youtube_url); ?>" target="_blank"><i data-feather="youtube"></i></a></li>
                                                            <li><a href="<?php echo e($instructor->hasUserProfile->linked_in_url); ?>" target="_blank"><i data-feather="linkedin"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="instructor-home-btn">
                                                <a href="<?php echo e(route('user.profile', $instructor->slug)); ?>" class="btn btn-primary" title="View Profile"><i data-feather="eye"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="instructor-home-dtl">
                                    <h4 class="instructor-home-heading"><a href="<?php echo e(route('user.profile', $instructor->slug)); ?>" title=""><?php echo e($instructor->name); ?></a></h4>
                                    <p></p>
                                    <div class="instructor-home-info">
                                        <ul>
                                            <li><?php echo e(count($instructor->haveCourses)); ?> Courses</li>
                                            <li><?php echo e(count($instructor->haveFollowers)); ?> Follower</li>
                                            <li><?php echo e(count($instructor->haveFollowings)); ?> Following</li>
                                        </ul>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/layouts/featured-instructors.blade.php ENDPATH**/ ?>