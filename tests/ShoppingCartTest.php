<?php

declare(strict_types=1);

namespace Deg540\PruebaKataPHP\Test;

use Deg540\PruebaKataPHP\ShoppingCart;
use PHPUnit\Framework\TestCase;

final class ShoppingCartTest extends TestCase
{
    public ShoppingCart $shoppingCart;
    protected function setUp(): void
    {
        parent::setUp();
        $this->shoppingCart = new ShoppingCart();
        $this->shoppingCart->modifyShoppingCart('añadir pan ');
        $this->shoppingCart->modifyShoppingCart('añadir pan 1');
        $this->shoppingCart->modifyShoppingCart('añadir chocolate ');
    }

    /**
     * @test
     */
    public function givenProductsReturnsShoppingCartStatus(): void
    {

        $this->assertEquals('chocolate x4, pan x3', $this->shoppingCart->modifyShoppingCart('añadir chocolate 2'));
    }

    /**
     * @test
     */
    public function givenProductsToAddAndManyToDeleteReturnsShoppingCartStatus(): void
    {
        $this->shoppingCart->modifyShoppingCart('eliminar pan');
        $this->assertEquals('', $this->shoppingCart->modifyShoppingCart('eliminar chocolate'));

    }
    /**
     * @test
     */
    public function givenAnyProductThatDoesntExistToDeleteReturnsMessage(): void
    {
        $this->assertEquals('El producto seleccionado no existe', $this->shoppingCart->modifyShoppingCart('eliminar huevo'));
    }

    /**
     * @test
     */
    public function givenEmptyOrderReturnsCartEmptied(): void
    {
        $this->assertEquals('', $this->shoppingCart->modifyShoppingCart('vaciar'));
    }


}