<?php
declare(strict_types=1);

namespace GildedRose\items;

use GildedRose\Item;
use GildedRose\items\AgedBrieItem;

class ItemFactory
{
    public static function createItem(string $name, int $sellIn, int $quality): Item
    {
        return match ($name) {
            "Aged Brie" => new AgedBrieItem($name, $sellIn, $quality),
            default => new Item($name, $sellIn, $quality)
        };
    }
}