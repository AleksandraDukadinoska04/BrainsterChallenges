<?php
require_once __DIR__ . '/Forniture.php';
require_once __DIR__ . '/../Interfaces/Printable.php';


class Sofa extends Furniture
{
    private $seats;
    private $armrests;
    private $length_opened;

    public function __construct($widthParam, $lengthParam, $heightParam)
    {
        parent::__construct($widthParam, $lengthParam, $heightParam);
    }
    public function setSeats($seatsParam)
    {
        $this->seats = $seatsParam;
        return $this;
    }

    public function setArmrests($armrestsParam)
    {
        $this->armrests = $armrestsParam;
        return $this;
    }
    public function setLength_opened($length_openedParam)
    {
        $this->length_opened = $length_openedParam;
        return $this;
    }
    public function getSeats()
    {
        return $this->seats;
    }

    public function getArmrests()
    {
        return $this->armrests;
    }
    public function getLength_opened()
    {
        return $this->length_opened;
    }

    public function area_opened()
    {
        if ($this->getIs_for_sleeping()) {
            return $this->getWidth() * $this->length_opened . "cm2";
        }
        return "This sofa is for sitting only, it has " .  $this->armrests . " armrests and "  . $this->seats . " seats.";
    }
}
