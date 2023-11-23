
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AnginAhmar Care. Admin Articles </title>
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
  <link rel="icon" href="{{ url_for('static', filename='images/favicon.ico') }}" type="image/x-icon">


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
    .custom-card-shadow {
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
		height: 500px;
		width: 350px;
    }	    
	</style>

	<body>

	<div class="modal fade" id="addarticleModal" tabindex="-1" role="dialog" aria-labelledby="addarticleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="addarticleModalLabel">Add article</h5>
        
      </div>
      <div class="modal-body">
        <form action="http://localhost:5000/add_article" method="POST">
          <div class="form-group">
            <label for="title">Title</label>
            <input name="title" class="form-control" placeholder="Title" type="text">
          </div>
		  <div class="form-group">
            <label for="source">Source</label>
            <input name="source" class="form-control" placeholder="Source URL" type="text">
          </div>
          <div class="form-group">
            <label for="content">Article Content</label>
            <textarea name="content" class="form-control" id="" cols="30" rows="7" placeholder="article Content"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Article</button>
      </div>
      </form>
    </div>
  </div>
</div>

	
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><a href="/admin/home">AAC</a> Admin</h1>
				<nav role="navigation">
					<ul>
						<li><a href="/admin/home">Home</a></li>
						<li><a href="/admin/article">Articles</a></li>
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
				<li style="background-image: url({{ url_for('static', filename='images/slide_1.jpg') }});">
					<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>Articles</h2>
                <p class="fh5co-lead">Add, Delete and Edit article here.</p>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addarticleModal">Add Article</button>

		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	
	<div id="fh5co-article-section">
	<br>
        <div class="container">
            <div class="row">
                {% for article_item in article_data %}
				<div class="col-md-4 card-container" style="padding: 10px;">
    <div class="card custom-card-shadow animate-box" style="padding: 15px; background-color: white;" id="card-container-{{ article_item._id }}">
        <div class="card-body">
            <h3 class="card-title"><strong>{{ article_item.title }}</strong></h3>
            <p class="card-text">{{ article_item.content }}</p>
			<p class="card-text"><a href="{{ article_item.source }}"  target="_blank">Source</a></p>
			<p class="card-text">{{ article_item.date }}</p>
            <a href="#" class="btn btn-primary btn-sm edit-button" data-article-id="{{ article_item._id }}" >Edit</a>
            <a href="{{ url_for('delete_article', article_id=article_item._id) }}" class="btn btn-danger btn-sm">Delete</a>
        </div>
    </div>
    <!-- Edit Form -->
    <div class="edit-form" id="edit-form-{{ article_item._id }}" style="display: none;">
        <form method="POST" action="{{ url_for('update_article', article_id=article_item._id) }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ article_item.title }}">
            </div>
			<div class="form-group">
                <label for="source">source</label>
                <input type="text" name="source" class="form-control" value="{{ article_item.source }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control">{{ article_item.content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>

                {% endfor %}
				
            </div>
        </div>
    </div>
	
         
<br>

    

	




	
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
					<li><a href="/admin/article">Articles</a></li>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-button');

        editButtons.forEach(button => {
            button.addEventListener('click', event => {
                event.preventDefault();

                const articleItemId = button.getAttribute('data-article-id');
                const cardContainer = document.querySelector(`#card-container-${articleItemId}`);
                const editForm = document.querySelector(`#edit-form-${articleItemId}`);

                if (cardContainer.style.display === 'block') {
                    cardContainer.style.display = 'none';
                    editForm.style.display = 'block';
                } else {
                    cardContainer.style.display = 'block';
                    editForm.style.display = 'none';
                }
            });
        });
    });
</script>





	</body>
</html>

