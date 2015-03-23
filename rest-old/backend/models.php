<?php
class Person
{
	public $id;
	public $firstname;
	public $surname;

	public function __construct($id, $firstname, $surname)
	{
		$this->id = $id;
		$this->firstname = $firstname;
		$this->surname = $surname;
	}
}

class Task
{
	public $id;
	public $title;
	public $complete;

	public function __construct($id, $title, $complete)
	{
		$this->id = $id;
		$this->title = $title;
		$this->complete = $complete;
	}
}


class AdvancedTask extends Task
{
	public $description;

	public function __construct($id, $title, $complete, $description)
	{
		parent::__construct($id, $title, $complete);
		$this->description = $description;
	}
}