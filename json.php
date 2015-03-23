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

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<?php require 'header.php'; ?>
		<?php require 'nav.php'; ?>
		<div class="twelve columns">
			<h3>JSON Extraction</h3>
			<p>
				<?php
					$connection=mysqli_connect($db['hostname'],$db['username'],$db['password'],$db['database']);
					$query = "SELECT * FROM ProjectProducts";
					$result = mysqli_query($connection,$query);
					//$_JSON = '<SCRIPT LANGUAGE="JavaScript">';
					$_JSON .="var sandwiches = [\r\n";
					while ($row = @ mysqli_fetch_array($result)) 
						{ 
						$_JSON .="{'sandwich_name': '".$row["Name"]."', ";
						$_JSON .="'sandwich_price': '". $row["Price"] ."', ";
						$_JSON .="'sandwich_description': '".$row["Description"] . "'},\r\n";
						} 
					$_JSON .="]\r\n";
					//$_JSON .="</SCRIPT>";
					print("JSON Generated: <br />" . $_JSON);
				?>
			</p>
		</div>
		<?php require 'footer.php'; ?>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>