<?php 
session_start();
require_once 'config.php';
function checkLogin() {
	$username = $_SESSION['myusername'];
	$adminusername = $_SESSION['adminusername'];
	if (!$username && !$adminusername) {
	return 'You are not currently logged in.  <a href="login.php">Login/Register.</a>';
	} elseif (!$username) {
		return 'You are logged in as '.$adminusername.' (Admin).  <a href="logout.php">Logout.</a>';
	}
	else {
		return 'You are logged in as '.$username.'.  <a href="logout.php">Logout.</a>';
	}
}
function my_autoloader($class) {
    include 'includes/classes/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');
?>
