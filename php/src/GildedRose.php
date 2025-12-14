<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\items\AgedBrieItem;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {}

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        // Reduce Item quality by 1 of Regular Items
                        $item->quality--;
                    }
                }
            } else {
                if ($item->quality < 50) {
                    // Add Item quality to Aged Brie & Backstage passes
                    $item->quality++;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sellIn < 11) {
                            // Backstage passes `Quality` increases by `2` when there are `10` days or less
                            if ($item->quality < 50) {
                                $item->quality++;
                            }
                        }
                        if ($item->sellIn < 6) {
                            // Backstage passes `Quality` increases by `3` when there are `5` days or less
                            if ($item->quality < 50) {
                                $item->quality++;
                            }
                        }
                    }
                }
            }

            // Reduces sellIn for all items except for Sulfuras
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sellIn--;
            }

            // Reduces quality of an item by an additional point when sellIn is negative
            if ($item->sellIn < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->quality--;
                            }
                        }
                    } else {
                        // Sets item quality to 0
                        $item->quality = 0;
                    }
                } else {
                    // Increases Aged brie by an extra point when sellIn is negative
                    if ($item->quality < 50) {
                        $item->quality++;
                    }
                }
            }
        }
    }
}
