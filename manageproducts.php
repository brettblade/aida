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

	<script>
	$(document).ready(function() {
		$('.editLine').click(function() {
			var $this = $(this);
			var $row = $(this).parent().parent();

			$row.children('td:not(.actions)').attr('contenteditable', true);
			$this.hide();
			$this.siblings('.saveLine').show();
		});

		$('.saveLine').click(function() { 
			var $this = $(this),
					$row = $(this).parent().parent();

			$row.children('td:not(.actions)').attr('contenteditable', false);

			$.post("updateproduct.php", {
				Id: $row.attr('data-product-id'),
				Name: $row.find('.Name').text(),
				Description: $row.find('.Description').text(),
				Price: $row.find('.Price').text(),
				Img: $row.find('.Image').text()
			})
			.done(function(data) {
				$this.hide();
				$this.siblings('.editLine').show();
			})
			.fail(function(data) {
				console.log('fail', data);
			});
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
			<h3>Manage Products</h3>


			<?php
			if (isset($_SESSION['adminusername'])) {
				$mysqli = new mysqli($db['hostname'],$db['username'],$db['password'],$db['database']);

					if ($mysqli->connect_errno) {
						printf("Connect failed: %s\n", $mysqli->connect_error);
						exit();
					}

					$products = $mysqli->query("SELECT * FROM ProjectProducts");

					if ($products) { ?>

						<table>
							<thead>
								<tr>
									<th>Name</th>
									<th>Price</th>
									<th>Description</th>
									<th>Img Loc</th>
									<th width="70">Actions</th>
								</tr>
							</thead>

							<tbody>
								<?php while ($row = $products->fetch_assoc()) { ?>
											<tr data-product-id="<?=$row['ProductID']?>">
												<td class="Name"><?= $row['Name']; ?></td>
												<td class="Price"><?= $row['Price']; ?></td>
												<td class="Description"><?= $row['Description']; ?></td>
												<td class="Image"><?= $row['Image']; ?></td>
												<td class="actions"><button class="editLine">Edit line</button><button class="saveLine hide">Save line</button></td>
											</tr>
								<?php } ?>
							</tbody>
						</table>

					<?php
						$products->close();
					} else {
						echo "failsql";
					}
			} else {
				echo "Oops! You are not logged in as an admin.";
			}
			?>
		</div>
		<?php require 'footer.php'; ?>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>