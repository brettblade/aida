<?php 
require_once('models.php');
require_once('handlers.php');
session_start();

// Used to populate session store
if ($_SESSION["first_run_complete"] != true) {
	echo "Session data initialised";
	$_SESSION["first_run_complete"] = true;

	$person_one = new Person(1, "Brett", "Markell");
	$person_two = new Person(2, "Karl", "Markell");
	$person_three = new Person(3, "Julie", "Markell");

	$_SESSION["people"] = array($person_one, $person_two, $person_three);

	$task_one = new Task(1, "Go Shopping", false);
	$task_two = new Task(2, "Revise", false);
	$task_three = new AdvancedTask(3, "Upload assignment", false, "This Assignment needs be uploaded by tomorrow!");

	$_SESSION["tasks"] = array($task_one, $task_two, $task_three);
}

$model = $_GET["model"];
$model_singular = ($model == "people") ? "person" : "task";

switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
  	$return_data = rest_get($_SESSION[$model], $_GET["id"]);
    break;
  case 'POST':
  	$return_data = rest_post($_SESSION[$model], $_post[$model_singular], $model_singular);
    break;
  case 'PUT':
  	$return_data = rest_put($_SESSION[$model], $_GET["id"], $_post[$model_singular], s$model_singular);
    break;
  case 'DELETE':
  	$return_data = rest_delete($_SESSION[$model], $_GET["id"]);
    break;
  default:
  	$return_data = '{"error": "something went wrong!"}';
    break;
}

echo json_encode($return_data);