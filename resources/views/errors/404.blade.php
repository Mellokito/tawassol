<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>{{ config('app.name', 'Gestion école') }}</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->

	<!--begin::Global Theme Styles -->
	<link href="{{ asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="{{ asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
	<link href="{{ asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/demo/default/base/custom-style.css')}}" rel="stylesheet" type="text/css" />


	<!--RTL version:<link href="{{ asset('assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->

	<!--end::Global Theme Styles -->

	<!--begin::Page Vendors Styles -->
	<link href="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
		type="text/css" />

	<!--RTL version:<link href="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
	<link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css')}} " rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
	

	<!--RTL version:<link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />-->

	<!--end::Page Vendors Styles -->
	<link rel="shortcut icon" href="{{ asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid  m-error-1" style="background-image: url(../../../assets/app/media/img//error/bg1.jpg);">
				<div class="m-error_container">
					<span class="m-error_number">
						<h1>404</h1>
					</span>
					<p class="m-error_desc">
						La page que vous cherchez est introuvable !
					</p>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!--begin::Global Theme Bundle -->
        <script src="{{ asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
        <script src="{{ asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->
	</body>

	<!-- end::Body -->
</html>