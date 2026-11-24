<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

	<meta charset="utf-8">

	<title>@yield('title', config('app.name'))</title>

	<meta name="description" content="Startup HTML template OptimizedHTML 5">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">

	@stack('styles')
</head>

<body>

	@include('partials.header')

	@yield('content')

	@include('partials.footer')

	<script src="{{ asset('js/scripts.min.js') }}"></script>
	@stack('scripts')

</body>

</html>
