<?php

namespace Deg540\PruebaKataPHP;

class ShoppingCart
{
    public $shoppingList = [];
    public function modifyShoppingCart($product)
    {
        if (strpos($product, 'añadir') !== false) {
            $product = $this->suprimirTextoAnnadir($product);
            $productParts = explode(' ', $product);

            $this->annadirCantidadAlProducto($productParts);
        }

        else if (strpos($product, 'eliminar') !== false) {
            $product = $this->suprimirTextoEliminar($product);
            $productParts = explode(' ', $product);

            if ($this->existeProducto($productParts[0])) {
                unset($this->shoppingList[$productParts[0]]);
            } else{
                return 'El producto seleccionado no existe';
            }
        }
        else if (strpos($product, 'vaciar') !== false) {
            $this->shoppingList = [];
        }
        else {
            return 'El comando no existe';
        }
        $result = $this->prepararListadoDelCarrito();

        return implode(', ', $result);
    }

    /**
     * @return array
     */
    public function prepararListadoDelCarrito(): array
    {
        ksort($this->shoppingList);
        $result = [];
        foreach ($this->shoppingList as $item => $quantity) {
            $result[] = $item . ' x' . $quantity;
        }
        return $result;
    }

    /**
     * @param array $productParts
     * @return void
     */
    public function annadirCantidadAlProducto(array $productParts): void
    {
        if (!$this->existeProducto($productParts[0])) {
            $this->shoppingList[$productParts[0]] = (int)$productParts[1] + 1;
        } else {
            $this->shoppingList[$productParts[0]] += (int)$productParts[1] + 1;
        }
    }

    /**
     * @param $key
     * @return bool
     */
    public function existeProducto($key): bool
    {
        return array_key_exists($key, $this->shoppingList);
    }

    /**
     * @param $product
     * @return array|string|string[]
     */
    public function suprimirTextoAnnadir($product): string|array
    {
        $product = str_replace('añadir ', '', $product);
        return $product;
    }

    /**
     * @param $product
     * @return array|string|string[]
     */
    public function suprimirTextoEliminar($product): string|array
    {
        $product = str_replace('eliminar ', '', $product);
        return $product;
    }


}