<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include("partials._header")

        <style type="text/css">
        	body {
        		background: url("{{ $image  }}");
        		background-size: cover;
        	}
        	.footer {
        		bottom: 0;
			    left: 0;
			    position: absolute;
			    right: 0;
        	}
        </style>
    </head>
    <body>
    	<div class="flex-center position-ref full-height">
    		<div class="footer">
    			{{ $image }}
    		</div>
	        
	    </div>
    </body>
</html>
