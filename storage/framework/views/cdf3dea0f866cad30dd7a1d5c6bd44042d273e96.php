<section id="student" class="student-main-block top-40">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">Top Discounted Courses</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="#" class="btn btn-secondary" title="View More">View More<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="discounted-view-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = topDiscountCourses(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block-<?php echo e($key); ?><?php echo e($course->id); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="<?php echo e(route('course.single', $course->slug)); ?>">
                                    <img data-src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($course->thumbnail); ?>" alt="course"
                                            class="img-fluid owl-lazy">
                                </a>
                            </div>

                            <div class="badges bg-priamry offer-badge">
                                <?php if($course->discount_type=='percent'): ?>
                                    <?php
                                        $percentage = $course->discount;
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $percentage = $course->discount/$course->retail_price*100;
                                    ?>
                                <?php endif; ?>
                                <span>OFF<span><?php echo e(round($percentage)); ?>%</span></span>
                            </div>

                            <div class="advance-badge">
                                <span class="badge bg-info">On-sale</span>
                            </div>
                            <div class="view-user-img">
                                <a href="<?php echo e(route('user.profile', $course->hasInstructor->slug)); ?>" title="">
                                    <?php if($course->hasUserProfile): ?>
                                        <img src="<?php echo e(asset('public/users')); ?>/<?php echo e($course->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading">
                                    <a href="<?php echo e(route('course.single', $course->slug)); ?>"><?php echo e($course->title); ?></a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="<?php echo e(route('user.profile', $course->hasInstructor->slug)); ?>"><?php echo e($course->hasInstructor->name); ?></a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <li>
                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span
                                                        style="width:86.666666666667%"
                                                        class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="reviews">
                                            (1 Reviews)
                                        </li>

                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i>
                                                <span>0</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="rate text-right">
                                                <ul>
                                                    <?php if($course->is_paid): ?>
                                                        <li><a><b>$<?php echo e(number_format($course->price, 2)); ?></b></a></li>
                                                        <?php if($course->discount != NULL): ?>
                                                            <li><a><b><strike>$<?php echo e(number_format($course->retail_price, 2)); ?></strike></b></a></li>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <li>FREE</li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>
                                            <li class="protip-wish-btn">
                                                <a href="https://calendar.google.com/calendar/r/eventedit?text=Travel%20Hacking%20-Smart%20&amp;%20Fun%20Travel"
                                                    target="__blank" title="reminder"><i data-feather="bell"></i>
                                                </a>
                                            </li>
                                            <li class="protip-wish-btn">
                                                <a href="login.html" title="heart"><i data-feather="heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-<?php echo e($key); ?><?php echo e($course->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($course->title); ?></h5>
                                <div class="main-des">
                                    <p>Last Updated: <?php echo e(date('d F Y', strtotime($course->updated_at))); ?></p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes: <?php echo e(count($course->haveClasses)); ?>

                                        </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <?php
                                                    $sum_minutes = 0;
                                                    foreach ($course->haveClasses as $course_class){
                                                        $explodedTime = array_map('intval', explode(':', $course_class->lecture_duration ));
                                                        $sum_minutes += $explodedTime[0]*60+$explodedTime[1];
                                                    }
                                                    $lecture_duration_total_time = floor($sum_minutes/60).':'.floor($sum_minutes % 60);
                                                ?>
                                                <span class="">
                                                    <i data-feather="clock"></i>
                                                    <?php echo e($lecture_duration_total_time); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lang-des"></div>
                                    </li>
                                </ul>

                                <div class="product-main-des">
                                    <p><?php echo e($course->short_description); ?></p>
                                </div>
                                <div>
                                    <?php if(!empty($course->haveWhatLearns)): ?>
                                        <?php $__currentLoopData = $course->haveWhatLearns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $learn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="product-learn-dtl">
                                                <ul>
                                                    <li>
                                                        <i data-feather="check-circle"></i><?php echo e($learn->detail); ?>.
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form id="demo-form2" method="post"
                                                action="https://eclass.mediacity.co.in/demo/public/guest/addtocart/21" data-parsley-validate
                                                class="form-horizontal form-label-left">
                                                <input type="hidden" name="_token" value="leZ79T21enQSxfzfbeOTzvgubGXd6jlVMG4Ztrf9">

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary"><i data-feather="shopping-cart"></i>&nbsp;Add To Cart</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="img-wishlist">
                                                <div class="protip-wishlist">
                                                    <ul>
                                                        <li class="protip-wish-btn">
                                                            <a href="login.html" title="heart"><i data-feather="heart"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
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
<?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/layouts/discount.blade.php ENDPATH**/ ?>