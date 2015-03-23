<?php
// CRUD Operations

// Read
function rest_get($session_model, $id)
{
	for ($i=0; $i < count($session_model); $i++) { 
		if($session_model[$i]->id == $id) {
			return $session_model[$i];
		}
	}
	return '{"error": "User not found"}';
}

// Create
function rest_post($session_model, $data, $type)
{
	if ($type == "person") {
		// create a new person
	} else if ($type == "task") {
		// create a new task
	} else {
		return '{"error": "Unknown model type"}';
	}
}

// UPDATE
function rest_put($session_model, $id, $data, $type)
{
	if (in_array($type, array("person", "task"))) {
		for ($i=0; $i < count($session_model); $i++) { 
			if($session_model[$i]->id == $id) {
				if ($type == "person") {
					// update a person
					
				} else if ($type == "task") {
					// update a task
				}

				return $session_model[$i];
			}
		}
	} else {
		return '{"error": "Unknown model type"}';
	}
}

// DELETE
function rest_delete($session_model, $id)
{
	for ($i=0; $i < count($session_model); $i++) { 
		if($session_model[$i]->id == $id) {
			unset($session_model[$i]);
			return '{"success": "Item has been removed"}';
		}
	}
	return '{"error": "User not found"}';
}