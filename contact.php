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
			<h3>Contact Page</h3>
			<?php
				if(isset($_POST['submit']))
				{
					if($_POST['spamCheck']<>4)
					{echo "FAILED SPAM CHECK, PLEASE TRY AGAIN!";}
					else {
    				$name=$_POST['name'];
					$email=$_POST['email'];
					$message=wordwrap($_POST['message'],70);
					$age=$_POST['age'];
					$gender=$_POST['radios'];
					$headers = "From: mail@c3279038.com\r\n" .
					    "Reply-To: mail@c3279038.com\r\n" .
					    "CC: brettbladescn@googlemail.com\r\n";
					$emailbody = "Name: $name" . 
					"\r\n" . "Age: $age" .
					"\r\n" . "Gender: $gender" .
					"\r\n" . "Message: $message";
					if(@mail($email,"AIDA Email",$emailbody,$headers))
					{
						echo "Mail sent, thanks $name !";
					}else{
						echo "MAIL NOT SENT, PLEASE TRY AGAIN!";
					}
					}
				}
			?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label for="name">Name (Required)</label>
				<input type="text" id="name" name="name" pattern="[a-zA-Z \s]+" required />

				<label for="email">Email Address (Required)</label>
				<input type="email" id="email" name="email" required autocomplete="on"/>
				 
				<label for="message">Message (Required)</label>
				<textarea id="message" name="message" required></textarea>
				 
				<label for="age">Age (Optional)</label>
				<select id="age" name="age">
				<option value="np">Prefer Not To Say</option>
				<option value="u18">Under 18</option>
				<option value="18to25">18 to 25</option>
				<option value="o25">Over 25</option>
				</select>
				 
				<fieldset>
				<label for="npgender">Gender (Optional)</label>
				<input type="radio" name="radios" id="npgender" value="npgender" checked/>
				<span>Prefer Not To Say</span>
				<label for="genderMale">
				<input type="radio" name="radios" id="genderMale" value="male" />
				<span>Male</span>
				</label>
				<label for="genderFemale">
				<input type="radio" name="radios" id="genderFemale" value="female" />
				<span>Female</span>
				</label>
				</fieldset>
				 
				<label for="spamCheck">Spam Check: How many sides does a square have? (Required)</label>
				<input type="number" id="spamCheck" name="spamCheck" required/>

				<br />
				<br />

				<button type="submit" name="submit">Submit Form</button>
				 
			</form>
		</div>
		<?php require 'footer.php'; ?>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>