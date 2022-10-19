

<?php $__env->startPush('css'); ?>
    <style>
        .wrapper-custom .panel-title a {
            color: var(--text-dark-grey-color);
            text-align: center;
        }
    </style>
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
                    <div class="col-lg-6 col-md-6">
                        <div class="bredcrumb-dtl">
                            <h1><?php echo e($category->name); ?></h1>
                            <?php if(Session()->has('success')): ?>
                                <div class="callout callout-success">
                                    <div class="alert alert-success" role="alert">
                                        Product added to cart successfully
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="categories" class="categories-main-block categories-main-block-one">
        <div class="container-xl">
            <h4 class="categories-heading">SubCategories</h4>
            <div class="row">
                <?php $__currentLoopData = $category->haveChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="categories-block">
                            <div class="categories-block-one">
                                <ul>
                                    <li>
                                        <a href="#" title="Web Devlopment"><?php echo $child->icon; ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('user.category-wise-course', $child->slug)); ?>"><?php echo e($child->name); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <section id="categories-popularity" class="categories-popularity-main-block category-filters">
        <div class="container-xl">
            <h4 class="btm-40">Devlopment Courses</h4>
            
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" href="#collapseOne" data-closetxt="Stäng block" data-opentxt="Visa innehåll">
                                <a class="card-title">
                                    Categories
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="">
                                <div class="card-body">
                                    <div class="wrapper-custom center-block">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <?php $__currentLoopData = mainCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading active" role="tab" id="headingOnexxx">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-<?php echo e($category->slug); ?>" aria-expanded="false" aria-controls="collapseOnexxx">
                                                                <?php echo $category->icon; ?> 
                                                                <label class="prime-cat" data-url="<?php echo e(route('user.category-wise-course', $category->slug)); ?>"><?php echo e($category->name); ?></label>
                                                                <?php if(count($category->haveChildren)): ?>
                                                                    <i class="fa fa-chevron-down pull-right"></i>
                                                                <?php endif; ?>
                                                            </a>
                                                        </h4>
                                                    </div>

                                                    <div id="collapseOne-<?php echo e($category->slug); ?>" class="subcate-collapse panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOnexxx">
                                                        <div class="panel-body">
                                                            <?php if(count($category->haveChildren)): ?>
                                                                <?php echo $__env->make('web-views.website.category.manage-child',['childs' => $category->haveChildren], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo" data-closetxt="Stäng block" data-opentxt="Visa innehåll">
                                <a class="card-title">
                                    Languages
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse show" data-parent="">
                                <div class="card-body">
                                    <div class="categories-tags">
                                        <div class="categories-content-one">
                                            <div class="categories-tags-content-one">
                                                <ul>
                                                    <li>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input lang" checked type="radio" name="lang" id="flexRadioDefault1" value="1">
                                                            <label class="form-check-label" for="inlineCheckbox1">English</label>
                                                        </div>
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
                <div class="col-lg-9 col-md-8">
                    <div id="posts" class="students-bought btm-30">
                        <div class="row">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item col-12">
                                    <div class="course-bought-block protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block9">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 course-bought-block-one">
                                                
                                                <a href="<?php echo e(route('course.single', $model->slug)); ?>">
                                                    <img src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($model->thumbnail); ?>" class="img-fluid user-img-one" alt="">
                                                </a>
                                                <div class="img-wishlist img-wishlist-btm">
                                                    <div class="protip-wishlist">
                                                        <ul>
                                                            

                                                            <li class="protip-wish-btn">
                                                                <a href="<?php echo e(route('add.to.cart', $model->slug)); ?>" class="wishlisht-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-7 col-md-6 categories-popularity-dtl-block">
                                                <div class="categories-popularity-dtl">
                                                    <div class="view-heading btm-10">
                                                        <a href="<?php echo e(route('course.single', $model->slug)); ?>">
                                                            <?php echo e($model->title); ?>

                                                        </a>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polygon points="10 8 16 12 10 16 10 8"></polygon>
                                                            </svg>
                                                            <div class="class-des">
                                                                <?php 
                                                                    $classes = 0;
                                                                    $sum_chapter_class_minutes = 0;
                                                                    foreach ($model->haveChapters as $key => $chapter) {
                                                                        $classes += count($chapter->haveChapterClasses);
                                                                        foreach ($chapter->haveChapterClasses as $chapter_class){
                                                                            $explodedTime = array_map('intval', explode(':', $chapter_class->lecture_duration ));
                                                                            $sum_chapter_class_minutes += $explodedTime[0]*60+$explodedTime[1];
                                                                        }
                                                                    }
                                                                    $chapter_total_lectures_duration = floor($sum_chapter_class_minutes/60).':'.floor($sum_chapter_class_minutes % 60);
                                                                ?> 
                                                                <?php echo e($classes); ?> Classes
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg>
                                                            <div class="time-des">
                                                                <span class="">
                                                                    <?php echo e($chapter_total_lectures_duration); ?>

                                                                </span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="12" cy="7" r="4"></circle>
                                                            </svg>
                                                            <div class="student-des">
                                                                1 Students
                                                            </div>
                                                        </li>
                                                        <li></li>
                                                    </ul>
                                                    <p><?php echo e($model->short_description); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-3 course-rate-block">
                                                <div class="rate text-right">
                                                    <ul>
                                                        <?php if($model->is_paid): ?>     
                                                            <li class="rate-r">$ <?php echo e(number_format($model->price, 2)); ?></li>
                                                            <?php if($model->discount != NULL): ?>
                                                                <li class="rate-r"><span><s>$<?php echo e(number_format($model->retail_price, 2)); ?></s></span></li>
                                                            <?php endif; ?>
                                                        <?php else: ?> 
                                                            <li class="rate-r">FREE</li>
                                                        <?php endif; ?>
                                                    </ul>
                                                    <div class="rating">
                                                        <ul>
                                                            <li>
                                                                <div class="pull-left">
                                                                    <p>No Rating</p>
                                                                </div>
                                                            </li>

                                                            <li class="reviews">
                                                                (0 Reviews)
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="top-20"></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/category/category-wise-list.blade.php ENDPATH**/ ?>