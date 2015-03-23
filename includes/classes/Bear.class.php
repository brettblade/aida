<?php 

// class definition
class Bear {
// define properties /attributes
private $name;
private $weight;
private $age;


//Constructor called when instantiating bear. This demonstrates a default weight parameter
public function __construct($name){
//pass the parameter to this name attribute
$this->name = $name;
$this->weight = $weight;
}
//Destructor called when object leaves scope or script terminates
public function __destruct(){
//print "Destroying ".$this->name.""; //just for information
}
//Setters
public function setWeight($weight) {
$this->weight = $weight;
}

public function setAge($age) {
$this->age = $age;
}

//Getters
public function getName() {
return $this->name;
}
public function getAge() {
return $this->age;
}

public function getWeight() {
return $this->weight;
}

//Some actions
public function run() {
echo $this->name." is running...";
}

public function eat() {
echo $this->name." is eating...";
}


public function kill() {
echo $this->name." is killing prey...";
}

} ?> 