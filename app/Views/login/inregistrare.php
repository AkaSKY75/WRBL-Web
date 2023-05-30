<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Nemobit</title>
	<meta name="description" content="...">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Icons -->
	<link rel="SmartSolutions" href="cream.png">
	
	<!-- CSS -->
	<link rel="stylesheet" href="{BASE_URL}/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{BASE_URL}/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="{BASE_URL}/assets/css/jquery-ui.min.css">
	<link rel="stylesheet" href="{BASE_URL}/assets/css/select2.min.css">
	<link rel="stylesheet" href="{BASE_URL}/assets/font-awesome-4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{BASE_URL}/assets/css/app.min.css">
	<script src="https://kit.fontawesome.com/cdeb1c666d.js" crossorigin="anonymous"></script>
	
	<!-- Modernizr -->
	<script src="{BASE_URL}/assets/js/modernizr-2.8.3.min.js"></script>

	<!-- Google fonts -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="page-login">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
	<div class="loginContentWrap">
		<div class="container">
		<div class="row">
		
		<h1 style="padding-left: 37%; color:black;">Welcome to Nemobit</h1>
		</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
					<form data-parsley-validate  method="post" action="{SITE_URL}/login/inregistrare_done">
					{message}
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="text" name="nume" class="form-control simple-form-control" placeholder="Nume" required data-parsley-error-message="Mandatory">
							<i class="fa fa-user"></i>
						</div>
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="text"  name="prenume" class="form-control simple-form-control" placeholder="Prenume" required data-parsley-error-message="Mandatory">
							<i class="fa fa-user"></i>
						</div>
							<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="text"  name="localitate" class="form-control simple-form-control" placeholder="Localitate" required data-parsley-error-message="Mandatory">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="text"  name="telefon" class="form-control simple-form-control" placeholder="Telefon" required data-parsley-error-message="Mandatory">
							<i class="fa fa-phone"></i>
						</div>
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="number"  name="CNP" class="form-control simple-form-control" placeholder="CNP" required data-parsley-error-message="Mandatory">
							<i class="fa fa-id-card"></i>
						</div>
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="date"  name="data_nasterii" class="form-control simple-form-control" placeholder="Data nasterii" required data-parsley-error-message="Mandatory">
							<i class="fa fa-calendar-o"></i>
						</div>
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="text"  name="specializare" class="form-control simple-form-control" placeholder="Specializare" required data-parsley-error-message="Mandatory">
							<i class="fa fa-user-md"></i>
						</div>
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="text" name="email" class="form-control simple-form-control" placeholder="Email" required data-parsley-error-message="Mandatory">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="password"  name="password" class="form-control simple-form-control" placeholder="Parola" required data-parsley-error-message="Wrong password">
							<i class="fa fa-lock"></i>
						</div>
						
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="password"  name="password" class="form-control simple-form-control" placeholder="Confirmare parola" required data-parsley-error-message="Wrong password">
							<i class="fa fa-lock"></i>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-orange submit">Creeaza cont nou</button>
						</div>
						
					</form>
					<br><br>
					
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="{BASE_URL}/assets/js/jquery-1.11.3.min.js"></script>
	<script src="{BASE_URL}/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="{BASE_URL}/assets/js/jquery-ui.min.js"></script>
	<script src="{BASE_URL}/assets/js/select2.min.js"></script>
	<script src="{BASE_URL}/assets/js/parsley.min.js"></script>
	<script src="{BASE_URL}/assets/js/throttle-debounce.min.js"></script>
	<script src="{BASE_URL}/assets/js/jquery.shuffle.min.js"></script>
	<script src="{BASE_URL}/assets/js/autosize.min.js"></script>
	<script src="{BASE_URL}/assets/js/raphael-min.js"></script>
	<script src="{BASE_URL}/assets/js/morris.min.js"></script>
	<script src="{BASE_URL}/assets/js/Chart.min.js"></script>
	<script src="{BASE_URL}/assets/js/chartist.min.js"></script>
	<script src="{BASE_URL}/assets/js/jquery.fullscreen.min.js"></script>
	<script src="{BASE_URL}/assets/js/app.min.js"></script>

	<div class="visible-xs visible-sm extendedChecker"></div>
</body>
</html>






