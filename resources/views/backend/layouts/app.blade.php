<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- CSRF Token -->

	<title>{{ Config::get('app.name', 'eCommerce') }} | @yield('page-title')</title>
	<link rel="stylesheet" href="{{ url('assets/styles/style.min.css') }}">

	<!-- Waves Effect -->
    <link rel="stylesheet" href="{{ url('assets/plugin/waves/waves.min.css') }}">
    <!-- Icons & Fonts -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">

	@stack('style')

	<!-- RTL -->
	<link rel="stylesheet" href="{{ url('assets/styles/style-rtl.min.css') }}">
	<style>
		* {
			font-family: 'Tajawal', 'sans-serif';
		}
		.logo {
			font-family: 'Tajawal', 'sans-serif' !important;
		}
		.avatar {
			vertical-align: middle;
			width: 50px;
			height: 50px;
			border-radius: 50%;
		}
		.navigation .menu>li.current .sub-menu {
			background: #dddddd52;
		}
		.custom-message {
			position: fixed;
			top: 0;
			right: 0;
			left: 0;
			padding: 30px;
			z-index: 1000000;
			color: #FFF;
			font-weight: bold;
		}
		.custom-message-btn {
			float: right;
			background: none;
			border: 1px solid #FFF;
			border-radius: 50%;
			width: 30px;
			height: 30px;
			color: #FFF;
			margin-left: 20px;
		}
		.custom-message-error {
			background-color: #F44336;
		}
		.custom-message-success {
			background-color: #4CAF50;
		}
	</style>
</head>

<body>
	<div id="custom-message" class="custom-message" style="display: none">
		<button class="custom-message-btn" id="custom-message-btn">x</button>
		<ul class="list-unstyled"></ul>
	</div>

	@yield('content-app')

	<!-- HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="{{ url('assets/script/html5shiv.min.js') }}"></script>
		<script src="{{ url('assets/script/respond.min.js') }}"></script>
	<![endif]-->
	<!--
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ url('assets/scripts/jquery.min.js') }}"></script>
	<script src="{{ url('assets/scripts/modernizr.min.js') }}"></script>
    <script src="{{ url('assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>

	<script>
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$('#custom-message-btn').on('click', function() {
			$('#custom-message ul').empty();
			$('#custom-message').hide();
		})
	</script>

	@stack('script')

	<script src="{{ url('assets/scripts/main.min.js') }}"></script>
</body>

</html>
