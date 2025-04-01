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

        $result = $shoppingCart->modifyShoppingCart('añadir pan');

        $this->assertEquals('pan x1', $result);
    }

}