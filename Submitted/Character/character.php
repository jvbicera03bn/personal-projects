<?php
class character
{
    public $health = 100;
    public $stamina = 100;
    public $mana = 100;

    public function walk()
    {
        $this->stamina = $this->stamina - 1;
        return $this;
    }
    public function run()
    {
        $this->stamina = $this->stamina - 3;
        return $this;
    }
    public function show_stat()
    {
        echo "Below is your current stats <br>";
        echo "Health: " . $this->health. "<br>";
        echo "Stamina: " . $this->stamina. "<br>";
        echo "Mana: " . $this->mana . "<br>";
    }
}
$newCharacter = new character;
$newCharacter->walk()->walk()->walk()->run()->run()->show_stat();
class shaman extends character
{
    public $health = 150;
    public function heal(){
        $this->stamina = $this->stamina + 5;
        $this->health = $this->health + 5;
        $this->mana = $this->mana + 5;
        return $this;
    }
}
$shaman = new shaman();
$shaman->walk()->walk()->walk()->run()->run()->heal()->show_stat();

class swordsMan extends character
{
    public $health = 170;

    public function slash()
    { 
        $this->mana = $this->mana - 10;
        return $this;
    }
    public function revive()
    {
        $this->mana = 100;
        return $this;
    }
    public function show_stat(){
        echo "I am powerful <br>";
        parent::show_stat();
    }
}
$swordsMan = new swordsMan();
$swordsMan->walk()->walk()->walk()->run()->run()->slash()->slash()->revive()->show_stat();
/* made sure that the code below doesnt work */
/* $newCharacter->heal()->slash(); */