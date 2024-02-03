<?php

//1

$name = 'Kathrin';

if ($name == 'Kathrin') {
    echo "Hello Kathrin!";
} else {
    echo "Nice name!";
};

echo "<br/>";

$rating = 7;

if ($rating >= 1 && $rating <= 10) {
    echo "Thank you for rating!";
} else {
    echo "Invalid rating, only numbers between 1 and 10!";
};

echo "<hr>";


//2

$hour = date('H');


if ($name == 'Kathrin') {
    if ($hour < 12) {
        echo "Good morning Kathrin!";
    } elseif ($hour >= 12 && $hour < 19) {
        echo "Good afternoon Kathrin!";
    } else {
        echo "Good evening Kathrin!";
    };
} else {
    echo "Nice name!";
};


$rated = true;

echo "<br/>";

if (($rating >= 1 && $rating <= 10) && is_int($rating)) {
    if ($rated == true) {
        echo "You already voted!";
    } else {
        echo "Thanks for voting!";
    }
} else {
    echo "Invalid rating, only numbers between 1 and 10!";
};

echo "<hr>";



//3 

$voterArray = [
    "Ana" => [true, 9],
    "Sara" => [true, 7],
    "Tony" => [false, 5],
    "Volter" => [true, 3],
    "Lisa" => [false, 10],
    "Zoe" => [false, 15],
    "Dylan" => [true, 13],
    "Kate" => [true, 1],
    "Mia" => [true, 4],
    "Daniel" => [false, 2],
    "Marko" => [false, 8]
];

foreach ($voterArray as $key => $value) {

    if ($hour < 12) {
        echo "Good morning $key! <br>";
    } elseif ($hour >= 12 && $hour < 19) {
        echo "Good afternoon $key! <br>";
    } else {
        echo "Good evening $key! <br>";
    };


    if ($value[0] == true  &&  ($value[1] >= 1 && $value[1] <= 10)) {
        echo "You already voted with $value[1]! <br><br>";
    } elseif ($value[0] == false  &&  ($value[1] >= 1 && $value[1] <= 10)) {
        echo "Thanks for voting with a $value[1]! <br><br>";
    } else {
        echo "Invalid rating, only numbers between 1 and 10! <br><br>";
    };
};
