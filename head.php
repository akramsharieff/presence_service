<?php
session_start();
?>
<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->


<!-- Mirrored from webdesign-finder.com/html/electrix/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Sep 2018 02:25:59 GMT -->
<head>
	<title>Presence</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/set1.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css">
	<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->
	<script>
			function startTime() {
			  var today = new Date();
			  var h = today.getHours();
			  var m = today.getMinutes();
			  var s = today.getSeconds();
			  m = checkTime(m);
			  s = checkTime(s);
			  document.getElementById('txt').innerHTML =
			  h + ":" + m + ":" + s;
			  var t = setTimeout(startTime, 500);
			}
			function checkTime(i) {
			  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			  return i;
			}
			</script>
</head>

<body>
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->
	
	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			<i class="rt-icon2-cross2"></i>
		</span>
	</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form form-inline" action="http://webdesign-finder.com/html/electrix/">
				<div class="form-group bottommargin_0"> <input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input"> </div> <button type="submit" class="theme_button">Search</button> </form>
		</div>
	</div>
	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->
		</div>
	</div>
	<!-- eof .modal -->
	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">
			<!-- template sections 
			<section class="page_topline ls section_padding_15">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4 col-sm-12 col-md-push-4 text-center"> <p> <i class="fa fa-phone grey rightpadding_5" aria-hidden="true"></i> <a href="tel:+919100224544">Call me at 9100224544</a> </p> </div>
						<div class="col-md-4 col-sm-6 col-md-pull-4 text-center text-md-left">
							<div class="inline-content small-text">
								<p id="txt" style="font-weight:bold; font-size:15px;">   </p>								
							</div>
						</div>
						<div class="col-md-4 col-sm-6 text-center text-md-right">
							<div class="inline-content small-text">
								<p class="greylinks"> <i class="fa fa-pencil grey rightpadding_5" aria-hidden="true"></i> <a href="mailto:electrcs@gmail.com">electrcs@gmail.com</a> </p>
							</div>
						</div>
					</div>
				</div>
			</section>-->
			<header class="page_header header_white toggler_xs_right section_padding_25">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 display_table">
							<div class="col-md-6 col-md-offset-3">
								<div class=" header_mainmenu display_table_cell text-center">
									<!-- main nav start -->
									<?php
									if(!isset($_SESSION['login']))
									{?>
										<h1><a href="index.php"> PRESENCE VISUALIZER </a></h1>
									<?php
									}
									else{?>
										<h1><a href="page_dec.php"> PRESENCE VISUALIZER </a></h1>
									<?php 
									} ?>
									<!-- eof main nav -->
									<!-- header toggler -->
								</div>
							</div>
							<div class="col-md-3">
								<?php
								if(isset($_SESSION['login'])){
						
									echo "<a class=' btn btn-danger' style='border-radius:5px; padding: 14px 30px 14px; font-size: 20px; margin-top:15px;' href=logout.php><span class='mi'></span><span class='fa fa-sign-out txt'>&nbsp;|&nbsp;Logout</span></a>";
						
								}	?>
							</div>
							
								<span class="toggle_menu"><span></span></span>
							
							
						</div>
					</div>
				</div>
			</header>