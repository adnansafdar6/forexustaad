<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/new/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/new/fontawesome-free-6.4.2-web/css/all.min.css') }}">
	<!-- Custom stlylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/admin/new/css/style.css') }}">

</head>
<body class="error-page">

<!-- Main Wrapper -->
<div class="main-wrapper">

    <div class="error-box">
        <h1>404</h1>
        <h3 class="h2 mb-3"><i class="fa fa-warning"></i> Oops! Page not found!</h3>
        <p class="h4 font-weight-normal">The page you requested was not found.</p>
        <a href="{{url()->previous()}}" class="btn btn-primary">Back to Home</a>
    </div>

</div>

</body>
{{--<body>--}}

{{--	<div id="notfound">--}}
{{--		<div class="notfound-bg"></div>--}}
{{--		<div class="notfound">--}}
{{--			<div class="notfound-404">--}}
{{--				<h1>404</h1>--}}
{{--			</div>--}}
{{--			<h2>we are sorry, but the page you requested was not found</h2>--}}
{{--			<a href="{{url()->previous()}}" class="home-btn">Go Home</a>--}}
{{--		</div>--}}
{{--	</div>--}}

{{--</body>--}}

</html>
