<?php

abstract class Product
{
    private $name;
    private $price;
    private $sellingByKg;

    public function __construct(string $name, int $price, bool $sellingByKg)
    {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setSellingByKg($sellingByKg)
    {
        $this->sellingByKg = $sellingByKg;
        return $this;
    }
    public function getSellingByKg()
    {
        return $this->sellingByKg;
    }

    public function SellingByKgValue()
    {
        if ($this->sellingByKg) {
            return " kgs ";
        }
        return " gunny sack ";
    }

    public function print()
    {
        echo $this->name . ", " . $this->price . "denars, " . $this->SellingByKgValue();
    }
}
