<?php

class Cart
{
    private $cartItems = [];

    public function addToCart(array $cartItems)
    {
        array_push($this->cartItems, $cartItems);
    }

    public function printReceipt()
    {
        if (count($this->cartItems) == 0) {
            echo "Your cart is empty!";
        } else {

            $finalPrice = 0;
            foreach ($this->cartItems as $cartItem) {
                echo $cartItem['item']->getName() . " | ";
                echo $cartItem['amount'];
                echo $cartItem['item']->SellingByKgValue() . "|";

                $total = $cartItem['amount'] * $cartItem['item']->getPrice();
                echo " total = " . $total . " denars" . "<br>";

                $finalPrice += $total;
            }

            echo "<br>";
            echo "Final price amount: " . $finalPrice . " denars";
        }
    }
}
