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
			<h3>Sandwiches Available</h3>
				<form name="sort" method="get">
				<input name = "searchphrase" type="text" id="searchphrase" placeholder="Search for a sandwich" <?php if (isset($_GET['searchphrase'])) {print "value='".$_GET['searchphrase']."'";} ?>/>
				<label for="sortmode">Sort:</label>
				<select name="sortmode" id="sortmode" onChange="javascript:document.sort.submit();">
					<option value="asc" <?php if (isset($_GET['sortmode']) && $_GET['sortmode'] == 'asc') {print "selected";} ?>>Price - Low to High</option>
					<option value="desc" <?php if (isset($_GET['sortmode']) && $_GET['sortmode'] == 'desc') {print "selected";} ?>>Price - High to Low</option>
					<option value="alpha" <?php if (isset($_GET['sortmode']) && $_GET['sortmode'] == 'alpha') {print "selected";} ?>>Alphabetically</option>
				</select>
				</form>
			<?php
				$connection=mysqli_connect($db['hostname'],$db['username'],$db['password'],$db['database']);
				// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				// Constraints
				if (isset($_GET['searchphrase'])) 
					{$constraints .= "WHERE Name LIKE '%".$_GET['searchphrase']."%'"; } 
				if (isset($_GET['sortmode']) && $_GET['sortmode'] == 'alpha') 
					{$constraints .= "ORDER BY Name"; } 
				else {$constraints .= "ORDER BY Price ".$_GET['sortmode'];
				}
				// Perform queries
				$query = "SELECT * FROM ProjectProducts ".$constraints."";
				//$query .= 
				$result = mysqli_query($connection,$query);
				while ($row = @ mysqli_fetch_array($result)) 
					{ 
					// Print one row of results 
					print 
					"<div class='item'>" .
					"<h4>".$row["Name"]."</h4>".
					"<img class='productimg' src=". $row["Image"]." alt='Image of sandwich.' width='120' height='95' /> &nbsp;" .
					"<span class='price'>&pound;". $row["Price"] ."</span>&nbsp;".
					"<span>".$row["Description"] . "</span>&nbsp;" .
					"<span><a href='index.php?action=add&amp;id=".$row["ProductID"]."' class='button'>Add To Cart</a></span>&nbsp;" .
					"</div>";
					} 
				mysqli_close($con);
			?> 
		</div>
		<?php require 'footer.php'; ?>
	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>