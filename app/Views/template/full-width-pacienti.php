<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>{TITLE}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  <link href="{BASE_URL}/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="{BASE_URL}/css/font-awesome.min.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="{BASE_URL}/css/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="{BASE_URL}/css/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="{BASE_URL}/css/prettyPhoto.css">  
  <!-- Star rating -->
  <link rel="stylesheet" href="{BASE_URL}/css/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="{BASE_URL}/css/bootstrap-datetimepicker.min.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="{BASE_URL}/css/jquery.cleditor.css"> 
  <!-- Data tables -->
  <link rel="stylesheet" href="{BASE_URL}/css/jquery.dataTables.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="{BASE_URL}/css/jquery.onoff.css">
  <!-- Main stylesheet -->
  <link href="{BASE_URL}/css/style_admin.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="{BASE_URL}/css/widgets.css" rel="stylesheet">   
  
  <script src="{BASE_URL}/js/respond.min.js"></script>
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Favicon 
  <link rel="shortcut icon" href="{BASE_URL}/images/favicon.png">-->
</head>

<body>

{HEADER1}

<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">{MENIU}
	</div>

    <!-- Sidebar ends -->

  	  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
	      <h2 class="pull-left">{TITLE}</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <!--a href="{SITE_URL}/users"><i class="fa fa-home"></i> Home</a--> 
          <!-- Divider -->
          
        </div>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container"; >

        {message}
		{CONTENT}

        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->
   <div class="clearfix"></div>

</div>
<!-- Content ends -->
{FOOTER}

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<!-- JS -->
<script src="{BASE_URL}/js/jquery.js"></script> <!-- jQuery -->
<script src="{BASE_URL}/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="{BASE_URL}/js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="{BASE_URL}/js/moment.min.js"></script> <!-- Moment js for full calendar -->
<script src="{BASE_URL}/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="{BASE_URL}/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="{BASE_URL}/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="{BASE_URL}/js/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll -->
<script src="{BASE_URL}/js/jquery.dataTables.min.js"></script> <!-- Data tables -->

<!-- jQuery Notification - Noty -->
<script src="{BASE_URL}/js/jquery.noty.js"></script> <!-- jQuery Notify -->
<script src="{BASE_URL}/js/themes/default.js"></script> <!-- jQuery Notify -->
<script src="{BASE_URL}/js/layouts/bottom.js"></script> <!-- jQuery Notify -->
<script src="{BASE_URL}/js/layouts/topRight.js"></script> <!-- jQuery Notify -->
<script src="{BASE_URL}/js/layouts/top.js"></script> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

<script src="{BASE_URL}/js/sparklines.js"></script> <!-- Sparklines -->
<script src="{BASE_URL}/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="{BASE_URL}/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="{BASE_URL}/js/jquery.onoff.min.js"></script> <!-- Bootstrap Toggle -->
<script src="{BASE_URL}/js/filter.js"></script> <!-- Filter for support page -->
<script src="{BASE_URL}/js/custom.js"></script> <!-- Custom codes -->
<script src="{BASE_URL}/js/charts.js"></script> <!-- Charts & Graphs -->


</body>
</html>