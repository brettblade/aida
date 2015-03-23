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
			<h3>Change Password</h3>
			<?php
				if(isset($_POST['submit']))
					{
						if($_POST['password']==$_POST['password2'])
						{
							$mysqli = new mysqli($db['hostname'],$db['username'],$db['password'],$db['database']);

							// Existing password sent from form
							$currentpassword=$_POST['currentpassword'];

							// Get username from session
							$myusername = $_SESSION['myusername'];

							// Sanitise inputs
							$currentpassword = stripslashes($currentpassword);
							$newpassword = stripslashes($newpassword);
							$newpassword2 = stripslashes($newpassword2);
							$currentpassword = $mysqli->real_escape_string($currentpassword);
							$newpassword = $mysqli->real_escape_string($newpassword);
							$newpassword2 = $mysqli->real_escape_string($newpassword2);

							// Verify existing password against password hash
							if ($hash = $mysqli->query("SELECT password FROM Members WHERE username='$myusername' LIMIT 1")) {
								$fetchhash = $hash->fetch_assoc();
								$comparehash = $fetchhash['password'];
								if (password_verify($currentpassword, $comparehash)) {
									// Existing password is a match, OK to change password
										// Hash+salt new password using PHP 5.5 defaults
										$newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
										if ($mysqli->query("UPDATE Members SET password = '$newpassword'
															WHERE username = '$myusername'")) {
										  	echo "Password changed successfully! <a href='index.php'>Go to the Index.</a>";
										} else {
											echo "Error processing password change!";
										}
								} else {
									echo "Current password incorrect or username session error!";
								}
								$hash->close();
							} else {
								echo "failsql";
							}
						} else {
							echo "Passwords do not match!";	
						}
					};
			?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label for="currentpassword">Current Password</label>
				<input type="password" id="currentpassword" name="currentpassword" pattern="[a-zA-Z1-9 \s]+" required />
				 
				<label for="newpassword">Password</label>
				<input type="password" id="newpassword" name="newpassword" required></input>

				<label for="newpassword2">Confirm Password</label>
				<input type="password" id="newpassword2" name="newpassword2" required></input>

				<button type="submit" name="submit">Change!</button>
				 
			</form>
		</div>
		<?php require 'footer.php'; ?>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>