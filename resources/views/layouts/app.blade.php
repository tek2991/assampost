<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>@yield('title') | Assam Postal Circle</title>
	<meta content="@yield('description')" name="description">
	<meta content="@yield('keyword')" name="keywords">
	@include('layouts.css')
	@yield('css')	
</head>

<body>

@include('layouts.header')

<!-- ======= Hero Section ======= -->

@include('layouts.banner')



<main id="main">
	<!-- ======= About Section ======= -->
	@yield('content')
<!-- End About Section -->
@include('layouts.call-action')
</main>

<!-- End #main -->

@include('layouts.footer')
@include('layouts.js')
@yield('js')
</body>

</html>