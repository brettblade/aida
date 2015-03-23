<?php 
require_once('models.php');
require_once('handlers.php');

session_start();

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
  	$return_data = rest_put($_SESSION[$model], $_GET["id"], $_post[$model_singular], $model_singular);
    break;
  case 'DELETE':
  	$return_data = rest_delete($_SESSION[$model], $_GET["id"]);
    break;
  default:
  	$return_data = '{"error": "something went wrong!"}';
    break;
}

// Futher changes - should return an http success code or http error code as well as json object
echo json_encode($return_data);