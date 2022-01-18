<?php
Class Prijs
{
    public $id;
    public $name;
    public $price;
    public $amount;

    public function __construct() {
        settype($this->id, "int");
        settype($this->price, "string");
        settype($this->amount, "int");
    }
}
?>