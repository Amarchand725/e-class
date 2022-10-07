

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="institute-detail" class="institute-detail-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="institute-detail-block text-center">
                        <div class="institute-detail-img">
                            <img src="<?php echo e(asset('public/admin/images/institutes')); ?>/<?php echo e($model->logo); ?>" alt="course" class="img-fluid">
                        </div>
                        <div class="institute-dtl">
                            <div class="institute-content-block">
                                <h2 class="institute-content-title"><?php echo e($model->name); ?></h2>
                                <div class="institute-mobile"><?php echo e($model->mobile); ?></div>
                                <div class="institute-email">
                                    <a href="#" class="__cf_email__" data-cfemail="<?php echo e($model->email); ?>">[<?php echo e($model->email); ?>]</a>
                                </div>
                                <div class="institute-address"><?php echo e($model->address); ?></div>
                                <div class="institute-status mt-2 mb-2">
                                    <?php if($model->status): ?>
                                        <span class="badge badge-primary">Active</span>
                                    <?php else: ?> 
                                        <span class="badge badge-danger">Deactive</span>
                                    <?php endif; ?>
                                </div>
                                <div class="institute-verified mt-2 mb-2">
                                    <?php if($model->is_verified): ?>
                                        <span class="badge badge-success">Verified </span>
                                    <?php else: ?> 
                                        <span class="badge badge-danger">Not verified </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="institute-detail-tab">
                        <ul class="nav nav-tabs" id="tabs-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false">Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="true">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="skill-tab" data-toggle="tab" href="#skill" role="tab" aria-controls="skill" aria-selected="true">Skill</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="affiliated-tab" data-toggle="tab" href="#affiliated" role="tab" aria-controls="affiliated" aria-selected="true">Affiliated</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane active show" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                <p><?php echo $model->about; ?></p>
                            </div>
                            
                            <div class="tab-pane" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                <div class="about-instructor">
                                    <div class="row">
                                        <?php if($model->haveCourses): ?>
                                            <?php $__currentLoopData = $model->haveCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-6">
                                                    <div class="student-view-block">
                                                        <div class="view-block">
                                                            <div class="view-img">
                                                                <a href="<?php echo e(route('course.single', $single_course->slug)); ?>">
                                                                    <img src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($single_course->thumbnail); ?>" alt="course" class="img-fluid">
                                                                </a>
                                                            </div>
                                                            <div class="view-user-img">
                                                                <a href="<?php echo e(route('user.profile', $single_course->hasCreatedBy->slug)); ?>" title="">
                                                                    <?php if($single_course->hasUserProfile): ?>
                                                                        <img src="<?php echo e(asset('public/admin/images/profiles')); ?>/<?php echo e($single_course->hasUserProfile->profile_image); ?>" class="img-fluid user-img-one" alt="">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="view-dtl">
                                                                <div class="view-heading">
                                                                    <a href="#"><?php echo e($single_course->title); ?></a>
                                                                </div>
                                                                <div class="user-name">
                                                                    <h6>By <span><?php echo e($single_course->hasCreatedBy->roles->first()->name); ?></span></h6>
                                                                </div>                                           
                                                                <div class="rating">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="pull-left">No Rating</div>
                                                                        </li>
                                                                        <li class="reviews">
                                                                            (0 Reviews)
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="view-footer">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                            <div class="count-user">
                                                                                <i data-feather="user"></i><span>1</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                            <div class="rate text-right">
                                                                                <ul>
                                                                                    <li><a><b>Free</b></a></li>
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
                                        <?php endif; ?>
                                    </div>
                                </div>  
                            </div>
                            
                            <div class="tab-pane" id="skill" role="tabpanel" aria-labelledby="skill-tab">
                                <ul>
                                    <?php $skills = json_decode($model->skill) ?> 
                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><span class="badge badge-info"><?php echo e($skill); ?></span></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="tab-pane" id="affiliated" role="tabpanel" aria-labelledby="affiliated-tab">
                                <ul>
                                    <li><span class="badge badge-info"><?php echo e($model->affilated_by); ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/institutes/single.blade.php ENDPATH**/ ?>