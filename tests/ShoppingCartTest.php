<?php

declare(strict_types=1);

namespace Deg540\PruebaKataPHP\Test;

use Deg540\PruebaKataPHP\ShoppingCart;
use PHPUnit\Framework\TestCase;

final class ShoppingCartTest extends TestCase
{
    /**
     * @test
     */
    public function givenProductsReturnsShoppingCartStatus(): void
    {
        $shoppingCart = new ShoppingCart();

        $shoppingCart->modifyShoppingCart('añadir pan ');
        $shoppingCart->modifyShoppingCart('añadir pan 1');
        $result = $shoppingCart->modifyShoppingCart('añadir chocolate ');
        $this->assertEquals('chocolate x1, pan x3', $result);
    }

    /**
     * @test
     */
    public function givenProductsToAddAndOneToDeleteReturnsShoppingCartStatus(): void
    {
        $shoppingCart = new ShoppingCart();

        $shoppingCart->modifyShoppingCart('añadir pan ');
        $shoppingCart->modifyShoppingCart('añadir pan 1');
        $shoppingCart->modifyShoppingCart('añadir chocolate ');
        $result = $shoppingCart->modifyShoppingCart('eliminar pan');
        $this->assertEquals('chocolate x1', $result);

    }


}