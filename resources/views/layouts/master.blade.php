<!doctype html>
<html>
  <head>
    <meta charset ="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	@yield('style')
  </head>
  <body>
    @include('partial.header')
    <div class ="container">
	  @yield('content')
    </div>
    @yield('scripts')
  </body>
</html>