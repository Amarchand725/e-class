

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
                    <div class="col-lg-6 col-md-6">
                        <div class="bredcrumb-dtl">
                            <h1 class="wishlist-home-heading text-white">Purchase History</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="purchase-block" class="purchase-main-block">
        <div class="container-xl">
            <div class="purchase-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="purchase-history-heading">Purchase History</th>
                            <th class="purchase-text">Enroll on</th>
                            <th class="purchase-text">Enroll End</th>
                            <th class="purchase-text">Payment Mode</th>
                            <th class="purchase-text">Total Price</th>
                            <th class="purchase-text">Payment Status</th>
                            <th class="purchase-text">Actions</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="purchase-history-course-img">
                                        <?php if($order->hasOrderDetail->hasCourse): ?>
                                            <a href="<?php echo e(route('course.single', $order->hasOrderDetail->hasCourse->slug)); ?>">
                                                <img src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($order->hasOrderDetail->hasCourse->thumbnail); ?>" class="img-fluid" alt="course">
                                            </a>                               
                                        <?php elseif($order->hasOrderDetail->hasBundle): ?> 
                                            <a href="<?php echo e(route('bundle.single', $order->hasOrderDetail->hasBundle->slug)); ?>">
                                                <img src="<?php echo e(asset('public/admin/bundle/banners')); ?>/<?php echo e($order->hasOrderDetail->hasBundle->thumbnail); ?>" class="img-fluid" alt="course">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="purchase-history-course-title">
                                        <?php if($order->hasOrderDetail->hasCourse): ?>
                                            <a href="<?php echo e(route('course.single', $order->hasOrderDetail->hasCourse->slug)); ?>"><?php echo e($order->hasOrderDetail->hasCourse->title); ?></a>
                                        <?php elseif($order->hasOrderDetail->hasBundle): ?>
                                            <a href="<?php echo e(route('bundle.single', $order->hasOrderDetail->hasBundle->slug)); ?>"><?php echo e($order->hasOrderDetail->hasBundle->title); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="purchase-text">18th October 2022</div>			                   	
                                </td>
                                <td>
                                    <div class="purchase-text">
                                        -
                                    </div>
                                </td>
                                <td>   
                                    <div class="purchase-text"></div>
                                </td>
                                <td>
                                    <div class="purchase-text">
                                        <b>Free</b>
                                    </div>
                                </td>
                                <td>
                                    <div class="purchase-text">
                                        Received
                                    </div>
                                </td>
                                <td>
                                    <div class="invoice-btn">
                                        <a href="<?php echo e(route('order.invoice', $order->order_number)); ?>" class="btn btn-secondary">
                                            Invoice
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>  
                </table>
            </div>
        </div>
    </section>
    <section id="purchase-block" class="purchase-main-block">
        <div class="container-xl">
            <div class="purchase-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="purchase-history-heading">Refunds</th>
                            <th class="purchase-text">Date</th>
                            <th class="purchase-text">Amount</th>
                            <th class="purchase-text">Payment Mode</th>
                            <th class="purchase-text">Payment Status</th>
                            <th class="purchase-text">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/user/purchase-history.blade.php ENDPATH**/ ?>