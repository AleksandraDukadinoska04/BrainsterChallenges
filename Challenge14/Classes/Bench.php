<?php
require_once __DIR__ . '/Sofa.php';
require_once __DIR__ . '/../Interfaces/Printable.php';


class Bench extends Sofa
{
    public function __construct($widthParam, $lengthParam, $heightParam)
    {
        parent::__construct($widthParam, $lengthParam, $heightParam);
    }
}
