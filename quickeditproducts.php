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
			<h3>Manage Products</h3>
			<?php
			if (isset($_SESSION['adminusername'])) {
				$mysqli = new mysqli($db['hostname'],$db['username'],$db['password'],$db['database']);

					if ($mysqli->connect_errno) {
					    printf("Connect failed: %s\n", $mysqli->connect_error);
					    exit();
					}
					if ($products = $mysqli->query("SELECT * FROM ProjectProducts")) {
						print "<div class='twelve columns'>\n".
						"<div class='three columns'>\n".
									"<h5>Name</h5>\n".
								"</div>\n".
								"<div class='one column'>\n".
									"<h5>Price</h5>\n".
								"</div>\n".
								"<div class='five columns'>\n".
									"<h5>Description</h5>\n".
								"</div>\n".
								"<div class='two columns'>\n".
									"<h5>Img Loc.</h5>\n".
								"</div>\n".
								"<form action='manageproducts.php' method='post'>\n";
						$fetchproducts = $products->fetch_assoc();
						while ($row = $products->fetch_assoc()) {
							print
								"<div class='three columns'>\n".
									"<input type='text' id='name".$row['ProductID']."' name='name".$row['ProductID']."' value = '".$row['Name']."' required />\n".
								"</div>\n".
								"<div class='one column'>\n".
									"<input type='text' id='price".$row['ProductID']."' name='price".$row['ProductID']."' value = '".$row['Price']."' required />\n".
								"</div>\n".
								"<div class='five columns'>\n".
									"<input type='text' id='desc".$row['ProductID']."' name='desc".$row['ProductID']."' value = '".$row['Description']."' required />\n".
								"</div>\n".
								"<div class='two columns'>\n".
									"<input type='text' id='image".$row['ProductID']."' name='image".$row['ProductID']."' value = '".$row['Image']."' required />\n".
								"</div>\n".
								"<br />\n";
						}
						print "<button type='submit' name='submit'>Finish Quick Edit</button>\n";
						print "</form>\n";
						print "</div>\n";
						$products->close();
					} else {
						echo "failsql";
					}
			} else {
				echo "Oops!  You are not logged in as an admin.";
			}
			?>
		</div>
		<?php require 'footer.php'; ?>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>