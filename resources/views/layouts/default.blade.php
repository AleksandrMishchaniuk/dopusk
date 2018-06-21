<!DOCTYPE html>
<html>
<head>
	<title>Dopusk. Допуски и Посадки</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{!! Html::style('css/app.css') !!}
  @yield('template_styles')
</head>
<body>
	@yield('body')
  {!! Html::script('js/app.js') !!}
  @yield('template_scripts')
</body>
</html>
