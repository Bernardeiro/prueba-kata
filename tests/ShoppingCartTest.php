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
    public function givenProductReturnsShoppingCartStatus(): void
    {
        $shoppingCart = new ShoppingCart();

        $shoppingCart->modifyShoppingCart('añadir pan ');
        $result = $shoppingCart->modifyShoppingCart('añadir pan ');
        $result = $shoppingCart->modifyShoppingCart('añadir chocolate ');
        $this->assertEquals('chocolate x1, pan x2', $result);
    }

}