<section id="student" class="student-main-block top-40">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-7">
                <h4 class="student-heading">Top Discounted Courses</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-5">
                <div class="view-button txt-rgt">
                    <a href="<?php echo e(route('course.all-discount.courses')); ?>" class="btn btn-secondary" title="View More">View More<i data-feather="chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="discounted-view-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = topDiscountCourses(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount_course_key=>$discount_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip "
                        data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block-discount-<?php echo e($discount_course_key); ?><?php echo e($discount_course->id); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="<?php echo e(route('course.single', $discount_course->slug)); ?>">
                                    <img data-src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($discount_course->thumbnail); ?>" alt="course"
                                            class="img-fluid owl-lazy">
                                </a>
                            </div>

                            <div class="badges bg-priamry offer-badge">
                                <?php if($discount_course->discount_type=='percent'): ?>
                                    <?php
                                        $percentage = $discount_course->discount;
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $percentage = $discount_course->discount/$discount_course->retail_price*100;
                                    ?>
                                <?php endif; ?>
                                <span>OFF<span><?php echo e(round($percentage)); ?>%</span></span>
                            </div>

                            <div class="advance-badge">
                                <span class="badge bg-info">On-sale</span>
                            </div>
                            <div class="view-user-img">
                                <a href="<?php echo e(route('user.profile', $discount_course->hasInstructor->slug)); ?>" title="">
                                    <?php if($discount_course->hasUserProfile): ?>
                                        <img src="<?php echo e(asset('public/users')); ?>/<?php echo e($discount_course->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading">
                                    <a href="<?php echo e(route('course.single', $discount_course->slug)); ?>"><?php echo e($discount_course->title); ?></a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="<?php echo e(route('user.profile', $discount_course->hasInstructor->slug)); ?>"><?php echo e($discount_course->hasInstructor->name); ?></a></span></h6>
                                </div>
                                <div class="rating">
                                    <ul>
                                        <?php 
                                            $rate = 0;
                                            $tot_reviews = 0;
                                            if(count($discount_course->hasRating)>0){
                                                $tot_reviews = $discount_course->hasRating->count();
                                                $rate = ($discount_course->hasRating->sum('rate')/$discount_course->hasRating->count()*5)*5;
                                            }
                                        ?>
                                        <?php if($rate>0): ?> 
                                            <li>
                                                <div class="pull-left">
                                                    <div class="star-ratings-sprite">
                                                        <span style="width:<?php echo e($rate); ?>%" class="star-ratings-sprite-rating"></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="reviews">
                                                (<?php echo e($tot_reviews); ?> Reviews)
                                            </li>
                                        <?php else: ?> 
                                            <li>
                                                <div class="pull-left no-rating">
                                                    No Rating
                                                </div>
                                            </li> 
                                        <?php endif; ?>   
                                    </ul>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="count-user">
                                                <i data-feather="user"></i>
                                                <?php 
                                                    $enrolled = 0; 
                                                    if(count($discount_course->haveEnrolledStudents)>0){
                                                        $enrolled = count($discount_course->haveEnrolledStudents);
                                                    }
                                                ?> 
                                                <span><?php echo e($enrolled); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="rate text-right">
                                                <ul>
                                                    <?php if($discount_course->is_paid): ?>
                                                        <li><a><b>$<?php echo e(number_format($discount_course->price, 2)); ?></b></a></li>
                                                        <?php if($discount_course->discount != NULL): ?>
                                                            <li><a><b><strike>$<?php echo e(number_format($discount_course->retail_price, 2)); ?></strike></b></a></li>
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
                                            
                                            <li class="protip-wish-btn add-wish-btn" data-url="<?php echo e(route('user.wishlist.store')); ?>" data-product-slug="<?php echo e($discount_course->slug); ?>">
                                                <span title="heart"><i data-feather="heart"></i></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-discount-<?php echo e($discount_course_key); ?><?php echo e($discount_course->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($discount_course->title); ?></h5>
                                <div class="main-des">
                                    <p>Last Updated: <?php echo e(date('d F Y', strtotime($discount_course->updated_at))); ?></p>
                                </div>

                                <ul class="description-list">
                                    <li>
                                        <i data-feather="play-circle"></i>
                                        <div class="class-des">
                                            Classes: <?php echo e(count($discount_course->haveClasses)); ?>

                                        </div>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <div>
                                            <div class="time-des">
                                                <?php
                                                    $sum_minutes = 0;
                                                    foreach ($discount_course->haveClasses as $discount_course_class){
                                                        $explodedTime = array_map('intval', explode(':', $discount_course_class->lecture_duration ));
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
                                    <p><?php echo e($discount_course->short_description); ?></p>
                                </div>
                                <div>
                                    <?php if(!empty($discount_course->haveWhatLearns)): ?>
                                        <?php $__currentLoopData = $discount_course->haveWhatLearns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $learn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                            <div class="box-footer">
                                                <a href="<?php echo e(route('add.to.cart', $discount_course->slug)); ?>" class="btn btn-primary btn-block text-center" role="button">
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Add To Cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="img-wishlist">
                                                <div class="protip-wishlist">
                                                    <ul>
                                                        <li class="protip-wish-btn add-wish-btn" data-url="<?php echo e(route('user.wishlist.store')); ?>" data-product-slug="<?php echo e($discount_course->slug); ?>">
                                                            <span title="heart"><i data-feather="heart"></i></span>
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
<?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/layouts/discount.blade.php ENDPATH**/ ?>