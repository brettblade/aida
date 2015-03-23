<div class="four columns clearfix">
			<div class="three columns alpha">
				<h3>Navigation</h3>
				<br />
				<a href="index.php" class="full-width button">Index</a>
				<br />
				<a href="gallery.php" class="full-width button">Gallery</a>
				<br />
				<a href="about.php" class="full-width button">About/Map</a>
				<br />
				<a href="contact.php" class="full-width button">Contact</a>
				<br />
				<a href="initialtests.php" class="full-width button">Initial Tests</a>
				<br />
				<a href="myaccount.php" class="full-width button">My Account</a>
				<br />
				<a href="OOtest.php" class="full-width button">OOtest.php</a>
				<br />
				<a href="xml.php" class="full-width button">XML/JSON</a>
				<br />
				<a href="gettweets.php" class="full-width button">Get Tweets</a>
				<?php
					if (isset($_SESSION['adminusername'])) {
						print '<a href="admin.php" class="full-width button">Admin</a>';
					}
				?>
			</div>
		</div>