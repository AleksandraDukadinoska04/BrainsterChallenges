<?php
require_once __DIR__ . "/autoload.php";



// PART 1
echo "<h1>Part 1:</h1>";


$orange = new Orange('Orange', 30, true);
$orange->print();
echo "<br>";
$potato = new Potato('Potato', 20, true);
$potato->print();
echo "<br>";
$nuts = new Nuts('Nuts', 20, false);
$nuts->print();



// PART 2
echo "<hr>";
echo "<h1>Part 2:</h1>";

$marketStall = new MarketStall(['orange' => $orange, 'potato' => $potato]);
var_dump($marketStall);
echo "<br>";
echo "<br>";
$marketStall->addProductToMarket(['nuts' => $nuts]);
var_dump($marketStall);
echo "<br>";
echo "<br>";
var_dump($marketStall->getItem('Orange', 4));
echo "<br>";
echo "<br>";
var_dump($marketStall->getItem('apple', 2));



// PART 3
echo "<hr>";
echo "<h1>Part 3:</h1>";

$cart2 = new Cart();
print_r($cart2->printReceipt());
echo "<br>";
echo "<br>";


$cart = new Cart();
$cart->addToCart($marketStall->getItem('orange', 3));
$cart->addToCart($marketStall->getItem('potato', 5));
$cart->addToCart($marketStall->getItem('nuts', 2));

print_r($cart->printReceipt());



// PART 4
echo "<hr>";
echo "<h1>Part 4:</h1>";
$orange = new Orange('Orange', 35, true);
$potato = new Potato('Potato', 240, false);
$nuts = new Nuts('Nuts', 850, true);
$kiwi = new Kiwi('Kiwi', 670, false);
$pepper = new Pepper('Pepper', 330, true);
$raspberry = new Raspberry('Raspberry', 555, false);

$marketStall1 = new MarketStall(['orange' => $orange, 'potato' => $potato, 'nuts' => $nuts]);
$marketStall2 = new MarketStall(['kiwi' => $kiwi, 'pepper' => $pepper, 'raspberry' => $raspberry]);



$cart1 = new Cart();
$cart1->addToCart($marketStall1->getItem('potato', 2));
$cart1->addToCart($marketStall2->getItem('kiwi', 2));
$cart1->addToCart($marketStall2->getItem('pepper', 3));
$cart1->addToCart($marketStall1->getItem('nuts', 2));
$cart1->addToCart($marketStall2->getItem('raspberry', 3));

print_r($cart1->printReceipt());
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
