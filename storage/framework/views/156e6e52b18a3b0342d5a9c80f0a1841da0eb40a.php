<?php $__env->startPush('css'); ?>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            z-index: -1;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
        .rate .rated{
            color: #c59b08 !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="class-nav" class="class-nav-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="class-nav-heading">
                        <?php if(!empty($model->hasCourse)): ?>
                            <?php echo e($model->hasCourse->title); ?>

                        <?php elseif(!empty($model->hasBundle)): ?>
                            <?php echo e($model->hasBundle->title); ?>

                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="class-button certificate-button">
                        <ul>
                            
                            <li>
                                <?php if($model->hasCourse): ?>
                                    <a href="<?php echo e(route('course.single', $model->product_slug)); ?>" class="course_btn">
                                        Course details <i class="fa fa-chevron-right"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('bundle.single', $model->product_slug)); ?>" class="course_btn">
                                        Bundle details <i class="fa fa-chevron-right"></i>
                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="learning-courses-home" class="learning-courses-home-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="learning-courses-home-video text-white btm-30">
                        <div class="video-item hidden-xs">
                            <div class="video-device">
                                <?php if(!empty($model->hasCourse)): ?>
                                    <img src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($model->hasCourse->thumbnail); ?>" class="img-fluid" alt="Background">
                                <?php elseif(!empty($model->hasBundle)): ?>
                                    <img src="<?php echo e(asset('public/admin/bundle/banners')); ?>/<?php echo e($model->hasBundle->banner); ?>" class="img-fluid" alt="Background">
                                <?php endif; ?>
                                <?php if($model->hasCourse->type=="video"): ?>
                                    <div class="video-preview">
                                        <a href="<?php echo e($model->hasCourse->video_url); ?>" class="btn-video-play "><i class="fa fa-play"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="learning-courses-home-block">
                        <?php if(!empty($model->hasCourse)): ?>
                            <h3 class="learning-courses-home-heading btm-20">
                                <a href="<?php echo e(route('course.single', $model->hasCourse->slug)); ?>" title="heading">
                                    <?php echo e($model->hasCourse->title); ?>

                                </a>
                            </h3>
                            <div class="learning-courses btm-20 display-inline">By <?php echo e($model->hasCourse->hasInstructor->name); ?></div>
                            <br>
                            <div class="learning-courses btm-20"><?php echo e($model->hasCourse->short_description); ?></div>
                        <?php elseif(!empty($model->hasBundle)): ?>
                            <h3 class="learning-courses-home-heading btm-20">
                                <a href="<?php echo e(route('bundle.single', $model->hasBundle->slug)); ?>" title="heading">
                                    <?php echo e($model->hasBundle->title); ?>

                                </a>
                            </h3>
                            <div class="learning-courses btm-20 display-inline">By <?php echo e($model->hasBundle->hasCreatedBy->name); ?></div>
                            <br>
                            <div class="learning-courses btm-20"><?php echo e($model->hasBundle->short_detail); ?></div>
                        <?php endif; ?>

                        <div class="progress-block">
                            <div class="one histo-rate">
                                <span class="bar-block" style="width: 100%">
                                    <span id="bar-one" style="width: 0%" class="bar bar-clr bar-radius">&nbsp;</span>
                                </span>
                            </div>
                            <i class="fa fa-trophy lft-7"></i>
                        </div>

                        <div class="learning-courses-home-btn">
                            <?php if($model->hasCourse->video): ?>
                                <a href="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($model->hasCourse->video); ?>" class=" btn btn-primary" title="Continue">Continue to Lecture</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="learning-courses" class="learning-courses-about-main-block">
        <div class="container-xl">
            <div class="about-block">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link text-center" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Overview</a>
                        <a class="nav-item nav-link text-center active show" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Course Content</a>
                        
                        <a class="nav-item nav-link text-center" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Q &amp; A</a>
                        <a class="nav-item nav-link text-center" id="nav-rating-review-tab" data-toggle="tab" href="#nav-rating-review" role="tab" aria-controls="nav-rating-review" aria-selected="false">Review & Rate</a>
                        
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="overview-block">
                            <h4>Recent Activity</h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="learning-questions-block btm-40">
                                        <h5 class="learning-questions-heading">Recent Questions</h5>

                                        <div class="learning-questions-content text-center">
                                            <h3 class="text-center">No Recent Questions</h3>
                                        </div>
                                        <div class="learning-questions-heading">
                                            <a href="#" id="goTab4" title="browse">Browse questions</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-course-block">
                                <h4 class="content-course">About this course</h4>
                                <p class="btm-40">
                                    <?php if(!empty($model->hasCourse)): ?>
                                        <?php echo e($model->hasCourse->short_description); ?>

                                    <?php elseif(!empty($model->hasBundle)): ?>
                                        <?php echo e($model->hasBundle->short_detail); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                            <hr>
                            <div class="content-course-number-block">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <div class="content-course-number">By the numbers</div>
                                    </div>
                                    <div class="col-lg-6 col-sm-5">
                                        <div class="content-course-number">
                                            <ul>
                                                <li>students enrolled:
                                                    <?php if($model->hasCourse): ?>
                                                        <?php echo e(isset($model->hasCourse->haveEnrolledStudents)?count($model->hasCourse->haveEnrolledStudents):0); ?>

                                                    <?php else: ?>
                                                        <?php echo e(isset($model->hasBundle->haveEnrolledStudents)?count($model->hasCourse->haveEnrolledStudents):0); ?>

                                                    <?php endif; ?>
                                                </li>
                                                <li>Languages: English</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="content-course-number">
                                            <ul>
                                                <?php if(!empty($model->hasCourse)): ?>
                                                    <?php
                                                        $sum_minutes = 0;
                                                        foreach ($model->hasCourse->haveClasses as $course_class){
                                                            $explodedTime = array_map('intval', explode(':', $course_class->lecture_duration ));
                                                            $sum_minutes += $explodedTime[0]*60+$explodedTime[1];
                                                        }
                                                        $lecture_duration_total_time = floor($sum_minutes/60).':'.floor($sum_minutes % 60);
                                                    ?>
                                                <?php elseif(!empty($model->hasBundle)): ?>
                                                    <?php echo e($model->hasBundle->short_detail); ?>

                                                <?php endif; ?>
                                                <li>Classes: <?php echo e(count($model->hasCourse->haveClasses)); ?> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="content-course-number">Description</div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="content-course-number content-course-one">
                                            <?php if(!empty($model->hasCourse)): ?>
                                                <h5 class="content-course-number-heading">About this course</h5>
                                                <p><?php echo e($model->hasCourse->short_description); ?></p>
                                                <h5 class="content-course-number-heading">Description</h5>
                                                <p><?php echo $model->hasCourse->full_description; ?></p>
                                            <?php elseif(!empty($model->hasBundle)): ?>
                                                <h5 class="content-course-number-heading">About this Bundle</h5>
                                                <p><?php echo e($model->hasBundle->short_detail); ?></p>
                                                <h5 class="content-course-number-heading">Description</h5>
                                                <p><?php echo $model->hasBundle->details; ?>/p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="content-course-number">Instructor</div>
                                    </div>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="content-course-number content-course-number-one">
                                            <div class="content-img-block btm-20">
                                                <div class="content-img">
                                                    <a href="<?php echo e(route('user.profile', $model->hasCourse->hasInstructor->slug)); ?>" title="">
                                                        <?php if($model->hasCourse->hasInstructor->hasUserProfile->profile_image): ?>
                                                            <img src="<?php echo e(asset('public/users')); ?>/<?php echo e($model->hasCourse->hasInstructor->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="content-img-dtl">
                                                    <div class="profile">
                                                        <a href="<?php echo e(route('user.profile', $model->hasCourse->hasInstructor->slug)); ?>" title="profile"><?php echo e($model->hasCourse->hasInstructor->name); ?> </a>
                                                    </div>
                                                    <p><?php echo e($model->hasCourse->hasInstructor->email); ?></p>
                                                </div>
                                            </div>
                                            <ul>
                                                <li class="rgt-10"><a href="<?php echo e($model->hasCourse->hasInstructor->hasUserProfile->facebook_url??''); ?>" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li class="rgt-10"><a href="<?php echo e($model->hasCourse->hasInstructor->hasUserProfile->linked_in_url??''); ?>" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                <li class="rgt-10"><a href="<?php echo e($model->hasCourse->hasInstructor->hasUserProfile->twitter_url??''); ?>" target="_blank" title="twitter"><i class="fa fa-youtube"></i></a></li>
                                            </ul>
                                            <p>
                                                <span style="font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">&nbsp;<?php echo $model->hasCourse->hasInstructor->hasUserProfile->details; ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="profile-block">
                            <?php if(Auth::check()): ?>
                                <?php $ifenrolled = App\Models\EnrollStudent::where('product_slug', $model->product_slug)->where('user_slug', Auth::user()->slug)->first(); ?>
                            <?php endif; ?>
                            <div id="ck-button">
                                <label>
                                    <input type="checkbox" <?php if(isset($ifenrolled->is_completed) && $ifenrolled->is_completed): ?> checked disabled <?php endif; ?> name="select-all" class="hidden" id="select-all"><span>Select All</span>
                                </label>
                            </div>

                            <div id="accordion" class="second-accordion">
                                <?php if(!empty($model->hasCourse)): ?>
                                    <?php $counter = 0 ?>
                                    <?php $__currentLoopData = $model->hasCourse->haveChapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $counter++ ?>
                                        <div class="card btm-10">
                                            <div class="card-header" id="headingChapter44">
                                                <div class="mb-0">
                                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseChapter-<?php echo e($chapter->name); ?>" aria-expanded="false" aria-controls="collapseChapter">
                                                        <div class="course-check-table">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="10px">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input filled-in material-checkbox-input" <?php if($ifenrolled->is_completed): ?> checked disabled <?php endif; ?> type="checkbox" name="checked[]" value="44" id="checkbox44">
                                                                                <label class="form-check-label" for="invalidCheck"></label>
                                                                            </div>
                                                                        </td>

                                                                        <td>
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-6">
                                                                                    <div class="section">Chapter: <?php echo e($counter); ?></div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-6">
                                                                                    <div class="section-dividation text-right">
                                                                                        <?php echo e(count($chapter->haveChapterClasses)); ?> Classes
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-10 col-8">
                                                                                    <div class="profile-heading">Chapter Title: <?php echo e($chapter->name); ?></div>
                                                                                </div>
                                                                                <div class="col-lg-2 col-4">
                                                                                    <div class="text-right">
                                                                                        <?php
                                                                                            $sum_chapter_class_minutes = 0;
                                                                                            foreach ($chapter->haveChapterClasses as $chapter_class){
                                                                                                $explodedTime = array_map('intval', explode(':', $chapter_class->lecture_duration ));
                                                                                                $sum_chapter_class_minutes += $explodedTime[0]*60+$explodedTime[1];
                                                                                            }
                                                                                            $chapter_total_lectures_duration = floor($sum_chapter_class_minutes/60).':'.floor($sum_chapter_class_minutes % 60);
                                                                                        ?>
                                                                                        <?php echo e($chapter_total_lectures_duration); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseChapter-<?php echo e($chapter->name); ?>" class="collapse" aria-labelledby="headingChapter" data-parent="#accordion" style="">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4"><i class="fa fa-arrow-right" aria-hidden="true"></i> Chapter Topics</td>
                                                            </tr>
                                                            <?php $bool = true; ?>
                                                            <?php $__currentLoopData = $chapter->haveChapterClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <?php if($chapter_class->type=="Video"): ?>
                                                                        <td class="class-type">
                                                                            <a href="<?php echo e(asset('public/admin/course_class/lectures')); ?>/<?php echo e($chapter_class->lecture); ?>" title="Course">
                                                                                <i class="fa fa-play-circle"></i>&nbsp; <?php echo e($chapter_class->title); ?>

                                                                            </a>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td class="class-type">
                                                                            <a href="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($chapter_class->attachment); ?>" title="Course" download>
                                                                                <i class="fa fa-circle"></i>&nbsp; <?php echo e($chapter_class->title); ?>

                                                                            </a>
                                                                        </td>
                                                                    <?php endif; ?>

                                                                    <td class="class-name">
                                                                        <div class="koh-tab-content">
                                                                            <div class="koh-tab-content-body">
                                                                                <div class="koh-faq">
                                                                                    <div class="koh-faq-question">
                                                                                        <span class="koh-faq-question-span">
                                                                                            <?php if(!empty($model->hasCourse)): ?>
                                                                                                <?php echo e($model->hasCourse->title); ?>

                                                                                            <?php elseif(!empty($model->hasBundle)): ?>
                                                                                                <?php echo e($model->hasBundle->title); ?>

                                                                                            <?php endif; ?>
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="koh-faq-answer"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td class="class-size txt-rgt">
                                                                        <?php
                                                                            $explodedTime = array_map('intval', explode(':', $chapter_class->lecture_duration ));
                                                                            $sum_chapter_class_minutes = $explodedTime[0]*60+$explodedTime[1];
                                                                            $chapter_total_lectures_duration = floor($sum_chapter_class_minutes/60).':'.floor($sum_chapter_class_minutes % 60);
                                                                        ?>
                                                                        <?php echo e($chapter_total_lectures_duration); ?>

                                                                    </td>
                                                                </tr>

                                                                <!-- Liv classes -->
                                                                <?php if($bool): ?>
                                                                    <?php $bool = false; ?>
                                                                    <tr>
                                                                        <td colspan="4"><i class="fa fa-arrow-right" aria-hidden="true"></i> Liv Classes</td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <?php $__currentLoopData = $chapter_class->haveLiveClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liv_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td class="class-type">
                                                                            <a href="<?php echo e(asset('public/admin/images/meetings')); ?>/<?php echo e($liv_class->thumbnail); ?>" title="Course" download>
                                                                                <i class="fa fa-circle"></i>&nbsp; <?php echo e($liv_class->topic); ?>

                                                                            </a>
                                                                        </td>

                                                                        <td class="class-name"><?php echo e(date('d, M Y', strtotime($liv_class->start_date))); ?> | <?php echo e(date('h:i:s A', strtotime($liv_class->start_time))); ?></td>

                                                                        <td class="class-size txt-rgt">
                                                                            <a href="<?php echo e(url('/')); ?>/<?php echo e($liv_class->meeting_url); ?>" class="btn btn-success btn-sm">Go to Liv Class</a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <!-- Liv classes -->
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td colspan="2"><i class="fa fa-arrow-right" aria-hidden="true"></i> Black Board (Chat)</td>
                                                                <td class="class-size txt-rgt">
                                                                    <a href="<?php echo e(route('chapter.chat', $chapter->id)); ?>" target="_blank" title="Black Board Group Chat" class="btn btn-success bg-transparent btn-sm">Go to Chat</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php if(isset($ifenrolled) && !empty($ifenrolled) && $ifenrolled->is_completed==0): ?>
                                        <div class="mark-read-button">
                                            <button type="button" data-product-slug="<?php echo e($model->product_slug); ?>" class="btn btn-md btn-primary mark-complete-course-btn">
                                                Mark as Complete
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-live" role="tabpanel" aria-labelledby="nav-live-tab">
                        <div id="about-product" class="about-product-main-block"></div>
                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="learning-contact-block">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-search-block btm-40">
                                        <div class="learning-contact-search">
                                            <h4 class="question-text">No Recent Questions</h4>
                                        </div>
                                        <div class="learning-contact-btn">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Ask a new question
                                            </button>
                                        </div>
                                    </div>

                                    <div id="accordion" class="second-accordion"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-announcement" role="tabpanel" aria-labelledby="nav-announcement-tab">
                        <div class="learning-announcement-null text-center">
                            <div class="offset-lg-2 col-lg-8">
                                <h1>No announcements</h1>
                                <p>No announcement detail</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="nav-rating-review" role="tabpanel" aria-labelledby="nav-rating-review-tab">
                        <div class="overview-block">
                            <h4>Review & Rate </h4>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="learning-questions-block btm-40">
                                        <h5 class="learning-questions-heading">Review & Rate</h5>
                                        <div class="learning-questions-content">
                                            <div class="form-group">
                                                <label for="">Rate</label><br />
                                                <div class="rate">
                                                    <?php for($i=5; $i>=1; $i--): ?>
                                                        <?php if(isset($model->hasProductRating->rate) && $model->hasProductRating->rate>=$i): ?>
                                                            <input type="radio" class="rating rate-value" id="star<?php echo e($i); ?>" name="rate" value="<?php echo e($i); ?>" />
                                                            <label class="rated" for="star<?php echo e($i); ?>" title="<?php echo e($i); ?> Stars">5 stars</label>
                                                        <?php else: ?>
                                                            <input type="radio" class="rating" id="star<?php echo e($i); ?>" name="rate" value="<?php echo e($i); ?>" />
                                                            <label for="star<?php echo e($i); ?>" title="<?php echo e($i); ?> Stars">5 stars</label>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <br /><br />
                                            <div class="form-group">
                                                <label for="product-review">Review</label>
                                                <textarea name="review" id="product-review" rows="5" class="form-control" placeholder="Enter review here"><?php if($model->hasProductRating): ?> <?php echo e($model->hasProductRating->review); ?> <?php endif; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success rate-btn" data-product-slug="<?php echo e($model->product_slug); ?>">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('click', '.rating', function(){
            $(this).parents('.rate').find('.rate-value').removeClass("rate-value");
            $(this).addClass('rate-value');
        });
        $(document).on('click', '.rate-btn', function(){
            var rating_value = $('.rate-value').val();
            var review = $('#product-review').val();
            var product_slug = $(this).attr('data-product-slug');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "<?php echo e(route('user.rate')); ?>",
                data : {product_slug:product_slug, rating_value:rating_value, review:review},
                type : 'POST',
                success : function(response){
                    if(response=='success'){
                        Swal.fire(
                            'Rated!',
                            'You have rated successfully Thanks.',
                            'success',
                        );
                    }else{
                        Swal.fire(
                            'Error!',
                            'Sorry something went wrong.',
                            'warning',
                        );
                    }
                }
            });
        });

        $(document).on('click', '.mark-complete-course-btn', function(){
            var product_slug = $(this).attr('data-product-slug');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to complete this course?!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, complete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : "<?php echo e(route('user.complete-course')); ?>",
                        data : {product_slug:product_slug},
                        type : 'POST',
                        success : function(response){
                            if(response=='success'){
                                Swal.fire(
                                    'Completed!',
                                    'Your have completed successfully.',
                                    'success',
                                );

                                location.reload();
                            }else{
                                Swal.fire(
                                    'Error!',
                                    'Sorry something went wrong.',
                                    'warning',
                                );
                            }
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-learning-system\resources\views/web-views/website/user/my-course-details.blade.php ENDPATH**/ ?>