<?php
require_once __DIR__ . '/Classes/Forniture.php';
require_once __DIR__ . '/Classes/Sofa.php';
require_once __DIR__ . '/Classes/Bench.php';
require_once __DIR__ . '/Classes/Chair.php';
require_once __DIR__ . '/Interfaces/Printable.php';


// PART 1
echo "<h1>PART 1: </h1>";

$bed = new Furniture(100, 200, 50);
$bed->setIs_for_seating(true)->setIs_for_sleeping(true);
print_r($bed);
echo "<br>";
echo "Area: " . $bed->area() . "cm2";
echo "<br>";
echo "Volume: " . $bed->volume() . "cm2";



// PART 2
echo "<hr>";
echo "<h1>PART 2: </h1>";

$sofa1 = new Sofa(50, 100, 20);
$sofa1->setIs_for_sleeping(false)->setIs_for_seating(true)->setSeats(3)->setArmrests(2);
print_r($sofa1);
echo "<br>";
echo "Area: " . $sofa1->area() . "cm2";
echo "<br>";
echo "Volume: " . $sofa1->volume() . "cm2";
echo "<br>";
echo "Area Opened: " . $sofa1->area_opened();
echo "<br>";

$sofa1->setIs_for_sleeping(true)->setLength_opened(50);
echo "<br>";
echo "Area Opened: " .  $sofa1->area_opened();



// PART 3
echo "<hr>";
echo "<h1>PART 3: </h1>";

$bench1 = new Bench(50, 100, 20);
$bench1->setSeats(3)->setArmrests(2)->setIs_for_seating(true);
$bench1->print();
echo "<br>";
$bench1->sneakpeek();
echo "<br>";
$bench1->fullinfo();
echo "<br>";
echo "<br>";


$chair1 = new Chair(100, 200, 50);
$chair1->setIs_for_seating(true);
$chair1->print();
echo "<br>";
$chair1->sneakpeek();
echo "<br>";
$chair1->fullinfo();
