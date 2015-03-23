<?php 
	require 'config/init.php';
	unset ($_SESSION['myusername']);
	unset ($_SESSION['adminusername']);
	header("Location: index.php");
?>
