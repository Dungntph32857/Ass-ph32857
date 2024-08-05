<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- {{asset('theme/admin/')}}   --}}
	<!-- App favicon  -->
	<link rel="shortcut icon" href="{{ asset('theme/admin/assets/images/favicon.ico') }}">



	@yield('style-libs')
	<!-- Layout config Js -->
	<script src="{{ asset('theme/admin/assets/js/layout.js') }}"></script>
	<!-- Bootstrap Css -->
	<link href="{{ asset('theme/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="{{ asset('theme/admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="{{ asset('theme/admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- custom Css-->
	<link href="{{ asset('theme/admin/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

	@yield('scripts')
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center mt-4">@yield('title')</h1>
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>

<script>
	const PATH_ROOT ='{{asset('theme/admin')}}';
</script>
    <!-- JAVASCRIPT -->
    <script src="{{asset('theme/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('theme/admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('theme/admin/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('theme/admin/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('theme/admin/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('theme/admin/assets/js/plugins.js')}}"></script>

   @yield('script-libs')
    <!-- App js -->
    <script src="{{asset('theme/admin/assets/js/app.js')}}"></script>
	
	@yield('scripts')
</body>

</html>