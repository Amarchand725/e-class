<section id="subscription" class="student-main-block">
    <div class="container-xl">
        <h4 class="student-heading">Subscription Bundles</h4>
        <div id="subscription-bundle-view-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = bundles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false"
                        data-pt-title="#prime-next-item-description-block-<?php echo e($key); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="<?php echo e(route('bundle.single', $bundle->slug)); ?>">
                                    <img data-src="<?php echo e(asset('public/admin/bundle/banners')); ?>/<?php echo e($bundle->banner); ?>" alt="bundle" class="img-fluid owl-lazy">
                                </a>
                            </div>

                            <?php if($bundle->is_paid): ?>  
                                <div class="badges bg-priamry offer-badge">
                                    <?php 
                                        $discount = $bundle->retail_price-$bundle->price;
                                        $percentage = $discount/$bundle->retail_price*100;
                                    ?> 
                                    
                                    <span>OFF<span><?php echo e(round($percentage)); ?>%</span></span>
                                </div>
                            <?php endif; ?>

                            <div class="view-user-img">
                                <a href="<?php echo e(route('user.profile', $bundle->hasCreatedBy->slug)); ?>" title="">
                                    <?php if($bundle->hasUserProfile): ?>
                                        <img src="<?php echo e(asset('public/users')); ?>/<?php echo e($bundle->hasCreatedBy->hasUserProfile->profile_image); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/default.png')); ?>" width="50px"  class="img-fluid user-img-one" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading">
                                    <a href="<?php echo e(route('bundle.single', $bundle->slug)); ?>"><?php echo e($bundle->title); ?></a>
                                </div>
                                <div class="user-name">
                                    <h6>By <span><a href="<?php echo e(route('user.profile', $bundle->hasCreatedBy->slug)); ?>"><?php echo e($bundle->hasCreatedBy->name); ?></a></span></h6>
                                </div>
                                <div class="view-footer">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="view-date">
                                                <a href="#"><i data-feather="calendar"></i> <?php echo e(date('d, M-Y', strtotime($bundle->updated_at))); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <div class="rate text-right">
                                                <ul>
                                                    <?php if($bundle->is_paid): ?>
                                                        <li><a><b>$<?php echo e(number_format($bundle->price, 2)); ?></b></a></li>
                                                        <li><a><b><strike>$<?php echo e(number_format($bundle->retail_price, 2)); ?></strike></b></a></li>
                                                    <?php else: ?> 
                                                        <li>FREE</li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-<?php echo e($key); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($bundle->title); ?></h5>
                                <div class="main-des">
                                    <p><?php echo $bundle->short_detail; ?></p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="protip-btn">
                                                <a href="#" class="btn btn-primary">
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Subscribe Now
                                                </a>
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
</section><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/layouts/subscription-bundles.blade.php ENDPATH**/ ?>