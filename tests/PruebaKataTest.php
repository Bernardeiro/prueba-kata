<?php

declare(strict_types=1);

namespace Deg540\PruebaKataPHP\Test;

use Deg540\PruebaKataPHP\PruebaKata;
use PHPUnit\Framework\TestCase;

final class PruebaKataTest extends TestCase
{
    private PruebaKata $pruebaKata;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pruebaKata = new PruebaKata();
    }

    /**
     * @test
     * @throws \Exception
     */
    public function givenSingleNumberReturnsSameNumber(): void
    {
        $this->assertEquals(1, $this->pruebaKata->add('1'));
    }

    /**
     * @test
     * @throws \Exception
     */
    public function givenNumbersReturnsAddNumbers(): void
    {
        $this->assertEquals(6, $this->pruebaKata->add('1,2,3'));
    }

    /**
     * @test
     * @throws \Exception
     */
    public function givenNumbersSeparatedByCommasAndLineBreakReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->pruebaKata->add('1\n2,3'));
    }

}