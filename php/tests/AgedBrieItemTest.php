<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use GildedRose\items\ItemFactory;

class AgedBrieItemTest extends TestCase
{
    public function testAgedBrieUpdateWhenSellInPositive(): void
    {
        $item = ItemFactory::createItem('Aged Brie', 2, 0);
        $item->update();

        $this->assertSame(1, $item->quality);
        $this->assertSame(1, $item->sellIn);
    }

    public function testAgedBrieUpdateWhenSellInNegative(): void
    {
        $item = ItemFactory::createItem('Aged Brie', -5, 3);
        $item->update();

        $this->assertSame(5, $item->quality);
        $this->assertSame(-6, $item->sellIn);
    }

    public function testAgedBrieUpdateWhenQualityIs50(): void
    {
        $item = ItemFactory::createItem('Aged Brie', -5, 50);
        $item->update();

        $this->assertSame(50, $item->quality);
        $this->assertSame(-6, $item->sellIn);
    }
}