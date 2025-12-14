<?php
declare(strict_types=1);

namespace Tests;

use GildedRose\items\ConjuredItem;
use PHPUnit\Framework\TestCase;
use GildedRose\items\ItemFactory;

class ConjuredItemTest extends TestCase
{

    /**
     * @dataProvider conjuredItemDataProvider
     */
    public function testAgedBrieUpdate(int $initialSellIn, int $initialQuality, int $expectedSellIn, int $expectedQuality): void
    {
        $item = new ConjuredItem('Conjured cheese', $initialSellIn, $initialQuality);
        $item->update();
        
        $this->assertSame($expectedQuality, $item->quality);
        $this->assertSame($expectedSellIn, $item->sellIn);
    }

    public function conjuredItemDataProvider(): array{
        return [
            'sellIn is positive' => [
                'initialSellIn' => 2,
                'initialQuality' => 15,
                'expectedSellIn' => 1,
                'expectedQuality' => 13,
            ],
            'sellIn is negative' => [
                'initialSellIn' => -5,
                'initialQuality' => 10,
                'expectedSellIn' => -6,
                'expectedQuality' => 6,
            ],
            'quality at 0, should stay at 0' => [
                'initialSellIn' => -5,
                'initialQuality' => 0,
                'expectedSellIn' => -6,
                'expectedQuality' => 0,
            ],
            'quality at 1, should cap at 0' => [
                'initialSellIn' => -1,
                'initialQuality' => 1,
                'expectedSellIn' => -2,
                'expectedQuality' => 0,
            ],
        ];
    }
}