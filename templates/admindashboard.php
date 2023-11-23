
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AnginAhmar Care. Admin Home </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

 

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="icon" href="{{ url_for('static', filename='img/favicon.ico') }}" type="image/x-icon">


	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ url_for('static', filename='css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ url_for('static', filename='css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ url_for('static', filename='css/bootstrap.css') }}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ url_for('static', filename='css/flexslider.css') }}">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ url_for('static', filename='css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ url_for('static', filename='css/owl.theme.default.min.css') }}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ url_for('static', filename='css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ url_for('static', filename='js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	
	</head>
	<style>
		div#age-stroke-risk-scatter,
div#stroke-level-distribution-pie,
div#gender-stroke-risk-boxplot,
div#ever-married-stroke-risk-bar,
div#smoking-status-stroke-risk-bar,
div#residence-type-stroke-risk-bar {
    display: inline-block;
    width: 45%; /* Adjust the width to your preference */
    margin: 10px;
    border: 1px solid #ccc;
    padding: 10px;
    box-shadow: 2px 2px 5px #aaa;
}
		</style>

	<body>
	<script>
			{% if 'admin_logging_in' in session and session['admin_logging_in'] %}
				alert("You have succesfully logged in as an admin.");
				{% set _ = session.update({'admin_logging_in': False}) %}
			{% endif %}
		</script>





	
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><a href="/admin/home">AAC</a> Admin</h1>
				<nav role="navigation">
					<ul>
						<li><a href="/admin/home">Home</a></li>
                        <li><a href="/admin/data">Data</a></li>

						
						<li class="cta"><a href="/admin/logout">Logout</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	
	<div class="container">
		
	</div>
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
			<li style="  background-image: linear-gradient(to BOTTOM, #262626, white);">
					<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>Welcome, Admin !</h2>
                <p class="fh5co-lead"></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

    <div id="fh5co-work-section" class="fh5co-white-section text-center">
    <iframe title="Report Section" width="1400" height="900" src="https://app.powerbi.com/view?r=eyJrIjoiY2I3OWFlN2EtM2NmZS00ZDM3LWE0MDgtNzkwOGY2MTg5OTU1IiwidCI6ImNkY2JiMGUyLTlmZWEtNGY1NC04NjcwLTY3MjcwNzc5N2FkYSIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
</div>
	</div>



	
     



	
	<footer id="fh5co-footer" role="contentinfo">
	
		<div class="container">
			<div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>About Us</h3>
				<p>This web application is developed by me Putera Iskandar, a student in UiTM Perlis. This application is used for the final year project. </p>
			</div>
			<div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				
				

			</div>

			<div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Our Pages</h3>
				<ul class="float">
					<li><a href="/admin/home">Home</a></li>
					<li><a href="/admin/data">Data</a></li>
				
				</ul>
			</div>
			
			
			<div class="col-md-12 fh5co-copyright text-center">
				<p>&copy; 2023 AnginAhmar Care. All Rights Reserved. </p>	
			</div>
			
		</div>
	</footer>
	</div>
	
<!-- jQuery -->
<script src="{{ url_for('static', filename='js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{ url_for('static', filename='js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ url_for('static', filename='js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{ url_for('static', filename='js/jquery.waypoints.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{ url_for('static', filename='js/owl.carousel.min.js')}}"></script>
<!-- Flexslider -->
<script src="{{ url_for('static', filename='js/jquery.flexslider-min.js')}}"></script>
<!-- MAIN JS -->
<script src="{{ url_for('static', filename='js/main.js')}}"></script>

	</body>
</html>

