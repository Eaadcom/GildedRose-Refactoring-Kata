<?php
declare(strict_types=1);

namespace Tests;

use GildedRose\items\AgedBrieItem;
use GildedRose\items\BackstagePassesItem;
use GildedRose\items\ConjuredItem;
use GildedRose\items\RegularItem;
use GildedRose\items\SulfurasItem;
use PHPUnit\Framework\TestCase;
use GildedRose\items\ItemFactory;

class ItemFactoryTest extends TestCase
{

    /**
     * @dataProvider itemFactoryClassDataProvider
     */
    public function testItemFactoryCreateItemType($initialName, $expectedClass): void{
        $item = ItemFactory::createItem($initialName, 0, 0);

        $this->assertInstanceOf($expectedClass, $item);
    }

     public function itemFactoryClassDataProvider(): array{
        return [
            "Aged Brie" => [
                "initialName" => "Aged Brie",
                "expectedClass" => AgedBrieItem::class
            ],
            "Regular Item" => [
                "initialName" => "Iron Buckler",
                "expectedClass" => RegularItem::class
            ],
            "Conjured Item" => [
                "initialName" => "Conjured slippers",
                "expectedClass" => ConjuredItem::class
            ],
            "Sulfuras Item" => [
                "initialName" => "Sulfuras, Hand of Ragnaros",
                "expectedClass" => SulfurasItem::class
            ],
            "Backstage Passes Item" => [
                "initialName" => "Backstage passes",
                "expectedClass" => BackstagePassesItem::class
            ],
        ];
     }
}