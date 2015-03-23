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
			<h3>Register</h3>
			<?php
				if(isset($_POST['submit']))
					{
						if($_POST['password']==$_POST['password2'])
						{
							$mysqli = new mysqli($db['hostname'],$db['username'],$db['password'],$db['database']);

							// New user details sent from form
							$newusername=$_POST['username'];
							$newpassword=$_POST['password'];
							$newemail=$_POST['email'];

							// Sanitise inputs
							$newusername = stripslashes($newusername);
							$newpassword = stripslashes($newpassword);
							$newemail = stripslashes($newemail);
							$newusername = $mysqli->real_escape_string($newusername);
							$newpassword = $mysqli->real_escape_string($newpassword);
							$newemail = $mysqli->real_escape_string($newemail);

							// Hash+salt password using PHP 5.5 defaults
							$newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
							
							if ($mysqli->query("INSERT INTO Members (username, password, email)
								VALUES ('$newusername','$newpassword','$newemail')")) {
	    						$_SESSION['myusername']=$newusername;
							  	echo "Registration successful! <a href='index.php'>Go to the Index.</a>";
							} else {
								echo "Error processing registration!";
							}
						} else {
							echo "Passwords do not match!";	
						}
					};
			?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label for="name">Username</label>
				<input type="text" id="username" name="username" pattern="[a-zA-Z1-9 \s]+" required />

				<label for="email">Email Address</label>
				<input type="email" id="email" name="email" required autocomplete="on"/>
				 
				<label for="password">Password</label>
				<input type="password" id="password" name="password" required></input>

				<label for="password">Confirm Password</label>
				<input type="password" id="password2" name="password2" required></input>

				<button type="submit" name="submit">Register</button>
				 
			</form>
			<p>Already registered?  <a href="login.php">Click here to login!</a></p>
		</div>
		<?php require 'footer.php'; ?>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>