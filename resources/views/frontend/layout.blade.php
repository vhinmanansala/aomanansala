<!DOCTYPE html>
<html>
    <head>
        @yield('pageTitle')
        <link href="/css/styles.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans+Mono" rel="stylesheet">
    </head>
    <body>
    	<nav id="mainMenuWrapper">
            <a href="#" class="mobileMenuIcon"><div></div></a>
            
    		<div id="mainMenu">
    			<ul class="clearfix">
	    			<li class="{{ isActiveRoute('home') }}"><a href="{{ route('home') }}"><span class="highlightText">01</span> Projects</a></li>
	    			<li class="{{ isActiveRoute('about') }}"><a href="{{ route('about') }}"><span class="highlightText">02</span> About</a></li>
	    			<li><a href="mailto:aomanansala@gmail.com"><span class="highlightText">03</span> Contact</a></li>
	    		    <li class="socialMedia"><a href="https://github.com/vhinmanansala" target="_blank"><i class="fa fa-github-alt" aria-hidden="true"></i></a></li>
                    <li class="socialMedia"><a href="https://www.linkedin.com/in/alvin-manansala-8bb5b556/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>	
    		</div>
    	</nav>

    	@yield('content')

        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/init.js"></script>
   	</body>
</html>