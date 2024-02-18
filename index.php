<?php
//Part 1
echo "<h2>Part 1 </h2>";
echo "<h3>Converting decimal number to a binary number: </h3>";

function decimalToBinary($decimal)
{

    if (preg_match('/[-]/', $decimal)) {
        $decimal = substr($decimal, 1);
        $binary = '';

        while ($decimal > 0) {

            $remainder = $decimal % 2;
            $binary = $remainder . $binary;
            $decimal = (int)($decimal / 2);
        }
        return "-" . $binary;
    } else {
        $binary = '';

        while ($decimal > 0) {

            $remainder = $decimal % 2;
            $binary = $remainder . $binary;
            $decimal = (int)($decimal / 2);
        }
        return $binary;
    }
}

$number = 19;
echo  $number;
echo " ==> ";
echo decimalToBinary($number);


echo "<h3>Converting decimal number to a roman number: </h3>";
function decimalToRoman($decimalNumber)
{
    $roman = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    ];

    if ($decimalNumber > 3999) {
        return "Error: Number exceeds maximum limit (3999)";
    }

    if (preg_match('/[-]/', $decimalNumber)) {
        echo "Negative number can not convert into roman number!";
    } else {

        $result = '';

        foreach ($roman as $roman => $decimal) {
            while ($decimalNumber >= $decimal) {
                $result .= $roman;
                $decimalNumber -= $decimal;
            }
        }

        return $result;
    }
}

$number = 78;
echo  $number;
echo " ==> ";
echo decimalToRoman($number);




//Part 2
echo "<hr>";
echo "<h2>Part 2 </h2>";
echo "<h3>Converting binary number to a decimal number: </h3>";

function binaryToDecimal($binary)
{
    if (preg_match('/[-]/', $binary)) {
        $binary = substr($binary, 1);
        $decimal = bindec($binary);
        return "-" . $decimal;
    } else {
        $decimal = bindec($binary);
        return $decimal;
    }
}

$number = 10011;
echo  $number;
echo " ==> ";
echo binaryToDecimal($number);



echo "<h3>Converting roman number to a decimal number: </h3>";
function romanToDecimal($romanNumber)
{
    $roman = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    ];

    $decimal = 0;

    if (preg_match('/[-]/', $romanNumber)) {
        echo "Negative roman numbers doesnt exist!";
    } else {

        for ($i = 0; $i < strlen($romanNumber); $i++) {
            if ($i < strlen($romanNumber) - 1 && $roman[$romanNumber[$i]] < $roman[$romanNumber[$i + 1]]) {
                $decimal -= $roman[$romanNumber[$i]];
            } else {
                $decimal += $roman[$romanNumber[$i]];
            }
        }

        return $decimal;
    }
}
$number = "MIV";
echo  $number;
echo " ==> ";
echo romanToDecimal($number);




//Part 3
echo "<hr>";
echo "<h2>Part 3 </h2>";
echo "<h3>Cheking if a given number is decimal, roman or binary, and converting the number into the other two types of numbers: </h3>";


function decimalToRomanExtended($decimalNumber)
{
    $roman = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    ];

    if ($decimalNumber > 3999999) {
        return "Error: Number exceeds maximum limit (3999999)";
    }

    if (preg_match('/[-]/', $decimalNumber)) {
        echo "Negative number can not convert into roman number!";
    } else {

        $result = '';

        foreach ($roman as $roman => $decimal) {
            while ($decimalNumber >= $decimal) {
                $result .= $roman;
                $decimalNumber -= $decimal;
            }
        }

        return $result;
    }
}


function check($number)
{
    if (preg_match('/^[01]+$/', $number)) {
        echo "The number $number is Binary <br>";
        echo "Decimal: " . binaryToDecimal($number);
        echo "<br>";
        echo "Roman: " . decimalToRomanExtended(binaryToDecimal($number));
        echo "<br>";
    } elseif (preg_match('/^[-+]?[0-9]+$/', $number)) {
        if (preg_match('/^[+-]0[0-9]+$/', $number)) {
            echo "Error: Decimal number cannot start with zero. <br>";
        } else {
            echo "The number $number is Decimal <br>";
            echo "Binary: " . decimalToBinary($number);
            echo "<br>";
            echo "Roman: ";
            echo decimalToRomanExtended($number);
            echo "<br>";
        }
    } elseif (preg_match('/^[IVXLCDM]+$/', $number)) {
        echo "The number $number is Roman <br>";
        echo "Decimal: " . romanToDecimal($number);
        echo "<br>";
        echo "Binary: " . decimalToBinary(romanToDecimal($number));
        echo "<br>";
    } else {
        echo "Invalid input: Not a valid number. <br>";
    }
}


$numbers = ["-10", "+20", "01", "10101", "XVI", "313", "11001", "100", "XXI", "CIX"];

foreach ($numbers as $number) {
    check($number);
    echo "<br>";
}



//Bonus
echo "<hr>";
echo "<h2>Bonus </h2>";
echo "<h3>Converting decimal number to a binary number with recursive function: </h3>";

function decimalToBinaryRecursive($number)
{
    if (preg_match('/[-]/', $number)) {
        $number = substr($number, 1);
        if ($number == 0) {
            return "";
        } else {
            return "-" . decimalToBinary(intdiv($number, 2)) . ($number % 2);
        }
    } else {
        if ($number == 0) {
            return "";
        } else {
            return decimalToBinary(intdiv($number, 2)) . ($number % 2);
        }
    }
}

$number = 13;
echo  $number;
echo " ==> ";
echo decimalToBinaryRecursive($number);
