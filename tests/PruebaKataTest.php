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

}