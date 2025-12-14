<?php
declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\items\RegularItem;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new RegularItem('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo', $items[0]->name);
    }

    public function testUpdateQualityThrowsErrorWhenItemNotUpdatable(): void
    {
        $notUpdatableItem = new Item('Nonexistent Boots', 5, 10);
        $gildedRose = new GildedRose([$notUpdatableItem]);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Item "Nonexistent Boots" is not an instance of UpdateableInterface');
        
        $gildedRose->updateQuality();
    }
}
