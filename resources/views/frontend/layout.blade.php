<!DOCTYPE html>
<html>
    <head>
        @yield('pageTitle')
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/styles.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans+Mono" rel="stylesheet">
    </head>
    <body>
        <div id="mobileMenuWrapper">
            <div id="mobileMenu">
                <div>
                    @include('frontend.modules.menu')
                </div>
            </div>
        </div>

    	<nav id="mainMenuWrapper">
            <a href="javascript:;" class="mobileMenuIcon"><div></div></a>
            
    		<div id="mainMenu">
    			@include('frontend.modules.menu')
    		</div>
    	</nav>

    	@yield('content')

        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/init.js"></script>
   	</body>
</html>