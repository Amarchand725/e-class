

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="checkout-block" class="checkout-main-block">
        <div class="container">
            <div class="cart-items btm-30">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <h4 class="cart-heading bg-white">Your Items (
                            <?php if(session('cart')): ?>
                                <?php echo e(count(session('cart'))); ?>         	
                            <?php endif; ?>
                        ) </h4>
                        <hr>
                        <div class="checkout-items">
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
                                    <div class="row btm-10">
                                        <div class="col-lg-3 col-4">
                                            <div class="checkout-course-img">
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
                                        <div class="col-lg-9 col-8">
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        <?php if($details['product_type']=='course'): ?>
                                                            <a href="<?php echo e(route('course.single', $details['slug'])); ?>"><?php echo e($details['name']); ?></a>
                                                        <?php else: ?> 
                                                            <a href="<?php echo e(route('bundle.single', $details['slug'])); ?>"><?php echo e($details['name']); ?></a>
                                                        <?php endif; ?>
                                                    </td>
                                                
                                                    <td>
                                                        <ul>
                                                            <li class="checkout-course-price">
                                                                <b>$ <?php echo e(number_format($details['price'], 2)); ?></b>  
                                                            </li>
                                                            <li>
                                                                <s>$<?php echo e(number_format($details['retail_price'], 2)); ?></s>
                                                            </li>	
                                                        </ul>
                                                    </td>
                                               
                                                    <td><?php echo e($details['quantity']); ?></td>
                                                
                                                    <td>$ <?php echo e(number_format($sub_total, 2)); ?></td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <hr />
                                <div class="row btm-10">
                                    <div class="col-lg 5"></div>
                                    <div class="col-lg-7 col-4">
                                        <table class="table">
                                            <tr>
                                                <th>Total</th>
                                                <td>$ <?php echo e(number_format($original_total, 2)); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Offer Discount</th>
                                                <?php $offer_discount = $original_total-$total; ?> 
                                                <td>$ <?php echo e(number_format($offer_discount, 2)); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Grand Total </th>
                                                <td>$ <?php echo e(number_format($total, 2)); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="checkout-pricelist">
                            <ul>
                                <?php if($offer_discount): ?>
                                    <?php
                                        $percentage = $offer_discount/$total*100;
                                    ?>
                                <?php endif; ?>
                                <li><div class="checkout-percent"><?php echo e(round($percentage)); ?>% Off</div></li>	            		
                            </ul>
                        </div>
                                            
                        <div class="payment-gateways">
                            <div id="accordion" class="second-accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="panel-title">
                                            <label for="r11">
                                                <input type="radio" id="r11" name="occupation" value="Working" required="">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed"></a>
                                                <img src="<?php echo e(asset('public/website/images/logo/paypal-logo.png')); ?>" class="img-fluid" alt="course">
                                            </label>
                                        </div>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse in collapse" style="">
                                        <div class="card-body">
                                            <div class="payment-proceed-btn">
                                                <form action="https://eclass.mediacity.co.in/demo/public/paywithpaypal" method="POST" autocomplete="off">
                                                    <input type="hidden" name="_token" value="2F4TQz61xNgzoTjWAjiNBkHaavE6cjI867yEnMmP">		                            			
                                                    <input type="hidden" name="amount" value="eyJpdiI6InBGcDlYQTFiWWtwQjJ1bDVqL2REYXc9PSIsInZhbHVlIjoiWkxWcEUvUUVEWU92TkJveXJtVWhEdz09IiwibWFjIjoiZDc0YTU3ZDExNzFjOTA1ZjliODRhMWZjZDZjMjk2NzgxNmVkODAxMzA0YWVjNzEyMGI5ZDM4YmI3ZTFjNGE1MCIsInRhZyI6IiJ9">
                                                    <button class="btn btn-primary" title="checkout" type="submit">Proceed</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <div class="panel-title">
                                            <label for="r16">
                                              <input type="radio" id="r16" name="occupation" value="Working" required="">
                                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" class="collapsed"></a>
                                              <img src="<?php echo e(asset('public/website/images/logo/stripe-logo.png')); ?>" class="img-fluid" alt="course"> 
                                            </label>
                                            
                                        </div>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse in collapse" style="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default credit-card-box">
                                                        <div class="panel-heading display-table" >
                                                            <div class="row display-tr" >
                                                                <div class='form-row row'>
                                                                    <div class='col-sm-6 form-group'>
                                                                        <h3 class="panel-title display-td" style="margin-left: 15px;">Payment Details</h3>
                                                                    </div>
                                                                    <div class='col-sm-6 form-group'>
                                                                        <img class="img-responsive pull-right" style="margin-left: 25px; margin-top: -13px;" width="300px" src="<?php echo e(asset('public/website/images/logo/stripe-payment-details-logo.png')); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>                    
                                                        </div>
                                                        <div class="panel-body">
                                                            <?php if(Session::has('success')): ?>
                                                                <div class="alert alert-success text-center">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                                    <p><?php echo e(Session::get('success')); ?></p>
                                                                </div>
                                                            <?php endif; ?>
                                        
                                                            <form 
                                                                    role="form" 
                                                                    action="<?php echo e(route('complete-orrder')); ?>" 
                                                                    method="post" 
                                                                    class="require-validation"
                                                                    data-cc-on-file="false"
                                                                    data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>"
                                                                    id="payment-form">
                                                                
                                                                <?php echo csrf_field(); ?>
                                        
                                                                <div class='form-row row'>
                                                                    <div class='col-sm-12 form-group required'>
                                                                        <label class='control-label'>Name on Card</label> 
                                                                        <input class='form-control' size='4' type='text' id="card" placeholder="Enter name on card">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class='form-row row'>
                                                                    <div class='col-sm-12 form-group required'>
                                                                        <label class='control-label'>Card Number</label> 
                                                                        <input autocomplete='off' class='form-control card-number' size='20' type='text' placeholder="Enter card number">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class='form-row row'>
                                                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                                            type='text'>
                                                                    </div>
                                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                        <label class='control-label'>Expiration Month</label> <input
                                                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                                                            type='text'>
                                                                    </div>
                                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                        <label class='control-label'>Expiration Year</label> <input
                                                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                                            type='text'>
                                                                    </div>
                                                                </div>
                                        
                                                                <div class='form-row row'>
                                                                    <div class='col-md-12 error form-group hide'>
                                                                        <div class='alert-danger alert'>Please correct the errors and try
                                                                            again.</div>
                                                                    </div>
                                                                </div>
                                        
                                                                <div class='form-row row'>
                                                                    <div class='col-sm-12 form-group required'>
                                                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($<?php echo e($total); ?>)</button>
                                                                    </div>
                                                                </div>
                                                            </form>
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
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
        
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
                $errorMessage.addClass('hide');
        
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
                });
        
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                    }
            });
        
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    card = $('#card').val();
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.append("<input type='hidden' name='nameOnCard' value='" + card + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>					        					                    
<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/cart/checkout.blade.php ENDPATH**/ ?>