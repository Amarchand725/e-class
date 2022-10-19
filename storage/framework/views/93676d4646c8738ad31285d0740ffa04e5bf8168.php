<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Login</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/ionicons.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/datepicker3.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/all.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/select2.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/dataTables.bootstrap.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/AdminLTE.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/_all-skins.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/css/toastr.min.css')); ?>">
	<style>
		.login-page {
			background: #333;
		}
		.login-logo {
			color: #fff;
		}
	</style>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body class="hold-transition login-page sidebar-mini">

<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo e(asset('public/admin/js/jquery-2.2.3.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/jquery.inputmask.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/jquery.inputmask.date.extensions.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/jquery.inputmask.extensions.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/icheck.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/fastclick.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/app.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/toastr.min.js')); ?>"></script>
<?php echo $__env->yieldPushContent('js'); ?>
<script>
    <?php if(Session::has('message')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("<?php echo e(session('message')); ?>");
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

    <?php if(Session::has('info')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("<?php echo e(session('info')); ?>");
    <?php endif; ?>

    <?php if(Session::has('warning')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("<?php echo e(session('warning')); ?>");
    <?php endif; ?>
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\e-class\resources\views/auth/admin-app.blade.php ENDPATH**/ ?>