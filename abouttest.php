<?php require 'config/init.php';?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>C3279038 - AIDA</title>
	<meta name="description" content="C3279038 AIDA Assignment">
	<meta name="author" content="C3279038">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">


	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fLQjzlF1bFN5qwt-EGUHpTTemYtKKWw">
    </script>
    <script>
    navigator.geolocation.getCurrentPosition(initialize);
    </script>
    <script type="text/javascript">
      function initialize(position) {
      	if (typeof position.coords.latitude != 'undefined') {
      		var locatelat = position.coords.latitude;
      		var locatelong = position.coords.longitude;
		} else {
			var locatelat = 53.826882;
			var locatelong = -1.5926016;
		}
        var mapOptions = {
          center: { lat: locatelat, lng: locatelong},
          zoom: 16
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $("#maptoggle").click(function(){
	    $("#map-canvas").toggle();
	  });
	});
	</script>


</head>
<body onload="initialize()">



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<?php require 'header.php'; ?>
		<?php require 'nav.php'; ?>
		<div class="twelve columns">
			<h3>About/Map</h3>
			<p>This website a requirement for the completion of Advanced Internet Development A.</p>
			<button class="half-width button" id="maptoggle">Show/Hide Map</button>
			<button class="half-width button" id="locateme">Locate Me!</button>
			<div id="map-canvas"></div>
		</div>
		
		<?php require 'footer.php'; ?>

	</div><!-- container -->



<!-- End Document
================================================== -->
</body>
</html>