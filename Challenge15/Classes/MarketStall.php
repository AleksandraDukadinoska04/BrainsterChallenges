<?php

class MarketStall
{
    public $products = [];

    public function __construct(array $products)
    {
        $this->products = $products;
    }


    public function addProductToMarket(array $product)
    {
        $newValue = array_merge($this->products, $product);
        $this->products = $newValue;
    }

    public function getItem(string $itemName, int $amount)
    {
        if (array_key_exists(strtolower($itemName), $this->products)) {
            $item = $this->products[strtolower($itemName)];
            return ['amount' => $amount, 'item' => $item];
        } else {
            // return "Sorry, we dont have this product in our MarketStall!";
            return false;
        }
    }
}
