<html>

<head>
	<title>Admin - @yield('pageMetaTitle')</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/custom-bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/classes.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/identifiers.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/left_part.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/pages.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/rangs.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/status_line.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/tags.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/for_editors.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/bar.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/classes.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/html_tags.css') }}">
	<!-- <link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/admin/all-admin-styles.css') }}"> -->
	<!-- <link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/all-styles.css') }}"> -->

	<script src="{{URL :: asset('js/admin/basic.js')}}"></script>
</head>

<body>
	<div class="container">
		@include('admin.includes.header')

		<section>
			<div class="row">
				<div class="col-2 p-0">
					@include('admin.includes.menu')
				</div>

				<div class="col-10 content p-0">
					@yield('content')
				</div>
			</div>
		</section>

		@include('admin.includes.footer')
	</div>
</body>

</html>