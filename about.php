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

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fLQjzlF1bFN5qwt-EGUHpTTemYtKKWw"></script>
	<script>
		$(document).ready(function(){
			var map = new google.maps.Map(document.getElementById('map-canvas'), {
				center: { lat: 53.826882, lng: -1.5926016},
				zoom: 1
			});

			$("#maptoggle").click(function(){
				$("#map-canvas").slideToggle();
			});

			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(locateMe);
			}

			function locateMe(position) {
				$('#weather').slideUp();
				var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

				var map = new google.maps.Map(document.getElementById('map-canvas'), {
					center: latLng,
					zoom: 16
				});

				var marker = new google.maps.Marker({
					position: latLng,
					map: map,
					animation: google.maps.Animation.DROP,
					title:"You are here!"
				});

				google.maps.event.addListener(marker, 'click', function () {
					marker.setAnimation(google.maps.Animation.BOUNCE);

					setTimeout(function() {
						if (marker.getAnimation() != null) {
							marker.setAnimation(null);
						}
					}, 1500);
				});

				$.ajax({
					url : "http://api.wunderground.com/api/2e448a31edffee9d/conditions/q/" + position.coords.latitude + "," + position.coords.longitude + ".json",
					dataType : "jsonp",
					success : function(parsed_json) {
						var location = parsed_json['current_observation']['display_location']['city'];
						var temp_c = parsed_json['current_observation']['temp_c'];
						$('#weather-icon').attr('src', 'http://icons.wxug.com/i/c/k/nt_partlycloudy.gif');
						$('#weather-text').html('Provided by Weather Underground: Current temperature in ' + location + ' is ' + temp_c + '&deg;c');
						$('#weather').slideDown();
					}
				});
			}

			$("#locateme").click(function() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(locateMe);
				}
			});
		});
	</script>

</head>

<body>

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
			<div id="weather"><p><img id="weather-icon" src="" alt=""> <span id="weather-text"></span></p></div>
			<div id="map-canvas"></div>
		</div>

		<?php require 'footer.php'; ?>

	</div><!-- container -->



<!-- End Document
================================================== -->
</body>
</html>