<?php

namespace Deg540\PruebaKataPHP;

class ShoppingCart
{
    public $shoppingList = [];
    public function modifyShoppingCart($product)
    {
        if (strpos($product, 'añadir') !== false) {
            $product = str_replace('añadir ', '', $product);
            $productParts = explode(' ', $product);

            if (!array_key_exists($productParts[0], $this->shoppingList)) {
                $this->shoppingList[$productParts[0]] = (int)$productParts[1] + 1;
            } else {
                $this->shoppingList[$productParts[0]] += (int)$productParts[1] + 1;
            }
        }
        ksort($this->shoppingList);
        $result = [];
        foreach ($this->shoppingList as $item => $quantity) {
            $result[] = $item . ' x' . $quantity;
        }

        return implode(', ', $result);
    }
}