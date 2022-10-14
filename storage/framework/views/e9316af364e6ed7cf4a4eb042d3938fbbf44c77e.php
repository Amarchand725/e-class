

<?php $__env->startPush('css'); ?>
<style>
    .wrapQtyBtn {
        display: block;
        float: none;
        margin-top: 5px;
    }
    .qtyField {
        display: inline-block;
        padding-left: 2px;
    }

    .qtyField .label {
        float: left;
        line-height: 30px;
        padding-right: 5px;
    }
    .qtyField span {
        display: inline-block;
        padding: 0;
        border: 0;
    }

    .qtyField .qtyBtn, .qtyField .qty {
        font-size: 11px;
        width: 25px;
        height: 30px;
        display: inline-block;
        padding: 3px;
    }

    .qtyField a .fa {
        font-size: 11px;
    }

    .anm-plus-r:before {
        content: "\eafb";
    }
    .check-btn{
        padding: 10px 10px;
        background: #e64426;
        color: white;
        font-size: 12px;
    }
    .shopping-btn{
        padding: 10px 10px;
        background: #fbb03b;
        color: white;
        font-size: 12px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="cart-block" class="cart-main-block">
        <div class="container-xl">
            <div class="cart-items btm-30">
                <h4 class="cart-heading">
                    <?php if(session('cart')): ?>
                        <?php echo e(count(session('cart'))); ?>

                        Courses in Cart
                    <?php else: ?> 
                        0          	
                        Courses in Cart
                    <?php endif; ?>
                </h4>
                <?php if(!session('cart')): ?>
                    <div class="cart-no-result">
                        <i class="fa fa-shopping-cart"></i>
                        <div class="no-result-courses btm-10">cart empty</div>
                        <div class="recommendation-btn text-white text-center">
                            <a href="<?php echo e(route('home')); ?>" class="btn btn-primary" title="Keep Shopping"><b>Keep Shopping</b></a>
                        </div> 
                    </div>
                <?php else: ?> 
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <?php 
                            $sub_total = 0; 
                            $total = 0;
                            $original_total = 0;
                            ?>
                            <?php if(session('cart')): ?>
                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                        $sub_total += $details['price'] * $details['quantity'];
                                        $total += $sub_total; 
                                        $original_total = $details['retail_price'] * $details['quantity'];
                                    ?>
                                    <div class="cart-add-block">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-6 col-5">
                                                <div class="cart-img">
                                                    <?php if($details['product_type']=='course'): ?>
                                                        <a href="<?php echo e(route('course.single', $details['slug'])); ?>">
                                                            <img src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($details['image']); ?>" class="bg_img img-fluid" alt="Thumbnail">
                                                        </a>
                                                    <?php else: ?> 
                                                        <a href="<?php echo e(route('bundle.single', $details['slug'])); ?>">
                                                            <img src="<?php echo e(asset('public/admin/bundle/banners')); ?>/<?php echo e($details['image']); ?>" class="bg_img img-fluid" alt="Thumbnail">
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-12">
                                                <div class="cart-course-detail">
                                                    <p>
                                                        <?php if($details['product_type']=='course'): ?>
                                                            <a href="<?php echo e(route('course.single', $details['slug'])); ?>"><?php echo e($details['name']); ?></a>
                                                        <?php else: ?> 
                                                            <a href="<?php echo e(route('bundle.single', $details['slug'])); ?>"><?php echo e($details['name']); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                </p>
                                            </div>
                                            
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <div class="cart-actions float-right">
                                                    <span>  
                                                        <button class="cart-remove-btn remove-from-cart display-inline" data-id="<?php echo e($details['slug']); ?>" title="Remove From cart">Remove</button>
                                                    </span>
                                                    <span>
                                                        <form id="wishlist-form" method="post" action="https://eclass.mediacity.co.in/demo/public/show/wishlist/19" data-parsley-validate="" class="form-horizontal form-label-left">
                                                            <input type="hidden" name="_token" value="reuicLxDVZOIOG39noFMY93S1itffqc6wc0aUwRi">

                                                            <input type="hidden" name="user_id" value="13">
                                                            <input type="hidden" name="course_id" value="18">

                                                            <button class="cart-wishlisht-btn" title="Remove to wishlist" type="submit">Remove to Wishlist</button>
                                                        </form>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <div class="wrapQtyBtn">
                                                    <div class="qtyField" data-id="<?php echo e($details['slug']); ?>">
                                                        <a class="qtyBtn minus update-cart" href="javascript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                        <input type="text" id="Quantity" name="quantity" value="<?php echo e($details['quantity']); ?>" class="product-form__input qty">
                                                        <a class="qtyBtn plus update-cart" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <div class="row float-right">
                                                    <div class="col-lg-10 col-10">
                                                        <div class="cart-course-amount">
                                                            <ul>
                                                                <li><a><b>$<?php echo e(number_format($details['price'], 2)); ?></b></a></li>
                                                                <?php if($details['retail_price']): ?>
                                                                    <li><a><b><strike>$<?php echo e(number_format($details['retail_price'], 2)); ?></strike></b></a></li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <div class="row float-right">
                                                    <div class="col-lg-10 col-10">
                                                        <div class="cart-course-amount">
                                                            <ul>
                                                                <li><a><b>$<?php echo e(number_format($sub_total, 2)); ?></b></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="cart-total">
                                <div class="cart-price-detail">
                                    <h4 class="cart-heading">Total:</h4>
                                    <ul>
                                        <li>Total Price<span class="categories-count">$ <?php echo e(number_format($original_total, 2)); ?></span></li>
                                        <?php $offer_discount = $original_total-$total; ?> 
                                        <li>Offer Discount<span class="categories-count">&nbsp;$ <?php echo e(number_format($offer_discount, 2)); ?></span></li>
                                        <li>Coupon Discount
                                            <span class="categories-count"><a href="#" data-toggle="modal" data-target="#myModalCoupon" title="report">ApplyCoupon</a></span>
                                        </li>
                                        <?php $percentage = 0 ?> 
                                        <?php if($offer_discount > 0): ?>
                                            <?php
                                                $percentage = $offer_discount/$total*100;
                                            ?>
                                        <?php endif; ?>
                                        <li>Discount Percent<span class="categories-count"><?php echo e(round($percentage)); ?>% off</span></li>
                                        <hr>
                                        <li class="cart-total-two"><b>Total:<span class="categories-count">$ <?php echo e(number_format($total, 2)); ?></span></b></li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="coupon-apply">
                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <a href="<?php echo e(route('home')); ?>" class="shopping-btn">Continue Shopping</a>
                                        </div>
                                        <div class="col-lg-4 col-12 ml-3">
                                            <a href="<?php echo e(route('checkout')); ?>" class="check-btn">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    
        <!--Model start-->
        <div class="modal fade" id="myModalCoupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Coupon Code</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="box box-primary">
                  <div class="panel panel-sum">
                    <div class="modal-body">
                        <div class="coupon-apply">
                            <form id="cart-form" method="post" action="https://eclass.mediacity.co.in/demo/public/apply/coupon" data-parsley-validate="" class="form-horizontal form-label-left">
                                <input type="hidden" name="_token" value="reuicLxDVZOIOG39noFMY93S1itffqc6wc0aUwRi">
                                
                                <div class="row no-gutters">
                                    <div class="col-lg-9 col-9">
                                        <input type="hidden" name="user_id" value="13">
                                        <input type="text" name="coupon" value="" placeholder="Enter Coupon">
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <button data-purpose="coupon-submit" type="submit" class="btn btn-primary"><span>Apply</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                                            <div class="available-coupon">
                            
                                                                                                                                                                                                                                                                                                                                                                                                                                
                        </div>
                        
    
                    </div>
                  </div>
                </div>
              </div>
            </div> 
        </div>
        <!--Model close -->
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script type="text/javascript">
    function qnt_incre(){
		$(".qtyBtn").on("click", function() {
		  var qtyField = $(this).parent(".qtyField"),
			 oldValue = $(qtyField).find(".qty").val(),
			  newVal = 1;
	
		  if ($(this).is(".plus")) {
			newVal = parseInt(oldValue) + 1;
		  } else if (oldValue > 1) {
			newVal = parseInt(oldValue) - 1;
		  }
		  $(qtyField).find(".qty").val(newVal);
		});
	}
	qnt_incre();
  
    $(".update-cart").on('click',function (e) {
        e.preventDefault();
         var ele = $(this);
        $.ajax({
            url: '<?php echo e(route("update.cart")); ?>',
            method: "patch",
            data: {
                _token: '<?php echo e(csrf_token()); ?>', 
                id: ele.parents(".qtyField").attr("data-id"), 
                quantity: ele.parents(".qtyField").find(".qty").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo e(route("remove.from.cart")); ?>',
                    method: "DELETE",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>', 
                        id: $(this).attr("data-id")
                    },
                    success: function (response) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        window.location.reload();
                    }
                });
            }
        })
    });
  
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/cart/cart.blade.php ENDPATH**/ ?>