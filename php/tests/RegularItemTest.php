<?php
declare(strict_types=1);

namespace Tests;

use GildedRose\items\RegularItem;
use PHPUnit\Framework\TestCase;

class RegularItemTest extends TestCase
{

    /**
     * @dataProvider regularItemDataProvider
     */
    public function testRegularItemUpdate(int $initialSellIn, int $initialQuality, int $expectedSellIn, int $expectedQuality): void
    {
        $item = new RegularItem('Squeeky Chair', $initialSellIn, $initialQuality);
        $item->update();
        
        $this->assertSame($expectedQuality, $item->quality);
        $this->assertSame($expectedSellIn, $item->sellIn);
    }

    public function regularItemDataProvider(): array{
        return [
            'sellIn is positive' => [
                'initialSellIn' => 2,
                'initialQuality' => 15,
                'expectedSellIn' => 1,
                'expectedQuality' => 14,
            ],
            'sellIn is negative' => [
                'initialSellIn' => -5,
                'initialQuality' => 10,
                'expectedSellIn' => -6,
                'expectedQuality' => 8,
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