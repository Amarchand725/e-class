<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Login</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/datepicker3.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/dataTables.bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/_all-skins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('public/admin/css/toastr.min.css')}}">
	<style>
		.login-page {
			background: #333;
		}
		.login-logo {
			color: #fff;
		}
	</style>
    @stack('css')
</head>

<body class="hold-transition login-page sidebar-mini">

@yield('content')

<script src="{{ asset('public/admin/js/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('public/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.inputmask.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('public/admin/js/moment.min.js') }}"></script>
<script src="{{ asset('public/admin/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('public/admin/js/icheck.min.js') }}"></script>
<script src="{{ asset('public/admin/js/fastclick.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/admin/js/app.min.js') }}"></script>
<script src="{{ asset('public/admin/js/demo.js') }}"></script>
<script src="{{asset('public/admin/js/toastr.min.js')}}"></script>
@stack('js')
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>
</html>
