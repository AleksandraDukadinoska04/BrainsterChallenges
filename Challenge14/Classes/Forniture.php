<?php

require_once __DIR__ . '/../Interfaces/Printable.php';


class Furniture implements Printable
{
    private $width;
    private $length;
    private $height;
    private $is_for_seating = false;
    private $is_for_sleeping = false;

    public function __construct($widthParam, $lengthParam, $heightParam)
    {
        $this->width = $widthParam;
        $this->length = $lengthParam;
        $this->height = $heightParam;
    }

    public function setIs_for_seating($is_for_seatingParam)
    {
        $this->is_for_seating = $is_for_seatingParam;
        return $this;
    }

    public function setIs_for_sleeping($is_for_sleepingParam)
    {
        $this->is_for_sleeping = $is_for_sleepingParam;
        return $this;
    }

    public function getIs_for_seating()
    {
        return $this->is_for_seating;
    }

    public function getIs_for_sleeping()
    {
        return $this->is_for_sleeping;
    }
    public function getWidth()
    {
        return $this->width;
    }

    public function area()
    {
        return  $this->width * $this->length;
    }
    public function volume()
    {
        return $this->area() * $this->height;
    }
    public function print()
    {
        $forsleeping = $this->is_for_sleeping ? "for sleeping" : "sitting only";
        echo get_class($this) .  ', ' . $forsleeping . ', ' . $this->area() . 'cm2';
    }
    public function sneakpeek()
    {
        echo get_class($this);
    }
    public function fullinfo()
    {
        $forsleeping = $this->is_for_sleeping ? "for sleeping" : "sitting only";
        echo get_class($this) . ', ' . $forsleeping . ', ' . $this->area() . 'cm2, width:' . $this->width . 'cm, length:' . $this->length . 'cm, height:' . $this->height . 'cm';
    }
}
