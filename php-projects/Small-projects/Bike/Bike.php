<?php
class Bike
{
    public $distanceTraveled = 0;
    function drive()
    {
        $this->distanceTraveled = $this->distanceTraveled + 1;
        return $this;
    }
    function reverse()
    {
        $this->distanceTraveled = $this->distanceTraveled - 1;
        return $this;
    }
    function displayInfo()
    {
        echo "Distance Traveled: " . $this->distanceTraveled;
        return $this;
    }
}
$bike1 = new bike();
$bike1->drive()->drive()->drive()->reverse()->displayInfo();