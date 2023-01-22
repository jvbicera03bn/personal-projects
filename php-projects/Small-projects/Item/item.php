<?php
class item{

public $name = NULL;
public $price = NULL;
public $stock = NULL;
public $sold = NULL;

public function __construct($name,$price,$stock,){
    $this->name = $name;
    $this->price = $price;
    $this->stock = $stock;
    $this->sold = 0;
}
public function logDetails(){
    echo $this->name . "'s Price is: ". $this->price . " Stock is: ".$this->stock . " and the Number of sold ".$this->name." is ". $this->sold."<br>";   
}
public function buy(){
    echo "Buying " . $this->name . "<br>";
    if ($this->stock > 0){
        $this->stock = $this->stock - 1;
        $this->sold = $this->sold + 1;
    } else {
        echo "No stock available" . "<br>";
    }
}
public function return(){
    if ($this->sold > 0){
        echo "Returning " . $this->name . "<br>";
        $this->stock = $this->stock + 1;
        $this->sold = $this->sold - 1;
    }else{
        echo "Your ". lcfirst($this->name) ." is not eligible for return" . "<br>";
    }
}
}

$Ballpen = new Item("Ballpen",10,20);
$Paper = new Item("Paper",10, 5);
$Bag = new Item("Bag",10, 2);
/* Couldve put them into a loop but i liked to keep it simple */
/* have the fist instance buy three times and return once and log details */
echo "First Instance <br>";
$Ballpen->logDetails();
$Ballpen->buy();
$Ballpen->buy();
$Ballpen->buy();
$Ballpen->return();
$Ballpen->logDetails();
echo "<br> Second Instance <br> ";
/* have the second instance buy twice return twice and log details */
$Paper->logDetails();
$Paper->buy();
$Paper->buy();
$Paper->return();
$Paper->return();
$Paper->logDetails();
echo "<br> Third Instance <br>";
/* Have the third instace return three times and log details */
$Bag->logDetails();
$Bag->return();
$Bag->return();
$Bag->return();
$Bag->logDetails();

?>