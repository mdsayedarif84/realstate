<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>403</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  @include('admin.link.css')
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
						<img src="{{asset('upload/404.svg')}}" class="img-fluid mb-2" alt="404">
						<h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">403</h1>
						<h4 class="mb-2">Page Not Found</h4>
						<h6 class="text-muted mb-3 text-center">Oopps!! USER DOES NOT HAVE THE RIGHT PERMISSIONS..</h6>
						<a href="{{route('admin.dashboard')}}">Back to home</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	@include('admin.link.js')
</body>
</html>