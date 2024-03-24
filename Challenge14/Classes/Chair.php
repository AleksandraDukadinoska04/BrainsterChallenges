<?php
require_once __DIR__ . '/Forniture.php';
require_once __DIR__ . '/../Interfaces/Printable.php';


class Chair extends Furniture
{
    public function __construct($widthParam, $lengthParam, $heightParam)
    {
        parent::__construct($widthParam, $lengthParam, $heightParam);
    }
}
