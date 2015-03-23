<?php 
require 'config/init.php';

if (isset($_SESSION['adminusername'])) {
	$mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$queryStr = "UPDATE ProjectProducts SET Name = '" . $_POST['Name'] . "', 
		Description = '" . $_POST['Description'] . "', 
		Price = '" . $_POST['Price'] . "',  
		Image = '" . $_POST['Img'] . "'
		WHERE ProductID = '" . $_POST['Id'] . "'";	

	echo $queryStr;
	$query = $mysqli->query($queryStr);
	echo "test";
	echo "test1";
}
