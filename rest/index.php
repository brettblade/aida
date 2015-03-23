<?php
require_once('./backend/models.php');

session_start();

// Used to populate session only on first run
if ($_SESSION["first_run_complete"] != true) {
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
?>

<!doctype html>
<html>
<head>
	<title>RESTful Frontend</title>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	$(document).ready(function() {
		var showForm = function(type, btnSelector, $row) {
			var $form;

			if (type == "person") {
				$form = $('.personForm');

				$form[0].reset();

				if ($row) {
					$('#firstname').val($row.data('firstname'));
					$('#surname').val($row.data('surname'));
				}
			} else {
				$form = $('.taskForm');

				$form[0].reset();

				if ($row) {
					$('#title').val($row.data('title'));
					$('#description').val($row.data('description'));
					$('#complete').prop('checked', $row.data('complete') == 'Complete' ? true : false);
				}
			}

			$form.find('button:not(.closeForm)').hide();
			$form.find(btnSelector).show();
			$form.slideDown();
		}

		$('.createNew').on('click', function() {
			showForm($(this).data('type'), '.submitCreate');
		});

		$('.editItem').on('click', function() {
			var $this = $(this),
					$row = $this.parent(),
					type = $row.data('type');
			
			showForm($row.data('type'), '.submitEdit', $row);
		});

		$('.submitCreate').on('click', function() {
				console.log('TODO: Create');
		});
		
		$('.submitEdit').on('click', function() {
				console.log('TODO: Edit');
		});

		$('.submitDelete').on('click', function() {
			var $this = $(this),
					$row = $this.parent(),
					title;

			if ($row.data('firstname')) {
				title = $row.data('firstname') + " " + $row.data('surname');
			} else {
				title = $row.data('title');
			}
			
			if (confirm("Do you really want to delete " + title + "?")) {
				console.log('TODO: Delete');
			}
		});

		$('.closeForm').on('click', function() {
			$(this).parent().slideUp();
		});
	});
	</script>
</head>
<body>

<h2>People</h2>

<button class="createNew" data-type="person">Create new person</button>
<form class="personForm" data-type="person" style="display: none;">
	<br />

	<label>
		Firstname: <input id="firstname" type="text" placeholder="Firstname" />
	</label>
	<br />

	<label>
		Surname: <input id="surname" type="text" placeholder="Surname" />
	</label>
	<br /><br />

	<button class="submitCreate">Create</button>
	<button class="submitEdit">Edit</button>
	<button class="closeForm">Close</button>
</form>


<ul>
	<?php
		for ($i=0; $i < count($_SESSION["people"]); $i++) { 
			if (isset($_SESSION["people"][$i]->firstname)) {
				// Further update - this could be done loads better - not readable
				echo "<li data-id='" . $_SESSION["people"][$i]->id . "' data-firstname='" . $_SESSION["people"][$i]->firstname . "' data-surname='" . $_SESSION["people"][$i]->surname . "' data-type='person'>" . $_SESSION["people"][$i]->firstname . " " . $_SESSION["people"][$i]->surname . " - <button class='editItem'>Edit</button><button class='submitDelete'>Delete</button></li>";
			}
		}
	?>
</ul>

<h2>Tasks</h2>

<button class="createNew" data-type="task">Create new task</button>
<form class="taskForm" data-type="task" style="display: none;">
	<br />

	<label>
		Title: <input id="title" type="text" placeholder="Title" />
	</label>
	<br />
	
	<label>
		Description: <input id="description" type="text" placeholder="Description" />
	</label>
	<br />
	
	<label>
		Complete: <input id="complete" type="checkbox" />
	</label>
	<br /><br />

	<button class="submitCreate">Create</button>
	<button class="submitEdit">Edit</button>
	<button class="closeForm">Close</button>
</form>

<ul>
	<?php
		for ($i=0; $i < count($_SESSION["tasks"]); $i++) { 
			if (isset($_SESSION["tasks"][$i]->title)) {
				$complete = ($_SESSION["tasks"][$i]->complete) ? 'Complete' : 'Not complete';

				if (isset($_SESSION["tasks"][$i]->description)) {
					$details = " - " . $complete . " - " . $_SESSION["tasks"][$i]->description;
				} else {
					$details = " - " . $complete;
				}

				// Further update - this could be done loads better - not readable
				echo "<li data-id='" . $_SESSION["tasks"][$i]->id . "' data-title='" . $_SESSION["tasks"][$i]->title . "' data-complete='" . $complete . "' data-description='" . $_SESSION["tasks"][$i]->description . "' data-type='task'>" . $_SESSION["tasks"][$i]->title . " " . $details . " - <button class='editItem'>Edit</button><button class='submitDelete'>Delete</button></li>";
			}
		}
	?>
</ul>
</body>
</html>