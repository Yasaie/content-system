<!doctype html>
<html lang="fa">

	<head>
		<title>@yield('title')</title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="@yield('description')">
		<meta name="keywords" content="@yield('keywords')">
		<link rel="canonical" href="@yield('canonical')" />
		<link rel="shortcut icon" href="{{ config('app.favicon') }}">

		<!-- Open Graph data -->
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="@yield('canonical')" />
		<meta property="og:image" content="@yield('image')" />
		<meta property="og:description" content="@yield('description')" />
		<meta property="og:site_name" content="{{ config('app.name') }}" />

		<link rel="stylesheet" href="{{ asset('front/css/plugin.min.css') }}">
		<link rel="stylesheet" href="{{ asset('front/style.css') }}">

        <link href="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css" />

		@stack('styles')

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		@include('layouts.front.header')

		@yield('content')

		@include('layouts.front.footer')

		@include('layouts.front.go-top')

		<script src="{{ asset('js/vue.js') }}"></script>
		<script src="{{ asset('front/js/plugins.min.js') }}"></script>
		<script src="{{ asset('front/js/script.min.js') }}"></script>

        <script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

		@stack('scripts')
		@include('layouts.alert')

	</body>
</html>