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
	return '{"error": "Item not found"}';
}

// Create
function rest_post($session_model, $data, $type)
{
	if ($type == "person") {
		$new_person = new Person($data["id"], $data["firstname"], $data["surname"]);

		array_push($session_model, $new_person);
	} else if ($type == "task") {
		// if description is set then it's an advanced task
		if (isset($data["description"])) {
			$new_task = new AdvancedTask($data["id"], $data["title"], $data["complete"], $data["description"]);
		} else {
			$new_task = new Task($data["id"], $data["title"], $data["complete"]);
		}

		array_push($session_model, $new_task);
	} else {
		return '{"error": "Unknown model type"}';
	}

	// if it gets here it was added successfully
	return '{"success": "Item was added successfully"}';
}

// UPDATE
function rest_put($session_model, $id, $data, $type)
{
	if (in_array($type, array("person", "task"))) {
		for ($i=0; $i < count($session_model); $i++) { 
			if($session_model[$i]->id == $id) {
				// further changes - check if the value has changed before actually changing it
				if ($type == "person") {
						$session_model[$i]->firstname = $data["firstname"];
						$session_model[$i]->surname = $data["surname"];
				} else if ($type == "task") {
						$session_model[$i]->title = $data["title"];
						$session_model[$i]->complete = $data["complete"];

					// If these are set it's an advanced tasks and the description should be updated too
					if (isset($data["description"]) && isset($session_model[$i]->description)) {
						$session_model[$i]->description = $data["description"];
					}
				}

				return '{"success": "Item was updated successfully"}';
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
	return '{"error": "Item not found"}';
}