<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include("partials._header")
        @yield('styles')
    </head>
    <body>
    	<div class="flex-center position-ref full-height">
	        @yield('content')
	    </div>
    </body>
</html>
