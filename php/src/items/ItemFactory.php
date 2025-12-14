<?php
declare(strict_types=1);

namespace GildedRose\items;

use GildedRose\Item;
use GildedRose\items\AgedBrieItem;
use GildedRose\items\SulfurasItem;


class ItemFactory
{
    public static function createItem(string $name, int $sellIn, int $quality): Item
    {
        return match (true) {
            //AgedBrie
            //[var]Item($name, )
            $name == "Aged Brie" => new AgedBrieItem($name, $sellIn, $quality),
            $name == "Sulfuras, Hand of Ragnaros" => new SulfurasItem($name),
            str_contains(strtolower($name), "conjured") =>
                new ConjuredItem($name, $sellIn, $quality),
            str_contains(strtolower($name), "backstage passes") =>
                new BackstagePassesItem($name, $sellIn, $quality),
            default => new RegularItem($name, $sellIn, $quality)
        };
    }
}