

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
            <img src="<?php echo e(asset('public/website/images/logo/wishlist-banner.jpg')); ?>" class="img-fluid" alt="">
        </div>
        <div class="overlay-bg"></div>
        <div class="container-xl">
            <div class="business-dtl">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bredcrumb-dtl">
                            <h1 class="wishlist-home-heading">My Courses</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="learning-courses" class="learning-courses-main-block">
        <div class="container-xl">
            <h4 class="student-heading">My Courses</h4>
            <div class="row">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $order->haveOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="view-block">
                                <div class="view-img">
                                    <?php if(!empty($order_detail->hasCourse)): ?>
                                        <a href="<?php echo e(route('user.my_course.single', $order_detail->hasCourse->slug)); ?>">
                                            <img src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($order_detail->hasCourse->thumbnail); ?>" class="img-fluid" alt="Course">
                                        </a>
                                    <?php elseif(!empty($order_detail->hasBundle)): ?>
                                        <a href="<?php echo e(route('user.my_course.single', $order_detail->hasBundle->slug)); ?>">
                                            <img src="<?php echo e(asset('public/admin/bundle/banners')); ?>/<?php echo e($order_detail->hasBundle->banner); ?>" class="img-fluid" alt="Bundle">
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="view-user-img">
                                    <?php if(!empty($order_detail->hasCourse)): ?>
                                        <a href="<?php echo e(route('user.profile', $order_detail->hasCourse->hasInstructor->slug)); ?>" title="">
                                            <?php if($order_detail->hasCourse->hasInstructor->hasUserProfile->profile_image): ?>
                                                <img src="<?php echo e(asset('public/users')); ?>/<?php echo e($order_detail->hasCourse->hasInstructor->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                            <?php endif; ?>
                                        </a>
                                    <?php elseif(!empty($order_detail->hasBundle)): ?>
                                        <a href="<?php echo e(route('user.profile', $order_detail->hasBundle->hasCreatedBy->slug)); ?>" title="">
                                            <?php if($order_detail->hasBundle->hasCreatedBy->hasUserProfile->profile_image): ?>
                                                <img src="<?php echo e(asset('public/users')); ?>/<?php echo e($order_detail->hasBundle->hasCreatedBy->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="view-dtl">
                                    <div class="view-heading">
                                        <?php if(!empty($order_detail->hasCourse)): ?>
                                            <a href="<?php echo e(route('user.my_course.single', $order_detail->hasCourse->slug)); ?>"><?php echo e($order_detail->hasCourse->title); ?></a>
                                        <?php elseif(!empty($order_detail->hasBundle)): ?>
                                            <a href="<?php echo e(route('user.my_course.single', $order_detail->hasBundle->slug)); ?>"><?php echo e($order_detail->hasBundle->title); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="user-name">
                                        <?php if(!empty($order_detail->hasCourse)): ?>
                                            <h6>By <span><a href="<?php echo e(route('user.profile', $order_detail->hasCourse->hasInstructor->slug)); ?>"><?php echo e($order_detail->hasCourse->hasInstructor->name); ?></a></span></h6>
                                        <?php elseif(!empty($order_detail->hasBundle)): ?>
                                            <h6>By <span><a href="<?php echo e(route('user.profile', $order_detail->hasBundle->hasCreatedBy->slug)); ?>"><?php echo e($order_detail->hasBundle->hasCreatedBy->name); ?></a></span></h6>
                                        <?php endif; ?>
                                    </div>
                                    <!-- <p class="btm-10"><a href="#">by                                 
                                        Admin </a></p> -->
                                    <div class="rating">
                                        <ul>
                                            <li>
                                                <div class="pull-left">
                                                    No Rating
                                                </div>
                                            </li>
                                                                            
                                            <li class="reviews">
                                                (0 Reviews)
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mycourse-progress">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="complete">Start Course</div>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
            <img src="<?php echo e(asset('public/website/images/logo/subscribe-banner.jpg')); ?>" class="img-fluid" alt="">
        </div>
        <div class="overlay-bg"></div>
        <div class="container-xl">
            <div class="business-dtl">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bredcrumb-dtl">
                            <h1 class="wishlist-home-heading">My Subscribed Courses</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="learning-courses" class="learning-courses-main-block">
        <div class="container-xl">
            <div class="row"></div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/website/user/my-courses.blade.php ENDPATH**/ ?>