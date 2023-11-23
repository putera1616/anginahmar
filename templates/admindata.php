
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AnginAhmar Care. Admin Prediction Data </title>
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
    <link rel="stylesheet" href="{{ url_for('static', filename='css/jquery.dataTables.css') }}">

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
    }

    
</style>

	<body>


	
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
				<li style="  background-image: linear-gradient(to BOTTOM, #262626, white);
  ">
					<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>Prediction Data</h2>
                <p class="fh5co-lead">Data collected from the prediction application used by user.</p>
				<button id="exportCsvButton" class="btn btn-primary btn-lg">Export to CSV</button>

		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>


<div class="section-table">	
    <br>
    <div class="table-responsive animate-box" style="padding: 50px;     transform: scale(0.5);">
    <h2>User's Prediction Data</h2>

	<table class="table table-hover" id="userDataTable" >
	<thead class="thead-dark">
        <tr>
        <th>id</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Hypertension</th>
            <th>Heart Disease</th>
            <th>Weight</th>
            <th>Height</th>
            <th>BMI</th>
            <th>Smoking Status</th>
            <th>Ever Married</th>
            <th>Work Type</th>
            <th>Residence Type</th>
            <th>Stroke Risk</th>
            <th>Stroke Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        {% for row in user_data %}
            <tr>
                    <td>{{ row[0] }}</td> 
                    <td>{{ row[1] }}</td> 
                    <td>{{ row[2] }}</td> 
                    <td>{{ row[3] }}</td> 
                    <td>{{ row[4] }}</td> 
                    <td>{{ row[5] }}</td> 
                    <td>{{ row[6] }}</td> 
                    <td>{{ row[7] }}</td> 
                    <td>{{ row[8] }}</td> 
                    <td>{{ row[9] }}</td> 
                    <td>{{ row[10] }}</td> 
                    <td>{{ row[11] }}</td> 
                    <td>{{ row[12] }}</td> 
                    <td>{{ row[13] }}</td> 


                <td>
                    <form method="POST" action="{{ url_for('delete_user_data', user_id= row[0]) }}">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        {% endfor %}
    </tbody>
</table>
    </div>
<br>
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
<script src="{{ url_for('static', filename='js/jquery.dataTables.js')}}"></script>

<!-- MAIN JS -->
<script src="{{ url_for('static', filename='js/main.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#userDataTable').DataTable();
    });
</script>

<script>
    // Function to convert data to CSV format
    function convertToCSV(data) {
        const csv = data.map(row => Object.values(row).join(',')).join('\n');
        return csv;
    }

    // Function to trigger the download of a CSV file
    function downloadCSV(data) {
        const csv = convertToCSV(data);

        // Create a blob with the CSV data
        const blob = new Blob([csv], { type: 'text/csv' });
        const url = URL.createObjectURL(blob);

        // Create a temporary anchor element and trigger the download
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = 'prediction_data.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    // Function to extract and prepare data from the table
    function extractDataFromTable() {
        const data = [];
        const table = document.getElementById('userDataTable');
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const rowData = {};
            const cells = row.querySelectorAll('td');

            rowData['Gender'] = cells[0].textContent;
            rowData['Age'] = cells[1].textContent;
            rowData['Hypertension'] = cells[2].textContent;
            rowData['Heart Disease'] = cells[3].textContent;
            rowData['Weight'] = cells[4].textContent;
            rowData['Height'] = cells[5].textContent;
            rowData['Smoking Status'] = cells[6].textContent;
            rowData['Ever Married'] = cells[7].textContent;
            rowData['Work Type'] = cells[8].textContent;
            rowData['Residence Type'] = cells[9].textContent;
            rowData['Stroke Risk'] = cells[10].textContent;

            data.push(rowData);
        });

        return data;
    }

    // Add an event listener to the export CSV button
    document.getElementById('exportCsvButton').addEventListener('click', function() {
        const data = extractDataFromTable();
        downloadCSV(data);
    });
</script>


	</body>
</html>

