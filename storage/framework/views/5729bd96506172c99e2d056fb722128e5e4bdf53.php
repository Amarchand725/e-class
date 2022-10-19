

<?php $__env->startSection('content'); ?>
    <div class="login-box">
        <div class="login-logo">
            <b>Admin Panel</b>
        </div>
        <div class="card-body login-box-body">
            <form method="POST" action="<?php echo e(route('admin.login')); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="user_type" value="Admin">
                <div class="form-group has-feedback">
                    <label for="email" class="col-md-6 col-form-label"><?php echo e(__('Email Address')); ?></label>
                    <input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red"><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group has-feedback">
                    <label for="password" class="col-md-6 col-form-label text-md-end"><?php echo e(__('Password')); ?></label>
                    <input class="form-control" placeholder="Password" id="input-password" name="password" type="password" autocomplete="off" value="">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="show-password">

                        <label class="form-check-label" for="show-password">
                            <?php echo e(__('Show')); ?>

                        </label>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red"><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                            <label class="form-check-label" for="remember">
                                <?php echo e(__('Remember Me')); ?>

                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(__('Login')); ?>

                        </button>

                        <a class="btn btn-link" href="<?php echo e(route('admin.forgot_password')); ?>">
                            <?php echo e(__('Forgot Your Password?')); ?>

                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script type='text/javascript'>
        $(document).ready(function(){
            $('#show-password').click(function(){
                $(this).is(':checked') ? $('#input-password').attr('type', 'text') : $('#input-password').attr('type', 'password');
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('auth.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>