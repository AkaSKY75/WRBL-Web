<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>WRBL</title>
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
	
	<!-- Modernizr -->
	<script src="{BASE_URL}/assets/js/modernizr-2.8.3.min.js"></script>

	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="page-login">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
	<div class="loginContentWrap">
		<div class="container">
		<div class="row">
		
		<div style="text-align:center;padding-bottom:2%;"><img src="{BASE_URL}/images/image.png"></div>
		</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
					<form data-parsley-validate  method="post" action="{SITE_URL}/login/done">
					{message}
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="text" name="username" class="form-control simple-form-control" placeholder="Utilizator" required data-parsley-error-message="Mandatory">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="form-group">
							<input style="box-shadow: 0 0 5pt 0.5pt #D3D3D3;" type="password"  name="password" class="form-control simple-form-control" placeholder="Parola" required data-parsley-error-message="Parola gresita">
							<i class="fa fa-lock"></i>
						</div>
							
						<div class="form-group">
							<button type="submit" class="btn btn-orange submit">Login</button>
						</div>
					</form>
					<br><br>
					<div class="form-group" style="padding-left: 30%;">
							<div style="color:black; padding-left: 30%;"></div>
							<a href="{SITE_URL}/Login/inregistrare"><button type="submit" class="btn btn-orange submit">Creaza cont nou</button></a>
						</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="{BASE_URL}/assets/js/jquery-1.11.3.min.js"></script>
	<script src="{BASE_URL}/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- <script src="{BASE_URL}/assets/js/jquery-ui.min.js"></script> -->
	<script src="{BASE_URL}/assets/js/select2.min.js"></script>
	<script src="{BASE_URL}/assets/js/parsley.min.js"></script>
	<script src="{BASE_URL}/assets/js/throttle-debounce.min.js"></script>
	<script src="{BASE_URL}/assets/js/jquery.shuffle.min.js"></script>
	<script src="{BASE_URL}/assets/js/autosize.min.js"></script>
	<script src="{BASE_URL}/assets/js/raphael-min.js"></script>
	<script src="{BASE_URL}/assets/js/morris.min.js"></script>
	<script src="{BASE_URL}/assets/js/Chart.min.js"></script>
	<script src="{BASE_URL}/assets/js/chartist.min.js"></script>
	<!--<script src="{BASE_URL}/assets/js/jquery.fullscreen.min.js"></script>-->
	<script src="{BASE_URL}/assets/js/app.min.js"></script>

	<div class="visible-xs visible-sm extendedChecker"></div>
</body>
</html>






