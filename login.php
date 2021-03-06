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
			<h3>Login</h3>
			<?php
				if(isset($_POST['submit']))
					{
					$mysqli = new mysqli($db['hostname'],$db['username'],$db['password'],$db['database']);

					if ($mysqli->connect_errno) {
					    printf("Connect failed: %s\n", $mysqli->connect_error);
					    exit();
					}

					// username and password sent from form
					$myusername=$_POST['username'];
					$mypassword=$_POST['password'];

					// Sanitise inputs
					$myusername = stripslashes($myusername);
					$mypassword = stripslashes($mypassword);
					$myusername = $mysqli->real_escape_string($myusername);
					$mypassword = $mysqli->real_escape_string($mypassword);
					// Retrieve password hash from database
					// Verify input against password hash
					if ($hash = $mysqli->query("SELECT password FROM Members WHERE username='$myusername' LIMIT 1")) {
						$fetchhash = $hash->fetch_assoc();
						$comparehash = $fetchhash['password'];
						if (password_verify($mypassword, $comparehash)) {
							$_SESSION['myusername']=$myusername;
							header("Location: index.php");
						} else {
							echo "Wrong Username or Password";
						}
						$hash->close();
					} else {
						echo "failsql";
					}
				};
			?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label for="name">Username</label>
				<input type="text" id="username" name="username" pattern="[a-zA-Z1-9 \s]+" required />
				 
				<label for="password">Password</label>
				<input type="password" id="password" name="password" required></input>

				<button type="submit" name="submit">Login</button>
				 
			</form>
			<p>Not registered?  <a href="register.php">Click here to register!</a></p>
		</div>
		<?php require 'footer.php'; ?>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>