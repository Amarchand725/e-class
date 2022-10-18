

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section id="instructor-block" class="instructor-main-block instructor-profile">
    <div class="container-xl">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="instructor-block">
                    <div class="instructor-small-heading">Instructor</div>
                    <h1><?php echo e($model->name); ?></h1>
                    <div class="sub-heading"><?php echo e($model->email); ?></div>
                    <div class="instructor-business-block">
                        <div class="instructor-student">
                            <div class="total-students">Total Students</div>
                            <div class="total-number">
                                20               
                            </div>
                        </div>    
                    </div>
                    <div class="about-content-sidebar instructor-sidebar">
                       <div class="row">
                           
                           <div class="col-lg-12">
                               <div class="row">
                                   <div class="col-lg-8 col-md-7 col-12">
                                       <div class="instructor-content-block">
                                           <h5 class="about-content-heading"><?php echo e($model->name); ?></h5>     
                                           <div class="instructor-follower">
                                               <div class="followers-status">
                                                   <span class="followers-value"><?php echo e(count($instructor->haveFollowers)); ?></span>
                                                   <span class="followers-heading">Followers</span>
                                               </div>
                                               <div class="following-status">
                                                   <span class="followers-value"><?php echo e(count($instructor->haveFollowings)); ?></span>
                                                   <span class="followers-heading">Following</span>
                                               </div>
                                           </div>
                                                                                       
                                           <div class="about-reward-badges">
                                               <img src="<?php echo e(asset('public/website/images/badges/1.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Member Since 2020">
                                                <img src="<?php echo e(asset('public/website/images/badges/2.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="Has 13 courses">
                                                <img src="<?php echo e(asset('public/website/images/badges/3.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title="rating from 4 to 5">
                                               <img src="<?php echo e(asset('public/website/images/badges/4.png')); ?>" class="img-fluid" alt="" data-toggle="tooltip" data-placement="bottom" title=" 20 users has enrolled">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-lg-4 col-md-5 col-12">
                                       <div class="instructor-btn">
                                            <form id="demo-form2" method="post" action="#" data-parsley-validate="" class="form-horizontal form-label-left">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="user_id" value="2">
                                                <input type="hidden" name="instructor_id" value="2">
                                                <button type="submit" class="btn btn-secondary">&nbsp;Unfollow</button>
                                            </form>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                    <div class="instructor-tabs">
                       <ul class="nav nav-tabs" id="tabs-tab" role="tablist">
                           <li class="nav-item">
                               <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About me</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" id="classes-tab" data-toggle="tab" href="#classes" role="tab" aria-controls="classes" aria-selected="false">My Courses</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" id="badges-tab" data-toggle="tab" href="#badges" role="tab" aria-controls="badges" aria-selected="false">Badges</a>
                           </li>
                       </ul>
                       <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <div class="instructor-tabs-content">
                                    <p><?php echo $model->hasUserProfile->details??'N/A'; ?></p>
                                </div>
                           </div>
                           <div class="tab-pane fade" id="classes" role="tabpanel" aria-labelledby="classes-tab">
                               <div class="about-instructor">
                                   <div class="row">
                                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="student-view-block">
                                                    <div class="view-block">
                                                        <div class="view-img">
                                                                <a href="<?php echo e(route('course.single', $course->slug)); ?>">
                                                                    <img src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($course->thumbnail); ?>" alt="course" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        <div class="view-user-img">
                                                                <a href="<?php echo e(route('user.profile', $course->hasInstructor->slug)); ?>" title="<?php echo e($course->hasInstructor->name); ?>">
                                                                    <?php if($course->hasInstructor): ?>
                                                                        <img src="<?php echo e(asset('public/admin/images/profiles')); ?>/<?php echo e($course->hasInstructor->hasUserProfile->profile_image); ?>" class="img-fluid user-img-one" alt="">
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
                                                                <h6>By <span><?php echo e($course->hasInstructor->name); ?></span></h6>
                                                            </div>
                                                            <div class="rating">
                                                                <ul>
                                                                    <li>                                                                                                                       
                                                                        <div class="pull-left">
                                                                            <div class="star-ratings-sprite">
                                                                                <span style="width:100%" class="star-ratings-sprite-rating"></span>
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
                                                                            <span>
                                                                                5
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                        <div class="rate text-right">
                                                                            <ul>        
                                                                                <li><a><b><i class="fa fa-dollar"></i><?php echo e(number_format($course->sale_price, 2)); ?></b></a></li>&nbsp;
                                                                                <li><a><b><strike><i class="fa fa-dollar"></i><?php echo e(number_format($course->price, 2)); ?></strike></b></a></li>    
                                                                            </ul>
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
                                   <div class="pull-right"><?php echo e($courses->links('pagination::bootstrap-4')); ?></div>
                                </div>
                           </div>
                           <div class="tab-pane fade" id="badges" role="tabpanel" aria-labelledby="badges-tab">
                               <div class="tab-reward-badges">
                                   <div class="row">
                                       <div class="col-lg-4 col-6">
                                           <div class="tab-badges-block text-center">
                                               <img src="<?php echo e(asset('public/website/images/badges/1.png')); ?>" class="img-fluid" alt="">
                                               <div class="tab-badges-heading">Trusted User</div>
                                               <p>Member since 2020</p>
                                           </div>
                                       </div>
                                                                               <div class="col-lg-4 col-6">
                                           <div class="tab-badges-block text-center">
                                               <img src="<?php echo e(asset('public/website/images/badges/2.png')); ?>" class="img-fluid" alt="">
                                               <div class="tab-badges-heading">Senior Instructor</div>
                                               <p>Has 13 Courses</p>
                                           </div>
                                       </div>
                                                                               <div class="col-lg-4 col-6">
                                           <div class="tab-badges-block text-center">
                                               <img src="<?php echo e(asset('public/website/images/badges/3.png')); ?>" class="img-fluid" alt="">
                                               <div class="tab-badges-heading">Golden Courses</div>
                                               <p>Courses Rating from 4 to 5</p>
                                           </div>
                                       </div>
                                       <div class="col-lg-4 col-6">
                                           <div class="tab-badges-block text-center">
                                               <img src="<?php echo e(asset('public/website/images/badges/4.png')); ?>" class="img-fluid" alt="">
                                               <div class="tab-badges-heading">Best Seller</div>
                                               <p>3 Courses Sales</p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="instructor-img">
                    <?php if($model->hasUserProfile): ?>
                        <img src="<?php echo e(asset('public/admin/images/profiles')); ?>/<?php echo e($model->hasUserProfile->profile_image); ?>" class="img-fluid user-img-one" alt="">
                    <?php else: ?>
                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                    <?php endif; ?>
                </div>
                <div class="instructor-link">
                   <ul>
                        <li>
                            <a href="<?php echo e($model->hasUserProfile->linked_in_url??''); ?>" target="_blank" title="linkedin">
                                <i data-feather="linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e($model->hasUserProfile->facebook_url??''); ?>" target="_blank" title="facebook">
                                <i data-feather="facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e($model->hasUserProfile->youtube_url??''); ?>" target="_blank" title="youtube">
                                <i data-feather="youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
       </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/user/profile.blade.php ENDPATH**/ ?>