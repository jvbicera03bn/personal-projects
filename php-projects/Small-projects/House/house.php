<?php
class house
{    /* Attributes */
    public $location = NULL;
    public $price = NULL;
    public $lot = NULL;
    public $type = NULL;
    public $discount = NULL;

    public function __construct($location, $price, $lot, $type)
    {
        $this->location = $location;
        $this->price = $price;
        $this->lot = $lot;
        $this->type = $type;
        if ($type === 'Pre-selling') {
            $this->discount = 20;
        } else {
            $this->discount = 5;
        }
    }
    public function show_all()
    {   /* Computes the total price with the discount */
        $total_price = ($this->discount/100) * $this->price;

        echo "Location: " . $this->location ."<br>";
        echo "Price: " .$this->price . "<br>";
        echo "Lot: " . $this->lot . "sqm <br>";
        echo "Type: " . $this->type . "<br>";
        echo "Discount:" . $this->discount . "% <br>";
        echo "Total Price: " . $total_price . "<br>";
        echo "<br>";
    }
}

$house1 = new house('Laguna',10050030,100,'Pre-selling');
$house2 = new house('La Union', 1500000, 100, 'Pre-selling');
$house3 = new house('Metro Manila', 1000000, 150, 'Ready for Occupancy');
$house4 = new house('Pasay', 500100000, 200, 'Ready for Occupancy');
$house5 = new house('Cavite', 10050030, 150, 'Pre-selling');

$house1->show_all();
$house2->show_all();
$house3->show_all();
$house4->show_all();
$house5->show_all();

?> 