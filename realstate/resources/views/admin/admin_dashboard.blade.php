<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>@yield('title')</title>
  <!-- Fonts -->
  @include('admin.link.css')
</head>
<body>
	<div class="main-wrapper">
		<!-- partial:partials/_sidebar.html -->
        @include('admin.includes.sidebar')
		<!-- partial -->
		<div class="page-wrapper">
			<!-- partial:partials/_navbar.html -->
			@include('admin.includes.header')
			<!-- partial -->
                @yield('admin')
			<!-- partial:partials/_footer.html -->
			@include('admin.includes.footer')
			<!-- partial -->
	    </div>
    </div>
	<!-- core:js -->
	@include('admin.link.js')
	<!-- End custom js for this page -->
</body>
</html>    