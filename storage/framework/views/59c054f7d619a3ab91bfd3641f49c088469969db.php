<section id="student" class="student-main-block">
    <div class="container-xl">
        <h4 class="student-heading">Live Meetings</h4>
        <div id="zoom-view-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = meetings(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-meeting-<?php echo e($meeting->slug); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="<?php echo e(route('meeting.single', $meeting->slug)); ?>">
                                    <img data-src="<?php echo e(asset('public/admin/images/meetings')); ?>/<?php echo e($meeting->thumbnail); ?>" alt="course" class="img-fluid owl-lazy">
                                </a>
                            </div>
                            <div class="view-user-img">
                                <a href="<?php echo e(route('user.profile', $meeting->hasHost->slug)); ?>" title="">
                                    <?php if($meeting->hasHost->hasUserProfile->profile_image): ?>
                                        <img src="<?php echo e(asset('public/users')); ?>/<?php echo e($meeting->hasHost->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="meeting-icon"><img src="<?php echo e(asset('public/website/images/meeting_icons/zoom.png')); ?>" class="img-circle" alt=""></div>

                            <div class="view-dtl">
                                <div class="view-heading">
                                    <a href="<?php echo e(route('meeting.single', $meeting->slug)); ?>"><?php echo e($meeting->topic); ?></a>    
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="<?php echo e(route('user.profile', $meeting->hasHost->slug)); ?>"><?php echo e($meeting->hasHost->name); ?></a></span></h6>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-date">
                                                <a href="#">
                                                    <i data-feather="calendar"></i>
                                                    <?php echo e(date('d-m-Y', strtotime($meeting->start_date))); ?>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-time">
                                                <a href="#">
                                                    <i data-feather="clock"></i>
                                                    <?php echo e(date('h:i:s A', strtotime($meeting->start_time))); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>
                                            <li class="protip-wish-btn"><a href="https://calendar.google.com/calendar/r/eventedit?text=The%20Complete%20Web%20Developer%20Bootcamp" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>
                                            <li class="protip-wish-btn"><a href="login.html" title="heart"><i data-feather="heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-meeting-<?php echo e($meeting->slug); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><a href="<?php echo e(route('meeting.single', $meeting->slug)); ?>"><?php echo e($meeting->topic); ?></a>
                                </h5>
                                <div class="protip-img">
                                    <h6 class="user-name">By <span><a href="<?php echo e(route('user.profile', $meeting->hasHost->slug)); ?>"><?php echo e($meeting->hasHost->name); ?></a></span></h6>
                                    <p class="meeting-owner btm-10">
                                        <a herf="#">Meeting Owner:
                                            <span class="__cf_email__" data-cfemail="<?php echo e($meeting->email); ?>">[email&#160;protected]</span>
                                        </a>
                                    </p>
                                </div>
                                <div class="main-des meeting-main-des">
                                    <div class="main-des-head">Start At: </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-date">
                                                <a href="#"><i data-feather="calendar"></i> <?php echo e(date('d-m-Y', strtotime($meeting->start_date))); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-time">
                                                <a href="#"><i data-feather="clock"></i> <?php echo e(date('h:i:s A', strtotime($meeting->start_time))); ?></a>
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
</section><?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/layouts/zoom-liv.blade.php ENDPATH**/ ?>